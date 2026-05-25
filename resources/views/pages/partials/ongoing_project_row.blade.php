{{-- Ongoing project row (Part 6). Index replaced by JS. --}}
<div class="project-block" data-repeat-item>
    <span class="sno-badge">S.No. 1</span>
    <button type="button" class="remove-project-row" data-remove-row title="Remove project" aria-label="Remove project">
        <i data-lucide="x" class="w-3.5 h-3.5"></i>
    </button>
    <div class="space-y-4">
        <div>
            <label class="label-compact">Project Name:</label>
            <input type="text" data-field="project_name" placeholder="Project name"
                class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
        </div>
        <div>
            <label class="label-compact">Target Area:</label>
            <input type="text" data-field="target_area" placeholder="Target area"
                class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="label-compact">Start Date:</label>
                <input type="month" data-field="start_date"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
            <div>
                <label class="label-compact">Exp Completion:</label>
                <input type="month" data-field="expected_completion"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="label-compact">Total Funds:</label>
                <input type="text" data-field="total_funds" placeholder="Amount"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
            <div>
                <label class="label-compact">Donor:</label>
                <input type="text" data-field="donor" placeholder="Donor"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="label-compact">Thematic Focus:</label>
                <input type="text" data-field="thematic_focus" placeholder="Focus area"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
            <div>
                <label class="label-compact">Beneficiaries:</label>
                <input type="number" data-field="beneficiaries" min="0" placeholder="0"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            </div>
        </div>
    </div>
</div>
