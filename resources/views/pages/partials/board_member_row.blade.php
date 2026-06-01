{{-- Board member row (Part 4). Index replaced by JS. --}}
<div class="project-block" data-repeat-item>
    <span class="sno-badge">S.No. 1</span>
    <button type="button" class="remove-project-row" data-remove-row title="Remove member" aria-label="Remove member">
        <i data-lucide="x" class="w-3.5 h-3.5"></i>
    </button>
    <div class="space-y-4">
        <div>
            <label class="label-compact">Name of person *</label>
            <input type="text" data-field="name" placeholder="Full name"
                class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
        </div>
        <div>
            <label class="label-compact">Date of Birth *</label>
            <input type="date" data-field="date_of_birth"
                class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="label-compact">Local / Foreigner *</label>
                <select data-field="nationality_type"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                    <option value="local">Local (Pakistani)</option>
                    <option value="foreigner">Foreigner</option>
                </select>
            </div>
            <div>
                <label class="label-compact">CNIC Number *</label>
                <input type="text" data-field="cnic_number" placeholder="XXXXX-XXXXXXX-X"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="label-compact">Designation *</label>
                <input type="text" data-field="designation" placeholder="Designation"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
            <div>
                <label class="label-compact">Gender *</label>
                <select data-field="gender"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>
        <div>
            <label class="label-compact">Postal Address / Residential Address *</label>
            <textarea data-field="residential_address" rows="2" placeholder="Complete address"
                class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="label-compact">Mobile (Primary) *</label>
                <input type="tel" data-field="mobile" placeholder="+92-3XX-XXXXXXX"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
            <div>
                <label class="label-compact">Telephone (Official)</label>
                <input type="tel" data-field="telephone" placeholder="Telephone"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="label-compact">Fax</label>
                <input type="text" data-field="fax" placeholder="Fax"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
            <div>
                <label class="label-compact">Email</label>
                <input type="email" data-field="email" placeholder="Email"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="label-compact">Education</label>
                <input type="text" data-field="education" placeholder="Education"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
            <div>
                <label class="label-compact">Experience</label>
                <input type="text" data-field="experience" placeholder="Work experience"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
        </div>
    </div>
</div>