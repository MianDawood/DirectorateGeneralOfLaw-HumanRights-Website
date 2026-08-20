(() => {
    const form = document.querySelector('[id^="registrationForm"]');
    if (!form) return;

    const path = window.location.pathname;
    const partMatch = path.match(/registration_form_part(\d+)/);
    const part = partMatch ? Number(partMatch[1]) : 1;

    const BASE = String(window.REGISTRATION_BASE_URL || '').replace(/\/?$/, '/');

    const REPEAT_GROUP_KEYS = ['ongoing_projects', 'planned_projects', 'completed_projects', 'staff_members', 'security_companies', 'board_members'];

    const toSlug = (text) => (text || '')
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '_')
        .replace(/^_+|_+$/g, '')
        .slice(0, 48);

    const parseRepeatFieldName = (name) => {
        const match = (name || '').match(/^([a-z0-9_]+)\[(\d+)\]\[([a-z0-9_]+)\]$/i);
        if (!match) return null;
        return { group: match[1], index: Number(match[2]), field: match[3] };
    };

    const safeLabel = (el) => {
        const label = el.closest('div')?.querySelector('label');
        const placeholder = el.getAttribute('placeholder');
        return toSlug(label?.textContent || placeholder || el.type || 'field');
    };

    const assignMissingNames = () => {
        let index = 0;
        const fields = form.querySelectorAll('input, textarea, select');
        fields.forEach((el) => {
            if (el.type === 'submit' || el.type === 'button' || el.type === 'hidden') return;
            if (el.closest('[data-repeat-item]') && el.hasAttribute('data-field')) return;
            if (!el.name || !el.name.trim()) {
                const group = el.closest('[data-repeat-group]')?.getAttribute('data-repeat-group');
                const item = el.closest('[data-repeat-item]');
                const fieldName = safeLabel(el) || `field_${index + 1}`;
                if (group && item && !el.hasAttribute('data-field')) {
                    const itemIndex = [...item.parentElement.querySelectorAll('[data-repeat-item]')].indexOf(item);
                    el.name = `${group}[${itemIndex}][${fieldName}]`;
                } else {
                    el.name = `part_${part}_${fieldName}_${index + 1}`;
                }
                index += 1;
            }
        });
    };

    const normalizeName = (name) => (name || '').endsWith('[]') ? name.slice(0, -2) : name;

    const setFieldValue = (el, value) => {
        if (el.type === 'checkbox') {
            if (Array.isArray(value)) {
                el.checked = value.includes(el.value);
            } else {
                el.checked = value === el.value || value === true || value === '1' || value === 'on';
            }
            return;
        }
        if (el.type === 'radio') {
            el.checked = value === el.value;
            return;
        }
        el.value = value ?? '';
    };

    const collectFormData = () => {
        assignMissingNames();
        const data = {};
        const elements = form.querySelectorAll('input, textarea, select');

        elements.forEach((el) => {
            if (!el.name || el.type === 'submit' || el.type === 'button') return;

            const repeat = parseRepeatFieldName(el.name);
            if (repeat) {
                if (!data[repeat.group]) data[repeat.group] = [];
                if (!data[repeat.group][repeat.index]) data[repeat.group][repeat.index] = {};
                if (el.type === 'checkbox') {
                    data[repeat.group][repeat.index][repeat.field] = el.checked ? (el.value || true) : null;
                } else if (el.type === 'radio') {
                    if (el.checked) data[repeat.group][repeat.index][repeat.field] = el.value;
                } else {
                    data[repeat.group][repeat.index][repeat.field] = el.value;
                }
                return;
            }

            const fieldName = normalizeName(el.name);
            if (el.type === 'checkbox') {
                const group = form.querySelectorAll(`input[name="${el.name}"][type="checkbox"]`);
                if (group.length > 1) {
                    data[fieldName] = Array.from(group).filter((x) => x.checked).map((x) => x.value);
                } else {
                    data[fieldName] = el.checked ? (el.value || true) : null;
                }
                return;
            }
            if (el.type === 'radio') {
                if (el.checked) data[fieldName] = el.value;
                return;
            }
            data[fieldName] = el.value;
        });

        REPEAT_GROUP_KEYS.forEach((groupKey) => {
            if (Array.isArray(data[groupKey])) {
                data[groupKey] = data[groupKey].filter((row) => row && typeof row === 'object');
            }
        });

        return data;
    };

    const applyScalarFields = (data) => {
        assignMissingNames();
        const elements = form.querySelectorAll('input, textarea, select');

        elements.forEach((el) => {
            if (!el.name || el.closest('[data-repeat-item]')) return;
            const fieldName = normalizeName(el.name);
            if (parseRepeatFieldName(el.name)) return;
            if (REPEAT_GROUP_KEYS.includes(fieldName)) return;
            if (data[fieldName] === undefined || data[fieldName] === null) return;
            setFieldValue(el, data[fieldName]);
        });
    };

    const applyFormData = (data) => {
        if (!data || typeof data !== 'object') return;

        if (window.NgoRepeatRows) {
            window.NgoRepeatRows.hydratePayload(data);
        }

        applyScalarFields(data);
    };

    const getDraftKey = () => `ngo_registration_step_${part}_draft`;
    const DRAFT_MODE_KEY = 'ngo_registration_draft_mode';
    const isDraftMode = () => localStorage.getItem(DRAFT_MODE_KEY) === '1';

    const clearAllRegistrationState = () => {
        for (let step = 1; step <= 10; step += 1) {
            localStorage.removeItem(`ngo_registration_step_${step}_draft`);
        }
        localStorage.removeItem('ngo_registration_draft');
        localStorage.removeItem('ngo_application_id');
        localStorage.removeItem(DRAFT_MODE_KEY);
    };

    const persistLocalDraft = () => {
        if (!isDraftMode()) return;
        const data = collectFormData();
        localStorage.setItem(getDraftKey(), JSON.stringify(data));
    };

    const loadLocalDraft = () => {
        if (!isDraftMode()) return;
        const raw = localStorage.getItem(getDraftKey());
        if (!raw) return;
        try {
            applyFormData(JSON.parse(raw));
        } catch (_) {}
    };

    const loadServerDraft = async () => {
        const appId = localStorage.getItem('ngo_application_id');
        if (!appId) return;
        const response = await fetch(`${BASE}registration/part/${part}/data?application_id=${encodeURIComponent(appId)}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
        });
        if (!response.ok) return;
        const result = await response.json();
        const payload = result && result.payload ? result.payload : null;
        if (payload && typeof payload === 'object' && Object.keys(payload).length > 0) {
            applyFormData(payload);
            localStorage.setItem(getDraftKey(), JSON.stringify(payload));
        }
    };

    const setupRepeatGroups = () => {
        const repeatConfigs = [
            { selector: '.security-card', group: 'security_companies' },
        ];

        repeatConfigs.forEach(({ selector, group }) => {
            const items = form.querySelectorAll(selector);
            if (!items.length) return;
            const parent = items[0].parentElement;
            parent.setAttribute('data-repeat-group', group);
            items.forEach((item) => item.setAttribute('data-repeat-item', '1'));
        });
    };

    const showFormErrors = (labels) => {
        let badge = document.getElementById('formErrors');
        if (!badge) {
            badge = document.createElement('div');
            badge.id = 'formErrors';
            badge.className = 'mx-6 md:mx-10 mt-4 p-4 bg-red-50 border border-red-200 rounded-xl';
            const formEl = document.getElementById('registrationForm');
            formEl.insertBefore(badge, formEl.firstChild);
        }
        badge.innerHTML = '<div class="flex items-start gap-3">'
            + '<i data-lucide="alert-circle" class="w-5 h-5 text-red-500 mt-0.5 shrink-0"></i>'
            + '<div>'
            + '<p class="text-[11px] font-black text-red-800 uppercase tracking-wider">Please fix the following:</p>'
            + '<ul class="mt-2 space-y-1">'
            + labels.map(l => '<li class="text-[11px] font-semibold text-red-600 flex items-center gap-2"><span class="w-1 h-1 bg-red-400 rounded-full shrink-0"></span>' + l + '</li>').join('')
            + '</ul></div></div>';
        if (window.lucide) lucide.createIcons();
        badge.scrollIntoView({ behavior: 'smooth', block: 'center' });
    };

    const validateCurrentStep = () => {
        assignMissingNames();
        const old = document.getElementById('formErrors');
        if (old) old.remove();

        const labels = [];

        const cbGroups = {};
        form.querySelectorAll('input[type="checkbox"][name$="[]"]').forEach((el) => {
            const n = el.name;
            if (!cbGroups[n]) cbGroups[n] = { elements: [], hasRequired: false };
            cbGroups[n].elements.push(el);
            if (el.hasAttribute('required')) cbGroups[n].hasRequired = true;
        });
        for (const n in cbGroups) {
            const g = cbGroups[n];
            if (!g.hasRequired) continue;
            if (g.elements.some((el) => el.checked)) continue;
            const label = g.elements[0].closest('div')?.querySelector('.label-compact, label')?.textContent?.trim().replace(/\s*\*$/, '') || 'This group';
            labels.push(label);
        }

        if (!form.checkValidity()) {
            form.querySelectorAll(':invalid').forEach((el) => {
                if (el.type === 'checkbox' && el.name.endsWith('[]')) return;
                const label = el.closest('div,label')?.querySelector('.label-compact, label')?.textContent?.trim().replace(/\s*\*$/, '') || el.name || el.placeholder || 'Field';
                labels.push(label);
            });
        }

        if (labels.length > 0) {
            showFormErrors([...new Set(labels)]);
            return false;
        }
        return true;
    };

    const saveStep = async (options = {}) => {
        persistLocalDraft();
        assignMissingNames();
        const fd = new FormData(form);
        const appId = localStorage.getItem('ngo_application_id');
        if (appId) fd.append('application_id', appId);
        if (options.draft) fd.append('draft', '1');

        const response = await fetch(`${BASE}registration/part/${part}/save`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
            },
            body: fd,
        });

        const result = await response.json().catch(() => ({}));
        if (!response.ok) return { success: false, error: result.message || result.error || 'Server error: ' + response.statusText };
        if (result.application_id) {
            localStorage.setItem('ngo_application_id', String(result.application_id));
        }
        return { success: !!result.success, error: !result.success ? (result.message || 'Save failed') : null };
    };

    const showError = (message) => {
        const el = document.getElementById('errorMessage');
        const text = document.getElementById('errorMessageText');
        if (el) el.classList.remove('hidden');
        if (text) text.textContent = message || 'An unexpected error occurred. Please try again.';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    const bindNextLinks = () => {
        const nextLinks = form.querySelectorAll('a[href*="registration_form_part"]');
        nextLinks.forEach((link) => {
            link.addEventListener('click', async (e) => {
                e.preventDefault();
                if (!validateCurrentStep()) return;
                try {
                    const result = await saveStep();
                    if (!result || !result.success) {
                        if (result && result.error) showError(result.error);
                        return;
                    }
                } catch (err) {
                    showError(err.message || 'Connection error');
                    return;
                }
                window.location.href = link.href;
            });
        });
    };

    const bindFinalSubmit = () => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!validateCurrentStep()) return;
            try {
                const result = await saveStep();
                if (!result || !result.success) {
                    if (result && result.error) showError(result.error);
                    return;
                }

                if (part === 10) {
                    clearAllRegistrationState();
                    form.reset();
                }

                const successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    successMessage.classList.remove('hidden');
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            } catch (err) {
                showError(err.message || 'Connection error');
            }
        });
    };

    const hasRepeatRows = () => form.querySelectorAll(
        '#staff-members-list, #completed-projects-list, #ongoing-projects-list, #planned-projects-list'
    ).length > 0;

    const initRepeatRows = () => {
        if (window.NgoRepeatRows) {
            window.NgoRepeatRows.initForPart(part);
            loadLocalDraft();
        } else if (hasRepeatRows()) {
            setTimeout(initRepeatRows, 50);
        } else {
            loadLocalDraft();
        }
    };
    initRepeatRows();
    setupRepeatGroups();
    assignMissingNames();
    const loadPersistedData = async () => {
        const appId = localStorage.getItem('ngo_application_id');
        if (appId) {
            try {
                await loadServerDraft();
            } catch (_) {}
            const localRaw = localStorage.getItem(getDraftKey());
            if (localRaw) {
                try {
                    const parsed = JSON.parse(localRaw);
                    const allEmpty = !document.querySelector('input[type="text"]:not([value=""]), input[type="tel"]:not([value=""]), input[type="email"]:not([value=""]), input[type="url"]:not([value=""]), input[type="number"]:not([value=""]), input[type="date"]:not([value=""]), textarea:not(:empty), select:not([value=""])');
                    if (allEmpty) {
                        applyFormData(parsed);
                    }
                } catch (_) {}
            }
            return;
        }
    };

    loadPersistedData().catch(() => {});
    bindNextLinks();
    bindFinalSubmit();
    form.addEventListener('input', persistLocalDraft);
    document.addEventListener('ngo-repeat-rows-changed', persistLocalDraft);

    window.NgoRegistrationSync = {
        saveDraft: () => {
            persistLocalDraft();
            return saveStep({ draft: true }).catch(() => ({}));
        },
        persistLocalDraft,
        loadLocalDraft,
    };
})();
