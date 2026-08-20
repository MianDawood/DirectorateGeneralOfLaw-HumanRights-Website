/**
 * Dynamic repeat rows for NGO registration (projects, etc.)
 */
(() => {
    const registry = new Map();

    const refreshIcons = () => {
        try {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        } catch (err) {
            console.error(err);
        }
    };

    const reindex = (config) => {
        const container = document.querySelector(config.containerSelector);
        if (!container) return;

        const items = container.querySelectorAll('[data-repeat-item]');
        items.forEach((item, index) => {
            const badge = item.querySelector('.sno-badge');
            if (badge) {
                badge.textContent = `S.No. ${index + 1}`;
            }

            item.querySelectorAll('[data-field]').forEach((field) => {
                const key = field.getAttribute('data-field');
                if (key) {
                    field.name = `${config.groupName}[${index}][${key}]`;
                }
            });

            const removeBtn = item.querySelector('[data-remove-row]');
            if (removeBtn) {
                removeBtn.style.display = items.length <= config.minRows ? 'none' : '';
            }
        });
    };

    const createRow = (config) => {
        const template = document.querySelector(config.templateSelector);
        if (!template) return null;

        let row = null;
        if (template.content) {
            row = template.content.querySelector('[data-repeat-item]');
            if (row) {
                row = row.cloneNode(true);
            }
        } else {
            row = template.cloneNode(true);
        }

        if (row) {
            row.removeAttribute('id');
        }
        return row;
    };

    const addRow = (groupName, data = {}) => {
        const config = registry.get(groupName);
        if (!config) return;

        const container = document.querySelector(config.containerSelector);
        if (!container) return;

        const currentCount = container.querySelectorAll('[data-repeat-item]').length;
        if (currentCount >= config.maxRows) return;

        const row = createRow(config);
        if (!row) return;

        container.appendChild(row);
        reindex(config);

        if (data && typeof data === 'object') {
            row.querySelectorAll('[data-field]').forEach((field) => {
                const key = field.getAttribute('data-field');
                if (key && data[key] !== undefined && data[key] !== null) {
                    field.value = data[key];
                }
            });
        }

        refreshIcons();
    };

    const removeRow = (button) => {
        const item = button.closest('[data-repeat-item]');
        const container = item?.closest('[data-repeat-group]');
        if (!item || !container) return;

        const groupName = container.getAttribute('data-repeat-group');
        const config = registry.get(groupName);
        if (!config) return;

        const count = container.querySelectorAll('[data-repeat-item]').length;
        if (count <= config.minRows) return;

        item.remove();
        reindex(config);
        refreshIcons();

        document.dispatchEvent(new CustomEvent('ngo-repeat-rows-changed', { detail: { groupName } }));
    };

    const clearRows = (config) => {
        const container = document.querySelector(config.containerSelector);
        if (!container) return;
        container.innerHTML = '';
    };

    const hydrate = (groupName, rows) => {
        const config = registry.get(groupName);
        if (!config) return;

        const list = Array.isArray(rows) ? rows : [];
        clearRows(config);

        const count = Math.max(config.minRows, list.length);
        if (count === 0) {
            addRow(groupName, {});
            return;
        }

        for (let i = 0; i < count; i += 1) {
            addRow(groupName, list[i] || {});
        }
    };

    const init = (config) => {
        registry.set(config.groupName, config);

        const container = document.querySelector(config.containerSelector);
        if (!container) return;

        container.setAttribute('data-repeat-group', config.groupName);

        if (!container.querySelector('[data-repeat-item]')) {
            addRow(config.groupName, {});
        } else {
            reindex(config);
        }

        document.querySelectorAll(`[data-add-row="${config.groupName}"]`).forEach((btn) => {
            btn.addEventListener('click', () => {
                addRow(config.groupName, {});
                document.dispatchEvent(new CustomEvent('ngo-repeat-rows-changed', { detail: { groupName: config.groupName } }));
            });
        });

        container.addEventListener('click', (e) => {
            const removeBtn = e.target.closest('[data-remove-row]');
            if (removeBtn) {
                removeRow(removeBtn);
            }
        });
    };

     const initForPart = (part) => {
         if (part === 4) {
             init({
                 groupName: 'staff_members',
                 containerSelector: '#staff-members-list',
                 templateSelector: '#staff-member-row-template',
                 minRows: 1,
                 maxRows: 50,
             });
         }
 
         if (part === 5) {
             init({
                 groupName: 'completed_projects',
                 containerSelector: '#completed-projects-list',
                 templateSelector: '#completed-project-row-template',
                 minRows: 1,
                 maxRows: 20,
             });
         }
 
         if (part === 6) {
             init({
                 groupName: 'ongoing_projects',
                 containerSelector: '#ongoing-projects-list',
                 templateSelector: '#ongoing-project-row-template',
                 minRows: 1,
                 maxRows: 20,
             });
         }
 
         if (part === 7) {
             init({
                 groupName: 'planned_projects',
                 containerSelector: '#planned-projects-list',
                 templateSelector: '#planned-project-row-template',
                 minRows: 1,
                 maxRows: 20,
             });
         }
     };

    const hydratePayload = (payload) => {
        if (!payload || typeof payload !== 'object') return;

        if (Array.isArray(payload.staff_members) && registry.has('staff_members')) {
            hydrate('staff_members', payload.staff_members);
        }

        if (Array.isArray(payload.completed_projects) && registry.has('completed_projects')) {
            hydrate('completed_projects', payload.completed_projects);
        }

        if (Array.isArray(payload.ongoing_projects) && registry.has('ongoing_projects')) {
            hydrate('ongoing_projects', payload.ongoing_projects);
        }

        if (Array.isArray(payload.planned_projects) && registry.has('planned_projects')) {
            hydrate('planned_projects', payload.planned_projects);
        }
    };

    window.NgoRepeatRows = {
        init,
        initForPart,
        addRow,
        hydrate,
        hydratePayload,
        reindex: (groupName) => {
            const config = registry.get(groupName);
            if (config) reindex(config);
        },
    };
})();
