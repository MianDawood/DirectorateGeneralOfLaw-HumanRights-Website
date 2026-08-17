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
    <!-- Page Header -->
    <div class="relative bg-[#123B2D] py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('<?php echo e(asset('images/hero image 3.png')); ?>')] bg-cover bg-center mix-blend-overlay"></div>
        <div class="max-w-[1536px] mx-auto px-6 relative z-10 text-center">
            <h1 class="font-outfit text-3xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">
                Active <span class="text-[#02B1EB]">Tenders</span>
            </h1>
            <p class="text-white/80 text-sm md:text-lg max-w-2xl mx-auto font-medium">
                View current opportunities, procurement notices, and request for proposals from the Directorate.
            </p>
        </div>
    </div>

    <!-- Tenders Section -->
    <section class="bg-slate-50 py-16">
        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-8">
                <!-- Search -->
                <form method="GET" action="<?php echo e(route('tenders')); ?>" class="relative w-full md:w-96">
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search by title, reference no, or description..."
                           class="w-full bg-white border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm focus:border-[#02B1EB] focus:ring-1 focus:ring-[#02B1EB] outline-none">
                    <i data-lucide="search" class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"></i>
                </form>

                <p class="text-sm text-slate-500">Showing <?php echo e($tenders->total()); ?> active tender(s)</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100">
                                <th class="py-5 px-6 font-bold text-slate-500 text-[10px] uppercase tracking-widest min-w-[300px]">Tender Description</th>
                                <th class="py-5 px-6 font-bold text-slate-500 text-[10px] uppercase tracking-widest min-w-[150px]">Reference No.</th>
                                <th class="py-5 px-6 font-bold text-slate-500 text-[10px] uppercase tracking-widest min-w-[150px]">Publish Date</th>
                                <th class="py-5 px-6 font-bold text-slate-500 text-[10px] uppercase tracking-widest min-w-[150px]">Closing Date</th>
                                <th class="py-5 px-6 font-bold text-slate-500 text-[10px] uppercase tracking-widest min-w-[120px]">Status</th>
                                <th class="py-5 px-6 font-bold text-slate-500 text-[10px] uppercase tracking-widest text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <?php $__empty_1 = true; $__currentLoopData = $tenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-slate-50/50 transition-colors group">
                                    <td class="py-5 px-6">
                                        <h4 class="font-bold text-slate-800 text-sm mb-1 group-hover:text-[#02B1EB] transition-colors"><?php echo e($tender->title); ?></h4>
                                        <p class="text-xs text-slate-400"><?php echo e($tender->description); ?></p>
                                    </td>
                                    <td class="py-5 px-6">
                                        <span class="font-mono text-xs text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md"><?php echo e($tender->reference_no); ?></span>
                                    </td>
                                    <td class="py-5 px-6 text-sm text-slate-600 font-medium"><?php echo e(optional($tender->publish_date)->format('M d, Y') ?? '—'); ?></td>
                                    <td class="py-5 px-6 text-sm text-slate-600 font-medium"><?php echo e(optional($tender->closing_date)->format('M d, Y') ?? '—'); ?></td>
                                    <td class="py-5 px-6">
                                        <?php if(strtolower($tender->status) === 'active'): ?>
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-50 text-green-600 rounded-full text-[10px] font-black uppercase tracking-wider">
                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Active
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-100 text-slate-500 rounded-full text-[10px] font-black uppercase tracking-wider">
                                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> <?php echo e(ucfirst($tender->status)); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-5 px-6 text-right">
                                        <a href="<?php echo e(route('tenders.download', $tender->id)); ?>"
                                           class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-[#02B1EB]/10 text-[#02B1EB] hover:bg-[#02B1EB] hover:text-white transition-colors"
                                           title="Download Document">
                                            <i data-lucide="download" class="w-4 h-4"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="py-8 px-6 text-center text-sm text-slate-500">
                                        No tenders available at the moment.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php if($tenders->hasPages()): ?>
            <div class="mt-10 flex justify-center">
                <?php echo e($tenders->appends(request()->query())->links()); ?>

            </div>
            <?php endif; ?>

            <!-- Warning -->
            <div class="mt-8 bg-amber-50 border border-amber-200 rounded-xl p-5 flex gap-4 text-sm text-amber-800">
                <i data-lucide="alert-triangle" class="w-5 h-5 text-amber-500 shrink-0"></i>
                <p>All procurement processes strictly abide by the rules framed up by the Khyber Pakhtunkhwa Public Procurement Regulatory Authority (KPPRA). Bidders must be registered on KPPRA website.</p>
            </div>
        </div>
    </section>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/tenders.blade.php ENDPATH**/ ?>