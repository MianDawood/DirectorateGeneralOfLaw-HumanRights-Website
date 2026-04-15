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
            <figure class="mb-12 rounded-2xl overflow-hidden border border-slate-100 shadow-sm">
                <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}" class="w-full h-auto object-cover max-h-[500px]">
                <figcaption class="p-4 bg-slate-50 text-xs text-slate-500 text-center border-t border-slate-100">
                    {{ $news->title }}
                </figcaption>
            </figure>

            <!-- Article Body -->
            <div class="prose prose-lg prose-slate max-w-none font-inter text-slate-600 leading-loose">
                @foreach(explode("\n\n", $news->content) as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>

        </div>
    </article>
</x-layout>
