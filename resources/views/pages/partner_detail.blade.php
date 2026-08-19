<x-layout>
<main class="bg-slate-50/50 min-h-screen">
    <!-- Page Header Strip -->
    <section class="bg-[#123B2D] lg:py-16 py-12">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="reveal-on-scroll">
                    <p class="text-[#02B1EB] text-[10px] font-black uppercase tracking-[0.5em] mb-3">Partner
                        Organization</p>
                    <h1
                        class="font-outfit text-3xl md:text-5xl font-black text-white uppercase tracking-tight leading-tight">
                        {{ $partner->name }}
                    </h1>
                </div>
                <a href="{{ route('home') }}"
                    class="inline-flex items-center gap-2 text-white/70 hover:text-white text-[10px] font-black uppercase tracking-widest transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Back to Home
                </a>
            </div>
        </div>
    </section>

    <!-- Partner Detail -->
    <section class="lg:py-16 py-10">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-8 lg:p-14 text-center">
                        <div
                            class="w-40 h-40 md:w-52 md:h-52 mx-auto rounded-full bg-slate-50 border-2 border-slate-100 p-2 flex items-center justify-center overflow-hidden shadow-sm mb-8">
                            @if ($partner->logo_path)
                                <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}"
                                    class="w-full h-full object-cover rounded-full">
                            @else
                                <div class="w-full h-full rounded-full bg-[#123B2D]/10 flex items-center justify-center text-[#123B2D]">
                                    <i data-lucide="building-2" class="w-12 h-12"></i>
                                </div>
                            @endif
                        </div>

                        <h2 class="font-outfit text-2xl md:text-3xl font-black text-[#123B2D] uppercase tracking-tight mb-4">
                            {{ $partner->name }}
                        </h2>

                        @if ($partner->description)
                            <div class="text-slate-500 text-sm md:text-base leading-relaxed max-w-2xl mx-auto">
                                {!! nl2br(e($partner->description)) !!}
                            </div>
                        @endif

                        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                            @if ($partner->url)
                                <a href="{{ $partner->url }}" target="_blank"
                                    class="inline-flex items-center gap-3 px-8 py-4 bg-[#123B2D] text-white text-[11px] font-black uppercase tracking-widest rounded-xl hover:bg-[#02B1EB] transition-all shadow-lg group">
                                    Visit Official Website
                                    <i data-lucide="external-link"
                                        class="w-4 h-4 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                                </a>
                            @endif
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center gap-2 px-8 py-4 border-2 border-slate-200 text-slate-600 text-[11px] font-black uppercase tracking-widest rounded-xl hover:border-[#123B2D] hover:text-[#123B2D] transition-all">
                                Back to Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</x-layout>