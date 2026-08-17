<x-form-layout
    title="Registration Form - PART-1"
    subtitle="SCHEDULE-I | PART-1: GENERAL INFORMATION"
    step="Step 1 of 11: General Information"
>
    <!-- PART-1: General Information -->
    <section>
        <div class="flex items-center gap-3 mb-6">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">1</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-1: General Information</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Identity & Basic Details</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">1. Name of Organization *</label>
                <input type="text" name="ngoName" required placeholder="Full legal name"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">2. Date of Establishment *</label>
                <input type="date" name="estDate" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[11px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">3. Registration Authority</label>
                <input type="text" name="registrationAuthority" value="Directorate General Law & HR"
                    class="w-full input-compact bg-slate-100 border border-slate-200 rounded-lg text-slate-500 font-bold italic text-[11px]">
            </div>
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">4. Reg No / Date (If Any)</label>
                <input type="text" name="regDetails" placeholder="e.g. REG-123 / Jan 2024"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">5. District *</label>
                <select name="district" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[11px]">
                    <option value="">— Select District —</option>
                    <option value="Abbottabad">Abbottabad</option>
                    <option value="Bajaur">Bajaur</option>
                    <option value="Bannu">Bannu</option>
                    <option value="Batagram">Batagram</option>
                    <option value="Buner">Buner</option>
                    <option value="Charsadda">Charsadda</option>
                    <option value="Chitral">Chitral</option>
                    <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                    <option value="Hangu">Hangu</option>
                    <option value="Haripur">Haripur</option>
                    <option value="Karak">Karak</option>
                    <option value="Khyber">Khyber</option>
                    <option value="Kohat">Kohat</option>
                    <option value="Kohistan">Kohistan</option>
                    <option value="Kurram">Kurram</option>
                    <option value="Lakki Marwat">Lakki Marwat</option>
                    <option value="Lower Dir">Lower Dir</option>
                    <option value="Lower Kohistan">Lower Kohistan</option>
                    <option value="Malakand">Malakand</option>
                    <option value="Mansehra">Mansehra</option>
                    <option value="Mardan">Mardan</option>
                    <option value="Mohmand">Mohmand</option>
                    <option value="North Waziristan">North Waziristan</option>
                    <option value="Nowshera">Nowshera</option>
                    <option value="Orakzai">Orakzai</option>
                    <option value="Peshawar">Peshawar</option>
                    <option value="Shangla">Shangla</option>
                    <option value="South Waziristan">South Waziristan</option>
                    <option value="Swabi">Swabi</option>
                    <option value="Swat">Swat</option>
                    <option value="Tank">Tank</option>
                    <option value="Torghar">Torghar</option>
                    <option value="Upper Dir">Upper Dir</option>
                    <option value="Upper Kohistan">Upper Kohistan</option>
                </select>
            </div>

            <div class="md:col-span-2 pt-1">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">6. Type of NGO *</label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                    <label class="flex items-center gap-2 p-2 bg-slate-50 rounded-lg border border-slate-100 hover:border-blue-200 transition-all cursor-pointer">
                        <input type="checkbox" name="type[]" value="societies"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">Societies</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 bg-slate-50 rounded-lg border border-slate-100 hover:border-blue-200 transition-all cursor-pointer">
                        <input type="checkbox" name="type[]" value="trust"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">Trust</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 bg-slate-50 rounded-lg border border-slate-100 hover:border-blue-200 transition-all cursor-pointer">
                        <input type="checkbox" name="type[]" value="foundations"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">Foundations</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 bg-slate-50 rounded-lg border border-slate-100 hover:border-blue-200 transition-all cursor-pointer">
                        <input type="checkbox" name="type[]" value="associations"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[10px] font-bold text-slate-600">Associations</span>
                    </label>
                </div>
            </div>

            <div class="md:col-span-2 pt-1">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">7. HR Field Areas *</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-1.5">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="hrField[]" value="protection"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Protection</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="hrField[]" value="legal_aid"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Legal Aid</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="hrField[]" value="gender"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Gender Equality</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="hrField[]" value="child"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Child Rights</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="hrField[]" value="refugees" checked
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] font-bold text-[#02B1EB]">Refugee Rights</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="hrField[]" value="disabilities"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Disabilities</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="hrField[]" value="minorities"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Minority Rights</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="hrField[]" value="expression"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Free Expression</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="hrField[]" value="labor"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0">
                        <span class="text-[11px] text-slate-600 group-hover:text-slate-900 transition-colors">Labor & Employment</span>
                    </label>
                </div>
            </div>
        </div>
    </section>

    <!-- Geographical Scope -->
    <section class="pt-8 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-6">
            <div class="section-icon bg-[#02b1eb] text-white shadow-sm">1</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-1: Geographical Scope</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">7. Operating Jurisdictions</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="p-4 bg-slate-50/50 rounded-xl border border-slate-100">
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Local (Districts)</label>
                <input type="text" name="localDistrict" placeholder="Districts"
                    class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[11px]">
            </div>
            <div class="p-4 bg-slate-50/50 rounded-xl border border-slate-100">
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Provincial</label>
                <input type="text" name="provincial" placeholder="KP / GB"
                    class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[11px]">
            </div>
            <div class="p-4 bg-slate-50/50 rounded-xl border border-slate-100">
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">National</label>
                <input type="text" name="national" placeholder="Provinces"
                    class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[11px]">
            </div>
        </div>
    </section>

    <!-- Previous Registration -->
    <section class="pt-8 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-6">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">1</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-1: Previous History</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">8. Administrative Records</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-1">
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Authority</label>
                <input type="text" name="prevAuth" placeholder="Past authority"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg text-[11px]">
            </div>
            <div class="md:col-span-1">
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Reg No & Date</label>
                <input type="text" name="prevRegNo" placeholder="No / Date"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg text-[11px]">
            </div>
            <div class="md:col-span-1">
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Work Years</label>
                <input type="number" name="workDuration" placeholder="e.g. 5"
                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg text-[11px]">
            </div>
        </div>
    </section>

    <!-- Leadership -->
    <section class="pt-8 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-6">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">1</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-1: Leadership</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">9. Head & 10. Focal Person *</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="relative">
                <i class="fas fa-user-circle absolute left-3 top-1/2 -translate-y-1/2 text-slate-300 text-[12px]"></i>
                <input type="text" name="headName" required placeholder="Name of Head"
                    class="w-full input-compact pl-10 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-bold text-slate-700">
            </div>
            <div class="relative">
                <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-slate-300 text-[12px]"></i>
                <input type="text" name="focalName" required placeholder="Name of Focal Person"
                    class="w-full input-compact pl-10 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-bold text-slate-700">
            </div>
        </div>
    </section>

    <!-- Verification -->
    <section class="pt-8 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-6">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">1</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-1: Verification</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">11. Bye-laws & 12. Membership</p>
            </div>
        </div>
        <div class="space-y-6">
            <div class="bg-slate-50/50 p-3 rounded-xl border border-slate-100">
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2.5">11. Copy of Appendix of Bye-laws?</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-1.5 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="radio" name="byeLaws" value="yes" class="w-3 h-3 text-blue-600"> Yes
                    </label>
                    <label class="flex items-center gap-1.5 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="radio" name="byeLaws" value="no" class="w-3 h-3 text-blue-600"> No
                    </label>
                    <label class="flex items-center gap-1.5 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="radio" name="byeLaws" value="other" class="w-3 h-3 text-blue-600"> Other
                    </label>
                </div>
            </div>
            <div>
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2.5">12. Membership/Affiliation (If Any)</label>
                <div class="grid grid-cols-2 gap-2">
                    <label class="flex items-center gap-2 p-2 bg-white border border-slate-100 rounded-lg hover:border-blue-100 transition-all cursor-pointer">
                        <input type="checkbox" name="membership[]" value="nhri"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB]">
                        <span class="text-[9px] font-bold text-slate-500">NHRI / Commissions</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 bg-white border border-slate-100 rounded-lg hover:border-blue-100 transition-all cursor-pointer">
                        <input type="checkbox" name="membership[]" value="networks"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB]">
                        <span class="text-[9px] font-bold text-slate-500">Int'l HR Networks</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 bg-white border border-slate-100 rounded-lg hover:border-blue-100 transition-all cursor-pointer">
                        <input type="checkbox" name="membership[]" value="legal"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB]">
                        <span class="text-[9px] font-bold text-slate-500">Legal Forums</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 bg-white border border-slate-100 rounded-lg hover:border-blue-100 transition-all cursor-pointer">
                        <input type="checkbox" name="membership[]" value="other"
                            class="w-3.5 h-3.5 rounded text-[#02B1EB]">
                        <span class="text-[9px] font-bold text-slate-500">Other</span>
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
