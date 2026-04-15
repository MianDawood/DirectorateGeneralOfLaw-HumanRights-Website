<x-layout>
<section class="bg-gradient-to-br from-[#123B2D] to-[#1a5240] py-16">
        <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
            <h1 class="font-outfit text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Suspended
                <span class="text-[#02B1EB]">NGOs</span>
            </h1>
            <p class="text-white/70 text-lg max-w-2xl">List of NGOs whose registration has been suspended due to
                non-compliance or violations.</p>
        </div>
    </section>
    <section class="py-16">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-20">
            <div class="bg-slate-50 rounded-2xl p-8 border border-slate-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-outfit text-2xl font-bold text-slate-900">Suspended NGOs List</h2>
                    <span class="text-xs font-black uppercase tracking-widest text-slate-400">
                        Total: {{ $suspendedNgos->count() }}
                    </span>
                </div>

                @if($suspendedNgos->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-2xl overflow-hidden">
                            <thead class="bg-red-600 text-white">
                                <tr>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">NGO Name</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Application No</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Established</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Last Updated</th>
                                    <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Reason / Notes</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach($suspendedNgos as $ngo)
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-5 py-4 text-sm font-bold text-slate-800">{{ $ngo->organization_name ?? 'N/A' }}</td>
                                        <td class="px-5 py-4 text-sm text-slate-600">{{ $ngo->application_no }}</td>
                                        <td class="px-5 py-4 text-sm text-slate-600">
                                            {{ $ngo->establishment_date ? \Carbon\Carbon::parse($ngo->establishment_date)->format('M d, Y') : 'N/A' }}
                                        </td>
                                        <td class="px-5 py-4 text-sm text-slate-600">
                                            {{ $ngo->updated_at ? \Carbon\Carbon::parse($ngo->updated_at)->format('M d, Y') : 'N/A' }}
                                        </td>
                                        <td class="px-5 py-4 text-sm text-slate-600">
                                            {{ $ngo->review_notes ?: 'No notes provided.' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-10">
                        <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <i data-lucide="x-circle" class="w-8 h-8 text-red-500"></i>
                        </div>
                        <h3 class="font-outfit text-xl font-bold text-slate-900 mb-2">No Suspended NGOs</h3>
                        <p class="text-slate-500">There are currently no suspended NGO records.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
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