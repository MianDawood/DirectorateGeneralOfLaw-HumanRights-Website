<?php if (isset($component)) { $__componentOriginalf8d66f80f26570d03f587b9301010d1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d66f80f26570d03f587b9301010d1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-layout','data' => ['title' => 'Registration Form - PART-3','subtitle' => 'SCHEDULE-I | PART-3: OBJECTIVES & STRATEGY','step' => 'Step 3 of 11: Objectives & Strategy','backRoute' => 'registration_form_part2','backLabel' => 'Back to Part 2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration Form - PART-3','subtitle' => 'SCHEDULE-I | PART-3: OBJECTIVES & STRATEGY','step' => 'Step 3 of 11: Objectives & Strategy','backRoute' => 'registration_form_part2','backLabel' => 'Back to Part 2']); ?>
    <section>
        <div class="flex items-center gap-3 mb-8">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">3</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-3: General Objectives</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Primary Goals</p>
            </div>
        </div>

        <div class="space-y-4">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">a. General Objectives *</label>
            <textarea name="generalObjectives" required rows="3"
                placeholder="Enter your general objectives..."
                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
        </div>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="space-y-4">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">b. Geographical Focus of Work (Specify District in Khyber Pakhtunkhwa) *</label>
            <textarea name="geographicalFocus" required rows="2"
                placeholder="e.g. Peshawar, Swat, Mardan..."
                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
        </div>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div class="section-icon bg-[#02b1eb] text-white shadow-sm">3</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-3: Thematic Focus</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Areas of Interest</p>
            </div>
        </div>

        <div class="space-y-3">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Thematic Focus *</label>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematicFocus[]" value="human_rights" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Human Rights Protection</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematicFocus[]" value="legal_aid" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Legal Aid & Access to Justice</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematicFocus[]" value="gender" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Gender Equality & Women's Rights</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematicFocus[]" value="child" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Child Rights & Protection</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematicFocus[]" value="disabilities" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Rights of Person with Disabilities</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematicFocus[]" value="minorities" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Transgender & Minority Rights</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematicFocus[]" value="refugees" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Refugee & Migrant Rights</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematicFocus[]" value="expression" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Freedom of Expression & Assembly</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematicFocus[]" value="labor" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Labor & Employment Rights</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="thematicFocus[]" value="violence" class="w-4 h-4 rounded text-[#02B1EB] focus:ring-primary/20">
                    <span class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Protection Against Gender-Based Violence</span>
                </label>
                <div class="md:col-span-2">
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 group">
                        <input type="checkbox" name="thematicFocusOther" class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                        <input type="text" name="thematicFocusOtherText" placeholder="Other (Please specify)" class="w-full bg-transparent border-none focus:outline-none text-[11px] font-bold text-slate-600">
                    </label>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">3</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-3: Beneficiaries</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Target Groups</p>
            </div>
        </div>

        <div class="space-y-3">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Beneficiaries (Target Groups) *</label>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="children" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Children</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="women" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Women</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="transgender" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Transgender Person</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="disabilities" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Persons with Disabilities (PWDs)</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="orphans" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Orphans</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="refugees" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Refugees & Migrants</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="elderly" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Elderly Persons</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="beneficiaries[]" value="government" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Government Institutions</span>
                </label>
                <div class="md:col-span-2">
                    <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 group">
                        <input type="checkbox" name="beneficiariesOther" class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                        <input type="text" name="beneficiariesOtherText" placeholder="Other (Please specify)" class="w-full bg-transparent border-none focus:outline-none text-[11px] font-bold text-slate-600">
                    </label>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">3</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-3: Operational Method</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">How You Operate</p>
            </div>
        </div>

        <div class="space-y-3">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">How Does Your Non-Governmental Organization Operate? *</label>
            <div class="space-y-2">
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operateMethod[]" value="training" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Provides Human Rights Training & Capacity Building</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operateMethod[]" value="legal_awareness" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Conducts Legal Awareness & Rights-Based Advocacy</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operateMethod[]" value="survivor_support" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Support Survivors of Violence & Discrimination</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operateMethod[]" value="referral" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Provides referral & Protection Services</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operateMethod[]" value="research" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Conducts Research & Policy Analysis</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operateMethod[]" value="psychological" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Provides Psychological & Mental Health Support</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                    <input type="checkbox" name="operateMethod[]" value="reforms" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <span class="text-[11px] font-bold text-slate-600">Strengthens Institutional Reforms & Policy Development</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 group">
                    <input type="checkbox" name="operateMethodOther" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                    <input type="text" name="operateMethodOtherText" placeholder="Other (Please specify)" class="w-full bg-transparent border-none focus:outline-none text-[11px] font-bold text-slate-600">
                </label>
            </div>
        </div>
    </section>

    <section class="pt-10 border-t border-slate-100">
        <div class="flex items-center gap-3 mb-8">
            <div class="section-icon bg-[#123B2D] text-white shadow-sm">3</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-3: Collaboration</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Partnerships</p>
            </div>
        </div>

        <div class="space-y-6">
            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Collaboration with Local Non-Governmental Organizations/ Non-Profit Organizations (if applicable)</label>

            <div class="space-y-4">
                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Name of Partner Non-Governmental Organization</label>
                    <input type="text" name="partnerNGO" placeholder="Enter partner NGO name" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[11px]">
                </div>
                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Nature of Collaboration</label>
                    <input type="text" name="natureCollaboration" placeholder="Describe the partnership..." class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[11px]">
                </div>
                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Joint Activities</label>
                    <input type="text" name="jointActivities" placeholder="List key joint activities..." class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[11px]">
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
            <a href="<?php echo e(route('registration_form_part4')); ?>"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 4</span>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/registration_form_part3.blade.php ENDPATH**/ ?>