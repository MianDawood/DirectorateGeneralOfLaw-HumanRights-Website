<x-form-layout
    title="Registration Form - PART-I"
    subtitle="SCHEDULE-I | PART-9: ASSETS"
    step="Step 9 of 11: Assets"
    backRoute="registration_form_part8"
    backLabel="Back to Part 8"
>
    <!-- Movable Assets -->
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Movable Assets (Vehicles, Equipment, Endowments, etc.)</h2>
            </div>
        </div>

        <div class="space-y-6">
            <h3 class="font-outfit text-sm font-bold text-slate-700 uppercase tracking-wide">Vehicle Details (If applicable)</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Type of Vehicle</label>
                    <input type="text" name="vehicle_type"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Registration Number</label>
                    <input type="text" name="vehicle_registration_number"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Chassis Number</label>
                    <input type="text" name="vehicle_chassis_number"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Year of Manufacture</label>
                    <input type="number" name="vehicle_year_of_manufacture" min="1900" max="2099"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Model</label>
                    <input type="text" name="vehicle_model"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Make</label>
                    <input type="text" name="vehicle_make"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
            </div>
        </div>
    </section>

    <!-- Immovable Assets -->
    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Immovable Assets (Office Premises, Property Under Non-Governmental Organization Use)</h2>
            </div>
        </div>

        <div class="space-y-6">
            <h3 class="font-outfit text-sm font-bold text-slate-700 uppercase tracking-wide">Property Details</h3>

            <!-- Status -->
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">Status</label>
                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="radio" name="property_status" value="Owned" class="w-3.5 h-3.5 text-[#02B1EB] focus:ring-0"> Owned
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="radio" name="property_status" value="Leased" class="w-3.5 h-3.5 text-[#02B1EB] focus:ring-0"> Leased
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="radio" name="property_status" value="Rented" class="w-3.5 h-3.5 text-[#02B1EB] focus:ring-0"> Rented
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="radio" name="property_status" value="Donated" class="w-3.5 h-3.5 text-[#02B1EB] focus:ring-0"> Donated
                    </label>
                </div>
            </div>

            <!-- Location / Address -->
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Location / Address</label>
                <textarea name="property_location" rows="2"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
            </div>

            <!-- Usage -->
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">Usage</label>
                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="checkbox" name="property_usage[]" value="Office" class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0"> Office
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="checkbox" name="property_usage[]" value="Training Center" class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0"> Training Center
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="checkbox" name="property_usage[]" value="Shelter" class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0"> Shelter
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="checkbox" name="property_usage[]" value="Other" class="w-3.5 h-3.5 rounded text-[#02B1EB] focus:ring-0"> Other
                        <input type="text" name="property_usage_other" placeholder="Specify" class="w-40 bg-transparent border-b border-slate-200 focus:border-[#02B1EB] focus:outline-none text-[11px] font-bold text-slate-600">
                    </label>
                </div>
            </div>

            <!-- Lease Agreement -->
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">Lease Agreement (If applicable)</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="radio" name="lease_agreement" value="Yes" class="w-3.5 h-3.5 text-[#02B1EB] focus:ring-0"> Yes
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="radio" name="lease_agreement" value="No" class="w-3.5 h-3.5 text-[#02B1EB] focus:ring-0"> No
                    </label>
                </div>
            </div>

            <!-- Source of Property Acquisition -->
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">Source of Property Acquisition</label>
                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="radio" name="property_acquisition_source" value="NGO-owned" class="w-3.5 h-3.5 text-[#02B1EB] focus:ring-0"> NGO-owned
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="radio" name="property_acquisition_source" value="Donor-funded" class="w-3.5 h-3.5 text-[#02B1EB] focus:ring-0"> Donor-funded
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] font-bold text-slate-600">
                        <input type="radio" name="property_acquisition_source" value="Other" class="w-3.5 h-3.5 text-[#02B1EB] focus:ring-0"> Other
                        <input type="text" name="property_acquisition_source_other" placeholder="Specify" class="w-40 bg-transparent border-b border-slate-200 focus:border-[#02B1EB] focus:outline-none text-[11px] font-bold text-slate-600">
                    </label>
                </div>
            </div>
        </div>
    </section>

    <!-- Car Rental Services -->
    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Car Rental Services (If applicable)</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Name of Rental Company</label>
                <input type="text" name="rental_company_name"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Company Address</label>
                <textarea name="rental_company_address" rows="2"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
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
            <a href="{{ route('registration_form_part10') }}"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 10</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</x-form-layout>
