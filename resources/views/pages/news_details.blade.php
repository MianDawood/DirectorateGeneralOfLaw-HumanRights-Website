<x-layout>
    <!-- Back Navigation -->
    <div class="bg-slate-50 border-b border-slate-100 py-4">
        <div class="max-w-[1000px] mx-auto px-6">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 uppercase tracking-widest hover:text-[#02B1EB] transition-colors group">
                <i data-lucide="arrow-left" class="w-4 h-4 group-hover:-translate-x-1 transition-transform"></i>
                Back to Home
            </a>
        </div>
    </div>

    <!-- Article Content -->
    <article class="bg-white py-12 md:py-20">
        <div class="max-w-[1000px] mx-auto px-6">
            <!-- Article Header -->
            <header class="mb-12">
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <span class="px-4 py-1.5 bg-[#02B1EB]/10 text-[#02B1EB] text-[10px] font-black uppercase tracking-widest rounded-full">News</span>
                    @if($news->is_featured)
                    <span class="px-4 py-1.5 bg-[#123B2D] text-white text-[10px] font-black uppercase tracking-widest rounded-full">Featured</span>
                    @endif
                    <span class="flex items-center gap-2 text-sm text-slate-500 font-medium font-outfit">
                        <i data-lucide="calendar" class="w-4 h-4 text-slate-400"></i> {{ $news->published_date->format('F d, Y') }}
                    </span>
                </div>
                <h1 class="font-outfit text-3xl md:text-5xl font-black text-slate-900 leading-[1.1] tracking-tight mb-6">
                    {{ $news->title }}
                </h1>
                <p class="text-lg md:text-xl text-slate-500 leading-relaxed font-outfit border-l-4 border-[#02B1EB] pl-6">
                    {{ $news->excerpt }}
                </p>
            </header>

            <!-- Featured Image -->
            @if($news->image_path)
            <figure class="mb-12 rounded-2xl overflow-hidden border border-slate-100 shadow-sm">
                <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}" class="w-full h-auto object-cover max-h-[500px]">
                <figcaption class="p-4 bg-slate-50 text-xs text-slate-500 text-center border-t border-slate-100">
                    {{ $news->title }}
                </figcaption>
            </figure>
            @endif

            <!-- Article Body -->
            <div class="prose prose-lg prose-slate max-w-none font-inter text-slate-600 leading-loose">
                @foreach(explode("\n\n", $news->content) as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </article>

    <!-- Photo Gallery -->
    @if($news->images->isNotEmpty())
    <section class="bg-slate-50 py-16">
        <div class="max-w-[1000px] mx-auto px-6">
            <h2 class="font-outfit text-2xl font-black text-slate-900 uppercase tracking-tight mb-8">
                Photo <span class="text-[#123B2D]">Gallery</span>
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($news->images as $image)
                    <button type="button"
                            class="relative aspect-square rounded-xl overflow-hidden group cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#02B1EB]"
                            onclick="openNewsLightbox('{{ asset('storage/' . $image->image_path) }}')">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $news->title }}"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-[#123B2D]/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <i data-lucide="maximize-2" class="w-8 h-8 text-white"></i>
                        </div>
                    </button>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Lightbox -->
    <div id="news-lightbox" class="fixed inset-0 z-[200] bg-black/90 hidden items-center justify-center p-4" onclick="closeNewsLightbox()">
        <button type="button" class="absolute top-6 right-6 text-white hover:text-[#02B1EB]" aria-label="Close">
            <i data-lucide="x" class="w-10 h-10"></i>
        </button>
        <img id="news-lightbox-img" src="" alt="Enlarged view" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl" onclick="event.stopPropagation()">
    </div>

    <script>
        function openNewsLightbox(src) {
            const box = document.getElementById('news-lightbox');
            const img = document.getElementById('news-lightbox-img');
            if (!box || !img) return;
            img.src = src;
            box.classList.remove('hidden');
            box.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
        function closeNewsLightbox() {
            const box = document.getElementById('news-lightbox');
            if (!box) return;
            box.classList.add('hidden');
            box.classList.remove('flex');
            document.body.style.overflow = '';
        }
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeNewsLightbox();
        });
        if (typeof lucide !== 'undefined') lucide.createIcons();
    </script>
</x-layout>
