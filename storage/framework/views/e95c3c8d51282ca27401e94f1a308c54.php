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
<main class="bg-slate-50/50 min-h-screen pt-3">
    <div class="max-w-[1536px] mx-auto px-6 lg:px-20 pb-10">

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden mb-10">
            <?php if($cover = $event->coverImageUrl()): ?>
                <div class="aspect-[21/9] max-h-[420px] overflow-hidden w-full">
                    <img src="<?php echo e($cover); ?>" alt="<?php echo e($event->title); ?>" class="w-full h-full object-cover">
                </div>
            <?php endif; ?>

            <div class="p-8 lg:p-12">
                <div class="flex flex-wrap items-start gap-6 mb-6">
                    <div class="flex flex-col items-center justify-center bg-[#123B2D]/10 text-[#123B2D] w-16 h-16 rounded-2xl shrink-0">
                        <span class="text-xl font-black leading-none"><?php echo e($event->event_date?->format('d')); ?></span>
                        <span class="text-[9px] font-bold uppercase tracking-widest"><?php echo e($event->event_date?->format('M Y')); ?></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <?php if($event->subject): ?>
                            <p class="text-[#02B1EB] text-xs font-black uppercase tracking-widest mb-2"><?php echo e($event->subject); ?></p>
                        <?php endif; ?>
                        <h1 class="font-outfit text-3xl md:text-4xl font-black text-slate-900 uppercase tracking-tight mb-3">
                            <?php echo e($event->title); ?>

                        </h1>
                        <div class="flex items-center gap-2 text-slate-500 text-sm font-bold uppercase">
                            <i data-lucide="map-pin" class="w-4 h-4 text-[#02B1EB]"></i>
                            <?php echo e($event->location); ?>

                        </div>
                    </div>
                </div>

                <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed">
                    <?php echo nl2br(e($event->description)); ?>

                </div>
            </div>
        </div>

        <?php if($event->images->isNotEmpty()): ?>
            <section class="mb-12">
                <h2 class="font-outfit text-2xl font-black text-slate-900 uppercase tracking-tight mb-6">
                    Event <span class="text-[#123B2D]">Photos</span>
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <?php $__currentLoopData = $event->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button"
                                class="relative aspect-square rounded-xl overflow-hidden group cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#02B1EB]"
                                onclick="openEventLightbox('<?php echo e(asset('storage/' . $image->image_path)); ?>')">
                            <img src="<?php echo e(asset('storage/' . $image->image_path)); ?>" alt="<?php echo e($event->title); ?>"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-[#123B2D]/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <i data-lucide="maximize-2" class="w-8 h-8 text-white"></i>
                            </div>
                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if($event->videos->isNotEmpty()): ?>
            <section class="mb-12">
                <h2 class="font-outfit text-2xl font-black text-slate-900 uppercase tracking-tight mb-6">
                    Event <span class="text-[#123B2D]">Videos</span>
                </h2>
                <div class="grid grid-cols-1 <?php echo e($event->videos->count() > 1 ? 'lg:grid-cols-2' : ''); ?> gap-8">
                    <?php $__currentLoopData = $event->videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rounded-2xl overflow-hidden border border-slate-100 bg-white shadow-sm p-2">
                            <?php if (isset($component)) { $__componentOriginal65c1bc827ee2e7b04750a06fc4595f0e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal65c1bc827ee2e7b04750a06fc4595f0e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.youtube-embed','data' => ['videoId' => $video->youtube_video_id,'title' => $event->title,'className' => 'rounded-xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.youtube-embed'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['videoId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($video->youtube_video_id),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($event->title),'className' => 'rounded-xl']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal65c1bc827ee2e7b04750a06fc4595f0e)): ?>
<?php $attributes = $__attributesOriginal65c1bc827ee2e7b04750a06fc4595f0e; ?>
<?php unset($__attributesOriginal65c1bc827ee2e7b04750a06fc4595f0e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal65c1bc827ee2e7b04750a06fc4595f0e)): ?>
<?php $component = $__componentOriginal65c1bc827ee2e7b04750a06fc4595f0e; ?>
<?php unset($__componentOriginal65c1bc827ee2e7b04750a06fc4595f0e); ?>
<?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
        <?php endif; ?>
    </div>

    <div id="event-lightbox" class="fixed inset-0 z-[200] bg-black/90 hidden items-center justify-center p-4" onclick="closeEventLightbox()">
        <button type="button" class="absolute top-6 right-6 text-white hover:text-[#02B1EB]" aria-label="Close">
            <i data-lucide="x" class="w-10 h-10"></i>
        </button>
        <img id="event-lightbox-img" src="" alt="Enlarged view" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl" onclick="event.stopPropagation()">
    </div>
</main>

<script>
    function openEventLightbox(src) {
        const box = document.getElementById('event-lightbox');
        const img = document.getElementById('event-lightbox-img');
        if (!box || !img) return;
        img.src = src;
        box.classList.remove('hidden');
        box.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    function closeEventLightbox() {
        const box = document.getElementById('event-lightbox');
        if (!box) return;
        box.classList.add('hidden');
        box.classList.remove('flex');
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeEventLightbox();
    });
    if (typeof lucide !== 'undefined') lucide.createIcons();
</script>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/event-show.blade.php ENDPATH**/ ?>