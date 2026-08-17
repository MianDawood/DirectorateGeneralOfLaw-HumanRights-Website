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
        <div class="absolute inset-0 opacity-10 bg-[url('<?php echo e(asset('images/hero image 2.png')); ?>')] bg-cover bg-center mix-blend-overlay"></div>
        <div class="max-w-[1536px] mx-auto px-6 relative z-10 text-center">
            <h1 class="font-outfit text-3xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">
                Official <span class="text-[#02B1EB]">Publications</span>
            </h1>
            <p class="text-white/80 text-sm md:text-lg max-w-2xl mx-auto font-medium">
                Access official reports, research documents, acts, and guidelines compiled by the Directorate.
            </p>
        </div>
    </div>

    <!-- Publications List -->
    <section class="bg-white py-16 min-h-[500px]">
        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">

            <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12 border-b border-slate-100 pb-8">
                <!-- Filters -->
                <div class="flex flex-wrap gap-2">
                    <a href="<?php echo e(route('publications', request()->only(['search']))); ?>"
                       class="px-5 py-2.5 rounded-full <?php echo e(!request('category') || request('category') === 'All' ? 'bg-[#123B2D] text-white' : 'bg-slate-50 text-slate-600 hover:bg-[#02B1EB] hover:text-white'); ?> text-xs font-bold uppercase tracking-widest transition-all border border-slate-200">All</a>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('publications', array_merge(request()->only(['search']), ['category' => $category]))); ?>"
                       class="px-5 py-2.5 rounded-full <?php echo e(request('category') === $category ? 'bg-[#123B2D] text-white' : 'bg-slate-50 text-slate-600 hover:bg-[#02B1EB] hover:text-white'); ?> text-xs font-bold uppercase tracking-widest transition-all border border-slate-200"><?php echo e($category); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- Search -->
                <form method="GET" action="<?php echo e(route('publications')); ?>" class="relative w-full md:w-80">
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search publication..."
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm focus:border-[#02B1EB] focus:ring-1 focus:ring-[#02B1EB] outline-none">
                    <i data-lucide="search" class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"></i>
                    <?php if(request('category')): ?>
                        <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
                    <?php endif; ?>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php $__empty_1 = true; $__currentLoopData = $publications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white border border-slate-100 rounded-2xl overflow-hidden group hover:shadow-xl hover:border-[#02B1EB]/20 transition-all duration-300 flex flex-col">
                    <?php if($publication->coverImageUrl()): ?>
                        <a href="<?php echo e(route('publications.download', $publication->id)); ?>" class="block">
                            <img src="<?php echo e($publication->coverImageUrl()); ?>" alt="<?php echo e($publication->title); ?>"
                                 class="w-full h-44 object-cover group-hover:scale-105 transition-transform duration-300">
                        </a>
                    <?php else: ?>
                        <div class="w-full h-44 bg-red-50 flex items-center justify-center text-red-500 mb-2">
                            <i data-lucide="file-text" class="w-10 h-10"></i>
                        </div>
                    <?php endif; ?>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex-1">
                            <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2"><?php echo e($publication->category); ?></p>
                            <h3 class="font-outfit text-lg font-bold text-slate-800 leading-tight mb-3">
                                <?php echo e($publication->title); ?>

                            </h3>
                            <p class="text-slate-500 text-sm mb-6 line-clamp-2">
                                <?php echo e($publication->description); ?>

                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                            <div class="text-xs font-medium text-slate-400"><?php echo e($publication->file_type); ?> • <?php echo e($publication->file_size); ?></div>
                            <a href="<?php echo e(route('publications.download', $publication->id)); ?>"
                               class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-600 hover:bg-[#123B2D] hover:text-white transition-all">
                                <i data-lucide="download" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full text-center py-12">
                    <i data-lucide="file-x" class="w-16 h-16 text-slate-300 mx-auto mb-4"></i>
                    <h3 class="text-lg font-semibold text-slate-600 mb-2">No publications found</h3>
                    <p class="text-slate-500">Try adjusting your search or filter criteria.</p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php if($publications->hasPages()): ?>
            <div class="mt-16 flex justify-center">
                <?php echo e($publications->appends(request()->query())->links()); ?>

            </div>
            <?php endif; ?>

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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/publications.blade.php ENDPATH**/ ?>