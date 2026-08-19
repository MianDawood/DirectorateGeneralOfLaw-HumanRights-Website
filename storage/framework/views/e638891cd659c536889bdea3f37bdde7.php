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
<main class="bg-slate-50/50">
    <!-- Page Header Strip -->
    <section class="bg-[#123B2D] lg:py-14 py-10">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="reveal-on-scroll">
                    <p class="text-[#02B1EB] text-[10px] font-black uppercase tracking-[0.5em] mb-3">About Directorate</p>
                    <h1 class="font-outfit text-3xl md:text-4xl font-black text-white uppercase tracking-tight leading-tight">
                        Organizational Structure
                    </h1>
                    <p class="text-white/80 text-sm mt-3 max-w-2xl">Discover the hierarchical framework and key positions within our directorate. Our organizational structure is designed to ensure effective governance and seamless coordination across all departments and wings.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Organizational Structure -->
    <section class="py-10 lg:py-16">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php $__empty_1 = true; $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-14 h-14 <?php echo e($loop->even ? 'bg-[#02B1EB]' : 'bg-[#123B2D]'); ?> rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="<?php echo e($position->icon ?: 'user'); ?>" class="w-7 h-7 text-white"></i>
                        </div>
                        <h4 class="font-outfit text-sm font-bold text-slate-900 uppercase tracking-tight"><?php echo e($position->title); ?></h4>
                        <p class="text-[10px] text-slate-500 mt-1 uppercase tracking-wider font-semibold"><?php echo e($position->subtitle); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-14 h-14 bg-[#123B2D] rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="user" class="w-7 h-7 text-white"></i>
                        </div>
                        <h4 class="font-outfit text-sm font-bold text-slate-900 uppercase tracking-tight">Director General</h4>
                        <p class="text-[10px] text-slate-500 mt-1 uppercase tracking-wider font-semibold">Head of Directorate</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-14 h-14 bg-[#02B1EB] rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="users" class="w-7 h-7 text-white"></i>
                        </div>
                        <h4 class="font-outfit text-sm font-bold text-slate-900 uppercase tracking-tight">Additional Directors</h4>
                        <p class="text-[10px] text-slate-500 mt-1 uppercase tracking-wider font-semibold">Law &amp; HR Wings</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-14 h-14 bg-[#123B2D] rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="briefcase" class="w-7 h-7 text-white"></i>
                        </div>
                        <h4 class="font-outfit text-sm font-bold text-slate-900 uppercase tracking-tight">Deputy Directors</h4>
                        <p class="text-[10px] text-slate-500 mt-1 uppercase tracking-wider font-semibold">Complaints, NGO, Admin</p>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-14 h-14 bg-[#02B1EB] rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="building-2" class="w-7 h-7 text-white"></i>
                        </div>
                        <h4 class="font-outfit text-sm font-bold text-slate-900 uppercase tracking-tight">Support Staff</h4>
                        <p class="text-[10px] text-slate-500 mt-1 uppercase tracking-wider font-semibold">Assistant Directors &amp; Officers</p>
                    </div>
                <?php endif; ?>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/org_structure.blade.php ENDPATH**/ ?>