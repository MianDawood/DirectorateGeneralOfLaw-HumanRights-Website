<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                                    <a href="<?php echo e(route('resources', ['tab' => 'publications'])); ?>" data-tab="publications"
                                        class="tab-btn <?php echo e($tab === 'publications' ? 'active bg-white text-primary shadow-sm border-l-4 border-secondary' : 'text-slate-500 hover:text-primary hover:bg-slate-50'); ?> relative w-full flex items-center justify-between px-5 py-4 rounded-2xl text-[13px] font-bold transition-all duration-300 transform group active:scale-[0.98]">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center group-[.active]:bg-primary group-[.active]:text-white transition-colors">
                                                <i data-lucide="book-open" class="w-4 h-4"></i>
                                            </div>
                                            <span>Publications</span>
                                        </div>
                                        <i data-lucide="arrow-right"
                                            class="w-4 h-4 opacity-0 group-[.active]:opacity-100 group-[.active]:translate-x-0 -translate-x-2 transition-all"></i>
                                    </a>
                                    <a href="<?php echo e(route('resources', ['tab' => 'tenders'])); ?>" data-tab="tenders"
                                        class="tab-btn <?php echo e($tab === 'tenders' ? 'active bg-white text-primary shadow-sm border-l-4 border-secondary' : 'text-slate-500 hover:text-primary hover:bg-slate-50'); ?> relative w-full flex items-center justify-between px-5 py-4 rounded-2xl text-[13px] font-bold transition-all duration-300 transform group active:scale-[0.98]">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center group-[.active]:bg-primary group-[.active]:text-white transition-colors">
                                                <i data-lucide="briefcase" class="w-4 h-4"></i>
                                            </div>
                                            <span>Tenders</span>
                                        </div>
                                        <i data-lucide="arrow-right"
                                            class="w-4 h-4 opacity-0 group-[.active]:opacity-100 group-[.active]:translate-x-0 -translate-x-2 transition-all"></i>
                                    </a>
                                    <a href="<?php echo e(route('resources', ['tab' => 'news'])); ?>" data-tab="news"
                                        class="tab-btn <?php echo e($tab === 'news' ? 'active bg-white text-primary shadow-sm border-l-4 border-secondary' : 'text-slate-500 hover:text-primary hover:bg-slate-50'); ?> relative w-full flex items-center justify-between px-5 py-4 rounded-2xl text-[13px] font-bold transition-all duration-300 transform group active:scale-[0.98]">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center group-[.active]:bg-primary group-[.active]:text-white transition-colors">
                                                <i data-lucide="newspaper" class="w-4 h-4"></i>
                                            </div>
                                            <span>News</span>
                                        </div>
                                        <i data-lucide="arrow-right"
                                            class="w-4 h-4 opacity-0 group-[.active]:opacity-100 group-[.active]:translate-x-0 -translate-x-2 transition-all"></i>
                                    </a>
                                    <a href="<?php echo e(route('resources', ['tab' => 'downloads'])); ?>" data-tab="downloads"
                                        class="tab-btn <?php echo e($tab === 'downloads' ? 'active bg-white text-primary shadow-sm border-l-4 border-secondary' : 'text-slate-500 hover:text-primary hover:bg-slate-50'); ?> relative w-full flex items-center justify-between px-5 py-4 rounded-2xl text-[13px] font-bold transition-all duration-300 transform group active:scale-[0.98]">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center group-[.active]:bg-primary group-[.active]:text-white transition-colors">
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                            </div>
                                            <span>Downloads</span>
                                        </div>
                                        <i data-lucide="arrow-right"
                                            class="w-4 h-4 opacity-0 group-[.active]:opacity-100 group-[.active]:translate-x-0 -translate-x-2 transition-all"></i>
                                    </a>
                                    <a href="<?php echo e(route('resources', ['tab' => 'acts'])); ?>" data-tab="acts"
                                        class="tab-btn <?php echo e($tab === 'acts' ? 'active bg-white text-primary shadow-sm border-l-4 border-secondary' : 'text-slate-500 hover:text-primary hover:bg-slate-50'); ?> relative w-full flex items-center justify-between px-5 py-4 rounded-2xl text-[13px] font-bold transition-all duration-300 transform group active:scale-[0.98]">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center group-[.active]:bg-primary group-[.active]:text-white transition-colors">
                                                <i data-lucide="shield-check" class="w-4 h-4"></i>
                                            </div>
                                            <span>Acts & Rules</span>
                                        </div>
                                        <i data-lucide="arrow-right"
                                            class="w-4 h-4 opacity-0 group-[.active]:opacity-100 group-[.active]:translate-x-0 -translate-x-2 transition-all"></i>
                                    </a>
                                </nav>
                            </div>

                            <!-- 3. Desktop Support Desk (Hidden on Mobile) -->
                            <div class="hidden lg:block">
                                <div
                                    class="p-8 bg-primary text-white rounded-[32px] relative overflow-hidden group shadow-2xl shadow-primary/20">
                                    <div class="relative z-10">
                                        <div
                                            class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center mb-6">
                                            <i data-lucide="life-buoy" class="w-6 h-6 text-secondary"></i>
                                        </div>
                                        <h4 class="text-xl font-bold mb-3 font-outfit">Support Desk</h4>
                                        <p class="text-sm mb-8 leading-relaxed">Having trouble finding a
                                            specific document or needing verification?</p>
                                        <a href="<?php echo e(route('contact_us')); ?>"
                                            class="flex items-center justify-center gap-3 py-4 bg-white rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-secondary hover:text-white transition-all transform hover:-translate-y-1 text-black">
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
                            <!-- Publications -->
                            <div data-panel="publications" class="tab-panel <?php echo e($tab === 'publications' ? 'active' : 'hidden'); ?> space-y-4">
                                <?php $__empty_1 = true; $__currentLoopData = $publications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div
                                    class="resource-item group bg-white border border-slate-200 rounded-3xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-secondary hover:shadow-xl hover:shadow-secondary/5 transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-1 space-y-3">
                                        <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-secondary/10 text-secondary uppercase tracking-wider">
                                            <?php echo e($publication->category ?? 'Publication'); ?><?php echo e($publication->published_date ? ' ' . $publication->published_date->format('Y') : ''); ?></div>
                                        <h4
                                            class="text-base font-bold text-primary group-hover:text-secondary transition-colors">
                                            <?php echo e($publication->title); ?></h4>
                                        <p class="text-slate-500 text-xs"><?php echo e($publication->description); ?></p>
                                    </div>
                                    <a target="_blank" href="<?php echo e(route('publications.download', $publication->id)); ?>"
                                        class="w-12 h-12 bg-slate-50 text-primary rounded-2xl flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm shrink-0">
                                        <i data-lucide="eye" class="w-5 h-5"></i>
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center py-24 bg-white rounded-3xl border border-slate-100">
                                    <i data-lucide="file-x" class="w-10 h-10 text-slate-300 mx-auto mb-3"></i>
                                    <p class="text-sm text-slate-400">No publications available yet.</p>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- Tenders -->
                            <div data-panel="tenders" class="tab-panel <?php echo e($tab === 'tenders' ? 'active' : 'hidden'); ?> space-y-4">
                                <?php $__empty_1 = true; $__currentLoopData = $tenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div
                                    class="resource-item group bg-white border border-slate-200 rounded-3xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-secondary hover:shadow-xl hover:shadow-secondary/5 transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-1 space-y-3">
                                        <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-secondary/10 text-secondary uppercase tracking-wider">
                                            Ref: <?php echo e($tender->reference_no); ?></div>
                                        <h4
                                            class="text-base font-bold text-primary group-hover:text-secondary transition-colors">
                                            <?php echo e($tender->title); ?></h4>
                                        <p class="text-slate-500 text-xs"><?php echo e($tender->description); ?></p>
                                        <?php if($tender->publish_date || $tender->closing_date): ?>
                                        <div class="flex flex-wrap items-center gap-4 text-[10px] font-semibold text-slate-400 uppercase tracking-wider">
                                            <?php if($tender->publish_date): ?>
                                                <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3 h-3"></i> Published: <?php echo e($tender->publish_date->format('d M Y')); ?></span>
                                            <?php endif; ?>
                                            <?php if($tender->closing_date): ?>
                                                <span class="flex items-center gap-1"><i data-lucide="hourglass" class="w-3 h-3"></i> Closing: <?php echo e($tender->closing_date->format('d M Y')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <a target="_blank" href="<?php echo e(route('tenders.download', $tender->id)); ?>"
                                        class="w-12 h-12 bg-slate-50 text-primary rounded-2xl flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm shrink-0">
                                        <i data-lucide="download" class="w-5 h-5"></i>
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center py-24 bg-white rounded-3xl border border-slate-100">
                                    <i data-lucide="file-x" class="w-10 h-10 text-slate-300 mx-auto mb-3"></i>
                                    <p class="text-sm text-slate-400">No tenders available yet.</p>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- News -->
                            <div data-panel="news" class="tab-panel <?php echo e($tab === 'news' ? 'active' : 'hidden'); ?> space-y-4">
                                <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <a href="<?php echo e(route('news_details', $item->id)); ?>"
                                    class="resource-item group bg-white border border-slate-200 rounded-3xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-secondary hover:shadow-xl hover:shadow-secondary/5 transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-1 space-y-3">
                                        <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-secondary/10 text-secondary uppercase tracking-wider">
                                            <?php echo e($item->published_date ? $item->published_date->format('d M Y') : 'News'); ?></div>
                                        <h4
                                            class="text-base font-bold text-primary group-hover:text-secondary transition-colors">
                                            <?php echo e($item->title); ?></h4>
                                        <p class="text-slate-500 text-xs"><?php echo e($item->excerpt); ?></p>
                                    </div>
                                    <span
                                        class="w-12 h-12 bg-slate-50 text-primary rounded-2xl flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm shrink-0">
                                        <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                                    </span>
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center py-24 bg-white rounded-3xl border border-slate-100">
                                    <i data-lucide="file-x" class="w-10 h-10 text-slate-300 mx-auto mb-3"></i>
                                    <p class="text-sm text-slate-400">No news available yet.</p>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- Downloads -->
                            <div data-panel="downloads" class="tab-panel <?php echo e($tab === 'downloads' ? 'active' : 'hidden'); ?> space-y-4">
                                <?php $__empty_1 = true; $__currentLoopData = $downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div
                                    class="resource-item group bg-white border border-slate-200 rounded-3xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-secondary hover:shadow-xl hover:shadow-secondary/5 transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-1 space-y-3">
                                        <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-secondary/10 text-secondary uppercase tracking-wider">
                                            Document</div>
                                        <h4
                                            class="text-base font-bold text-primary group-hover:text-secondary transition-colors">
                                            <?php echo e($document->name); ?></h4>
                                        <p class="text-slate-500 text-xs">Official document provided by the Directorate.</p>
                                    </div>
                                    <a target="_blank" href="<?php echo e(asset($document->file_path)); ?>"
                                        class="w-12 h-12 bg-slate-50 text-primary rounded-2xl flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm shrink-0">
                                        <i data-lucide="download" class="w-5 h-5"></i>
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center py-24 bg-white rounded-3xl border border-slate-100">
                                    <i data-lucide="file-x" class="w-10 h-10 text-slate-300 mx-auto mb-3"></i>
                                    <p class="text-sm text-slate-400">No downloads available yet.</p>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- Acts & Rules -->
                            <div data-panel="acts" class="tab-panel <?php echo e($tab === 'acts' ? 'active' : 'hidden'); ?> space-y-4">
                                <?php $__empty_1 = true; $__currentLoopData = $actsRules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $act): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div
                                    class="resource-item group bg-white border border-slate-200 rounded-3xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-secondary hover:shadow-xl hover:shadow-secondary/5 transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-1 space-y-3">
                                        <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-secondary/10 text-secondary uppercase tracking-wider">
                                            Legal Act<?php echo e($act->published_date ? ' ' . $act->published_date->format('Y') : ''); ?></div>
                                        <h4
                                            class="text-base font-bold text-primary group-hover:text-secondary transition-colors">
                                            <?php echo e($act->title); ?></h4>
                                        <p class="text-slate-500 text-xs"><?php echo e($act->description); ?></p>
                                    </div>
                                    <a target="_blank" href="<?php echo e(route('publications.download', $act->id)); ?>"
                                        class="w-12 h-12 bg-slate-50 text-primary rounded-2xl flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm shrink-0">
                                        <i data-lucide="eye" class="w-5 h-5"></i>
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center py-24 bg-white rounded-3xl border border-slate-100">
                                    <i data-lucide="file-x" class="w-10 h-10 text-slate-300 mx-auto mb-3"></i>
                                    <p class="text-sm text-slate-400">No acts or rules available yet.</p>
                                </div>
                                <?php endif; ?>
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
                                    <a href="<?php echo e(route('contact_us')); ?>"
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
                        class="w-full hidden py-32 text-center bg-white rounded-[3rem] border border-slate-100 shadow-inner">
                        <div class="w-full h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/resources.blade.php ENDPATH**/ ?>