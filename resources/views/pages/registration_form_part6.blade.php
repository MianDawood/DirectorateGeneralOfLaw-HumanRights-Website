<x-layout>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO Registration Form - Part 6 | Directorate General of Law & Human Rights</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            background-image:
                radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.03) 0, transparent 50%),
                radial-gradient(at 100% 0%, rgba(13, 71, 161, 0.03) 0, transparent 50%);
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

        /* Custom Scrollbar */
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
        }

        .check-pill:hover {
            background: #fff;
            border-color: #e2e8f0;
        }

        .label-compact {
            font-size: 9px;
            font-weight: 900;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.4rem;
            display: block;
        }
    </style>
    <script>
        document.documentElement.classList.add('js-hook');
    </script>
</head>

<body class="antialiased">
    <!-- Mobile Header -->
    <div class="mobile-header">
        <a href="{{ route('registration_form_part5') }}" class="p-2 -ml-2 text-slate-600">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-8 w-auto">
    </div>

    <!-- Navigation / Back Button (Desktop) -->
    <div class="fixed-back-container lg:fixed top-6 left-6 z-50">
        <a href="{{ route('registration_form_part5') }}"
            class="back-btn flex items-center gap-2 px-4 py-2 bg-white shadow-sm border border-slate-100 rounded-xl text-slate-600 font-bold text-xs uppercase tracking-wider">
            <i data-lucide="arrow-left" class="w-4 h-4 text-[#02B1EB]"></i>
            <span>Back to Part 5</span>
        </a>
    </div>

    <main class="max-w-6xl mx-auto px-4 py-12 md:py-16">
        <!-- Minimal Form Header -->
        <div class="text-center mb-10 reveal-on-scroll">
            <h1 class="font-outfit text-2xl md:text-3xl font-black text-slate-900 mb-2 tracking-tight uppercase">
                Registration Form - PART-6</h1>
            <p class="text-slate-500 font-medium text-xs md:text-sm italic uppercase tracking-widest">SCHEDULE-I |
                PART-6: PROJECT IMPLEMENTATION</p>
        </div>

        <!-- Compact Glass Form Container -->
        <div class="glass-card rounded-3xl overflow-hidden reveal-on-scroll">
            <div class="bg-[#123B2D] h-1.5 w-full"></div>

            <form id="registrationFormFinal" class="p-6 md:p-10 space-y-12">

                <section>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">6</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-6:
                                PROJECTS / PROGRAMMES / ASSIGNMENTS</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Under
                                Implementation Phase</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                        <div class="space-y-4 p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                            <label class="label-compact">Number of Ongoing Projects:</label>
                            <input type="number" required placeholder="0"
                                class="w-full input-compact bg-white border border-slate-200 rounded-lg focus:ring-1 focus:ring-[#02b1eb]">
                        </div>
                        <div class="space-y-4 p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                            <label class="label-compact">Total Ongoing Projects (Summary):</label>
                            <input type="text" required placeholder="Summary"
                                class="w-full input-compact bg-white border border-slate-200 rounded-lg">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Project Blocks (Consistent 1-6) -->
                        <div class="project-block"><span class="sno-badge">S.No. 1</span>
                            <div class="space-y-4">
                                <div><label class="label-compact">Project Name:</label><input type="text"
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div><label class="label-compact">Target Area:</label><input type="text"
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Start Date:</label><input type="month"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Exp Completion:</label><input type="month"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Total Funds:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Donor:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Thematic Focus:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Beneficiaries:</label><input type="number"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="project-block"><span class="sno-badge">S.No. 2</span>
                            <div class="space-y-4">
                                <div><label class="label-compact">Project Name:</label><input type="text"
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div><label class="label-compact">Target Area:</label><input type="text"
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Start Date:</label><input type="month"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Exp Completion:</label><input type="month"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Total Funds:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Donor:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Thematic Focus:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Beneficiaries:</label><input type="number"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="project-block"><span class="sno-badge">S.No. 3</span>
                            <div class="space-y-4">
                                <div><label class="label-compact">Project Name:</label><input type="text"
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div><label class="label-compact">Target Area:</label><input type="text"
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Start Date:</label><input type="month"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Exp Completion:</label><input type="month"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Total Funds:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Donor:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Thematic Focus:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Beneficiaries:</label><input type="number"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="project-block"><span class="sno-badge">S.No. 4</span>
                            <div class="space-y-4">
                                <div><label class="label-compact">Project Name:</label><input type="text"
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div><label class="label-compact">Target Area:</label><input type="text"
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Start Date:</label><input type="month"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Exp Completion:</label><input type="month"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Total Funds:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Donor:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Thematic Focus:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Beneficiaries:</label><input type="number"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="project-block"><span class="sno-badge">S.No. 5</span>
                            <div class="space-y-4">
                                <div><label class="label-compact">Project Name:</label><input type="text"
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div><label class="label-compact">Target Area:</label><input type="text"
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Start Date:</label><input type="month"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Exp Completion:</label><input type="month"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Total Funds:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Donor:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Thematic Focus:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Beneficiaries:</label><input type="number"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="project-block"><span class="sno-badge">S.No. 6</span>
                            <div class="space-y-4">
                                <div><label class="label-compact">Project Name:</label><input type="text"
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div><label class="label-compact">Target Area:</label><input type="text"
                                        class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Start Date:</label><input type="month"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Exp Completion:</label><input type="month"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Total Funds:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Donor:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label class="label-compact">Thematic Focus:</label><input type="text"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                    <div><label class="label-compact">Beneficiaries:</label><input type="number"
                                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="grid grid-cols-1 md:grid-cols-2 gap-10 pt-8 border-t border-slate-200/60">
                    <div class="space-y-6">
                        <label class="label-compact">Project Director Name:</label>
                        <input type="text" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                        <label class="label-compact">Total Projects Cost:</label>
                        <input type="text" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg">
                    </div>
                    <div class="p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                        <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Funding
                            Sources:</h3>
                        <div class="space-y-3">
                            <input type="text" placeholder="International Donors"
                                class="w-full input-compact bg-white border border-slate-200 rounded-lg">
                            <input type="text" placeholder="Government Depts"
                                class="w-full input-compact bg-white border border-slate-200 rounded-lg">
                            <input type="text" placeholder="Other Sources"
                                class="w-full input-compact bg-white border border-slate-200 rounded-lg">
                        </div>
                    </div>
                </section>

                <section class="pt-8 border-t border-slate-200/60">
                    <h3 class="label-compact mb-6">Thematic Focus (Select All Applicable):</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Human Rights Protection</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Legal Aid & Justice</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Gender equality</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Child Protection</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">minority rights</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Transgender Rights</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Refugee Rights</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Labor Rights</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">GBV Protection</span></label>
                    </div>
                </section>

                <section class="pt-8 border-t border-slate-200/60">
                    <h3 class="label-compact mb-6">Beneficiaries (Target Groups):</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Children</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Women</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Orphans</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">PWDs</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Transgender</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Elderly</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">Refugees</span></label>
                        <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span
                                class="text-[10px] font-bold">GBV Survivors</span></label>
                    </div>
                    <div class="mt-6 p-4 bg-slate-50 border border-slate-100 rounded-xl flex items-center gap-4">
                        <label class="label-compact mb-0 w-48">Total Beneficiaries Count:</label>
                        <input type="text" placeholder="Total reachable population"
                            class="flex-1 input-compact bg-white border border-slate-200 rounded-lg">
                    </div>
                </section>

                <section class="grid grid-cols-1 md:grid-cols-2 gap-10 pt-8 border-t border-slate-200/60">
                    <div>
                        <h3 class="label-compact mb-4">Scope of Activities:</h3>
                        <textarea rows="4"
                            class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl resize-none"></textarea>
                    </div>
                    <div class="space-y-4">
                        <h3 class="label-compact mb-4">Clearance / Permission:</h3>
                        <div class="space-y-3">
                            <label class="check-pill justify-between px-4"><span
                                    class="text-[11px] font-bold uppercase">Office Est. Clearance</span><input
                                    type="checkbox" class="w-4 h-4"></label>
                            <label class="check-pill justify-between px-4"><span
                                    class="text-[11px] font-bold uppercase">Travel Permits</span><input type="checkbox"
                                    class="w-4 h-4"></label>
                            <label class="check-pill justify-between px-4"><span
                                    class="text-[11px] font-bold uppercase">Restricted Zones Ops</span><input
                                    type="checkbox" class="w-4 h-4"></label>
                        </div>
                    </div>
                </section>

                <!-- Next Step Action -->
                <div class="pt-10 border-t border-slate-100 flex flex-col items-center gap-5">
                    <div class="flex flex-col sm:flex-row gap-4 w-full max-w-2xl justify-center">
                        <button type="button" onclick="saveAsDraft()" 
                            class="save-draft-btn flex-1 py-4 bg-white text-slate-900 border-2 border-slate-100 font-bold text-sm rounded-2xl shadow-sm hover:bg-slate-50 hover:border-[#02b1eb]/30 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                            <i data-lucide="save" class="w-4 h-4 text-[#02B1EB]"></i>
                            <span>Save as Draft</span>
                        </button>
                        <a href="{{ route('registration_form_part7') }}"
                            class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                            <span>Continue to Step 7</span>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                        Step 6 of 11: Project Implementation
                    </p>
                </div>
            </form>
        </div>
    </main>

    <script src="js/form-draft.js"></script>
    <script src="js/registration-form-sync.js"></script>
    <script>
        try { lucide.createIcons(); } catch (err) { console.error(err); }

        const reveals = document.querySelectorAll('.reveal-on-scroll');
        if ('IntersectionObserver' in window) {
            const obs = new IntersectionObserver((entries) => {
                entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('revealed'); });
            }, { threshold: 0.1 });
            reveals.forEach(el => obs.observe(el));
        } else {
            reveals.forEach(el => el.classList.add('revealed'));
        }
    </script>
</body>

</html>
</x-layout>