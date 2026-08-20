<x-form-layout title="Registration Form - PART-A" subtitle="SCHEDULE-I | PART-1: GENERAL INFORMATION"
    step="Step 1 of 10: General Information">
    <!-- PART-1: General Information -->
    <section>
        <div class="flex items-center gap-3 mb-6">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">General
                    Information</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">1. Name of
                    Non-Governmental Organization <span class="text-red-500">*</span> </label>
                <input type="text" name="ngo_name" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">2. Date of
                    Establishment <span class="text-red-500">*</span></label>
                <input type="date" name="establishment_date" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[11px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">3.
                    Registration Authority: Directorate General, Law & Human Rights <span
                        class="text-red-500">*</span></label>
                <input type="text" name="registration_authority" value="Directorate General, Law & Human Rights" required
                    class="w-full input-compact border bg-slate-50/50 border-slate-200 rounded-lg">
            </div>
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">4.
                    Registration No. and Date (If applicable)</label>
                <input type="text" name="registration_details"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none">
            </div>

            <div class="md:col-span-2 pt-1">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">5. Type of
                    Non-Governmental Organization <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                    <label class="flex items-center gap-2 p-2 bg-slate-50 rounded-lg border border-slate-100 hover:border-blue-200 transition-all cursor-pointer">
                        <input type="checkbox" name="organization_type[]" value="Non-Profit Organization ( NPO )" required
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">Non-Profit Organization ( NPO )</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 bg-slate-50 rounded-lg border border-slate-100 hover:border-blue-200 transition-all cursor-pointer">
                        <input type="checkbox" name="organization_type[]" value="Trust"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">Trust</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 bg-slate-50 rounded-lg border border-slate-100 hover:border-blue-200 transition-all cursor-pointer">
                        <input type="checkbox" name="organization_type[]" value="Foundations"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">Foundations</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 bg-slate-50 rounded-lg border border-slate-100 hover:border-blue-200 transition-all cursor-pointer">
                        <input type="checkbox" name="organization_type[]" value="Association"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">Association</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 bg-slate-50 rounded-lg border border-slate-100 hover:border-blue-200 transition-all cursor-pointer">
                        <input type="checkbox" name="organization_type[]" value="Other"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">Other</span>
                        <input type="text" name="organization_type_other" placeholder="Please specify"
                            class="w-full bg-transparent border-none focus:outline-none text-[11px] font-bold text-slate-600">
                    </label>
                </div>
            </div>

            <div class="md:col-span-2 pt-1">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">1. Area of interest / Sector ( Only Human Rights Related Sectors Allowed ) <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-1.5">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="area_of_interest[]" value="Human Rights Protection" required
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Human Rights Protection</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="area_of_interest[]" value="Legal Aid & Access to Justice"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Legal Aid & Access to Justice</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="area_of_interest[]" value="Gender Equality & Women's Rights"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Gender Equality & Women's Rights</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="area_of_interest[]" value="Child Rights & Protection"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Child Rights & Protection</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="area_of_interest[]" value="Rights of Persons with Disabilities"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Rights of Persons with Disabilities</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="area_of_interest[]" value="Transgender & Minority Rights"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Transgender & Minority Rights</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="area_of_interest[]" value="Refugee & Migrant Rights"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Refugee & Migrant Rights</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="area_of_interest[]" value="Freedom of Expression & Assembly"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Freedom of Expression & Assembly</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="area_of_interest[]" value="Labor & Employment Rights"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Labor & Employment Rights</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="area_of_interest[]" value="Other"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Other</span>
                        <input type="text" name="area_of_interest_other" placeholder="Specify"
                            class="w-full bg-transparent border-none focus:outline-none text-[11px] font-bold text-slate-600">
                    </label>
                </div>
            </div>
        </div>
    </section>

    <!-- Geographical Scope -->
    <section class="pt-8 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-3">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest">2. Geographical Scope of Operations <span class="text-red-500">*</span></label>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="p-4 bg-slate-50/50 rounded-xl border border-slate-100">
                <div class="flex items-center gap-2 mb-1.5">
                    <input type="checkbox" name="geographical_scope[]" value="Local"
                        class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest">Local (Specify Districts)</label>
                </div>
                <input type="text" name="local_districts"
                    class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[11px] mt-1">
            </div>
            <div class="p-4 bg-slate-50/50 rounded-xl border border-slate-100">
                <div class="flex items-center gap-2 mb-1.5">
                    <input type="checkbox" name="geographical_scope[]" value="Provincial"
                        class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest">Provincial</label>
                </div>
                <input type="text" name="provincial" value="Khyber Pakhtunkhwa" readonly
                    class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[11px] bg-gray-400/50 cursor-not-allowed mt-1">
            </div>
            <div class="p-4 bg-slate-50/50 rounded-xl border border-slate-100">
                <div class="flex items-center gap-2 mb-1.5">
                    <input type="checkbox" name="geographical_scope[]" value="National"
                        class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest">National (Specify Provinces)</label>
                </div>
                <input type="text" name="national_provinces"
                    class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[11px] mt-1">
            </div>
        </div>
    </section>

    <!-- Previous Registration -->
    <section class="pt-8 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-3">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest">3. Previous Registration Details ( if applicable )</label>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Previous Registration Authority</label>
                <input type="text" name="previous_registration_authority"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg text-[11px]">
            </div>
            <div>
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Registration No. & Date</label>
                <input type="text" name="previous_registration_no_date"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg text-[11px]">
            </div>
            <div>
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Duration of Work ( years )</label>
                <input type="number" name="previous_work_duration"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg text-[11px]">
            </div>
        </div>
    </section>

    <!-- Parent and sister ngo -->
    <section class="pt-8 border-t border-slate-100">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">9. Name of Parent Non-Governmental Organization ( if any )</label>
                <input type="text" name="parent_ngo_name"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none">
            </div>
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">10. Name of Sister Non-Governmental Organization ( if any )</label>
                <input type="text" name="sister_ngo_name"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none">
            </div>
        </div>
    </section>

    <!-- Security Approval -->
    <section class="pt-8 border-t border-slate-100">
        <div class="space-y-6">
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">11. Security Approval ( if any )</label>
                <p class="text-[11px] text-slate-400 mb-3">( only applicable for Non-Governmental Organization legally required to obtain security clearance )</p>

                <div class="space-y-3">
                    <label class="flex items-start gap-3 cursor-pointer group">
                        <input type="radio" name="security_approval" value="yes" class="w-3.5 h-3.5 mt-1.5 text-[#02B1EB] focus:ring-0 items-start">
                        <div class="flex-1">
                            <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Yes ( Specify issuing Authority & Date )</span>
                            <input type="text" name="security_approval_details"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none text-[11px] mt-1">
                        </div>
                    </label>

                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="radio" name="security_approval" value="no" class="w-3.5 h-3.5 text-[#02B1EB] focus:ring-0" checked>
                        <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">No</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">12. Professional Associations / Membership (If applicable)</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <label class="flex items-center gap-2 p-3 bg-white border border-slate-100 rounded-lg hover:border-blue-100 transition-all cursor-pointer">
                        <input type="checkbox" name="professional_associations[]" value="National Human Rights Institution ( NCHR, Provincial, Commissions )"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">National Human Rights Institution ( NCHR, Provincial, Commissions )</span>
                    </label>
                    <label class="flex items-center gap-2 p-3 bg-white border border-slate-100 rounded-lg hover:border-blue-100 transition-all cursor-pointer">
                        <input type="checkbox" name="professional_associations[]" value="International Human Rights Networks"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">International Human Rights Networks</span>
                    </label>
                    <label class="flex items-center gap-2 p-3 bg-white border border-slate-100 rounded-lg hover:border-blue-100 transition-all cursor-pointer">
                        <input type="checkbox" name="professional_associations[]" value="Local Bar Association / Legal Forums"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">Local Bar Association / Legal Forums</span>
                    </label>
                    <label class="flex items-center gap-2 p-3 bg-white border border-slate-100 rounded-lg hover:border-blue-100 transition-all cursor-pointer">
                        <input type="checkbox" name="professional_associations[]" value="Other"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">Other</span>
                        <input type="text" name="professional_associations_other" placeholder="Specify"
                            class="w-full bg-transparent border-none focus:outline-none text-[10px] font-bold text-slate-600">
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
            <a href="{{ route('registration_form_part2') }}"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Next Step</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</x-form-layout>
