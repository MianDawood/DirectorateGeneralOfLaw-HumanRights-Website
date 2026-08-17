<?php if (isset($component)) { $__componentOriginalf8d66f80f26570d03f587b9301010d1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d66f80f26570d03f587b9301010d1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-layout','data' => ['title' => 'Registration Form - PART-6','subtitle' => 'SCHEDULE-I | PART-6: PROJECT IMPLEMENTATION','step' => 'Step 6 of 11: Project Implementation','backRoute' => 'registration_form_part5','backLabel' => 'Back to Part 5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration Form - PART-6','subtitle' => 'SCHEDULE-I | PART-6: PROJECT IMPLEMENTATION','step' => 'Step 6 of 11: Project Implementation','backRoute' => 'registration_form_part5','backLabel' => 'Back to Part 5']); ?>
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">6</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-6: PROJECTS / PROGRAMMES / ASSIGNMENTS</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Under Implementation Phase</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            <div class="space-y-4 p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                <label class="label-compact">Number of Ongoing Projects:</label>
                <input type="number" name="ongoing_projects_count" min="0" placeholder="0" class="w-full input-compact bg-white border border-slate-200 rounded-lg focus:ring-1 focus:ring-[#02b1eb]">
            </div>
            <div class="space-y-4 p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                <label class="label-compact">Total Ongoing Projects (Summary):</label>
                <input type="text" name="ongoing_projects_summary" placeholder="Summary" class="w-full input-compact bg-white border border-slate-200 rounded-lg">
            </div>
        </div>

        <div class="space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 px-2">
                <h3 class="label-compact mb-0">Ongoing Project Details</h3>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Add only the projects you have</p>
            </div>

            <div id="ongoing-projects-list" class="grid grid-cols-1 lg:grid-cols-2 gap-8" data-repeat-group="ongoing_projects">
            </div>

            <div class="flex justify-center pt-2">
                <button type="button" class="add-project-row-btn" data-add-row="ongoing_projects">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    <span>Add another project</span>
                </button>
            </div>
        </div>

        <template id="ongoing-project-row-template">
            <?php echo $__env->make('pages.partials.ongoing_project_row', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </template>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-10 pt-8 border-t border-slate-200/60">
        <div class="space-y-6">
            <label class="label-compact">Project Director Name:</label>
            <input type="text" name="projectDirectorName" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
            <label class="label-compact">Total Projects Cost:</label>
            <input type="text" name="totalProjectsCost" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
        </div>
        <div class="p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
            <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Funding Sources:</h3>
            <div class="space-y-3">
                <input type="text" name="fundingInternational" placeholder="International Donors" class="w-full input-compact bg-white border border-slate-200 rounded-lg">
                <input type="text" name="fundingGovernment" placeholder="Government Depts" class="w-full input-compact bg-white border border-slate-200 rounded-lg">
                <input type="text" name="fundingOther" placeholder="Other Sources" class="w-full input-compact bg-white border border-slate-200 rounded-lg">
            </div>
        </div>
    </section>

    <section class="pt-8 border-t border-slate-200/60">
        <h3 class="label-compact mb-6">Thematic Focus (Select All Applicable):</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            <label class="check-pill"><input type="checkbox" name="thematicFocus[]" value="human_rights" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Human Rights Protection</span></label>
            <label class="check-pill"><input type="checkbox" name="thematicFocus[]" value="legal_aid" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Legal Aid & Justice</span></label>
            <label class="check-pill"><input type="checkbox" name="thematicFocus[]" value="gender" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Gender equality</span></label>
            <label class="check-pill"><input type="checkbox" name="thematicFocus[]" value="child" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Child Protection</span></label>
            <label class="check-pill"><input type="checkbox" name="thematicFocus[]" value="minorities" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">minority rights</span></label>
            <label class="check-pill"><input type="checkbox" name="thematicFocus[]" value="transgender" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Transgender Rights</span></label>
            <label class="check-pill"><input type="checkbox" name="thematicFocus[]" value="refugees" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Refugee Rights</span></label>
            <label class="check-pill"><input type="checkbox" name="thematicFocus[]" value="labor" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Labor Rights</span></label>
            <label class="check-pill"><input type="checkbox" name="thematicFocus[]" value="gbv" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">GBV Protection</span></label>
        </div>
    </section>

    <section class="pt-8 border-t border-slate-200/60">
        <h3 class="label-compact mb-6">Beneficiaries (Target Groups):</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <label class="check-pill"><input type="checkbox" name="beneficiaries[]" value="children" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Children</span></label>
            <label class="check-pill"><input type="checkbox" name="beneficiaries[]" value="women" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Women</span></label>
            <label class="check-pill"><input type="checkbox" name="beneficiaries[]" value="orphans" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Orphans</span></label>
            <label class="check-pill"><input type="checkbox" name="beneficiaries[]" value="pwd" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">PWDs</span></label>
            <label class="check-pill"><input type="checkbox" name="beneficiaries[]" value="transgender" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Transgender</span></label>
            <label class="check-pill"><input type="checkbox" name="beneficiaries[]" value="elderly" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Elderly</span></label>
            <label class="check-pill"><input type="checkbox" name="beneficiaries[]" value="refugees" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Refugees</span></label>
            <label class="check-pill"><input type="checkbox" name="beneficiaries[]" value="gbv_survivors" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">GBV Survivors</span></label>
        </div>
        <div class="mt-6 p-4 bg-slate-50 border border-slate-100 rounded-xl flex items-center gap-4">
            <label class="label-compact mb-0 w-48">Total Beneficiaries Count:</label>
            <input type="text" name="totalBeneficiariesCount" placeholder="Total reachable population" class="flex-1 input-compact bg-white border border-slate-200 rounded-lg">
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-10 pt-8 border-t border-slate-200/60">
        <div>
            <h3 class="label-compact mb-4">Scope of Activities:</h3>
            <textarea name="scopeOfActivities" rows="4" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl resize-none"></textarea>
        </div>
        <div class="space-y-4">
            <h3 class="label-compact mb-4">Clearance / Permission:</h3>
            <div class="space-y-3">
                <label class="check-pill justify-between px-4"><span class="text-[11px] font-bold uppercase">Office Est. Clearance</span><input type="checkbox" name="clearanceOfficeEst" value="1" class="w-4 h-4"></label>
                <label class="check-pill justify-between px-4"><span class="text-[11px] font-bold uppercase">Travel Permits</span><input type="checkbox" name="clearanceTravelPermits" value="1" class="w-4 h-4"></label>
                <label class="check-pill justify-between px-4"><span class="text-[11px] font-bold uppercase">Restricted Zones Ops</span><input type="checkbox" name="clearanceRestrictedZones" value="1" class="w-4 h-4"></label>
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
            <a href="<?php echo e(route('registration_form_part7')); ?>"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 7</span>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/registration_form_part6.blade.php ENDPATH**/ ?>