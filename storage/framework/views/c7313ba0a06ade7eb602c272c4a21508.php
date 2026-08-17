<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<main>
    <!-- Hero -->
    <section class="bg-gradient-to-br from-[#123B2D] to-[#1a5240] py-20 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
        <div class="max-w-[1200px] mx-auto px-6 relative z-10">
            <div class="flex items-center gap-3 mb-4">
                <span class="w-10 h-[2px] bg-[#02B1EB]"></span>
                <span class="text-[#02B1EB] text-[10px] font-black uppercase tracking-[0.3em]">NGO Profile</span>
            </div>
            <h1 class="font-outfit text-4xl md:text-6xl font-black text-white uppercase tracking-tight">
                <?php echo e($application->organization_name ?? 'NGO Details'); ?>

            </h1>
            <?php if($application->registration_no): ?>
                <p class="text-white/60 text-sm font-mono mt-3">Reg # <?php echo e($application->registration_no); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Details -->
    <section class="py-16 bg-white">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Name -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">Name Of NGO</p>
                    <p class="font-outfit text-lg font-bold text-slate-900"><?php echo e($application->organization_name ?? 'N/A'); ?></p>
                </div>

                <!-- District -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">District</p>
                    <p class="font-outfit text-lg font-bold text-slate-900"><?php echo e($application->district ?? 'N/A'); ?></p>
                </div>

                <!-- Registration No -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">Registration No.</p>
                    <p class="font-outfit text-lg font-bold text-slate-900"><?php echo e($application->registration_no ?? 'N/A'); ?></p>
                </div>

                <!-- Registration Date -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">Registration Date</p>
                    <p class="font-outfit text-lg font-bold text-slate-900">
                        <?php echo e($application->certificate_issue_date ? \Carbon\Carbon::parse($application->certificate_issue_date)->format('d-m-Y') : 'N/A'); ?>

                    </p>
                </div>

                <!-- Expiry Date -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">Expiry Date</p>
                    <p class="font-outfit text-lg font-bold text-slate-900">
                        <?php echo e($application->expiry_date ? \Carbon\Carbon::parse($application->expiry_date)->format('d-m-Y') : 'N/A'); ?>

                    </p>
                </div>

                <!-- Status -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">Status</p>
                    <div>
                        <?php
                            $statusColors = [
                                'approved' => 'bg-emerald-100 text-emerald-700',
                                'submitted' => 'bg-blue-100 text-blue-700',
                                'under_review' => 'bg-amber-100 text-amber-700',
                                'rejected' => 'bg-red-100 text-red-700',
                            ];
                            $statusLabels = [
                                'approved' => 'Approved',
                                'submitted' => 'Submitted',
                                'under_review' => 'Under Review',
                                'rejected' => 'Suspended',
                            ];
                            $color = $statusColors[$application->status] ?? 'bg-slate-100 text-slate-600';
                            $label = $statusLabels[$application->status] ?? $application->status;
                        ?>
                        <span class="px-3 py-1.5 rounded-full text-[10px] font-black uppercase tracking-wider <?php echo e($color); ?>">
                            <?php echo e($label); ?>

                        </span>
                    </div>
                </div>

                <!-- Phone No -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">Phone No.</p>
                    <p class="font-outfit text-lg font-bold text-slate-900"><?php echo e($application->contact_phone ?? $application->contact_mobile ?? 'N/A'); ?></p>
                </div>

                <!-- Email -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">Email ID</p>
                    <p class="font-outfit text-lg font-bold text-slate-900 break-all"><?php echo e($application->contact_email ?? 'N/A'); ?></p>
                </div>

                <!-- Website -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">Website</p>
                    <p class="font-outfit text-lg font-bold text-slate-900 break-all"><?php echo e($application->contact_website ?? 'N/A'); ?></p>
                </div>

                <!-- Area of Operation -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">Area of Operation</p>
                    <p class="font-outfit text-lg font-bold text-slate-900"><?php echo e($application->operational_area ?? 'N/A'); ?></p>
                </div>

                <!-- Objectives -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 md:col-span-2">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">Objective of NGO</p>
                    <p class="font-outfit text-base font-medium text-slate-900 leading-relaxed"><?php echo e($application->general_objectives ?? 'N/A'); ?></p>
                </div>

                <!-- Beneficiaries -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">Beneficiaries</p>
                    <p class="font-outfit text-lg font-bold text-slate-900"><?php echo e($beneficiaries ? number_format($beneficiaries) : 'N/A'); ?></p>
                </div>

                <!-- Thematic Area -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">Thematic Area</p>
                    <p class="font-outfit text-lg font-bold text-slate-900"><?php echo e($application->thematic_areas ?? 'N/A'); ?></p>
                </div>
            </div>
        </div>
    </section>
</main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/ngo_detail.blade.php ENDPATH**/ ?>