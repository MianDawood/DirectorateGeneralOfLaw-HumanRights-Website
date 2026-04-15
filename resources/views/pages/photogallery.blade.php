<x-layout>
<main>
        <!-- Hero Section -->
        <section class="relative pt-32 pb-10 lg:pt-1 lg:pb-12  overflow-hidden">
            <!-- <div class="absolute inset-0 z-0 bg-secondary">
                <div
                    class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-primary/5 rounded-full blur-[80px] translate-y-1/2 -translate-x-1/2">
                </div>
            </div> -->
            <div class="relative z-10 max-w-[1536px] mx-auto px-6 lg:px-20 reveal-on-scroll">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
                    <!-- Text Content -->
                    <div class="text-left">
                        <div
                            class="inline-flex items-center gap-2 bg-primary/10 text-primary px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest mb-6 border border-primary/20">
                            <i data-lucide="image" class="w-4 h-4"></i> Visual Documentary
                        </div>
                        <h1
                            class="font-outfit text-4xl md:text-6xl lg:text-7xl font-black  uppercase tracking-tighter mb-8 leading-[0.9]">
                            Photo <br><span class="text-primary italic">Gallery</span>
                        </h1>
                        <p class=" max-w-xl text-lg md:text-xl leading-relaxed font-medium mb-10">
                            Explore our visual documentary of human rights initiatives, events, and community
                            engagements in
                            Khyber Pakhtunkhwa.
                        </p>
                        <div class="flex items-center gap-6">
                            <a href="#gallery"
                                class="px-8 py-4 bg-primary text-white rounded-2xl font-bold uppercase tracking-widest text-xs hover:bg-white hover:text-primary transition-all shadow-xl shadow-primary/20">View
                                Collection</a>
                            <div class="flex -space-x-3">
                                <img src="{{ asset('images/hero image 1.jpg') }}"
                                    class="w-10 h-10 rounded-full border-2 border-white object-cover" alt="User">
                                <img src="{{ asset('images/hero image 2.png') }}"
                                    class="w-10 h-10 rounded-full border-2 border-white object-cover" alt="User">
                                <img src="{{ asset('images/hero image 3.png') }}"
                                    class="w-10 h-10 rounded-full border-2 border-white object-cover" alt="User">
                                <div
                                    class="w-10 h-10 rounded-full border-2 border-white bg-slate-800 flex items-center justify-center text-[10px] font-bold text-white uppercase tracking-tighter cursor-pointer hover:bg-primary transition-colors">
                                    +50k</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side: Interactive Card Accordion -->
                    <div class="relative">
                        <div class="p-0 sm:p-3 rounded-[24px] sm:rounded-[48px]">
                            <!-- Accordion Container -->
                            <div id="imageAccordion"
                                class="flex gap-1.5 sm:gap-3 w-full h-[280px] sm:h-[380px] lg:h-[420px] p-1 rounded-[20px] sm:rounded-[40px]">

                                <!-- Item 1 (Active by default) -->
                                <div data-acc-item
                                    class="acc-item h-full overflow-hidden rounded-[16px] sm:rounded-[32px] relative cursor-pointer min-w-0 transition-all duration-[600ms] [transition-timing-function:cubic-bezier(0.25,1,0.5,1)]"
                                    style="flex:5">
                                    <img src="{{ asset('images/hero image 1.jpg') }}" alt="Gallery"
                                        class="w-full h-full object-cover transition-transform duration-[600ms] scale-105">
                                    <div
                                        class="acc-icon absolute bottom-3 sm:bottom-6 left-1.5 sm:left-2 w-8 h-8 sm:w-11 sm:h-11 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg transition-all duration-300 z-10">
                                        <i data-lucide="shield-check"
                                            class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-[#123B2D]"></i>
                                    </div>
                                    <div
                                        class="acc-content absolute bottom-0 left-8 sm:left-10 w-full p-4 sm:p-8 bg-gradient-to-t from-black/80 to-transparent opacity-100 translate-y-0 transition-all duration-500 delay-200 pointer-events-none text-white hidden sm:block">
                                        <h4 class="font-outfit font-black uppercase text-lg leading-none mb-1">Awareness
                                        </h4>
                                        <p class="text-[10px] uppercase font-bold tracking-widest opacity-80">Outreach
                                            Program</p>
                                    </div>
                                </div>

                                <!-- Item 2 -->
                                <div data-acc-item
                                    class="acc-item h-full overflow-hidden rounded-[16px] sm:rounded-[32px] relative cursor-pointer min-w-0 transition-all duration-[600ms] [transition-timing-function:cubic-bezier(0.25,1,0.5,1)]"
                                    style="flex:1.2">
                                    <img src="{{ asset('images/hero image 2.png') }}" alt="Gallery"
                                        class="w-full h-full object-cover transition-transform duration-[600ms]">
                                    <div
                                        class="acc-icon absolute bottom-3 sm:bottom-6 left-1.5 sm:left-2 w-8 h-8 sm:w-11 sm:h-11 bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 z-10">
                                        <i data-lucide="users" class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-[#123B2D]"></i>
                                    </div>
                                    <div
                                        class="acc-content absolute bottom-0 left-8 sm:left-10 w-full p-4 sm:p-8 bg-gradient-to-t from-black/80 to-transparent opacity-0 translate-y-5 transition-all duration-500 delay-200 pointer-events-none text-white hidden sm:block">
                                        <h4 class="font-outfit font-black uppercase text-lg leading-none mb-1">
                                            Engagement</h4>
                                        <p class="text-[10px] uppercase font-bold tracking-widest opacity-80">Citizen
                                            Support</p>
                                    </div>
                                </div>

                                <!-- Item 3 -->
                                <div data-acc-item
                                    class="acc-item h-full overflow-hidden rounded-[16px] sm:rounded-[32px] relative cursor-pointer min-w-0 transition-all duration-[600ms] [transition-timing-function:cubic-bezier(0.25,1,0.5,1)]"
                                    style="flex:1.2">
                                    <img src="{{ asset('images/hero image 3.png') }}" alt="Gallery"
                                        class="w-full h-full object-cover transition-transform duration-[600ms]">
                                    <div
                                        class="acc-icon absolute bottom-3 sm:bottom-6 left-1.5 sm:left-2 w-8 h-8 sm:w-11 sm:h-11 bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 z-10">
                                        <i data-lucide="book-marked"
                                            class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-[#123B2D]"></i>
                                    </div>
                                    <div
                                        class="acc-content absolute bottom-0 left-8 sm:left-10 w-full p-4 sm:p-8 bg-gradient-to-t from-black/80 to-transparent opacity-0 translate-y-5 transition-all duration-500 delay-200 pointer-events-none text-white hidden sm:block">
                                        <h4 class="font-outfit font-black uppercase text-lg leading-none mb-1">Legal
                                            Care</h4>
                                        <p class="text-[10px] uppercase font-bold tracking-widest opacity-80">Advocacy
                                            Support</p>
                                    </div>
                                </div>

                                <!-- Item 4 -->
                                <div data-acc-item
                                    class="acc-item h-full overflow-hidden rounded-[16px] sm:rounded-[32px] relative cursor-pointer min-w-0 transition-all duration-[600ms] [transition-timing-function:cubic-bezier(0.25,1,0.5,1)]"
                                    style="flex:1.2">
                                    <img src="{{ asset('images/hero image 4.jpg') }}" alt="Gallery"
                                        class="w-full h-full object-cover transition-transform duration-[600ms]">
                                    <div
                                        class="acc-icon absolute bottom-3 sm:bottom-6 left-1.5 sm:left-2 w-8 h-8 sm:w-11 sm:h-11 bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 z-10">
                                        <i data-lucide="calendar" class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-[#123B2D]"></i>
                                    </div>
                                    <div
                                        class="acc-content absolute bottom-0 left-8 sm:left-10 w-full p-4 sm:p-8 bg-gradient-to-t from-black/80 to-transparent opacity-0 translate-y-5 transition-all duration-500 delay-200 pointer-events-none text-white hidden sm:block">
                                        <h4 class="font-outfit font-black uppercase text-lg leading-none mb-1">Events
                                        </h4>
                                        <p class="text-[10px] uppercase font-bold tracking-widest opacity-80">Annual
                                            Summits</p>
                                    </div>
                                </div>

                                <!-- Item 5 -->
                                <div data-acc-item
                                    class="acc-item h-full overflow-hidden rounded-[16px] sm:rounded-[32px] relative cursor-pointer min-w-0 transition-all duration-[600ms] [transition-timing-function:cubic-bezier(0.25,1,0.5,1)]"
                                    style="flex:1.2">
                                    <img src="{{ asset('images/hero image 5.jpg') }}" alt="Gallery"
                                        class="w-full h-full object-cover transition-transform duration-[600ms]">
                                    <div
                                        class="acc-icon absolute bottom-3 sm:bottom-6 left-1.5 sm:left-2 w-8 h-8 sm:w-11 sm:h-11 bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 z-10">
                                        <i data-lucide="globe" class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-[#123B2D]"></i>
                                    </div>
                                    <div
                                        class="acc-content absolute bottom-0 left-8 sm:left-10 w-full p-4 sm:p-8 bg-gradient-to-t from-black/80 to-transparent opacity-0 translate-y-5 transition-all duration-500 delay-200 pointer-events-none text-white hidden sm:block">
                                        <h4 class="font-outfit font-black uppercase text-lg leading-none mb-1">Standards
                                        </h4>
                                        <p class="text-[10px] uppercase font-bold tracking-widest opacity-80">Global
                                            Monitoring</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Grid Section -->
        <section class="lg:py-24 py-16 bg-white">
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 reveal-stagger">
                    @php
                        $photos = $photos ?? collect();
                    @endphp
                    @forelse($photos as $photo)
                        @php
                            $src = $photo->media_path
                                ? (str_starts_with($photo->media_path, 'images/')
                                    ? asset($photo->media_path)
                                    : asset('storage/' . $photo->media_path))
                                : '';
                        @endphp
                        <div class="relative group aspect-square rounded-3xl overflow-hidden cursor-pointer border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-1"
                            onclick="openLightbox(this.querySelector('img'))">
                            <img src="{{ $src }}" alt="{{ $photo->title ?? 'Gallery Image' }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-secondary/80 opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col items-center justify-center backdrop-blur-sm p-4 text-center">
                                <div
                                    class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center text-white scale-50 group-hover:scale-100 transition-transform duration-500 mb-3 shadow-lg">
                                    <i data-lucide="maximize-2" class="w-6 h-6"></i>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-10 text-slate-500">No photos available.</div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Lightbox -->
        <div id="lightbox" class="lightbox" onclick="closeLightbox()">
            <span class="close-lightbox">&times;</span>
            <img class="lightbox-content" id="lightbox-img">
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
</x-layout>
