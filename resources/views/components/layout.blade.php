@props(['title' => null])
@php
    $settings = \App\Models\SiteSetting::getSettings();
    $headerCampaigns = \App\Models\HeaderCampaign::active()->ordered()->get();
    $departments = \App\Models\ProvincialDepartment::active()->ordered()->get();
@endphp
@php
    $topLevelPages = \App\Models\Page::published()
        ->whereNull('parent_id')
        ->whereNull('static_parent')
        ->inNavigation()
        ->ordered()
        ->with('children')
        ->get();

    $whoWeArePages = \App\Models\Page::published()
        ->where('static_parent', 'who_we_are')
        ->inNavigation()
        ->ordered()
        ->get();

    $ngoRegistrationPages = \App\Models\Page::published()
        ->where('static_parent', 'ngo_registration')
        ->inNavigation()
        ->ordered()
        ->get();

    $mobileTopLevelPages = \App\Models\Page::published()
        ->whereNull('parent_id')
        ->whereNull('static_parent')
        ->inNavigation()
        ->ordered()
        ->with('children')
        ->get();
@endphp
<!DOCTYPE html>
<html lang="en" class="overflow-x-clip overflow-y-auto">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ $settings->favicon ? asset('storage/' . $settings->favicon) : asset('favicon.ico') }}" />
    <title>{{ $title ?? ($settings->meta_title ?? 'Directorate of Human Rights | Khyber Pakhtunkhwa') }}</title>
    @if ($settings->meta_description)
        <meta name="description" content="{{ $settings->meta_description }}" />
    @endif
    @if ($settings->meta_keywords)
        <meta name="keywords" content="{{ $settings->meta_keywords }}" />
    @endif
    @stack('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Fonts: Outfit & Inter -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- Lucide Icons -->
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.473.0/dist/umd/lucide.min.js"></script>
    <style>
        html {
            scrollbar-gutter: stable;
        }

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

<body class="antialiased bg-slate-50/50">
    <!-- Tier 1: Top Utility Bar (Non-Sticky Desktop Only) -->
    <div class="hidden lg:block bg-[#123B2D] py-2 px-6 relative z-[110]">
        <div class="max-w-[1536px] mx-auto flex justify-between items-center">
            <div class="flex items-center gap-8">
                @if ($settings->contact_email)
                    <a href="mailto:{{ $settings->contact_email }}"
                        class="flex items-center gap-2.5 text-white/80 hover:text-white transition-all-custom text-[11px] font-bold uppercase tracking-tight group">
                        <i data-lucide="mail" class="w-4 h-4 text-[#02B1EB] opacity-80"></i>
                        <span>{{ $settings->contact_email }}</span>
                    </a>
                @endif
                @if ($settings->contact_phone)
                    <div class="flex items-center gap-2.5 text-white/80 text-[11px] font-bold uppercase tracking-tight">
                        <i data-lucide="phone" class="w-4 h-4 text-[#02B1EB] opacity-80"></i>
                        <span>{{ $settings->contact_phone }}</span>
                    </div>
                @endif
            </div>
            <div class="flex items-center gap-4">
                @if ($settings->facebook_url)
                    <a href="{{ $settings->facebook_url }}" target="_blank"
                        class="text-white/60 hover:text-[#02B1EB] transition-all-custom"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.357 10.954 10.079 11.855v-8.363H7.09v-3.492h3.989V9.141c0-3.938 2.397-6.108 5.95-6.108 1.724 0 3.525.308 3.525.308v3.87h-1.985c-1.956 0-2.565 1.213-2.565 2.457v2.953h4.364l-.697 3.492h-3.667v8.363C19.643 23.027 24 18.063 24 12.073z"/></svg></a>
                @endif
                @if ($settings->twitter_url)
                    <a href="{{ $settings->twitter_url }}" target="_blank"
                        class="text-white/60 hover:text-[#02B1EB] transition-all-custom"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>
                @endif
                @if ($settings->instagram_url)
                    <a href="{{ $settings->instagram_url }}" target="_blank"
                        class="text-white/60 hover:text-[#02B1EB] transition-all-custom"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                @endif
                @if ($settings->youtube_url)
                    <a href="{{ $settings->youtube_url }}" target="_blank"
                        class="text-white/60 hover:text-[#02B1EB] transition-all-custom"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a>
                @endif
                @if ($settings->tiktok_url)
                    <a href="{{ $settings->tiktok_url }}" target="_blank"
                        class="text-white/60 hover:text-[#02B1EB] transition-all-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="currentColor" class="w-4 h-4">
                            <path
                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <header id="mainHeader"
        class="w-full z-[100] sticky top-0 bg-white border-b border-slate-100 transition-transform duration-500 ease-in-out will-change-transform">
        <!-- Tier 2: Main Header (Responsive) -->
        <div class="py-3 px-6 lg:px-8 bg-white border-b border-slate-100 lg:border-none">
            <div class="max-w-[1536px] mx-auto flex justify-between items-center">
                <!-- Brand: Logo & Title (Unified Professional Layout) -->
                <div class="flex items-center gap-4 lg:gap-6 group cursor-pointer transition-all-custom">
                    <a href="{{ route('home') }}">
                        <img src="{{ $settings->logo ? asset('storage/' . $settings->logo) : asset('images/logo.jpg') }}" alt="Directorate Logo"
                            class="h-14 md:h-18 lg:h-24 w-auto group-hover:scale-105 transition-transform duration-500" />
                    </a>
                    <div class="flex flex-col items-start">
                        @php
                            $siteNameWords = preg_split('/\s+/', trim($settings->site_name ?? 'Directorate of Human Rights'));
                            $siteNameLine1 = implode(' ', array_slice($siteNameWords, 0, 2));
                            $siteNameLine2 = implode(' ', array_slice($siteNameWords, 2));
                        @endphp
                        <h1
                            class="font-outfit text-sm md:text-lg lg:text-[22px] font-extrabold text-[#123B2D] leading-tight uppercase tracking-tight">
                            {{ $siteNameLine1 }}
                        </h1>
                        @if ($siteNameLine2 !== '')
                            <h1
                                class="font-outfit text-sm md:text-lg lg:text-[22px] font-extrabold text-[#123B2D] leading-tight uppercase tracking-tight">
                                <span
                                    class="font-outfit text-sm md:text-lg lg:text-[22px] font-extrabold text-[#02B1EB] leading-tight uppercase tracking-tight">
                                    {{ $siteNameLine2 }}
                                </span>
                            </h1>
                        @endif

                        <p
                            class="font-outfit text-[9px] md:text-[10px] lg:text-[11px] font-bold text-slate-400 uppercase tracking-[0.3em] mt-1">
                            Khyber Pakhtunkhwa
                        </p>
                    </div>
                </div>

                <!-- Campaign Highlights -->
                @if ($headerCampaigns->isNotEmpty())
                    <div class="hidden xl:block w-[500px]" id="campaignHighlights">

                        <div class="grid {{ $headerCampaigns->count() === 1 ? 'grid-cols-1' : 'grid-cols-2' }} gap-3"
                            style="margin: 10px;">

                            @foreach ($headerCampaigns as $campaign)
                                <a target="__blank" href="{{ $campaign->url }}"
                                    class="block overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm hover:shadow-lg transition duration-300">

                                    <!-- Campaign Image -->
                                    <div style="height: 50px"
                                        class="w-full {{ $headerCampaigns->count() === 1 ? 'h-[180px]' : 'h-[120px]' }}">
                                        <img src="{{ asset('storage/' . $campaign->image_path) }}"
                                            alt="{{ $campaign->title ?: 'Campaign banner' }}"
                                            class="w-full h-full object-fill">
                                    </div>

                                    <!-- Campaign Title -->
                                    @if ($campaign->title)
                                        <div class="p-1">
                                            <h3 class="text-sm text-center text-slate-800 line-clamp-2">
                                                {{ $campaign->title }}
                                            </h3>
                                        </div>
                                    @endif

                                </a>
                            @endforeach

                        </div>

                    </div>
                @endif

                <!-- Desktop Search Bar -->
                <div class="hidden lg:block w-[280px] xl:w-[300px]">
                    <form action="{{ route('search') }}" method="GET"
                        class="search-container relative flex items-center bg-slate-50 border border-slate-200 rounded-xl overflow-hidden shadow-sm transition-all duration-300 focus-within:ring-2 focus-within:ring-[#02B1EB]/20">
                        <input type="text" name="query" value="{{ request('query') }}"
                            placeholder="Search documents, notifications, NGO records, publications & news..."
                            class="w-full pl-5 pr-12 py-3 text-sm text-slate-700 bg-transparent focus:outline-none" />
                        <button type="submit"
                            class="absolute right-0 h-full w-11 bg-[#123B2D] flex items-center justify-center text-white hover:bg-[#02B1EB] transition-colors">
                            <i data-lucide="search" class="w-4 h-4"></i>
                        </button>
                    </form>
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
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('introduction', 'ourteam', 'vision_mission', 'org_structure') || $whoWeArePages->contains('slug', request()->route('slug')) ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>About
                                Directorate</span><i data-lucide="chevron-down"
                                class="w-3.5 h-3.5 opacity-60 group-hover:rotate-180 transition-transform duration-300"></i></button>
                        <div
                            class="absolute left-0 top-full w-72 bg-white shadow-2xl rounded-b-xl border border-slate-100 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-[110] p-2">
                            <div class="flex flex-col">
                                <a href="{{ route('introduction') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center justify-between group/item text-sm">Introduction<i
                                        data-lucide="chevron-right"
                                        class="w-3 h-3 opacity-0 group-hover/item:opacity-100 -translate-x-2 group-hover/item:translate-x-0 transition-all"></i></a>
                                <a href="{{ route('vision_mission') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center justify-between group/item text-sm">Vision &amp; Mission<i
                                        data-lucide="chevron-right"
                                        class="w-3 h-3 opacity-0 group-hover/item:opacity-100 -translate-x-2 group-hover/item:translate-x-0 transition-all"></i></a>
                                <a href="{{ route('org_structure') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center justify-between group/item text-sm">Organizational Structure<i
                                        data-lucide="chevron-right"
                                        class="w-3 h-3 opacity-0 group-hover/item:opacity-100 -translate-x-2 group-hover/item:translate-x-0 transition-all"></i></a>
                                <a href="{{ route('ourteam') }}"
                                    class="px-4 py-3 text-slate-700 hover:bg-[#123B2D]/5 hover:text-[#123B2D] rounded-lg transition-colors flex items-center justify-between group/item text-sm">Our
                                    Team<i data-lucide="chevron-right"
                                        class="w-3 h-3 opacity-0 group-hover/item:opacity-100 -translate-x-2 group-hover/item:translate-x-0 transition-all"></i></a>

                                @foreach ($whoWeArePages as $p)
                                    <a href="{{ route('page.show', $p->slug) }}"
                                        class="px-4 py-3 text-slate-700 {{ request()->route('slug') === $p->slug ? 'bg-[#123B2D]/5 text-[#123B2D]' : 'hover:bg-[#123B2D]/5 hover:text-[#123B2D]' }} rounded-lg transition-colors flex items-center justify-between group/item text-sm">
                                        {{ $p->title }}
                                        <i data-lucide="chevron-right"
                                            class="w-3 h-3 {{ request()->route('slug') === $p->slug ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-2' }} group-hover/item:opacity-100 group-hover/item:translate-x-0 transition-all"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li><a href="{{ route('whatwedo') }}"
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('whatwedo') ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>What
                                We Do</span></a></li>
                    <li><a href="{{ route('mediacorner') }}"
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('mediacorner', 'events.show', 'photogallery', 'videogallery') ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>Media
                                Corner</span></a></li>
                    <!-- NGO Registration with Sub-Menu -->
                    <li class="group relative">
                        <a href="{{ route('ngo_required_documents') }}"
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('ngo_*', 'registration_form_*') || $ngoRegistrationPages->contains('slug', request()->route('slug')) ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>NGO
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

                                @foreach ($ngoRegistrationPages as $p)
                                    <a href="{{ route('page.show', $p->slug) }}"
                                        class="px-4 py-3 text-slate-700 {{ request()->route('slug') === $p->slug ? 'bg-[#123B2D]/5 text-[#123B2D]' : 'hover:bg-[#123B2D]/5 hover:text-[#123B2D]' }} rounded-lg transition-colors flex items-center justify-between group/item text-sm">
                                        <div class="flex items-center gap-3">
                                            <i data-lucide="file-text" class="w-4 h-4 text-[#02B1EB]"></i>
                                            {{ $p->title }}
                                        </div>
                                        <i data-lucide="chevron-right"
                                            class="w-3 h-3 {{ request()->route('slug') === $p->slug ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-2' }} group-hover/item:opacity-100 group-hover/item:translate-x-0 transition-all"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li><a href="{{ route('resources') }}"
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('resources') ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>Resources</span></a>
                    </li>

                    <!-- Dynamic Pages -->
                    @foreach ($topLevelPages as $page)
                        @php
                            $hasChildren = $page->children->count() > 0;
                            $isHierarchyActive =
                                request()->routeIs('page.show') &&
                                (request()->route('slug') === $page->slug ||
                                    $page->children->contains('slug', request()->route('slug')));
                        @endphp

                        @if ($hasChildren)
                            <li class="group relative">
                                <a href="{{ route('page.show', $page->slug) }}"
                                    class="flex items-center gap-2 px-5 py-4 text-white {{ $isHierarchyActive ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm">
                                    <span>{{ $page->title }}</span>
                                    <i data-lucide="chevron-down"
                                        class="w-3.5 h-3.5 opacity-60 group-hover:rotate-180 transition-transform duration-300"></i>
                                </a>
                                <div
                                    class="absolute left-0 top-full w-64 bg-white shadow-2xl rounded-b-xl border border-slate-100 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-[110] p-2">
                                    <div class="flex flex-col">
                                        @foreach ($page->children as $child)
                                            <a href="{{ route('page.show', $child->slug) }}"
                                                class="px-4 py-3 text-slate-700 {{ request()->routeIs('page.show') && request()->route('slug') === $child->slug ? 'bg-[#123B2D]/5 text-[#123B2D]' : 'hover:bg-[#123B2D]/5 hover:text-[#123B2D]' }} rounded-lg transition-colors flex items-center justify-between group/item text-sm">
                                                {{ $child->title }}
                                                <i data-lucide="chevron-right"
                                                    class="w-3 h-3 {{ request()->routeIs('page.show') && request()->route('slug') === $child->slug ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-2' }} group-hover/item:opacity-100 group-hover/item:translate-x-0 transition-all"></i>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('page.show', $page->slug) }}"
                                    class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('page.show') && request()->route('slug') === $page->slug ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm">
                                    <span>{{ $page->title }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach

                    <li><a href="{{ route('contact_us') }}"
                            class="flex items-center gap-2 px-5 py-4 text-white {{ request()->routeIs('contact_us') ? 'bg-[#02B1EB]' : 'hover:bg-white/10' }} transition-all-custom font-medium text-sm"><span>Contact
                                Us</span></a></li>
                </ul>
            </div>
        </nav>



        <!-- HERO SECTION -->



        <!--  4: Latest News Ticker -->
        <div class="bg-[#123B2D] flex items-center overflow-hidden h-10 border-t border-white">
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
                    @foreach ($tickerNews as $item)
                        <a href="{{ route('news_details', $item->id) }}"
                            class="text-xs font-bold text-white/90 hover:text-[#02B1EB] uppercase tracking-wider">{{ Str::limit($item->title, 60) }}</a>
                    @endforeach
                    @if ($tickerNews->count() < 3)
                        <a href="{{ route('mediacorner') }}"
                            class="text-xs font-bold text-white/90 hover:text-[#02B1EB] uppercase tracking-wider">VIEW
                            ALL NEWS</a>
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
        <!-- Mobile Side Menu Overlay -->
        <div id="mobileMenuOverlay"
            class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[150] opacity-0 invisible transition-all duration-500">
        </div>

        <!-- Mobile Side Menu Content -->
        <div id="mobileMenuContent"
            class="fixed top-0 right-0 h-full w-[85%] md:w-[400px] bg-white z-[160] translate-x-full transition-transform duration-500 ease-out shadow-2xl flex flex-col">
            <!-- Header -->
            <div class="flex items-center justify-between p-6 border-b border-slate-100">
                <a href="{{ route('home') }}">
                    <img src="{{ $settings->logo ? asset('storage/' . $settings->logo) : asset('images/logo.jpg') }}" class="h-10 w-auto" alt="Logo">
                </a>
                <button id="closeMobileMenu"
                    class="p-2 rounded-lg bg-slate-50 text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all active:scale-90">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>

            <!-- Scrollable Body -->
            <div class="flex-1 overflow-y-auto p-6 scrollbar-none space-y-8">
                <!-- Mobile Search -->
                <form action="{{ route('search') }}" method="GET" class="relative">
                    <input type="text" name="query" value="{{ request('query') }}"
                        placeholder="Search documents, notifications, NGO records..."
                        class="w-full pl-5 pr-12 py-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-primary/20">
                    <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2">
                        <i data-lucide="search" class="w-5 h-5 text-slate-400"></i>
                    </button>
                </form>

                <!-- Navigation Links -->
                <div class="space-y-2">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 px-2">Navigation</p>
                    <nav class="space-y-1">
                        <a href="{{ route('home') }}"
                            class="flex items-center gap-3 p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('home') ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                            <i data-lucide="home" class="w-5 h-5"></i> Home
                        </a>

                        <div class="mobile-dropdown group">
                            <div
                                class="flex items-center justify-between w-full p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('introduction', 'ourteam', 'vision_mission', 'org_structure') || $whoWeArePages->contains('slug', request()->route('slug')) ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                                <a href="{{ route('introduction') }}" class="flex items-center gap-3 flex-1">
                                    <i data-lucide="info" class="w-5 h-5"></i> About Directorate
                                </a>
                                <button class="p-2 dropdown-trigger">
                                    <i data-lucide="chevron-down"
                                        class="w-4 h-4 transition-transform duration-300 dropdown-icon {{ request()->routeIs('introduction', 'ourteam', 'vision_mission', 'org_structure') || $whoWeArePages->contains('slug', request()->route('slug')) ? 'rotate-180' : '' }}"></i>
                                </button>
                            </div>
                            <div
                                class="{{ request()->routeIs('introduction', 'ourteam', 'vision_mission', 'org_structure') || $whoWeArePages->contains('slug', request()->route('slug')) ? '' : 'hidden' }} space-y-1 mt-1 ml-11 dropdown-content">
                                <a href="{{ route('introduction') }}"
                                    class="block p-2 text-sm {{ request()->routeIs('introduction') ? 'text-primary font-bold' : 'text-slate-500' }} italic">Introduction</a>
                                <a href="{{ route('vision_mission') }}"
                                    class="block p-2 text-sm {{ request()->routeIs('vision_mission') ? 'text-primary font-bold' : 'text-slate-500' }} italic">Vision &amp; Mission</a>
                                <a href="{{ route('org_structure') }}"
                                    class="block p-2 text-sm {{ request()->routeIs('org_structure') ? 'text-primary font-bold' : 'text-slate-500' }} italic">Organizational Structure</a>
                                <a href="{{ route('ourteam') }}"
                                    class="block p-2 text-sm {{ request()->routeIs('ourteam') ? 'text-primary font-bold' : 'text-slate-500' }} italic">Our
                                    Team</a>
                                @foreach ($whoWeArePages as $p)
                                    <a href="{{ route('page.show', $p->slug) }}"
                                        class="block p-2 text-sm {{ request()->route('slug') === $p->slug ? 'text-primary font-bold' : 'text-slate-500' }} italic">
                                        {{ $p->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <a href="{{ route('whatwedo') }}"
                            class="flex items-center gap-3 p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('whatwedo') ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                            <i data-lucide="briefcase" class="w-5 h-5"></i> What We Do
                        </a>

                        <a href="{{ route('mediacorner') }}"
                            class="flex items-center gap-3 p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('mediacorner') ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                            <i data-lucide="layers" class="w-5 h-5"></i> Media Corner
                        </a>

                        <div class="mobile-dropdown group">
                            <div
                                class="flex items-center justify-between w-full p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('ngo_*', 'registration_form_*') || $ngoRegistrationPages->contains('slug', request()->route('slug')) ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                                <a href="{{ route('ngo_required_documents') }}"
                                    class="flex items-center gap-3 flex-1">
                                    <i data-lucide="file-check" class="w-5 h-5"></i> NGO Registration
                                </a>
                                <button class="p-2 dropdown-trigger">
                                    <i data-lucide="chevron-down"
                                        class="w-4 h-4 transition-transform duration-300 dropdown-icon {{ request()->routeIs('ngo_*', 'registration_form_*') || $ngoRegistrationPages->contains('slug', request()->route('slug')) ? 'rotate-180' : '' }}"></i>
                                </button>
                            </div>
                            <div
                                class="{{ request()->routeIs('ngo_*', 'registration_form_*') || $ngoRegistrationPages->contains('slug', request()->route('slug')) ? '' : 'hidden' }} space-y-1 mt-1 ml-11 dropdown-content">
                                <a href="{{ route('ngo_required_documents') }}"
                                    class="block p-2 text-sm {{ request()->routeIs('ngo_required_documents') ? 'text-primary font-bold' : 'text-slate-500' }} italic">Required
                                    Documents</a>
                                <a href="{{ route('ngo_guidelines') }}"
                                    class="block p-2 text-sm {{ request()->routeIs('ngo_guidelines') ? 'text-primary font-bold' : 'text-slate-500' }} italic">Registration
                                    Guidelines</a>
                                <a href="{{ route('ngo_directives') }}"
                                    class="block p-2 text-sm {{ request()->routeIs('ngo_directives') ? 'text-primary font-bold' : 'text-slate-500' }} italic">Mandatory
                                    Directives</a>
                                <a href="{{ route('ngo_notices') }}"
                                    class="block p-2 text-sm {{ request()->routeIs('ngo_notices') ? 'text-primary font-bold' : 'text-slate-500' }} italic">Latest
                                    Notice Board</a>
                                <a href="{{ route('registration_form_part1') }}"
                                    class="block p-2 text-sm {{ request()->routeIs('registration_form_*') ? 'text-primary font-bold' : 'text-slate-500' }} italic">Online
                                    Registration</a>
                                <a href="{{ route('ngo_registered') }}"
                                    class="block p-2 text-sm {{ request()->routeIs('ngo_registered') ? 'text-primary font-bold' : 'text-slate-500' }} italic">Registered
                                    NGOs</a>
                                <a href="{{ route('ngo_suspended') }}"
                                    class="block p-2 text-sm {{ request()->routeIs('ngo_suspended') ? 'text-primary font-bold' : 'text-slate-500' }} italic">Suspended
                                    NGOs</a>
                                @foreach ($ngoRegistrationPages as $p)
                                    <a href="{{ route('page.show', $p->slug) }}"
                                        class="block p-2 text-sm {{ request()->route('slug') === $p->slug ? 'text-primary font-bold' : 'text-slate-500' }} italic">
                                        {{ $p->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <a href="{{ route('resources') }}"
                            class="flex items-center gap-3 p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('resources') ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                            <i data-lucide="book-open" class="w-5 h-5"></i> Resources
                        </a>

                        @foreach ($mobileTopLevelPages as $page)
                            @php
                                $hasChildren = $page->children->count() > 0;
                                $isHierarchyActive =
                                    request()->routeIs('page.show') &&
                                    (request()->route('slug') === $page->slug ||
                                        $page->children->contains('slug', request()->route('slug')));
                            @endphp

                            @if ($hasChildren)
                                <div class="mobile-dropdown group">
                                    <div
                                        class="flex items-center justify-between w-full p-3 rounded-xl {{ $isHierarchyActive ? 'bg-slate-50 text-primary' : 'text-slate-700 hover:bg-slate-50 hover:text-primary' }} font-bold transition-all">
                                        <a href="{{ route('page.show', $page->slug) }}"
                                            class="flex items-center gap-3 flex-1">
                                            <i data-lucide="file-text" class="w-5 h-5"></i> {{ $page->title }}
                                        </a>
                                        <button class="p-2 dropdown-trigger">
                                            <i data-lucide="chevron-down"
                                                class="w-4 h-4 transition-transform duration-300 dropdown-icon {{ $isHierarchyActive ? 'rotate-180' : '' }}"></i>
                                        </button>
                                    </div>
                                    <div
                                        class="{{ $isHierarchyActive ? '' : 'hidden' }} space-y-1 mt-1 ml-11 dropdown-content">
                                        @foreach ($page->children as $child)
                                            <a href="{{ route('page.show', $child->slug) }}"
                                                class="block p-2 text-sm {{ request()->routeIs('page.show') && request()->route('slug') === $child->slug ? 'text-primary font-bold' : 'text-slate-500' }} italic">{{ $child->title }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('page.show', $page->slug) }}"
                                    class="flex items-center gap-3 p-3 rounded-xl text-slate-700 font-bold {{ request()->routeIs('page.show') && request()->route('slug') === $page->slug ? 'bg-slate-50 text-primary' : 'hover:bg-slate-50 hover:text-primary' }} transition-all">
                                    <i data-lucide="file-text" class="w-5 h-5"></i> {{ $page->title }}
                                </a>
                            @endif
                        @endforeach

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
                        @if ($settings->contact_email)
                            <a href="mailto:{{ $settings->contact_email }}" class="flex items-center gap-3 text-slate-600 group">
                                <div
                                    class="w-9 h-9 rounded-xl bg-white flex items-center justify-center text-primary shadow-sm border border-slate-100 group-hover:bg-primary group-hover:text-white transition-all">
                                    <i data-lucide="mail" class="w-4 h-4"></i>
                                </div>
                                <span class="text-sm font-bold">{{ $settings->contact_email }}</span>
                            </a>
                        @endif
                        @if ($settings->contact_phone)
                            <div class="flex items-center gap-3 text-slate-600 group">
                                <div
                                    class="w-9 h-9 rounded-xl bg-white flex items-center justify-center text-primary shadow-sm border border-slate-100">
                                    <i data-lucide="phone" class="w-4 h-4"></i>
                                </div>
                                <span class="text-sm font-bold">{{ $settings->contact_phone }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Socials in Mobile Menu -->
                    <div class="flex items-center gap-3 pt-2">
                        @if ($settings->facebook_url)
                            <a href="{{ $settings->facebook_url }}" target="_blank"
                                class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-slate-400 hover:text-[#1877F2] hover:bg-blue-50 transition-all border border-slate-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.357 10.954 10.079 11.855v-8.363H7.09v-3.492h3.989V9.141c0-3.938 2.397-6.108 5.95-6.108 1.724 0 3.525.308 3.525.308v3.87h-1.985c-1.956 0-2.565 1.213-2.565 2.457v2.953h4.364l-.697 3.492h-3.667v8.363C19.643 23.027 24 18.063 24 12.073z"/></svg>
                            </a>
                        @endif
                        @if ($settings->twitter_url)
                            <a href="{{ $settings->twitter_url }}" target="_blank"
                                class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-slate-400 hover:text-[#1DA1F2] hover:bg-blue-50 transition-all border border-slate-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                        @endif
                        @if ($settings->instagram_url)
                            <a href="{{ $settings->instagram_url }}" target="_blank"
                                class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-slate-400 hover:text-[#E4405F] hover:bg-pink-50 transition-all border border-slate-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                        @endif
                        @if ($settings->youtube_url)
                            <a href="{{ $settings->youtube_url }}" target="_blank"
                                class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-slate-400 hover:text-[#FF0000] hover:bg-red-50 transition-all border border-slate-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        @endif
                        @if ($settings->tiktok_url)
                            <a href="{{ $settings->tiktok_url }}" target="_blank"
                                class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-slate-400 hover:text-black hover:bg-gray-100 transition-all border border-slate-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                    <path
                                        d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Footer Badge -->
            <div class="p-6 border-t border-slate-100">
                <p class="text-[10px] text-slate-400 font-bold uppercase text-center tracking-widest">Powered by KP
                    Government</p>
            </div>
        </div>
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

                <!-- Column 1: Contact Information -->
                <div>
                    <h3
                        class="font-outfit text-lg font-bold text-white uppercase tracking-wider mb-8 flex items-center gap-2">
                        Contact Information
                    </h3>
                    <div class="relative group">
                        <div class="overflow-hidden rounded-2xl border border-slate-800 shadow-2xl">
                            @if ($settings->map_embed_url)
                            <iframe
                                src="{{ $settings->map_embed_url }}"
                                class="w-full h-52 border-0 grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700"
                                allowfullscreen="" loading="lazy"></iframe>
                            @endif
                            @if ($settings->map_link)
                            <div
                                class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-[#0b0f19] to-transparent">
                                <a href="{{ $settings->map_link }}" target="_blank"
                                    class="flex items-center justify-center gap-2 w-full py-2.5 bg-white text-[#0b0f19] text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-primary hover:text-white transition-all shadow-lg">
                                    <i data-lucide="map-pin" class="w-3 h-3"></i>
                                    Open in Google Maps
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="mt-6 space-y-3 text-sm text-slate-300/90">
                        @if ($settings->contact_address)
                            <p class="leading-relaxed">
                                {!! nl2br(e($settings->contact_address)) !!}
                            </p>
                        @endif
                        <div class="pt-3 space-y-2 text-slate-400">
                            @if ($settings->contact_phone)
                                <p class="flex items-center gap-2"><i data-lucide="phone"
                                        class="w-4 h-4 shrink-0"></i> <span>{{ $settings->contact_phone }}</span></p>
                            @endif
                            @if ($settings->contact_email)
                                <p class="flex items-center gap-2"><i data-lucide="mail"
                                        class="w-4 h-4 shrink-0"></i> <span>{{ $settings->contact_email }}</span></p>
                            @endif
                            @if ($settings->toll_free)
                                <p class="flex items-center gap-2"><i data-lucide="headset"
                                        class="w-4 h-4 shrink-0"></i> <span>{{ $settings->toll_free }} (Toll Free)</span></p>
                            @endif
                            @if ($settings->working_hours)
                                <p class="flex items-center gap-2"><i data-lucide="clock"
                                        class="w-4 h-4 shrink-0"></i> <span>{!! nl2br(e($settings->working_hours)) !!}</span></p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h3
                        class="font-outfit text-lg font-bold text-white uppercase tracking-wider mb-8 flex items-center gap-2">
                        Quick Links
                    </h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('complaint_cell') }}"
                                class="flex items-center gap-3 text-sm transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4"></i>
                                Register Complaint
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('track.complaint') }}"
                                class="flex items-center gap-3 text-sm transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4"></i>
                                Track Complaint Status
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('registration_form_part1') }}"
                                class="flex items-center gap-3 text-sm  transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4"></i>
                                NGO Registration
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('verify.ngo') }}"
                                class="flex items-center gap-3 text-sm transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4 "></i>
                                Verify NGO Registration
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('publications') }}"
                                class="flex items-center gap-3 text-sm  transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4"></i>
                                Publications
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ngo_required_documents') }}"
                                class="flex items-center gap-3 text-sm  transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4"></i>
                                Downloads
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Column 3: Relevant Provincial Departments -->
                <div>
                    <h3
                        class="font-outfit text-lg font-bold text-white uppercase tracking-wider mb-8 flex items-center gap-2">
                        Relevant Provincial Departments
                    </h3>
                    <ul class="space-y-4">
                        @forelse($departments as $department)
                        <li>
                            <a href="{{ $department->url ?: '#' }}" target="_blank"
                                class="flex items-center gap-3 text-sm transition-colors group">
                                <i data-lucide="chevron-right"
                                    class="w-4 h-4"></i>
                                <span class="leading-snug">{{ $department->name }}</span>
                            </a>
                        </li>
                        @empty
                        @endforelse
                    </ul>
                </div>

                <!-- Column 4: Newsletter -->
                <div>
                    <h3
                        class="font-outfit text-lg font-bold text-white uppercase tracking-wider mb-8 flex items-center gap-2">
                        Newsletter
                    </h3>
                    <form class="space-y-4" method="POST" action="{{ route('newsletter.subscribe') }}">
                        @csrf
                        <div>
                            <input type="text" name="full_name" value="{{ old('full_name') }}"
                                placeholder="Enter Name"
                                class="w-full bg-slate-900/50 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none">
                        </div>
                        <div>
                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="Enter Email"
                                class="w-full bg-slate-900/50 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none">
                        </div>
                        <div>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                placeholder="Enter Phone"
                                class="w-full bg-slate-900/50 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none">
                        </div>
                        <button type="submit"
                            class="group flex items-center justify-center gap-2 w-full py-4 bg-white text-[#0b0f19] text-[11px] font-black uppercase tracking-widest rounded-xl hover:bg-secondary hover:text-white transition-all shadow-xl active:scale-95">
                            Subscribe
                            <i data-lucide="send"
                                class="w-4 h-4 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                        </button>
                        @if (session('success'))
                            <p class="text-xs text-green-300 leading-relaxed">{{ session('success') }}</p>
                        @endif
                        @if ($errors->any())
                            <p class="text-xs text-red-300 leading-relaxed">Please check the form fields and try again.
                            </p>
                        @endif
                    </form>
                </div>

            </div>
        </div>

        <!-- Bottom Copyright Section -->
        <div class="border-t border-[#123B2D]/30 bg-[#071a12] py-8">
            <div
                class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <img src="{{ $settings->logo ? asset('storage/' . $settings->logo) : asset('images/logo.jpg') }}"
                        class="h-20 p-2 rounded-full opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer"
                        alt="KP Human Rights Logo">
                    <div>
                        <p
                            class="text-[11px] font-medium text-slate-300/80 uppercase tracking-widest mb-1 text-center md:text-left">
                            &copy; 2026 {{ $settings->site_name ?? 'Directorate General of Law and Human Rights, Khyber Pakhtunkhwa.' }}
                        </p>
                        <p class="text-[10px] text-slate-300/80 text-center md:text-left">
                            Official website of Government of Khyber Pakhtunkhwa. All Rights Reserved.
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    @if ($settings->facebook_url)
                        <a href="{{ $settings->facebook_url }}" target="_blank"
                            class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center hover:bg-[#1877F2] hover:text-white transition-all shadow-lg group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 group-hover:scale-110 transition-transform"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.357 10.954 10.079 11.855v-8.363H7.09v-3.492h3.989V9.141c0-3.938 2.397-6.108 5.95-6.108 1.724 0 3.525.308 3.525.308v3.87h-1.985c-1.956 0-2.565 1.213-2.565 2.457v2.953h4.364l-.697 3.492h-3.667v8.363C19.643 23.027 24 18.063 24 12.073z"/></svg>
                        </a>
                    @endif
                    @if ($settings->twitter_url)
                        <a href="{{ $settings->twitter_url }}" target="_blank"
                            class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center hover:bg-[#1DA1F2] hover:text-white transition-all shadow-lg group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 group-hover:scale-110 transition-transform"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                    @endif
                    @if ($settings->instagram_url)
                        <a href="{{ $settings->instagram_url }}" target="_blank"
                            class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center hover:bg-[#E4405F] hover:text-white transition-all shadow-lg group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 group-hover:scale-110 transition-transform"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    @endif
                    @if ($settings->youtube_url)
                        <a href="{{ $settings->youtube_url }}" target="_blank"
                            class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center hover:bg-[#FF0000] hover:text-white transition-all shadow-lg group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 group-hover:scale-110 transition-transform"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    @endif
                    @if ($settings->tiktok_url)
                        <a href="{{ $settings->tiktok_url }}" target="_blank"
                            class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center hover:bg-black hover:text-white transition-all shadow-lg group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 group-hover:scale-110 transition-transform"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        </a>
                    @endif
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
