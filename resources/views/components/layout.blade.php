@props(['title' => 'Directorate of Human Rights | Khyber Pakhtunkhwa'])
<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $title }}</title>
    @stack('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Fonts: Outfit & Inter -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- Lucide Icons -->
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.473.0/dist/umd/lucide.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .font-outfit {
            font-family: 'Outfit', sans-serif;
        }

        .search-container:focus-within {
            border-color: #1e293b;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            transform: translateY(-1px);
        }

        .transition-all-custom {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes ticker {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-ticker {
            animation: ticker 40s linear infinite;
        }

        @media (max-width: 768px) {
            .animate-ticker {
                animation: ticker 5s linear infinite;
            }
        }

        .animate-ticker:hover {
            animation-play-state: paused;
        }

        /* Hero Text Animations */
        .slide .hero-content {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            transition-delay: 0.3s;
        }

        .slide.opacity-100 .hero-content {
            opacity: 1;
            transform: translateY(0);
        }

        /* Scroll Reveal Animation */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(40px);
            transition: all 1.2s cubic-bezier(0.22, 1, 0.36, 1);
            will-change: transform, opacity;
        }

        .reveal-on-scroll.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* Staggered Reveal Logic */
        .reveal-stagger>* {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
            will-change: transform, opacity;
        }

        .reveal-stagger.revealed>* {
            opacity: 1;
            transform: translateY(0);
        }

        /* Ticker Masking */
        .ticker-mask {
            mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);
        }

        /* Live Pulse Dot */
        .pulse-dot {
            display: inline-block;
            width: 6px;
            height: 6px;
            background-color: #ef4444;
            border-radius: 50%;
            margin-right: 8px;
            box-shadow: 0 0 0 rgba(239, 68, 68, 0.4);
            animation: pulse-red 2s infinite;
        }

        @keyframes pulse-red {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 6px rgba(239, 68, 68, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0);
            }
        }
    </style>
</head>

<body class="antialiased bg-slate-50/50 overflow-x-hidden">
    <!-- Professional Two-Tier Clean Header -->
    <!-- Tier 1: Top Utility Bar (Non-Sticky Desktop Only) -->
    <div class="hidden lg:block bg-[#123B2D] py-2 px-6 relative z-[110]">
        <div class="max-w-[1536px] mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <div
                    class="flex items-center space-x-2 text-white/80 hover:text-white cursor-pointer transition-all-custom group">
                    <i data-lucide="globe"
                        class="w-4 h-4 text-white/60 group-hover:text-[#02B1EB] transition-colors"></i>
                    <span class="text-[11px] font-bold uppercase tracking-[0.1em]">English</span>
                    <i data-lucide="chevron-down" class="w-3 h-3"></i>
                </div>
            </div>
            <div class="flex items-center gap-10">
                <div class="flex items-center gap-8">
                    <a href="mailto:dhr.kpk@gmail.com"
                        class="flex items-center gap-2.5 text-white/80 hover:text-white transition-all-custom text-[11px] font-bold uppercase tracking-tight group">
                        <i data-lucide="mail" class="w-4 h-4 text-[#02B1EB] opacity-80"></i>
                        <span>dhr.kpk@gmail.com</span>
                    </a>
                    <div class="flex items-center gap-2.5 text-white/80 text-[11px] font-bold uppercase tracking-tight">
                        <i data-lucide="phone" class="w-4 h-4 text-[#02B1EB] opacity-80"></i>
                        <span>091-9217202</span>
                    </div>
                </div>
                <div class="flex items-center gap-4 border-l border-white/20 pl-10">
                    <a href="{{ route('contact_us') }}" class="text-white/60 hover:text-[#02B1EB] transition-all-custom"><i
                            data-lucide="share-2" class="w-4 h-4"></i></a>
                    <a href="#" class="text-white/60 hover:text-[#02B1EB] transition-all-custom"><i
                            data-lucide="message-circle" class="w-4 h-4"></i></a>
                </div>
            </div>
        </div>
    </div>

    <header id="mainHeader"
        class="w-full z-[100] sticky top-0 bg-white border-b border-slate-100 transition-transform duration-500 ease-in-out">
        <!-- Tier 2: Main Header (Responsive) -->
        <div class="py-3 px-6 lg:px-8 bg-white border-b border-slate-100 lg:border-none">
            <div class="max-w-[1536px] mx-auto flex justify-between items-center">
                <!-- Brand: Logo & Title (Unified Professional Layout) -->
                <div class="flex items-center gap-4 lg:gap-6 group cursor-pointer transition-all-custom">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Directorate Logo"
                        class="h-14 md:h-18 lg:h-24 w-auto group-hover:scale-105 transition-transform duration-500" />
                    <div class="flex flex-col items-start">
                        <h1
                            class="font-outfit text-sm md:text-lg lg:text-[22px] font-extrabold text-[#123B2D] leading-tight uppercase tracking-tight">
                            Directorate General
                        </h1>
                        <h1
                            class="font-outfit text-sm md:text-lg lg:text-[22px] font-extrabold text-[#123B2D] leading-tight uppercase tracking-tight">
                            of Law &
                        </h1>
                        <h1
                            class="font-outfit text-sm md:text-lg lg:text-[22px] font-extrabold text-[#02B1EB] leading-tight uppercase tracking-tight">
                            Human Rights
                        </h1>
                        <p
                            class="font-outfit text-[9px] md:text-[10px] lg:text-[11px] font-bold text-slate-400 uppercase tracking-[0.3em] mt-1">
                            Khyber Pakhtunkhwa
                        </p>
                    </div>
                </div>

                <!-- Center: Campaign Highlights (Desktop) -->
                <div class="hidden xl:flex items-center gap-4" id="campaignHighlights">
                    <div class="flex items-center gap-3 overflow-hidden">
                        <div
                            class="campaign-badge flex items-center gap-2 px-4 py-2 bg-[#123B2D]/5 border border-[#123B2D]/10 rounded-lg hover:bg-[#123B2D]/10 transition-all cursor-pointer">
                            <i data-lucide="shield-check" class="w-4 h-4 text-[#123B2D]"></i>
                            <span
                                class="text-[10px] font-black uppercase tracking-wider text-[#123B2D] whitespace-nowrap">Marka-E-Haq</span>
                        </div>
                        <div
                            class="campaign-badge flex items-center gap-2 px-4 py-2 bg-[#02B1EB]/5 border border-[#02B1EB]/10 rounded-lg hover:bg-[#02B1EB]/10 transition-all cursor-pointer">
                            <i data-lucide="alert-triangle" class="w-4 h-4 text-[#02B1EB]"></i>
                            <span
                                class="text-[10px] font-black uppercase tracking-wider text-[#02B1EB] whitespace-nowrap">Anti-Corruption
                                Week</span>
                        </div>
                    </div>
                </div>

                <!-- Desktop Search Bar -->
                <div class="hidden lg:block w-[280px] xl:w-[300px]">
                    <div
                        class="search-container relative flex items-center bg-slate-50 border border-slate-200 rounded-xl overflow-hidden shadow-sm transition-all duration-300 focus-within:ring-2 focus-within:ring-[#02B1EB]/20">
                        <input type="text" placeholder="Search services..."
                            class="w-full pl-5 pr-12 py-3 text-sm text-slate-700 bg-transparent focus:outline-none" />
                        <button
                            class="absolute right-0 h-full w-11 bg-[#123B2D] flex items-center justify-center text-white hover:bg-[#02B1EB] transition-colors">
                            <i data-lucide="search" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu Trigger -->
                <button id="mobileMenuBtn"
                    class="lg:hidden p-2.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 hover:bg-[#123B2D] hover:text-white hover:border-[#123B2D] transition-all active:scale-95 shadow-sm">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>

        <!-- Tier 3: Navigation Bar (Desktop Only) -->
        <nav class="hidden lg:block bg-[#123B2D] relative shadow-lg">
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                <ul class="flex items-center justify-center gap-1">
                    <li><a href="{{ route('home') }}"
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('home') ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><i
                                data-lucide="home" class="w-4 h-4"></i><span>Home</span></a></li>
                    <li class="group relative">
                        <button
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('introduction', 'ourteam') ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>Who
                                We Are</span><i data-lucide="chevron-down"
                                class="w-3.5 h-3.5 opacity-60 group-hover:rotate-180 transition-transform duration-300"></i></button>
                        <div
                            class="absolute left-0 top-full w-64 bg-white shadow-2xl rounded-b-xl border border-slate-100 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-[110] p-2">
                            <div class="flex flex-col">
                                <a href="{{ route('introduction') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center justify-between group/item text-sm">Introduction<i
                                        data-lucide="chevron-right"
                                        class="w-3 h-3 opacity-0 group-hover/item:opacity-100 -translate-x-2 group-hover/item:translate-x-0 transition-all"></i></a>
                                <a href="{{ route('ourteam') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center justify-between group/item text-sm">Our
                                    Team<i data-lucide="chevron-right"
                                        class="w-3 h-3 opacity-0 group-hover/item:opacity-100 -translate-x-2 group-hover/item:translate-x-0 transition-all"></i></a>
                            </div>
                        </div>
                    </li>
                    <li><a href="{{ route('whatwedo') }}"
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('whatwedo') ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>What
                                We Do</span></a></li>
                    <li class="group relative">
                        <a href="{{ route('mediacorner') }}"
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('mediacorner', 'photogallery', 'videogallery') ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>Media
                                Corner</span><i data-lucide="chevron-down"
                                class="w-3.5 h-3.5 opacity-60 group-hover:rotate-180 transition-transform duration-300"></i></a>
                        <div
                            class="absolute left-0 top-full w-64 bg-white shadow-2xl rounded-b-xl border border-slate-100 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-[110] p-2">
                            <div class="flex flex-col">
                                <a href="{{ route('photogallery') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center gap-3 text-sm"><i
                                        data-lucide="image" class="w-4 h-4 text-[#123B2D]"></i>Photo Gallery</a>
                                <a href="{{ route('videogallery') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center gap-3 text-sm"><i
                                        data-lucide="video" class="w-4 h-4 text-[#123B2D]"></i>Video Gallery</a>
                            </div>
                        </div>
                    </li>
                    <!-- NGO Registration with Sub-Menu -->
                    <li class="group relative">
                        <a href="{{ route('ngo_required_documents') }}"
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('ngo_*', 'registration_form_*') ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>NGO
                                Registration</span><i data-lucide="chevron-down"
                                class="w-3.5 h-3.5 opacity-60 group-hover:rotate-180 transition-transform duration-300"></i></a>
                        <div
                            class="absolute left-0 top-full w-72 bg-white shadow-2xl rounded-b-xl border border-slate-100 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-[110] p-2">
                            <div class="flex flex-col">
                                <a href="{{ route('ngo_required_documents') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center gap-3 text-sm"><i
                                        data-lucide="file-check" class="w-4 h-4 text-[#02B1EB]"></i>Required
                                    Documents</a>
                                <a href="{{ route('ngo_guidelines') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center gap-3 text-sm"><i
                                        data-lucide="book-open" class="w-4 h-4 text-[#02B1EB]"></i>Registration
                                    Guidelines</a>
                                <a href="{{ route('ngo_directives') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center gap-3 text-sm"><i
                                        data-lucide="shield-alert" class="w-4 h-4 text-[#02B1EB]"></i>Mandatory
                                    Directives</a>
                                <a href="{{ route('ngo_notices') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center gap-3 text-sm"><i
                                        data-lucide="megaphone" class="w-4 h-4 text-[#02B1EB]"></i>Latest Notice
                                    Board</a>
                                <a href="{{ route('registration_form_part1') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center gap-3 text-sm"><i
                                        data-lucide="globe" class="w-4 h-4 text-[#02B1EB]"></i>Online Registration</a>
                                <a href="{{ route('ngo_registered') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center gap-3 text-sm"><i
                                        data-lucide="check-circle" class="w-4 h-4 text-[#02B1EB]"></i>Registered
                                    NGOs</a>
                                <a href="{{ route('ngo_suspended') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center gap-3 text-sm"><i
                                        data-lucide="x-circle" class="w-4 h-4 text-[#02B1EB]"></i>Suspended NGOs</a>
                            </div>
                        </div>
                    </li>
                    <li><a href="{{ route('resources') }}"
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('resources') ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>Resources</span></a>
                    </li>
                    
                    <!-- Dynamic Pages -->
                    @php
                        $dynamicPages = \App\Models\Page::published()
                            ->inNavigation()
                            ->ordered()
                            ->get();
                    @endphp
                    @if($dynamicPages->count() > 0)
                        @foreach($dynamicPages as $dynamicPage)
                            <li><a href="{{ route('page.show', $dynamicPage->slug) }}"
                                    class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('page.show') && request()->route('slug') === $dynamicPage->slug ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>{{ $dynamicPage->title }}</span></a></li>
                        @endforeach
                    @endif
                    
                    <li><a href="{{ route('contact_us') }}"
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('contact_us') ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>Contact Us</span></a></li>
                </ul>
            </div>
        </nav>

        <!-- Mobile Side Menu Overlay -->
        <div id="mobileMenuOverlay"
            class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[150] opacity-0 invisible transition-all duration-500">
        </div>

        <!-- Mobile Side Menu Content -->
        <div id="mobileMenuContent"
            class="fixed top-0 right-0 h-full w-[85%] md:w-[400px] bg-white z-[160] translate-x-full transition-transform duration-500 ease-out shadow-2xl flex flex-col">
            <!-- Header -->
            <div class="flex items-center justify-between p-6 border-b border-slate-100">
                <img src="{{ asset('images/logo.jpg') }}" class="h-10 w-auto" alt="Logo">
                <button id="closeMobileMenu"
                    class="p-2 rounded-lg bg-slate-50 text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all active:scale-90">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>

            <!-- Scrollable Body -->
            <div class="flex-1 overflow-y-auto p-6 scrollbar-none space-y-8">
                <!-- Mobile Search -->
                <div class="relative">
                    <input type="text" placeholder="Search..."
                        class="w-full pl-5 pr-12 py-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-primary/20">
                    <i data-lucide="search"
                        class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                </div>

                <!-- Navigation Links -->
                <div class="space-y-2">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 px-2">Navigation</p>
                    <nav class="space-y-1">
                        <a href="{{ route('home') }}"
                            class="flex items-center gap-3 p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('home') ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                            <i data-lucide="home" class="w-5 h-5"></i> Home
                        </a>

                        <!-- Dropdown Item (Accordion) -->
                        <div class="mobile-dropdown group">
                            <button
                                class="flex items-center justify-between w-full p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('introduction', 'ourteam') ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">

                            <div
                                class="hidden space-y-1 mt-1 ml-11 overflow-hidden transition-all duration-300 dropdown-content">
                                <a href="{{ route('introduction') }}"
                                    class="block p-2 text-sm text-slate-500 hover:text-primary transition-colors italic">Introduction</a>
                                <a href="{{ route('ourteam') }}"
                                    class="block p-2 text-sm text-slate-500 hover:text-primary transition-colors italic">Our
                                    Team</a>
                            </div>
                        </div>

                        <a href="{{ route('whatwedo') }}"
                            class="flex items-center gap-3 p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('whatwedo') ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                            <i data-lucide="briefcase" class="w-5 h-5"></i> What We Do
                        </a>

                        <div class="mobile-dropdown group">
                            <div
                                class="flex items-center justify-between w-full p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('mediacorner', 'photogallery', 'videogallery') ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                                <a href="{{ route('mediacorner') }}" class="flex items-center gap-3 flex-1">
                                    <i data-lucide="layers" class="w-5 h-5"></i> Media Corner
                                </a>
                                <button class="p-2 dropdown-trigger">
                                    <i data-lucide="chevron-down"
                                        class="w-4 h-4 transition-transform duration-300 dropdown-icon"></i>
                                </button>
                            </div>
                            <div class="hidden space-y-1 mt-1 ml-11 dropdown-content">
                                <a href="{{ route('mediacorner') }}" class="block p-2 text-sm text-slate-500 italic">News &
                                    Events</a>
                                <a href="{{ route('photogallery') }}" class="block p-2 text-sm text-slate-500 italic">Photo
                                    Gallery</a>
                                <a href="{{ route('videogallery') }}" class="block p-2 text-sm text-slate-500 italic">Video
                                    Gallery</a>
                            </div>
                        </div>

                        <div class="mobile-dropdown group">
                            <div
                                class="flex items-center justify-between w-full p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('mediacorner', 'photogallery', 'videogallery') ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                                <a href="{{ route('ngo_required_documents') }}" class="flex items-center gap-3 flex-1">
                                    <i data-lucide="file-check" class="w-5 h-5"></i> NGOs Registration
                                </a>
                                <button class="p-2 dropdown-trigger">
                                    <i data-lucide="chevron-down"
                                        class="w-4 h-4 transition-transform duration-300 dropdown-icon"></i>
                                </button>
                            </div>
                            <div class="hidden space-y-1 mt-1 ml-11 dropdown-content">
                                <a href="{{ route('ngo_required_documents') }}"
                                    class="block p-2 text-sm text-slate-500 italic">Required Documents</a>
                                <a href="{{ route('ngo_guidelines') }}"
                                    class="block p-2 text-sm text-slate-500 italic">Registration Guidelines</a>
                                <a href="{{ route('ngo_directives') }}" class="block p-2 text-sm text-slate-500 italic">Mandatory
                                    Directives</a>
                                <a href="{{ route('ngo_notices') }}" class="block p-2 text-sm text-slate-500 italic">Latest Notice
                                    Board</a>
                                <a href="{{ route('registration_form_part1') }}"
                                    class="block p-2 text-sm text-slate-500 italic">Online Registration</a>
                                <a href="{{ route('ngo_registered') }}" class="block p-2 text-sm text-slate-500 italic">Registered
                                    NGOs</a>
                                <a href="{{ route('ngo_suspended') }}" class="block p-2 text-sm text-slate-500 italic">Suspended
                                    NGOs</a>
                            </div>
                        </div>
                        <a href="{{ route('resources') }}"
                            class="flex items-center gap-3 p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('resources') ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                            <i data-lucide="book-open" class="w-5 h-5"></i> Resources
                        </a>
                        
                        <!-- Dynamic Pages in Mobile Menu -->
                        @if($dynamicPages->count() > 0)
                            @foreach($dynamicPages as $dynamicPage)
                                <a href="{{ route('page.show', $dynamicPage->slug) }}"
                                    class="flex items-center gap-3 p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('page.show') && request()->route('slug') === $dynamicPage->slug ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                                    <i data-lucide="file-text" class="w-5 h-5"></i> {{ $dynamicPage->title }}
                                </a>
                            @endforeach
                        @endif
                        
                        <a href="{{ route('contact_us') }}"
                            class="flex items-center gap-3 p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('contact_us') ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                            <i data-lucide="phone-call" class="w-5 h-5"></i> Contact Us
                        </a>
                    </nav>
                </div>

                <!-- Mobile Info Section (Tier 1 Data) -->
                <div class="p-6 bg-slate-50 rounded-2xl space-y-6">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Emergency & Contact</p>
                    <div class="space-y-4">
                        <a href="mailto:dhr.kpk@gmail.com" class="flex items-center gap-3 text-slate-600 group">
                            <div
                                class="w-9 h-9 rounded-xl bg-white flex items-center justify-center text-primary shadow-sm border border-slate-100 group-hover:bg-primary group-hover:text-white transition-all">
                                <i data-lucide="mail" class="w-4 h-4"></i>
                            </div>
                            <span class="text-sm font-bold">dhr.kpk@gmail.com</span>
                        </a>
                        <div class="flex items-center gap-3 text-slate-600 group">
                            <div
                                class="w-9 h-9 rounded-xl bg-white flex items-center justify-center text-primary shadow-sm border border-slate-100">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                            </div>
                            <span class="text-sm font-bold">091-9217202</span>
                        </div>
                    </div>

                    <!-- Socials in Mobile Menu -->
                    <div class="flex items-center gap-3 pt-2">
                        <a href="#"
                            class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-slate-400 hover:text-[#1877F2] hover:bg-blue-50 transition-all border border-slate-100">
                            <i data-lucide="share-2" class="w-5 h-5"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-slate-400 hover:text-[#1DA1F2] hover:bg-blue-50 transition-all border border-slate-100">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Badge -->
            <div class="p-6 border-t border-slate-100">
                <p class="text-[10px] text-slate-400 font-bold uppercase text-center tracking-widest">Powered by KP
                    Government</p>
            </div>
        </div>


        <!-- HERO SECTION -->



        <!--  4: Latest News Ticker -->
        <div class="bg-[#123B2D] flex items-center overflow-hidden h-10">
            <div class="bg-[#02B1EB] px-6 h-full flex items-center shrink-0 z-10">
                <span
                    class="flex items-center text-[10px] font-black uppercase tracking-widest text-white whitespace-nowrap">
                    <span class="pulse-dot"></span>
                    Latest News
                </span>
            </div>
            <div class="flex-1 overflow-hidden h-full ticker-mask">
                <div class="animate-ticker whitespace-nowrap h-full flex items-center gap-10">
                    @php
                        $tickerNews = App\Models\News::active()->latest()->take(3)->get();
                    @endphp
                    @foreach($tickerNews as $item)
                    <a href="{{ route('news_details', $item->id) }}" class="text-xs font-bold text-white/90 hover:text-[#02B1EB] uppercase tracking-wider">{{ Str::limit($item->title, 60) }}</a>
                    @endforeach
                    @if($tickerNews->count() < 3)
                    <a href="{{ route('mediacorner') }}" class="text-xs font-bold text-white/90 hover:text-[#02B1EB] uppercase tracking-wider">VIEW ALL NEWS</a>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-2 px-4 border-l border-white/20 text-white/60">
                <button class="hover:text-[#02B1EB] transition-colors"><i data-lucide="chevron-left"
                        class="w-4 h-4"></i></button>
                <button class="hover:text-[#02B1EB] transition-colors"><i data-lucide="pause"
                        class="w-3 h-3"></i></button>
                <button class="hover:text-[#02B1EB] transition-colors"><i data-lucide="chevron-right"
                        class="w-4 h-4"></i></button>
            </div>
        </div>
    </header>
    <main>
        {{ $slot }}
    </main>
<!-- Footer start here -->

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
    <footer class="bg-[#0a1f17] text-slate-300 pt-20 relative overflow-hidden reveal-on-scroll">
        <!-- Decoration Pattern -->
        <div
            class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl">
        </div>

        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10 pb-16 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-16">

                <!-- Column 1: Find Us -->
                <div>
                    <h3
                        class="font-outfit text-lg font-bold text-white uppercase tracking-wider mb-8 flex items-center gap-2">
                        Find Us
                    </h3>
                    <div class="relative group">
                        <div class="overflow-hidden rounded-2xl border border-slate-800 shadow-2xl">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3319.4623722216584!2d73.0766373!3d33.7032793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfbf978e723533%3A0x6b72d2459c36db4b!2sPrinting%20Corporation%20of%20Pakistan!5e0!3m2!1sen!2s!4v1709710000000!5m2!1sen!2s"
                                class="w-full h-52 border-0 grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700"
                                allowfullscreen="" loading="lazy"></iframe>
                            <div class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-[#0b0f19] to-transparent">
                                <a href="https://maps.google.com" target="_blank"
                                    class="flex items-center justify-center gap-2 w-full py-2.5 bg-white text-[#0b0f19] text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-primary hover:text-white transition-all shadow-lg">
                                    <i data-lucide="map-pin" class="w-3 h-3"></i>
                                    Open in Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                    <p class="mt-6 text-sm leading-relaxed opacity-70 italic text-[13px]">
                        Plot No. 21, Sector B-2, <br>
                        Phase-V, Hayatabad, <br>
                        Peshawar, Khyber Pakhtunkhwa.
                    </p>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h3
                        class="font-outfit text-lg font-bold text-white uppercase tracking-wider mb-8 flex items-center gap-2">
                        <!-- <span class="w-8 h-1 bg-primary rounded-full"></span> -->
                        Quick Links
                    </h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('complaint_cell') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Complaint Cell
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact_us') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ourteam') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Our Team
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tenders') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Tenders
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('causes') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Causes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('publications') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Publications
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mediacorner') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Media Corner
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ngo_required_documents') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                NGOs Registration
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Column 3: Departments -->
                <div>
                    <h3
                        class="font-outfit text-lg font-bold text-white uppercase tracking-wider mb-8 flex items-center gap-2">
                        Departments
                    </h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('complaint_cell') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group line-clamp-1">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Complaint Cell
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mediacorner') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Media Corner
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact_us') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('resources') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Resources
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ourteam') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Our Team
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact_us') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('resources') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                NGO Required Documents
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mediacorner') }}"
                                class="flex items-center gap-3 text-sm hover:text-primary transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 text-primary group-hover:translate-x-1 transition-transform"></i>
                                Publications
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Column 4: Get in Touch -->
                <div>
                    <h3
                        class="font-outfit text-lg font-bold text-white uppercase tracking-wider mb-8 flex items-center gap-2">
                        Get in Touch
                    </h3>
                    <form class="space-y-4" method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="Enter Name"
                                class="w-full bg-slate-900/50 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white placeholder:text-slate-600 focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none">
                        </div>
                        <div>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email"
                                class="w-full bg-slate-900/50 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white placeholder:text-slate-600 focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none">
                        </div>
                        <div>
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone"
                                class="w-full bg-slate-900/50 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white placeholder:text-slate-600 focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none">
                        </div>
                        <div>
                            <select name="subject"
                                class="w-full bg-slate-900/50 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none">
                                <option value="">Select Subject</option>
                                <option value="general" {{ old('subject') === 'general' ? 'selected' : '' }}>General Inquiry</option>
                                <option value="complaint" {{ old('subject') === 'complaint' ? 'selected' : '' }}>File a Complaint</option>
                                <option value="legal" {{ old('subject') === 'legal' ? 'selected' : '' }}>Legal Assistance</option>
                                <option value="feedback" {{ old('subject') === 'feedback' ? 'selected' : '' }}>Feedback</option>
                            </select>
                        </div>
                        <div>
                            <textarea name="message" rows="4" placeholder="Enter Message (Max words 250)"
                                class="w-full bg-slate-900/50 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white placeholder:text-slate-600 focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none resize-none">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit"
                            class="group flex items-center justify-center gap-2 w-full py-4 bg-white text-[#0b0f19] text-[11px] font-black uppercase tracking-widest rounded-xl hover:bg-primary hover:text-white transition-all shadow-xl active:scale-95">
                            Submit Now
                            <i data-lucide="send"
                                class="w-4 h-4 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                        </button>
                        @if($errors->any())
                            <p class="text-xs text-red-300 leading-relaxed">Please check the form fields and try again.</p>
                        @endif
                    </form>
                </div>

            </div>
        </div>

        <!-- Bottom Copyright Section -->
        <div class="border-t border-[#123B2D]/30 bg-[#071a12] py-8">
            <div
                class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <img src="{{ asset('images/logo.jpg') }}"
                        class="h-10 opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer"
                        alt="KP Human Rights Logo">
                    <div>
                        <p
                            class="text-[11px] font-medium opacity-50 uppercase tracking-widest mb-1 text-center md:text-left">
                            &copy; 2026 Directorate General of Law and Human Rights, Khyber Pakhtunkhwa.
                        </p>
                        <p class="text-[10px] opacity-30 text-center md:text-left">
                            Official website of Government of Khyber Pakhtunkhwa. All Rights Reserved.
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="#"
                        class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center hover:bg-primary hover:text-white transition-all shadow-lg">
                        <i data-lucide="share-2" class="w-5 h-5"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center hover:bg-primary hover:text-white transition-all shadow-lg">
                        <i data-lucide="message-circle" class="w-5 h-5"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center hover:bg-primary hover:text-white transition-all shadow-lg">
                        <i data-lucide="camera" class="w-5 h-5"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center hover:bg-primary hover:text-white transition-all shadow-lg">
                        <i data-lucide="video" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Float Buttons -->
        <div class="fixed bottom-8 right-8 z-[100] flex flex-col gap-3">
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                class="w-12 h-12 bg-white text-[#0b0f19] rounded-2xl shadow-2xl flex items-center justify-center hover:bg-primary hover:text-white transition-all group active:scale-90 transform translate-y-20 opacity-0 transition-opacity duration-300"
                id="backToTop">
                <i data-lucide="chevron-up" class="w-6 h-6 group-hover:-translate-y-1 transition-transform"></i>
            </button>
        </div>
    </footer>


    <script src="{{ asset('js/main.js') }}"></script>
@stack('scripts')
</body>

</html>
