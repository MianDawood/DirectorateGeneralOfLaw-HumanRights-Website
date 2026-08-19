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
<main class="">
  <section class="bg-gradient-to-br from-[#123B2D] to-[#1a5240] py-20 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20 relative z-10">
                <div class="flex items-center gap-3 mb-6 reveal-on-scroll">
                    <span class="w-12 h-[2px] bg-[#02B1EB]"></span>
                    <span class="text-[#02B1EB] text-xs font-black uppercase tracking-[0.3em]">Directorate General of Law & Human Rights</span>
                </div>
                <h1 class="font-outfit text-5xl md:text-7xl font-black text-white uppercase tracking-tight mb-6 reveal-on-scroll">
                    Our Perfect <br><span class="text-[#02B1EB]">Team</span>
                </h1>
                <p class="text-white/70 text-lg md:text-xl max-w-2xl leading-relaxed reveal-on-scroll">
                    Committed to safeguarding fundamental rights and promoting justice, our dedicated team works tirelessly to ensure dignity and positive impact across Khyber Pakhtunkhwa.
                </p>
            </div>
        </section>

        <div class="max-w-6xl mx-auto p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-16 md:gap-y-32 reveal-stagger">
                <?php
                    $teamMembers = $teamMembers ?? collect();
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $teamMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $initials = collect(explode(' ', trim($member->name)))
                            ->filter()
                            ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                            ->take(3)
                            ->implode('');
                    ?>
                    <div class="flex flex-col items-center md:flex-row md:items-start gap-6 md:gap-8 group">
                        <div
                            class="shrink-0 w-48 h-48 md:w-48 md:h-48 rounded-full overflow-hidden border-4 border-slate-50 shadow-2xl group-hover:scale-105 transition-transform duration-700">
                            <img src="<?php echo e($member->image_path ?  asset('storage/' . $member->image_path) : asset('images/logo.jpg')); ?>"
                                alt="<?php echo e($member->name); ?>" class="w-full h-full object-cover"
                                onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden'); this.nextElementSibling.classList.add('flex');" />
                            <div
                                class="hidden w-full h-full bg-gradient-to-br from-slate-200 to-slate-300 flex-col items-center justify-center gap-2">
                                <svg class="w-12 h-12 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                <span class="font-outfit text-2xl font-bold text-slate-500 tracking-widest"><?php echo e($initials); ?></span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center md:items-start text-center md:text-left pt-2 md:pt-4">
                            <h3 class="font-outfit text-3xl font-bold text-slate-900 leading-none mb-2"><?php echo e($member->name); ?></h3>
                            <p class="text-primary font-bold text-base uppercase tracking-widest mb-6"><?php echo e($member->position); ?></p>
                            <p class="text-slate-400 text-[13px] italic leading-relaxed mb-8 max-w-[280px]">
                                <?php if($member->email): ?>
                                    <i data-lucide="mail" class="w-4 h-4 inline-block mr-1 text-[#123B2D]"></i>
                                    <?php echo e($member->email); ?><br>
                                <?php endif; ?>
                                <?php if($member->phone): ?>
                                    <i data-lucide="phone" class="w-4 h-4 inline-block mr-1 text-[#123B2D]"></i>
                                    <?php echo e($member->phone); ?>

                                <?php endif; ?>
                            </p>
                            <div class="flex items-center gap-5 text-slate-300">
                                <a href="<?php echo e($member->facebook_url ?? '#'); ?>"
                                    class="hover:text-primary transition-all duration-300 transform hover:scale-110"><i
                                        data-lucide="facebook" class="w-6 h-6"></i></a>
                                <a href="<?php echo e($member->twitter_url ?? '#'); ?>"
                                    class="hover:text-primary transition-all duration-300 transform hover:scale-110"><i
                                        data-lucide="twitter" class="w-6 h-6"></i></a>
                                <a href="<?php echo e($member->instagram_url ?? '#'); ?>"
                                    class="hover:text-primary transition-all duration-300 transform hover:scale-110"><i
                                        data-lucide="instagram" class="w-6 h-6"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full text-center py-12 text-slate-500">No team members available.</div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <!-- Global Scrollbar Styles -->
    <style>
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: transparent;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: #cbd5e0;
        }
    </style>
    <!-- Footer Section -->
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/ourteam.blade.php ENDPATH**/ ?>