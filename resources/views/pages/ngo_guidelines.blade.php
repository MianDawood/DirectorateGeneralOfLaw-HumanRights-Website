<x-layout>
<main>
        <section class="bg-gradient-to-br from-[#123B2D] to-[#1a5240] py-24 relative overflow-hidden">
            <!-- Decoration -->
            <div
                class="absolute top-0 right-0 w-[500px] h-[500px] bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl">
            </div>

            <div class="max-w-[1536px] mx-auto px-6 lg:px-20 relative z-10">
                <div class="flex items-center gap-3 mb-6 reveal-on-scroll">
                    <span class="w-12 h-[2px] bg-[#02B1EB]"></span>
                    <span class="text-[#02B1EB] text-xs font-black uppercase tracking-[0.3em]">NGO Registration</span>
                </div>
                <h1
                    class="font-outfit text-5xl md:text-7xl font-black text-white uppercase tracking-tight mb-6 reveal-on-scroll">
                    Registration <br><span class="text-[#02B1EB]">Guidelines</span>
                </h1>
                <p class="text-white/70 text-lg md:text-xl max-w-2xl leading-relaxed reveal-on-scroll">
                    Step-by-step guidelines for NGO registration under the Khyber Pakhtunkhwa Non-Governmental
                    Organizations Registration Rules, 2024.
                </p>
            </div>
        </section>

        <section class="py-24 bg-white">
            <div class="max-w-[1200px] mx-auto px-6 lg:px-20">
                <div class="space-y-12 reveal-stagger">
                    <!-- Step 1 -->
                    <div class="flex flex-col md:flex-row items-start gap-10 group">
                        <div
                            class="w-16 h-16 bg-[#123B2D] text-white rounded-2xl flex items-center justify-center shrink-0 font-outfit font-black text-2xl shadow-xl group-hover:scale-110 transition-transform duration-500">
                            1</div>
                        <div class="pt-2">
                            <h3 class="font-outfit text-2xl font-bold text-[#123B2D] uppercase mb-4 tracking-tight">
                                Obtain Registration Form</h3>
                            <p class="text-slate-500 text-lg leading-relaxed">Download the official registration form
                                from the Directorate's website or collect a physical copy from the office located at
                                Plot No. 21, Sector B-2, Phase-V, Hayatabad, Peshawar.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col md:flex-row items-start gap-10 group">
                        <div
                            class="w-16 h-16 bg-[#02B1EB] text-white rounded-2xl flex items-center justify-center shrink-0 font-outfit font-black text-2xl shadow-xl group-hover:scale-110 transition-transform duration-500">
                            2</div>
                        <div class="pt-2">
                            <h3 class="font-outfit text-2xl font-bold text-[#123B2D] uppercase mb-4 tracking-tight">
                                Complete the Application</h3>
                            <p class="text-slate-500 text-lg leading-relaxed">Fill in all required fields with accurate
                                information. Attach all required supporting documents as listed in the Required
                                Documents section.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col md:flex-row items-start gap-10 group">
                        <div
                            class="w-16 h-16 bg-[#123B2D] text-white rounded-2xl flex items-center justify-center shrink-0 font-outfit font-black text-2xl shadow-xl group-hover:scale-110 transition-transform duration-500">
                            3</div>
                        <div class="pt-2">
                            <h3 class="font-outfit text-2xl font-bold text-[#123B2D] uppercase mb-4 tracking-tight">Pay
                                Registration Fee</h3>
                            <p class="text-slate-500 text-lg leading-relaxed">Deposit the prescribed registration fee
                                through Treasury Challan. Keep evidence of payment for submission with your application.
                            </p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex flex-col md:flex-row items-start gap-10 group">
                        <div
                            class="w-16 h-16 bg-[#02B1EB] text-white rounded-2xl flex items-center justify-center shrink-0 font-outfit font-black text-2xl shadow-xl group-hover:scale-110 transition-transform duration-500">
                            4</div>
                        <div class="pt-2">
                            <h3 class="font-outfit text-2xl font-bold text-[#123B2D] uppercase mb-4 tracking-tight">
                                Submit Application</h3>
                            <p class="text-slate-500 text-lg leading-relaxed">Submit the completed application along
                                with all supporting documents to the Directorate General of Law & Human Rights, Khyber
                                Pakhtunkhwa.</p>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="flex flex-col md:flex-row items-start gap-10 group">
                        <div
                            class="w-16 h-16 bg-[#123B2D] text-white rounded-2xl flex items-center justify-center shrink-0 font-outfit font-black text-2xl shadow-xl group-hover:scale-110 transition-transform duration-500">
                            5</div>
                        <div class="pt-2">
                            <h3 class="font-outfit text-2xl font-bold text-[#123B2D] uppercase mb-4 tracking-tight">
                                Verification & Approval</h3>
                            <p class="text-slate-500 text-lg leading-relaxed">Your application will be reviewed and
                                verified. Upon successful verification, a registration certificate will be issued to
                                your organization.</p>
                        </div>
                    </div>
                </div>

                <div
                    class="mt-20 p-10 bg-slate-50 rounded-[40px] border border-slate-100 flex flex-col md:flex-row items-center justify-between gap-8 reveal-on-scroll">
                    <div>
                        <h4 class="font-outfit text-2xl font-bold text-slate-900 mb-2">Ready to start?</h4>
                        <p class="text-slate-500">Begin your online registration process now.</p>
                    </div>
                    <a href="{{ route('registration_form_part1') }}"
                        class="px-10 py-5 bg-[#123B2D] text-white font-black uppercase tracking-widest text-xs rounded-2xl hover:bg-[#02B1EB] transition-all shadow-xl shadow-primary/20 active:scale-95">Start
                        Online Registration</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
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
</x-layout>