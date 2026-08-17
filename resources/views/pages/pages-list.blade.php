<x-layout>
    <div class="bg-slate-50 min-h-screen py-20">
        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-10">
            <h1 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">All Pages</h1>
            <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse($pages as $page)
                    <a href="{{ route('page.show', $page->slug) }}" class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md transition-shadow">
                        <h2 class="font-outfit font-bold text-[#123B2D]">{{ $page->title }}</h2>
                        @if($page->meta_description)
                            <p class="text-sm text-slate-500 mt-2">{{ $page->meta_description }}</p>
                        @endif
                    </a>
                @empty
                    <p class="text-slate-500">No pages found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>