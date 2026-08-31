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
    <div class="bg-slate-50 min-h-screen py-20">
        <div class="max-w-[800px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 md:p-12">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-[#123B2D]/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="search" class="w-8 h-8 text-[#123B2D]"></i>
                    </div>
                    <h1 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">Track Complaint
                        <span class="text-[#02B1EB]">Status</span>
                    </h1>
                    <p class="text-slate-500 mt-3 max-w-lg mx-auto text-sm">Enter your complaint reference number to check the current status of your complaint.</p>
                </div>

                <?php if(isset($error) && $error): ?>
                    <div class="mb-6 px-4 py-3 bg-red-50 border border-red-200 text-red-700 text-sm font-medium rounded-xl">
                        <?php echo e($error); ?>

                    </div>
                <?php endif; ?>

                <form class="space-y-6" method="GET" action="<?php echo e(route('track.complaint')); ?>">
                    <div>
                        <label for="reference_no" class="block text-sm font-medium text-slate-700 mb-2">Complaint Reference Number</label>
                        <input type="text" name="reference_no" id="reference_no" value="<?php echo e($referenceNo ?? ''); ?>"
                               placeholder="e.g. CMP-2026-00123"
                               class="w-full px-4 py-3 border border-slate-300 rounded-xl text-sm focus:border-[#02B1EB] focus:ring-2 focus:ring-[#02B1EB]/10 transition-all outline-none">
                    </div>
                    <button type="submit"
                            class="w-full py-3.5 bg-[#123B2D] text-white font-bold uppercase tracking-widest text-xs rounded-xl hover:bg-[#02B1EB] transition-all shadow-lg">
                        Check Status
                    </button>
                </form>

                <?php if(isset($complaint) && $complaint): ?>
                    <div class="mt-8 border-t border-slate-100 pt-8">
                        <div class="rounded-2xl border border-slate-100 overflow-hidden">
                            <div class="flex items-center justify-between px-6 py-4 bg-[#123B2D]/5 border-b border-slate-100">
                                <div>
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Reference Number</p>
                                    <p class="text-lg font-black text-[#123B2D]"><?php echo e($complaint->reference_no); ?></p>
                                </div>
                                <?php
                                    $statusClass = $complaint->status === 'resolved' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700';
                                ?>
                                <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest <?php echo e($statusClass); ?>">
                                    <?php echo e(ucfirst($complaint->status)); ?>

                                </span>
                            </div>
                            <div class="divide-y divide-slate-100">
                                <div class="flex items-center justify-between px-6 py-3.5">
                                    <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Full Name</span>
                                    <span class="text-sm font-semibold text-slate-700"><?php echo e($complaint->full_name); ?></span>
                                </div>
                                <div class="flex items-center justify-between px-6 py-3.5">
                                    <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Category</span>
                                    <span class="text-sm font-semibold text-slate-700"><?php echo e($complaint->category ?: '—'); ?></span>
                                </div>
                                <div class="flex items-center justify-between px-6 py-3.5">
                                    <span class="text-xs font-bold uppercase tracking-widest text-slate-400">District</span>
                                    <span class="text-sm font-semibold text-slate-700"><?php echo e($complaint->district ?: '—'); ?></span>
                                </div>
                                <div class="flex items-center justify-between px-6 py-3.5">
                                    <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Submitted</span>
                                    <span class="text-sm font-semibold text-slate-700"><?php echo e(optional($complaint->created_at)->format('d M Y')); ?></span>
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-slate-400 mt-4 text-center">
                            If you don't have a reference number, please <a href="<?php echo e(route('complaint_cell')); ?>" class="text-[#02B1EB] hover:text-[#123B2D] font-semibold">register a new complaint</a>.
                        </p>
                    </div>
                <?php endif; ?>

                <?php if(!isset($complaint) || !$complaint): ?>
                    <p class="text-center text-xs text-slate-400 mt-6">If you don't have a reference number, please <a href="<?php echo e(route('complaint_cell')); ?>" class="text-[#02B1EB] hover:text-[#123B2D] font-semibold">register a new complaint</a>.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/track-complaint.blade.php ENDPATH**/ ?>