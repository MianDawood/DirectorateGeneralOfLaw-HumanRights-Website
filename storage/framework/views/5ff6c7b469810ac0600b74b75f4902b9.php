<?php if (isset($component)) { $__componentOriginalf8d66f80f26570d03f587b9301010d1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d66f80f26570d03f587b9301010d1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-layout','data' => ['title' => 'Registration Form - PART-4','subtitle' => 'SCHEDULE-I | PART-4: MANAGEMENT & FOCAL PERSON','step' => 'Step 4 of 11: Management & Focal Person','backRoute' => 'registration_form_part3','backLabel' => 'Back to Part 3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration Form - PART-4','subtitle' => 'SCHEDULE-I | PART-4: MANAGEMENT & FOCAL PERSON','step' => 'Step 4 of 11: Management & Focal Person','backRoute' => 'registration_form_part3','backLabel' => 'Back to Part 3']); ?>
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">4</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-4: Management Team / Board</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Leadership Details</p>
            </div>
        </div>

        <div class="space-y-10" data-repeat-group="board_members">
            <div id="board-members-list"></div>

            <div class="flex justify-center pt-2">
                <button type="button" class="add-project-row-btn" data-add-row="board_members">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    <span>Add another member</span>
                </button>
            </div>
        </div>

        <template id="board-member-row-template">
            <?php echo $__env->make('pages.partials.board_member_row', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </template>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">4</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-4: Focal Person Details</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Primary Point of Contact</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Name of Focal Person *</label>
                <input type="text" name="focalName" required placeholder="Full legal name" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg text-[13px] font-bold">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Designation *</label>
                <input type="text" name="focalDesignation" required placeholder="Designation" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Contact Details (Official) Telephone</label>
                <input type="tel" name="focalTelephone" placeholder="+92-XXX-XXXXXXX" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Mobile (Primary) *</label>
                <input type="tel" name="focalMobile" required placeholder="+92-3XX-XXXXXXX" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Fax</label>
                <input type="text" name="focalFax" placeholder="Fax Number" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Email ID *</label>
                <input type="email" name="focalEmail" required placeholder="focal.person@ngo.org" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Official Website</label>
                <input type="url" name="focalWebsite" placeholder="https://www.ngo.org" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Other Social Media</label>
                <input type="text" name="focalSocialMedia" placeholder="Social Media URLs" class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg text-[13px]">
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
            <a href="<?php echo e(route('registration_form_part5')); ?>"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 5</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>

    <?php $__env->startPush('formScripts'); ?>
        <script src="/js/registration-repeat-rows.js"></script>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/registration_form_part4.blade.php ENDPATH**/ ?>