<x-form-layout
    title="Registration Form - PART-C"
    subtitle="SCHEDULE-I | PART-3: OBJECTIVES"
    step="Step 3 of 11: Objectives"
    backRoute="registration_form_part2"
    backLabel="Back to Part 2"
>
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">General Objectives</h2>
            </div>
        </div>

        <div class="space-y-4">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">a. General Objectives *</label>
            <textarea name="general_objectives" required
                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
        </div>
        <div class="space-y-4 mt-6">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">b. Geographical Focus of Work (Specify District in Khyber Pakhtunkhwa) *</label>
            <textarea name="geographical_focus" required rows="2"
                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
        </div>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="space-y-3">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Thematic Focus *</label>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematic_focus[]" value="Human Rights Protection" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Human Rights Protection</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematic_focus[]" value="Legal Aid & Access to Justice" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Legal Aid & Access to Justice</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematic_focus[]" value="Gender Equality & Women's Rights" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Gender Equality & Women's Rights</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematic_focus[]" value="Child Rights & Protection" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Child Rights & Protection</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematic_focus[]" value="Rights of Persons with Disabilities" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Rights of Person with Disabilities</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematic_focus[]" value="Transgender & Minority Rights" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Transgender & Minority Rights</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematic_focus[]" value="Refugee & Migrant Rights" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Refugee & Migrant Rights</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematic_focus[]" value="Freedom of Expression & Assembly" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Freedom of Expression & Assembly</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematic_focus[]" value="Labor & Employment Rights" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Labor & Employment Rights</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematic_focus[]" value="Protection Against Gender-Based Violence" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Protection Against Gender-Based Violence</span>
                </label>
                <div class="md:col-span-2">
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 group">
                        <input type="checkbox" name="thematic_focus[]" value="Other" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                        <input type="text" name="thematic_focus_other" placeholder="Other (Please specify)" class="w-full bg-transparent border-none focus:outline-none text-[11px] font-bold text-slate-600">
                    </label>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="space-y-3">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Beneficiaries (Target Groups) *</label>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="Children" required class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Children</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="Women" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Women</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="Transgender Person" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Transgender Person</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="Persons with Disabilities (PWDs)" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Persons with Disabilities (PWDs)</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="Orphans" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Orphans</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="Refugees & Migrants" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Refugees & Migrants</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="Elderly Persons" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Elderly Persons</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="Government Institutions" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Government Institutions</span>
                </label>
                <label class="flex items-center gap-3 py-3 px-2 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="Survivors of Gender-Based Violence" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Survivors of Gender-Based Violence</span>
                </label>
                <div class="md:col-span-2">
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 group">
                        <input type="checkbox" name="beneficiaries[]" value="Other" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                        <input type="text" name="beneficiaries_other" placeholder="Other (Please specify)" class="w-full bg-transparent border-none focus:outline-none text-[11px] font-bold text-slate-600">
                    </label>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="space-y-3">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">How Does Your Non-Governmental Organization Operate? *</label>
            <div class="space-y-2">
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operate_method[]" value="Provides Human Rights Training & Capacity Building" required class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Provides Human Rights Training & Capacity Building</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operate_method[]" value="Conducts Legal Awareness & Rights-Based Advocacy" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Conducts Legal Awareness & Rights-Based Advocacy</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operate_method[]" value="Support Survivors of Violence & Discrimination" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Support Survivors of Violence & Discrimination</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operate_method[]" value="Provides referral & Protection Services" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Provides referral & Protection Services</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operate_method[]" value="Conducts Research & Policy Analysis" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Conducts Research & Policy Analysis</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operate_method[]" value="Provides Psychological & Mental Health Support" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Provides Psychological & Mental Health Support</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operate_method[]" value="Strengthens Institutional Reforms & Policy Development" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Strengthens Institutional Reforms & Policy Development</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 group">
                    <input type="checkbox" name="operate_method[]" value="Other" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <input type="text" name="operate_method_other" placeholder="Other (Please specify)" class="w-full bg-transparent border-none focus:outline-none text-[11px] font-bold text-slate-600">
                </label>
            </div>
        </div>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="space-y-6">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Collaboration with Local Non-Governmental Organizations/ Non-Profit Organizations (if applicable)</label>

            <div class="space-y-4">
                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Name of Partner Non-Governmental Organization</label>
                    <input type="text" name="partner_ngo_name" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[11px]">
                </div>
                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Nature of Collaboration</label>
                    <input type="text" name="nature_of_collaboration" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[11px]">
                </div>
                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Joint Activities</label>
                    <input type="text" name="joint_activities" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[11px]">
                </div>
            </div>
        </div>
    </section>

    <div class="pt-10 border-t border-slate-100 flex flex-col items-center gap-5">
        <div class="flex flex-col sm:flex-row gap-4 w-full max-w-2xl justify-center">
            <button type="button" onclick="saveAsDraft()"
                class="save-draft-btn flex-1 py-4 bg-white text-slate-900 border-2 border-slate-100 font-bold text-sm rounded-2xl shadow-sm hover:bg-slate-50 hover:border-[#02b1eb]/30 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <i data-lucide="save" class="w-4 h-4 text-[#02B1EB]"></i>
                <span>Save as Draft</span>
            </button>
            <a href="{{ route('registration_form_part4') }}"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 4</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</x-form-layout>
