<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'Search Results | Directorate of Human Rights']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Search Results | Directorate of Human Rights']); ?>
    <section class="relative bg-[#123B2D] py-20 md:py-32 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#02B1EB] rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        </div>

        <div class="relative z-10 max-w-[1536px] mx-auto px-6 lg:px-20">
            <nav class="flex items-center gap-2 text-white/60 text-xs font-bold uppercase tracking-widest mb-8">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-white transition-colors">Home</a>
                <i data-lucide="chevron-right" class="w-3 h-3"></i>
                <span class="text-white">Search Results</span>
            </nav>

            <h1 class="font-outfit text-4xl md:text-6xl font-black text-white leading-tight uppercase tracking-tight mb-4">
                Search <span class="text-[#02B1EB]">Results</span>
            </h1>
            <p class="text-white/60 text-lg max-w-2xl font-medium">
                <?php echo e($results->count()); ?> <?php echo e(Str::plural('result', $results->count())); ?> for: <span class="text-white italic">"<?php echo e($query); ?>"</span>
            </p>
        </div>
    </section>

    <section class="bg-slate-50 py-16 md:py-24">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <?php if($results->count() > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="group bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
                            <div class="p-8">
                                <div class="flex items-center justify-between mb-6">
                                    <span class="px-4 py-1.5 bg-slate-100 text-slate-500 text-[10px] font-black uppercase tracking-widest rounded-full group-hover:bg-[#123B2D] group-hover:text-white transition-colors">
                                        <?php echo e($result->type); ?>

                                    </span>
                                    <i data-lucide="arrow-up-right" class="w-5 h-5 text-slate-300 group-hover:text-[#02B1EB] transition-colors"></i>
                                </div>
                                
                                <h3 class="font-outfit text-xl font-bold text-slate-900 mb-4 group-hover:text-[#123B2D] transition-colors line-clamp-2">
                                    <?php echo e($result->title); ?>

                                </h3>
                                
                                <p class="text-slate-500 text-sm leading-relaxed mb-8 line-clamp-3 font-medium">
                                    <?php echo e(Str::limit(strip_tags($result->content ?? $result->description), 150)); ?>

                                </p>

                                <a href="<?php echo e($result->url); ?>" class="inline-flex items-center gap-2 text-[#02B1EB] text-xs font-black uppercase tracking-widest group/btn">
                                    View Details
                                    <span class="w-8 h-[2px] bg-[#02B1EB]/20 group-hover/btn:w-12 transition-all duration-500"></span>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="max-w-2xl mx-auto text-center py-20">
                    <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-8">
                        <i data-lucide="search-x" class="w-10 h-10 text-slate-300"></i>
                    </div>
                    <h2 class="text-2xl font-black text-slate-900 uppercase tracking-tight mb-4">No results found</h2>
                    <p class="text-slate-500 font-medium mb-12 leading-relaxed">
                        We couldn't find any content matching "<?php echo e($query); ?>". <br>
                        Please check your spelling or try searching for something else.
                    </p>
                    <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center gap-3 px-10 py-4 bg-[#123B2D] text-white text-[11px] font-black uppercase tracking-widest rounded-2xl shadow-xl hover:bg-black transition-all active:scale-95">
                        <i data-lucide="home" class="w-4 h-4"></i>
                        Back to Home
                    </a>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/search-results.blade.php ENDPATH**/ ?>