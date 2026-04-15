<x-layout>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO Registration Form - Part 3 | Directorate General of Law & Human Rights</title>
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
            opacity: 0;
            transform: translateY(15px);
            transition: all 0.5s ease-out;
        }

        .reveal-on-scroll.revealed {
            opacity: 1;
            transform: translateY(0);
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
    </style>
</head>

<body class="antialiased">
    <!-- Mobile Header -->
    <div class="mobile-header">
        <a href="{{ route('registration_form_part2') }}" class="p-2 -ml-2 text-slate-600">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-8 w-auto">
    </div>

    <!-- Navigation / Back Button (Desktop) -->
    <div class="fixed-back-container lg:fixed top-6 left-6 z-50">
        <a href="{{ route('registration_form_part2') }}"
            class="back-btn flex items-center gap-2 px-4 py-2 bg-white shadow-sm border border-slate-100 rounded-xl text-slate-600 font-bold text-xs uppercase tracking-wider">
            <i data-lucide="arrow-left" class="w-4 h-4 text-[#02B1EB]"></i>
            <span>Back to Part 2</span>
        </a>
    </div>

    <main class="max-w-6xl mx-auto px-4 py-12 md:py-16">
        <!-- Minimal Form Header -->
        <div class="text-center mb-10 reveal-on-scroll">
            <h1 class="font-outfit text-2xl md:text-3xl font-black text-slate-900 mb-2 tracking-tight uppercase">
                Registration Form - PART-3</h1>
            <p class="text-slate-500 font-medium text-xs md:text-sm italic uppercase tracking-widest">SCHEDULE-I |
                PART-3: OBJECTIVES & STRATEGY</p>
        </div>

        <!-- Compact Glass Form Container -->
        <div class="glass-card rounded-3xl overflow-hidden reveal-on-scroll">
            <div class="bg-[#123B2D] h-1.5 w-full"></div>

            <form id="registrationForm3" class="p-6 md:p-10 space-y-12">

                <section>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">3</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-3:
                                General Objectives</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Primary Goals</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">a.
                            General Objectives *</label>
                        <textarea name="generalObjectives" required rows="3"
                            placeholder="Enter your general objectives..."
                            class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
                    </div>
                </section>

                <!-- SECTION: Geographical Focus -->
                <section class="pt-10 border-t border-slate-100">
                    <div class="space-y-4">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">b.
                            Geographical Focus of Work (Specify District in Khyber Pakhtunkhwa) *</label>
                        <textarea name="geographicalFocus" required rows="2"
                            placeholder="e.g. Peshawar, Swat, Mardan..."
                            class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
                    </div>
                </section>

                <section class="pt-10 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#02b1eb] text-white shadow-sm">3</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-3:
                                Thematic Focus</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Areas of Interest
                            </p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label
                            class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Thematic
                            Focus *</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="thematicFocus[]" value="human_rights"
                                    class="w-4 h-4 rounded text-[#02B1EB] focus:ring-primary/20">
                                <span
                                    class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Human
                                    Rights Protection</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="thematicFocus[]" value="legal_aid"
                                    class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                                <span
                                    class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Legal
                                    Aid & Access to Justice</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="thematicFocus[]" value="gender"
                                    class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                                <span
                                    class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Gender
                                    Equality & Women's Rights</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="thematicFocus[]" value="child"
                                    class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                                <span
                                    class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Child
                                    Rights & Protection</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="thematicFocus[]" value="disabilities"
                                    class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                                <span
                                    class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Rights
                                    of Person with Disabilities</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="thematicFocus[]" value="minorities"
                                    class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                                <span
                                    class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Transgender
                                    & Minority Rights</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="thematicFocus[]" value="refugees"
                                    class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                                <span
                                    class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Refugee
                                    & Migrant Rights</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="thematicFocus[]" value="expression"
                                    class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                                <span
                                    class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Freedom
                                    of Expression & Assembly</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="thematicFocus[]" value="labor"
                                    class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                                <span
                                    class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Labor
                                    & Employment Rights</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="thematicFocus[]" value="violence"
                                    class="w-4 h-4 rounded text-[#02B1EB] focus:ring-primary/20">
                                <span
                                    class="text-[11px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Protection
                                    Against Gender-Based Violence</span>
                            </label>
                            <div class="md:col-span-2">
                                <label
                                    class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 group">
                                    <input type="checkbox" name="thematicFocusOther"
                                        class="w-4 h-4 rounded text-blue-600 focus:ring-primary/20">
                                    <input type="text" placeholder="Other (Please specify)"
                                        class="w-full bg-transparent border-none focus:outline-none text-[11px] font-bold text-slate-600">
                                </label>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="pt-10 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">3</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-3:
                                Beneficiaries</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Target Groups</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label
                            class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">Beneficiaries
                            (Target Groups) *</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                                    <input type="checkbox" name="beneficiaries[]" value="children"
                                    class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Children</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                                    <input type="checkbox" name="beneficiaries[]" value="women"
                                    class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Women</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                                    <input type="checkbox" name="beneficiaries[]" value="transgender"
                                    class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Transgender Person</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                                    <input type="checkbox" name="beneficiaries[]" value="disabilities"
                                    class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Persons with Disabilities
                                    (PWDs)</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                                    <input type="checkbox" name="beneficiaries[]" value="orphans"
                                    class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Orphans</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                                    <input type="checkbox" name="beneficiaries[]" value="refugees"
                                    class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Refugees & Migrants</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                                    <input type="checkbox" name="beneficiaries[]" value="elderly"
                                    class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Elderly Persons</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-amber-100 transition-all cursor-pointer group">
                                    <input type="checkbox" name="beneficiaries[]" value="government"
                                    class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Government Institutions</span>
                            </label>
                            <div class="md:col-span-2">
                                <label
                                    class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 group">
                                    <input type="checkbox" name="beneficiariesOther"
                                        class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/20">
                                    <input type="text" placeholder="Other (Please specify)"
                                        class="w-full bg-transparent border-none focus:outline-none text-[11px] font-bold text-slate-600">
                                </label>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="pt-10 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">3</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-3:
                                Operational Method</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">How You Operate
                            </p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4">How
                            Does Your Non-Governmental Organization Operate? *</label>
                        <div class="space-y-2">
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="operateMethod[]" value="training"
                                    class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Provides Human Rights Training &
                                    Capacity Building</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="operateMethod[]" value="legal_awareness"
                                    class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Conducts Legal Awareness &
                                    Rights-Based Advocacy</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="operateMethod[]" value="survivor_support"
                                    class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Support Survivors of Violence &
                                    Discrimination</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="operateMethod[]" value="referral"
                                    class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Provides referral & Protection
                                    Services</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="operateMethod[]" value="research"
                                    class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Conducts Research & Policy
                                    Analysis</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="operateMethod[]" value="psychological"
                                    class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Provides Psychological & Mental
                                    Health Support</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 hover:border-emerald-100 transition-all cursor-pointer group">
                                <input type="checkbox" name="operateMethod[]" value="reforms"
                                    class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                                <span class="text-[11px] font-bold text-slate-600">Strengthens Institutional Reforms &
                                    Policy Development</span>
                            </label>
                            <label
                                class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100 group">
                                <input type="checkbox" name="operateMethodOther"
                                    class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500/20">
                                <input type="text" placeholder="Other (Please specify)"
                                    class="w-full bg-transparent border-none focus:outline-none text-[11px] font-bold text-slate-600">
                            </label>
                        </div>
                    </div>
                </section>

                <section class="pt-10 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">3</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-3:
                                Collaboration</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Partnerships</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <label
                            class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Collaboration
                            with Local Non-Governmental Organizations/ Non-Profit Organizations (if applicable)</label>

                        <div class="space-y-4">
                            <div>
                                <label
                                    class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Name
                                    of Partner Non-Governmental Organization</label>
                                <input type="text" name="partnerNGO" placeholder="Enter partner NGO name"
                                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[11px]">
                            </div>
                            <div>
                                <label
                                    class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Nature
                                    of Collaboration</label>
                                <input type="text" name="natureCollaboration" placeholder="Describe the partnership..."
                                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[11px]">
                            </div>
                            <div>
                                <label
                                    class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Joint
                                    Activities</label>
                                <input type="text" name="jointActivities" placeholder="List key joint activities..."
                                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[11px]">
                            </div>
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
                        <a href="{{ route('registration_form_part4') }}"
                            class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                            <span>Continue to Step 4</span>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                        Step 3 of 11: Objectives & Strategy
                    </p>
                </div>
            </form>
        </div>

        <div class="mt-12 text-center">
            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-[0.25em]">© 2026 Directorate General of Law
                & Human Rights | Khyber Pakhtunkhwa</p>
        </div>
    </main>

    <script src="js/form-draft.js"></script>
    <script src="js/registration-form-sync.js"></script>
    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Reveal on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
    </script>
</body>

</html>
</x-layout>