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
    <!-- Page Header Strip -->
    <section class="bg-[#123B2D] lg:py-16 py-12">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="reveal-on-scroll">
                    <p class="text-[#02B1EB] text-[10px] font-black uppercase tracking-[0.5em] mb-3">Partner
                        Organization</p>
                    <h1
                        class="font-outfit text-3xl md:text-5xl font-black text-white uppercase tracking-tight leading-tight">
                        <?php echo e($partner->name); ?>

                    </h1>
                </div>
                <a href="<?php echo e(route('home')); ?>"
                    class="inline-flex items-center gap-2 text-white/70 hover:text-white text-[10px] font-black uppercase tracking-widest transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Back to Home
                </a>
            </div>
        </div>
    </section>

    <!-- Partner Detail -->
    <section class="lg:py-16 py-10">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-8 lg:p-14 text-center">
                        <div
                            class="w-40 h-40 md:w-52 md:h-52 mx-auto rounded-full bg-slate-50 border-2 border-slate-100 p-2 flex items-center justify-center overflow-hidden shadow-sm mb-8">
                            <?php if($partner->logo_path): ?>
                                <img src="<?php echo e(asset('storage/' . $partner->logo_path)); ?>" alt="<?php echo e($partner->name); ?>"
                                    class="w-full h-full object-cover rounded-full">
                            <?php else: ?>
                                <div class="w-full h-full rounded-full bg-[#123B2D]/10 flex items-center justify-center text-[#123B2D]">
                                    <i data-lucide="building-2" class="w-12 h-12"></i>
                                </div>
                            <?php endif; ?>
                        </div>

                        <h2 class="font-outfit text-2xl md:text-3xl font-black text-[#123B2D] uppercase tracking-tight mb-4">
                            <?php echo e($partner->name); ?>

                        </h2>

                        <?php if($partner->description): ?>
                            <div class="text-slate-500 text-sm md:text-base leading-relaxed max-w-2xl mx-auto">
                                <?php echo nl2br(e($partner->description)); ?>

                            </div>
                        <?php endif; ?>

                        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                            <?php if($partner->url): ?>
                                <a href="<?php echo e($partner->url); ?>" target="_blank"
                                    class="inline-flex items-center gap-3 px-8 py-4 bg-[#123B2D] text-white text-[11px] font-black uppercase tracking-widest rounded-xl hover:bg-[#02B1EB] transition-all shadow-lg group">
                                    Visit Official Website
                                    <i data-lucide="external-link"
                                        class="w-4 h-4 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('home')); ?>"
                                class="inline-flex items-center gap-2 px-8 py-4 border-2 border-slate-200 text-slate-600 text-[11px] font-black uppercase tracking-widest rounded-xl hover:border-[#123B2D] hover:text-[#123B2D] transition-all">
                                Back to Home
                            </a>
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
<?php endif; ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/partner_detail.blade.php ENDPATH**/ ?>