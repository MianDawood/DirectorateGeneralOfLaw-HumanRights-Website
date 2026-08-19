<x-layout>
    <div class="bg-slate-50 min-h-screen py-20">
        <div class="max-w-[800px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 md:p-12">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-[#02B1EB]/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="badge-check" class="w-8 h-8 text-[#02B1EB]"></i>
                    </div>
                    <h1 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">Verify NGO
                        <span class="text-[#02B1EB]">Registration</span>
                    </h1>
                    <p class="text-slate-500 mt-3 max-w-lg mx-auto text-sm">Enter your NGO registration number to verify the registration status with the Directorate General of Law & Human Rights.</p>
                </div>
                                    @if(session('error'))
                        <div class="mb-6 px-4 py-3 bg-red-50 border border-red-200 text-red-700 text-sm font-medium rounded-xl">
                            {{ session('error') }}
                        </div>
                    @endif
                <form class="space-y-6" method="GET" action="{{ url('verify-certificate') }}">
                    <div>
                        <label for="reg_no" class="block text-sm font-medium text-slate-700 mb-2">NGO Registration Number</label>
                        <input type="text" name="registration_no" id="reg_no"
                               placeholder="e.g. KP-DGLHR-001"
                               class="w-full px-4 py-3 border border-slate-300 rounded-xl text-sm focus:border-[#02B1EB] focus:ring-2 focus:ring-[#02B1EB]/10 transition-all outline-none">
                    </div>
                    <button type="submit"
                            class="w-full py-3.5 bg-[#123B2D] text-white font-bold uppercase tracking-widest text-xs rounded-xl hover:bg-[#02B1EB] transition-all shadow-lg">
                        Verify Now
                    </button>
                </form>
                <p class="text-center text-xs text-slate-400 mt-6">To register a new NGO, <a href="{{ route('registration_form_part1') }}" class="text-[#02B1EB] hover:text-[#123B2D] font-semibold">start the registration process</a>.</p>
            </div>
        </div>
    </div>
</x-layout>
