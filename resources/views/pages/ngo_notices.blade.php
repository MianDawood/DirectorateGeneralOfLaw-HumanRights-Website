<x-layout>
<main class="bg-slate-50/50">
        <!-- Hero Section -->
        <section class="relative lg:h-[45vh] h-[35vh] flex items-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/hero image 5.jpg') }}" alt="Hero Background" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-secondary/95 via-secondary/80 to-transparent"></div>
            </div>

            <div class="max-w-[1536px] mx-auto px-6 lg:px-20 relative z-10 w-full">
                <div class="max-w-3xl reveal-on-scroll">
                    <div class="flex items-center gap-4 mb-2">
                        <span class="text-white/80 text-[10px] font-black uppercase tracking-[0.6em]">Information
                            Center</span>
                    </div>
                    <h1 class="font-outfit text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">
                        Latest Notice <br><span class="text-primary italic">Board</span>
                    </h1>
                    <p class="text-white/80 text-lg leading-relaxed font-medium mb-6 max-w-xl">
                        Stay updated with official announcements, calls for registration, and policy updates related to
                        NGO operations.
                    </p>
                </div>
            </div>
        </section>

        <!-- latest notice news -->
        <section id="notices" class="lg:py-24 py-12 relative overflow-hidden">
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16 reveal-on-scroll">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-[2px] bg-primary"></span>
                            <span class="text-primary text-[10px] font-black uppercase tracking-widest">Stay Informed</span>
                        </div>
                        <h2 class="font-outfit text-4xl md:text-5xl font-black text-slate-900 uppercase">Latest <span class="text-slate-400">Notice Board</span></h2>
                    </div>
                    <p class="text-slate-500 max-w-md text-sm leading-relaxed">
                        Stay updated with the most recent announcements, calls for registration, and policy updates related to NGO operations.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger">
                    @php
                        $styleOptions = [
                            ['color' => 'primary', 'icon' => 'megaphone'],
                            ['color' => 'blue', 'icon' => 'info'],
                            ['color' => 'amber', 'icon' => 'alert-circle'],
                            ['color' => 'primary', 'icon' => 'bell'],
                            ['color' => 'blue', 'icon' => 'file-text'],
                            ['color' => 'amber', 'icon' => 'clipboard-list'],
                        ];

                        $colors = [
                            'primary' => [
                                'bg_light' => 'bg-primary/5',
                                'icon_bg' => 'bg-primary/10',
                                'icon_text' => 'text-[#123B2D]',
                                'hover_text' => 'group-hover:text-[#02B1EB]',
                                'btn_text' => 'text-primary'
                            ],
                            'blue' => [
                                'bg_light' => 'bg-blue-500/5',
                                'icon_bg' => 'bg-blue-50',
                                'icon_text' => 'text-blue-500',
                                'hover_text' => 'group-hover:text-blue-500',
                                'btn_text' => 'text-blue-500'
                            ],
                            'amber' => [
                                'bg_light' => 'bg-amber-500/5',
                                'icon_bg' => 'bg-amber-50',
                                'icon_text' => 'text-amber-500',
                                'hover_text' => 'group-hover:text-amber-500',
                                'btn_text' => 'text-amber-500'
                            ]
                        ];
                    @endphp

                    @forelse($notices as $notice)
                        @php
                            $style = $styleOptions[$loop->index % count($styleOptions)];
                            $scheme = $colors[$style['color']];
                        @endphp
                        <!-- Notice Card -->
                        <div class="group bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-primary/5 transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 {{ $scheme['bg_light'] }} rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-150 duration-700"></div>

                            <div class="flex items-center justify-between mb-8">
                                <div class="w-12 h-12 {{ $scheme['icon_bg'] }} rounded-2xl flex items-center justify-center {{ $scheme['icon_text'] }}">
                                    <i data-lucide="{{ $style['icon'] }}" class="w-6 h-6"></i>
                                </div>
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1.5 rounded-full">
                                    {{ $notice->created_at->format('M d, Y') }}
                                </span>
                            </div>

                            <h3 class="font-outfit text-xl font-bold text-slate-900 uppercase mb-4 {{ $scheme['hover_text'] }} transition-colors">
                                {{ $notice->title }}
                            </h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-8 line-clamp-3">
                                {{ $notice->description }}
                            </p>

                            <a href="javascript:openNoticeModal({{ $notice->id }}, '{{ $style['icon'] }}')" class="flex items-center gap-2 {{ $scheme['btn_text'] }} text-xs font-black uppercase tracking-widest group/btn">
                                Read Full Notice
                                <i data-lucide="arrow-right" class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-20">
                            <p class="text-slate-400">No notices found at the moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        @if($publicNotice)
            <!-- Full Notice Image Section -->
            <section class="lg:py-24 py-10 bg-white border-b border-slate-100">
                <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                    <div class="text-center lg:mb-16 mb-6 reveal-on-scroll">
                        <div class="inline-flex items-center gap-3 bg-primary/5 px-4 py-2 rounded-full text-primary text-[10px] font-black uppercase tracking-widest mb-6">
                            <i data-lucide="image" class="w-4 h-4"></i> Public Announcement
                        </div>
                        <h2 class="font-outfit text-4xl md:text-5xl font-black text-slate-900 uppercase">Public <span class="text-primary italic">{{ $publicNotice->title }}</span></h2>
                    </div>

                    <div class="bg-white p-2 md:p-8 lg:rounded-[40px] rounded-[0px] shadow-2xl border border-slate-100 reveal-on-scroll">
                        <img src="{{ asset('storage/' . $publicNotice->image) }}" alt="{{ $publicNotice->title }}" class="w-full h-auto lg:rounded-[32px] rounded-[0px] shadow-sm">
                    </div>
                </div>
            </section>
        @endif
    </main>

    <!-- Notice Detail Modal -->
    <div id="noticeModal" class="fixed inset-0 z-[200] hidden items-center justify-center bg-slate-900/60 backdrop-blur-sm opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-[32px] w-[90%] max-w-2xl max-h-[90vh] overflow-hidden relative transform scale-95 transition-transform duration-300 shadow-2xl">
            <!-- Close Button -->
            <button onclick="closeNoticeModal()" class="absolute top-6 right-6 text-slate-400 hover:text-red-500 transition-colors p-2 rounded-xl hover:bg-red-50 z-10">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>

            <div class="p-8 md:p-12 overflow-y-auto max-h-[90vh] scrollbar-thin">
                <div id="modalContent">
                    <!-- Content will be populated dynamically -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Logic & Data -->
    <script>
        // Inject notices data from PHP
        const noticesData = @json($notices->keyBy('id'));

        function openNoticeModal(noticeId, iconName) {
            const notice = noticesData[noticeId];
            if (!notice) return;

            const modal = document.getElementById('noticeModal');
            const modalContent = document.getElementById('modalContent');
            
            // Format date from created_at string
            const noticeDate = new Date(notice.created_at);
            const formattedDate = noticeDate.toLocaleDateString('en-US', { 
                month: 'short', 
                day: 'numeric', 
                year: 'numeric' 
            });

            // Populate content
            modalContent.innerHTML = `
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center text-primary">
                            <i data-lucide="${iconName || 'megaphone'}" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-black text-primary uppercase tracking-[0.2em]">Official Notice</span>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">${formattedDate}</p>
                        </div>
                    </div>
                </div>

                <h2 class="font-outfit text-3xl font-black text-slate-900 uppercase tracking-tight mb-6 leading-tight">
                    ${notice.title}
                </h2>

                <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed font-medium space-y-4">
                    ${notice.description.split('\n').map(p => p.trim() ? `<p>${p}</p>` : '').join('')}
                </div>
            `;

            // Open Modal with Animation
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            // Refresh Lucide Icons for dynamic content
            if (window.lucide) {
                window.lucide.createIcons();
            }

            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.firstElementChild.classList.remove('scale-95');
            }, 10);
            
            document.body.style.overflow = 'hidden';
        }

        function closeNoticeModal() {
            const modal = document.getElementById('noticeModal');
            modal.classList.add('opacity-0');
            modal.firstElementChild.classList.add('scale-95');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
            
            document.body.style.overflow = 'auto';
        }

        // Close on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeNoticeModal();
        });

        // Close on clicking backdrop
        document.getElementById('noticeModal').addEventListener('click', (e) => {
            if (e.target.id === 'noticeModal') closeNoticeModal();
        });
    </script>

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
</x-layout>