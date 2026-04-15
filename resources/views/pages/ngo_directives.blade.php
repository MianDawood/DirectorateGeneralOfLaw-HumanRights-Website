<x-layout>
<main class="bg-slate-50/50">
        <!-- Hero Section -->
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
                    <h1
                        class="font-outfit text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">
                        Mandatory <br><span class="text-primary italic">Directives</span>
                    </h1>
                    <p class="text-white/80 text-lg leading-relaxed font-medium mb-6 max-w-xl">
                        Official regulatory framework and mandatory compliance requirements for NGOs in Khyber Pakhtunkhwa.
                    </p>
                </div>
            </div>
        </section>

        <!-- Mandatory Directive Section -->
        <section class="lg:py-20 py-10 bg-white">
            <div class="max-w-[1536px] mx-auto px-4 lg:px-20">
                <div
                    class="bg-slate-50 rounded-[48px] p-8 md:p-16 border border-slate-100 relative overflow-hidden reveal-on-scroll">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full -mr-48 -mt-48 blur-3xl">
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="text-red-500 text-[10px] font-black uppercase tracking-widest">Urgent
                                Directive</span>
                        </div>
                        <h2
                            class="font-outfit text-3xl md:text-5xl font-black text-slate-900 uppercase mb-8 leading-tight">
                            Mandatory Registration Under <br>
                            <span class="text-[#123B2D]">Rules 2024</span>
                        </h2>
                        <div class="space-y-6 text-slate-600 text-lg md:text-xl leading-relaxed max-w-4xl">
                            <p class="font-bold text-slate-900">
                                The Khyber Pakhtunkhwa Non-Governmental Organizations Registration (Working in the Field
                                of Human Rights) Rules, 2024.
                            </p>
                            <p>
                                As per the enforcement of these rules, all existing Non-Governmental Organizations
                                (NGOs) working in the field of human rights protection and not registered with the
                                Directorate General Law and Human Rights are <span
                                    class="text-red-600 font-bold underline">required to register themselves within
                                    sixty (60) days</span> of the enforcement of these rules.
                            </p>
                            <p class="text-sm border-l-2 border-slate-200 pl-6 italic">
                                This initiative aims to promote transparency, strengthen oversight, and enhance
                                coordination for the protection and promotion of human rights in the province.
                            </p>
                        </div>

                        <!-- Warning Boxes -->
                        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div
                                class="bg-white p-8 rounded-[32px] border border-red-100 shadow-sm relative overflow-hidden group">
                                <div
                                    class="absolute top-0 right-0 p-8 opacity-[0.03] group-hover:scale-125 transition-transform duration-700">
                                    <i data-lucide="percent" class="w-32 h-32 text-red-500"></i>
                                </div>
                                <div class="flex items-center gap-4 mb-4">
                                    <div
                                        class="w-12 h-12 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center">
                                        <i data-lucide="clock-alert" class="w-6 h-6"></i>
                                    </div>
                                    <h4 class="font-outfit font-black text-slate-900 uppercase text-sm tracking-widest">
                                        Late Penalties</h4>
                                </div>
                                <p class="text-slate-600 text-sm leading-relaxed">Imposition of late charges at the rate
                                    of <span class="font-bold text-red-600 underline">5% of the registration fee per
                                        day</span> after the sixty-day grace period.</p>
                            </div>

                            <div class="bg-slate-900 p-8 rounded-[32px] relative overflow-hidden group">
                                <div
                                    class="absolute top-0 right-0 p-8 opacity-10 group-hover:scale-125 transition-transform duration-700">
                                    <i data-lucide="shield-off" class="w-32 h-32 text-white"></i>
                                </div>
                                <div class="flex items-center gap-4 mb-4">
                                    <div
                                        class="w-12 h-12 bg-white/10 text-white rounded-2xl flex items-center justify-center">
                                        <i data-lucide="ban" class="w-6 h-6 text-red-400"></i>
                                    </div>
                                    <h4 class="font-outfit font-black text-white uppercase text-sm tracking-widest">
                                        Closure of Operations</h4>
                                </div>
                                <p class="text-slate-400 text-sm leading-relaxed">Failure to register within the
                                    stipulated time shall result in the <span
                                        class="text-red-400 font-bold underline">immediate closure of NGO
                                        operations</span> by the Directorate General.</p>
                            </div>
                        </div>

                        <!-- CTA Section -->
                        <div
                            class="mt-16 bg-white rounded-3xl lg:p-8 p-6 border border-slate-100 flex flex-col lg:flex-row items-center justify-between gap-10">
                            <div class="flex items-center gap-6">
                                <div
                                    class="lg:w-16 lg:h-16 w-12 h-12 bg-primary/10 text-primary rounded-2xl flex items-center justify-center shrink-0">
                                    <i data-lucide="form-input" class="w-8 h-8"></i>
                                </div>
                                <div>
                                    <h4 class="font-outfit font-black text-slate-900 uppercase text-lg mb-1">Online
                                        Registration Portal</h4>
                                    <p class="text-slate-500 text-sm">Direct link to the official Google Forms
                                        registration portal.</p>
                                </div>
                            </div>

                            <a href="{{ route('registration_form_part1') }}"
                                class="group flex items-center justify-center gap-3 lg:px-12 lg:py-5 px-6 py-3 bg-primary text-white font-black uppercase tracking-widest text-xs rounded-2xl hover:bg-secondary transition-all shadow-xl shadow-primary/20 active:scale-95 w-full lg:w-auto">
                                Click Here for Online Registration
                                <i data-lucide="external-link"
                                    class="lg:w-4 lg:h-4 w-6 h-6 group-hover:rotate-45 transition-transform"></i>
                            </a>
                        </div>

                        <!-- Support Contacts -->
                        <div class="mt-12 flex flex-wrap items-center gap-y-6 gap-x-12 pt-8 border-t border-slate-200">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-500">
                                    <i data-lucide="phone" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Inquiry
                                        Helpline</p>
                                    <p class="text-slate-900 font-bold">091-9217205 / 091-9217203</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-500">
                                    <i data-lucide="calendar-clock" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Working
                                        Hours</p>
                                    <p class="text-slate-900 font-bold">09:00 AM – 05:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <!-- Footer Section -->
</x-layout>