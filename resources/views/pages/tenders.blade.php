<x-layout>
    <!-- Page Header -->
    <div class="relative bg-[#123B2D] py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('{{ asset('images/hero image 3.png') }}')] bg-cover bg-center mix-blend-overlay"></div>
        <div class="max-w-[1536px] mx-auto px-6 relative z-10 text-center">
            <h1 class="font-outfit text-3xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">
                Active <span class="text-[#02B1EB]">Tenders</span>
            </h1>
            <p class="text-white/80 text-sm md:text-lg max-w-2xl mx-auto font-medium">
                View current opportunities, procurement notices, and request for proposals from the Directorate.
            </p>
        </div>
    </div>

    <!-- Tenders Section -->
    <section class="bg-slate-50 py-16">
        <div class="max-w-[1536px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100">
                                <th class="py-5 px-6 font-bold text-slate-500 text-[10px] uppercase tracking-widest min-w-[300px]">Tender Description</th>
                                <th class="py-5 px-6 font-bold text-slate-500 text-[10px] uppercase tracking-widest min-w-[150px]">Reference No.</th>
                                <th class="py-5 px-6 font-bold text-slate-500 text-[10px] uppercase tracking-widest min-w-[150px]">Publish Date</th>
                                <th class="py-5 px-6 font-bold text-slate-500 text-[10px] uppercase tracking-widest min-w-[150px]">Closing Date</th>
                                <th class="py-5 px-6 font-bold text-slate-500 text-[10px] uppercase tracking-widest min-w-[120px]">Status</th>
                                <th class="py-5 px-6 font-bold text-slate-500 text-[10px] uppercase tracking-widest text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse ($tenders as $tender)
                                <tr class="hover:bg-slate-50/50 transition-colors group">
                                    <td class="py-5 px-6">
                                        <h4 class="font-bold text-slate-800 text-sm mb-1 group-hover:text-[#02B1EB] transition-colors">{{ $tender->title }}</h4>
                                        <p class="text-xs text-slate-400">{{ $tender->description }}</p>
                                    </td>
                                    <td class="py-5 px-6">
                                        <span class="font-mono text-xs text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md">{{ $tender->reference_no }}</span>
                                    </td>
                                    <td class="py-5 px-6 text-sm text-slate-600 font-medium">{{ optional($tender->publish_date)->format('M d, Y') ?? '—' }}</td>
                                    <td class="py-5 px-6 text-sm text-slate-600 font-medium">{{ optional($tender->closing_date)->format('M d, Y') ?? '—' }}</td>
                                    <td class="py-5 px-6">
                                        @if(strtolower($tender->status) === 'active')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-50 text-green-600 rounded-full text-[10px] font-black uppercase tracking-wider">
                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Active
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-100 text-slate-500 rounded-full text-[10px] font-black uppercase tracking-wider">
                                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> {{ ucfirst($tender->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-5 px-6 text-right">
                                        <a href="{{ route('tenders.download', $tender->id) }}"
                                           class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-[#02B1EB]/10 text-[#02B1EB] hover:bg-[#02B1EB] hover:text-white transition-colors"
                                           title="Download Document">
                                            <i data-lucide="download" class="w-4 h-4"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-8 px-6 text-center text-sm text-slate-500">
                                        No tenders available at the moment.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Warning -->
            <div class="mt-8 bg-amber-50 border border-amber-200 rounded-xl p-5 flex gap-4 text-sm text-amber-800">
                <i data-lucide="alert-triangle" class="w-5 h-5 text-amber-500 shrink-0"></i>
                <p>All procurement processes strictly abide by the rules framed up by the Khyber Pakhtunkhwa Public Procurement Regulatory Authority (KPPRA). Bidders must be registered on KPPRA website.</p>
            </div>
        </div>
    </section>
</x-layout>
