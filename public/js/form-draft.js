/**
 * NGO Registration Form - Save as Draft Functionality
 * This script handles saving and loading form data to/from localStorage.
 */

const DRAFT_MODE_KEY = 'ngo_registration_draft_mode';

function saveAsDraft() {
    const formData = JSON.parse(localStorage.getItem('ngo_registration_draft') || '{}');
    const form = document.querySelector('form');
    if (!form) return;

    const inputs = form.querySelectorAll('input, textarea, select');
    
    inputs.forEach(input => {
        if (input.name) {
            if (input.type === 'checkbox') {
                if (!formData[input.name]) formData[input.name] = [];
                
                // For groups of checkboxes with same name
                const checkboxes = form.querySelectorAll(`input[name="${input.name}"][type="checkbox"]`);
                if (checkboxes.length > 1) {
                    formData[input.name] = Array.from(checkboxes)
                        .filter(cb => cb.checked)
                        .map(cb => cb.value);
                } else {
                    formData[input.name] = input.checked ? input.value : null;
                }
            } else if (input.type === 'radio') {
                if (input.checked) {
                    formData[input.name] = input.value;
                }
            } else {
                formData[input.name] = input.value;
            }
        }
    });

    localStorage.setItem('ngo_registration_draft', JSON.stringify(formData));
    localStorage.setItem(DRAFT_MODE_KEY, '1');
    
    // Show professional notification
    showNotification('Draft Saved Successfully');
    
    // Pulse the button if it exists
    const saveBtn = document.querySelector('.save-draft-btn');
    if (saveBtn) {
        saveBtn.classList.add('scale-95', 'opacity-80');
        setTimeout(() => saveBtn.classList.remove('scale-95', 'opacity-80'), 200);
    }
}

function loadDraft() {
    if (localStorage.getItem(DRAFT_MODE_KEY) !== '1') return;

    const formData = JSON.parse(localStorage.getItem('ngo_registration_draft') || '{}');
    const form = document.querySelector('form');
    if (!form) return;

    const inputs = form.querySelectorAll('input, textarea, select');
    
    inputs.forEach(input => {
        if (input.name && formData[input.name] !== undefined && formData[input.name] !== null) {
            if (input.type === 'checkbox') {
                if (Array.isArray(formData[input.name])) {
                    input.checked = formData[input.name].includes(input.value);
                } else {
                    input.checked = (formData[input.name] === input.value);
                }
            } else if (input.type === 'radio') {
                input.checked = (formData[input.name] === input.value);
            } else {
                input.value = formData[input.name];
            }
            
            // Trigger change event to ensure any listener is active
            input.dispatchEvent(new Event('change', { bubbles: true }));
        }
    });
}

function showNotification(message) {
    let notification = document.getElementById('draft-notification');
    if (!notification) {
        notification = document.createElement('div');
        notification.id = 'draft-notification';
        notification.className = 'fixed bottom-8 right-8 bg-[#2f4052] text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-4 transform translate-y-32 opacity-0 transition-all duration-500 z-[9999] border border-white/10';
        document.body.appendChild(notification);
    }
    
    notification.innerHTML = `
        <div class="flex items-center justify-center w-10 h-10 bg-[#02b1eb]/20 text-[#02b1eb] rounded-lg border border-[#02b1eb]/30">
            <i data-lucide="save" class="w-5 h-5"></i>
        </div>
        <div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-0.5">Draft Status</p>
            <p class="text-[13px] font-bold text-white">${message}</p>
        </div>
    `;
    
    if (window.lucide) lucide.createIcons();
    
    requestAnimationFrame(() => {
        notification.classList.remove('translate-y-32', 'opacity-0');
        notification.classList.add('translate-y-0', 'opacity-100');
    });

    setTimeout(() => {
        notification.classList.remove('translate-y-0', 'opacity-100');
        notification.classList.add('translate-y-32', 'opacity-0');
    }, 3000);
}

// Auto-save feature
let autoSaveTimeout;
function setupAutoSave() {
    if (localStorage.getItem(DRAFT_MODE_KEY) !== '1') return;

    const form = document.querySelector('form');
    if (!form) return;

    form.addEventListener('input', () => {
        clearTimeout(autoSaveTimeout);
        autoSaveTimeout = setTimeout(() => {
            const formData = JSON.parse(localStorage.getItem('ngo_registration_draft') || '{}');
            const inputs = form.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                if (input.name) {
                    if (input.type === 'checkbox') {
                        if (!formData[input.name]) formData[input.name] = [];
                        const checkboxes = form.querySelectorAll(`input[name="${input.name}"][type="checkbox"]`);
                        if (checkboxes.length > 1) {
                            formData[input.name] = Array.from(checkboxes).filter(cb => cb.checked).map(cb => cb.value);
                        } else {
                            formData[input.name] = input.checked ? input.value : null;
                        }
                    } else if (input.type === 'radio') {
                        if (input.checked) formData[input.name] = input.value;
                    } else {
                        formData[input.name] = input.value;
                    }
                }
            });
            localStorage.setItem('ngo_registration_draft', JSON.stringify(formData));
        }, 5000);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    loadDraft();
    setupAutoSave();
});
