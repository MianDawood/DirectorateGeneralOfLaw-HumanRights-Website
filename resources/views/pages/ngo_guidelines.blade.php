@php
use App\Models\NgoGuideline;
$guidelines = NgoGuideline::where('is_active', true)->orderBy('order')->get();
@endphp

<x-layout>
<main>
        <section class="bg-gradient-to-br from-[#123B2D] to-[#1a5240] py-24 relative overflow-hidden">
            <!-- Decoration -->
            <div
                class="absolute top-0 right-0 w-[500px] h-[500px] bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl">
            </div>

            <div class="max-w-[1536px] mx-auto px-6 lg:px-20 relative z-10">
                <div class="flex items-center gap-3 mb-6 reveal-on-scroll">
                    <span class="w-12 h-[2px] bg-[#02B1EB]"></span>
                    <span class="text-[#02B1EB] text-xs font-black uppercase tracking-[0.3em]">NGO Registration</span>
                </div>
                <h1
                    class="font-outfit text-5xl md:text-7xl font-black text-white uppercase tracking-tight mb-6 reveal-on-scroll">
                    Registration <br><span class="text-[#02B1EB]">Guidelines</span>
                </h1>
                <p class="text-white/70 text-lg md:text-xl max-w-2xl leading-relaxed reveal-on-scroll">
                    Step-by-step guidelines for NGO registration under the Khyber Pakhtunkhwa Non-Governmental
                    Organizations Registration Rules, 2024.
                </p>
            </div>
        </section>

        <section class="py-24 bg-white">
            <div class="max-w-[1200px] mx-auto px-6 lg:px-20">
                <div class="space-y-12 reveal-stagger">
                    @forelse($guidelines as $index => $guideline)
                        <div class="flex flex-col md:flex-row items-start gap-10 group">
                            <div
                                class="w-16 h-16 {{ ($index % 2 == 0) ? 'bg-[#123B2D]' : 'bg-[#02B1EB]' }} text-white rounded-2xl flex items-center justify-center shrink-0 font-outfit font-black text-2xl shadow-xl group-hover:scale-110 transition-transform duration-500">
                                {{ $index + 1 }}</div>
                            <div class="pt-2">
                                <h3 class="font-outfit text-2xl font-bold text-[#123B2D] uppercase mb-4 tracking-tight">
                                    {{ $guideline->title }}</h3>
                                <p class="text-slate-500 text-lg leading-relaxed">{{ $guideline->description }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-20">
                            <p class="text-slate-400 italic">No guidelines available yet.</p>
                        </div>
                    @endforelse
                </div>

                <div
                    class="mt-20 p-10 bg-slate-50 rounded-[40px] border border-slate-100 flex flex-col md:flex-row items-center justify-between gap-8 reveal-on-scroll">
                    <div>
                        <h4 class="font-outfit text-2xl font-bold text-slate-900 mb-2">Ready to start?</h4>
                        <p class="text-slate-500">Begin your online registration process now.</p>
                    </div>
                    <a href="{{ route('registration_form_part1') }}"
                        class="px-10 py-5 bg-[#123B2D] text-white font-black uppercase tracking-widest text-xs rounded-2xl hover:bg-[#02B1EB] transition-all shadow-xl shadow-primary/20 active:scale-95">Start
                        Online Registration</a>
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
</x-layout>