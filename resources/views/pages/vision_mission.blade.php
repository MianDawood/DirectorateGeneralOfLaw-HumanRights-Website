@php
    use App\Models\VisionMission;

    // Fetch the active Vision, Mission and Core Values sections
    $vision = VisionMission::where('section', 'vision')->active()->first();
    $mission = VisionMission::where('section', 'mission')->active()->first();
    $coreValues = VisionMission::where('section', 'core_values')->active()->first();
@endphp

<x-layout>
<main class="bg-slate-50/50 min-h-screen">
    <!-- Page Header Strip -->
    <section class="bg-[#123B2D] lg:py-14 py-10">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="reveal-on-scroll">
                    <p class="text-[#02B1EB] text-[10px] font-black uppercase tracking-[0.5em] mb-3">About Directorate</p>
                    <h1 class="font-outfit text-3xl md:text-4xl font-black text-white uppercase tracking-tight leading-tight">
                        Vision & Mission
                    </h1>
                    <p class="text-white/80 text-base md:text-lg mt-3 max-w-2xl">Discover our commitment to promoting, protecting, and enforcing human rights across Khyber Pakhtunkhwa through our vision, mission, and core values.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision, Mission & Core Values -->
    <section class="py-10 lg:py-16">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <div class="space-y-10 lg:space-y-20">
                <!-- Vision -->
                <div class="reveal-on-scroll">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-1.5 h-8 bg-black rounded-full"></div>
                        <h2 class="font-outfit text-3xl lg:text-4xl font-extrabold text-[#0ea5e9] uppercase tracking-tight">Vision</h2>
                    </div>
                    <p class="text-slate-600 text-lg lg:text-xl leading-relaxed max-w-4xl font-medium">
                        {{ $vision?->description ?? 'Our vision is of a Khyber Pakhtunkhwa Province in which every person\'s Human Rights are respected and he/she is able to enjoy life in all its fullness.' }}
                    </p>
                </div>

                <!-- Mission -->
                <div class="reveal-on-scroll">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-1.5 h-8 bg-black rounded-full"></div>
                        <h2 class="font-outfit text-3xl lg:text-4xl font-extrabold text-[#0ea5e9] uppercase tracking-tight">Mission</h2>
                    </div>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed max-w-5xl">
                        {{ $mission?->description ?? 'Directorate of Human Rights Government of Khyber Pakhtunkhwa\'s Mission is to Promote, Protect and Enforce Human Rights in the Province of Khyber Pakhtunkhwa, as guaranteed by the Constitution of Islamic Republic of Pakistan and various International Conventions, Treaties, Covenants and Agreements to which Pakistan is a state party or shall become a state party.' }}
                    </p>
                </div>

                <!-- Core Values -->
                <div class="reveal-on-scroll">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-1.5 h-8 bg-black rounded-full"></div>
                        <h2 class="font-outfit text-3xl lg:text-4xl font-extrabold text-[#0ea5e9] uppercase tracking-tight">Core Values</h2>
                    </div>
                    <p class="text-slate-600 text-base lg:text-lg leading-relaxed max-w-5xl mb-12">
                        {{ $coreValues?->description ?? 'Directorate of Human Rights, a statutory and independent institution under the general supervision of Law, Parliamentary Affairs & Human Rights Department Government of Khyber Pakhtunkhwa, is committed to upholding these core values:' }}
                    </p>

                    <!-- Values Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-4">
                        @foreach(['Independence', 'Professionalism', 'Equality', 'Participation', 'Accessibility', 'Accountability', 'Inclusiveness', 'Integrity', 'Pro-activeness', 'Collaboration'] as $value)
                            <div class="flex items-center gap-4 group transition-all duration-300 py-1">
                                <div class="w-6 h-6 bg-[#0ea5e9] flex items-center justify-center rounded shadow-lg shadow-[#0ea5e9]/20 group-hover:translate-x-1 transition-transform">
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-white"></i>
                                </div>
                                <span class="text-slate-700 font-black text-sm sm:text-base lg:text-lg uppercase tracking-wider">{{ $value }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</x-layout>
