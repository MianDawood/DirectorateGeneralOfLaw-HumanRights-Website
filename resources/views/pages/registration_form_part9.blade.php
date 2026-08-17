<x-form-layout
    title="Registration Form - PART-9"
    subtitle="SCHEDULE-I | PART-9: EXPANDED FINANCIAL & AUDIT INFORMATION"
    step="Step 9 of 11: Expanded Financial & Audit Information"
    backRoute="registration_form_part8"
    backLabel="Back to Part 8"
>
    <section>
        <div class="flex items-center gap-4 mb-10">
            <div class="section-icon bg-[#123B2D] text-white shadow-lg">9</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-9: Financial Information (Continued)</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">Ancillary Accounts & Funding Diversity</p>
            </div>
        </div>

        <div class="financial-card mb-12">
            <h3 class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-8 border-b border-slate-50 pb-4">Other Approved Accounts (if applicable)</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="space-y-2">
                    <label class="label-compact px-1">Account Title</label>
                    <input type="text" name="otherAccountsTitle" placeholder="Entry Title" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                </div>
                <div class="space-y-2">
                    <label class="label-compact px-1">Account IBAN</label>
                    <input type="text" name="otherAccountsIban" placeholder="PK00 XXXX XXXX XXXX" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl font-bold uppercase tracking-widest">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="label-compact px-1">Account Number</label>
                    <input type="text" name="otherAccountsNumber" placeholder="Secondary Account No." class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                </div>
                <div class="space-y-2">
                    <label class="label-compact px-1">Branch Address</label>
                    <input type="text" name="otherAccountsBranch" placeholder="Full branch location" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <div class="flex items-center justify-between mb-4">
                <h3 class="label-compact mb-0">Funding Source (Select All Applicable) *</h3>
                <span class="text-[8px] font-black text-slate-300 uppercase italic leading-none">Verified channels only</span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 mb-8">
                <label class="check-pill"><input type="checkbox" name="fundingSource[]" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Bilateral Donors</span></label>
                <label class="check-pill"><input type="checkbox" name="fundingSource[]" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">INGOs</span></label>
                <label class="check-pill"><input type="checkbox" name="fundingSource[]" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Federal / Provincial Gov</span></label>
                <label class="check-pill"><input type="checkbox" name="fundingSource[]" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Int./Nat. Organizations</span></label>
                <label class="check-pill"><input type="checkbox" name="fundingSource[]" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Voluntary Contributions</span></label>
                <label class="check-pill"><input type="checkbox" name="fundingSource[]" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Membership Fees</span></label>
                <label class="check-pill"><input type="checkbox" name="fundingSource[]" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Donations</span></label>
                <label class="check-pill"><input type="checkbox" name="fundingSource[]" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Fundraising</span></label>
                <label class="check-pill"><input type="checkbox" name="fundingSource[]" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Foundations</span></label>
                <label class="check-pill"><input type="checkbox" name="fundingSource[]" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Multilateral Agencies</span></label>
                <div class="col-span-1"><input type="text" name="fundingSourceOther" required placeholder="Other: Specify" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl text-[10px] font-semibold"></div>
            </div>
        </div>

        <div class="financial-card pt-10">
            <div class="flex items-center gap-3 mb-8 border-b border-slate-50 pb-4">
                <i data-lucide="file-check" class="w-5 h-5 text-[#02B1EB]"></i>
                <h3 class="text-[11px] font-black text-slate-800 uppercase tracking-[0.2em]">Annual Audit of Accounts</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="space-y-4">
                    <div><label class="label-compact px-1">Date of Last Audit *</label><input type="date" name="lastAuditDate" required class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                    <div><label class="label-compact px-1">Due Date of Next Audit *</label><input type="date" name="nextAuditDueDate" required class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                </div>
                <div class="space-y-4">
                    <div><label class="label-compact px-1">Name of Recognized Auditor *</label><input type="text" name="recognizedAuditor" required placeholder="Certified Professional/Firm" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl font-bold"></div>
                    <div><label class="label-compact px-1">Audit Objections (if any)</label><input type="text" name="auditObjections" placeholder="Summary of findings" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                </div>
            </div>

            <div class="space-y-4 mt-12 bg-[#02b1eb]/5 p-8 rounded-2xl border-2 border-dashed border-[#02b1eb]/20">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="label-compact px-1 mb-0">Attach Last Three Years Audit Report (if applicable)</h4>
                    <span class="bg-[#123B2D] text-white text-[8px] font-black px-3 py-1 rounded-full uppercase tracking-tighter shadow-sm">Max 10MB per unit</span>
                </div>
                <div id="auditUploadTrigger" class="flex flex-col items-center justify-center py-6 group cursor-pointer">
                    <i data-lucide="upload-cloud" class="w-12 h-12 text-[#02B1EB]/50 group-hover:text-[#02B1EB] transition-colors mb-4"></i>
                    <p class="text-[11px] font-bold text-slate-600 mb-2">Drag and drop report files here</p>
                    <p class="text-[9px] text-slate-400 font-medium">Upload up to 5 supported files (PDF, JPG, PNG)</p>
                    <p id="auditUploadName" class="mt-3 text-[11px] font-semibold text-slate-500 text-center">No file selected</p>
                    <input id="auditUploadInput" name="auditReport" type="file" multiple accept=".pdf,.jpg,.jpeg,.png" class="hidden">
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
            <a href="{{ route('registration_form_part10') }}"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 10</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>

    @push('formScripts')
        <script>
            const auditUploadTrigger = document.getElementById('auditUploadTrigger');
            const auditUploadInput = document.getElementById('auditUploadInput');
            const auditUploadName = document.getElementById('auditUploadName');
            if (auditUploadTrigger && auditUploadInput) {
                auditUploadTrigger.addEventListener('click', () => auditUploadInput.click());
                auditUploadInput.addEventListener('change', () => {
                    if (!auditUploadName) return;
                    if (auditUploadInput.files && auditUploadInput.files.length) {
                        auditUploadName.textContent = Array.from(auditUploadInput.files).map(file => file.name).join(', ');
                    } else {
                        auditUploadName.textContent = 'No file selected';
                    }
                });
            }
        </script>
    @endpush
</x-form-layout>
