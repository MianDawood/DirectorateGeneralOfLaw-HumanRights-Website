<?php if (isset($component)) { $__componentOriginalf8d66f80f26570d03f587b9301010d1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d66f80f26570d03f587b9301010d1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-layout','data' => ['title' => 'Registration Form - PART-11','subtitle' => 'SCHEDULE-I | PART-11: SECURITY AGREEMENT & ARRANGEMENTS','step' => 'Step 11 of 11: Security Agreement & Arrangements','backRoute' => 'registration_form_part10','backLabel' => 'Back to Part 10']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration Form - PART-11','subtitle' => 'SCHEDULE-I | PART-11: SECURITY AGREEMENT & ARRANGEMENTS','step' => 'Step 11 of 11: Security Agreement & Arrangements','backRoute' => 'registration_form_part10','backLabel' => 'Back to Part 10']); ?>
    <section>
        <div class="flex items-center gap-4 mb-10">
            <div class="section-icon bg-[#123B2D] text-white shadow-lg">11</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-11: Security Agreement and Arrangements</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">Protection & Compliance Protocols</p>
            </div>
        </div>

        <div class="mb-12">
            <div class="flex items-center justify-between mb-8 border-b border-slate-50 pb-4">
                <h3 class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">Local Security Organizations (if Hired)</h3>
                <div class="flex gap-4">
                    <label class="radio-pill px-6"><input type="radio" name="local_security" value="yes" class="w-3 h-3"><span>Yes</span></label>
                    <label class="radio-pill px-6"><input type="radio" name="local_security" value="no" class="w-3 h-3"><span>No</span></label>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="security-card">
                    <span class="sno-badge">S.No. 1</span>
                    <div class="space-y-4 pt-2">
                        <div><label class="label-compact">Security Company Name</label><input type="text" name="sec_company1_name" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                        <div><label class="label-compact">Address</label><input type="text" name="sec_company1_address" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div><label class="label-compact">Contact Person</label><input type="text" name="sec_company1_contact" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                            <div><label class="label-compact">Telephone</label><input type="tel" name="sec_company1_telephone" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                        </div>
                        <div><label class="label-compact">Email</label><input type="email" name="sec_company1_email" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                        <div><label class="label-compact">Agreement Duration (From - To)</label><input type="text" name="sec_company1_duration" placeholder="e.g., Jan 2023 - Dec 2024" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl font-medium tracking-tight"></div>
                    </div>
                </div>

                <div class="security-card">
                    <span class="sno-badge">S.No. 2</span>
                    <div class="space-y-4 pt-2">
                        <div><label class="label-compact">Security Company Name</label><input type="text" name="sec_company2_name" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                        <div><label class="label-compact">Address</label><input type="text" name="sec_company2_address" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div><label class="label-compact">Contact Person</label><input type="text" name="sec_company2_contact" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                            <div><label class="label-compact">Telephone</label><input type="tel" name="sec_company2_telephone" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                        </div>
                        <div><label class="label-compact">Email</label><input type="email" name="sec_company2_email" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                        <div><label class="label-compact">Agreement Duration (From - To)</label><input type="text" name="sec_company2_duration" placeholder="e.g., Jan 2023 - Dec 2024" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl font-medium tracking-tight"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="security-card">
            <div class="flex items-center justify-between mb-8 border-b border-slate-50 pb-4">
                <h3 class="text-[11px] font-black text-slate-800 uppercase tracking-[0.2em]">Other Security Arrangements (if applicable)</h3>
                <div class="flex gap-4">
                    <label class="radio-pill px-6"><input type="radio" name="other_security" value="yes" class="w-3 h-3"><span>Yes</span></label>
                    <label class="radio-pill px-6"><input type="radio" name="other_security" value="no" class="w-3 h-3"><span>No</span></label>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="label-compact px-1">If Yes, Name of Security Agency</label>
                    <input type="text" name="other_agency_name" placeholder="Agency name" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                </div>
                <div class="space-y-2">
                    <label class="label-compact px-1">Term of Security Agreement: From - To</label>
                    <input type="text" name="other_agency_term" placeholder="Validity Period" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                </div>
                <div class="space-y-2 md:col-span-2">
                    <label class="label-compact px-1">Nature of Protection</label>
                    <textarea name="other_agency_nature" rows="3" placeholder="Description of security coverage & protection type" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl resize-none"></textarea>
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
            <button type="submit"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Execute Final Submission</span>
                <i data-lucide="send" class="w-4 h-4"></i>
            </button>
        </div>
    </div>

    <!-- Success Message Overlay -->
    <div id="successMessage" class="hidden fixed inset-0 bg-slate-950/40 backdrop-blur-xl flex items-center justify-center z-[500] p-6">
        <div class="bg-white rounded-[3rem] p-12 md:p-16 max-w-lg w-full shadow-3xl text-center border border-slate-100">
            <div class="w-24 h-24 bg-indigo-100 text-indigo-600 rounded-[2rem] flex items-center justify-center mx-auto mb-8 shadow-sm">
                <i data-lucide="shield-check" class="w-12 h-12"></i>
            </div>
            <h3 class="font-outfit text-2xl md:text-3xl font-black text-slate-900 mb-4 uppercase tracking-tighter">Registration Packet Transmitted</h3>
            <p class="text-slate-500 text-sm md:text-base mb-10 leading-relaxed italic font-medium">Your comprehensive Schedule-I application data, including full Security Protocols & Asset Declarations, has been securely transmitted to the Directorate HQ.</p>
            <a href="<?php echo e(route('ngo_required_documents')); ?>" class="block w-full py-5 bg-slate-950 text-white font-black rounded-2xl hover:bg-indigo-700 transition-all text-center uppercase tracking-widest text-[11px] shadow-2xl">Return to Portal Dashboard</a>
        </div>
    </div>

    <?php $__env->startPush('formScripts'); ?>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/registration_form_part11.blade.php ENDPATH**/ ?>