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
<main class="bg-slate-50/50 min-h-screen">
    <!-- Hero -->
    <section class="bg-gradient-to-br from-[#123B2D] to-[#1a5240] py-16 lg:py-20 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-[#02B1EB]/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>
        <div class="max-w-[1200px] mx-auto px-6 lg:px-20 relative z-10">
            <div class="flex flex-col md:flex-row md:items-center gap-8">
                <div class="md:order-2 shrink-0">
                    <div class="w-28 h-28 md:w-40 md:h-40 rounded-full bg-white border-4 border-white/20 shadow-2xl p-2 flex items-center justify-center overflow-hidden">
                        <img src="<?php echo e(asset('images/logo.jpg')); ?>"
                             alt="<?php echo e($application->organization_name ?? 'NGO Logo'); ?>"
                             class="w-full h-full object-contain rounded-full">
                    </div>
                </div>
                <div class="md:order-1 flex-1">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="w-10 h-[2px] bg-[#02B1EB]"></span>
                        <span class="text-[#02B1EB] text-[10px] font-black uppercase tracking-[0.3em]">NGO Profile</span>
                    </div>
                    <h1 class="font-outfit text-3xl md:text-5xl font-black text-white uppercase tracking-tight leading-tight">
                        <?php echo e($application->organization_name ?? 'NGO Details'); ?>

                    </h1>
                    <div class="flex flex-wrap items-center gap-3 mt-4">
                        <?php if($application->registration_no): ?>
                            <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 border border-white/20 rounded-full text-white text-[11px] font-bold tracking-wider">
                                <i data-lucide="badge-check" class="w-4 h-4 text-[#02B1EB]"></i>
                                Reg # <?php echo e($application->registration_no); ?>

                            </span>
                        <?php endif; ?>
                        <?php
                            $statusColors = [
                                'approved' => 'bg-emerald-500/20 text-black border-emerald-300/40',
                                'submitted' => 'bg-blue-500/20 text-black border-blue-300/40',
                                'under_review' => 'bg-amber-500/20 text-black border-amber-300/40',
                                'rejected' => 'bg-red-500/20 text-black border-red-300/40',
                            ];
                            $statusLabels = [
                                'approved' => 'Approved',
                                'submitted' => 'Submitted',
                                'under_review' => 'Under Review',
                                'rejected' => 'Suspended',
                            ];
                            $color = $statusColors[$application->status] ?? 'bg-slate-500/20 text-slate-200 border-slate-300/40';
                            $label = $statusLabels[$application->status] ?? $application->status;
                        ?>
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full border text-[11px] font-black uppercase tracking-wider text-white">
                            <i data-lucide="activity" class="w-4 h-4"></i>
                            <?php echo e($label); ?>

                        </span>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <a href="<?php echo e(route('ngo_registered')); ?>"
                    class="inline-flex items-center gap-2 text-white/70 hover:text-white text-[10px] font-black uppercase tracking-widest transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Back to Registered NGOs
                </a>
            </div>
        </div>
    </section>

    <!-- Details – redesigned public profile card -->
    <section class="py-16">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-20">
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

                <!-- Header strip -->
                <div class="bg-[#123B2D]/5 px-6 lg:px-8 py-4 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4 text-[#123B2D]"></i>
                        <span class="text-[10px] font-black uppercase tracking-widest text-[#123B2D]">Organization Information</span>
                    </div>
                </div>

                <div class="p-6 lg:p-8">
                    <!-- Two-column grid for main info -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12 gap-y-8">

                        <!-- Left column -->
                        <div class="space-y-6">
                            <!-- Registration -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <i data-lucide="file-badge" class="w-4 h-4 text-[#02B1EB]"></i>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB]">Registration</span>
                                </div>
                                <div class="pl-6 space-y-2">
                                    <div>
                                        <span class="text-xs text-slate-400 font-medium">Number</span>
                                        <p class="font-outfit text-base font-bold text-slate-900"><?php echo e($application->registration_no ?? 'N/A'); ?></p>
                                    </div>
                                    <div>
                                        <span class="text-xs text-slate-400 font-medium">District</span>
                                        <p class="font-outfit text-base font-bold text-slate-900"><?php echo e($application->district ?? 'N/A'); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Dates -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <i data-lucide="calendar-days" class="w-4 h-4 text-[#02B1EB]"></i>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB]">Dates</span>
                                </div>
                                <div class="pl-6 grid grid-cols-2 gap-4">
                                    <div>
                                        <span class="text-xs text-slate-400 font-medium">Registered</span>
                                        <p class="font-outfit text-sm font-bold text-slate-900">
                                            <?php echo e($application->certificate_issue_date ? \Carbon\Carbon::parse($application->certificate_issue_date)->format('d-m-Y') : 'N/A'); ?>

                                        </p>
                                    </div>
                                    <div>
                                        <span class="text-xs text-slate-400 font-medium">Expires</span>
                                        <p class="font-outfit text-sm font-bold text-slate-900">
                                            <?php echo e($application->expiry_date ? \Carbon\Carbon::parse($application->expiry_date)->format('d-m-Y') : 'N/A'); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <i data-lucide="shield-check" class="w-4 h-4 text-[#02B1EB]"></i>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB]">Status</span>
                                </div>
                                <div class="pl-6">
                                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border text-[10px] font-black uppercase tracking-wider <?php echo e($color); ?>">
                                        <?php echo e($label); ?>

                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Right column -->
                        <div class="space-y-6">
                            <!-- Contact -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <i data-lucide="phone" class="w-4 h-4 text-[#02B1EB]"></i>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB]">Contact</span>
                                </div>
                                <div class="pl-6 space-y-2">
                                    <div>
                                        <span class="text-xs text-slate-400 font-medium">Phone</span>
                                        <p class="font-outfit text-base font-bold text-slate-900">
                                            <?php echo e($application->contact_phone ?? $application->contact_mobile ?? 'N/A'); ?>

                                        </p>
                                    </div>
                                    <div>
                                        <span class="text-xs text-slate-400 font-medium">Email</span>
                                        <p class="font-outfit text-base font-bold text-slate-900 break-all">
                                            <?php echo e($application->contact_email ?? 'N/A'); ?>

                                        </p>
                                    </div>
                                    <div>
                                        <span class="text-xs text-slate-400 font-medium">Website</span>
                                        <p class="font-outfit text-base font-bold text-slate-900">
                                            <?php if($application->contact_website): ?>
                                                <a href="<?php echo e($application->contact_website); ?>" target="_blank"
                                                   class="text-[#02B1EB] hover:text-[#123B2D] transition-colors inline-flex items-center gap-1">
                                                    <?php echo e($application->contact_website); ?>

                                                    <i data-lucide="external-link" class="w-3 h-3"></i>
                                                </a>
                                            <?php else: ?>
                                                N/A
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Thematic & Beneficiaries -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <i data-lucide="target" class="w-4 h-4 text-[#02B1EB]"></i>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB]">Focus</span>
                                </div>
                                <div class="pl-6 grid grid-cols-2 gap-4">
                                    <div>
                                        <span class="text-xs text-slate-400 font-medium">Thematic Area</span>
                                        <p class="font-outfit text-sm font-bold text-slate-900"><?php echo e($application->thematic_areas ?? 'N/A'); ?></p>
                                    </div>
                                    <div>
                                        <span class="text-xs text-slate-400 font-medium">Beneficiaries</span>
                                        <p class="font-outfit text-sm font-bold text-slate-900"><?php echo e($beneficiaries ? number_format($beneficiaries) : 'N/A'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Full-width sections below -->
                    <div class="mt-8 pt-8 border-t border-slate-100 space-y-6">

                        <!-- Addresses -->
                        <div>
                            <div class="flex items-center gap-2 mb-3">
                                <i data-lucide="map-pin" class="w-4 h-4 text-[#02B1EB]"></i>
                                <span class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB]">Addresses</span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pl-6">
                                <div>
                                    <span class="text-xs text-slate-400 font-medium">Official Address</span>
                                    <p class="font-outfit text-base font-medium text-slate-700 leading-relaxed"><?php echo e($application->registered_address ?? 'N/A'); ?></p>
                                </div>
                                <div>
                                    <span class="text-xs text-slate-400 font-medium">Postal Address</span>
                                    <p class="font-outfit text-base font-medium text-slate-700 leading-relaxed"><?php echo e($application->postal_address ?? 'N/A'); ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Operational Area & Objective -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <i data-lucide="compass" class="w-4 h-4 text-[#02B1EB]"></i>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB]">Operational Area</span>
                                </div>
                                <p class="font-outfit text-base font-bold text-slate-900 pl-6"><?php echo e($application->operational_area ?? 'N/A'); ?></p>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <i data-lucide="building-2" class="w-4 h-4 text-[#02B1EB]"></i>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB]">Objective</span>
                                </div>
                                <p class="font-outfit text-base font-medium text-slate-700 leading-relaxed pl-6"><?php echo e($application->general_objectives ?? 'N/A'); ?></p>
                            </div>
                        </div>

                    </div>
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