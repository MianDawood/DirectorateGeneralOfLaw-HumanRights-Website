<x-form-layout
    title="Registration Form - PART-G"
    subtitle="SCHEDULE-I | PART-7: PLANNED PROJECTS/PROGRAMMES/ASSIGNMENTS"
    step="Step 7 of 10: Planned Projects"
    backRoute="registration_form_part6"
    backLabel="Back to Part 6"
>
    <!-- Projects/Programmes/Assignments Planned -->
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Planned Projects / Programmes / Assignments</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Number of Planned Projects/Programmes/Assignments <span class="text-red-500">*</span></label>
                <input type="number" name="total_planned_projects" required min="0"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
        </div>
    </section>

    <!-- Planned Project Details -->
    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Planned Project Details</h2>
            </div>
        </div>

        <div class="space-y-6" data-repeat-group="planned_projects">
            <div id="planned-projects-list"></div>

            <div class="flex justify-center pt-2">
                <button type="button" class="add-project-row-btn" data-add-row="planned_projects">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    <span>Add another planned project</span>
                </button>
            </div>
        </div>

        <template id="planned-project-row-template">
            <div class="project-block p-6 bg-white border border-slate-200 rounded-xl relative" data-repeat-item>
                <div class="flex items-center justify-between mb-4">
                    <span class="sno-badge text-[13px] font-black text-slate-600">Project #<span class="sno-number">1</span></span>
                    <button type="button" class="remove-project-row w-7 h-7 bg-red-50 border border-red-200 rounded-full flex items-center justify-center hover:bg-red-100 hover:border-red-300 transition-colors" data-remove-row title="Remove project" aria-label="Remove project">
                        <i data-lucide="x" class="w-4 h-4 text-red-500"></i>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Project Name <span class="text-red-500">*</span></label>
                        <input type="text" data-field="planned_project_name" required placeholder="Enter project name"
                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Thematic Focus <span class="text-red-500">*</span></label>
                        <input type="text" data-field="planned_thematic_focus" required placeholder="e.g., Health, Education, Environment"
                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Geographic Focus <span class="text-red-500">*</span></label>
                        <input type="text" data-field="planned_geographic_focus" required placeholder="District/City/Province"
                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Potential Funding Source <span class="text-red-500">*</span></label>
                        <input type="text" data-field="planned_funding_source" required placeholder="e.g., Government, NGO, CSR"
                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Expected Beneficiaries <span class="text-red-500">*</span></label>
                        <input type="text" data-field="planned_beneficiaries" required placeholder="e.g., 500 farmers, 2,000 children"
                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                    </div>
                </div>
            </div>
        </template>
    </section>

    <!-- Next Step Action -->
    <div class="pt-10 border-t border-slate-100 flex flex-col items-center gap-5">
        <div class="flex flex-col sm:flex-row gap-4 w-full max-w-2xl justify-center">
            <button type="button" onclick="saveAsDraft()"
                class="save-draft-btn flex-1 py-4 bg-white text-slate-900 border-2 border-slate-100 font-bold text-sm rounded-2xl shadow-sm hover:bg-slate-50 hover:border-[#02b1eb]/30 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <i data-lucide="save" class="w-4 h-4 text-[#02B1EB]"></i>
                <span>Save as Draft</span>
            </button>
            <a href="{{ route('registration_form_part8') }}"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 8</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>

    @push('formScripts')
        <script src="{{ url('js/registration-repeat-rows.js?v=2') }}"></script>
    @endpush
</x-form-layout>
