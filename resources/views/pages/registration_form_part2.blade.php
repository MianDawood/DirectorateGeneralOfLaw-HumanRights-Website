<x-form-layout
    title="Registration Form - PART-B"
    subtitle="SCHEDULE-I | PART-2: ADDRESS INFORMATION"
    step="Step 2 of 11: Address Information"
    backRoute="registration_form_part1"
    backLabel="Back to Part 1"
>

    <!-- Head Office -->
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">
                    Head Office
                </h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Registered Address <span class="text-red-500">*</span>
                </label>
                <textarea name="head_registered_address" required rows="2"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
            </div>
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Postal Address <span class="text-red-500">*</span>
                </label>
                <textarea name="head_postal_address" required rows="2"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
            </div>

            <!-- Contact details (Official) -->
            <div class="col-span-full">
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">
                    Contact Details ( Official )
                </h2>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Telephone
                </label>
                <input type="tel" name="head_telephone"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Mobile (Official) <span class="text-red-500">*</span>
                </label>
                <input type="tel" name="head_mobile" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Fax <span class="text-red-500">*</span>
                </label>
                <input type="text" name="head_fax" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Email ID <span class="text-red-500">*</span>
                </label>
                <input type="email" name="head_email" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Official Website
                </label>
                <input type="url" name="head_website"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Other Social Media
                </label>
                <input type="text" name="head_social_media"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
        </div>
    </section>

    <!-- Regional Offices -->
    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">
                    Regional Offices
                </h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Postal Address <span class="text-red-500">*</span>
                </label>
                <textarea name="regional_postal_address" required rows="2"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
            </div>

            <!-- Contact details (Official) -->
            <div class="col-span-full">
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">
                    Contact Details ( Official )
                </h2>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Telephone
                </label>
                <input type="tel" name="regional_telephone"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Mobile (Official) <span class="text-red-500">*</span>
                </label>
                <input type="tel" name="regional_mobile" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Fax <span class="text-red-500">*</span>
                </label>
                <input type="text" name="regional_fax" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Email ID <span class="text-red-500">*</span>
                </label>
                <input type="email" name="regional_email" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Official Website
                </label>
                <input type="url" name="regional_website"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Other Social Media
                </label>
                <input type="text" name="regional_social_media"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
        </div>
    </section>

    <!-- Local / Field Offices -->
    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">
                    Local / Fields offices <span class="text-red-500">*</span>
                </h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Postal Addressess
                </label>
                <textarea name="local_field_postal_address" rows="2"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
            </div>

            <!-- Contact details (Official) -->
            <div class="col-span-full">
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">
                    Contact Details ( Official )
                </h2>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Telephone
                </label>
                <input type="tel" name="local_field_telephone"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Mobile (Official) <span class="text-red-500">*</span>
                </label>
                <input type="tel" name="local_field_mobile" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Fax <span class="text-red-500">*</span>
                </label>
                <input type="text" name="local_field_fax" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Email ID <span class="text-red-500">*</span>
                </label>
                <input type="email" name="local_field_email" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Official Website
                </label>
                <input type="url" name="local_field_website"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">
                    Other Social Media
                </label>
                <input type="text" name="local_field_social_media"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
            </div>
        </div>
    </section>

    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest text-center">
        *Operational area to include branch and sub offices in a District, City, Town or Union Council.
    </p>

    <!-- Next Step Action -->
    <div class="pt-10 border-t border-slate-100 flex flex-col items-center gap-5">
        <div class="flex flex-col sm:flex-row gap-4 w-full max-w-2xl justify-center">
            <button type="button" onclick="saveAsDraft()"
                class="save-draft-btn flex-1 py-4 bg-white text-slate-900 border-2 border-slate-100 font-bold text-sm rounded-2xl shadow-sm hover:bg-slate-50 hover:border-[#02b1eb]/30 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <i data-lucide="save" class="w-4 h-4 text-[#02B1EB]"></i>
                <span>Save as Draft</span>
            </button>
            <a href="{{ route('registration_form_part3') }}"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 3</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>
        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
            Step 2 of 11: Address Information
        </p>
    </div>
</x-form-layout>
