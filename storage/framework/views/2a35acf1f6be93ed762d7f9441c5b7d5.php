<?php if (isset($component)) { $__componentOriginalf8d66f80f26570d03f587b9301010d1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d66f80f26570d03f587b9301010d1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-layout','data' => ['title' => 'Registration Form - PART-5','subtitle' => 'SCHEDULE-I | PART-5: PERSONNEL & FINANCIAL DETAILS','step' => 'Step 5 of 11: Personnel & Financial Details','backRoute' => 'registration_form_part4','backLabel' => 'Back to Part 4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration Form - PART-5','subtitle' => 'SCHEDULE-I | PART-5: PERSONNEL & FINANCIAL DETAILS','step' => 'Step 5 of 11: Personnel & Financial Details','backRoute' => 'registration_form_part4','backLabel' => 'Back to Part 4']); ?>
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">5</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-5: PERSONNEL/STAFF DETAILS</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">SCHEDULE-I</p>
            </div>
        </div>

        <div class="space-y-6">
            <div class="p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                <h3 class="text-[11px] font-black text-slate-900 uppercase tracking-widest mb-4">12. Details of Personnel/Staff/Employees:</h3>
                <div class="grid grid-cols-1 md:grid-cols-5 gap-5">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Total: *</label>
                        <input type="number" name="staffTotal" required placeholder="0" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px] font-bold">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">12.1 Local *</label>
                        <input type="number" name="staffLocal" required placeholder="0" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">12.2 Foreigner *</label>
                        <input type="number" name="staffForeigner" required placeholder="0" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">12.3 Male *</label>
                        <input type="number" name="staffMale" required placeholder="0" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">12.4 Female *</label>
                        <input type="number" name="staffFemale" required placeholder="0" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                    </div>
                </div>
            </div>

            <div class="p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                <h3 class="text-[11px] font-black text-slate-900 uppercase tracking-widest mb-4">13. Physical Infrastructure/Assets:</h3>
                <div class="space-y-6">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-3">13.1 Office: 13.1.1 Status (Owned/Rented/Donated/provided by Govt/ANY other) *</label>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                            <label class="flex items-center gap-2 p-3 bg-white rounded-xl border border-slate-200 hover:border-indigo-200 cursor-pointer">
                                <input type="radio" name="officeStatus" value="owned" required class="w-4 h-4 text-indigo-600">
                                <span class="text-[11px] font-bold text-slate-600">Owned</span>
                            </label>
                            <label class="flex items-center gap-2 p-3 bg-white rounded-xl border border-slate-200 hover:border-indigo-200 cursor-pointer">
                                <input type="radio" name="officeStatus" value="rented" class="w-4 h-4 text-indigo-600">
                                <span class="text-[11px] font-bold text-slate-600">Rented</span>
                            </label>
                            <label class="flex items-center gap-2 p-3 bg-white rounded-xl border border-slate-200 hover:border-indigo-200 cursor-pointer">
                                <input type="radio" name="officeStatus" value="donated" class="w-4 h-4 text-indigo-600">
                                <span class="text-[11px] font-bold text-slate-600">Donated</span>
                            </label>
                            <label class="flex items-center gap-2 p-3 bg-white rounded-xl border border-slate-200 hover:border-indigo-200 cursor-pointer">
                                <input type="radio" name="officeStatus" value="govt" class="w-4 h-4 text-indigo-600">
                                <span class="text-[11px] font-bold text-slate-600">Provided by Govt</span>
                            </label>
                            <label class="flex items-center gap-2 p-3 bg-white rounded-xl border border-slate-200 hover:border-indigo-200 cursor-pointer">
                                <input type="radio" name="officeStatus" value="other" class="w-4 h-4 text-indigo-600">
                                <span class="text-[11px] font-bold text-slate-600">Any other</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">13.1.2 Detail of physical assets details of IT, Furniture, Transport etc: *</label>
                        <textarea name="physicalAssets" required rows="3" placeholder="Detail of physical assets details of IT, Furniture, Transport etc..." class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">5</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-5: FINANCIAL DETAILS</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Organization Budget</p>
            </div>
        </div>

        <div class="space-y-6">
            <div class="p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                <h3 class="text-[11px] font-black text-slate-900 uppercase tracking-widest mb-4">14. Financial details of the Organization:</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.1 Title/Official name of Account *</label>
                        <input type="text" name="accountTitle" required placeholder="Account Title" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px] font-bold">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.2 Bank Account No: *</label>
                        <input type="text" name="bankAccountNo" required placeholder="Account Number" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.3 Name of the Bank: *</label>
                        <input type="text" name="bankName" required placeholder="Bank Name" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.4 Yearly Estimated budget: *</label>
                        <input type="number" name="yearlyBudget" required placeholder="Amount in PKR" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.4.1 Total Source Funded: *</label>
                        <input type="text" name="sourceFunded" required placeholder="Main funding sources" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.4.2 Total Foreign Funding (if any) in USD:</label>
                        <input type="number" name="foreignFunding" placeholder="Amount in USD" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                    </div>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-3">14.5 Whether the Organization has been audited? (Yes/No) *</label>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2 cursor-pointer text-[12px] font-bold text-slate-600">
                                <input type="radio" name="audited" value="yes" class="w-4 h-4 text-emerald-600"> Yes
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer text-[12px] font-bold text-slate-600">
                                <input type="radio" name="audited" value="no" class="w-4 h-4 text-emerald-600"> No
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.6 If yes, name of the Audit Firm:</label>
                        <input type="text" name="auditFirm" placeholder="Name of Audit Firm" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.7 Source of Funding: *</label>
                        <textarea name="fundingSource" required rows="2" placeholder="Source of Funding" class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div class="section-icon bg-red-600 text-white shadow-sm">5</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-5: LEGAL PROCEEDINGS</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Compliance Check</p>
            </div>
        </div>

        <div class="p-6 bg-slate-50/50 rounded-2xl border border-slate-100 space-y-6">
            <div>
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-3 leading-relaxed">15. Whether the Organization or any of its Management/Board Member or Focal person has been involved in any civil/criminal/anti state activities? (Yes/No) *</label>
                <div class="flex gap-6">
                    <label class="flex items-center gap-2 cursor-pointer text-[12px] font-bold text-slate-600">
                        <input type="radio" name="legalStatus" value="yes" class="w-4 h-4 text-red-600"> Yes
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-[12px] font-bold text-slate-600">
                        <input type="radio" name="legalStatus" value="no" class="w-4 h-4 text-red-600"> No
                    </label>
                </div>
            </div>
            <div>
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">15.1 If Yes, provide detail:</label>
                <textarea name="legalDetail" rows="3" placeholder="Provide details..." class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]"></textarea>
            </div>
            <div>
                <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">16. Any other information:</label>
                <textarea name="otherInfo" rows="2" placeholder="Any other info..." class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]"></textarea>
            </div>
        </div>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
            <div class="space-y-4">
                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Place:</label>
                    <input type="text" name="place" placeholder="City/Region" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg text-[13px]">
                </div>
                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Date:</label>
                    <input type="date" name="date" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg text-[13px]">
                </div>
            </div>
            <div id="sealSignatureUploadTrigger"
                class="flex flex-col items-center justify-center border-2 border-dashed border-slate-200 rounded-3xl p-6 bg-slate-50/30 cursor-pointer hover:border-[#02B1EB]/30 transition-colors">
                <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center mb-3">
                    <i data-lucide="user-check" class="text-slate-400 w-8 h-8"></i>
                </div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Official Seal & Signature Required</p>
                <p class="text-[8px] text-slate-300 uppercase tracking-[0.2em] mt-1">(After Physical Print)</p>
                <p id="sealSignatureUploadName" class="mt-3 text-[11px] font-semibold text-slate-500 text-center">No file selected</p>
                <input id="sealSignatureUploadInput" name="sealSignature" type="file" accept=".jpg,.jpeg,.png,.pdf" class="hidden">
            </div>
        </div>

        <div class="pt-10 border-t border-slate-100 flex flex-col items-center gap-5">
            <div class="flex flex-col sm:flex-row gap-4 w-full max-w-2xl justify-center">
                <button type="button" onclick="saveAsDraft()" 
                    class="save-draft-btn flex-1 py-4 bg-white text-slate-900 border-2 border-slate-100 font-bold text-sm rounded-2xl shadow-sm hover:bg-slate-50 hover:border-[#02b1eb]/30 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                    <i data-lucide="save" class="w-4 h-4 text-[#02B1EB]"></i>
                    <span>Save as Draft</span>
                </button>
                <a href="<?php echo e(route('registration_form_part6')); ?>"
                    class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                    <span>Continue to Step 6</span>
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </section>

    <?php $__env->startPush('formScripts'); ?>
        <script>
            const sealSignatureUploadTrigger = document.getElementById('sealSignatureUploadTrigger');
            const sealSignatureUploadInput = document.getElementById('sealSignatureUploadInput');
            const sealSignatureUploadName = document.getElementById('sealSignatureUploadName');
            if (sealSignatureUploadTrigger && sealSignatureUploadInput) {
                sealSignatureUploadTrigger.addEventListener('click', () => sealSignatureUploadInput.click());
                sealSignatureUploadInput.addEventListener('change', () => {
                    sealSignatureUploadName.textContent = sealSignatureUploadInput.files && sealSignatureUploadInput.files.length
                        ? sealSignatureUploadInput.files[0].name
                        : 'No file selected';
                });
            }
        </script>
    <?php $__env->stopPush(); ?>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/registration_form_part5.blade.php ENDPATH**/ ?>