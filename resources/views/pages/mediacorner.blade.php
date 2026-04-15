<x-layout>
    <main class="bg-slate-50/50 min-h-screen">
          <!-- Premium Video Hero Section -->
        <section class="relative min-h-screen flex items-center bg-secondary overflow-hidden">
            <!-- Background Video with sophisticated overlay -->
            <div class="absolute inset-0 z-0 overflow-hidden">
                <video autoplay muted loop playsinline class="w-full h-full object-cover scale-105">
                    <source src="images/Media page hero video.mp4" type="video/mp4">
                    <!-- Fallback Image -->
                    <img src="images/media_hero_bg.png" alt="Media Banner"
                        class="w-full h-full object-cover opacity-60 mt-15">
                </video>
                <!-- Cinematic Overlays -->
                <div class="absolute inset-0 bg-gradient-to-b from-secondary/80 via-secondary/40 to-secondary"></div>
                <div class="absolute inset-0 bg-black/10"></div>
            </div>

            <div class="relative z-10 max-w-[1536px] mx-auto px-6 lg:px-20 w-full lg:pt-[20px]  pb-40">
                <div class="max-w-5xl">
                    <div class="reveal-on-scroll">
                        <!-- Minimalist Accent -->
                        <div class="flex items-center gap-4 mb-5">
                            <div class="w-12 h-[2px] bg-primary shadow-[0_0_15px_rgba(2,177,235,0.5)]"></div>
                            <span class="text-white/50 text-[10px] font-black uppercase tracking-[0.6em]">Official News
                                & Media</span>
                        </div>

                        <!-- Clean Large Typography -->
                        <h1
                            class="font-outfit text-6xl md:text-8xl lg:text-[90px] font-black text-white leading-[0.85] tracking-tighter mb-10">
                            Empowering <span class="text-primary italic">People,</span><br>
                            Upholding Rights.
                        </h1>

                        <!-- Minimal Description -->
                        <p
                            class="text-white/70 text-lg md:text-2xl max-w-2xl leading-relaxed font-light mb-12 border-l-2 border-primary/30 pl-8">
                            Documenting justice, equality, and human rights progress across Khyber Pakhtunkhwa.
                        </p>

                        <!-- Clean CTA -->
                        <div class="flex flex-wrap gap-6">
                            <a href="#news-section"
                                class="px-12 py-5 bg-white text-secondary font-black uppercase tracking-widest text-[11px] rounded-full shadow-2xl hover:bg-primary hover:text-white transition-all active:scale-95 flex items-center gap-4 group">
                                Explore Dispatches
                                <i data-lucide="arrow-right"
                                    class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subtle Partner Logo Strip -->
            <div class="absolute bottom-0 left-0 w-full bg-black/20 backdrop-blur-md border-t border-white/5 py-10">
                <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                    <div
                        class="flex flex-wrap items-center justify-between gap-5 lg:gap-10 opacity-30 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-1000">
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.4em]">KP Government</span>
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.4em]">UN Women</span>
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.4em]">UNICEF</span>
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.4em]">UNDP</span>
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.4em]">Justice
                            Commission</span>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-32 left-1/2 -translate-x-1/2 hidden lg:flex flex-col items-center gap-4">
                <div class="w-[1px] h-12 bg-gradient-to-b from-primary to-transparent animate-pulse"></div>
            </div>
        </section>

        <!-- Quick Navigation -->
        <div class="bg-white border-b border-slate-100 sticky top-20 z-40 lg:block hidden">
            <div class="max-w-[1536px] mx-auto px-20">
                <div class="flex gap-10">
                    <a href="#news"
                        class="py-6 text-xs font-black uppercase tracking-widest text-slate-400 hover:text-primary transition-colors border-b-2 border-transparent hover:border-primary">News
                        & Updates</a>
                    <a href="#events"
                        class="py-6 text-xs font-black uppercase tracking-widest text-slate-400 hover:text-primary transition-colors border-b-2 border-transparent hover:border-primary">Upcoming
                        Events</a>
                    <a href="#photo-gallery"
                        class="py-6 text-xs font-black uppercase tracking-widest text-slate-400 hover:text-primary transition-colors border-b-2 border-transparent hover:border-primary">Photo
                        Gallery</a>
                    <a href="#video-corner"
                        class="py-6 text-xs font-black uppercase tracking-widest text-slate-400 hover:text-primary transition-colors border-b-2 border-transparent hover:border-primary">Video
                        Corner</a>
                </div>
            </div>
        </div>

        <!-- News & Updates Section -->
        <section id="news" class="lg:py-24 py-10 bg-slate-50">
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6 reveal-on-scroll">
                    <div>
                        <h2
                            class="font-outfit text-3xl md:text-5xl font-black text-slate-900 uppercase tracking-tighter mb-4">
                            News & <span class="text-[#123B2D]">Updates</span></h2>
                        <p class="text-slate-500 max-w-xl font-medium">The latest reports, announcements, and coverage of
                            human rights initiatives in KP.</p>
                    </div>
                    <a href="#"
                        class="group flex items-center gap-3 text-secondary font-black uppercase tracking-widest text-xs hover:text-primary transition-all">
                        View All News <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">
                    @forelse($news as $item)
                    <div class="group bg-white border border-slate-100 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative h-60 overflow-hidden">
                            <img src="{{ $item->image_path ? asset('storage/' . $item->image_path) : asset('images/event 6.jpg') }}" alt="{{ $item->title }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @if($loop->first)
                            <div class="absolute top-4 left-4 bg-primary text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-lg shadow-lg">
                                Latest Update</div>
                            @endif
                        </div>
                        <div class="p-8">
                            <div class="flex items-center gap-2 text-slate-400 text-xs font-bold uppercase tracking-widest mb-4">
                                <i data-lucide="calendar" class="w-3.5 h-3.5 text-[#123B2D]"></i>
                                {{ $item->created_at ? $item->created_at->format('M d, Y') : 'N/A' }}
                            </div>
                            <h3 class="font-outfit text-xl font-bold text-slate-900 uppercase tracking-tight mb-4 group-hover:text-[#02B1EB] transition-colors">
                                {{ $item->title }}</h3>
                            <p class="text-slate-500 text-sm leading-relaxed line-clamp-3 mb-6">
                                {{ Str::limit(strip_tags($item->content ?? $item->description), 150) }}
                            </p>
                            <a href="{{ route('news_details', $item->id) }}"
                                class="inline-flex items-center gap-2 text-secondary font-black uppercase tracking-widest text-[10px] hover:text-[#02B1EB] transition-colors">
                                Read More <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-3 text-center py-20 text-slate-400 font-medium">No news updates available.</div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Events Section -->
        <section id="events" class="lg:py-24 py-10 bg-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-1/3 h-full bg-slate-50/50 -skew-x-12 translate-x-1/2"></div>

            <div class="max-w-[1536px] mx-auto px-6 lg:px-20 relative z-10">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-16 gap-8 reveal-on-scroll">
                    <div class="max-w-2xl">
                        <h2
                            class="font-outfit text-3xl md:text-5xl font-black text-slate-900 uppercase tracking-tighter mb-4">
                            Latest & Featured <span class="text-[#123B2D]">Events</span></h2>
                        <p class="text-slate-500 font-medium">Join us in our upcoming workshops, seminars and community
                            engagement programs.</p>
                    </div>
                    <div class="flex gap-4">
                        <button onclick="scrollEvents('left')"
                            class="w-14 h-14 rounded-2xl border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-primary hover:text-white hover:border-primary transition-all duration-500">
                            <i data-lucide="chevron-left" class="w-6 h-6"></i>
                        </button>
                        <button onclick="scrollEvents('right')"
                            class="w-14 h-14 rounded-2xl border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-primary hover:text-white hover:border-primary transition-all duration-500">
                            <i data-lucide="chevron-right" class="w-6 h-6"></i>
                        </button>
                    </div>
                </div>

                <div class="relative">
                    <style>
                        .scrollbar-hide::-webkit-scrollbar {
                            display: none;
                        }

                        .scrollbar-hide {
                            -ms-overflow-style: none;
                            scrollbar-width: none;
                        }
                    </style>
                    <div id="eventsSlider"
                        class="flex gap-8 transition-transform duration-500 ease-in-out reveal-stagger overflow-x-auto scrollbar-hide snap-x snap-mandatory pb-4">

                        @php
                            $allEvents = $featuredEvents->merge($recentEvents);
                        @endphp

                        @forelse($allEvents as $event)
                        <div class="flex-none w-full lg:w-[calc(50%-16px)] snap-start">
                            <div class="group flex flex-col md:flex-row bg-white rounded-3xl overflow-hidden shadow-sm transition-all duration-500 border border-slate-100 h-full">
                                <div class="relative w-full md:w-2/5 h-64 md:h-auto overflow-hidden">
                                    <img src="{{ $event->image_path ? asset('storage/' . $event->image_path) : asset('images/event 1.jpeg') }}" alt="{{ $event->title }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-secondary/20 group-hover:bg-transparent transition-colors">
                                    </div>
                                    @if($event->is_featured)
                                    <div class="absolute top-4 left-4 bg-primary text-white text-[9px] font-black uppercase tracking-widest px-3 py-1.5 rounded-lg shadow-lg">
                                        Featured
                                    </div>
                                    @endif
                                </div>
                                <div class="p-8 md:p-10 flex flex-col justify-between flex-1">
                                    <div>
                                        <div class="flex items-center gap-4 mb-6">
                                            <div class="flex flex-col items-center justify-center bg-primary/10 text-primary w-14 h-14 rounded-2xl">
                                                <span class="text-lg font-black leading-none">{{ $event->event_date ? $event->event_date->format('d') : '??' }}</span>
                                                <span class="text-[9px] font-bold uppercase tracking-widest">{{ $event->event_date ? $event->event_date->format('M') : '???' }}</span>
                                            </div>
                                            <div>
                                                <div class="flex items-center gap-2 text-slate-400 text-xs font-bold uppercase mb-1">
                                                    <i data-lucide="map-pin" class="w-3 h-3"></i> {{ $event->location ?? 'TBD' }}
                                                </div>
                                                <h4 class="font-outfit text-xl font-bold text-slate-800 uppercase tracking-tight line-clamp-2">
                                                    {{ $event->title }}</h4>
                                            </div>
                                        </div>
                                        <p class="text-slate-500 text-sm leading-relaxed line-clamp-4 mb-8">
                                            {{ Str::limit(strip_tags($event->description), 180) }}
                                        </p>
                                    </div>
                                    <a href="#" class="inline-flex items-center gap-3 px-8 py-3.5 bg-secondary text-white font-bold uppercase tracking-widest text-[10px] hover:bg-primary transition-all duration-500 rounded-xl w-fit">
                                        View Details <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="w-full text-center py-20 text-slate-400 font-medium">No upcoming events scheduled.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        <!-- Photo Gallery Section -->
        <section id="photo-gallery" class="lg:py-24 py-10 bg-white">
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                <div class="text-center mb-16 reveal-on-scroll">
                    <h2
                        class="font-outfit text-3xl md:text-5xl font-black text-slate-900 uppercase tracking-tighter mb-4">
                        Captured <span class="text-[#123B2D]">Moments</span></h2>
                    <p class="text-slate-500 max-w-2xl mx-auto font-medium">Visual documentary of our events, activities
                        and community engagements across the province.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 reveal-stagger">
                    @forelse($galleryImages as $image)
                    <div class="relative group aspect-square rounded-xl overflow-hidden cursor-pointer"
                        onclick="openLightbox(this.querySelector('img'))">
                        <img src="{{ asset('storage/' . $image->media_path) }}" alt="{{ $image->title }}"
                            class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 ">
                        <div
                            class="absolute inset-0 bg-primary/60 opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center backdrop-blur-sm">
                            <div
                                class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-primary scale-50 group-hover:scale-100 transition-transform duration-500">
                                <i data-lucide="maximize-2" class="w-6 h-6"></i>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-4 text-center py-20 text-slate-400 font-medium">No gallery images available.</div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Video Gallery Section -->
        <section id="video-corner" class="py-24 bg-secondary overflow-hidden relative">
            <!-- Animated decorative elements -->
            <div
                class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2 ">
            </div>
            <div
                class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-primary/5 rounded-full blur-[80px] translate-y-1/2 -translate-x-1/2 ">
            </div>

            <div class="max-w-[1536px] mx-auto px-6 lg:px-20 relative z-10">
                <div class="flex items-center gap-6 mb-16 reveal-on-scroll">
                    <div class="w-16 h-1 bg-primary rounded-full lg:block hidden"></div>
                    <h2 class="font-outfit text-3xl md:text-5xl font-black text-white uppercase tracking-tight">
                        Video
                        <span class="text-[#123B2D]">Corner</span>
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">
                    @forelse($galleryVideos as $video)
                    <div class="group relative bg-white/[0.08] border border-white/15 rounded-3xl overflow-hidden shadow-[0_20px_50px_rgba(2,177,235,0.08)] transition-all duration-500 hover:-translate-y-1.5 hover:shadow-[0_24px_60px_rgba(2,177,235,0.18)] hover:border-primary/70 flex flex-col">
                        <div class="relative h-64 w-full bg-slate-950 overflow-hidden group/video cursor-pointer"
                            onclick="const v = this.querySelector('video'); v.paused ? v.play() : v.pause();">
                            <video
                                class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-700 focus:outline-none"
                                preload="metadata"
                                onplay="this.nextElementSibling.classList.add('opacity-0', 'pointer-events-none'); this.setAttribute('controls', 'controls');"
                                onpause="this.nextElementSibling.classList.remove('opacity-0', 'pointer-events-none'); this.removeAttribute('controls');">
                                <source src="{{ asset('storage/' . $video->media_path) }}#t=0.001" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent pointer-events-none"></div>
                            <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-500 bg-secondary/35 group-hover/video:bg-transparent pointer-events-none">
                                <div class="w-16 h-16 bg-white text-secondary rounded-full flex items-center justify-center shadow-2xl scale-90 group-hover/video:scale-110 group-hover/video:bg-primary group-hover/video:text-white transition-all duration-500 ring-4 ring-white/20 group-hover/video:ring-primary/40">
                                    <i data-lucide="play" class="fill-current w-6 h-6 ml-1"></i>
                                </div>
                            </div>
                        </div>
                        <div class="p-7 flex-1 bg-gradient-to-b from-white/[0.02] to-transparent">
                            <h4 class="text-white font-outfit text-xl font-bold uppercase tracking-tight mb-2 group-hover:text-primary transition-colors">
                                {{ $video->title }}</h4>
                            @if($video->description)
                            <p class="text-white/65 text-sm leading-relaxed line-clamp-3">{{ $video->description }}</p>
                            @endif
                            <div class="mt-5 pt-4 border-t border-white/10">
                                <span class="inline-flex items-center gap-2 text-primary text-[11px] font-black uppercase tracking-widest">
                                    <i data-lucide="play-circle" class="w-4 h-4"></i>
                                    Tap to play
                                </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-3 text-center py-20 text-white/40 font-medium">No videos found.</div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Lightbox -->
        <div id="lightbox" class="lightbox" onclick="closeLightbox()">
            <button class="absolute top-6 right-6 text-white hover:text-primary transition-colors">
                <i data-lucide="x" class="w-10 h-10"></i>
            </button>
            <img id="lightbox-img" src="" alt="Enlarged view">
        </div>
    </main>

    <style>
        .stroke-text {
            -webkit-text-stroke: 1px rgba(255, 255, 255, 0.3);
        }

        .lightbox {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            display: none;
            z-index: 100;
            padding: 2rem;
            cursor: pointer;
        }

        .lightbox.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 90vh;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        @keyframes slow-zoom {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        .animate-slow-zoom {
            animation: slow-zoom 20s infinite alternate ease-in-out;
        }
    </style>

    <script>
        function scrollEvents(direction) {
            const slider = document.getElementById('eventsSlider');
            const scrollAmount = slider.clientWidth;
            if (direction === 'left') {
                slider.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            } else {
                slider.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        }

        function openLightbox(img) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');
            lightboxImg.src = img.src;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
    </script>
</x-layout>
