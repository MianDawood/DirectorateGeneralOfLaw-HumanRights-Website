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
                    <span class="text-[#02B1EB] text-xs font-black uppercase tracking-[0.3em]">NGO Directory</span>
                </div>
                <h1
                    class="font-outfit text-5xl md:text-7xl font-black text-white uppercase tracking-tight mb-6 reveal-on-scroll">
                    Registered <br><span class="text-[#02B1EB]">NGOs</span>
                </h1>
                <p class="text-white/70 text-lg md:text-xl max-w-2xl leading-relaxed reveal-on-scroll">
                    List of Non-Governmental Organizations officially registered with the Directorate General of Law &
                    Human Rights, Khyber Pakhtunkhwa.
                </p>
            </div>
        </section>

        <section class="py-24 bg-white">
            <div class="max-w-[1200px] mx-auto px-6 lg:px-20">
                <div class="bg-slate-50 rounded-[36px] p-8 md:p-10 border border-slate-100 reveal-on-scroll">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="font-outfit text-2xl md:text-3xl font-black text-slate-900 uppercase tracking-tight">
                            Registered NGOs Directory
                        </h2>
                        <span class="text-xs font-black uppercase tracking-widest text-slate-400">
                            Total: {{ $registeredNgos->count() }}
                        </span>
                    </div>

                    @if($registeredNgos->isNotEmpty())
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white rounded-2xl overflow-hidden">
                                <thead class="bg-[#123B2D] text-white">
                                    <tr>
                                        <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">NGO Name</th>
                                        <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Application No</th>
                                        <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Established</th>
                                        <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Status</th>
                                        <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-widest">Submitted</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @foreach($registeredNgos as $ngo)
                                        <tr class="hover:bg-slate-50/80 transition-colors">
                                            <td class="px-5 py-4 text-sm font-bold text-slate-800">
                                                {{ $ngo->organization_name ?? 'N/A' }}
                                            </td>
                                            <td class="px-5 py-4 text-sm text-slate-600">{{ $ngo->application_no }}</td>
                                            <td class="px-5 py-4 text-sm text-slate-600">
                                                {{ $ngo->establishment_date ? \Carbon\Carbon::parse($ngo->establishment_date)->format('M d, Y') : 'N/A' }}
                                            </td>
                                            <td class="px-5 py-4 text-sm">
                                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-emerald-100 text-emerald-700">
                                                    {{ str_replace('_', ' ', $ngo->status) }}
                                                </span>
                                            </td>
                                            <td class="px-5 py-4 text-sm text-slate-600">
                                                {{ $ngo->submitted_at ? \Carbon\Carbon::parse($ngo->submitted_at)->format('M d, Y') : 'N/A' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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