<x-layout>
<main class="bg-slate-50/50 min-h-screen pt-24 lg:pt-28">
    <div class="max-w-[1536px] mx-auto px-6 lg:px-20 py-10">
        <a href="{{ route('mediacorner') }}#events"
           class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-[#02B1EB] mb-8 uppercase tracking-widest">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to Events
        </a>

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden mb-10">
            @if($cover = $event->coverImageUrl())
                <div class="aspect-[21/9] max-h-[420px] overflow-hidden">
                    <img src="{{ $cover }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                </div>
            @endif

            <div class="p-8 lg:p-12">
                <div class="flex flex-wrap items-start gap-6 mb-6">
                    <div class="flex flex-col items-center justify-center bg-[#123B2D]/10 text-[#123B2D] w-16 h-16 rounded-2xl shrink-0">
                        <span class="text-xl font-black leading-none">{{ $event->event_date?->format('d') }}</span>
                        <span class="text-[9px] font-bold uppercase tracking-widest">{{ $event->event_date?->format('M Y') }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        @if($event->subject)
                            <p class="text-[#02B1EB] text-xs font-black uppercase tracking-widest mb-2">{{ $event->subject }}</p>
                        @endif
                        <h1 class="font-outfit text-3xl md:text-4xl font-black text-slate-900 uppercase tracking-tight mb-3">
                            {{ $event->title }}
                        </h1>
                        <div class="flex items-center gap-2 text-slate-500 text-sm font-bold uppercase">
                            <i data-lucide="map-pin" class="w-4 h-4 text-[#02B1EB]"></i>
                            {{ $event->location }}
                        </div>
                    </div>
                </div>

                <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed">
                    {!! nl2br(e($event->description)) !!}
                </div>
            </div>
        </div>

        @if($event->images->isNotEmpty())
            <section class="mb-12">
                <h2 class="font-outfit text-2xl font-black text-slate-900 uppercase tracking-tight mb-6">
                    Event <span class="text-[#123B2D]">Photos</span>
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($event->images as $image)
                        <button type="button"
                                class="relative aspect-square rounded-xl overflow-hidden group cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#02B1EB]"
                                onclick="openEventLightbox('{{ asset('storage/' . $image->image_path) }}')">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $event->title }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-[#123B2D]/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <i data-lucide="maximize-2" class="w-8 h-8 text-white"></i>
                            </div>
                        </button>
                    @endforeach
                </div>
            </section>
        @endif

        @if($event->videos->isNotEmpty())
            <section class="mb-12">
                <h2 class="font-outfit text-2xl font-black text-slate-900 uppercase tracking-tight mb-6">
                    Event <span class="text-[#123B2D]">Videos</span>
                </h2>
                <div class="grid grid-cols-1 {{ $event->videos->count() > 1 ? 'lg:grid-cols-2' : '' }} gap-8">
                    @foreach($event->videos as $video)
                        <div class="rounded-2xl overflow-hidden border border-slate-100 bg-white shadow-sm p-2">
                            <x-ui.youtube-embed :videoId="$video->youtube_video_id" :title="$event->title" className="rounded-xl" />
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>

    <div id="event-lightbox" class="fixed inset-0 z-[200] bg-black/90 hidden items-center justify-center p-4" onclick="closeEventLightbox()">
        <button type="button" class="absolute top-6 right-6 text-white hover:text-[#02B1EB]" aria-label="Close">
            <i data-lucide="x" class="w-10 h-10"></i>
        </button>
        <img id="event-lightbox-img" src="" alt="Enlarged view" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl" onclick="event.stopPropagation()">
    </div>
</main>

<script>
    function openEventLightbox(src) {
        const box = document.getElementById('event-lightbox');
        const img = document.getElementById('event-lightbox-img');
        if (!box || !img) return;
        img.src = src;
        box.classList.remove('hidden');
        box.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    function closeEventLightbox() {
        const box = document.getElementById('event-lightbox');
        if (!box) return;
        box.classList.add('hidden');
        box.classList.remove('flex');
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeEventLightbox();
    });
    if (typeof lucide !== 'undefined') lucide.createIcons();
</script>
</x-layout>
