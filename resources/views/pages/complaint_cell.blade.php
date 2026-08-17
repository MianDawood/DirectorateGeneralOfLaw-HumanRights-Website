<x-layout>
    <!-- Page Header (Shared aesthetic for interior pages) -->
    <div class="relative bg-[#123B2D] py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('{{ asset('images/hero image 1.jpg') }}')] bg-cover bg-center mix-blend-overlay"></div>
        <div class="max-w-[1536px] mx-auto px-6 relative z-10 text-center">
            <h1 class="font-outfit text-3xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">
                Online <span class="text-[#02B1EB]">Complaint Cell</span>
            </h1>
            <p class="text-white/80 text-sm md:text-lg max-w-2xl mx-auto font-medium">
                Submit and track your complaints regarding human rights violations for prompt investigation and resolution.
            </p>
        </div>
    </div>

    <!-- Page Content Section -->
    <section class="bg-slate-50 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 md:p-12">
                <div class="flex items-center gap-4 mb-8 pb-8 border-b border-slate-100">
                    <div class="w-12 h-12 rounded-xl bg-[#123B2D]/10 flex items-center justify-center">
                        <i data-lucide="message-square-warning" class="w-6 h-6 text-[#123B2D]"></i>
                    </div>
                    <div>
                        <h2 class="font-outfit text-xl font-bold text-slate-800">Submit a Complaint</h2>
                        <p class="text-xs font-bold text-[#02B1EB] uppercase tracking-widest mt-1">Confidential & Secure</p>
                    </div>
                </div>

                @if(session('success'))
                    <div class="mb-6 rounded-xl bg-green-50 border border-green-200 p-4 text-sm text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="space-y-6" method="POST" action="{{ route('complaints.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Full Name *</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:border-[#02B1EB] focus:ring-1 focus:ring-[#02B1EB] outline-none transition-all" placeholder="Enter your full name" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">CNIC Number *</label>
                            <input type="text" name="cnic" value="{{ old('cnic') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:border-[#02B1EB] focus:ring-1 focus:ring-[#02B1EB] outline-none transition-all" placeholder="00000-0000000-0" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Contact Number *</label>
                            <input type="tel" name="contact_number" value="{{ old('contact_number') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:border-[#02B1EB] focus:ring-1 focus:ring-[#02B1EB] outline-none transition-all" placeholder="03XX-XXXXXXX" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">District</label>
                             <input type="text" name="district" value="{{ old('district') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:border-[#02B1EB] focus:ring-1 focus:ring-[#02B1EB] outline-none transition-all" placeholder="Enter district name">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Complaint Category</label>
                        <select name="category" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:border-[#02B1EB] focus:ring-1 focus:ring-[#02B1EB] outline-none transition-all text-slate-500 rounded-lg">
                            <option {{ old('category') === 'Property Dispute Rights' ? 'selected' : '' }}>Property Dispute Rights</option>
                            <option {{ old('category') === 'Child Labor / Protection' ? 'selected' : '' }}>Child Labor / Protection</option>
                            <option {{ old('category') === 'Women Harassment' ? 'selected' : '' }}>Women Harassment</option>
                            <option {{ old('category') === 'Violence / Police Brutality' ? 'selected' : '' }}>Violence / Police Brutality</option>
                            <option {{ old('category') === 'Other Minorities Issues' ? 'selected' : '' }}>Other Minorities Issues</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Complaint Details *</label>
                        <textarea rows="5" name="details" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:border-[#02B1EB] focus:ring-1 focus:ring-[#02B1EB] outline-none transition-all resize-none" placeholder="Provide a detailed account of the incident..." required>{{ old('details') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Supporting Documents / Evidence (Optional)</label>
                        <label class="border-2 border-dashed border-slate-200 rounded-xl p-8 text-center bg-slate-50 hover:bg-slate-100 transition-colors cursor-pointer group block">
                            <input type="file" id="attachmentInput" name="attachment" class="hidden" accept=".pdf,.jpg,.jpeg,.png">
                            <i data-lucide="upload-cloud" class="w-8 h-8 text-slate-400 mx-auto mb-3 group-hover:text-[#02B1EB] transition-colors"></i>
                            <p id="attachmentLabel" class="text-sm font-medium text-slate-600">Click to upload or drag and drop files</p>
                            <p class="text-xs text-slate-400 mt-1">PDF, JPG, PNG (Max. 5MB)</p>
                        </label>
                    </div>

                    <div class="pt-6 border-t border-slate-100 flex justify-end">
                        <button type="submit" class="flex items-center gap-2 px-8 py-4 bg-[#123B2D] text-white text-[11px] font-black uppercase tracking-widest hover:bg-[#02B1EB] transition-all rounded-xl shadow-lg active:scale-95">
                            Submit Complaint
                            <i data-lucide="send" class="w-4 h-4"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-8 bg-[#02B1EB]/10 border border-[#02B1EB]/20 rounded-xl p-6 flex gap-4 text-sm text-[#123B2D] leading-relaxed">
                <i data-lucide="info" class="w-6 h-6 text-[#02B1EB] shrink-0"></i>
                <p><strong>Note:</strong> False or fabricated complaints are subject to legal consequences. Please ensure all details provided are true and accurate to the best of your knowledge.</p>
            </div>
        </div>
    </section>

    <script>
        (function () {
            const input = document.getElementById('attachmentInput');
            const label = document.getElementById('attachmentLabel');
            if (!input || !label) return;

            input.addEventListener('change', () => {
                if (input.files && input.files.length > 0) {
                    label.textContent = input.files[0].name;
                } else {
                    label.textContent = 'Click to upload or drag and drop files';
                }
            });
        })();
    </script>
</x-layout>
