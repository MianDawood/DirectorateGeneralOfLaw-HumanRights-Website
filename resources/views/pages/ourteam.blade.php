<x-layout>
<main class="bg-white md:py-24 py-12 relative overflow-hidden">
        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-4 md:w-8 md:h-80 h-full bg-primary"></div>
        <div class="absolute right-0 top-1/2 -translate-y-1/2 w-4 md:w-8 md:h-80 h-full bg-primary"></div>

        <div class="max-w-6xl mx-auto px-6">
            <h2
                class="text-5xl md:text-7xl font-black text-center text-slate-900 uppercase tracking-tight md:mb-28 mb-10 font-outfit reveal-on-scroll">
                Our <span class="text-[#123B2D]">Perfect</span> Team
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-16 md:gap-y-32 reveal-stagger">
                @php
                    $teamMembers = $teamMembers ?? collect();
                @endphp
                @forelse($teamMembers as $member)
                    @php
                        $initials = collect(explode(' ', trim($member->name)))
                            ->filter()
                            ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                            ->take(3)
                            ->implode('');
                    @endphp
                    <div class="flex flex-col items-center md:flex-row md:items-start gap-6 md:gap-8 group">
                        <div
                            class="shrink-0 w-48 h-48 md:w-48 md:h-48 rounded-full overflow-hidden border-4 border-slate-50 shadow-2xl group-hover:scale-105 transition-transform duration-700">
                            <img src="{{ $member->image_path ? asset($member->image_path) : asset('images/logo.jpg') }}"
                                alt="{{ $member->name }}" class="w-full h-full object-cover"
                                onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden'); this.nextElementSibling.classList.add('flex');" />
                            <div
                                class="hidden w-full h-full bg-gradient-to-br from-slate-200 to-slate-300 flex-col items-center justify-center gap-2">
                                <svg class="w-12 h-12 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                <span class="font-outfit text-2xl font-bold text-slate-500 tracking-widest">{{ $initials }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center md:items-start text-center md:text-left pt-2 md:pt-4">
                            <h3 class="font-outfit text-3xl font-bold text-slate-900 leading-none mb-2">{{ $member->name }}</h3>
                            <p class="text-primary font-bold text-base uppercase tracking-widest mb-6">{{ $member->position }}</p>
                            <p class="text-slate-400 text-[13px] italic leading-relaxed mb-8 max-w-[280px]">
                                @if($member->email)
                                    <i data-lucide="mail" class="w-4 h-4 inline-block mr-1 text-[#123B2D]"></i>
                                    {{ $member->email }}<br>
                                @endif
                                @if($member->phone)
                                    <i data-lucide="phone" class="w-4 h-4 inline-block mr-1 text-[#123B2D]"></i>
                                    {{ $member->phone }}
                                @endif
                            </p>
                            <div class="flex items-center gap-5 text-slate-300">
                                <a href="{{ $member->facebook_url ?? '#' }}"
                                    class="hover:text-primary transition-all duration-300 transform hover:scale-110"><i
                                        data-lucide="facebook" class="w-6 h-6"></i></a>
                                <a href="{{ $member->twitter_url ?? '#' }}"
                                    class="hover:text-primary transition-all duration-300 transform hover:scale-110"><i
                                        data-lucide="twitter" class="w-6 h-6"></i></a>
                                <a href="{{ $member->instagram_url ?? '#' }}"
                                    class="hover:text-primary transition-all duration-300 transform hover:scale-110"><i
                                        data-lucide="instagram" class="w-6 h-6"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-slate-500">No team members available.</div>
                @endforelse
            </div>
        </div>
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
