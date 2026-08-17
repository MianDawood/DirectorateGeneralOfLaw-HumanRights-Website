<?php if (isset($component)) { $__componentOriginalf8d66f80f26570d03f587b9301010d1d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d66f80f26570d03f587b9301010d1d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-layout','data' => ['title' => 'Registration Form - PART-10','subtitle' => 'SCHEDULE-I | PART-10: ASSETS DISCLOSURE','step' => 'Step 10 of 11: Assets Disclosure','backRoute' => 'registration_form_part9','backLabel' => 'Back to Part 9']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration Form - PART-10','subtitle' => 'SCHEDULE-I | PART-10: ASSETS DISCLOSURE','step' => 'Step 10 of 11: Assets Disclosure','backRoute' => 'registration_form_part9','backLabel' => 'Back to Part 9']); ?>
    <section>
        <div class="flex items-center gap-4 mb-10">
            <div class="section-icon bg-[#123B2D] text-white shadow-lg">10</div>
            <div>
                <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-10: Assets</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">Movable & Immovable Property Declaration</p>
            </div>
        </div>

        <div class="asset-card mb-12">
            <h3 class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-8 border-b border-slate-50 pb-4">Movable Assets (Vehicles, Equipment, Endowments, etc.)</h3>
            <div class="space-y-8">
                <h4 class="text-[10px] font-black text-slate-800 uppercase px-1">Vehicle Details (if applicable)</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="label-compact px-1">Type of Vehicle</label>
                        <input type="text" name="vehicleType" placeholder="e.g., Van, Car, Pickup" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                    </div>
                    <div class="space-y-2">
                        <label class="label-compact px-1">Registration Number</label>
                        <input type="text" name="vehicleRegNo" placeholder="LEW-1234" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl font-bold uppercase">
                    </div>
                    <div class="space-y-2">
                        <label class="label-compact px-1">Chassis Number</label>
                        <input type="text" name="vehicleChassisNo" placeholder="Full Chassis No." class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl font-bold">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="space-y-2">
                        <label class="label-compact px-1">Year of Manufacture</label>
                        <input type="number" name="vehicleYear" placeholder="YYYY" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                    </div>
                    <div class="space-y-2">
                        <label class="label-compact px-1">Model</label>
                        <input type="text" name="vehicleModel" placeholder="e.g., 2023" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                    </div>
                    <div class="space-y-2 md:col-span-2">
                        <label class="label-compact px-1">Make</label>
                        <input type="text" name="vehicleMake" placeholder="e.g., Toyota, Suzuki" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                    </div>
                </div>
            </div>
        </div>

        <div class="asset-card mb-12">
            <h3 class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-8 border-b border-slate-50 pb-4">Immovable Assets (Office Premises, Property, etc.)</h3>
            <div class="space-y-10">
                <div>
                    <label class="label-compact px-1 mb-4">Property Status *</label>
                    <div class="flex flex-wrap gap-3">
                        <label class="radio-pill"><input type="radio" name="property_status" value="owned" required class="w-3 h-3"><span>Owned</span></label>
                        <label class="radio-pill"><input type="radio" name="property_status" value="leased" class="w-3 h-3"><span>Leased</span></label>
                        <label class="radio-pill"><input type="radio" name="property_status" value="rented" class="w-3 h-3"><span>Rented</span></label>
                        <label class="radio-pill"><input type="radio" name="property_status" value="donated" class="w-3 h-3"><span>Donated</span></label>
                    </div>
                </div>

                <div>
                    <label class="label-compact px-1 mb-4">Property Usage *</label>
                    <div class="flex flex-wrap gap-3">
                        <label class="radio-pill"><input type="radio" name="property_usage" value="office" required class="w-3 h-3"><span>Office</span></label>
                        <label class="radio-pill"><input type="radio" name="property_usage" value="training" class="w-3 h-3"><span>Training Center</span></label>
                        <label class="radio-pill"><input type="radio" name="property_usage" value="shelter" class="w-3 h-3"><span>Shelter</span></label>
                        <div class="flex items-center gap-2">
                            <label class="radio-pill"><input type="radio" name="property_usage" value="other" class="w-3 h-3"><span>Other:</span></label>
                            <input type="text" name="propertyUsageOther" placeholder="Specify" class="input-compact h-8 px-3 text-[10px] bg-slate-50 border border-slate-200 rounded-lg w-32">
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="label-compact px-1">Location / Address *</label>
                    <textarea name="locationAddress" rows="3" required placeholder="Full address and physical location details" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl resize-none"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div>
                        <label class="label-compact px-1 mb-4">Lease Agreement (if applicable)</label>
                        <div class="flex gap-4">
                            <label class="radio-pill px-6"><input type="radio" name="lease_agreement" value="yes" class="w-3 h-3"><span>Yes</span></label>
                            <label class="radio-pill px-6"><input type="radio" name="lease_agreement" value="no" class="w-3 h-3"><span>No</span></label>
                        </div>
                    </div>
                    <div>
                        <label class="label-compact px-1 mb-4">Source of Property Acquisition</label>
                        <div class="flex flex-wrap gap-3">
                            <label class="radio-pill"><input type="radio" name="acquisition_source" value="ngo" class="w-3 h-3"><span>NGO-owned</span></label>
                            <label class="radio-pill"><input type="radio" name="acquisition_source" value="donor" class="w-3 h-3"><span>Donor-funded</span></label>
                            <div class="flex items-center gap-2">
                                <label class="radio-pill"><input type="radio" name="acquisition_source" value="other" class="w-3 h-3"><span>Other:</span></label>
                                <input type="text" name="acquisitionSourceOther" placeholder="Specify" class="input-compact h-8 px-3 text-[10px] bg-slate-50 border border-slate-200 rounded-lg w-24">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="asset-card">
            <div class="flex items-center gap-3 mb-8 border-b border-slate-50 pb-4">
                <i data-lucide="truck" class="w-5 h-5 text-[#02B1EB]"></i>
                <h3 class="text-[11px] font-black text-slate-800 uppercase tracking-[0.2em]">Car Rental Services (if applicable)</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="label-compact px-1">Name of Rental Company</label>
                    <input type="text" name="rentalCompanyName" placeholder="Service provider name" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                </div>
                <div class="space-y-2">
                    <label class="label-compact px-1">Company Address</label>
                    <input type="text" name="rentalCompanyAddress" placeholder="Office location of provider" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
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
            <a href="<?php echo e(route('registration_form_part11')); ?>"
                class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                <span>Continue to Step 11</span>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/registration_form_part10.blade.php ENDPATH**/ ?>