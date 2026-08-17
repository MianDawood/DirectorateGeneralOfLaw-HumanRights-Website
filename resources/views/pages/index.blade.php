@php
    $officialMessages = App\Models\OfficialMessage::active()->ordered()->get();
    $latestNews = App\Models\News::active()->ordered()->take(3)->get();
    $latestTenders = App\Models\Tender::query()
        ->orderBy('publish_date', 'desc')
        ->orderBy('reference_no')
        ->take(2)
        ->get();
    $latestCauses = App\Models\Cause::query()
        ->where('status', 'active')
        ->orderBy('order')
        ->orderBy('title')
        ->take(5)
        ->get();
    $statsComplaintsTotal = App\Models\Complaint::count();
    $statsComplaintsResolved = App\Models\Complaint::where('status', 'resolved')->count();
    $statsNgosRegistered = App\Models\NgoApplication::where('status', 'approved')->count();
    $statsTrainings = App\Models\Event::where(function($q) {
        $q->where('subject', 'LIKE', '%Training%')->orWhere('subject', 'LIKE', '%Workshop%');
    })->count();
    $statsAwareness = App\Models\Event::where('subject', 'LIKE', '%Awareness%')->count();
    $statsResearch = App\Models\Event::where(function($q) {
        $q->where('subject', 'LIKE', '%Research%')->orWhere('subject', 'LIKE', '%Reporting%');
    })->count();
    $partners = App\Models\Partner::active()->ordered()->get();
@endphp
<x-layout>

<script>
    // Official Messages Data
    const officialMessagesData = @json($officialMessages->keyBy('id'));

    function openModal(messageId) {
        const message = officialMessagesData[messageId];
        if (!message) return;

        const modal = document.getElementById('officialMessageModal');
        const modalContent = document.getElementById('modalContent');

        // Populate modal content
        modalContent.innerHTML = `
            <div class="flex items-center gap-6 mb-6">
                <img src="${message.image_path ? @json(asset('') . 'storage/') + message.image_path : @json(asset('images/logo.jpg'))}"
                     class="w-24 h-24 rounded-full object-cover border-4 border-[#123B2D] shadow-lg ${message.image_path && message.image_path.includes('logo.jpg') ? 'p-2 bg-white' : ''}">
                <div>
                    <h3 class="font-outfit text-2xl font-bold text-slate-900">${message.name}</h3>
                    <p class="text-xs font-bold text-[#02B1EB] uppercase tracking-widest mt-1">${message.position}</p>
                </div>
            </div>
            <div class="text-slate-600 leading-relaxed font-inter space-y-4">
                ${message.statement.split('\n\n').map(paragraph => `<p>${paragraph}</p>`).join('')}
            </div>
        `;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.firstElementChild.classList.remove('scale-95');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('opacity-0');
        modal.firstElementChild.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
        document.body.style.overflow = 'auto';
    }

    setTimeout(() => { if(window.lucide) { window.lucide.createIcons(); } }, 100);
</script>

     {{-- hero section  --}}
    <section class="w-full reveal-on-scroll">
        <div class="relative group overflow-hidden bg-white">
            <div id="hero-slider" class="relative h-[400px] lg:h-[600px] overflow-hidden">
                <!-- Slide 1 -->
                <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-100 z-10">
                    <img src="{{ asset('images/hero image 1.jpg') }}" alt="Innovation Award" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-r from-[#123B2D]/90 via-[#123B2D]/50 to-transparent">
                    </div>
                    <div
                        class="hero-content absolute inset-y-0 left-0 w-full md:w-3/4 flex flex-col justify-center p-6 lg:p-24 z-20">
                        <div class="w-20 h-1.5 bg-[#02B1EB] mb-8 rounded-full"></div>
                        <h2
                            class="font-outfit text-3xl lg:text-6xl font-black text-white leading-[1] tracking-tight uppercase lg:mb-8 mb-4">
                            Protection of <span class="text-[#02B1EB]">human rights</span> is our ultimate goal
                        </h2>
                        <p class="text-white/80 text-md lg:text-xl leading-relaxed max-w-xl lg:mb-12 mb-6 font-medium">
                            It is your duty to have full knowledge of your rights. If any individual or institution
                            violates your rights, please contact the Human Rights Directorate.
                        </p>
                        <a href="{{ route('contact_us') }}""
                            class="inline-flex items-center gap-3 px-6 lg:px-10 py-2 lg:py-4 bg-[#02B1EB] text-white font-bold uppercase tracking-widest text-xs hover:bg-white hover:text-[#123B2D] transition-all duration-500 rounded-xl w-fit shadow-xl group/btn">
                            <span>Get in Touch</span>
                            <i data-lucide="arrow-right"
                                class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-0 z-0">
                    <img src="{{ asset('images/hero image 2.png') }}" alt="Legal Reforms" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-r from-[#123B2D]/90 via-[#123B2D]/50 to-transparent">
                    </div>
                    <div
                        class="hero-content absolute inset-y-0 left-0 w-full md:w-3/4 flex flex-col justify-center p-6 lg:p-24 z-20">
                        <div class="w-20 h-1.5 bg-[#02B1EB] mb-8 rounded-full"></div>
                        <h2
                            class="font-outfit text-4xl lg:text-7xl font-black text-white leading-[1] tracking-tight uppercase lg:mb-8 mb-4">
                            Orientation <br /> Session <span class="text-[#02B1EB]">KP NGO</span>
                        </h2>
                        <p class="text-white/80 text-md lg:text-xl leading-relaxed max-w-xl lg:mb-12 mb-6 font-medium">
                            Capacity building workshop for Non-Governmental Organisations registration in Khyber
                            Pakhtunkhwa.
                        </p>
                        <a href="{{ route('ngo_required_documents') }}""
                            class="inline-flex items-center gap-3 px-6 lg:px-10 py-2 lg:py-4 bg-[#02B1EB] text-white font-bold uppercase tracking-widest text-xs hover:bg-white hover:text-[#123B2D] transition-all duration-500 rounded-xl w-fit shadow-xl group/btn">
                            <span>View Details</span>
                            <i data-lucide="arrow-right"
                                class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-0 z-0">
                    <img src="{{ asset('images/hero image 3.png') }}" alt="Digital Services" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-r from-[#123B2D]/90 via-[#123B2D]/50 to-transparent">
                    </div>
                    <div
                        class="hero-content absolute inset-y-0 left-0 w-full md:w-3/4 flex flex-col justify-center p-6 lg:p-24 z-20">
                        <div class="w-20 h-1.5 bg-[#02B1EB] mb-8 rounded-full"></div>
                        <h2
                            class="font-outfit text-4xl lg:text-7xl font-black text-white leading-[1] tracking-tight uppercase lg:mb-8 mb-4">
                            Provincial <br /> <span class="text-[#02B1EB]">Steering</span> Meeting
                        </h2>
                        <p class="text-white/80 text-md lg:text-xl leading-relaxed max-w-xl lg:mb-12 mb-6 font-medium">
                            High-level committee meeting on the National Action Plan for Business & Human Rights.
                        </p>
                        <a href="{{ route('publications') }}"
                            class="inline-flex items-center gap-3 px-6 lg:px-10 py-2 lg:py-4 bg-[#02B1EB] text-white font-bold uppercase tracking-widest text-xs hover:bg-white hover:text-[#123B2D] transition-all duration-500 rounded-xl w-fit shadow-xl group/btn">
                            <span>Download Report</span>
                            <i data-lucide="arrow-right"
                                class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-0 z-0">
                    <img src="{{ asset('images/hero image 4.jpg') }}" alt="DG sb Session" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-r from-[#123B2D]/90 via-[#123B2D]/50 to-transparent">
                    </div>
                    <div
                        class="hero-content absolute inset-y-0 left-0 w-full md:w-3/4 flex flex-col justify-center p-6 lg:p-24 z-20">
                        <div class="w-20 h-1.5 bg-[#02B1EB] mb-8 rounded-full"></div>
                        <h2
                            class="font-outfit text-4xl lg:text-7xl font-black text-white leading-[1] tracking-tight uppercase lg:mb-8 mb-4">
                            Strategic <br /> <span class="text-[#02B1EB]">Governance</span> Session
                        </h2>
                        <p class="text-white/80 text-md lg:text-xl leading-relaxed max-w-xl lg:mb-12 mb-6 font-medium">
                            Director General Law & Human Rights presiding over the strategic planning session for
                            provincial human rights initiatives.
                        </p>
                        <a href="{{ route('tenders') }}"
                            class="inline-flex items-center gap-3 px-6 lg:px-10 py-2 lg:py-4 bg-[#02B1EB] text-white font-bold uppercase tracking-widest text-xs hover:bg-white hover:text-[#123B2D] transition-all duration-500 rounded-xl w-fit shadow-xl group/btn">
                            <span>View Activities</span>
                            <i data-lucide="arrow-right"
                                class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
                <!-- Slide 5 -->
                <div class="slide absolute inset-0 transition-opacity duration-1000 opacity-0 z-0">
                    <img src="{{ asset('images/hero image 5.jpg') }}" alt="DG sb Meeting" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-r from-[#123B2D]/90 via-[#123B2D]/50 to-transparent">
                    </div>
                    <div
                        class="hero-content absolute inset-y-0 left-0 w-full md:w-3/4 flex flex-col justify-center p-6 lg:p-24 z-20">
                        <div class="w-20 h-1.5 bg-[#02B1EB] mb-8 rounded-full"></div>
                        <h2
                            class="font-outfit text-4xl lg:text-7xl font-black text-white leading-[1] tracking-tight uppercase lg:mb-8 mb-4">
                            Community <br /> <span class="text-[#02B1EB]">Engagement</span> Forum
                        </h2>
                        <p class="text-white/80 text-md lg:text-xl leading-relaxed max-w-xl lg:mb-12 mb-6 font-medium">
                            Director General highlighting the importance of grassroots awareness and community
                            involvement in human rights protection.
                        </p>
                        <a href="{{ route('publications') }}"
                            class="inline-flex items-center gap-3 px-6 lg:px-10 py-2 lg:py-4 bg-[#02B1EB] text-white font-bold uppercase tracking-widest text-xs hover:bg-white hover:text-[#123B2D] transition-all duration-500 rounded-xl w-fit shadow-xl group/btn">
                            <span>Learn More</span>
                            <i data-lucide="arrow-right"
                                class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Navigation Dots -->
            <div id="slider-dots" class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-2 z-20">
                <span class="dot w-12 h-1 bg-[#02B1EB] cursor-pointer transition-all duration-300"></span>
                <span
                    class="dot w-12 h-1 bg-white/40 cursor-pointer hover:bg-white/60 transition-all duration-300"></span>
                <span
                    class="dot w-12 h-1 bg-white/40 cursor-pointer hover:bg-white/60 transition-all duration-300"></span>
                <span
                    class="dot w-12 h-1 bg-white/40 cursor-pointer hover:bg-white/60 transition-all duration-300"></span>
                <span
                    class="dot w-12 h-1 bg-white/40 cursor-pointer hover:bg-white/60 transition-all duration-300"></span>
            </div>
            <!-- Nav Arrows -->
            <div class="absolute inset-y-0 left-0 flex items-center z-20">
                <button onclick="prevSlide()"
                    class="bg-[#123B2D]/60 text-white p-3 hover:bg-[#02B1EB] transition-all rounded-r-lg">
                    <i data-lucide="chevron-left" class="w-6 h-6"></i>
                </button>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center z-20">
                <button onclick="nextSlide()"
                    class="bg-[#123B2D]/60 text-white p-3 hover:bg-[#02B1EB] transition-all rounded-l-lg">
                    <i data-lucide="chevron-right" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
        </section>

    <!-- FUNCTIONS OF DIRECTORATE GENERAL SECTION -->
    <section class="bg-white py-16 reveal-on-scroll">
        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="text-center mb-12">
                <h2 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">Functions of
                    <span class="text-[#02B1EB]">Directorate General</span>
                </h2>
                <p class="text-slate-500 mt-3 max-w-2xl mx-auto text-sm">The Directorate General of Law & Human Rights is responsible for protection of fundamental rights, NGO regulation, treaty compliance, capacity building, and legal awareness across Khyber Pakhtunkhwa.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 reveal-stagger">
                <!-- Register Complaint Card -->
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#123B2D]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#123B2D] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="message-square-warning"
                            class="w-8 h-8 text-[#123B2D] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Register Complaint</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Submit your complaints regarding human rights violations for prompt investigation and resolution.</p>
                    <a href="{{ route('complaint_cell') }}"
                        class="inline-flex items-center gap-2 mt-6 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Learn More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <!-- Register NGO Card -->
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#02B1EB]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#02B1EB] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="clipboard-check"
                            class="w-8 h-8 text-[#02B1EB] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Register NGO</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Register your non-governmental organization under the KP NGOs Registration Rules, 2024.</p>
                    <a href="{{ route('registration_form_part1') }}"
                        class="inline-flex items-center gap-2 mt-6 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Learn More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <!-- Treaty Implementation Cell Card -->
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#123B2D]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#123B2D] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="handshake"
                            class="w-8 h-8 text-[#123B2D] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Treaty Implementation Cell</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Overseeing provincial compliance with international human rights treaties and conventions.</p>
                    <a href="{{ route('whatwedo') }}"
                        class="inline-flex items-center gap-2 mt-6 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Learn More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <!-- Workshop / Seminar / Trainings Card -->
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#02B1EB]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#02B1EB] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="presentation"
                            class="w-8 h-8 text-[#02B1EB] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Workshop / Seminar / Trainings</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Capacity building programs, awareness sessions, and professional development trainings.</p>
                    <a href="{{ route('mediacorner') }}"
                        class="inline-flex items-center gap-2 mt-6 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Learn More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <!-- Publications Card -->
                <div
                    class="bg-white border border-slate-200 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#123B2D]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#123B2D] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="book-open"
                            class="w-8 h-8 text-[#123B2D] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Publications</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Access official publications, reports, and research documents on human rights and governance.</p>
                    <a href="{{ route('publications') }}"
                        class="inline-flex items-center gap-2 mt-6 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Learn More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- OFFICIAL MESSAGES SECTION -->
    <section class="bg-slate-50 py-16 reveal-on-scroll">
        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="text-center mb-12">
                <h2 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">Official
                    <span class="text-[#02B1EB]">Messages</span>
                </h2>
                <p class="text-slate-500 mt-3 max-w-xl mx-auto text-sm">Messages from the distinguished leadership of
                    Law & Human Rights.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 reveal-stagger">
                @foreach($officialMessages as $message)
                <!-- {{ $message->name }} -->
                <div
                    class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden group hover:shadow-xl transition-all duration-500">
                    <div class="bg-[#123B2D] h-24 relative">
                        <div class="absolute -bottom-12 left-1/2 -translate-x-1/2">
                            <img src="{{ asset('storage/'. $message->image_path) }}" alt="{{ $message->name }}"
                                class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg {{ $message->image_path === 'images/logo.jpg' ? 'p-2 bg-white' : '' }}" />
                        </div>
                    </div>
                    <div class="pt-16 pb-8 px-6 text-center">
                        <h4 class="font-outfit text-xl font-bold text-slate-900">{{ $message->name }}</h4>
                        <p class="text-[11px] font-bold text-[#02B1EB] uppercase tracking-[0.15em] mt-1 mb-4">{{ $message->position }}</p>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">
                            {{ Str::limit($message->statement, 120) }}
                        </p>
                        <a href="javascript:openModal({{ $message->id }});"
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#123B2D] text-white text-[10px] font-bold uppercase tracking-widest hover:bg-[#02B1EB] transition-all rounded-lg group/btn">
                            Read More <i data-lucide="arrow-right"
                                class="w-3 h-3 group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </section>


    <!-- LATEST NEWS SECTION  -->
    <section class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10 py-16 reveal-on-scroll">
        <div class="text-center mb-12">
            <h2 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">Latest <span
                    class="text-[#02B1EB]">News</span></h2>
            <p class="text-slate-500 mt-3 max-w-xl mx-auto text-sm">Stay updated with the most recent news and
                announcements from the Directorate.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">
            @foreach($latestNews as $news)
            <!-- News Card -->
            <div
                class="bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group hover:-translate-y-1">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}"
                        class="w-full h-52 object-cover transition-transform duration-700 group-hover:scale-105" />
                    @if($news->is_featured)
                    <div class="absolute top-4 left-4">
                        <span
                            class="px-3 py-1.5 bg-[#123B2D] text-white text-[9px] font-black uppercase tracking-widest rounded-md">Featured</span>
                    </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-[#02B1EB] mb-3">
                        <i data-lucide="calendar" class="w-4 h-4"></i>
                        <span class="text-xs font-bold uppercase tracking-wider">{{ $news->published_date->format('F d, Y') }}</span>
                    </div>
                    <h3
                        class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3 group-hover:text-[#123B2D] transition-colors leading-tight">
                        {{ $news->title }}
                    </h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-4 line-clamp-3">
                        {{ $news->excerpt }}
                    </p>
                    <a href="{{ route('news_details', $news->id) }}"
                        class="inline-flex items-center gap-2 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Read More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('mediacorner') }}"
                class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#123B2D] text-white font-bold uppercase tracking-widest text-xs hover:bg-[#02B1EB] transition-all rounded-xl shadow-lg group/btn">
                View All News <i data-lucide="arrow-right"
                    class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform"></i>
            </a>
        </div>
        </section>

    <!-- STATISTICS COUNTER SECTION -->
    <section class="bg-[#123B2D] py-20 reveal-on-scroll mb-12" id="statsSection">
        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="text-center mb-12">
                <h2 class="font-outfit text-3xl md:text-4xl font-black text-white uppercase tracking-tight">Directorate General
                    <span class="text-[#02B1EB]"> at a Glance</span>
                </h2>
                <p class="text-white/70 mt-3 max-w-2xl mx-auto text-sm">Key performance indicators reflecting the impact and reach of the Directorate General of Law & Human Rights, Khyber Pakhtunkhwa.</p>
            </div>
            <div class="flex flex-row items-start justify-center gap-6 md:gap-8 lg:gap-12">
                <div class="flex-1 text-center stat-item min-w-0">
                    <div class="stat-number text-3xl md:text-5xl lg:text-7xl font-black text-white font-outfit leading-none mb-3" data-target="{{ $statsComplaintsTotal }}">0</div>
                    <div class="text-white/70 text-[10px] md:text-xs lg:text-sm uppercase tracking-widest font-semibold">Complaints Received</div>
                </div>
                <div class="flex-1 text-center stat-item min-w-0">
                    <div class="stat-number text-3xl md:text-5xl lg:text-7xl font-black text-white font-outfit leading-none mb-3" data-target="{{ $statsComplaintsResolved }}">0</div>
                    <div class="text-white/70 text-[10px] md:text-xs lg:text-sm uppercase tracking-widest font-semibold">Complaints Resolved</div>
                </div>
                <div class="flex-1 text-center stat-item min-w-0">
                    <div class="stat-number text-3xl md:text-5xl lg:text-7xl font-black text-white font-outfit leading-none mb-3" data-target="{{ $statsNgosRegistered }}">0</div>
                    <div class="text-white/70 text-[10px] md:text-xs lg:text-sm uppercase tracking-widest font-semibold">NGOs Registered</div>
                </div>
                <div class="flex-1 text-center stat-item min-w-0">
                    <div class="stat-number text-3xl md:text-5xl lg:text-7xl font-black text-white font-outfit leading-none mb-3" data-target="{{ $statsTrainings }}">0</div>
                    <div class="text-white/70 text-[10px] md:text-xs lg:text-sm uppercase tracking-widest font-semibold">Trainings &amp; Workshops</div>
                </div>
                <div class="flex-1 text-center stat-item min-w-0">
                    <div class="stat-number text-3xl md:text-5xl lg:text-7xl font-black text-white font-outfit leading-none mb-3" data-target="{{ $statsAwareness }}">0</div>
                    <div class="text-white/70 text-[10px] md:text-xs lg:text-sm uppercase tracking-widest font-semibold">HR Awareness Sessions</div>
                </div>
                <div class="flex-1 text-center stat-item min-w-0">
                    <div class="stat-number text-3xl md:text-5xl lg:text-7xl font-black text-white font-outfit leading-none mb-3" data-target="{{ $statsResearch }}">0</div>
                    <div class="text-white/70 text-[10px] md:text-xs lg:text-sm uppercase tracking-widest font-semibold">Research &amp; Reporting</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Downloads, Tenders, & Causes Section -->
    <section class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10 pb-24 reveal-on-scroll">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 reveal-stagger">

            <!-- Column 1: Downloads -->
            <div class="group flex flex-col h-[520px]">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-[#02B1EB]/10 flex items-center justify-center text-[#02B1EB]">
                            <i data-lucide="file-text" class="w-5 h-5"></i>
                        </div>
                        <h2 class="font-outfit text-xl font-black text-slate-800 uppercase tracking-tight">Downloads
                        </h2>
                    </div>
                    <a href="{{ route('publications') }}"
                        class="text-[10px] font-bold text-secondary hover:text-primary uppercase tracking-widest flex items-center gap-1 transition-colors">
                        View All <i data-lucide="arrow-right" class="w-3 h-3"></i>
                    </a>
                </div>

                <div
                    class="bg-gradient-to-b from-[#02B1EB]/10  border-x border-b border-slate-100 rounded-2xl shadow-sm group-hover:shadow-xl transition-all duration-500 flex-1 overflow-hidden relative min-h-[420px] max-h-[420px]">
                    <div class="h-full overflow-y-auto p-6 scrollbar-thin">
                        @forelse($publications as $publication)
                        <!-- Publication Item -->
                        <div
                            class="p-4 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition-all duration-300 mb-4 group/item">
                        <h4
                            class="text-sm font-bold text-primary leading-snug mb-4 group-hover/item:text-secondary transition-colors">
                            {{ $publication->title }}</h4>
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-medium text-slate-400 capitalize">{{ $publication->file_type }} • {{ $publication->file_size }}</span>
                                <a href="{{ route('publications.download', $publication->id) }}"
                                    class="inline-flex items-center gap-2 px-5 py-2 border-2 border-secondary text-secondary text-[10px] font-bold uppercase tracking-widest hover:bg-secondary hover:text-primary transition-all rounded-lg">
                                    <i data-lucide="download" class="w-3 h-3"></i>
                                    Download
                                </a>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <i data-lucide="file-x" class="w-8 h-8 text-slate-300 mx-auto mb-2"></i>
                            <p class="text-xs text-slate-500">No publications available</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Column 2: Tenders -->
            <div class="group flex flex-col h-[520px]">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-[#02B1EB]/10 flex items-center justify-center text-[#02B1EB]">
                            <i data-lucide="gavel" class="w-5 h-5"></i>
                        </div>
                        <h2 class="font-outfit text-xl font-black text-slate-800 uppercase tracking-tight">Tenders</h2>
                    </div>
                    <a href="{{ route('tenders') }}"
                        class="text-[10px] font-bold text-secondary hover:text-primary uppercase tracking-widest flex items-center gap-1 transition-colors">
                        View All <i data-lucide="arrow-right" class="w-3 h-3"></i>
                    </a>
                </div>

                <div
                    class="bg-gradient-to-b from-[#123B2D]/10  border-x border-b border-slate-100 rounded-2xl shadow-sm group-hover:shadow-xl transition-all duration-500 flex-1 overflow-hidden relative min-h-[420px] max-h-[420px]">
                    <div class="h-full overflow-y-auto p-6 scrollbar-thin">
                        @forelse($latestTenders as $tender)
                            <div
                                class="p-5 rounded-xl border border-slate-50 hover:border-[#f1b42f]/30 hover:bg-[#f1b42f]/5 transition-all duration-300 mb-4 group/item">
                                <div class="flex items-center justify-between mb-3">
                                    <span
                                        class="px-2.5 py-1 rounded-full bg-[#f1b42f]/10 text-[#f1b42f] text-[9px] font-black uppercase tracking-widest">
                                        {{ strtoupper($tender->status) }}
                                    </span>
                                    <div class="flex items-center gap-1.5 text-slate-400">
                                        <i data-lucide="calendar" class="w-3 h-3"></i>
                                        <span class="text-[10px] font-bold">
                                            Closing: {{ optional($tender->closing_date)->format('M d') ?? '—' }}
                                        </span>
                                    </div>
                                </div>
                                <h4
                                    class="text-sm font-bold text-slate-700 leading-snug mb-5 group-hover/item:text-slate-900 transition-colors">
                                    {{ $tender->title }}
                                </h4>
                                <a href="{{ route('tenders') }}"
                                    class="inline-flex items-center gap-2 px-5 py-2 border-2 border-secondary text-secondary text-[10px] font-bold uppercase tracking-widest hover:bg-secondary hover:text-primary transition-all rounded-lg">
                                    View Details
                                </a>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <i data-lucide="file-x" class="w-8 h-8 text-slate-300 mx-auto mb-2"></i>
                                <p class="text-xs text-slate-500">No tenders available</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Column 3: Causes -->
            <div class="group flex flex-col h-[520px]">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-[#02B1EB]/10 flex items-center justify-center text-[#02B1EB]">
                            <i data-lucide="heart" class="w-5 h-5"></i>
                        </div>
                        <h2 class="font-outfit text-xl font-black text-slate-800 uppercase tracking-tight">Causes
                        </h2>
                    </div>
                    <a href="{{ route('causes') }}"
                        class="text-[10px] font-bold uppercase tracking-widest flex items-center gap-1 text-secondary transition-colors">
                        View All <i data-lucide="arrow-right" class="w-3 h-3"></i>
                    </a>
                </div>

                <div
                    class="bg-gradient-to-b from-[#02B1EB]/5  border-x border-b border-slate-100 rounded-2xl shadow-sm group-hover:shadow-xl transition-all duration-500 flex-1 overflow-hidden relative min-h-[420px] max-h-[420px]">
                    <div class="h-full overflow-y-auto p-6 scrollbar-thin">
                        @forelse($latestCauses as $cause)
                            <div
                                class="p-5 rounded-xl bg-slate-50/50 hover:bg-white border border-transparent hover:border-slate-100 hover:shadow-lg transition-all duration-300 mb-4 group/item">
                                <h4
                                    class="text-sm font-bold text-slate-700 leading-snug group-hover/item:text-primary transition-colors">
                                    {{ $cause->title }}
                                </h4>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <i data-lucide="file-x" class="w-8 h-8 text-slate-300 mx-auto mb-2"></i>
                                <p class="text-xs text-slate-500">No causes available</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
        </section>

    <!-- OUR PARTNERS SECTION -->
<section class="bg-white pt-3 pb-10 reveal-on-scroll">
    <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">
        <!-- heading & subheading -->
        <div class="text-center mb-12">
            <h2 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">
                Our
                <span class="text-[#02B1EB]">Partners</span>
            </h2>
            <p class="text-slate-500 mt-3 max-w-2xl mx-auto text-sm">
                Organizations collaborating with the Directorate General of Law & Human Rights, Khyber Pakhtunkhwa.
            </p>
        </div>

    <!-- partners marquee -->
    @if($partners->count())
        <div class="marquee-wrapper overflow-hidden">
            <div class="marquee-track flex items-center gap-10 md:gap-16">
                @foreach($partners as $partner)
                    <a href="{{ $partner->url ?: '#' }}"
                       target="{{ $partner->url ? '_blank' : '_self' }}"
                       class="group block shrink-0 transition-all duration-300"
                       title="{{ $partner->name }}">
                        <div class="bg-white/80 rounded-full w-32 h-32 md:w-48 md:h-48 shadow-sm hover:shadow-lg transition-shadow duration-300 flex items-center justify-center border-2 border-slate-100/80 p-2 overflow-hidden">
                            <img src="{{ asset('storage/' . $partner->logo_path) }}"
                                 alt="{{ $partner->name }}"
                                 class="w-full h-full object-cover rounded-full">
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-slate-400 text-sm text-center">No partners added yet.</p>
    @endif
    </div>
</section>

<style>
.marquee-wrapper {
    mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
    -webkit-mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
}
.marquee-track {
    animation: marqueeScroll 40s linear infinite;
    width: fit-content;
}
.marquee-track:hover {
    animation-play-state: paused;
}
@keyframes marqueeScroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
</style>


    <!-- Official Messages Modal -->
    <div id="officialMessageModal" class="fixed inset-0 z-[200] hidden items-center justify-center bg-slate-900/60 backdrop-blur-sm opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-2xl w-[90%] max-w-2xl max-h-[90vh] overflow-y-auto p-8 relative transform scale-95 transition-transform duration-300">
            <button onclick="closeModal('officialMessageModal')" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 transition-colors p-2 rounded-lg hover:bg-red-50"><i data-lucide="x" class="w-6 h-6"></i></button>
            <div id="modalContent">
                <!-- Content will be populated dynamically -->
            </div>
        </div>
    </div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const statNumbers = document.querySelectorAll('.stat-number');
    if (!statNumbers.length) return;
    const targets = [];
    statNumbers.forEach(function (el) { targets.push(parseInt(el.getAttribute('data-target'))); });
    const section = document.getElementById('statsSection');
    if (!section) return;
    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                statNumbers.forEach(function (el, i) {
                    const target = targets[i];
                    el.textContent = '0';
                    if (target === 0) return;
                    const duration = 800;
                    const start = performance.now();
                    function update(now) {
                        var progress = Math.min((now - start) / duration, 1);
                        el.textContent = Math.floor((1 - Math.pow(1 - progress, 3)) * target);
                        if (progress < 1) requestAnimationFrame(update);
                        else el.textContent = target;
                    }
                    requestAnimationFrame(update);
                });
            } else {
                statNumbers.forEach(function (el) { el.textContent = '0'; });
            }
        });
    }, { threshold: 0.3 });
    observer.observe(section);
});
</script>
@endpush

</x-layout>
