<?php if (isset($component)) { $__componentOriginalf8d66f80f26570d03f587b9301010d1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d66f80f26570d03f587b9301010d1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-layout','data' => ['title' => 'Registration Form - PART-E','subtitle' => 'SCHEDULE-I | PART-5: PROJECTS/PROGRAMMES/ASSIGNMENTS COMPLETED','step' => 'Step 5 of 10: Completed Projects','backRoute' => 'registration_form_part4','backLabel' => 'Back to Part 4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration Form - PART-E','subtitle' => 'SCHEDULE-I | PART-5: PROJECTS/PROGRAMMES/ASSIGNMENTS COMPLETED','step' => 'Step 5 of 10: Completed Projects','backRoute' => 'registration_form_part4','backLabel' => 'Back to Part 4']); ?>
    <!-- PART-E: Completed Projects -->
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PROJECTS / PROGRAMMES / ASSIGNMENTS COMPLETED</h2>
            </div>
        </div>

        <div class="space-y-6">
            <!-- Total Number of Completed Projects -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-2">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Total Number of Completed Projects <span class="text-red-500">*</span></label>
                    <input type="number" name="total_completed_projects" required min="0"
                        class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]">
                </div>
            </div>

            <!-- Revised Project Details Table -->
            <div class="overflow-x-auto">
                <div class="min-w-full">
                    <!-- Repeatable Project Rows -->
                    <div class="space-y-4 py-2" data-repeat-group="completed_projects">
                        <div id="completed-projects-list">
                            <!-- Default first row will be added by JavaScript -->
                        </div>

                        <div class="flex justify-center pt-2">
                            <button type="button" class="add-project-row-btn" data-add-row="completed_projects">
                                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                                <span>Add another project</span>
                            </button>
                        </div>
                    </div>

                    <template id="completed-project-row-template">
                        <div class="project-block" data-repeat-item>
                            <span class="sno-badge">S.No. 1</span>
                            <button type="button" class="remove-project-row" data-remove-row title="Remove project" aria-label="Remove project">
                                <i data-lucide="x" class="w-3.5 h-3.5"></i>
                            </button>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-2">
                                    <label class="label-compact">Project Name <span class="text-red-500">*</span></label>
                                    <input type="text" data-field="project_name" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-2">
                                    <label class="label-compact">Target Area (District/City/Town/UC)<span class="text-red-500">*</span></label>
                                    <input type="text" data-field="target_area" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-1">
                                    <label class="label-compact">Start Date (MM/YYYY)<span class="text-red-500">*</span></label>
                                    <input type="month" data-field="start_date" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-1">
                                    <label class="label-compact">End Date  (MM/YYYY)<span class="text-red-500">*</span></label>
                                    <input type="month"
                                    data-field="end_date" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-1">
                                    <label class="label-compact">Total Funds (PKR/USD) <span class="text-red-500">*</span></label>
                                    <input type="text" data-field="total_funds" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-1">
                                    <label class="label-compact">Funding Source / Donor <span class="text-red-500">*</span></label>
                                    <input type="text" data-field="funding_source" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-1">
                                    <label class="label-compact">Thematic Focus <span class="text-red-500">*</span></label>
                                    <input type="text" data-field="thematic_focus" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="col-span-1">
                                    <label class="label-compact">Total Beneficiaries <span class="text-red-500">*</span></label>
                                    <input type="number" data-field="beneficiaries" required
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                            </div>
                        </div>
                    </template>
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
            <a href="<?php echo e(route('registration_form_part6')); ?>"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 6</span>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/registration_form_part5.blade.php ENDPATH**/ ?>