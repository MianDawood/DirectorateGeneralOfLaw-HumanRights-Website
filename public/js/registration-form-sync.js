(() => {
    const form = document.querySelector('form');
    if (!form) return;

    const path = window.location.pathname;
    const partMatch = path.match(/registration_form_part(\d+)/);
    const part = partMatch ? Number(partMatch[1]) : 1;

    const toSlug = (text) => (text || '')
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '_')
        .replace(/^_+|_+$/g, '')
        .slice(0, 48);

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
            if (!el.name || !el.name.trim()) {
                const group = el.closest('[data-repeat-group]')?.getAttribute('data-repeat-group');
                const item = el.closest('[data-repeat-item]');
                const fieldName = safeLabel(el) || `field_${index + 1}`;
                if (group && item) {
                    const itemIndex = [...item.parentElement.children].indexOf(item);
                    el.name = `${group}[${itemIndex}][${fieldName}]`;
                } else {
                    el.name = `part_${part}_${fieldName}_${index + 1}`;
                }
                index += 1;
            }
        });
    };

    const normalizeName = (name) => (name || '').endsWith('[]') ? name.slice(0, -2) : name;

    const collectFormData = () => {
        assignMissingNames();
        const data = {};
        const elements = form.querySelectorAll('input, textarea, select');

        elements.forEach((el) => {
            if (!el.name) return;
            const fieldName = normalizeName(el.name);
            if (el.type === 'checkbox') {
                const group = form.querySelectorAll(`input[name="${el.name}"][type="checkbox"]`);
                if (group.length > 1) {
                    data[fieldName] = Array.from(group).filter((x) => x.checked).map((x) => x.value);
                } else {
                    data[fieldName] = el.checked ? el.value : null;
                }
                return;
            }
            if (el.type === 'radio') {
                if (el.checked) data[fieldName] = el.value;
                return;
            }
            data[fieldName] = el.value;
        });

        return data;
    };

    const applyFormData = (data) => {
        if (!data || typeof data !== 'object') return;
        assignMissingNames();
        const elements = form.querySelectorAll('input, textarea, select');

        elements.forEach((el) => {
            if (!el.name) return;
            const fieldName = normalizeName(el.name);
            if (data[fieldName] === undefined || data[fieldName] === null) return;
            if (el.type === 'checkbox') {
                if (Array.isArray(data[fieldName])) {
                    el.checked = data[fieldName].includes(el.value);
                } else {
                    el.checked = data[fieldName] === el.value;
                }
                return;
            }
            if (el.type === 'radio') {
                el.checked = data[fieldName] === el.value;
                return;
            }
            el.value = data[fieldName];
        });
    };

    const getDraftKey = () => `ngo_registration_step_${part}_draft`;
    const DRAFT_MODE_KEY = 'ngo_registration_draft_mode';
    const isDraftMode = () => localStorage.getItem(DRAFT_MODE_KEY) === '1';

    const clearAllRegistrationState = () => {
        for (let step = 1; step <= 11; step += 1) {
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
        } catch (err) {
            console.error(err);
        }
    };

    const loadServerDraft = async () => {
        if (!isDraftMode()) return;
        const appId = localStorage.getItem('ngo_application_id');
        if (!appId) return;
        const response = await fetch(`/registration/part/${part}/data?application_id=${encodeURIComponent(appId)}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
        });
        if (!response.ok) return;
        const result = await response.json();
        const payload = result && result.payload ? result.payload : null;
        if (payload && typeof payload === 'object' && Object.keys(payload).length > 0) {
            applyFormData(result.payload);
            localStorage.setItem(getDraftKey(), JSON.stringify(payload));
        }
    };

    const setupRepeatGroups = () => {
        const repeatConfigs = [
            { selector: '.project-block', group: part === 7 ? 'planned_projects' : 'ongoing_projects' },
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

    const validateCurrentStep = () => {
        assignMissingNames();
        return form.reportValidity();
    };

    const saveStep = async () => {
        persistLocalDraft();
        const fd = new FormData(form);
        const appId = localStorage.getItem('ngo_application_id');
        if (appId) fd.append('application_id', appId);

        const response = await fetch(`/registration/part/${part}/save`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
            },
            body: fd,
        });

        if (!response.ok) return false;
        const result = await response.json();
        if (result.application_id) {
            localStorage.setItem('ngo_application_id', String(result.application_id));
        }
        return !!result.success;
    };

    const bindNextLinks = () => {
        const nextLinks = form.querySelectorAll('a[href*="registration_form_part"]');
        nextLinks.forEach((link) => {
            link.addEventListener('click', async (e) => {
                e.preventDefault();
                if (!validateCurrentStep()) return;
                try {
                    const ok = await saveStep();
                    if (!ok) return;
                } catch (err) {
                    console.error(err);
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
                const ok = await saveStep();
                if (!ok) return;

                if (part === 11) {
                    clearAllRegistrationState();
                    form.reset();
                }

                const successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    successMessage.classList.remove('hidden');
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            } catch (err) {
                console.error(err);
            }
        });
    };

    setupRepeatGroups();
    assignMissingNames();
    loadLocalDraft();
    loadServerDraft().catch((err) => console.error(err));
    bindNextLinks();
    bindFinalSubmit();
    form.addEventListener('input', persistLocalDraft);
})();
