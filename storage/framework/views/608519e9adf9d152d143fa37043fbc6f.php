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
          <!-- Premium Video Hero Section -->
        <section class="relative min-h-screen flex items-center bg-secondary overflow-hidden">
            <!-- Background Video with sophisticated overlay -->
            <div class="absolute inset-0 z-0 overflow-hidden">
                <video autoplay muted loop playsinline class="w-full h-full object-cover scale-105">
                    <source src="images/Media page hero video.mp4" type="video/mp4">
                    <!-- Fallback Image -->
                    <img src="images/media_hero_bg.png" alt="Media Banner"
                        class="w-full h-full object-cover opacity-60 mt-15">
                </video>
                <!-- Cinematic Overlays -->
                <div class="absolute inset-0 bg-gradient-to-b from-secondary/80 via-secondary/40 to-secondary"></div>
                <div class="absolute inset-0 bg-black/10"></div>
            </div>

            <div class="relative z-10 max-w-[1536px] mx-auto px-6 lg:px-20 w-full lg:pt-[20px]  pb-40">
                <div class="max-w-5xl">
                    <div class="reveal-on-scroll">
                        <!-- Minimalist Accent -->
                        <div class="flex items-center gap-4 mb-5">
                            <div class="w-12 h-[2px] bg-primary shadow-[0_0_15px_rgba(2,177,235,0.5)]"></div>
                            <span class="text-white/50 text-[10px] font-black uppercase tracking-[0.6em]">Official News
                                & Media</span>
                        </div>

                        <!-- Clean Large Typography -->
                        <h1
                            class="font-outfit text-6xl md:text-8xl lg:text-[90px] font-black text-white leading-[0.85] tracking-tighter mb-10">
                            Empowering <span class="text-primary italic">People,</span><br>
                            Upholding Rights.
                        </h1>

                        <!-- Minimal Description -->
                        <p
                            class="text-white/70 text-lg md:text-2xl max-w-2xl leading-relaxed font-light mb-12 border-l-2 border-primary/30 pl-8">
                            Documenting justice, equality, and human rights progress across Khyber Pakhtunkhwa.
                        </p>

                        <!-- Clean CTA -->
                        <div class="flex flex-wrap gap-6">
                            <a href="#content"
                                class="px-12 py-5 bg-white text-secondary font-black uppercase tracking-widest text-[11px] rounded-full shadow-2xl hover:bg-primary hover:text-white transition-all active:scale-95 flex items-center gap-4 group">
                                Explore Dispatches
                                <i data-lucide="arrow-right"
                                    class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subtle Partner Logo Strip -->
            <div class="absolute bottom-0 left-0 w-full bg-black/20 backdrop-blur-md border-t border-white/5 py-10">
                <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                    <div
                        class="flex flex-wrap items-center justify-between gap-5 lg:gap-10 opacity-30 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-1000">
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.4em]">KP Government</span>
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.4em]">UN Women</span>
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.4em]">UNICEF</span>
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.4em]">UNDP</span>
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.4em]">Justice
                            Commission</span>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-32 left-1/2 -translate-x-1/2 hidden lg:flex flex-col items-center gap-4">
                <div class="w-[1px] h-12 bg-gradient-to-b from-primary to-transparent animate-pulse"></div>
            </div>
        </section>

        <!-- Filter Bar -->
        <section id="content" class="bg-white border-b border-slate-100  z-40">
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                <div class="flex items-center gap-3 py-4 overflow-x-auto scrollbar-hide">
                    <a href="<?php echo e(route('mediacorner')); ?>"
                       class="shrink-0 px-5 py-2.5 text-[10px] font-black uppercase tracking-widest rounded-full transition-all duration-300 <?php echo e(($filter === 'all' || !$filter) ? 'bg-[#123B2D] text-white' : 'bg-slate-100 text-slate-500 hover:bg-slate-200'); ?>">
                        All
                    </a>
                    <a href="<?php echo e(route('mediacorner', ['filter' => 'news'])); ?>"
                       class="shrink-0 px-5 py-2.5 text-[10px] font-black uppercase tracking-widest rounded-full transition-all duration-300 <?php echo e($filter === 'news' ? 'bg-[#123B2D] text-white' : 'bg-slate-100 text-slate-500 hover:bg-slate-200'); ?>">
                        News
                    </a>
                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('mediacorner', ['filter' => $subject])); ?>"
                           class="shrink-0 px-5 py-2.5 text-[10px] font-black uppercase tracking-widest rounded-full transition-all duration-300 <?php echo e($filter === $subject ? 'bg-[#123B2D] text-white' : 'bg-slate-100 text-slate-500 hover:bg-slate-200'); ?>">
                            <?php echo e($subject); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>

        <!-- Unified Card Grid -->
        <section class="py-16">
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                <?php if($items->count()): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="group bg-white border border-slate-100 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                                <div class="relative h-60 overflow-hidden">
                                    <?php if($item->item_type === 'news'): ?>
                                        <img src="<?php echo e($item->image_path ? asset('storage/' . $item->image_path) : asset('images/event 6.jpg')); ?>"
                                             alt="<?php echo e($item->title); ?>"
                                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    <?php else: ?>
                                        <img src="<?php echo e($item->coverImageUrl() ?? asset('images/event 1.jpeg')); ?>"
                                             alt="<?php echo e($item->title); ?>"
                                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    <?php endif; ?>
                                    <div class="absolute top-4 left-4">
                                        <?php if($item->item_type === 'news'): ?>
                                            <span class="bg-[#02B1EB] text-white text-[9px] font-black uppercase tracking-widest px-3 py-1.5 rounded-lg shadow-lg">News</span>
                                        <?php elseif($item->subject): ?>
                                            <span class="bg-[#123B2D] text-white text-[9px] font-black uppercase tracking-widest px-3 py-1.5 rounded-lg shadow-lg"><?php echo e($item->subject); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="p-8">
                                    <div class="flex items-center gap-2 text-slate-400 text-xs font-bold uppercase tracking-widest mb-4">
                                        <i data-lucide="calendar" class="w-3.5 h-3.5 text-[#123B2D]"></i>
                                        <?php if($item->item_type === 'news'): ?>
                                            <?php echo e($item->published_date ? $item->published_date->format('M d, Y') : 'N/A'); ?>

                                        <?php else: ?>
                                            <?php echo e($item->event_date ? $item->event_date->format('M d, Y') : 'N/A'); ?>

                                        <?php endif; ?>
                                    </div>
                                    <h3 class="font-outfit text-xl font-bold text-slate-900 uppercase tracking-tight mb-4 group-hover:text-[#02B1EB] transition-colors">
                                        <?php echo e($item->title); ?>

                                    </h3>
                                    <p class="text-slate-500 text-sm leading-relaxed line-clamp-3 mb-6">
                                        <?php if($item->item_type === 'news'): ?>
                                            <?php echo e(Str::limit(strip_tags($item->content ?? $item->description), 150)); ?>

                                        <?php else: ?>
                                            <?php echo e(Str::limit(strip_tags($item->description), 150)); ?>

                                        <?php endif; ?>
                                    </p>
                                    <?php if($item->item_type === 'news'): ?>
                                        <a href="<?php echo e(route('news_details', $item->id)); ?>"
                                           class="inline-flex items-center gap-2 text-secondary font-black uppercase tracking-widest text-[10px] hover:text-[#02B1EB] transition-colors">
                                            Read More <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('events.show', $item)); ?>"
                                           class="inline-flex items-center gap-2 text-secondary font-black uppercase tracking-widest text-[10px] hover:text-[#02B1EB] transition-colors">
                                            View Event <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-16">
                        <?php echo e($items->links()); ?>

                    </div>
                <?php else: ?>
                    <div class="text-center py-20">
                        <i data-lucide="file-x" class="w-16 h-16 text-slate-300 mx-auto mb-4"></i>
                        <p class="text-slate-400 text-lg font-medium">No items found for the selected filter.</p>
                        <a href="<?php echo e(route('mediacorner')); ?>"
                           class="inline-flex items-center gap-2 mt-4 text-secondary font-black uppercase tracking-widest text-xs hover:text-primary transition-colors">
                            Clear Filter <i data-lucide="x" class="w-3 h-3"></i>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </section>

    </main>

    <style>
        .stroke-text {
            -webkit-text-stroke: 1px rgba(255, 255, 255, 0.3);
        }

        @keyframes slow-zoom {
            from { transform: scale(1); }
            to { transform: scale(1.1); }
        }

        .animate-slow-zoom {
            animation: slow-zoom 20s infinite alternate ease-in-out;
        }

        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/mediacorner.blade.php ENDPATH**/ ?>