<?php if (isset($component)) { $__componentOriginalf8d66f80f26570d03f587b9301010d1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d66f80f26570d03f587b9301010d1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-layout','data' => ['title' => 'Registration Form - PART-D','subtitle' => 'SCHEDULE-I | PART-4: MANAGEMENT & STAFF','step' => 'Step 4 of 10: Management & Staff','backRoute' => 'registration_form_part3','backLabel' => 'Back to Part 3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration Form - PART-D','subtitle' => 'SCHEDULE-I | PART-4: MANAGEMENT & STAFF','step' => 'Step 4 of 10: Management & Staff','backRoute' => 'registration_form_part3','backLabel' => 'Back to Part 3']); ?>
    <!-- Total Number of Employees -->
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Total Number of Employees</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Local Employees <span class="text-red-500">*</span></label>
                <input type="number" name="local_employees" required min="0"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Foreign Employees (if applicable)</label>
                <input type="number" name="foreign_employees" min="0"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
        </div>
    </section>

    <!-- Head of the Non-Governmental Organization/Chief Administrator -->
    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Head of the Non-Governmental Organization / Chief Administrator</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Name <span class="text-red-500">*</span></label>
                <input type="text" name="head_name" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Designation <span class="text-red-500">*</span></label>
                <input type="text" name="head_designation" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Permanent Address <span class="text-red-500">*</span></label>
                <textarea name="head_permanent_address" required rows="2"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">CNIC No. <span class="text-red-500">*</span></label>
                <input type="text" name="head_cnic" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Nationality <span class="text-red-500">*</span></label>
                <input type="text" name="head_nationality" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div class="col-span-full">
                <h3 class="font-outfit text-sm font-bold text-slate-700 uppercase tracking-wide mb-4">Contact Details</h3>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Telephone No.</label>
                <input type="tel" name="head_telephone"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Mobile No. <span class="text-red-500">*</span></label>
                <input type="tel" name="head_mobile" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Email <span class="text-red-500">*</span></label>
                <input type="email" name="head_email" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
        </div>
    </section>

    <!-- Treasurer/Accountant -->
    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Treasurer / Accountant</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Name <span class="text-red-500">*</span></label>
                <input type="text" name="treasurer_name" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Designation <span class="text-red-500">*</span></label>
                <input type="text" name="treasurer_designation" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">CNIC No. <span class="text-red-500">*</span></label>
                <input type="text" name="treasurer_cnic" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Nationality <span class="text-red-500">*</span></label>
                <input type="text" name="treasurer_nationality" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Permanent Address <span class="text-red-500">*</span></label>
                <textarea name="treasurer_permanent_address" required rows="2"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
            </div>
            <div class="col-span-full">
                <h3 class="font-outfit text-sm font-bold text-slate-700 uppercase tracking-wide mb-4">Contact Details (Official)</h3>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Telephone No.</label>
                <input type="tel" name="treasurer_telephone"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Mobile No. <span class="text-red-500">*</span></label>
                <input type="tel" name="treasurer_mobile" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Email <span class="text-red-500">*</span></label>
                <input type="email" name="treasurer_email" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
        </div>
    </section>

    <!-- Secretary -->
    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Secretary</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Name <span class="text-red-500">*</span></label>
                <input type="text" name="secretary_name" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">CNIC No. <span class="text-red-500">*</span></label>
                <input type="text" name="secretary_cnic" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div class="md:col-span-2">
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Permanent Address <span class="text-red-500">*</span></label>
                <textarea name="secretary_permanent_address" required rows="2"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Nationality <span class="text-red-500">*</span></label>
                <input type="text" name="secretary_nationality" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div class="col-span-full">
                <h3 class="font-outfit text-sm font-bold text-slate-700 uppercase tracking-wide mb-4">Contact Details</h3>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Telephone No.</label>
                <input type="tel" name="secretary_telephone"
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Mobile No. <span class="text-red-500">*</span></label>
                <input type="tel" name="secretary_mobile" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Email <span class="text-red-500">*</span></label>
                <input type="email" name="secretary_email" required
                    class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
            </div>
        </div>
    </section>

    <!-- Other Staff Members -->
    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">Other Staff Members</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Include all office bearers, permanent employees, and daily wage staff</p>
            </div>
        </div>

        <div class="space-y-10" data-repeat-group="staff_members">
            <div id="staff-members-list"></div>

            <div class="flex justify-center pt-2">
                <button type="button" class="add-project-row-btn" data-add-row="staff_members">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    <span>Add another staff member</span>
                </button>
            </div>
        </div>

        <template id="staff-member-row-template">
            <div class="project-block" data-repeat-item>
                <span class="sno-badge">S.No. 1</span>
                <button type="button" class="remove-project-row" data-remove-row title="Remove staff member" aria-label="Remove staff member">
                    <i data-lucide="x" class="w-3.5 h-3.5"></i>
                </button>
                <div class="space-y-4">
                    <div>
                        <label class="label-compact">Name of Employee <span class="text-red-500">*</span></label>
                        <input type="text" data-field="staff_name" required placeholder="Full name"
                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                    </div>
                    <div>
                        <label class="label-compact">Designation <span class="text-red-500">*</span></label>
                        <input type="text" data-field="staff_designation" required placeholder="Designation"
                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="label-compact">Date of Birth <span class="text-red-500">*</span></label>
                            <input type="date" data-field="staff_dob" required
                                class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                        </div>
                        <div>
                            <label class="label-compact">Education</label>
                            <input type="text" data-field="staff_education" placeholder="Education"
                                class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="label-compact">Cell No. <span class="text-red-500">*</span></label>
                            <input type="tel" data-field="staff_cell" required placeholder="+92-3XX-XXXXXXX"
                                class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                        </div>
                        <div>
                            <label class="label-compact">Domicile</label>
                            <input type="text" data-field="staff_domicile" placeholder="Domicile"
                                class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                        </div>
                    </div>
                    <div>
                        <label class="label-compact">CNIC No. <span class="text-red-500">*</span></label>
                        <input type="text" data-field="staff_cnic" required placeholder="XXXXX-XXXXXXX-X"
                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                    </div>
                </div>
            </div>
        </template>
    </section>

    <!-- Next Step Action -->
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
        <script src="<?php echo e(url('js/registration-repeat-rows.js?v=2')); ?>"></script>
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