<x-layout>
<main>
    <section class="bg-gradient-to-br from-[#123B2D] to-[#1a5240] py-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>

        <div class="max-w-[1536px] mx-auto px-6 lg:px-20 relative z-10">
            <div class="flex items-center gap-3 mb-6 reveal-on-scroll">
                <span class="w-12 h-[2px] bg-[#02B1EB]"></span>
                <span class="text-[#02B1EB] text-xs font-black uppercase tracking-[0.3em]">NGO Directory</span>
            </div>
            <h1 class="font-outfit text-5xl md:text-7xl font-black text-white uppercase tracking-tight mb-6 reveal-on-scroll">
                Registered <br><span class="text-[#02B1EB]">NGOs</span>
            </h1>
            <p class="text-white/70 text-lg md:text-xl max-w-2xl leading-relaxed reveal-on-scroll">
                List of Non-Governmental Organizations officially registered with the Directorate General of Law & Human Rights, Khyber Pakhtunkhwa.
            </p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-20">
            <div class="bg-slate-50 rounded-[36px] p-8 md:p-10 border border-slate-100 reveal-on-scroll">
                <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                    <h2 class="font-outfit text-2xl md:text-3xl font-black text-slate-900 uppercase tracking-tight">
                        Registered NGOs Directory
                    </h2>
                    <span class="text-xs font-black uppercase tracking-widest text-slate-400">
                        Total: {{ $applications->total() }}
                    </span>
                </div>

                <!-- Filter Bar -->
                <form method="GET" action="{{ route('ngo_registered') }}" class="flex flex-wrap items-end gap-4 mb-8 pb-8 border-b border-slate-200">
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">District</label>
                        <select name="district" class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#02B1EB]">
                            <option value="">All Districts</option>
                            @foreach($districts as $d)
                                <option value="{{ $d }}" @selected($district === $d)>{{ $d }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">Thematic Area</label>
                        <select name="thematic_area" class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#02B1EB]">
                            <option value="">All Thematic Areas</option>
                            @foreach($thematicAreas as $key => $label)
                                <option value="{{ $key }}" @selected($thematicArea === $key)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="px-6 py-2.5 bg-[#123B2D] text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-[#1a5240] transition-colors">
                            Filter
                        </button>
                        @if($district || $thematicArea)
                            <a href="{{ route('ngo_registered') }}" class="px-6 py-2.5 bg-slate-200 text-slate-600 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-slate-300 transition-colors">
                                Clear
                            </a>
                        @endif
                    </div>
                </form>

                @if($applications->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-2xl overflow-hidden">
                            <thead class="bg-[#123B2D] text-white">
                                <tr>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest w-14">S.No</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Name Of NGO</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">District</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Registration No.</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Registration Date / Renewal</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Status</th>
                                    <th class="px-5 py-4 text-center text-xs font-black uppercase tracking-widest">View Detail</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach($applications as $ngo)
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-5 py-4 text-sm text-slate-500 font-mono">
                                            {{ $applications->firstItem() + $loop->index }}
                                        </td>
                                        <td class="px-5 py-4 text-sm font-bold text-slate-800">
                                            {{ $ngo->organization_name ?? 'N/A' }}
                                        </td>
                                        <td class="px-5 py-4 text-sm text-slate-600">
                                            {{ $ngo->district ?? '-' }}
                                        </td>
                                        <td class="px-5 py-4 text-sm text-slate-600 font-mono">
                                            {{ $ngo->registration_no ?? '-' }}
                                        </td>
                                        <td class="px-5 py-4 text-sm text-slate-600">
                                            {{ $ngo->certificate_issue_date ? \Carbon\Carbon::parse($ngo->certificate_issue_date)->format('d-m-Y') : ($ngo->expiry_date ? \Carbon\Carbon::parse($ngo->expiry_date)->format('d-m-Y') : '-') }}
                                        </td>
                                        <td class="px-5 py-4 text-sm">
                                            @php
                                                $statusColors = [
                                                    'approved' => 'bg-emerald-100 text-emerald-700',
                                                    'submitted' => 'bg-blue-100 text-blue-700',
                                                    'under_review' => 'bg-amber-100 text-amber-700',
                                                    'rejected' => 'bg-red-100 text-red-700',
                                                ];
                                                $statusLabels = [
                                                    'approved' => 'Approved',
                                                    'submitted' => 'Submitted',
                                                    'under_review' => 'Under Review',
                                                    'rejected' => 'Rejected',
                                                ];
                                                $color = $statusColors[$ngo->status] ?? 'bg-slate-100 text-slate-600';
                                                $label = $statusLabels[$ngo->status] ?? $ngo->status;
                                            @endphp
                                            <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-wider {{ $color }}">
                                                {{ $label }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 text-center">
                                            <a href="{{ route('ngo.detail', $ngo->id) }}"
                                               class="inline-flex items-center gap-1.5 text-[#02B1EB] text-[10px] font-black uppercase tracking-widest hover:text-[#123B2D] transition-colors">
                                                View
                                                <i data-lucide="external-link" class="w-3 h-3"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8">
                        {{ $applications->links() }}
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="w-16 h-16 bg-[#123B2D]/10 rounded-2xl flex items-center justify-center mx-auto mb-5">
                            <i data-lucide="clipboard-list" class="w-8 h-8 text-[#123B2D]"></i>
                        </div>
                        <h3 class="font-outfit text-xl font-black text-slate-900 uppercase mb-3">No Registered NGOs Found</h3>
                        <p class="text-slate-500">No approved/submitted NGO records are available yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
</main>

<style>
    .scrollbar-thin::-webkit-scrollbar { width: 6px; }
    .scrollbar-thin::-webkit-scrollbar-track { background: transparent; }
    .scrollbar-thin::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    .scrollbar-thin::-webkit-scrollbar-thumb:hover { background: #cbd5e0; }
</style>
</x-layout>
