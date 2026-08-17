<x-form-layout
    title="Registration Form - PART-8"
    subtitle="SCHEDULE-I | PART-8: FINANCIAL & BANKING INFORMATION"
    step="Step 8 of 11: Financial & Banking Information"
    backRoute="registration_form_part7"
    backLabel="Back to Part 7"
>
    <section>
        <div class="flex items-center gap-4 mb-10">
            <div class="section-icon bg-[#123B2D] text-white shadow-lg">8</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-8: Financial Information</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">Taxation & Fiscal Disclosure</p>
            </div>
        </div>

        <div class="financial-card mb-8">
            <h3 class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-8 border-b border-slate-50 pb-4">Tax & Registration Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="label-compact px-1">National Tax Number (NTN) *</label>
                    <input type="text" name="ntn" required placeholder="Enter NTN" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-xl hover:bg-white focus:bg-white transition-colors font-bold tracking-widest uppercase">
                </div>
                <div class="space-y-2">
                    <label class="label-compact px-1">Tax Exemption Reference (if applicable)</label>
                    <input type="text" name="taxExemptionRef" placeholder="Entry Reference Number" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-xl hover:bg-white focus:bg-white transition-colors">
                </div>
            </div>
        </div>

        <div class="financial-card space-y-10">
            <div class="flex items-center justify-between border-b border-slate-50 pb-4">
                <h3 class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">Bank Account Details (Principal)</h3>
                <div class="flex items-center gap-2 text-[#02B1EB] bg-[#02b1eb]/10 px-3 py-1 rounded-full text-[9px] font-black uppercase">
                    <i data-lucide="shield-check" class="w-3 h-3"></i> Secure Link Expected
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="label-compact px-1">Account Title *</label>
                    <input type="text" name="accountTitle" required placeholder="NGO Official Name" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-xl hover:bg-white focus:bg-white transition-colors font-bold">
                </div>
                <div class="space-y-2">
                    <label class="label-compact px-1">Account IBAN *</label>
                    <input type="text" name="accountIban" required placeholder="PK00 XXXX XXXX XXXX XXXX" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-xl hover:bg-white focus:bg-white transition-colors font-bold tracking-widest uppercase">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="space-y-2 md:col-span-1">
                    <label class="label-compact px-1">Account Number *</label>
                    <input type="text" name="accountNumber" required placeholder="Bank Account No." class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-xl hover:bg-white focus:bg-white transition-colors font-bold">
                </div>
                <div class="space-y-2 md:col-span-2">
                    <label class="label-compact px-1">Branch Address *</label>
                    <input type="text" name="branchAddress" required placeholder="Full bank branch location & city" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-xl hover:bg-white focus:bg-white transition-colors">
                </div>
            </div>

            <div class="p-6 bg-blue-50/30 border border-blue-100 rounded-2xl flex items-start gap-4">
                <i data-lucide="info" class="w-5 h-5 text-blue-400 mt-1"></i>
                <p class="text-[10px] text-blue-600/80 leading-relaxed font-medium italic">Note: Please ensure all bank details match the official registration certificate of the NGO. Verified Principal Account is mandatory for grant disbursements.</p>
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
            <a href="{{ route('registration_form_part9') }}"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 9</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</x-form-layout>
