<x-layout>
<main class="bg-slate-50/50 min-h-screen lg:pt-12 pt-6">
        <!-- Registry Header -->
        <section class="mb-12">
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-10">
                    <div class="space-y-4">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/10 text-secondary rounded-full border border-secondary/20">
                            <span class="relative flex h-2 w-2">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
                            </span>
                            <span class="text-[9px] font-black uppercase tracking-widest">Institutional Registry</span>
                        </div>
                        <h1 class="font-outfit text-4xl lg:text-5xl xl:text-6xl font-black text-primary leading-none">
                            Knowledge <span class="text-secondary">Archive</span>
                        </h1>
                        <p class="text-slate-500 text-sm max-w-xl leading-relaxed">
                            A centralized portal for all official reports, publications, legal framework acts, and
                            specialized articles curated by the Directorate.
                        </p>
                    </div>
                    <div class="w-full md:w-[450px]">
                        <div class="relative group transition-all duration-300 focus-within:-translate-y-1">
                            <div class="absolute inset-y-0 left-6 flex items-center pointer-events-none">
                                <i data-lucide="search"
                                    class="w-5 h-5 text-slate-400 group-focus-within:text-secondary transition-colors"></i>
                            </div>
                            <input type="text" id="resourceSearch"
                                placeholder="Filter the registry by title or keywords..."
                                class="w-full bg-white border border-slate-200 rounded-2xl py-5 pl-16 pr-8 text-sm font-medium text-slate-700 shadow-sm focus:outline-none focus:ring-4 focus:ring-secondary/10 focus:border-secondary/40 focus:border-slate-800 transition-all placeholder:text-slate-400 focus:shadow-[0_4px_20px_rgba(0,0,0,0.04)]">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Registry Body -->
        <section class="lg:py-12 py-6 bg-[#f8fafc]">
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                <div class="flex flex-col lg:flex-row gap-12">

                    <!-- Sidebar Navigation (Unified on Desktop) -->
                    <aside class="w-full lg:w-80 shrink-0">
                        <div class="sticky top-32 space-y-6">
                            <div class="bg-white rounded-3xl border border-slate-200 p-3 shadow-sm">
                                <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em] py-4 px-5">
                                    Categories</h3>
                                <nav id="resourceTabs" class="space-y-1">
                                    <button onclick="switchTab('reports')" data-tab="reports"
                                        class="tab-btn active relative w-full flex items-center justify-between px-5 py-4 rounded-2xl text-[13px] font-bold transition-all duration-300 transform group active:scale-[0.98]">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center group-[.active]:bg-primary group-[.active]:text-white transition-colors">
                                                <i data-lucide="file-bar-chart" class="w-4 h-4"></i>
                                            </div>
                                            <span>Reports</span>
                                        </div>
                                        <i data-lucide="arrow-right"
                                            class="w-4 h-4 opacity-0 group-[.active]:opacity-100 group-[.active]:translate-x-0 -translate-x-2 transition-all"></i>
                                    </button>
                                    <button onclick="switchTab('publications')" data-tab="publications"
                                        class="tab-btn relative w-full flex items-center justify-between px-5 py-4 rounded-2xl text-[13px] font-bold transition-all duration-300 transform group active:scale-[0.98] text-slate-500 hover:text-primary hover:bg-slate-50">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center group-[.active]:bg-primary group-[.active]:text-white transition-colors">
                                                <i data-lucide="book-open" class="w-4 h-4"></i>
                                            </div>
                                            <span>Publications</span>
                                        </div>
                                        <i data-lucide="arrow-right"
                                            class="w-4 h-4 opacity-0 group-[.active]:opacity-100 group-[.active]:translate-x-0 -translate-x-2 transition-all"></i>
                                    </button>
                                    <button onclick="switchTab('obligations')" data-tab="obligations"
                                        class="tab-btn relative w-full flex items-center justify-between px-5 py-4 rounded-2xl text-[13px] font-bold transition-all duration-300 transform group active:scale-[0.98] text-slate-500 hover:text-primary hover:bg-slate-50">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center group-[.active]:bg-primary group-[.active]:text-white transition-colors">
                                                <i data-lucide="globe" class="w-4 h-4"></i>
                                            </div>
                                            <span>Obligations</span>
                                        </div>
                                        <i data-lucide="arrow-right"
                                            class="w-4 h-4 opacity-0 group-[.active]:opacity-100 group-[.active]:translate-x-0 -translate-x-2 transition-all"></i>
                                    </button>
                                    <button onclick="switchTab('acts')" data-tab="acts"
                                        class="tab-btn relative w-full flex items-center justify-between px-5 py-4 rounded-2xl text-[13px] font-bold transition-all duration-300 transform group active:scale-[0.98] text-slate-500 hover:text-primary hover:bg-slate-50">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center group-[.active]:bg-primary group-[.active]:text-white transition-colors">
                                                <i data-lucide="shield-check" class="w-4 h-4"></i>
                                            </div>
                                            <span>Acts & Rules</span>
                                        </div>
                                        <i data-lucide="arrow-right"
                                            class="w-4 h-4 opacity-0 group-[.active]:opacity-100 group-[.active]:translate-x-0 -translate-x-2 transition-all"></i>
                                    </button>
                                    <button onclick="switchTab('articles')" data-tab="articles"
                                        class="tab-btn relative w-full flex items-center justify-between px-5 py-4 rounded-2xl text-[13px] font-bold transition-all duration-300 transform group active:scale-[0.98] text-slate-500 hover:text-primary hover:bg-slate-50">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center group-[.active]:bg-primary group-[.active]:text-white transition-colors">
                                                <i data-lucide="pencil-line" class="w-4 h-4"></i>
                                            </div>
                                            <span>Articles</span>
                                        </div>
                                        <i data-lucide="arrow-right"
                                            class="w-4 h-4 opacity-0 group-[.active]:opacity-100 group-[.active]:translate-x-0 -translate-x-2 transition-all"></i>
                                    </button>
                                </nav>
                            </div>

                            <!-- 3. Desktop Support Desk (Hidden on Mobile) -->
                            <div class="hidden lg:block">
                                <div
                                    class="p-8 bg-primary rounded-[32px] text-white relative overflow-hidden group shadow-2xl shadow-primary/20">
                                    <div class="relative z-10">
                                        <div
                                            class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center mb-6">
                                            <i data-lucide="life-buoy" class="w-6 h-6 text-secondary"></i>
                                        </div>
                                        <h4 class="text-xl font-bold mb-3 font-outfit">Support Desk</h4>
                                        <p class="text-sm text-white/60 mb-8 leading-relaxed">Having trouble finding a
                                            specific document or needing verification?</p>
                                        <a href="{{ route('contact_us') }}"
                                            class="flex items-center justify-center gap-3 py-4 bg-white text-primary rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-secondary hover:text-white transition-all transform hover:-translate-y-1">
                                            Get Help Now <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                                        </a>
                                    </div>
                                    <div
                                        class="absolute -right-10 -bottom-10 w-40 h-40 bg-secondary/10 rounded-full blur-3xl group-hover:bg-secondary/20 transition-all duration-700">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>

                    <!-- Main Content (Center) -->
                    <div class="flex-1">
                        <div id="tabPanels" class="space-y-4">
                            <div data-panel="reports" class="tab-panel active space-y-4">
                                <div
                                    class="resource-item group bg-white border border-slate-200 rounded-3xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-secondary hover:shadow-xl hover:shadow-secondary/5 transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-1 space-y-3">
                                        <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-secondary/10 text-secondary uppercase tracking-wider">
                                            Archive 2020</div>
                                        <h4
                                            class="text-base font-bold text-primary group-hover:text-secondary transition-colors">
                                            Suo Moto record for the Years 2017 to 2020</h4>
                                        <p class="text-slate-500 text-xs">Official record of cases taken up by the
                                            Directorate for human rights protection.</p>
                                    </div>
                                    <a target="_blank"
                                        href="https://www.humanrights.kp.gov.pk/sites/default/files/resources/Suo%20Moto%20record%20for%20the%20Years%202017%20to%202020.pdf"
                                        class="w-12 h-12 bg-slate-50 text-primary rounded-2xl flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm shrink-0">
                                        <i data-lucide="eye" class="w-5 h-5"></i>
                                    </a>
                                </div>
                                <div
                                    class="resource-item group bg-white border border-slate-200 rounded-3xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-secondary hover:shadow-xl hover:shadow-secondary/5 transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-1 space-y-3">
                                        <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-secondary/10 text-secondary uppercase tracking-wider">
                                            Ref: KP-2020/02</div>
                                        <h4
                                            class="text-base font-bold text-primary group-hover:text-secondary transition-colors">
                                            Record of Complaints (Nature Wise Detail)</h4>
                                        <p class="text-slate-500 text-xs">A comprehensive breakdown of complaints
                                            received and processed by category.</p>
                                    </div>
                                    <a target="_blank"
                                        href="https://www.humanrights.kp.gov.pk/sites/default/files/resources/Complaints%20records%20for%20the%20Years%202012%20to%202020%20%28Nature%20wise%20Detail%29.pdf"
                                        class="w-12 h-12 bg-slate-50 text-primary rounded-2xl flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm shrink-0">
                                        <i data-lucide="eye" class="w-5 h-5"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Publication -->
                            <div data-panel="publications" class="tab-panel hidden space-y-4">
                                <div
                                    class="resource-item group bg-white border border-slate-200 rounded-3xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-secondary hover:shadow-xl hover:shadow-secondary/5 transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-1 space-y-3">
                                        <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-secondary/10 text-secondary uppercase tracking-wider">
                                            Publication 2018</div>
                                        <h4
                                            class="text-base font-bold text-primary group-hover:text-secondary transition-colors">
                                            KP Human Rights Policy 2018</h4>
                                        <p class="text-slate-500 text-xs">The foundational policy document outlining the
                                            provincial vision for human rights.</p>
                                    </div>
                                    <a target="_blank"
                                        href="https://www.humanrights.kp.gov.pk/sites/default/files/resources/KP%20Human%20Rights%20Policy%202018.pdf"
                                        class="w-14 h-14 bg-slate-50 text-primary rounded-2xl flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm shrink-0">
                                        <i data-lucide="download-cloud" class="w-6 h-6"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Obligations -->
                            <div data-panel="obligations" class="tab-panel hidden space-y-4">
                                <div
                                    class="resource-item group bg-white border border-slate-200 rounded-3xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-secondary hover:shadow-xl hover:shadow-secondary/5 transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-1 space-y-3">
                                        <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-secondary/10 text-secondary uppercase tracking-wider">
                                            International Charter</div>
                                        <h4
                                            class="text-base font-bold text-primary group-hover:text-secondary transition-colors">
                                            Universal Declaration of Human Rights</h4>
                                        <p class="text-slate-500 text-xs">Standard declaration as adopted by the UN
                                            General Assembly.</p>
                                    </div>
                                    <a target="_blank"
                                        href="https://www.humanrights.kp.gov.pk/sites/default/files/resources/Universal%20Declaration%20of%20Human%20Rights.pdf"
                                        class="w-14 h-14 bg-slate-50 text-primary rounded-2xl flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm shrink-0">
                                        <i data-lucide="book-open" class="w-6 h-6"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Acts & Rules -->
                            <div data-panel="acts" class="tab-panel hidden space-y-4">
                                <div
                                    class="resource-item group bg-white border border-slate-200 rounded-3xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-secondary hover:shadow-xl hover:shadow-secondary/5 transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-1 space-y-3">
                                        <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-secondary/10 text-secondary uppercase tracking-wider">
                                            Provincial Law 2014</div>
                                        <h4
                                            class="text-base font-bold text-primary group-hover:text-secondary transition-colors">
                                            KP Human Rights Act - 2014</h4>
                                        <p class="text-slate-500 text-xs">The primary legislative framework for human
                                            rights in Khyber Pakhtunkhwa.</p>
                                    </div>
                                    <a target="_blank"
                                        href="https://www.humanrights.kp.gov.pk/sites/default/files/resources/Act%20to%20provide%20for%20the%20promotion%2C%20protection%20and%20enforcement%20of%20human%20rights%20in%20the%20Province%20of%20KP-2014_0.pdf"
                                        class="w-14 h-14 bg-slate-50 text-primary rounded-2xl flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm shrink-0">
                                        <i data-lucide="file-text" class="w-6 h-6"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Special Articles -->
                            <div data-panel="articles" class="tab-panel hidden space-y-6">
                                <!-- Specialized Accordion System -->
                                <div class="space-y-4">
                                    <!-- VAW -->
                                    <div class="resource-item accordion-item">
                                        <button onclick="toggleAccordion('vaw-group', 'vaw-icon')"
                                            class="w-full bg-white border border-slate-200 rounded-[2rem] p-5 flex items-center justify-between group hover:border-primary/30 hover:shadow-lg transition-all">
                                            <div class="flex items-center gap-6 text-left">
                                                <div
                                                    class="w-14 h-14 bg-primary/5 rounded-[1.25rem] flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                                                    <i data-lucide="shield-alert" class="w-6 h-6"></i>
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base font-black font-outfit text-primary tracking-tight">
                                                        Violence Against Women</h4>
                                                    <p
                                                        class="text-[10px] text-slate-400 uppercase tracking-[0.2em] font-bold">
                                                        Policy Reviews & Articles</p>
                                                </div>
                                            </div>
                                            <i data-lucide="chevron-down" id="vaw-icon"
                                                class="w-6 h-6 text-slate-300 transition-transform duration-500"></i>
                                        </button>
                                        <div id="vaw-group" class="accordion-panel">
                                            <div class="accordion-panel-content">
                                                <div class="pt-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    <a href="https://www.humanrights.kp.gov.pk/resources/article/34"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">Review
                                                            of Pakistan’s Policy on Domestic Violence</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary group-hover/link:translate-x-1 group-hover/link:-translate-y-1 transition-all"></i>
                                                    </a>
                                                    <a href="https://www.humanrights.kp.gov.pk/resources/article/21"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">Domestic
                                                            Violence in Pakistan</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary group-hover/link:translate-x-1 group-hover/link:-translate-y-1 transition-all"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Disability -->
                                    <div class="resource-item accordion-item">
                                        <button onclick="toggleAccordion('disability-group', 'disability-icon')"
                                            class="w-full bg-white border border-slate-200 rounded-[2rem] p-5 flex items-center justify-between group hover:border-secondary/30 hover:shadow-lg transition-all">
                                            <div class="flex items-center gap-6 text-left">
                                                <div
                                                    class="w-14 h-14 bg-secondary/5 rounded-[1.25rem] flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white transition-all">
                                                    <i data-lucide="accessibility" class="w-6 h-6"></i>
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base font-black font-outfit text-primary tracking-tight">
                                                        Rights of Persons with Disability</h4>
                                                    <p
                                                        class="text-[10px] text-slate-400 uppercase tracking-[0.2em] font-bold">
                                                        Inclusion & Accessibility</p>
                                                </div>
                                            </div>
                                            <i data-lucide="chevron-down" id="disability-icon"
                                                class="w-6 h-6 text-slate-300 transition-transform duration-500"></i>
                                        </button>
                                        <div id="disability-group" class="accordion-panel">
                                            <div class="accordion-panel-content">
                                                <div class="pt-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    <a href="#"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">Disability
                                                            in Developing Countries</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary hover:translate-x-1 transition-all"></i>
                                                    </a>
                                                    <a href="#"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">CBR
                                                            and UNCRPD Articles 6, 7, and 24</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary hover:translate-x-1 transition-all"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Legal Basis -->
                                    <div class="resource-item accordion-item">
                                        <button onclick="toggleAccordion('legal-group', 'legal-icon')"
                                            class="w-full bg-white border border-slate-200 rounded-[2rem] p-5 flex items-center justify-between group hover:border-primary/30 hover:shadow-lg transition-all">
                                            <div class="flex items-center gap-6 text-left">
                                                <div
                                                    class="w-14 h-14 bg-primary/5 rounded-[1.25rem] flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                                                    <i data-lucide="scale" class="w-6 h-6"></i>
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base font-black font-outfit text-primary tracking-tight">
                                                        Legal Basis of Human Rights</h4>
                                                    <p
                                                        class="text-[10px] text-slate-400 uppercase tracking-[0.2em] font-bold">
                                                        Constitutional & International Law</p>
                                                </div>
                                            </div>
                                            <i data-lucide="chevron-down" id="legal-icon"
                                                class="w-6 h-6 text-slate-300 transition-transform duration-500"></i>
                                        </button>
                                        <div id="legal-group" class="accordion-panel">
                                            <div class="accordion-panel-content">
                                                <div class="pt-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    <a href="#"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">Legal
                                                            Basis of Human Rights</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary hover:translate-x-1 transition-all"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Inequality -->
                                    <div class="resource-item accordion-item">
                                        <button onclick="toggleAccordion('inequality-group', 'inequality-icon')"
                                            class="w-full bg-white border border-slate-200 rounded-[2rem] p-5 flex items-center justify-between group hover:border-secondary/30 hover:shadow-lg transition-all">
                                            <div class="flex items-center gap-6 text-left">
                                                <div
                                                    class="w-14 h-14 bg-secondary/5 rounded-[1.25rem] flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white transition-all">
                                                    <i data-lucide="scale" class="w-6 h-6"></i>
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base font-black font-outfit text-primary tracking-tight">
                                                        Inequality</h4>
                                                    <p
                                                        class="text-[10px] text-slate-400 uppercase tracking-[0.2em] font-bold">
                                                        Development & Access Gaps</p>
                                                </div>
                                            </div>
                                            <i data-lucide="chevron-down" id="inequality-icon"
                                                class="w-6 h-6 text-slate-300 transition-transform duration-500"></i>
                                        </button>
                                        <div id="inequality-group" class="accordion-panel">
                                            <div class="accordion-panel-content">
                                                <div class="pt-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    <a href="#"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">Putting
                                                            Inequality at the Centre of Post-2015 Agenda</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary hover:translate-x-1 transition-all"></i>
                                                    </a>
                                                    <a href="#"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">Gender
                                                            Inequality in Health Access</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary hover:translate-x-1 transition-all"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Girl Education -->
                                    <div class="resource-item accordion-item">
                                        <button onclick="toggleAccordion('girl-edu-group', 'girl-edu-icon')"
                                            class="w-full bg-white border border-slate-200 rounded-[2rem] p-5 flex items-center justify-between group hover:border-primary/30 hover:shadow-lg transition-all">
                                            <div class="flex items-center gap-6 text-left">
                                                <div
                                                    class="w-14 h-14 bg-primary/5 rounded-[1.25rem] flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                                                    <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base font-black font-outfit text-primary tracking-tight">
                                                        Girl Education</h4>
                                                    <p
                                                        class="text-[10px] text-slate-400 uppercase tracking-[0.2em] font-bold">
                                                        Empowerment & Reform</p>
                                                </div>
                                            </div>
                                            <i data-lucide="chevron-down" id="girl-edu-icon"
                                                class="w-6 h-6 text-slate-300 transition-transform duration-500"></i>
                                        </button>
                                        <div id="girl-edu-group" class="accordion-panel">
                                            <div class="accordion-panel-content">
                                                <div class="pt-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    <a href="#"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">Improving
                                                            Girl Education in Pakistan</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary hover:translate-x-1 transition-all"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- General Issues -->
                                    <div class="resource-item accordion-item">
                                        <button onclick="toggleAccordion('general-group', 'general-icon')"
                                            class="w-full bg-white border border-slate-200 rounded-[2rem] p-5 flex items-center justify-between group hover:border-secondary/30 hover:shadow-lg transition-all">
                                            <div class="flex items-center gap-6 text-left">
                                                <div
                                                    class="w-14 h-14 bg-secondary/5 rounded-[1.25rem] flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white transition-all">
                                                    <i data-lucide="info" class="w-6 h-6"></i>
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base font-black font-outfit text-primary tracking-tight">
                                                        General Issues</h4>
                                                    <p
                                                        class="text-[10px] text-slate-400 uppercase tracking-[0.2em] font-bold">
                                                        Social Policy & Media</p>
                                                </div>
                                            </div>
                                            <i data-lucide="chevron-down" id="general-icon"
                                                class="w-6 h-6 text-slate-300 transition-transform duration-500"></i>
                                        </button>
                                        <div id="general-group" class="accordion-panel">
                                            <div class="accordion-panel-content">
                                                <div class="pt-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    <a href="#"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">Social
                                                            Policy and Development</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary hover:translate-x-1 transition-all"></i>
                                                    </a>
                                                    <a href="#"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">Media
                                                            Impact on Policy Debate</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary hover:translate-x-1 transition-all"></i>
                                                    </a>
                                                    <a href="#"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">History
                                                            of Human Rights</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary hover:translate-x-1 transition-all"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Domestic Violence -->
                                    <div class="resource-item accordion-item">
                                        <button onclick="toggleAccordion('dv-group', 'dv-icon')"
                                            class="w-full bg-white border border-slate-200 rounded-[2rem] p-5 flex items-center justify-between group hover:border-primary/30 hover:shadow-lg transition-all">
                                            <div class="flex items-center gap-6 text-left">
                                                <div
                                                    class="w-14 h-14 bg-primary/5 rounded-[1.25rem] flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                                                    <i data-lucide="home" class="w-6 h-6"></i>
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base font-black font-outfit text-primary tracking-tight">
                                                        Domestic Violence</h4>
                                                    <p
                                                        class="text-[10px] text-slate-400 uppercase tracking-[0.2em] font-bold">
                                                        Protection & Policy</p>
                                                </div>
                                            </div>
                                            <i data-lucide="chevron-down" id="dv-icon"
                                                class="w-6 h-6 text-slate-300 transition-transform duration-500"></i>
                                        </button>
                                        <div id="dv-group" class="accordion-panel">
                                            <div class="accordion-panel-content">
                                                <div class="pt-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    <a href="#"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">Domestic
                                                            Violence Prevention Strategy</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary hover:translate-x-1 transition-all"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Child Rights -->
                                    <div class="resource-item accordion-item">
                                        <button onclick="toggleAccordion('child-rights-group', 'child-rights-icon')"
                                            class="w-full bg-white border border-slate-200 rounded-[2rem] p-5 flex items-center justify-between group hover:border-secondary/30 hover:shadow-lg transition-all">
                                            <div class="flex items-center gap-6 text-left">
                                                <div
                                                    class="w-14 h-14 bg-secondary/5 rounded-[1.25rem] flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white transition-all">
                                                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base font-black font-outfit text-primary tracking-tight">
                                                        Child Rights</h4>
                                                    <p
                                                        class="text-[10px] text-slate-400 uppercase tracking-[0.2em] font-bold">
                                                        Protection & UNCRC Compliance</p>
                                                </div>
                                            </div>
                                            <i data-lucide="chevron-down" id="child-rights-icon"
                                                class="w-6 h-6 text-slate-300 transition-transform duration-500"></i>
                                        </button>
                                        <div id="child-rights-group" class="accordion-panel">
                                            <div class="accordion-panel-content">
                                                <div class="pt-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    <a href="#"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">Child
                                                            Rights Framework in Pakistan</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary hover:translate-x-1 transition-all"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Child Labor -->
                                    <div class="resource-item accordion-item">
                                        <button onclick="toggleAccordion('child-labor-group', 'child-labor-icon')"
                                            class="w-full bg-white border border-slate-200 rounded-[2rem] p-5 flex items-center justify-between group hover:border-primary/30 hover:shadow-lg transition-all">
                                            <div class="flex items-center gap-6 text-left">
                                                <div
                                                    class="w-14 h-14 bg-primary/5 rounded-[1.25rem] flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                                                    <i data-lucide="briefcase" class="w-6 h-6"></i>
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base font-black font-outfit text-primary tracking-tight">
                                                        Child Labor</h4>
                                                    <p
                                                        class="text-[10px] text-slate-400 uppercase tracking-[0.2em] font-bold">
                                                        Eradication & Monitoring</p>
                                                </div>
                                            </div>
                                            <i data-lucide="chevron-down" id="child-labor-icon"
                                                class="w-6 h-6 text-slate-300 transition-transform duration-500"></i>
                                        </button>
                                        <div id="child-labor-group" class="accordion-panel">
                                            <div class="accordion-panel-content">
                                                <div class="pt-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    <a href="#"
                                                        class="p-5 bg-white border border-slate-100 rounded-2xl flex items-center justify-between group/link hover:border-secondary hover:shadow-md transition-all">
                                                        <span
                                                            class="text-sm font-bold text-slate-600 group-hover/link:text-primary transition-colors">Elimination
                                                            of Child Labor Initiatives</span>
                                                        <i data-lucide="arrow-up-right"
                                                            class="w-4 h-4 text-slate-300 group-hover/link:text-secondary hover:translate-x-1 transition-all"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End of tabPanels content -->

                        <!-- Mobile Support Desk (Hidden on Desktop) -->
                        <div class="mt-8 lg:hidden">
                            <div
                                class="p-8 bg-primary rounded-[32px] text-white relative overflow-hidden group shadow-2xl shadow-primary/20">
                                <div class="relative z-10">
                                    <div
                                        class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center mb-6">
                                        <i data-lucide="life-buoy" class="w-6 h-6 text-secondary"></i>
                                    </div>
                                    <h4 class="text-xl font-bold mb-3 font-outfit">Support Desk</h4>
                                    <p class="text-sm text-white/60 mb-8 leading-relaxed">Having trouble finding a
                                        specific document or needing verification?</p>
                                    <a href="{{ route('contact_us') }}"
                                        class="flex items-center justify-center gap-3 py-4 bg-white text-primary rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-secondary hover:text-white transition-all transform hover:-translate-y-1">
                                        Get Help Now <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                                    </a>
                                </div>
                                <div
                                    class="absolute -right-10 -bottom-10 w-40 h-40 bg-secondary/10 rounded-full blur-3xl group-hover:bg-secondary/20 transition-all duration-700">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Empty Search Helper -->
                    <div id="noResults"
                        class="hidden py-32 text-center bg-white rounded-[3rem] border border-slate-100 shadow-inner">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i data-lucide="search-x" class="w-10 h-10 text-slate-300"></i>
                        </div>
                        <h3 class="text-primary font-black uppercase tracking-[0.2em] text-sm">No documents found
                        </h3>
                        <p class="text-slate-400 text-xs mt-2">Try adjusting your search filters or browse by
                            category.</p>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

    <script>
        function switchTab(tabId) {
            // Update Tab Buttons UI
            document.querySelectorAll('.tab-btn').forEach(btn => {
                const isActive = btn.dataset.tab === tabId;
                btn.classList.toggle('active', isActive);
                if (isActive) {
                    btn.classList.add('bg-white', 'text-primary', 'shadow-sm', 'border-l-4', 'border-secondary');
                    btn.classList.remove('text-slate-500', 'hover:bg-slate-50');
                } else {
                    btn.classList.remove('bg-white', 'text-primary', 'shadow-sm', 'border-l-4', 'border-secondary', 'active');
                    btn.classList.add('text-slate-500', 'hover:bg-slate-50');
                }
            });

            // Update Panels
            document.querySelectorAll('.tab-panel').forEach(panel => {
                panel.classList.toggle('hidden', panel.dataset.panel !== tabId);
            });

            // Reset Search
            document.getElementById('resourceSearch').value = '';
            const noResults = document.getElementById('noResults');
            if (noResults) noResults.classList.add('hidden');

            // Refresh Icons
            if (window.lucide) lucide.createIcons();

            // Smooth Scroll to Top of Registry
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function toggleAccordion(id, iconId) {
            const el = document.getElementById(id);
            const icon = document.getElementById(iconId);
            const isExpanded = el.classList.contains('expanded');

            // Close all other accordions for cleaner view
            document.querySelectorAll('.accordion-panel').forEach(c => {
                if (c.id !== id) {
                    c.classList.remove('expanded');
                    const otherIconId = c.id.replace('group', 'icon');
                    const otherIcon = document.getElementById(otherIconId);
                    if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                }
            });

            if (!isExpanded) {
                el.classList.add('expanded');
                icon.style.transform = 'rotate(180deg)';
            } else {
                el.classList.remove('expanded');
                icon.style.transform = 'rotate(0deg)';
            }
        }

        function filterResources(query) {
            const activePanel = document.querySelector('.tab-panel:not(.hidden)');
            if (!activePanel) return;

            const items = activePanel.querySelectorAll('.resource-item');
            let hasVisible = false;

            items.forEach(item => {
                const text = item.innerText.toLowerCase();
                const isMatch = text.includes(query.toLowerCase());

                item.style.display = isMatch ? '' : 'none';
                if (isMatch) {
                    hasVisible = true;
                    // Ensure structural display for items that might be flex
                    if (item.classList.contains('flex')) item.style.display = isMatch ? 'flex' : 'none';
                }
            });

            const noResults = document.getElementById('noResults');
            if (noResults) noResults.classList.toggle('hidden', hasVisible || query === '');
        }

        document.getElementById('resourceSearch')?.addEventListener('input', (e) => filterResources(e.target.value));
    </script>
    <!-- Footer Section -->
</x-layout>