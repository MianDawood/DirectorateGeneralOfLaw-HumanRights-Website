<x-layout>
    <!-- Page Header -->
    <div class="relative bg-[#123B2D] py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('{{ asset('images/hero image 3.png') }}')] bg-cover bg-center mix-blend-overlay"></div>
        <div class="max-w-[1536px] mx-auto px-6 relative z-10 text-center">
            <h1 class="font-outfit text-3xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">
                Human Rights <span class="text-[#02B1EB]">Causes</span>
            </h1>
            <p class="text-white/80 text-sm md:text-lg max-w-2xl mx-auto font-medium">
                Explore the key focus areas where the Directorate works to protect and promote human rights across the province.
            </p>
        </div>
    </div>

    <!-- Causes Section -->
    <section class="bg-slate-50 py-16">
        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($causes as $cause)
                    <div class="p-6 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500">
                        <div class="flex items-start justify-between">
                            <div class="p-3 bg-[#02B1EB]/10 rounded-lg text-[#02B1EB]">
                                <i data-lucide="heart" class="w-6 h-6"></i>
                            </div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-green-600 bg-green-50 px-2.5 py-1 rounded-full">
                                {{ strtoupper($cause->status) }}
                            </span>
                        </div>
                        <h3 class="mt-4 font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight">
                            {{ $cause->title }}
                        </h3>
                        <p class="mt-2 text-sm text-slate-500 leading-relaxed">
                            {{ $cause->description ?? 'Description will be updated soon.' }}
                        </p>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <i data-lucide="file-x" class="w-10 h-10 text-slate-300 mx-auto mb-3"></i>
                        <p class="text-sm text-slate-500">No causes available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layout>
