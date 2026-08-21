@props(['title' => 'Registration Form', 'subtitle' => '', 'step' => '', 'backRoute' => 'ngo_required_documents', 'backLabel' => 'Back to NGOs'])
@php
    $settings = \App\Models\SiteSetting::getSettings();
@endphp

<x-layout>
    <style>
        :root {
            --primary: #123B2D;
            --secondary: #02B1EB;
            --accent: #02B1EB;
            --bg-light: #f8fafc;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            background-image: radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.03) 0, transparent 50%), radial-gradient(at 100% 0%, rgba(13, 71, 161, 0.03) 0, transparent 50%);
            min-height: 100vh;
        }
        .font-outfit {
            font-family: 'Outfit', sans-serif;
        }
        .glass-card {
            background: white;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }
        .input-compact {
            padding: 0.7rem 1rem;
            font-size: 0.85rem;
            transition: all 0.2s ease;
        }
        .input-compact:focus {
            outline: none;
            border-color: var(--accent);
            background-color: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
        .back-btn {
            transition: all 0.2s ease;
        }
        .back-btn:hover {
            transform: translateX(-2px);
            background-color: #f8fafc;
        }
        .section-icon {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 900;
        }
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
        .reveal-on-scroll {
            transition: all 0.5s ease-out;
        }
        .js-hook .reveal-on-scroll:not(.revealed) {
            opacity: 0;
            transform: translateY(15px);
        }
        .reveal-on-scroll.revealed {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
        @media (max-width: 640px) {
            .mobile-header {
                display: flex !important;
                align-items: center;
                justify-content: space-between;
                padding: 1rem 1.5rem;
                background: white;
                border-bottom: 1px solid #f1f5f9;
                position: sticky;
                top: 0;
                z-index: 100;
            }
            .fixed-back-container {
                display: none !important;
            }
        }
        @media (min-width: 641px) {
            .mobile-header {
                display: none !important;
            }
        }
        .label-compact {
            font-size: 9px;
            font-weight: 900;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            margin-bottom: 0.4rem;
            display: block;
        }
        .check-pill {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            background: #f8fafc;
            border: 1px solid #f1f5f9;
            border-radius: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
            height: 100%;
        }
        .check-pill:hover {
            background: #fff;
            border-color: #e2e8f0;
        }
        .radio-pill {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1rem;
            background: #f8fafc;
            border: 1px solid #f1f5f9;
            border-radius: 0.75rem;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 11px;
            font-weight: 700;
        }
        .radio-pill:hover {
            border-color: var(--accent);
        }
        .radio-pill input:checked+span {
            color: var(--primary);
        }
        .financial-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 1.5rem;
            padding: 1.75rem;
            transition: all 0.3s ease;
        }
        .financial-card:hover {
            border-color: #e2e8f0;
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.04);
        }
        .project-block {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 1.5rem;
            padding: 1.5rem;
            position: relative;
            transition: all 0.3s ease;
        }
        .project-block:hover {
            border-color: #e2e8f0;
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.03);
        }
        .remove-project-row {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #64748b;
            cursor: pointer;
        }
        .remove-project-row:hover {
            border-color: #fecaca;
            color: #dc2626;
            background: #fef2f2;
        }
        .add-project-row-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 12px;
            border: 2px dashed #cbd5e1;
            background: #f8fafc;
            color: #123B2D;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .add-project-row-btn:hover {
            border-color: #02B1EB;
            background: #eff6ff;
            color: #02B1EB;
        }
        .sno-badge {
            position: absolute;
            top: -10px;
            left: 20px;
            background: #02b1eb;
            color: white;
            font-size: 9px;
            font-weight: 800;
            padding: 2px 10px;
            border-radius: 10px;
        }
        .asset-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 1.5rem;
            padding: 1.75rem;
            transition: all 0.3s ease;
        }
        .asset-card:hover {
            border-color: #e2e8f0;
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.04);
        }
        .security-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 1.5rem;
            padding: 1.75rem;
            transition: all 0.3s ease;
            position: relative;
        }
        .security-card:hover {
            border-color: #e2e8f0;
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
    <script>
        document.documentElement.classList.add('js-hook');
    </script>

    <div class="fixed-back-container lg:fixed top-6 left-6 z-50">
        <a href="{{ route($backRoute) }}"
            class="back-btn flex items-center gap-2 px-4 py-2 bg-white shadow-sm border border-slate-100 rounded-xl text-slate-600 font-bold text-xs uppercase tracking-wider">
            <i data-lucide="arrow-left" class="w-4 h-4 text-[#02B1EB]"></i>
            <span>{{ $backLabel }}</span>
        </a>
    </div>

    <main class="max-w-6xl mx-auto px-4 py-12 md:py-16">
        <div class="text-center mb-10 reveal-on-scroll">
            <h1 class="font-outfit text-2xl md:text-3xl font-black text-slate-900 mb-2 tracking-tight uppercase">{{ $title }}</h1>
            @if($subtitle)
                <p class="text-slate-500 font-medium text-xs md:text-sm italic uppercase tracking-widest">{{ $subtitle }}</p>
            @endif
        </div>

        <div class="glass-card rounded-3xl overflow-hidden reveal-on-scroll">
            <div class="bg-[#02B1EB] h-1.5 w-full"></div>

            <form id="registrationForm" class="p-6 md:p-10 space-y-10">
                {{ $slot }}
            </form>
        </div>

        @if($step)
            <div class="mt-8 text-center">
                <p class="text-[9px] text-slate-400 font-bold uppercase tracking-[0.25em]">{{ $step }}</p>
            </div>
        @endif

        <div class="mt-8 text-center">
            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-[0.25em]">&copy; 2026 Directorate General of Law & Human Rights</p>
        </div>
    </main>

    <div id="errorMessage" class="hidden fixed inset-0 bg-slate-950/40 backdrop-blur-xl flex items-center justify-center z-[500] p-6">
        <div class="bg-white rounded-[3rem] p-12 md:p-16 max-w-lg w-full shadow-3xl text-center border border-red-100">
            <div class="w-24 h-24 bg-red-100 text-red-600 rounded-[2rem] flex items-center justify-center mx-auto mb-8 shadow-sm">
                <i data-lucide="alert-triangle" class="w-12 h-12"></i>
            </div>
            <h3 class="font-outfit text-2xl md:text-3xl font-black text-slate-900 mb-4 uppercase tracking-tighter">Submission Failed</h3>
            <p class="text-slate-500 text-sm md:text-base mb-4 leading-relaxed italic font-medium" id="errorMessageText">An unexpected error occurred while transmitting your application. Please try again.</p>
            <button onclick="document.getElementById('errorMessage').classList.add('hidden')" class="block w-full py-5 bg-slate-950 text-white font-black rounded-2xl hover:bg-red-700 transition-all text-center uppercase tracking-widest text-[11px] shadow-2xl">Try Again</button>
        </div>
    </div>

    <script>window.REGISTRATION_BASE_URL = "{{ url('') }}";</script>
    <script src="{{ url('js/form-draft.js?v=3') }}"></script>
    <script src="{{ url('js/registration-form-sync.js?v=3') }}"></script>
    <script>
        lucide.createIcons();
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, { threshold: 0.05 });
        document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
    </script>
    @stack('formScripts')
</x-layout>
