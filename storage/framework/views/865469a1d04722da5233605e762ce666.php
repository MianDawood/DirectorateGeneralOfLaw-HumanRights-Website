<?php if (isset($component)) { $__componentOriginalf8d66f80f26570d03f587b9301010d1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d66f80f26570d03f587b9301010d1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-layout','data' => ['title' => 'Registration Form - PART-2','subtitle' => 'SCHEDULE-I | PART-2: ADDRESS INFORMATION','step' => 'Step 2 of 11: Address Information','backRoute' => 'registration_form_part1','backLabel' => 'Back to Part 1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration Form - PART-2','subtitle' => 'SCHEDULE-I | PART-2: ADDRESS INFORMATION','step' => 'Step 2 of 11: Address Information','backRoute' => 'registration_form_part1','backLabel' => 'Back to Part 1']); ?>

                <section>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">2</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-2:
                                Head Office</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Primary Contact &
                                Location</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Registered
                                Address *</label>
                            <textarea name="headRegisteredAddress" required rows="2"
                                placeholder="Enter complete registered address"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Postal
                                Address *</label>
                            <textarea name="headPostalAddress" required rows="2"
                                placeholder="Enter complete postal address"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Contact
                                Details (Official) Telephone</label>
                            <input type="tel" name="headTelephone" placeholder="+92-XXX-XXXXXXX"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Mobile
                                (Official) *</label>
                            <input type="tel" name="headMobile" required placeholder="+92-3XX-XXXXXXX"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Fax</label>
                            <input type="text" name="headFax" placeholder="Fax Number"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Email
                                ID *</label>
                            <input type="email" name="headEmail" required placeholder="official@ngo.org"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Official
                                Website</label>
                            <input type="url" name="headWebsite" placeholder="https://www.ngo.org"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Other
                                Social Media</label>
                            <input type="text" name="headSocialMedia" placeholder="Facebook, Twitter, LinkedIn URLs"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                    </div>
                </section>

                <section class="pt-10 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#02b1eb] text-white shadow-sm">2</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-2:
                                Registered Liaison/Project Address</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Secondary Office
                                Details</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Registered
                                Liaison/Project Address</label>
                            <textarea name="liaisonAddress" rows="2"
                                placeholder="Enter complete liaison/project address"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Contact
                                Details (Official) Telephone</label>
                            <input type="tel" name="liaisonTelephone" placeholder="+92-XXX-XXXXXXX"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Mobile
                                (Official)</label>
                            <input type="tel" name="liaisonMobile" placeholder="+92-3XX-XXXXXXX"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Fax</label>
                            <input type="text" name="liaisonFax" placeholder="Fax Number"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Email
                                ID</label>
                            <input type="email" name="liaisonEmail" placeholder="liaison@ngo.org"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Official
                                Website</label>
                            <input type="url" name="liaisonWebsite" placeholder="https://www.ngo.org/liaison"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Other
                                Social Media</label>
                            <input type="text" name="liaisonSocialMedia" placeholder="Social Media URLs"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                    </div>
                </section>

                <section class="pt-10 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">2</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-2:
                                District/Field/Other/Project Address</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Regional Office
                                Details</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">District/Field/Other/Project
                                Address</label>
                            <textarea name="districtAddress" rows="2"
                                placeholder="Enter complete regional/field address"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Contact
                                Details (Official) Telephone</label>
                            <input type="tel" name="districtTelephone" placeholder="+92-XXX-XXXXXXX"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Mobile
                                (Official)</label>
                            <input type="tel" name="districtMobile" placeholder="+92-3XX-XXXXXXX"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Fax</label>
                            <input type="text" name="districtFax" placeholder="Fax Number"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Email
                                ID</label>
                            <input type="email" name="districtEmail" placeholder="field@ngo.org"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Official
                                Website</label>
                            <input type="url" name="districtWebsite" placeholder="https://www.ngo.org/field"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Other
                                Social Media</label>
                            <input type="text" name="districtSocialMedia" placeholder="Social Media URLs"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                    </div>
                </section>

                <section class="pt-10 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">2</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-2:
                                Operational Area</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Outreach &
                                Coverage</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label
                            class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Operational
                            area to include branch and sub offices in a District, City, Town or Union Council *</label>
                        <textarea name="operationalArea" required rows="3"
                            placeholder="List all operational areas, branches, and sub-offices..."
                            class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
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
                        <a href="<?php echo e(route('registration_form_part3')); ?>"
                            class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                            <span>Continue to Step 3</span>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                        Step 2 of 11: Address Information
                    </p>
                </div>
            </form>
        </div>

        <div class="mt-12 text-center">
            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-[0.25em]">© 2026 Directorate General of Law
                & Human Rights | Khyber Pakhtunkhwa</p>
        </div>
    </main>

    <script src="/js/form-draft.js"></script>
    <script src="/js/registration-form-sync.js"></script>
    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Reveal on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
    </script>
</body>

</html>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf8d66f80f26570d03f587b9301010d1d)): ?>
<?php $attributes = $__attributesOriginalf8d66f80f26570d03f587b9301010d1d; ?>
<?php unset($__attributesOriginalf8d66f80f26570d03f587b9301010d1d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8d66f80f26570d03f587b9301010d1d)): ?>
<?php $component = $__componentOriginalf8d66f80f26570d03f587b9301010d1d; ?>
<?php unset($__componentOriginalf8d66f80f26570d03f587b9301010d1d); ?>
<?php endif; ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/registration_form_part2.blade.php ENDPATH**/ ?>