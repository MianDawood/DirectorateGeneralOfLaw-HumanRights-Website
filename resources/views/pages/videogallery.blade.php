<x-layout>
<main>
        <!-- Hero Section -->
        <section class="relative pt-10 pb-10 lg:pt-1 lg:pb-10 overflow-hidden">
            <!-- <div class="absolute inset-0 z-0 bg-secondary">
                <div
                    class="absolute top-0 left-0 w-[500px] h-[500px] bg-primary/10 rounded-full blur-[120px] -translate-y-1/2 -translate-x-1/2">
                </div>
                <div
                    class="absolute bottom-0 right-0 w-[300px] h-[300px] bg-primary/5 rounded-full blur-[80px] translate-y-1/2 translate-x-1/2">
                </div>
            </div> -->
            <div class="relative z-10 max-w-[1536px] mx-auto px-6 lg:px-20 reveal-on-scroll">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
                    <!-- Left: Text Content -->
                    <div class="text-left">
                        <div
                            class="inline-flex items-center gap-2 bg-primary/10 text-primary px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest mb-6 border border-primary/20">
                            <i data-lucide="video" class="w-4 h-4"></i> Media Broadcasts
                        </div>
                        <h1
                            class="font-outfit text-4xl md:text-6xl lg:text-7xl font-black  uppercase tracking-tighter mb-8 leading-[0.9]">
                            Video <br><span class="text-primary italic">Gallery</span>
                        </h1>
                        <p class=" max-w-xl text-lg md:text-xl leading-relaxed font-medium mb-10">
                            Watch our latest coverage, seminars, and awareness campaigns strengthening human rights
                            protection in Khyber Pakhtunkhwa.
                        </p>
                        <div class="flex items-center gap-6">
                            <a href="#videos"
                                class="px-8 py-4 bg-primary text-white rounded-2xl font-bold uppercase tracking-widest text-xs hover:bg-white hover:text-primary transition-all shadow-xl shadow-primary/20">Watch
                                Videos</a>
                            <div class="flex -space-x-3">
                                <img src="{{ asset('images/event 1.jpeg') }}"
                                    class="w-10 h-10 rounded-full border-2 border-white object-cover" alt="Event">
                                <img src="{{ asset('images/event 2.jpg') }}"
                                    class="w-10 h-10 rounded-full border-2 border-white object-cover" alt="Event">
                                <img src="{{ asset('images/event 3.jpg') }}"
                                    class="w-10 h-10 rounded-full border-2 border-white object-cover" alt="Event">
                                <div
                                    class="w-10 h-10 rounded-full border-2 border-white bg-slate-800 flex items-center justify-center text-[10px] font-bold text-white uppercase tracking-tighter cursor-pointer hover:bg-primary transition-colors">
                                    +20k</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side: Interactive Card Accordion -->
                    <div class="relative">
                        <div class="p-0 sm:p-3 rounded-[24px] sm:rounded-[48px]">
                            <!-- Accordion Container -->
                            <div id="videoAccordion"
                                class="flex gap-1.5 sm:gap-3 w-full h-[280px] sm:h-[380px] lg:h-[420px] p-1 sm:p-2 rounded-[20px] sm:rounded-[40px]">

                                <!-- Item 1 (Active by default) -->
                                <div data-acc-item
                                    class="acc-item h-full overflow-hidden rounded-[16px] sm:rounded-[32px] relative cursor-pointer min-w-0 transition-all duration-[600ms] [transition-timing-function:cubic-bezier(0.25,1,0.5,1)]"
                                    style="flex:5">
                                    <img src="{{ asset('images/event 1.jpeg') }}" alt="Event"
                                        class="w-full h-full object-cover transition-transform duration-[600ms] scale-105">
                                    <div
                                        class="acc-icon absolute bottom-3 sm:bottom-6 left-1.5 sm:left-2 w-8 h-8 sm:w-11 sm:h-11 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg transition-all duration-300 z-10">
                                        <i data-lucide="play"
                                            class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-primary fill-primary"></i>
                                    </div>
                                    <div
                                        class="acc-content absolute bottom-0 left-8 sm:left-10 w-full p-4 sm:p-8 bg-gradient-to-t from-black/80 to-transparent opacity-100 translate-y-0 transition-all duration-500 delay-200 pointer-events-none text-white hidden sm:block">
                                        <h4 class="font-outfit font-black uppercase text-lg leading-none mb-1">Rights
                                            Forum</h4>
                                        <p class="text-[10px] uppercase font-bold tracking-widest opacity-80">Annual
                                            Summit</p>
                                    </div>
                                </div>

                                <!-- Item 2 -->
                                <div data-acc-item
                                    class="acc-item h-full overflow-hidden rounded-[16px] sm:rounded-[32px] relative cursor-pointer min-w-0 transition-all duration-[600ms] [transition-timing-function:cubic-bezier(0.25,1,0.5,1)]"
                                    style="flex:1.2">
                                    <img src="{{ asset('images/event 2.jpg') }}" alt="Event"
                                        class="w-full h-full object-cover transition-transform duration-[600ms]">
                                    <div
                                        class="acc-icon absolute bottom-3 sm:bottom-6 left-1.5 sm:left-2 w-8 h-8 sm:w-11 sm:h-11 bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 z-10">
                                        <i data-lucide="play"
                                            class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-primary fill-primary"></i>
                                    </div>
                                    <div
                                        class="acc-content absolute bottom-0 left-8 sm:left-10 w-full p-4 sm:p-8 bg-gradient-to-t from-black/80 to-transparent opacity-0 translate-y-5 transition-all duration-500 delay-200 pointer-events-none text-white hidden sm:block">
                                        <h4 class="font-outfit font-black uppercase text-lg leading-none mb-1">Workshops
                                        </h4>
                                        <p class="text-[10px] uppercase font-bold tracking-widest opacity-80">Training
                                            Series</p>
                                    </div>
                                </div>

                                <!-- Item 3 -->
                                <div data-acc-item
                                    class="acc-item h-full overflow-hidden rounded-[16px] sm:rounded-[32px] relative cursor-pointer min-w-0 transition-all duration-[600ms] [transition-timing-function:cubic-bezier(0.25,1,0.5,1)]"
                                    style="flex:1.2">
                                    <img src="{{ asset('images/event 3.jpg') }}" alt="Event"
                                        class="w-full h-full object-cover transition-transform duration-[600ms]">
                                    <div
                                        class="acc-icon absolute bottom-3 sm:bottom-6 left-1.5 sm:left-2 w-8 h-8 sm:w-11 sm:h-11 bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 z-10">
                                        <i data-lucide="play"
                                            class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-primary fill-primary"></i>
                                    </div>
                                    <div
                                        class="acc-content absolute bottom-0 left-8 sm:left-10 w-full p-4 sm:p-8 bg-gradient-to-t from-black/80 to-transparent opacity-0 translate-y-5 transition-all duration-500 delay-200 pointer-events-none text-white hidden sm:block">
                                        <h4 class="font-outfit font-black uppercase text-lg leading-none mb-1">Seminars
                                        </h4>
                                        <p class="text-[10px] uppercase font-bold tracking-widest opacity-80">Public
                                            Outreach</p>
                                    </div>
                                </div>

                                <!-- Item 4 -->
                                <div data-acc-item
                                    class="acc-item h-full overflow-hidden rounded-[16px] sm:rounded-[32px] relative cursor-pointer min-w-0 transition-all duration-[600ms] [transition-timing-function:cubic-bezier(0.25,1,0.5,1)]"
                                    style="flex:1.2">
                                    <img src="{{ asset('images/event 4.jpg') }}" alt="Event"
                                        class="w-full h-full object-cover transition-transform duration-[600ms]">
                                    <div
                                        class="acc-icon absolute bottom-3 sm:bottom-6 left-1.5 sm:left-2 w-8 h-8 sm:w-11 sm:h-11 bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 z-10">
                                        <i data-lucide="play"
                                            class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-primary fill-primary"></i>
                                    </div>
                                    <div
                                        class="acc-content absolute bottom-0 left-8 sm:left-10 w-full p-4 sm:p-8 bg-gradient-to-t from-black/80 to-transparent opacity-0 translate-y-5 transition-all duration-500 delay-200 pointer-events-none text-white hidden sm:block">
                                        <h4 class="font-outfit font-black uppercase text-lg leading-none mb-1">Advocacy
                                        </h4>
                                        <p class="text-[10px] uppercase font-bold tracking-widest opacity-80">Campaign
                                            Drives</p>
                                    </div>
                                </div>

                                <!-- Item 5 -->
                                <div data-acc-item
                                    class="acc-item h-full overflow-hidden rounded-[16px] sm:rounded-[32px] relative cursor-pointer min-w-0 transition-all duration-[600ms] [transition-timing-function:cubic-bezier(0.25,1,0.5,1)]"
                                    style="flex:1.2">
                                    <img src="{{ asset('images/event 5.jpg') }}" alt="Event"
                                        class="w-full h-full object-cover transition-transform duration-[600ms]">
                                    <div
                                        class="acc-icon absolute bottom-3 sm:bottom-6 left-1.5 sm:left-2 w-8 h-8 sm:w-11 sm:h-11 bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 z-10">
                                        <i data-lucide="play"
                                            class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-primary fill-primary"></i>
                                    </div>
                                    <div
                                        class="acc-content absolute bottom-0 left-8 sm:left-10 w-full p-4 sm:p-8 bg-gradient-to-t from-black/80 to-transparent opacity-0 translate-y-5 transition-all duration-500 delay-200 pointer-events-none text-white hidden sm:block">
                                        <h4 class="font-outfit font-black uppercase text-lg leading-none mb-1">Coverage
                                        </h4>
                                        <p class="text-[10px] uppercase font-bold tracking-widest opacity-80">Media
                                            Reports</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Grid Section -->
        <section class="lg:py-24 py-16 bg-slate-50">
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">
                    @php
                        $videos = $videos ?? collect();
                    @endphp
                    @forelse($videos as $video)
                        @php
                            $mediaSrc = $video->media_path
                                ? (str_starts_with($video->media_path, 'images/')
                                    ? asset($video->media_path)
                                    : asset('storage/' . $video->media_path))
                                : null;
                            $thumbSrc = $video->thumbnail_path
                                ? (str_starts_with($video->thumbnail_path, 'images/')
                                    ? asset($video->thumbnail_path)
                                    : asset('storage/' . $video->thumbnail_path))
                                : null;
                            $isVideo = $mediaSrc && str_ends_with(strtolower($mediaSrc), '.mp4');
                        @endphp
                        <div
                            class="group relative bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-1 hover:border-primary/20 flex flex-col">
                            @if($isVideo)
                                <div class="relative h-64 w-full bg-black overflow-hidden group/video cursor-pointer"
                                    onclick="const v = this.querySelector('video'); v.paused ? v.play() : v.pause();">
                                    <video
                                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-700 focus:outline-none"
                                        preload="metadata"
                                        @if($thumbSrc) poster="{{ $thumbSrc }}" @endif
                                        onplay="this.nextElementSibling.classList.add('opacity-0', 'pointer-events-none'); this.setAttribute('controls', 'controls');"
                                        onpause="this.nextElementSibling.classList.remove('opacity-0', 'pointer-events-none'); this.removeAttribute('controls');">
                                        <source src="{{ $mediaSrc }}#t=0.001" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <div
                                        class="absolute inset-0 flex items-center justify-center transition-opacity duration-500 bg-secondary/40 group-hover/video:bg-transparent pointer-events-none">
                                        <div
                                            class="w-16 h-16 bg-white text-secondary rounded-full flex items-center justify-center shadow-2xl scale-90 group-hover/video:scale-110 group-hover/video:bg-primary group-hover/video:text-white transition-all duration-500">
                                            <i data-lucide="play" class="fill-current w-6 h-6 ml-1"></i>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="relative h-64 w-full overflow-hidden">
                                    <img src="{{ $thumbSrc ?? '' }}" alt="{{ $video->title ?? 'Video Thumbnail' }}"
                                        class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-all duration-700">
                                    <div
                                        class="absolute inset-0 bg-secondary/20 group-hover:bg-transparent transition-all duration-700">
                                    </div>
                                    <button
                                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-white text-secondary rounded-full flex items-center justify-center shadow-2xl scale-90 group-hover:scale-110 group-hover:bg-primary group-hover:text-white transition-all duration-500">
                                        <i data-lucide="play" class="fill-current w-6 h-6 ml-1"></i>
                                    </button>
                                    @if($video->duration)
                                        <div
                                            class="absolute bottom-4 right-4 bg-secondary/80 backdrop-blur-md text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">
                                            {{ $video->duration }}
                                        </div>
                                    @endif
                                </div>
                            @endif
                            <div class="p-8 flex-1">
                                @if($loop->first)
                                    <div class="flex items-center gap-2 mb-3">
                                        <span
                                            class="px-2.5 py-1 bg-secondary/10 text-secondary text-[9px] font-black uppercase tracking-widest rounded-md">New</span>
                                    </div>
                                @endif
                                <h4
                                    class="text-slate-900 font-outfit text-xl font-bold uppercase mb-2 group-hover:text-[#02B1EB] transition-colors">
                                    {{ $video->title ?? 'Video' }}
                                </h4>
                                <p class="text-slate-500 text-sm leading-relaxed line-clamp-2">
                                    {{ $video->description ?? '' }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-10 text-slate-500">No videos available.</div>
                    @endforelse
                </div>
            </div>
        </section>
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
