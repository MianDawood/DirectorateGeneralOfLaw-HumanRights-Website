<?php if (isset($component)) { $__componentOriginalf8d66f80f26570d03f587b9301010d1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d66f80f26570d03f587b9301010d1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-layout','data' => ['title' => 'Registration Form - PART-H','subtitle' => 'SCHEDULE-I | PART-8: FINANCIAL INFORMATION','step' => 'Step 8 of 11: Financial Information','backRoute' => 'registration_form_part7','backLabel' => 'Back to Part 7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration Form - PART-H','subtitle' => 'SCHEDULE-I | PART-8: FINANCIAL INFORMATION','step' => 'Step 8 of 11: Financial Information','backRoute' => 'registration_form_part7','backLabel' => 'Back to Part 7']); ?>
    <!-- Tax & Registration Information -->
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Tax & Registration Information</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">National Tax Number (NTN) <span class="text-red-500">*</span></label>
                <input type="text" name="ntn_number" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Tax Exemption Reference (if applicable)</label>
                <input type="text" name="tax_exemption_reference"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
        </div>
    </section>

    <!-- Bank Accounts -->
    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Bank Accounts</h2>
            </div>
        </div>

        <!-- Principal Account -->
        <div class="mb-8">
            <h3 class="font-outfit text-sm font-bold text-slate-700 uppercase tracking-wide mb-4">Principal Account</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Account Title <span class="text-red-500">*</span></label>
                    <input type="text" name="principal_account_title" required
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Account IBAN <span class="text-red-500">*</span></label>
                    <input type="text" name="principal_account_iban" required
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Account Number <span class="text-red-500">*</span></label>
                    <input type="text" name="principal_account_number" required
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Branch Address <span class="text-red-500">*</span></label>
                    <textarea name="principal_branch_address" required rows="2"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
                </div>
            </div>
        </div>

        <!-- Other Approved Accounts -->
        <div>
            <h3 class="font-outfit text-sm font-bold text-slate-700 uppercase tracking-wide mb-4">Other Approved Accounts (if applicable)</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Account Title</label>
                    <input type="text" name="other_account_title"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Account IBAN</label>
                    <input type="text" name="other_account_iban"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Account Number</label>
                    <input type="text" name="other_account_number"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Branch Address</label>
                    <textarea name="other_branch_address" rows="2"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
                </div>
            </div>
        </div>
    </section>

    <!-- Funding Source -->
    <section class="pt-10 border-t border-slate-100">
        <div class="space-y-3">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Funding Source <span class="text-red-500">*</span></label>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="funding_sources_financial[]" value="Bilateral Donors" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Bilateral Donors</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="funding_sources_financial[]" value="INGOs" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">INGOs</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="funding_sources_financial[]" value="Federal / Provincial Government" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Federal / Provincial Government</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="funding_sources_financial[]" value="National / International Organizations" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">National / International Organizations</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="funding_sources_financial[]" value="Voluntary Contributions" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Voluntary Contributions</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="funding_sources_financial[]" value="Membership Fees" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Membership Fees</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="funding_sources_financial[]" value="Donations" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Donations</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="funding_sources_financial[]" value="Fundraising" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Fundraising</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="funding_sources_financial[]" value="Foundations" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Foundations</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="funding_sources_financial[]" value="Multilateral Agencies" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Multilateral Agencies</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group md:col-span-2 lg:col-span-3">
                    <input type="checkbox" name="funding_sources_financial[]" value="Other" required class="w-4 h-4 rounded text-[#02B1EB] focus:ring-0">
                    <span class="text-[11px] w-32 font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Other (Specify)</span>
                    <input type="text" name="funding_sources_financial_other"  class="w-full bg-transparent border border-slate-200 focus:border-[#02B1EB] focus:outline-none p-2 rounded-md text-[11px] font-bold text-slate-600">
                </label>
            </div>
        </div>
    </section>

    <!-- Annual Audit of Accounts -->
    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Annual Audit of Accounts</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Date of Last Audit <span class="text-red-500">*</span></label>
                <input type="date" name="last_audit_date" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Name of Recognized Auditor <span class="text-red-500">*</span></label>
                <input type="text" name="auditor_name" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Audit Objections (if any)</label>
                <textarea name="audit_objections" rows="2"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Due Date of Next Audit <span class="text-red-500">*</span></label>
                <input type="date" name="next_audit_due_date" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Attach Last Three Years' Audit Reports (if applicable)</label>
                <input type="file" name="audit_reports" multiple accept=".pdf,.doc,.docx"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px] pt-2">
                <p class="text-[9px] text-slate-400 mt-1">Accepted formats: PDF, DOC, DOCX (Max size: 20MB each)</p>
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
            <a href="<?php echo e(route('registration_form_part9')); ?>"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 9</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf8d66f80f26570d03f587b9301010d1d)): ?>
<?php $attributes = $__attributesOriginalf8d66f80f26570d03f587b9301010d1d; ?>
<?php unset($__attributesOriginalf8d66f80f26570d03f587b9301010d1d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8d66f80f26570d03f587b9301010d1d)): ?>
<?php $component = $__componentOriginalf8d66f80f26570d03f587b9301010d1d; ?>
<?php unset($__componentOriginalf8d66f80f26570d03f587b9301010d1d); ?>
<?php endif; ?>
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/registration_form_part8.blade.php ENDPATH**/ ?>