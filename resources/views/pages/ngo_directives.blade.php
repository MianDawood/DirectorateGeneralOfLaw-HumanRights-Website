@php
use App\Models\NgoDirective;
$directive = NgoDirective::first();

/**
 * Helper to parse [text] into underlined/bold spans for the specialized design.
 */
function parseDirectivesContent($content, $class = 'text-primary') {
    if (!$content) return '';
    return preg_replace('/\[(.*?)\]/', '<span class="'.$class.' font-bold underline">$1</span>', $content);
}
@endphp

<x-layout>
<main class="bg-slate-50/50">
        <!-- Hero Section (Static as requested) -->
        <section class="relative lg:h-[45vh] h-[35vh] flex items-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/hero image 5.jpg') }}" alt="Hero Background" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-secondary/95 via-secondary/80 to-transparent"></div>
            </div>

            <div class="max-w-[1536px] mx-auto px-6 lg:px-20 relative z-10 w-full">
                <div class="max-w-3xl reveal-on-scroll">
                    <div class="flex items-center gap-4 mb-2">
                        <span class="text-white/80 text-[10px] font-black uppercase tracking-[0.6em]">Rules & Regulations</span>
                    </div>
                    <h1 class="font-outfit text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">
                        Mandatory <br><span class="text-primary italic">Directives</span>
                    </h1>
                    <p class="text-white/80 text-lg leading-relaxed font-medium mb-6 max-w-xl">
                        Official regulatory framework and mandatory compliance requirements for NGOs in Khyber Pakhtunkhwa.
                    </p>
                </div>
            </div>
        </section>

        @if($directive?->is_active)
        <!-- Mandatory Directive Section (Dynamic Heading/Content) -->
        <section class="lg:py-20 py-10 bg-white">
            <div class="max-w-[1536px] mx-auto px-4 lg:px-20">
                <div class="bg-slate-50 rounded-[48px] p-8 md:p-16 border border-slate-100 relative overflow-hidden reveal-on-scroll">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full -mr-48 -mt-48 blur-3xl"></div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="text-red-500 text-[10px] font-black uppercase tracking-widest">Urgent Directive</span>
                        </div>
                        
                        @php
                            $heading = $directive->heading ?? 'Mandatory Registration Under Rules 2024';
                            $words = explode(' ', $heading);
                            $lastTwo = array_slice($words, -2);
                            $firstPart = implode(' ', array_slice($words, 0, -2));
                        @endphp

                        <h2 class="font-outfit text-3xl md:text-5xl font-black text-slate-900 uppercase mb-8 leading-tight">
                            {{ $firstPart }}
                            @if(!empty($firstPart)) <br> @endif
                            <span class="text-[#123B2D]">{{ implode(' ', $lastTwo) }}</span>
                        </h2>
                        
                        <div class="space-y-6 text-slate-600 text-lg md:text-xl leading-relaxed max-w-4xl">
                            {!! parseDirectivesContent($directive->desc_2, 'text-slate-900 font-bold') !!}
                        </div>

                        <!-- Warning Boxes (Dynamic Cards) -->
                        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Card 1 -->
                            <div class="bg-white p-8 rounded-[32px] border border-red-100 shadow-sm relative overflow-hidden group">
                                <div class="absolute top-0 right-0 p-8 opacity-[0.03] group-hover:scale-125 transition-transform duration-700">
                                    <i data-lucide="percent" class="w-32 h-32 text-red-500"></i>
                                </div>
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-12 h-12 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center">
                                        <i data-lucide="clock-alert" class="w-6 h-6"></i>
                                    </div>
                                    <h4 class="font-outfit font-black text-slate-900 uppercase text-sm tracking-widest">
                                        {{ $directive->card_1_title ?? 'Late Penalties' }}</h4>
                                </div>
                                <div class="text-slate-600 text-sm leading-relaxed">
                                    {!! parseDirectivesContent($directive->card_1_desc, 'text-red-600') !!}
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="bg-slate-900 p-8 rounded-[32px] relative overflow-hidden group">
                                <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:scale-125 transition-transform duration-700">
                                    <i data-lucide="shield-off" class="w-32 h-32 text-white"></i>
                                </div>
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-12 h-12 bg-white/10 text-white rounded-2xl flex items-center justify-center">
                                        <i data-lucide="ban" class="w-6 h-6 text-red-400"></i>
                                    </div>
                                    <h4 class="font-outfit font-black text-white uppercase text-sm tracking-widest">
                                        {{ $directive->card_2_title ?? 'Closure of Operations' }}</h4>
                                </div>
                                <div class="text-slate-400 text-sm leading-relaxed">
                                    {!! parseDirectivesContent($directive->card_2_desc, 'text-red-400') !!}
                                </div>
                            </div>
                        </div>

                        <!-- CTA Section (Fixed Static Design) -->
                        <div class="mt-16 bg-white rounded-3xl lg:p-8 p-6 border border-slate-100 flex flex-col lg:flex-row items-center justify-between gap-10">
                            <div class="flex items-center gap-6">
                                <div class="lg:w-16 lg:h-16 w-12 h-12 bg-primary/10 text-primary rounded-2xl flex items-center justify-center shrink-0">
                                    <i data-lucide="form-input" class="w-8 h-8"></i>
                                </div>
                                <div>
                                    <h4 class="font-outfit font-black text-slate-900 uppercase text-lg mb-1">Online Registration Portal</h4>
                                    <p class="text-slate-500 text-sm">Direct link to the official Google Forms registration portal.</p>
                                </div>
                            </div>

                            <a href="{{ route('registration_form_part1') }}"
                                class="group flex items-center justify-center gap-3 lg:px-12 lg:py-5 px-6 py-3 bg-primary font-black uppercase tracking-widest text-xs rounded-2xl hover:bg-secondary transition-all shadow-xl shadow-primary/20 active:scale-95 w-full lg:w-auto">
                                Click Here for Online Registration
                                <i data-lucide="external-link" class="lg:w-4 lg:h-4 w-6 h-6 group-hover:rotate-45 transition-transform"></i>
                            </a>
                        </div>

                        <!-- Support Contacts (Static Design) -->
                        <div class="mt-12 flex flex-wrap items-center gap-y-6 gap-x-12 pt-8 border-t border-slate-200">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-500">
                                    <i data-lucide="phone" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Inquiry Helpline</p>
                                    <p class="text-slate-900 font-bold">091-9217205 / 091-9217203</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-500">
                                    <i data-lucide="calendar-clock" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Working Hours</p>
                                    <p class="text-slate-900 font-bold">09:00 AM – 05:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @else
        <section class="py-32 flex flex-col items-center justify-center text-center px-6">
            <div class="w-24 h-24 bg-brand-50 text-brand-600 rounded-3xl flex items-center justify-center mb-8 animate-pulse">
                <i data-lucide="wrench" class="w-10 h-10"></i>
            </div>
            <h2 class="font-outfit text-3xl font-black text-slate-900 uppercase tracking-tight mb-4">Under Maintenance</h2>
            <p class="text-slate-500 max-w-md mx-auto text-lg leading-relaxed">
                This page is currently being updated to bring you the latest regulatory information. Please check back shortly.
            </p>
            <div class="mt-12">
                <a href="{{ route('home') }}" class="text-brand-600 font-black uppercase text-xs tracking-widest hover:underline flex items-center gap-2">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Back to Home
                </a>
            </div>
        </section>
        @endif
    </main>
</x-layout>