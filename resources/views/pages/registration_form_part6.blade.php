<x-form-layout
    title="Registration Form - PART-F"
    subtitle="SCHEDULE-I | PART-6: PROJECTS/PROGRAMMES/ASSIGNMENTS UNDER IMPLEMENTATION"
    step="Step 6 of 10: Ongoing Projects"
    backRoute="registration_form_part5"
    backLabel="Back to Part 5"
>
    <!-- PART-F: Ongoing Projects -->
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PROJECTS / PROGRAMMES / ASSIGNMENTS UNDER IMPLEMENTATION</h2>
            </div>
        </div>

        <div class="space-y-6">
            <!-- Number of Ongoing Projects -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-2">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Number of Ongoing Projects/Programmes/Assignments <span class="text-red-500">*</span></label>
                    <input type="number" name="total_ongoing_projects" required min="0"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
            </div>

            <!-- Ongoing Project Details -->
            <div class="overflow-x-auto">
                <div class="min-w-full">
                    <div class="space-y-4 py-2" data-repeat-group="ongoing_projects">
                        <div id="ongoing-projects-list"></div>

                        <div class="flex justify-center pt-2">
                            <button type="button" class="add-project-row-btn" data-add-row="ongoing_projects">
                                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                                <span>Add another ongoing project</span>
                            </button>
                        </div>
                    </div>

                    <template id="ongoing-project-row-template">
                        <div class="project-block" data-repeat-item>
                            <span class="sno-badge">S.No. 1</span>
                            <button type="button" class="remove-project-row" data-remove-row title="Remove project" aria-label="Remove project">
                                <i data-lucide="x" class="w-3.5 h-3.5"></i>
                            </button>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-2">
                                    <label class="label-compact">Project Name <span class="text-red-500">*</span></label>
                                    <input type="text" data-field="ongoing_project_name" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-2">
                                    <label class="label-compact">Target Area (District/City/Town/UC) <span class="text-red-500">*</span></label>
                                    <input type="text" data-field="ongoing_target_area" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-1">
                                    <label class="label-compact">Start Date (MM/YYYY) <span class="text-red-500">*</span></label>
                                    <input type="month" data-field="ongoing_start_date" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-1">
                                    <label class="label-compact">Expected Completion Date (MM/YYYY) <span class="text-red-500">*</span></label>
                                    <input type="month" data-field="ongoing_end_date" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-1">
                                    <label class="label-compact">Total Funds (PKR/USD) <span class="text-red-500">*</span></label>
                                    <input type="text" data-field="ongoing_total_funds" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-1">
                                    <label class="label-compact">Funding Source / Donor <span class="text-red-500">*</span></label>
                                    <input type="text" data-field="ongoing_funding_source" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-1">
                                    <label class="label-compact">Thematic Focus <span class="text-red-500">*</span></label>
                                    <input type="text" data-field="ongoing_thematic_focus" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-1">
                                    <label class="label-compact">Total Beneficiaries <span class="text-red-500">*</span></label>
                                    <input type="number" data-field="ongoing_total_beneficiaries" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Project Director / Team Leader -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-2 pt-4">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Project Director / Team Leader Name <span class="text-red-500">*</span></label>
                    <input type="text" name="project_director_name" required
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Total Project Cost <span class="text-red-500">*</span></label>
                    <input type="text" name="total_project_cost" required
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
            </div>

            <!-- Funding Source -->
            <div class="px-2 pt-4">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Funding Source <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <label class="flex items-center gap-2 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="funding_sources[]" value="International Donors" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0 shrink-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors shrink-0">International Donors (Specify)</span>
                        <input type="text" name="funding_sources_international_donors" placeholder="Specify" class="w-full p-2 rounded-md bg-transparent focus:outline-none text-[11px] font-bold text-slate-600 px-2 py-0.5">
                    </label>
                    <label class="flex items-center gap-2 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="funding_sources[]" value="INGOs" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0 shrink-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors shrink-0">INGOs (Specify)</span>
                        <input type="text" name="funding_sources_ingos" placeholder="Specify" class="w-full p-2 rounded-md  bg-transparent focus:outline-none text-[11px] font-bold text-slate-600 px-2 py-0.5">
                    </label>
                    <label class="flex items-center gap-2 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="funding_sources[]" value="Government" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0 shrink-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors shrink-0">Government (Specify Department)</span>
                        <input type="text" name="funding_sources_government" placeholder="Specify Department" class="w-full bg-transparent focus:outline-none p-2 rounded-md  text-[11px] font-bold text-slate-600 px-2 py-0.5">
                    </label>
                    <label class="flex items-center gap-2 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="funding_sources[]" value="Membership Contributions" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0 shrink-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors shrink-0">Membership Contributions (Specify)</span>
                        <input type="text" name="funding_sources_membership" placeholder="Specify" class="w-full bg-transparent focus:outline-none p-2 rounded-md  text-[11px] font-bold text-slate-600 px-2 py-0.5">
                    </label>
                    <label class="flex items-center gap-2 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="funding_sources[]" value="Voluntary Donations" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0 shrink-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors shrink-0">Voluntary Donations (Specify)</span>
                        <input type="text" name="funding_sources_voluntary" placeholder="Specify" class="w-full bg-transparent focus:outline-none p-2 rounded-md  text-[11px] font-bold text-slate-600 px-2 py-0.5">
                    </label>
                    <label class="flex items-center gap-2 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="funding_sources[]" value="Fundraising" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0 shrink-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors shrink-0">Fundraising (Specify)</span>
                        <input type="text" name="funding_sources_fundraising" placeholder="Specify" class="w-full bg-transparent focus:outline-none p-2 rounded-md  text-[11px] font-bold text-slate-600 px-2 py-0.5">
                    </label>
                    <label class="flex items-center gap-2 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group md:col-span-2">
                        <input type="checkbox" name="funding_sources[]" value="Other" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0 shrink-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors shrink-0">Other (Specify)</span>
                        <input type="text" name="funding_sources_other" placeholder="Specify" class="w-full bg-transparent focus:outline-none p-2 rounded-md  text-[11px] font-bold text-slate-600 px-2 py-0.5">
                    </label>
                </div>
            </div>

            <!-- Thematic Focus -->
            <div class="px-2 pt-4">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Thematic Focus</label>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="project_thematic_focus[]" value="Human Rights Protection" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Human Rights Protection</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="project_thematic_focus[]" value="Legal Aid & Access to Justice" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Legal Aid & Access to Justice</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="project_thematic_focus[]" value="Gender Equality & Women's Rights" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Gender Equality & Women's Rights</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="project_thematic_focus[]" value="Child Rights & Protection" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Child Rights & Protection</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="project_thematic_focus[]" value="Rights of Persons with Disabilities" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Rights of Persons with Disabilities</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="project_thematic_focus[]" value="Transgender & Minority Rights" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Transgender & Minority Rights</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="project_thematic_focus[]" value="Refugee & Migrant Rights" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Refugee & Migrant Rights</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="project_thematic_focus[]" value="Freedom of Expression & Assembly" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Freedom of Expression & Assembly</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="project_thematic_focus[]" value="Labor & Employment Rights" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Labor & Employment Rights</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="project_thematic_focus[]" value="Protection Against Gender-Based Violence" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Protection Against Gender-Based Violence</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group md:col-span-2">
                        <input type="checkbox" name="project_thematic_focus[]" value="Other" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] w-32 font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Other (Specify)</span>
                        <input type="text" name="project_thematic_focus_other" placeholder="Specify" class="w-full bg-transparent focus:outline-none p-2 rounded-md  text-[11px] font-bold text-slate-600">
                    </label>
                </div>
            </div>

            <!-- Beneficiaries (Target Groups) -->
            <div class="px-2 pt-4">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Total Number of Beneficiaries <span class="text-red-500">*</span></label>
                    <input type="number" name="total_beneficiaries" required min="0"
                        class="w-full md:w-1/3 input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>

                <div class="mt-4">
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Beneficiaries (Target Groups)</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                            <input type="checkbox" name="beneficiary_types[]" value="Children" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                            <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Children</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                            <input type="checkbox" name="beneficiary_types[]" value="Women" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                            <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Women</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                            <input type="checkbox" name="beneficiary_types[]" value="Transgender Persons" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                            <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Transgender Persons</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                            <input type="checkbox" name="beneficiary_types[]" value="Persons with Disabilities (PWDs)" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                            <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Persons with Disabilities (PWDs)</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                            <input type="checkbox" name="beneficiary_types[]" value="Orphans" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                            <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Orphans</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                            <input type="checkbox" name="beneficiary_types[]" value="Refugees & Migrants" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                            <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Refugees & Migrants</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                            <input type="checkbox" name="beneficiary_types[]" value="Elderly Persons" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                            <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Elderly Persons</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                            <input type="checkbox" name="beneficiary_types[]" value="Government Institutions" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                            <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Government Institutions</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                            <input type="checkbox" name="beneficiary_types[]" value="Survivors of Gender-Based Violence" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                            <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Survivors of Gender-Based Violence</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group md:col-span-2">
                            <input type="checkbox" name="beneficiary_types[]" value="Other" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                            <span class="text-[11px] w-32 font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Other (Specify)</span>
                            <input type="text" name="beneficiary_types_other" placeholder="Specify" class="w-full bg-transparent focus:outline-none p-2 rounded-md  text-[11px] font-bold text-slate-600">
                        </label>
                    </div>
                </div>
            </div>

            <!-- Scope of Activities -->
            <div class="px-2 pt-4">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Scope of Activities</label>
                    <textarea name="scope_of_activities" rows="4"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px] p-3"></textarea>
                </div>

                <div class="mt-4">
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Focal Area / Key Interventions</label>
                    <textarea name="focal_area_key_interventions" rows="4"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px] p-3"></textarea>
                </div>
            </div>

            <!-- Clearance / Permission -->
            <div class="px-2 pt-4">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Clearance / Permission (if applicable)</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="clearance_permissions[]" value="Office Establishment" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Office Establishment</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="clearance_permissions[]" value="Travel Permits" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Travel Permits</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="clearance_permissions[]" value="Operations in Restricted Areas" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Operations in Restricted Areas</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                        <input type="checkbox" name="clearance_permissions[]" value="None" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">None</span>
                    </label>
                </div>
            </div>
        </div>
    </section>

    <!-- Next Step Action -->
    <div class="pt-10 border-t border-slate-100 flex flex-col items-center gap-5">
        <div class="flex flex-col sm:flex-row gap-4 w-full max-w-2xl justify-center">
            <button type="button" onclick="saveAsDraft()"
                class="save-draft-btn flex-1 py-4 bg-white text-slate-900 border-2 border-slate-100 font-bold text-sm rounded-2xl shadow-sm hover:bg-slate-50 hover:border-[#02b1eb]/30 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <i data-lucide="save" class="w-4 h-4 text-[#02B1EB]"></i>
                <span>Save as Draft</span>
            </button>
            <a href="{{ route('registration_form_part7') }}"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 7</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>

    @push('formScripts')
        <script src="{{ url('js/registration-repeat-rows.js?v=2') }}"></script>
    @endpush
</x-form-layout>
