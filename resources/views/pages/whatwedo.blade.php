<x-layout>
<!-- HERO SECTION -->
    <section class="relative min-h-[500px] md:min-h-[600px] lg:min-h-[700px] overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/whatwedo-hero.png') }}" alt="Human Rights - What We Do" class="w-full h-full object-cover" />
        </div>
        <!-- Gradient Overlays -->
        <div class="absolute inset-0 bg-gradient-to-r from-white/50 via-white/20 to-white/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-white/80 via-transparent to-white/30"></div>
        <!-- Pattern overlay -->
        <div class="absolute inset-0 opacity-[0.04]"
            style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.5) 1px, transparent 0); background-size: 30px 30px;">
        </div>
        <!-- Decorative glow -->
        <div
            class="absolute -right-40 top-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-primary/15 rounded-full blur-[120px] pointer-events-none">
        </div>
        <div
            class="absolute -left-20 bottom-0 w-[300px] h-[300px] bg-primary/10 rounded-full blur-[80px] pointer-events-none">
        </div>

        <div
            class="relative z-10 max-w-[1536px] mx-auto px-6 lg:px-20 flex items-center min-h-[500px] md:min-h-[600px] lg:min-h-[700px]">
            <div class="max-w-3xl py-20 md:py-28">
                <h2
                    class="font-outfit text-4xl md:text-6xl lg:text-7xl font-black text-white leading-[0.95] tracking-tight uppercase mb-8">
                    What We <br class="hidden md:block" /><span class="text-[#123B2D]">Do</span>
                </h2>
                <p class="text-white/60 text-base md:text-xl leading-relaxed max-w-xl font-medium mb-12">
                    The Directorate of Human Rights, Khyber Pakhtunkhwa, is committed to safeguarding fundamental
                    rights, promoting justice, and ensuring dignity for every citizen across the province.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap items-center gap-4">
                    <a href="#activities"
                        class="inline-flex items-center gap-3 px-8 py-4 bg-primary text-white font-bold uppercase tracking-widest text-xs hover:bg-white hover:text-secondary transition-all duration-500 rounded-xl shadow-xl shadow-primary/20 group/btn">
                        <span>Explore Activities</span>
                        <i data-lucide="arrow-down"
                            class="w-5 h-5 group-hover/btn:translate-y-1 transition-transform"></i>
                    </a>
                    <a href="#"
                        class="inline-flex items-center gap-3 px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-bold uppercase tracking-widest text-xs hover:bg-white/20 transition-all duration-500 rounded-xl border border-white/10">
                        <span>Contact Us</span>
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <!-- Floating Stats (desktop only) -->
            <div class="hidden lg:flex absolute right-20 bottom-20 gap-4 z-20">
                <div
                    class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/10 text-center min-w-[130px]">
                    <div class="font-outfit text-3xl font-black text-primary mb-1">35+</div>
                    <p class="text-white/50 text-[10px] font-bold uppercase tracking-widest">Districts</p>
                </div>
                <div
                    class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/10 text-center min-w-[130px]">
                    <div class="font-outfit text-3xl font-black text-primary mb-1">500+</div>
                    <p class="text-white/50 text-[10px] font-bold uppercase tracking-widest">Cases</p>
                </div>
                <div
                    class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/10 text-center min-w-[130px]">
                    <div class="font-outfit text-3xl font-black text-primary mb-1">100+</div>
                    <p class="text-white/50 text-[10px] font-bold uppercase tracking-widest">Programs</p>
                </div>
            </div>
        </div>

        <!-- Bottom curved edge -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path d="M0 80H1440V40C1440 40 1140 0 720 0C300 0 0 40 0 40V80Z" fill="rgb(248 250 252)" />
            </svg>
        </div>
    </section>

    <!-- OUR MISSION SECTION -->
    <section class="bg-slate-50 py-16 md:py-24 overflow-hidden">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center reveal-on-scroll">
                <!-- Left: Content -->
                <div>
                    <!-- Section Badge -->
                    <div
                        class="inline-flex items-center gap-2 bg-primary/10 text-primary px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest mb-8">
                        <i data-lucide="target" class="w-4 h-4"></i>
                        Our Mission
                    </div>

                    <h3
                        class="font-outfit text-3xl md:text-5xl font-black text-slate-900 uppercase tracking-tight mb-8 leading-tight">
                        Directorate of <span class="text-[#123B2D]">Human Rights</span>
                    </h3>

                    <div class="space-y-6">
                        <p class="text-slate-600 text-base md:text-lg font-bold leading-relaxed">
                            The Directorate of Human Rights, Government of Khyber Pakhutnkhwa is statutory and
                            independent
                            institution under the general supervision of Law, Parlimentary Affairs and Human Rights
                            Department and is working for the redressal of grivencess of victims of human rights
                            violation in the province of Khyber Pakhtunkhwa.
                        </p>

                        <p class="text-slate-500 text-sm md:text-base leading-relaxed">
                            This Directorate is established in 2012. Later on, Khyber Pakhtunkhwa Provincial Assembly
                            passed “Khyber Pakhtunkhwa Promotion, Protection and Enforcement of Human Rights Act, 2014”.
                            The Government of Khyber Pakhtunkhwa in an attempt to empower citizens and to provide an
                            effective mechanism for the promotion, protection and enforcement of human rights, as
                            provided in the constitution of the The Islamic Republic of Pakistan, and the various
                            international conventions, treaties and agreements to which Pakistan is a state party or
                            shall become a state party, has enacted the Khyber Pakhtunkhwa promotion, protection and
                            enforcement of human rights act 2014; which provides for the establishment of the provincial
                            Directorate of Human Rights, Khyber Pakhtunkhwa. The Directorate is empowered to conduct
                            inquiries into and investigate human rights violations in the province and provide adequate
                            relief to the aggrieved persons.
                        </p>

                        <p class="text-slate-500 text-sm md:text-base leading-relaxed">
                            The Act empowers the Directorate of Human Rights, Khyber Pakhtunkhwa to review the human
                            rights situation and promote, protect and enforce human rights in the province. The
                            Directorate also obtains information, documents and reports on complaints and allegations of
                            human rights violations from the government departments and other agencies. Directorate is
                            mandated to visit any jail or any institution or place under the control of the government,
                            where convicts or other under trial prisoners or other persons lodged or detained, for the
                            purpose of ascertaining whether the provisions of jail manual and other applicable laws
                            relating to the inmates are being compiled with or not.
                        </p>

                        <p class="text-slate-500 text-sm md:text-base leading-relaxed">
                            The Directorate is also mandated, under the Act, to propose new legislation or amendments in
                            the existing laws to improve Human Rights situation in the Province.
                        </p>
                    </div>
                </div>

                <!-- Right: Visual -->
                <div class="relative">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200">
                        <img src="{{ asset('images/hero image 2.png') }}" alt="Directorate of Human Rights Activities"
                            class="w-full h-[400px] lg:h-[520px] object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-secondary/60 via-transparent to-transparent">
                        </div>
                        <!-- Floating quote -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8">
                            <div
                                class="bg-white/95 backdrop-blur-sm rounded-2xl p-5 md:p-6 shadow-xl border border-white/50">
                                <p class="text-slate-700 text-sm font-medium italic leading-relaxed">
                                    "Through awareness, advocacy, legal aid, and community engagement, we work
                                    tirelessly to uphold justice and ensure accountability."
                                </p>
                                <div class="flex items-center gap-3 mt-4">
                                    <div class="w-8 h-[2px] bg-primary rounded-full"></div>
                                    <span
                                        class="text-[10px] font-bold text-primary uppercase tracking-widest">Directorate
                                        of Human Rights</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-primary/10 rounded-2xl -z-10"></div>
                    <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-primary/5 rounded-2xl -z-10"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- KEY ACTIVITIES / SERVICES -->
    <section id="activities" class="bg-white py-16 md:py-24 relative overflow-hidden">
        <!-- Side Accent Bars -->
        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-4 md:w-8 h-full bg-primary"></div>
        <div class="absolute right-0 top-1/2 -translate-y-1/2 w-4 md:w-8 h-full bg-primary"></div>

        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <!-- Section Header -->
            <div class="text-center mb-16 md:mb-20 reveal-on-scroll">
                <div
                    class="inline-flex items-center gap-2 bg-secondary/10 text-secondary px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest mb-8">
                    <i data-lucide="briefcase" class="w-4 h-4"></i>
                    Key Activities
                </div>
                <h3
                    class="font-outfit text-3xl md:text-5xl font-black text-slate-900 uppercase tracking-tight leading-tight">
                    Our Key <span class="text-[#123B2D]">Activities</span> & Services
                </h3>
            </div>

            <!-- Activity Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">

                <!-- Card 1: Human Rights Awareness -->
                <div
                    class="group bg-white border border-slate-100 rounded-2xl p-8 md:p-10 shadow-sm hover:shadow-2xl hover:border-primary/20 transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
                    <!-- Hover gradient overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all duration-500">
                            <i data-lucide="megaphone"
                                class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-500"></i>
                        </div>
                        <h4 class="font-outfit text-xl font-bold text-slate-900 uppercase tracking-tight mb-4">
                            Human Rights Awareness
                        </h4>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Educating communities about fundamental rights and responsibilities through public
                            campaigns,
                            workshops, seminars, and educational programs across all districts of Khyber Pakhtunkhwa.
                        </p>
                    </div>
                </div>

                <!-- Card 2: Legal Support & Guidance -->
                <div
                    class="group bg-white border border-slate-100 rounded-2xl p-8 md:p-10 shadow-sm hover:shadow-2xl hover:border-primary/20 transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all duration-500">
                            <i data-lucide="scale"
                                class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-500"></i>
                        </div>
                        <h4 class="font-outfit text-xl font-bold text-slate-900 uppercase tracking-tight mb-4">
                            Legal Support & Guidance
                        </h4>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Providing assistance and guidance to individuals facing human rights violations, including
                            free legal consultations, complaint resolution, and referral to appropriate judicial forums.
                        </p>
                    </div>
                </div>

                <!-- Card 3: Advocacy & Policy Support -->
                <div
                    class="group bg-white border border-slate-100 rounded-2xl p-8 md:p-10 shadow-sm hover:shadow-2xl hover:border-primary/20 transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all duration-500">
                            <i data-lucide="landmark"
                                class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-500"></i>
                        </div>
                        <h4 class="font-outfit text-xl font-bold text-slate-900 uppercase tracking-tight mb-4">
                            Advocacy & Policy Support
                        </h4>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Promoting policies that ensure equality, justice, and dignity for all through legislative
                            review, stakeholder consultations, and evidence-based policy recommendations.
                        </p>
                    </div>
                </div>

                <!-- Card 4: Community Engagement -->
                <div
                    class="group bg-white border border-slate-100 rounded-2xl p-8 md:p-10 shadow-sm hover:shadow-2xl hover:border-primary/20 transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all duration-500">
                            <i data-lucide="users"
                                class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-500"></i>
                        </div>
                        <h4 class="font-outfit text-xl font-bold text-slate-900 uppercase tracking-tight mb-4">
                            Community Engagement
                        </h4>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Working with communities, organizations, and institutions to protect and promote human
                            rights through grassroots outreach, collaborative initiatives, and public forums.
                        </p>
                    </div>
                </div>

                <!-- Card 5: Research & Documentation -->
                <div
                    class="group bg-white border border-slate-100 rounded-2xl p-8 md:p-10 shadow-sm hover:shadow-2xl hover:border-primary/20 transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all duration-500">
                            <i data-lucide="file-search"
                                class="w-8 h-8 text-primary group-hover:text-white transition-colors duration-500"></i>
                        </div>
                        <h4 class="font-outfit text-xl font-bold text-slate-900 uppercase tracking-tight mb-4">
                            Research & Documentation
                        </h4>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Monitoring and documenting human rights issues to support transparency and accountability,
                            including data collection, reporting, and publishing detailed research findings.
                        </p>
                    </div>
                </div>

                <!-- Card 6: CTA Card -->
                <div
                    class="group bg-gradient-to-br from-secondary to-slate-800 rounded-2xl p-8 md:p-10 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
                    <!-- Decorative circle -->
                    <div
                        class="absolute -right-10 -bottom-10 w-40 h-40 bg-primary/10 rounded-full blur-xl pointer-events-none">
                    </div>
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <div
                                class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all duration-500">
                                <i data-lucide="heart-handshake"
                                    class="w-8 h-8 text-white transition-colors duration-500"></i>
                            </div>
                            <h4 class="font-outfit text-xl font-bold text-white uppercase tracking-tight mb-4">
                                Need Help?
                            </h4>
                            <p class="text-white/60 text-sm leading-relaxed mb-8">
                                If your rights have been violated or you need guidance, our team is here to help.
                                Reach out to us confidentially.
                            </p>
                        </div>
                        <a href="{{ route('contact_us') }}"
                            class="inline-flex items-center gap-3 px-8 py-4 bg-primary text-white font-bold uppercase tracking-widest text-xs hover:bg-white hover:text-secondary transition-all duration-500 rounded-xl w-fit shadow-xl group/btn">
                            <span>Contact Us</span>
                            <i data-lucide="arrow-right"
                                class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================== -->
    <!-- IMPACT NUMBERS SECTION -->
    <!-- ======================== -->
    <section class="bg-slate-50 py-16 md:py-20">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 reveal-stagger">
                <!-- Stat 1 -->
                <div class="text-center p-6 md:p-8">
                    <div class="font-outfit text-4xl md:text-5xl font-black text-primary tracking-tight mb-2">
                        35+
                    </div>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Districts Covered</p>
                </div>
                <!-- Stat 2 -->
                <div class="text-center p-6 md:p-8">
                    <div class="font-outfit text-4xl md:text-5xl font-black text-primary tracking-tight mb-2">
                        500+
                    </div>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Cases Resolved</p>
                </div>
                <!-- Stat 3 -->
                <div class="text-center p-6 md:p-8">
                    <div class="font-outfit text-4xl md:text-5xl font-black text-primary tracking-tight mb-2">
                        100+
                    </div>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Awareness Programs</p>
                </div>
                <!-- Stat 4 -->
                <div class="text-center p-6 md:p-8">
                    <div class="font-outfit text-4xl md:text-5xl font-black text-primary tracking-tight mb-2">
                        50+
                    </div>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Partner Organizations</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================== -->
    <!-- FOOTER SECTION -->
    <!-- ======================== -->
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