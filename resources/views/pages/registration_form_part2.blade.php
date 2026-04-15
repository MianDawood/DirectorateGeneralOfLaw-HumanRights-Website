<x-layout>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO Registration Form - Part 2 | Directorate General of Law & Human Rights</title>
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
        <a href="{{ route('registration_form_part1') }}" class="p-2 -ml-2 text-slate-600">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-8 w-auto">
    </div>

    <!-- Navigation / Back Button (Desktop) -->
    <div class="fixed-back-container lg:fixed top-6 left-6 z-50">
        <a href="{{ route('registration_form_part1') }}"
            class="back-btn flex items-center gap-2 px-4 py-2 bg-white shadow-sm border border-slate-100 rounded-xl text-slate-600 font-bold text-xs uppercase tracking-wider">
            <i data-lucide="arrow-left" class="w-4 h-4 text-[#02B1EB]"></i>
            <span>Back to Part 1</span>
        </a>
    </div>

    <main class="max-w-6xl mx-auto px-4 py-12 md:py-16">
        <!-- Minimal Form Header -->
        <div class="text-center mb-10 reveal-on-scroll">
            <h1 class="font-outfit text-2xl md:text-3xl font-black text-slate-900 mb-2 tracking-tight uppercase">
                Registration Form - PART-2</h1>
            <p class="text-slate-500 font-medium text-xs md:text-sm italic uppercase tracking-widest">SCHEDULE-I |
                PART-2: ADDRESS INFORMATION</p>
        </div>

        <!-- Compact Glass Form Container -->
        <div class="glass-card rounded-3xl overflow-hidden reveal-on-scroll">
            <div class="bg-[#123B2D] h-1.5 w-full"></div>

            <form id="registrationForm2" class="p-6 md:p-10 space-y-12">

                <section>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">2</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-2:
                                Head Office</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Primary Contact &
                                Location</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Registered
                                Address *</label>
                            <textarea name="headRegisteredAddress" required rows="2"
                                placeholder="Enter complete registered address"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Postal
                                Address *</label>
                            <textarea name="headPostalAddress" required rows="2"
                                placeholder="Enter complete postal address"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Contact
                                Details (Official) Telephone</label>
                            <input type="tel" name="headTelephone" placeholder="+92-XXX-XXXXXXX"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Mobile
                                (Official) *</label>
                            <input type="tel" name="headMobile" required placeholder="+92-3XX-XXXXXXX"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Fax</label>
                            <input type="text" name="headFax" placeholder="Fax Number"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Email
                                ID *</label>
                            <input type="email" name="headEmail" required placeholder="official@ngo.org"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Official
                                Website</label>
                            <input type="url" name="headWebsite" placeholder="https://www.ngo.org"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Other
                                Social Media</label>
                            <input type="text" name="headSocialMedia" placeholder="Facebook, Twitter, LinkedIn URLs"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                    </div>
                </section>

                <section class="pt-10 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#02b1eb] text-white shadow-sm">2</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-2:
                                Registered Liaison/Project Address</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Secondary Office
                                Details</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Registered
                                Liaison/Project Address</label>
                            <textarea name="liaisonAddress" rows="2"
                                placeholder="Enter complete liaison/project address"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Contact
                                Details (Official) Telephone</label>
                            <input type="tel" name="liaisonTelephone" placeholder="+92-XXX-XXXXXXX"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Mobile
                                (Official)</label>
                            <input type="tel" name="liaisonMobile" placeholder="+92-3XX-XXXXXXX"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Fax</label>
                            <input type="text" name="liaisonFax" placeholder="Fax Number"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Email
                                ID</label>
                            <input type="email" name="liaisonEmail" placeholder="liaison@ngo.org"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Official
                                Website</label>
                            <input type="url" name="liaisonWebsite" placeholder="https://www.ngo.org/liaison"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Other
                                Social Media</label>
                            <input type="text" name="liaisonSocialMedia" placeholder="Social Media URLs"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                    </div>
                </section>

                <section class="pt-10 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">2</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-2:
                                District/Field/Other/Project Address</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Regional Office
                                Details</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">District/Field/Other/Project
                                Address</label>
                            <textarea name="districtAddress" rows="2"
                                placeholder="Enter complete regional/field address"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Contact
                                Details (Official) Telephone</label>
                            <input type="tel" name="districtTelephone" placeholder="+92-XXX-XXXXXXX"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Mobile
                                (Official)</label>
                            <input type="tel" name="districtMobile" placeholder="+92-3XX-XXXXXXX"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Fax</label>
                            <input type="text" name="districtFax" placeholder="Fax Number"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Email
                                ID</label>
                            <input type="email" name="districtEmail" placeholder="field@ngo.org"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Official
                                Website</label>
                            <input type="url" name="districtWebsite" placeholder="https://www.ngo.org/field"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Other
                                Social Media</label>
                            <input type="text" name="districtSocialMedia" placeholder="Social Media URLs"
                                class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium">
                        </div>
                    </div>
                </section>

                <section class="pt-10 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">2</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-2:
                                Operational Area</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Outreach &
                                Coverage</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label
                            class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1.5">Operational
                            area to include branch and sub offices in a District, City, Town or Union Council *</label>
                        <textarea name="operationalArea" required rows="3"
                            placeholder="List all operational areas, branches, and sub-offices..."
                            class="w-full input-compact bg-slate-50/50 border border-slate-200 rounded-lg focus:outline-none font-medium text-[13px]"></textarea>
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
                        <a href="{{ route('registration_form_part3') }}"
                            class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                            <span>Continue to Step 3</span>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                        Step 2 of 11: Address Information
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