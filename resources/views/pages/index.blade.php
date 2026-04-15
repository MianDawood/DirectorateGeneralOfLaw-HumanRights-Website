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
                <img src="${message.image_path ? '/storage/' + message.image_path : '/images/logo.jpg'}"
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
                        <a href="{{ route('tenders') }}""
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

    <!-- KEY SERVICES SECTION  -->
    <section class="bg-white py-16 reveal-on-scroll">
        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="text-center mb-12">
                <h2 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">Key
                    <span class="text-[#02B1EB]">Services</span>
                </h2>
                <p class="text-slate-500 mt-3 max-w-xl mx-auto text-sm">Access our primary services and resources for
                    citizens and organizations.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">
                <!-- Complaints Card -->
                <div
                    class="bg-white border border-slate-100 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#123B2D]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#123B2D] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="message-square-warning"
                            class="w-8 h-8 text-[#123B2D] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Complaint
                        Cell</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Submit your complaints regarding human rights
                        violations for prompt investigation and resolution.</p>
                    <a href="{{ route('complaint_cell') }}"
                        class="inline-flex items-center gap-2 mt-6 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Learn More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <!-- Publications Card -->
                <div
                    class="bg-white border border-slate-100 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#02B1EB]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#02B1EB] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="book-open"
                            class="w-8 h-8 text-[#02B1EB] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Publications
                    </h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Access official publications, reports, and
                        research documents on human rights and governance.</p>
                    <a href="{{ route('publications') }}"
                        class="inline-flex items-center gap-2 mt-6 text-[#02B1EB] text-xs font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors group/link">
                        Learn More <i data-lucide="arrow-right"
                            class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <!-- Tenders Card -->
                <div
                    class="bg-white border border-slate-100 rounded-2xl p-8 text-center group hover:shadow-xl hover:border-[#02B1EB]/30 hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div
                        class="w-16 h-16 bg-[#123B2D]/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-[#123B2D] group-hover:scale-110 transition-all duration-500">
                        <i data-lucide="gavel"
                            class="w-8 h-8 text-[#123B2D] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-outfit text-lg font-bold text-slate-900 uppercase tracking-tight mb-3">Tenders</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">View current and past tenders, procurement
                        notices, and opportunities for service providers.</p>
                    <a href="{{ route('tenders') }}"
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
                            <img src="{{ asset('storage/' . $message->image_path) }}" alt="{{ $message->name }}"
                                class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg {{ $message->image_path === 'images/logo.jpg' ? 'p-2 bg-white' : '' }}" />
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
                        class="text-[10px] font-bold text-[#02B1EB] hover:text-[#123B2D] uppercase tracking-widest flex items-center gap-1 transition-colors">
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
                                class="text-sm font-bold text-slate-700 leading-snug mb-4 group-hover/item:text-secondary transition-colors">
                                {{ $publication->title }}</h4>
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-medium text-slate-400 capitalize">{{ $publication->file_type }} • {{ $publication->file_size }}</span>
                                <a href="{{ route('publications.download', $publication->id) }}"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-secondary text-white text-[10px] font-bold uppercase tracking-widest hover:bg-primary transition-all rounded-lg shadow-md hover:shadow-primary/20">
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
                            class="w-10 h-10 rounded-xl bg-[#123B2D]/10 flex items-center justify-center text-[#123B2D]">
                            <i data-lucide="gavel" class="w-5 h-5"></i>
                        </div>
                        <h2 class="font-outfit text-xl font-black text-slate-800 uppercase tracking-tight">Tenders</h2>
                    </div>
                    <a href="{{ route('tenders') }}"
                        class="text-[10px] font-bold text-[#123B2D] hover:text-[#02B1EB] uppercase tracking-widest flex items-center gap-1 transition-colors">
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
                                    class="inline-flex items-center gap-2 px-5 py-2 border-2 border-[#f1b42f] text-[#f1b42f] text-[10px] font-bold uppercase tracking-widest hover:bg-[#f1b42f] hover:text-white transition-all rounded-lg">
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
                        class="text-[10px] font-bold text-[#02B1EB] hover:text-[#123B2D] uppercase tracking-widest flex items-center gap-1 transition-colors">
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
    <!-- Official Messages Modal -->
    <div id="officialMessageModal" class="fixed inset-0 z-[200] hidden items-center justify-center bg-slate-900/60 backdrop-blur-sm opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-2xl w-[90%] max-w-2xl max-h-[90vh] overflow-y-auto p-8 relative transform scale-95 transition-transform duration-300">
            <button onclick="closeModal('officialMessageModal')" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 transition-colors p-2 rounded-lg hover:bg-red-50"><i data-lucide="x" class="w-6 h-6"></i></button>
            <div id="modalContent">
                <!-- Content will be populated dynamically -->
            </div>
        </div>
    </div>

</x-layout>
