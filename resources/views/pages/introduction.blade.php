<x-layout>
<!-- Clean Professional Introduction Hero -->
    <section class="bg-white  py-10 lg:py-15">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="flex flex-col-reverse lg:flex-row items-center gap-6 lg:gap-20">
                <!-- Text Content -->
                <div class="flex-1 space-y-6">
                    <div class="flex items-center gap-3">
                        <!-- <div class="w-10 h-1 bg-primary"></div> -->
                        <span class="text-xs font-bold uppercase tracking-[0.3em] text-slate-400">Government of Khyber
                            Pakhtunkhwa</span>
                    </div>

                    <h1
                        class="font-outfit text-4xl lg:text-5xl font-extrabold text-slate-900 leading-tight uppercase tracking-tight">
                        About the <span class="text-[#123B2D]">Directorate</span> <br /> of Human Rights
                    </h1>

                    <p
                        class="text-slate-600 text-lg leading-relaxed max-w-xl font-medium italic border-l-4 border-slate-100 pl-6">
                        Established to safeguard and promote fundamental rights, ensuring justice and equality for every
                        citizen across the province through legal framework and community engagement.
                    </p>

                    <!-- Clean Breadcrumb -->
                    <nav class="flex items-center gap-3 pt-6 border-t border-slate-100 w-fit">
                        <a href="{{ route('home') }}"
                            class="flex items-center gap-2 text-slate-400 hover:text-[#02B1EB] transition-colors text-[10px] font-black uppercase tracking-[0.2em]">
                            <i data-lucide="home" class="w-3.5 h-3.5"></i>
                            Home
                        </a>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-200"></i>
                        <span
                            class="text-slate-900 text-[10px] font-black uppercase tracking-[0.2em]">Introduction</span>
                    </nav>
                </div>

                <!-- Image Side -->
                <div class="flex-1 w-full lg:w-auto">
                    <div class="relative lg:px-4 px-0">
                        <!-- Solid Decorative Elements -->
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-slate-50 rounded-full -translate-y-6 translate-x-6 -z-10">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 w-32 h-32 bg-slate-50 rounded-full translate-y-6 -translate-x-6 -z-10">
                        </div>

                        <div class="relative b p-2 rounded-2xl  ">
                            <img src="{{ asset('images/hero image 5.jpg') }}" alt="Directorate Activities"
                                class="w-full h-[350px] lg:h-[450px] object-cover rounded-xl grayscale-[0.2] hover:grayscale-0 transition-all duration-700">
                        </div>

                        <!-- Formal Badge -->
                        <div
                            class="absolute -bottom-6 -left-6 bg-secondary text-white p-6 rounded-2xl shadow-2xl hidden xl:block">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center">
                                    <i data-lucide="shield-check" class="w-7 h-7 text-white"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-widest opacity-70">Official</p>
                                    <p class="text-sm font-black uppercase tracking-tight">KPK Government</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Leadership Slider Section -->
    <section class="relative lg:py-10 py-[70px] overflow-hidden">


        <div class="max-w-[1600px] mx-auto px-6 lg:px-24 relative z-10">
            <div class="relative flex items-center justify-center min-h-[600px]">
                <!-- Left Arrow -->
                <button onclick="prevLeaderSlide()"
                    class="absolute left-0 lg:left-0 z-40 w-12 h-12  lg:w-16 lg:h-16  rounded-full flex items-center justify-center text-[#0ea5e9]">
                    <i data-lucide="chevron-left"
                        class="w-6 h-6 lg:w-8 lg:h-8 group-hover:-translate-x-0.5 transition-transform"></i>
                </button>

                <!-- Slider Container -->
                <div id="leadership-slider" class="w-full max-w-6xl ml-1 lg:ml-[100px] relative h-[500px] lg:h-[550px]">

                    <!-- Slide 1: Jess Wilson -->
                    <div class="leader-slide absolute inset-0 flex items-center group/slide overflow-visible">
                        <div
                            class="relative w-full max-w-4xl mx-auto h-[500px] bg-[#0f1115] rounded-[50px] p-8 pt-28 lg:p-14 lg:pl-56 flex flex-col lg:flex-row items-center gap-10 overflow-visible transition-all duration-700">
                            <!-- Image (Floating Half-Out) -->
                            <div
                                class="absolute left-1/2 lg:left-0 top-0 lg:top-1/2 shrink-0 z-20 slide-image transition-all duration-1000 ease-out">
                                <div
                                    class="w-[200px] h-[200px] lg:w-[290px] lg:h-[370px] rounded-full lg:rounded-[50px] overflow-hidden shadow-2xl">
                                    <img src="{{ asset('images/Minister.jpeg') }}" alt="Jess Wilson"
                                        class="w-full h-full object-cover">
                                </div>
                            </div>
                            <!-- Right: Content -->
                            <div
                                class="flex-1 text-center lg:text-left space-y-3 sm:space-y-6 slide-content transition-all duration-1000 ease-out delay-100">
                                <div class="slide-title transition-all duration-700 ease-out delay-200">
                                    <h2
                                        class="font-outfit text-2xl sm:text-3xl lg:text-5xl font-bold text-white tracking-tight">
                                        Mr. Aftab Alam</h2>
                                    <p class="text-slate-400 text-xs sm:text-base lg:text-xl font-normal mt-1">Minister
                                        for Law
                                        Parliamentary Affairs & Human Rights Khyber Pakhtunkhwa</p>
                                </div>
                                <p
                                    class="text-white/60 text-[11px] sm:text-sm md:text-base lg:text-lg leading-relaxed max-w-xl slide-text transition-all duration-700 ease-out delay-300 lg:line-clamp-5">
                                    The people of Khyber Pakhtunkhwa have perennial and endless calamities both natural
                                    and man-induced for over three decades now. Human rights watch reports and indices
                                    unveil the frail state of human rights in the province. Moreover the recent surge of
                                    terrorism, and social evils inherent in mis-governance, have greatly affected the
                                    state of human rights in the Province of Khyber Pakhtunkhwa. Shackled with nexus of
                                    multi-dimensional human rights violations, the ...
                                </p>
                                <div
                                    class="flex flex-wrap items-center justify-center lg:justify-start gap-4 sm:gap-6 pt-2 sm:pt-4 slide-btns transition-all duration-700 ease-out delay-500">
                                    <button
                                        class="px-6 py-2 sm:px-10 sm:py-3.5 border-2 border-white/10 rounded-full text-white font-bold text-[10px] sm:text-sm tracking-widest uppercase hover:bg-white/5 transition-all duration-300">
                                        Profile
                                    </button>
                                    <button
                                        class="px-8 py-2 sm:px-12 sm:py-3.5 bg-white text-[#0f1115] rounded-full font-bold text-[10px] sm:text-sm tracking-widest uppercase hover:bg-[#bce1f5] hover:shadow-2xl transition-all duration-300">
                                        Follow
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2: Alex Rivera -->
                    <div class="leader-slide absolute inset-0 flex items-center group/slide overflow-visible">
                        <div
                            class="relative w-full max-w-4xl mx-auto h-[500px] bg-[#0f1115] rounded-[50px] p-8 pt-28 lg:p-14 lg:pl-56 flex flex-col lg:flex-row items-center gap-10 overflow-visible transition-all duration-700">
                            <!-- Image (Floating) -->
                            <div
                                class="absolute left-1/2 lg:left-0 top-0 lg:top-1/2 shrink-0 z-20 slide-image transition-all duration-1000 ease-out">
                                <div
                                    class="w-[200px] h-[200px] lg:w-[290px] lg:h-[370px] rounded-full lg:rounded-[50px] overflow-hidden shadow-2xl">
                                    <img src="{{ asset('images/introduction 1.jpeg') }}" alt="Alex Rivera"
                                        class="w-full h-full object-cover">
                                </div>
                            </div>
                            <div
                                class="flex-1 text-center lg:text-left space-y-3 sm:space-y-6 slide-content transition-all duration-1000 ease-out delay-100">
                                <div class="slide-title transition-all duration-700 ease-out delay-200">
                                    <h2
                                        class="font-outfit text-2xl sm:text-3xl lg:text-5xl font-bold text-white tracking-tight">
                                        Mr. Ghulam Ali</h2>
                                    <p class="text-slate-400 text-xs sm:text-base lg:text-xl font-normal mt-1">Director
                                        General, Law
                                        & Human Rights, Government of Khyber Pakhtunkhwa</p>
                                </div>
                                <p
                                    class="text-white/60 text-[11px] sm:text-sm md:text-base lg:text-lg leading-relaxed max-w-xl slide-text transition-all duration-700 ease-out delay-300 lg:line-clamp-5">
                                    What is beautiful about the Human Rights is that they recognize the inherent value
                                    of each person. The principles which Human Rights are based on include dignity,
                                    equality and mutual respect. These principles are common to all cultures, religions,
                                    philosophies and geographical areas. After witnessing gross violation of Human
                                    Rights during the World War II, the world community got together and resolved to
                                    stop such violations in future. The result ...
                                </p>
                                <div
                                    class="flex flex-wrap items-center justify-center lg:justify-start gap-4 sm:gap-6 pt-2 sm:pt-4 slide-btns transition-all duration-700 ease-out delay-500">
                                    <button
                                        class="px-6 py-2 sm:px-10 sm:py-3.5 border-2 border-white/10 rounded-full text-white font-bold text-[10px] sm:text-sm tracking-widest uppercase hover:bg-white/5 transition-all duration-300">
                                        Profile
                                    </button>
                                    <button
                                        class="px-8 py-2 sm:px-12 sm:py-3.5 bg-white text-[#0f1115] rounded-full font-bold text-[10px] sm:text-sm tracking-widest uppercase hover:bg-[#bce1f5] hover:shadow-2xl transition-all duration-300">
                                        Follow
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3: Sarah Chen -->
                    <div class="leader-slide absolute inset-0 flex items-center group/slide overflow-visible">
                        <div
                            class="relative w-full max-w-4xl mx-auto h-[500px] bg-[#0f1115] rounded-[50px] p-8 pt-28 lg:p-14 lg:pl-56 flex flex-col lg:flex-row items-center gap-10 overflow-visible transition-all duration-700">
                            <!-- Image (Floating) -->
                            <div
                                class="absolute left-1/2 lg:left-0 top-0 lg:top-1/2 shrink-0 z-20 slide-image transition-all duration-1000 ease-out">
                                <div
                                    class="w-[200px] h-[200px] lg:w-[290px] lg:h-[370px] rounded-full lg:rounded-[50px] overflow-hidden shadow-2xl">
                                    <img src="{{ asset('images/introduction 2.jpg') }}" alt="Sarah Chen"
                                        class="w-full h-full object-cover">
                                </div>
                            </div>
                            <div
                                class="flex-1 text-center lg:text-left space-y-3 sm:space-y-6 slide-content transition-all duration-1000 ease-out delay-100">
                                <div class="slide-title transition-all duration-700 ease-out delay-200">
                                    <h2
                                        class="font-outfit text-2xl sm:text-3xl lg:text-5xl font-bold text-white tracking-tight">
                                        Syed Kazim Hussain Shah</h2>
                                    <p class="text-slate-400 text-xs sm:text-base lg:text-xl font-normal mt-1">Director
                                        Human Rights,
                                        Government of Khyber Pakhtunkhwa</p>
                                </div>
                                <p
                                    class="text-white/60 text-[11px] sm:text-sm md:text-base lg:text-lg leading-relaxed max-w-xl slide-text transition-all duration-700 ease-out delay-300 lg:line-clamp-5">
                                    What is beautiful about the Human Rights is that they recognize the inherent value
                                    of each person. The principles which Human Rights are based on include dignity,
                                    equality and mutual respect. These principles are common to all cultures, religions,
                                    philosophies and geographical areas. After witnessing gross violation of Human
                                    Rights during the World War II, the world community got together and resolved to
                                    stop such violations in future. The result ...
                                </p>
                                <div
                                    class="flex flex-wrap items-center justify-center lg:justify-start gap-4 sm:gap-6 pt-2 sm:pt-4 slide-btns transition-all duration-700 ease-out delay-500">
                                    <button
                                        class="px-6 py-2 sm:px-10 sm:py-3.5 border-2 border-white/10 rounded-full text-white font-bold text-[10px] sm:text-sm tracking-widest uppercase hover:bg-white/5 transition-all duration-300">
                                        Profile
                                    </button>
                                    <button
                                        class="px-8 py-2 sm:px-12 sm:py-3.5 bg-white text-[#0f1115] rounded-full font-bold text-[10px] sm:text-sm tracking-widest uppercase hover:bg-[#bce1f5] hover:shadow-2xl transition-all duration-300">
                                        Follow
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Arrow -->
                <button onclick="nextLeaderSlide()"
                    class="absolute right-0 lg:right-0 z-40 w-12 h-12 lg:w-16 lg:h-16 rounded-full flex items-center justify-center text-[#0ea5e9] ">
                    <i data-lucide="chevron-right"
                        class="w-6 h-6 lg:w-8 lg:h-8 group-hover:translate-x-0.5 transition-transform"></i>
                </button>
            </div>
        </div>

        <!-- Inline Slider Logic -->
        <script>
            let currentLeaderSlide = 0;
            const leaderSlides = document.querySelectorAll('.leader-slide');

            function showLeaderSlide(n) {
                const isMobile = window.innerWidth < 1024;
                leaderSlides.forEach((slide, index) => {
                    const img = slide.querySelector('.slide-image');
                    const content = slide.querySelector('.slide-content');
                    const title = slide.querySelector('.slide-title');
                    const text = slide.querySelector('.slide-text');
                    const btns = slide.querySelector('.slide-btns');

                    // Responsive transformations
                    // Mobile: top-0, left-1/2 -> translate(-50%, -50%) centers it horizontally and half-out top
                    // Desktop: left-0, top-1/2 -> translate(-33.33%, -50%) centers it vertically and half-out left
                    const xTrans = isMobile ? '-50%' : '-33.33%';
                    const yTrans = '-50%';

                    if (index === n) {
                        slide.style.opacity = '1';
                        slide.style.zIndex = '10';
                        slide.style.visibility = 'visible';

                        // Active state
                        if (img) img.style.transform = `translate(${xTrans}, ${yTrans}) scale(1)`;
                        if (img) img.style.opacity = '1';

                        if (content) content.style.transform = 'translateX(0)';
                        if (content) content.style.opacity = '1';

                        [title, text, btns].forEach(el => {
                            if (el) {
                                el.style.transform = 'translateY(0)';
                                el.style.opacity = '1';
                            }
                        });
                    } else {
                        // Reset state for non-active slides
                        slide.style.opacity = '0';
                        slide.style.zIndex = '0';
                        slide.style.visibility = 'hidden';

                        const direction = index < n ? -1 : 1;

                        if (img) {
                            img.style.transform = `translate(${xTrans}, ${yTrans}) scale(0.8)`;
                            img.style.opacity = '0';
                        }

                        if (content) {
                            content.style.transform = `translateX(${direction * 40}px)`;
                            content.style.opacity = '0';
                        }

                        [title, text, btns].forEach(el => {
                            if (el) {
                                el.style.transform = 'translateY(20px)';
                                el.style.opacity = '0';
                            }
                        });
                    }
                });
            }

            function nextLeaderSlide() {
                currentLeaderSlide = (currentLeaderSlide + 1) % leaderSlides.length;
                showLeaderSlide(currentLeaderSlide);
            }

            function prevLeaderSlide() {
                currentLeaderSlide = (currentLeaderSlide - 1 + leaderSlides.length) % leaderSlides.length;
                showLeaderSlide(currentLeaderSlide);
            }

            // Handle window resize for proper centering/translations
            window.addEventListener('resize', () => {
                showLeaderSlide(currentLeaderSlide);
            });

            // Initialize all slides to their "off" position first
            leaderSlides.forEach((s, i) => { if (i !== 0) showLeaderSlide(i); });
            // Then show first slide
            showLeaderSlide(0);

            // Auto-advance
            setInterval(nextLeaderSlide, 6000);
        </script>
    </section>

    <!-- Vision, Mission & Core Values Section -->
    <section class=" py-5 lg:py-10 relative overflow-hidden">
        <!-- Decoration -->


        <div class="max-w-[1536px] mx-auto px-6 lg:px-24 relative z-10">
            <div class="space-y-20">
                <!-- Vision -->
                <div class="reveal-on-scroll">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-1.5 h-8 bg-primary rounded-full"></div>
                        <h2
                            class="font-outfit text-3xl lg:text-4xl font-extrabold text-[#0ea5e9] uppercase tracking-tight">
                            Vision</h2>
                    </div>
                    <p class="text-slate-600 text-lg lg:text-xl leading-relaxed max-w-4xl font-medium">
                        Our vision is of a Khyber Pakhtunkhwa Province in which every person's Human Rights are
                        respected and he/she is able to enjoy life in all its fullness.
                    </p>
                </div>

                <!-- Mission -->
                <div class="reveal-on-scroll">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-1.5 h-8 bg-primary rounded-full"></div>
                        <h2
                            class="font-outfit text-3xl lg:text-4xl font-extrabold text-[#0ea5e9] uppercase tracking-tight">
                            Mission</h2>
                    </div>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed max-w-5xl">
                        Directorate of Human Rights Government of Khyber Pakhtunkhwa's Mission is to Promote, Protect
                        and Enforce Human Rights in the Province of Khyber Pakhtunkhwa, as guaranteed by the
                        Constitution of Islamic Republic of Pakistan and various International Conventions, Treaties,
                        Covenants and Agreements to which Pakistan is a state party or shall become a state party.
                    </p>
                </div>

                <!-- Core Values -->
                <div class="reveal-on-scroll">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-1.5 h-8 bg-primary rounded-full"></div>
                        <h2
                            class="font-outfit text-3xl lg:text-4xl font-extrabold text-[#0ea5e9] uppercase tracking-tight">
                            Core Values</h2>
                    </div>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed max-w-5xl mb-12">
                        Directorate of Human Rights, a statutory and independent institution under the general
                        supervision of Law, Parliamentary Affairs & Human Rights Department Government of Khyber
                        Pakhtunkhwa, is committed to upholding these core values:
                    </p>

                    <!-- Values Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-4">
                        <div class="flex items-center gap-4 group transition-all duration-300 py-1">
                            <div
                                class="w-6 h-6 bg-[#0ea5e9] flex items-center justify-center rounded shadow-lg shadow-[#0ea5e9]/20 group-hover:translate-x-1 transition-transform">
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-white"></i>
                            </div>
                            <span
                                class="text-slate-700 font-black text-sm sm:text-base lg:text-lg uppercase tracking-wider">Independence</span>
                        </div>
                        <div class="flex items-center gap-4 group transition-all duration-300 py-1">
                            <div
                                class="w-6 h-6 bg-[#0ea5e9] flex items-center justify-center rounded shadow-lg shadow-[#0ea5e9]/20 group-hover:translate-x-1 transition-transform">
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-white"></i>
                            </div>
                            <span
                                class="text-slate-700 font-black text-sm sm:text-base lg:text-lg uppercase tracking-wider">Professionalism</span>
                        </div>
                        <div class="flex items-center gap-4 group transition-all duration-300 py-1">
                            <div
                                class="w-6 h-6 bg-[#0ea5e9] flex items-center justify-center rounded shadow-lg shadow-[#0ea5e9]/20 group-hover:translate-x-1 transition-transform">
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-white"></i>
                            </div>
                            <span
                                class="text-slate-700 font-black text-sm sm:text-base lg:text-lg uppercase tracking-wider">Equality</span>
                        </div>
                        <div class="flex items-center gap-4 group transition-all duration-300 py-1">
                            <div
                                class="w-6 h-6 bg-[#0ea5e9] flex items-center justify-center rounded shadow-lg shadow-[#0ea5e9]/20 group-hover:translate-x-1 transition-transform">
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-white"></i>
                            </div>
                            <span
                                class="text-slate-700 font-black text-sm sm:text-base lg:text-lg uppercase tracking-wider">Participation</span>
                        </div>
                        <div class="flex items-center gap-4 group transition-all duration-300 py-1">
                            <div
                                class="w-6 h-6 bg-[#0ea5e9] flex items-center justify-center rounded shadow-lg shadow-[#0ea5e9]/20 group-hover:translate-x-1 transition-transform">
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-white"></i>
                            </div>
                            <span
                                class="text-slate-700 font-black text-sm sm:text-base lg:text-lg uppercase tracking-wider">Accessibility</span>
                        </div>
                        <div class="flex items-center gap-4 group transition-all duration-300 py-1">
                            <div
                                class="w-6 h-6 bg-[#0ea5e9] flex items-center justify-center rounded shadow-lg shadow-[#0ea5e9]/20 group-hover:translate-x-1 transition-transform">
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-white"></i>
                            </div>
                            <span
                                class="text-slate-700 font-black text-sm sm:text-base lg:text-lg uppercase tracking-wider">Accountability</span>
                        </div>
                        <div class="flex items-center gap-4 group transition-all duration-300 py-1">
                            <div
                                class="w-6 h-6 bg-[#0ea5e9] flex items-center justify-center rounded shadow-lg shadow-[#0ea5e9]/20 group-hover:translate-x-1 transition-transform">
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-white"></i>
                            </div>
                            <span
                                class="text-slate-700 font-black text-sm sm:text-base lg:text-lg uppercase tracking-wider">Inclusiveness</span>
                        </div>
                        <div class="flex items-center gap-4 group transition-all duration-300 py-1">
                            <div
                                class="w-6 h-6 bg-[#0ea5e9] flex items-center justify-center rounded shadow-lg shadow-[#0ea5e9]/20 group-hover:translate-x-1 transition-transform">
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-white"></i>
                            </div>
                            <span
                                class="text-slate-700 font-black text-sm sm:text-base lg:text-lg uppercase tracking-wider">Integrity</span>
                        </div>
                        <div class="flex items-center gap-4 group transition-all duration-300 py-1">
                            <div
                                class="w-6 h-6 bg-[#0ea5e9] flex items-center justify-center rounded shadow-lg shadow-[#0ea5e9]/20 group-hover:translate-x-1 transition-transform">
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-white"></i>
                            </div>
                            <span
                                class="text-slate-700 font-black text-sm sm:text-base lg:text-lg uppercase tracking-wider">Pro-activeness</span>
                        </div>
                        <div class="flex items-center gap-4 group transition-all duration-300 py-1">
                            <div
                                class="w-6 h-6 bg-[#0ea5e9] flex items-center justify-center rounded shadow-lg shadow-[#0ea5e9]/20 group-hover:translate-x-1 transition-transform">
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-white"></i>
                            </div>
                            <span
                                class="text-slate-700 font-black text-sm sm:text-base lg:text-lg uppercase tracking-wider">Collaboration</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
</x-layout>