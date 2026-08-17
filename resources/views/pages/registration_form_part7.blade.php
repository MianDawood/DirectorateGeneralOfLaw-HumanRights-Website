<x-form-layout
    title="Registration Form - PART-7"
    subtitle="SCHEDULE-I | PART-7: PLANNED PROJECTS / PROGRAMMES"
    step="Step 7 of 11: Planned Projects & Programmes"
    backRoute="registration_form_part6"
    backLabel="Back to Part 6"
>
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">7</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-7: Planned Projects / Programmes/ Assignments</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Future Implementation Strategy</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            <div class="space-y-4 p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                <label class="label-compact">Number of planned Projects / Programmes / Assignments:</label>
                <input type="number" name="planned_projects_count" min="0" placeholder="0" class="w-full input-compact bg-white border border-slate-200 rounded-lg">
            </div>
            <div class="space-y-4 p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                <label class="label-compact">Total Planned Projects:</label>
                <input type="text" name="planned_projects_summary" placeholder="Consolidated summary" class="w-full input-compact bg-white border border-slate-200 rounded-lg">
            </div>
        </div>

        <div class="space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 px-2">
                <h3 class="label-compact mb-0">Planned Project Details</h3>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Add only the projects you plan</p>
            </div>

            <div id="planned-projects-list" class="grid grid-cols-1 lg:grid-cols-3 gap-6" data-repeat-group="planned_projects">
            </div>

            <div class="flex justify-center pt-2">
                <button type="button" class="add-project-row-btn" data-add-row="planned_projects">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    <span>Add another project</span>
                </button>
            </div>
        </div>

        <template id="planned-project-row-template">
            @include('pages.partials.planned_project_row')
        </template>
    </section>

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
        <script src="/js/registration-repeat-rows.js"></script>
    @endpush
</x-form-layout>
