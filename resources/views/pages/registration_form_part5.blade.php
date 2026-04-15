<x-layout>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO Registration Form - Part 5 | Directorate General of Law & Human Rights</title>
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
        <a href="{{ route('registration_form_part4') }}" class="p-2 -ml-2 text-slate-600">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-8 w-auto">
    </div>

    <!-- Navigation / Back Button (Desktop) -->
    <div class="fixed-back-container lg:fixed top-6 left-6 z-50">
        <a href="{{ route('registration_form_part4') }}"
            class="back-btn flex items-center gap-2 px-4 py-2 bg-white shadow-sm border border-slate-100 rounded-xl text-slate-600 font-bold text-xs uppercase tracking-wider">
            <i data-lucide="arrow-left" class="w-4 h-4 text-[#02B1EB]"></i>
            <span>Back to Part 4</span>
        </a>
    </div>

    <main class="max-w-6xl mx-auto px-4 py-12 md:py-16">
        <div class="text-center mb-10 reveal-on-scroll">
            <h1 class="font-outfit text-2xl md:text-3xl font-black text-slate-900 mb-2 tracking-tight uppercase">
                Registration Form - PART-5</h1>
            <p class="text-slate-500 font-medium text-xs md:text-sm italic uppercase tracking-widest">SCHEDULE-I |
                PART-5: PERSONNEL & FINANCIAL DETAILS</p>
        </div>

        <!-- Compact Glass Form Container -->
        <div class="glass-card rounded-3xl overflow-hidden reveal-on-scroll">
            <div class="bg-[#123B2D] h-1.5 w-full"></div>

            <form id="registrationForm5" class="p-6 md:p-10 space-y-12">

                <section>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">5</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-5:
                                PERSONNEL/STAFF DETAILS</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">SCHEDULE-I</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                            <h3 class="text-[11px] font-black text-slate-900 uppercase tracking-widest mb-4">12. Details
                                of Personnel/Staff/Employees:</h3>
                            <div class="grid grid-cols-1 md:grid-cols-5 gap-5">
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Total:
                                        *</label>
                                    <input type="number" required placeholder="0"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px] font-bold">
                                </div>
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">12.1
                                        Local *</label>
                                    <input type="number" required placeholder="0"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                                </div>
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">12.2
                                        Foreigner *</label>
                                    <input type="number" required placeholder="0"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                                </div>
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">12.3
                                        Male *</label>
                                    <input type="number" required placeholder="0"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                                </div>
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">12.4
                                        Female *</label>
                                    <input type="number" required placeholder="0"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                            <h3 class="text-[11px] font-black text-slate-900 uppercase tracking-widest mb-4">13.
                                Physical Infrastructure/Assets:</h3>
                            <div class="space-y-6">
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-3">13.1
                                        Office: 13.1.1 Status (Owned/Rented/Donated/provided by Govt/ANY other)
                                        *</label>
                                    <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                                        <label
                                            class="flex items-center gap-2 p-3 bg-white rounded-xl border border-slate-200 hover:border-indigo-200 cursor-pointer">
                                            <input type="radio" name="officeStatus" value="owned"
                                                class="w-4 h-4 text-indigo-600">
                                            <span class="text-[11px] font-bold text-slate-600">Owned</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 p-3 bg-white rounded-xl border border-slate-200 hover:border-indigo-200 cursor-pointer">
                                            <input type="radio" name="officeStatus" value="rented"
                                                class="w-4 h-4 text-indigo-600">
                                            <span class="text-[11px] font-bold text-slate-600">Rented</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 p-3 bg-white rounded-xl border border-slate-200 hover:border-indigo-200 cursor-pointer">
                                            <input type="radio" name="officeStatus" value="donated"
                                                class="w-4 h-4 text-indigo-600">
                                            <span class="text-[11px] font-bold text-slate-600">Donated</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 p-3 bg-white rounded-xl border border-slate-200 hover:border-indigo-200 cursor-pointer">
                                            <input type="radio" name="officeStatus" value="govt"
                                                class="w-4 h-4 text-indigo-600">
                                            <span class="text-[11px] font-bold text-slate-600">Provided by Govt</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 p-3 bg-white rounded-xl border border-slate-200 hover:border-indigo-200 cursor-pointer">
                                            <input type="radio" name="officeStatus" value="other"
                                                class="w-4 h-4 text-indigo-600">
                                            <span class="text-[11px] font-bold text-slate-600">Any other</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">13.1.2
                                        Detail of physical assets details of IT, Furniture, Transport etc: *</label>
                                    <textarea required rows="3"
                                        placeholder="Detail of physical assets details of IT, Furniture, Transport etc..."
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="pt-10 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-[#123B2D] text-white shadow-sm">5</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-5:
                                FINANCIAL DETAILS</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Organization
                                Budget</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="p-6 bg-slate-50/50 rounded-2xl border border-slate-100">
                            <h3 class="text-[11px] font-black text-slate-900 uppercase tracking-widest mb-4">14.
                                Financial details of the Organization:</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.1
                                        Title/Official name of Account *</label>
                                    <input type="text" required placeholder="Account Title"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px] font-bold">
                                </div>
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.2
                                        Bank Account No: *</label>
                                    <input type="text" required placeholder="Account Number"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                                </div>
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.3
                                        Name of the Bank: *</label>
                                    <input type="text" required placeholder="Bank Name"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                                </div>
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.4
                                        Yearly Estimated budget: *</label>
                                    <input type="number" required placeholder="Amount in PKR"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                                </div>
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.4.1
                                        Total Source Funded: *</label>
                                    <input type="text" required placeholder="Main funding sources"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                                </div>
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.4.2
                                        Total Foreign Funding (if any) in USD:</label>
                                    <input type="number" placeholder="Amount in USD"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                                </div>
                            </div>

                            <div class="space-y-5">
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-3">14.5
                                        Whether the Organization has been audited? (Yes/No) *</label>
                                    <div class="flex gap-6">
                                        <label
                                            class="flex items-center gap-2 cursor-pointer text-[12px] font-bold text-slate-600">
                                            <input type="radio" name="audited" value="yes"
                                                class="w-4 h-4 text-emerald-600"> Yes
                                        </label>
                                        <label
                                            class="flex items-center gap-2 cursor-pointer text-[12px] font-bold text-slate-600">
                                            <input type="radio" name="audited" value="no"
                                                class="w-4 h-4 text-emerald-600"> No
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.6
                                        If yes, name of the Audit Firm:</label>
                                    <input type="text" placeholder="Name of Audit Firm"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]">
                                </div>
                                <div>
                                    <label
                                        class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">14.7
                                        Source of Funding: *</label>
                                    <textarea required rows="2" placeholder="Source of Funding"
                                        class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="pt-10 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="section-icon bg-red-600 text-white shadow-sm">5</div>
                        <div>
                            <h2 class="font-outfit text-sm font-black text-slate-900 uppercase tracking-wide">PART-5:
                                LEGAL PROCEEDINGS</h2>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Compliance Check
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-slate-50/50 rounded-2xl border border-slate-100 space-y-6">
                        <div>
                            <label
                                class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-3 leading-relaxed">15.
                                Whether the Organization or any of its Management/Board Member or Focal person has been
                                involved in any civil/criminal/anti state activities? (Yes/No) *</label>
                            <div class="flex gap-6">
                                <label
                                    class="flex items-center gap-2 cursor-pointer text-[12px] font-bold text-slate-600">
                                    <input type="radio" name="legalStatus" value="yes" class="w-4 h-4 text-red-600"> Yes
                                </label>
                                <label
                                    class="flex items-center gap-2 cursor-pointer text-[12px] font-bold text-slate-600">
                                    <input type="radio" name="legalStatus" value="no" class="w-4 h-4 text-red-600"> No
                                </label>
                            </div>
                        </div>
                        <div>
                            <label
                                class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">15.1
                                If Yes, provide detail:</label>
                            <textarea rows="3" placeholder="Provide details..."
                                class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]"></textarea>
                        </div>
                        <div>
                            <label
                                class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">16.
                                Any other information:</label>
                            <textarea rows="2" placeholder="Any other info..."
                                class="w-full input-compact bg-white border border-slate-200 rounded-lg text-[13px]"></textarea>
                        </div>
                    </div>
                </section>

                <!-- Final Verification & Submission -->
                <section class="pt-10 border-t border-slate-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                        <div class="space-y-4">
                            <div>
                                <label
                                    class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Place:</label>
                                <input type="text" placeholder="City/Region"
                                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg text-[13px]">
                            </div>
                            <div>
                                <label
                                    class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Date:</label>
                                <input type="date"
                                    class="w-full input-compact bg-slate-50 border border-slate-200 rounded-lg text-[13px]">
                            </div>
                        </div>
                        <div
                            id="sealSignatureUploadTrigger"
                            class="flex flex-col items-center justify-center border-2 border-dashed border-slate-200 rounded-3xl p-6 bg-slate-50/30 cursor-pointer hover:border-[#02B1EB]/30 transition-colors">
                            <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center mb-3">
                                <i data-lucide="user-check" class="text-slate-400 w-8 h-8"></i>
                            </div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">
                                Official Seal & Signature Required</p>
                            <p class="text-[8px] text-slate-300 uppercase tracking-[0.2em] mt-1">(After Physical Print)
                            </p>
                            <p id="sealSignatureUploadName" class="mt-3 text-[11px] font-semibold text-slate-500 text-center">
                                No file selected
                            </p>
                            <input id="sealSignatureUploadInput" type="file" accept=".jpg,.jpeg,.png,.pdf" class="hidden">
                        </div>
                    </div>

                <!-- Next Step Action -->
                <div class="pt-10 border-t border-slate-100 flex flex-col items-center gap-5">
                    <div class="flex flex-col sm:flex-row gap-4 w-full max-w-2xl justify-center">
                        <button type="button" onclick="saveAsDraft()" 
                            class="save-draft-btn flex-1 py-4 bg-white text-slate-900 border-2 border-slate-100 font-bold text-sm rounded-2xl shadow-sm hover:bg-slate-50 hover:border-[#02b1eb]/30 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                            <i data-lucide="save" class="w-4 h-4 text-[#02B1EB]"></i>
                            <span>Save as Draft</span>
                        </button>
                        <a href="{{ route('registration_form_part6') }}"
                            class="flex-1 py-4 bg-[#123B2D] text-white font-bold text-sm rounded-2xl shadow-xl hover:bg-[#02B1EB] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-3 uppercase tracking-widest">
                            <span>Continue to Step 6</span>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                        Step 5 of 11: Personnel & Financial Details
                    </p>
                </div>
                </section>
            </form>
        </div>

        <div class="mt-12 text-center">
            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-[0.25em]">© 2026 Directorate General of Law
                & Human Rights | Khyber Pakhtunkhwa</p>
        </div>
    </main>

    <!-- Success Message Overlay -->
    <div id="successMessage"
        class="hidden fixed inset-0 bg-slate-900/95 backdrop-blur-md flex items-center justify-center z-[200] p-6">
        <div class="bg-white rounded-3xl p-8 max-w-sm w-full shadow-2xl text-center glass-card border border-white/20">
            <div
                class="w-20 h-20 bg-emerald-500 text-white rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg rotate-3">
                <i class="fas fa-check text-3xl"></i>
            </div>
            <h3 class="font-outfit text-2xl font-black text-slate-900 mb-2 uppercase">Submission Success!</h3>
            <p class="text-slate-500 text-[13px] leading-relaxed mb-8">Your registration request (SCHEDULE-I, PART A-G)
                has been successfully queued for review. Our team will verify the details and contact the focal person
                for physical verification of original documents.</p>
            <a href="{{ route('ngo_required_documents') }}"
                class="block w-full py-4 bg-slate-900 text-white font-black rounded-xl hover:bg-blue-600 transition-all text-center uppercase tracking-[0.2em] text-[11px]">Return
                to Portal</a>
        </div>
    </div>

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

        const sealSignatureUploadTrigger = document.getElementById('sealSignatureUploadTrigger');
        const sealSignatureUploadInput = document.getElementById('sealSignatureUploadInput');
        const sealSignatureUploadName = document.getElementById('sealSignatureUploadName');
        if (sealSignatureUploadTrigger && sealSignatureUploadInput) {
            sealSignatureUploadTrigger.addEventListener('click', () => sealSignatureUploadInput.click());
            sealSignatureUploadInput.addEventListener('change', () => {
                sealSignatureUploadName.textContent = sealSignatureUploadInput.files && sealSignatureUploadInput.files.length
                    ? sealSignatureUploadInput.files[0].name
                    : 'No file selected';
            });
        }
    </script>
</body>

</html>
</x-layout>
