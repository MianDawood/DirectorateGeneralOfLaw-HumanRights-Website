<x-layout>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO Registration Form - Part 9 | Directorate General of Law & Human Rights</title>
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

        .label-compact {
            font-size: 9px;
            font-weight: 900;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            margin-bottom: 0.4rem;
            display: block;
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
    </style>
    <script>
        document.documentElement.classList.add('js-hook');
    </script>
</head>

<body class="antialiased">
    <!-- Mobile Header -->
    <div class="mobile-header">
        <a href="{{ route('registration_form_part8') }}" class="p-2 -ml-2 text-slate-600">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-8 w-auto">
    </div>

    <!-- Navigation / Back Button (Desktop) -->
    <div class="fixed-back-container lg:fixed top-6 left-6 z-50">
        <a href="{{ route('registration_form_part8') }}"
            class="back-btn flex items-center gap-2 px-4 py-2 bg-white shadow-sm border border-slate-100 rounded-xl text-slate-600 font-bold text-xs uppercase tracking-wider">
            <i data-lucide="arrow-left" class="w-4 h-4 text-[#02B1EB]"></i>
            <span>Back to Part 8</span>
        </a>
    </div>

    <main class="max-w-6xl mx-auto px-4 py-12 md:py-16">
        <!-- Minimal Form Header -->
        <div class="text-center mb-10 reveal-on-scroll">
            <h1 class="font-outfit text-2xl md:text-3xl font-black text-slate-900 mb-2 tracking-tight uppercase">
                Registration Form - PART-9</h1>
            <p class="text-slate-500 font-medium text-xs md:text-sm italic uppercase tracking-widest">SCHEDULE-I |
                PART-9: EXPANDED FINANCIAL & AUDIT INFORMATION</p>
        </div>

        <!-- Compact Glass Form Container -->
        <div class="glass-card rounded-3xl overflow-hidden reveal-on-scroll">
            <div class="bg-[#123B2D] h-1.5 w-full"></div>

            <form id="registrationFormFinal" class="p-6 md:p-10 space-y-12">

                <section>
                    <div class="flex items-center gap-4 mb-10">
                        <div class="section-icon bg-[#123B2D] text-white shadow-lg">9</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-9: 
                                Financial Information (Continued)</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">Ancillary Accounts & Funding Diversity</p>
                        </div>
                    </div>

                    <!-- Other Approved Accounts -->
                    <div class="financial-card mb-12">
                        <h3 class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-8 border-b border-slate-50 pb-4">Other Approved Accounts (if applicable)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="label-compact px-1">Account Title</label>
                                <input type="text" placeholder="Entry Title" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                            </div>
                            <div class="space-y-2">
                                <label class="label-compact px-1">Account IBAN</label>
                                <input type="text" placeholder="PK00 XXXX XXXX XXXX" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl font-bold uppercase tracking-widest">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="label-compact px-1">Account Number</label>
                                <input type="text" placeholder="Secondary Account No." class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                            </div>
                            <div class="space-y-2">
                                <label class="label-compact px-1">Branch Address</label>
                                <input type="text" placeholder="Full branch location" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl">
                            </div>
                        </div>
                    </div>

                    <!-- Funding Sources Checklist -->
                    <div class="space-y-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="label-compact mb-0">Funding Source (Select All Applicable) *</h3>
                            <span class="text-[8px] font-black text-slate-300 uppercase italic leading-none">Verified channels only</span>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 mb-8">
                            <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Bilateral Donors</span></label>
                            <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">INGOs</span></label>
                            <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Federal / Provincial Gov</span></label>
                            <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Int./Nat. Organizations</span></label>
                            <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Voluntary Contributions</span></label>
                            <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Membership Fees</span></label>
                            <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Donations</span></label>
                            <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Fundraising</span></label>
                            <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Foundations</span></label>
                            <label class="check-pill"><input type="checkbox" class="w-4 h-4 rounded"><span class="text-[10px] font-bold">Multilateral Agencies</span></label>
                            <div class="col-span-1"><input type="text" placeholder="Other: Specify" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl text-[10px] font-semibold"></div>
                        </div>
                    </div>

                    <!-- Annual Audit of Accounts -->
                    <div class="financial-card pt-10">
                        <div class="flex items-center gap-3 mb-8 border-b border-slate-50 pb-4">
                            <i data-lucide="file-check" class="w-5 h-5 text-[#02B1EB]"></i>
                            <h3 class="text-[11px] font-black text-slate-800 uppercase tracking-[0.2em]">Annual Audit of Accounts</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="space-y-4">
                                <div><label class="label-compact px-1">Date of Last Audit *</label><input type="date" required class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                                <div><label class="label-compact px-1">Due Date of Next Audit *</label><input type="date" required class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                            </div>
                            <div class="space-y-4">
                                <div><label class="label-compact px-1">Name of Recognized Auditor *</label><input type="text" required placeholder="Certified Professional/Firm" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl font-bold"></div>
                                <div><label class="label-compact px-1">Audit Objections (if any)</label><input type="text" placeholder="Summary of findings" class="w-full input-compact bg-slate-50 border border-slate-200 rounded-xl"></div>
                            </div>
                        </div>

                        <!-- File Upload -->
                        <div class="space-y-4 mt-12 bg-[#02b1eb]/5 p-8 rounded-2xl border-2 border-dashed border-[#02b1eb]/20">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="label-compact px-1 mb-0">Attach Last Three Years Audit Report (if applicable)</h4>
                                <span class="bg-[#123B2D] text-white text-[8px] font-black px-3 py-1 rounded-full uppercase tracking-tighter shadow-sm">Max 10MB per unit</span>
                            </div>
                            <div id="auditUploadTrigger" class="flex flex-col items-center justify-center py-6 group cursor-pointer">
                                <i data-lucide="upload-cloud" class="w-12 h-12 text-[#02B1EB]/50 group-hover:text-[#02B1EB] transition-colors mb-4"></i>
                                <p class="text-[11px] font-bold text-slate-600 mb-2">Drag and drop report files here</p>
                                <p class="text-[9px] text-slate-400 font-medium">Upload up to 5 supported files (PDF, JPG, PNG)</p>
                                <p id="auditUploadName" class="mt-3 text-[11px] font-semibold text-slate-500 text-center">No file selected</p>
                                <input id="auditUploadInput" type="file" multiple accept=".pdf,.jpg,.jpeg,.png" class="hidden">
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
                        <a href="{{ route('registration_form_part10') }}"
                            class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                            <span>Continue to Step 10</span>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                        Step 9 of 11: Expanded Financial & Audit Information
                    </p>
                </div>
            </form>
        </div>
    </main>

    <!-- Success Message Overlay -->
    <div id="successMessage" class="hidden fixed inset-0 bg-slate-950/40 backdrop-blur-xl flex items-center justify-center z-[500] p-6">
        <div class="bg-white rounded-[3rem] p-12 md:p-16 max-w-lg w-full shadow-3xl text-center border border-slate-100">
            <div class="w-24 h-24 bg-indigo-100 text-indigo-600 rounded-[2rem] flex items-center justify-center mx-auto mb-8 shadow-sm">
                <i data-lucide="clipboard-check" class="w-12 h-12"></i>
            </div>
            <h3 class="font-outfit text-2xl md:text-3xl font-black text-slate-900 mb-4 uppercase tracking-tighter">Application Packet Transmitted</h3>
            <p class="text-slate-500 text-sm md:text-base mb-10 leading-relaxed font-medium italic">Your comprehensive Schedule-I data, including all financial and audit records, has been successfully verified and transmitted to the Directorate HQ.</p>
            <a href="{{ route('ngo_required_documents') }}" class="block w-full py-5 bg-slate-950 text-white font-black rounded-2xl hover:bg-indigo-700 transition-all text-center uppercase tracking-widest text-[11px] shadow-2xl">Return to Portal Dashboard</a>
        </div>
    </div>

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

        const auditUploadTrigger = document.getElementById('auditUploadTrigger');
        const auditUploadInput = document.getElementById('auditUploadInput');
        const auditUploadName = document.getElementById('auditUploadName');
        if (auditUploadTrigger && auditUploadInput) {
            auditUploadTrigger.addEventListener('click', () => auditUploadInput.click());
            auditUploadInput.addEventListener('change', () => {
                if (!auditUploadName) return;
                if (auditUploadInput.files && auditUploadInput.files.length) {
                    auditUploadName.textContent = Array.from(auditUploadInput.files).map(file => file.name).join(', ');
                } else {
                    auditUploadName.textContent = 'No file selected';
                }
            });
        }
    </script>
</body>
</html>
</x-layout>
