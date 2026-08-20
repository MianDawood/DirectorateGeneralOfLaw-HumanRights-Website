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

<script>
    // Official Messages Data
    const officialMessagesData = <?php echo json_encode($officialMessages->keyBy('id'), 15, 512) ?>;

    function openModal(messageId) {
        const message = officialMessagesData[messageId];
        if (!message) return;

        const modal = document.getElementById('officialMessageModal');
        const modalContent = document.getElementById('modalContent');

        // Populate modal content
        modalContent.innerHTML = `
            <div class="flex items-center gap-6 mb-6">
                <img src="${message.image_path ? <?php echo json_encode(asset('') . 'storage/', 15, 512) ?> + message.image_path : <?php echo json_encode(asset('images/logo.jpg'), 15, 512) ?>}"
                     class="w-24 h-24 rounded-full object-cover border-4 border-[#123B2D] shadow-lg ${message.image_path && message.image_path.includes('logo.jpg') ? 'p-2 bg-white' : ''}">
                <div>
                    <h3 class="font-outfit text-2xl font-bold text-slate-900">${message.name}</h3>
                    <p class="text-xs font-bold text-[#02B1EB] uppercase tracking-widest mt-1">${message.position}</p>
                </div>
            </div>
            <div class="text-slate-600 leading-relaxed font-inter space-y-4">
                ${message.statement.split('\n\n').map(paragraph => `<p>${paragraph}</p>`).join('')}
            </div>
        `;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.firstElementChild.classList.remove('scale-95');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('opacity-0');
        modal.firstElementChild.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
        document.body.style.overflow = 'auto';
    }

    setTimeout(() => { if(window.lucide) { window.lucide.createIcons(); } }, 100);
</script>

     
    <section class="w-full reveal-on-scroll">
        <div class="relative group overflow-hidden bg-white">
            <div id="hero-slider" class="relative h-[400px] lg:h-[600px] overflow-hidden">
                <?php $__empty_1 = true; $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="slide absolute inset-0 transition-opacity duration-1000 <?php echo e($loop->first ? 'opacity-100 z-10' : 'opacity-0 z-0'); ?>">
                        <img src="<?php echo e($slide->image_url); ?>" alt="<?php echo e($slide->title); ?>" class="w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-r from-[#123B2D]/90 via-[#123B2D]/50 to-transparent">
                        </div>
                        <div
                            class="hero-content absolute inset-y-0 left-0 w-full md:w-3/4 flex flex-col justify-center p-6 lg:p-24 z-20">
                            <div class="w-20 h-1.5 bg-[#02B1EB] mb-8 rounded-full"></div>
                            <h2
                                class="font-outfit text-3xl lg:text-6xl font-black text-white leading-[1] tracking-tight uppercase lg:mb-8 mb-4">
                                <?php echo e($slide->line1); ?>

                                <?php if($slide->line2 !== ''): ?>
                                    <span class="block text-[#02B1EB]"><?php echo e($slide->line2); ?></span>
                                <?php endif; ?>
                            </h2>
                            <?php if($slide->excerpt): ?>
                                <p class="text-white/80 text-md lg:text-xl leading-relaxed max-w-xl lg:mb-12 mb-6 font-medium">
                                    <?php echo e($slide->excerpt); ?>

                                </p>
                            <?php endif; ?>
                            <a href="<?php echo e($slide->link); ?>"
                                class="inline-flex items-center gap-3 px-6 lg:px-10 py-2 lg:py-4 bg-[#02B1EB] text-white font-bold uppercase tracking-widest text-xs hover:bg-white hover:text-[#123B2D] transition-all duration-500 rounded-xl w-fit shadow-xl group/btn">
                                <span><?php echo e($slide->cta); ?></span>
                                <i data-lucide="arrow-right"
                                    class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-100 z-10">
                        <img src="<?php echo e(asset('images/hero image 1.jpg')); ?>" alt="Directorate of Human Rights"
                            class="w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-r from-[#123B2D]/90 via-[#123B2D]/50 to-transparent">
                        </div>
                        <div
                            class="hero-content absolute inset-y-0 left-0 w-full md:w-3/4 flex flex-col justify-center p-6 lg:p-24 z-20">
                            <div class="w-20 h-1.5 bg-[#02B1EB] mb-8 rounded-full"></div>
                            <h2
                                class="font-outfit text-3xl lg:text-6xl font-black text-white leading-[1] tracking-tight uppercase lg:mb-8 mb-4">
                                Protection of <span class="text-[#02B1EB]">human rights</span> is our ultimate goal
                            </h2>
                            <p class="text-white/80 text-md lg:text-xl leading-relaxed max-w-xl lg:mb-12 mb-6 font-medium">
                                It is your duty to have full knowledge of your rights. If any individual or institution
                                violates your rights, please contact the Human Rights Directorate.
                            </p>
                            <a href="<?php echo e(route('contact_us')); ?>"
                                class="inline-flex items-center gap-3 px-6 lg:px-10 py-2 lg:py-4 bg-[#02B1EB] text-white font-bold uppercase tracking-widest text-xs hover:bg-white hover:text-[#123B2D] transition-all duration-500 rounded-xl w-fit shadow-xl group/btn">
                                <span>Get in Touch</span>
                                <i data-lucide="arrow-right"
                                    class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Navigation Dots -->
            <div id="slider-dots" class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-2 z-20">
                <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span
                        class="dot w-12 h-1 <?php echo e($i === 0 ? 'bg-[#02B1EB]' : 'bg-white/40'); ?> cursor-pointer hover:bg-white/60 transition-all duration-300"></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- Nav Arrows -->
            <div class="absolute inset-y-0 left-0 flex items-center z-20">
                <button onclick="prevSlide()"
                    class="bg-[#123B2D]/60 text-white p-3 hover:bg-[#02B1EB] transition-all rounded-r-lg">
                    <i data-lucide="chevron-left" class="w-6 h-6"></i>
                </button>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center z-20">
                <button onclick="nextSlide()"
                    class="bg-[#123B2D]/60 text-white p-3 hover:bg-[#02B1EB] transition-all rounded-l-lg">
                    <i data-lucide="chevron-right" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
        </section>

    <!-- FUNCTIONS OF DIRECTORATE GENERAL SECTION -->
    <section class="bg-white py-16 reveal-on-scroll">
        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="text-center mb-12">
                <h2 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">Functions of
                    <span class="text-[#02B1EB]">Directorate General</span>
                </h2>
                <p class="text-slate-500 mt-3 max-w-2xl mx-auto text-sm">The Directorate General of Law & Human Rights is responsible for protection of fundamental rights, NGO regulation, treaty compliance, capacity building, and legal awareness across Khyber Pakhtunkhwa.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 reveal-stagger">
                <!-- Register Complaint Card -->
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#123B2D]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#123B2D] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="message-square-warning"
                            class="w-8 h-8 text-[#123B2D] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Register Complaint</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Submit your complaints regarding human rights violations for prompt investigation and resolution.</p>
                    <a href="<?php echo e(route('complaint_cell')); ?>"
                        class="inline-flex items-center gap-2 mt-6 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Learn More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <!-- Register NGO Card -->
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#02B1EB]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#02B1EB] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="clipboard-check"
                            class="w-8 h-8 text-[#02B1EB] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Register NGO</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Register your non-governmental organization under the KP NGOs Registration Rules, 2024.</p>
                    <a href="<?php echo e(route('registration_form_part1')); ?>"
                        class="inline-flex items-center gap-2 mt-6 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Learn More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <!-- Treaty Implementation Cell Card -->
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#123B2D]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#123B2D] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="handshake"
                            class="w-8 h-8 text-[#123B2D] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Treaty Implementation Cell</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Overseeing provincial compliance with international human rights treaties and conventions.</p>
                    <a href="<?php echo e(route('whatwedo')); ?>"
                        class="inline-flex items-center gap-2 mt-6 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Learn More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <!-- Workshop / Seminar / Trainings Card -->
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#02B1EB]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#02B1EB] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="presentation"
                            class="w-8 h-8 text-[#02B1EB] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Workshop / Seminar / Trainings</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Capacity building programs, awareness sessions, and professional development trainings.</p>
                    <a href="<?php echo e(route('mediacorner')); ?>"
                        class="inline-flex items-center gap-2 mt-6 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Learn More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <!-- Publications Card -->
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#123B2D]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#123B2D] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="book-open"
                            class="w-8 h-8 text-[#123B2D] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Publications</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Access official publications, reports, and research documents on human rights and governance.</p>
                    <a href="<?php echo e(route('publications')); ?>"
                        class="inline-flex items-center gap-2 mt-6 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Learn More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- OFFICIAL MESSAGES SECTION -->
    <section class="bg-slate-50 py-16 reveal-on-scroll">
        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="text-center mb-12">
                <h2 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">Official
                    <span class="text-[#02B1EB]">Messages</span>
                </h2>
                <p class="text-slate-500 mt-3 max-w-xl mx-auto text-sm">Messages from the distinguished leadership of
                    Law & Human Rights.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 reveal-stagger">
                <?php $__currentLoopData = $officialMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- <?php echo e($message->name); ?> -->
                <div
                    class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden group hover:shadow-xl transition-all duration-500">
                    <div class="bg-[#123B2D] h-24 relative">
                        <div class="absolute -bottom-12 left-1/2 -translate-x-1/2">
                            <img src="<?php echo e(asset('storage/'. $message->image_path)); ?>" alt="<?php echo e($message->name); ?>"
                                class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg <?php echo e($message->image_path === 'images/logo.jpg' ? 'p-2 bg-white' : ''); ?>" />
                        </div>
                    </div>
                    <div class="pt-16 pb-8 px-6 text-center">
                        <h4 class="font-outfit text-xl font-bold text-slate-900"><?php echo e($message->name); ?></h4>
                        <p class="text-[11px] font-bold text-[#02B1EB] uppercase tracking-[0.15em] mt-1 mb-4"><?php echo e($message->position); ?></p>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">
                            <?php echo e(Str::limit($message->statement, 120)); ?>

                        </p>
                        <a href="javascript:openModal(<?php echo e($message->id); ?>);"
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#123B2D] text-white text-[10px] font-bold uppercase tracking-widest hover:bg-[#02B1EB] transition-all rounded-lg group/btn">
                            Read More <i data-lucide="arrow-right"
                                class="w-3 h-3 group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        </section>


    <!-- LATEST NEWS SECTION  -->
    <section class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10 py-16 reveal-on-scroll">
        <div class="text-center mb-12">
            <h2 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">Latest <span
                    class="text-[#02B1EB]">News</span></h2>
            <p class="text-slate-500 mt-3 max-w-xl mx-auto text-sm">Stay updated with the most recent news and
                announcements from the Directorate.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">
            <?php $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- News Card -->
            <div
                class="bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group hover:-translate-y-1">
                <div class="relative overflow-hidden">
                    <img src="<?php echo e(asset('storage/' . $news->image_path)); ?>" alt="<?php echo e($news->title); ?>"
                        class="w-full h-52 object-cover transition-transform duration-700 group-hover:scale-105" />
                    <?php if($news->is_featured): ?>
                    <div class="absolute top-4 left-4">
                        <span
                            class="px-3 py-1.5 bg-[#123B2D] text-white text-[9px] font-black uppercase tracking-widest rounded-md">Featured</span>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-[#02B1EB] mb-3">
                        <i data-lucide="calendar" class="w-4 h-4"></i>
                        <span class="text-xs font-bold uppercase tracking-wider"><?php echo e($news->published_date->format('F d, Y')); ?></span>
                    </div>
                    <h3
                        class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3 group-hover:text-[#123B2D] transition-colors leading-tight">
                        <?php echo e($news->title); ?>

                    </h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-4 line-clamp-3">
                        <?php echo e($news->excerpt); ?>

                    </p>
                    <a href="<?php echo e(route('news_details', $news->id)); ?>"
                        class="inline-flex items-center gap-2 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Read More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-10">
            <a href="<?php echo e(route('mediacorner')); ?>"
                class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#123B2D] text-white font-bold uppercase tracking-widest text-xs hover:bg-[#02B1EB] transition-all rounded-xl shadow-lg group/btn">
                View All News <i data-lucide="arrow-right"
                    class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform"></i>
            </a>
        </div>
        </section>

    <!-- STATISTICS COUNTER SECTION -->
    <section class="bg-[#123B2D] py-20 reveal-on-scroll mb-12" id="statsSection">
        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="text-center mb-12">
                <h2 class="font-outfit text-3xl md:text-4xl font-black text-white uppercase tracking-tight">Directorate General
                    <span class="text-[#02B1EB]"> at a Glance</span>
                </h2>
                <p class="text-white/70 mt-3 max-w-2xl mx-auto text-sm">Key performance indicators reflecting the impact and reach of the Directorate General of Law & Human Rights, Khyber Pakhtunkhwa.</p>
            </div>
            <div class="flex flex-row items-start justify-center gap-6 md:gap-8 lg:gap-12">
                <div class="flex-1 text-center stat-item min-w-0">
                    <div class="stat-number text-3xl md:text-5xl lg:text-7xl font-black text-white font-outfit leading-none mb-3" data-target="<?php echo e($statsComplaintsTotal); ?>">0</div>
                    <div class="text-white/70 text-[10px] md:text-xs lg:text-sm uppercase tracking-widest font-semibold">Complaints Received</div>
                </div>
                <div class="flex-1 text-center stat-item min-w-0">
                    <div class="stat-number text-3xl md:text-5xl lg:text-7xl font-black text-white font-outfit leading-none mb-3" data-target="<?php echo e($statsComplaintsResolved); ?>">0</div>
                    <div class="text-white/70 text-[10px] md:text-xs lg:text-sm uppercase tracking-widest font-semibold">Complaints Resolved</div>
                </div>
                <div class="flex-1 text-center stat-item min-w-0">
                    <div class="stat-number text-3xl md:text-5xl lg:text-7xl font-black text-white font-outfit leading-none mb-3" data-target="<?php echo e($statsNgosRegistered); ?>">0</div>
                    <div class="text-white/70 text-[10px] md:text-xs lg:text-sm uppercase tracking-widest font-semibold">NGOs Registered</div>
                </div>
                <div class="flex-1 text-center stat-item min-w-0">
                    <div class="stat-number text-3xl md:text-5xl lg:text-7xl font-black text-white font-outfit leading-none mb-3" data-target="<?php echo e($statsTrainings); ?>">0</div>
                    <div class="text-white/70 text-[10px] md:text-xs lg:text-sm uppercase tracking-widest font-semibold">Trainings &amp; Workshops</div>
                </div>
                <div class="flex-1 text-center stat-item min-w-0">
                    <div class="stat-number text-3xl md:text-5xl lg:text-7xl font-black text-white font-outfit leading-none mb-3" data-target="<?php echo e($statsAwareness); ?>">0</div>
                    <div class="text-white/70 text-[10px] md:text-xs lg:text-sm uppercase tracking-widest font-semibold">HR Awareness Sessions</div>
                </div>
                <div class="flex-1 text-center stat-item min-w-0">
                    <div class="stat-number text-3xl md:text-5xl lg:text-7xl font-black text-white font-outfit leading-none mb-3" data-target="<?php echo e($statsResearch); ?>">0</div>
                    <div class="text-white/70 text-[10px] md:text-xs lg:text-sm uppercase tracking-widest font-semibold">Research &amp; Reporting</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Downloads, Tenders, & Causes Section -->
    <section class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10 pb-24 reveal-on-scroll">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 reveal-stagger">

            <!-- Column 1: Downloads -->
            <div class="group flex flex-col h-[520px]">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-[#02B1EB]/10 flex items-center justify-center text-[#02B1EB]">
                            <i data-lucide="file-text" class="w-5 h-5"></i>
                        </div>
                        <h2 class="font-outfit text-xl font-black text-slate-800 uppercase tracking-tight">Downloads
                        </h2>
                    </div>
                    <a href="<?php echo e(route('ngo_required_documents')); ?>"
                        class="text-[10px] font-bold text-secondary hover:text-primary uppercase tracking-widest flex items-center gap-1 transition-colors">
                        View All <i data-lucide="arrow-right" class="w-3 h-3"></i>
                    </a>
                </div>

                <div
                    class="bg-gradient-to-b from-[#02B1EB]/10  border-x border-b border-slate-100 rounded-2xl shadow-sm group-hover:shadow-xl transition-all duration-500 flex-1 overflow-hidden relative min-h-[420px] max-h-[420px]">
                    <div class="h-full overflow-y-auto p-6 scrollbar-thin">
                        <?php $__empty_1 = true; $__currentLoopData = $downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $ext = pathinfo($document->file_path, PATHINFO_EXTENSION);
                            $isPdf = strtolower($ext) === 'pdf';
                        ?>
                        <!-- Download Item -->
                        <div
                            class="p-4 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition-all duration-300 mb-4 group/item">
                        <h4
                            class="text-sm font-bold text-primary leading-snug mb-4 group-hover/item:text-secondary transition-colors">
                            <?php echo e($document->name); ?></h4>
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-medium text-slate-400 uppercase"><?php echo e($ext); ?> DOCUMENT</span>
                                <a href="<?php echo e(asset($document->file_path)); ?>"
                                    <?php echo e($isPdf ? 'target="_blank"' : 'download'); ?>

                                    class="inline-flex items-center gap-2 px-5 py-2 border-2 border-secondary text-secondary text-[10px] font-bold uppercase tracking-widest hover:bg-secondary hover:text-primary transition-all rounded-lg">
                                    <i data-lucide="download" class="w-3 h-3"></i>
                                    Download
                                </a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center py-8">
                            <i data-lucide="file-x" class="w-8 h-8 text-slate-300 mx-auto mb-2"></i>
                            <p class="text-xs text-slate-500">No downloads available</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Column 2: Tenders -->
            <div class="group flex flex-col h-[520px]">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-[#02B1EB]/10 flex items-center justify-center text-[#02B1EB]">
                            <i data-lucide="gavel" class="w-5 h-5"></i>
                        </div>
                        <h2 class="font-outfit text-xl font-black text-slate-800 uppercase tracking-tight">Tenders</h2>
                    </div>
                    <a href="<?php echo e(route('tenders')); ?>"
                        class="text-[10px] font-bold text-secondary hover:text-primary uppercase tracking-widest flex items-center gap-1 transition-colors">
                        View All <i data-lucide="arrow-right" class="w-3 h-3"></i>
                    </a>
                </div>

                <div
                    class="bg-gradient-to-b from-[#123B2D]/10  border-x border-b border-slate-100 rounded-2xl shadow-sm group-hover:shadow-xl transition-all duration-500 flex-1 overflow-hidden relative min-h-[420px] max-h-[420px]">
                    <div class="h-full overflow-y-auto p-6 scrollbar-thin">
                        <?php $__empty_1 = true; $__currentLoopData = $latestTenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div
                                class="p-5 rounded-xl border border-slate-50 hover:border-[#f1b42f]/30 hover:bg-[#f1b42f]/5 transition-all duration-300 mb-4 group/item">
                                <div class="flex items-center justify-between mb-3">
                                    <span
                                        class="px-2.5 py-1 rounded-full bg-[#f1b42f]/10 text-[#f1b42f] text-[9px] font-black uppercase tracking-widest">
                                        <?php echo e(strtoupper($tender->status)); ?>

                                    </span>
                                    <div class="flex items-center gap-1.5 text-slate-400">
                                        <i data-lucide="calendar" class="w-3 h-3"></i>
                                        <span class="text-[10px] font-bold">
                                            Closing: <?php echo e(optional($tender->closing_date)->format('M d') ?? '—'); ?>

                                        </span>
                                    </div>
                                </div>
                                <h4
                                    class="text-sm font-bold text-slate-700 leading-snug mb-5 group-hover/item:text-slate-900 transition-colors">
                                    <?php echo e($tender->title); ?>

                                </h4>
                                <a href="<?php echo e(route('tenders')); ?>"
                                    class="inline-flex items-center gap-2 px-5 py-2 border-2 border-secondary text-secondary text-[10px] font-bold uppercase tracking-widest hover:bg-secondary hover:text-primary transition-all rounded-lg">
                                    View Details
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="text-center py-8">
                                <i data-lucide="file-x" class="w-8 h-8 text-slate-300 mx-auto mb-2"></i>
                                <p class="text-xs text-slate-500">No tenders available</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Column 3: Causes -->
            <div class="group flex flex-col h-[520px]">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-[#02B1EB]/10 flex items-center justify-center text-[#02B1EB]">
                            <i data-lucide="heart" class="w-5 h-5"></i>
                        </div>
                        <h2 class="font-outfit text-xl font-black text-slate-800 uppercase tracking-tight">Causes
                        </h2>
                    </div>
                    <a href="<?php echo e(route('causes')); ?>"
                        class="text-[10px] font-bold uppercase tracking-widest flex items-center gap-1 text-secondary transition-colors">
                        View All <i data-lucide="arrow-right" class="w-3 h-3"></i>
                    </a>
                </div>

                <div
                    class="bg-gradient-to-b from-[#02B1EB]/5  border-x border-b border-slate-100 rounded-2xl shadow-sm duration-500 flex-1 overflow-hidden relative min-h-[420px] max-h-[420px]">
                    <div class="h-full overflow-y-auto p-6 scrollbar-none">
                        <?php $__empty_1 = true; $__currentLoopData = $latestCauses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cause): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div
                                class="p-5 rounded-xl bg-slate-50/50 hover:bg-white border border-transparent hover:border-slate-100 mb-4 group/item">
                                <div class="flex items-start justify-between gap-2">
                                    <h4
                                        class="text-sm font-bold text-slate-700 leading-snug group-hover/item:text-primary transition-colors">
                                        <a href="<?php echo e(route('causes')); ?>" class="hover:text-[#02B1EB] transition-colors">
                                            <?php echo e($cause->title); ?>

                                        </a>
                                    </h4>
                                    <?php if($cause->file_path): ?>
                                        <a href="<?php echo e(asset('storage/' . $cause->file_path)); ?>" target="_blank"
                                            class="shrink-0 inline-flex items-center justify-center w-8 h-8 rounded-lg border border-[#02B1EB]/30 text-[#02B1EB] hover:bg-[#02B1EB] hover:text-white transition-all"
                                            title="Download <?php echo e(strtoupper(pathinfo($cause->file_path, PATHINFO_EXTENSION))); ?>">
                                            <i data-lucide="download" class="w-3.5 h-3.5"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="text-center py-8">
                                <i data-lucide="file-x" class="w-8 h-8 text-slate-300 mx-auto mb-2"></i>
                                <p class="text-xs text-slate-500">No causes available</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
        </section>

    <!-- OUR PARTNERS SECTION -->
<section class="bg-white pt-3 pb-10 reveal-on-scroll">
    <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">
        <!-- heading & subheading -->
        <div class="text-center mb-12">
            <h2 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">
                Our
                <span class="text-[#02B1EB]">Partners</span>
            </h2>
            <p class="text-slate-500 mt-3 max-w-2xl mx-auto text-sm">
                Organizations collaborating with the Directorate General of Law & Human Rights, Khyber Pakhtunkhwa.
            </p>
        </div>

    <!-- partners marquee -->
    <?php if($partners->count()): ?>
        <div class="marquee-wrapper overflow-hidden">
            <div class="marquee-track flex items-center gap-10 md:gap-16">
                <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('partners.show', $partner)); ?>"
                       class="group block shrink-0 transition-all duration-300"
                       title="<?php echo e($partner->name); ?>">
                        <div class="bg-white/80 rounded-full w-32 h-32 md:w-48 md:h-48 shadow-sm hover:shadow-lg transition-shadow duration-300 flex items-center justify-center border-2 border-slate-100/80 p-2 overflow-hidden">
                            <img src="<?php echo e(asset('storage/' . $partner->logo_path)); ?>"
                                 alt="<?php echo e($partner->name); ?>"
                                 class="w-full h-full object-cover rounded-full">
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php else: ?>
        <p class="text-slate-400 text-sm text-center">No partners added yet.</p>
    <?php endif; ?>
    </div>
</section>

<style>
.marquee-wrapper {
    mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
    -webkit-mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
}
.marquee-track {
    animation: marqueeScroll 40s linear infinite;
    width: fit-content;
}
.marquee-track:hover {
    animation-play-state: paused;
}
@keyframes marqueeScroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
</style>


    <!-- Official Messages Modal -->
    <div id="officialMessageModal" class="fixed inset-0 z-[200] hidden items-center justify-center bg-slate-900/60 backdrop-blur-sm opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-2xl w-[90%] max-w-2xl max-h-[90vh] overflow-y-auto p-8 relative transform scale-95 transition-transform duration-300">
            <button onclick="closeModal('officialMessageModal')" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 transition-colors p-2 rounded-lg hover:bg-red-50"><i data-lucide="x" class="w-6 h-6"></i></button>
            <div id="modalContent">
                <!-- Content will be populated dynamically -->
            </div>
        </div>
    </div>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const statNumbers = document.querySelectorAll('.stat-number');
    if (!statNumbers.length) return;
    const targets = [];
    statNumbers.forEach(function (el) { targets.push(parseInt(el.getAttribute('data-target'))); });
    const section = document.getElementById('statsSection');
    if (!section) return;
    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                statNumbers.forEach(function (el, i) {
                    const target = targets[i];
                    el.textContent = '0';
                    if (target === 0) return;
                    const duration = 800;
                    const start = performance.now();
                    function update(now) {
                        var progress = Math.min((now - start) / duration, 1);
                        el.textContent = Math.floor((1 - Math.pow(1 - progress, 3)) * target);
                        if (progress < 1) requestAnimationFrame(update);
                        else el.textContent = target;
                    }
                    requestAnimationFrame(update);
                });
            } else {
                statNumbers.forEach(function (el) { el.textContent = '0'; });
            }
        });
    }, { threshold: 0.3 });
    observer.observe(section);
});
</script>
<?php $__env->stopPush(); ?>

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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/index.blade.php ENDPATH**/ ?>