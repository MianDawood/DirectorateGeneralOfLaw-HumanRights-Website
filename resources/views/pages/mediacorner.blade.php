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
                        class="py-6 text-xs font-black uppercase tracking-widest text-slate-400 hover:text-primary transition-colors border-b-2 border-transparent hover:border-primary">Events
                        &amp; Media</a>
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
                            Events <span class="text-[#123B2D]">&amp; Media</span></h2>
                        <p class="text-slate-500 font-medium">Workshops, seminars, photos and videos — all in one place per event.</p>
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

                        @forelse($events as $event)
                        <div class="flex-none w-full lg:w-[calc(50%-16px)] snap-start">
                            <a href="{{ route('events.show', $event) }}"
                                class="group flex flex-col md:flex-row bg-gray-50 rounded-3xl overflow-hidden shadow-sm transition-all duration-500 border border-slate-100 h-full cursor-pointer hover:shadow-xl hover:border-slate-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#02B1EB] focus-visible:ring-offset-2">
                                <div class="relative w-full md:w-2/5 h-64 md:h-auto overflow-hidden pointer-events-none">
                                    <img src="{{ $event->coverImageUrl() ?? asset('images/event 1.jpeg') }}" alt="{{ $event->title }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-secondary/20 group-hover:bg-transparent transition-colors"></div>
                                    @if($event->is_featured)
                                    <div class="absolute top-4 left-4 bg-primary text-white text-[9px] font-black uppercase tracking-widest px-3 py-1.5 rounded-lg shadow-lg">
                                        Featured
                                    </div>
                                    @endif
                                </div>
                                <div class="p-8 md:p-10 flex flex-col justify-between flex-1">
                                    <div>
                                        <div class="flex items-center gap-4 mb-4">
                                            <div class="flex flex-col items-center justify-center bg-primary/10 text-primary w-14 h-14 rounded-2xl shrink-0">
                                                <span class="text-lg font-black leading-none">{{ $event->event_date?->format('d') ?? '??' }}</span>
                                                <span class="text-[9px] font-bold uppercase tracking-widest">{{ $event->event_date?->format('M') ?? '???' }}</span>
                                            </div>
                                            <div class="min-w-0">
                                                @if($event->subject)
                                                    <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-1 line-clamp-1">{{ $event->subject }}</p>
                                                @endif
                                                <div class="flex items-center gap-2 text-slate-400 text-xs font-bold uppercase mb-1">
                                                    <i data-lucide="map-pin" class="w-3 h-3 shrink-0"></i>
                                                    <span class="truncate">{{ $event->location }}</span>
                                                </div>
                                                <h4 class="font-outfit text-xl font-bold text-slate-800 uppercase tracking-tight line-clamp-2">
                                                    {{ $event->title }}</h4>
                                            </div>
                                        </div>
                                        <p class="text-slate-500 text-sm leading-relaxed line-clamp-3 mb-4">
                                            {{ Str::limit(strip_tags($event->description), 160) }}
                                        </p>
                                        <div class="flex flex-wrap gap-3 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                                            @if($event->images_count > 0)
                                                <span class="inline-flex items-center gap-1"><i data-lucide="image" class="w-3 h-3"></i> {{ $event->images_count }} {{ Str::plural('photo', $event->images_count) }}</span>
                                            @endif
                                            @if($event->videos_count > 0)
                                                <span class="inline-flex items-center gap-1"><i data-lucide="video" class="w-3 h-3"></i> {{ $event->videos_count }} {{ Str::plural('video', $event->videos_count) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <span class="inline-flex items-center gap-3 px-8 py-3.5 bg-secondary text-white font-bold uppercase tracking-widest text-[10px] group-hover:bg-primary transition-all duration-500 rounded-xl w-fit mt-6">
                                        View Event <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                    </span>
                                </div>
                            </a>
                        </div>
                        @empty
                        <div class="w-full text-center py-20 text-slate-400 font-medium">No events published yet.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

    </main>

    <style>
        .stroke-text {
            -webkit-text-stroke: 1px rgba(255, 255, 255, 0.3);
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

    </script>
</x-layout>
