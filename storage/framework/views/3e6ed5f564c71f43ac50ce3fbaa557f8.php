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
    <section class="bg-gradient-to-br from-[#123B2D] to-[#1a5240] py-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>

        <div class="max-w-[1536px] mx-auto px-6 lg:px-20 relative z-10">
            <div class="flex items-center gap-3 mb-6 reveal-on-scroll">
                <span class="w-12 h-[2px] bg-[#02B1EB]"></span>
                <span class="text-[#02B1EB] text-xs font-black uppercase tracking-[0.3em]">NGO Directory</span>
            </div>
            <h1 class="font-outfit text-5xl md:text-7xl font-black text-white uppercase tracking-tight mb-6 reveal-on-scroll">
                Suspended <br><span class="text-[#02B1EB]">NGOs</span>
            </h1>
            <p class="text-white/70 text-lg md:text-xl max-w-2xl leading-relaxed reveal-on-scroll">
                List of NGOs whose registration has been suspended due to non-compliance or violations.
            </p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-20">
            <div class="bg-slate-50 rounded-[36px] p-8 md:p-10 border border-slate-100 reveal-on-scroll">
                <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                    <h2 class="font-outfit text-2xl md:text-3xl font-black text-slate-900 uppercase tracking-tight">
                        Suspended NGOs List
                    </h2>
                    <span class="text-xs font-black uppercase tracking-widest text-slate-400">
                        Total: <?php echo e($applications->total()); ?>

                    </span>
                </div>

                <?php if($applications->isNotEmpty()): ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-2xl overflow-hidden">
                            <thead class="bg-red-600 text-white">
                                <tr>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest w-14">S.No</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Name Of NGO</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">District</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Registration No.</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Status</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Remarks if any</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ngo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-5 py-4 text-sm text-slate-500 font-mono">
                                            <?php echo e($applications->firstItem() + $loop->index); ?>

                                        </td>
                                        <td class="px-5 py-4 text-sm font-bold text-slate-800">
                                            <?php echo e($ngo->organization_name ?? 'N/A'); ?>

                                        </td>
                                        <td class="px-5 py-4 text-sm text-slate-600">
                                            <?php echo e($ngo->district ?? '-'); ?>

                                        </td>
                                        <td class="px-5 py-4 text-sm text-slate-600 font-mono">
                                            <?php echo e($ngo->registration_no ?? '-'); ?>

                                        </td>
                                        <td class="px-5 py-4 text-sm">
                                            <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-red-100 text-red-700">
                                                Suspended
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 text-sm text-slate-600 max-w-xs">
                                            <?php echo e($ngo->review_notes ?: 'No remarks provided.'); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8">
                        <?php echo e($applications->links()); ?>

                    </div>
                <?php else: ?>
                    <div class="text-center py-16">
                        <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mx-auto mb-5">
                            <i data-lucide="x-circle" class="w-8 h-8 text-red-500"></i>
                        </div>
                        <h3 class="font-outfit text-xl font-black text-slate-900 uppercase mb-3">No Suspended NGOs Found</h3>
                        <p class="text-slate-500">There are currently no suspended NGO records.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<style>
    .scrollbar-thin::-webkit-scrollbar { width: 6px; }
    .scrollbar-thin::-webkit-scrollbar-track { background: transparent; }
    .scrollbar-thin::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    .scrollbar-thin::-webkit-scrollbar-thumb:hover { background: #cbd5e0; }
</style>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/ngo_suspended.blade.php ENDPATH**/ ?>