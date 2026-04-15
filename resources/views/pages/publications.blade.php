<x-layout>
    <!-- Page Header -->
    <div class="relative bg-[#123B2D] py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('{{ asset('images/hero image 2.png') }}')] bg-cover bg-center mix-blend-overlay"></div>
        <div class="max-w-[1536px] mx-auto px-6 relative z-10 text-center">
            <h1 class="font-outfit text-3xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">
                Official <span class="text-[#02B1EB]">Publications</span>
            </h1>
            <p class="text-white/80 text-sm md:text-lg max-w-2xl mx-auto font-medium">
                Access official reports, research documents, acts, and guidelines compiled by the Directorate.
            </p>
        </div>
    </div>

    <!-- Publications List -->
    <section class="bg-white py-16 min-h-[500px]">
        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">

            <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12 border-b border-slate-100 pb-8">
                <!-- Filters -->
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('publications', request()->only(['search'])) }}"
                       class="px-5 py-2.5 rounded-full {{ !request('category') || request('category') === 'All' ? 'bg-[#123B2D] text-white' : 'bg-slate-50 text-slate-600 hover:bg-[#02B1EB] hover:text-white' }} text-xs font-bold uppercase tracking-widest transition-all border border-slate-200">All</a>
                    @foreach($categories as $category)
                    <a href="{{ route('publications', array_merge(request()->only(['search']), ['category' => $category])) }}"
                       class="px-5 py-2.5 rounded-full {{ request('category') === $category ? 'bg-[#123B2D] text-white' : 'bg-slate-50 text-slate-600 hover:bg-[#02B1EB] hover:text-white' }} text-xs font-bold uppercase tracking-widest transition-all border border-slate-200">{{ $category }}</a>
                    @endforeach
                </div>
                <!-- Search -->
                <form method="GET" action="{{ route('publications') }}" class="relative w-full md:w-80">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search publication..."
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm focus:border-[#02B1EB] focus:ring-1 focus:ring-[#02B1EB] outline-none">
                    <i data-lucide="search" class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"></i>
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($publications as $publication)
                <div class="bg-white border border-slate-100 rounded-2xl p-6 group hover:shadow-xl hover:border-[#02B1EB]/20 transition-all duration-300 flex flex-col">
                    <div class="w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center text-red-500 mb-5">
                        <i data-lucide="file-text" class="w-6 h-6"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-[10px] font-black uppercase tracking-widest text-[#02B1EB] mb-2">{{ $publication->category }}</p>
                        <h3 class="font-outfit text-lg font-bold text-slate-800 leading-tight mb-3">
                            {{ $publication->title }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2">
                            {{ $publication->description }}
                        </p>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <div class="text-xs font-medium text-slate-400">{{ $publication->file_type }} • {{ $publication->file_size }}</div>
                        <a href="{{ route('publications.download', $publication->id) }}"
                           class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-600 hover:bg-[#123B2D] hover:text-white transition-all">
                            <i data-lucide="download" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <i data-lucide="file-x" class="w-16 h-16 text-slate-300 mx-auto mb-4"></i>
                    <h3 class="text-lg font-semibold text-slate-600 mb-2">No publications found</h3>
                    <p class="text-slate-500">Try adjusting your search or filter criteria.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($publications->hasPages())
            <div class="mt-16 flex justify-center">
                {{ $publications->appends(request()->query())->links() }}
            </div>
            @endif

        </div>
    </section>
</x-layout>
