<?php
    use App\Models\VisionMission;

    // Fetch the active Vision, Mission and Core Values sections
    $vision = VisionMission::where('section', 'vision')->active()->first();
    $mission = VisionMission::where('section', 'mission')->active()->first();
    $coreValues = VisionMission::where('section', 'core_values')->active()->first();
?>

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
    <section class="bg-[#123B2D] lg:py-14 py-10">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="reveal-on-scroll">
                    <p class="text-[#02B1EB] text-[10px] font-black uppercase tracking-[0.5em] mb-3">About Directorate</p>
                    <h1 class="font-outfit text-3xl md:text-4xl font-black text-white uppercase tracking-tight leading-tight">
                        Vision & Mission
                    </h1>
                    <p class="text-white/80 text-base md:text-lg mt-3 max-w-2xl">Discover our commitment to promoting, protecting, and enforcing human rights across Khyber Pakhtunkhwa through our vision, mission, and core values.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision, Mission & Core Values -->
    <section class="py-10 lg:py-16">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="space-y-10 lg:space-y-20">
                <!-- Vision -->
                <div class="reveal-on-scroll">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-1.5 h-8 bg-black rounded-full"></div>
                        <h2 class="font-outfit text-3xl lg:text-4xl font-extrabold text-[#0ea5e9] uppercase tracking-tight">Vision</h2>
                    </div>
                    <p class="text-slate-600 text-lg lg:text-xl leading-relaxed max-w-4xl font-medium">
                        <?php echo e($vision?->description ?? 'Our vision is of a Khyber Pakhtunkhwa Province in which every person\'s Human Rights are respected and he/she is able to enjoy life in all its fullness.'); ?>

                    </p>
                </div>

                <!-- Mission -->
                <div class="reveal-on-scroll">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-1.5 h-8 bg-black rounded-full"></div>
                        <h2 class="font-outfit text-3xl lg:text-4xl font-extrabold text-[#0ea5e9] uppercase tracking-tight">Mission</h2>
                    </div>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed max-w-5xl">
                        <?php echo e($mission?->description ?? 'Directorate of Human Rights Government of Khyber Pakhtunkhwa\'s Mission is to Promote, Protect and Enforce Human Rights in the Province of Khyber Pakhtunkhwa, as guaranteed by the Constitution of Islamic Republic of Pakistan and various International Conventions, Treaties, Covenants and Agreements to which Pakistan is a state party or shall become a state party.'); ?>

                    </p>
                </div>

                <!-- Core Values -->
                <div class="reveal-on-scroll">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-1.5 h-8 bg-black rounded-full"></div>
                        <h2 class="font-outfit text-3xl lg:text-4xl font-extrabold text-[#0ea5e9] uppercase tracking-tight">Core Values</h2>
                    </div>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed max-w-5xl mb-12">
                        <?php echo e($coreValues?->description ?? 'Directorate of Human Rights, a statutory and independent institution under the general supervision of Law, Parliamentary Affairs & Human Rights Department Government of Khyber Pakhtunkhwa, is committed to upholding these core values:'); ?>

                    </p>

                    <!-- Values Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-4">
                        <?php $__currentLoopData = ['Independence', 'Professionalism', 'Equality', 'Participation', 'Accessibility', 'Accountability', 'Inclusiveness', 'Integrity', 'Pro-activeness', 'Collaboration']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center gap-4 group transition-all duration-300 py-1">
                                <div class="w-6 h-6 bg-[#0ea5e9] flex items-center justify-center rounded shadow-lg shadow-[#0ea5e9]/20 group-hover:translate-x-1 transition-transform">
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-white"></i>
                                </div>
                                <span class="text-slate-700 font-black text-sm sm:text-base lg:text-lg uppercase tracking-wider"><?php echo e($value); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/vision_mission.blade.php ENDPATH**/ ?>