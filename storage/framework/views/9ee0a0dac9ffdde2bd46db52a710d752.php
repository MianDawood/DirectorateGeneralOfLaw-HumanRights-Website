<?php $__env->startSection('content'); ?>
    <?php
        $query = collect($filters)->filter(fn ($v) => filled($v))->all();
    ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">News &amp; Events Management</h1>
                        <div class="flex flex-wrap gap-2">
                            <a href="<?php echo e(route('admin.events.create')); ?>"
                               class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-3 rounded text-sm">Add Event</a>
                            <a href="<?php echo e(route('admin.news.create')); ?>"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded text-sm">Add News</a>
                        </div>
                    </div>

                    <?php if(session('success')): ?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="GET" action="<?php echo e(route('admin.news-events.index')); ?>" class="mb-6 grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                        <div>
                            <label for="search" class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Search</label>
                            <input type="text" name="search" id="search" value="<?php echo e($filters['search']); ?>"
                                   placeholder="Title, detail, subject..."
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="type" class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Type</label>
                            <select name="type" id="type"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="all" <?php if($filters['type'] === 'all'): echo 'selected'; endif; ?>>All Types</option>
                                <option value="news" <?php if($filters['type'] === 'news'): echo 'selected'; endif; ?>>News</option>
                                <option value="events" <?php if($filters['type'] === 'events'): echo 'selected'; endif; ?>>Events</option>
                            </select>
                        </div>
                        <div>
                            <label for="category_id" class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Subject / Category</label>
                            <select name="category_id" id="category_id"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">All Subjects</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php if((string) $filters['category_id'] === (string) $category->id): echo 'selected'; endif; ?>><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div>
                            <label for="date_from" class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Date From</label>
                            <input type="date" name="date_from" id="date_from" value="<?php echo e($filters['date_from']); ?>"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="date_to" class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Date To</label>
                            <input type="date" name="date_to" id="date_to" value="<?php echo e($filters['date_to']); ?>"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="md:col-span-5 flex gap-2">
                            <button type="submit"
                                    class="bg-gray-800 hover:bg-gray-900 dark:bg-brand-600 dark:hover:bg-brand-700 text-white font-bold py-2 px-4 rounded text-sm">Apply Filters</button>
                            <a href="<?php echo e(route('admin.news-events.index')); ?>"
                               class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Reset</a>
                        </div>
                    </form>

                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm text-gray-500">Showing <?php echo e($items->total()); ?> record(s)</span>
                        <span>
                            <a href="<?php echo e(route('admin.news-events.export', array_merge(['format' => 'pdf'], $query))); ?>"
                               class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded text-sm">Export PDF</a>
                            <a href="<?php echo e(route('admin.news-events.export', array_merge(['format' => 'xlsx'], $query))); ?>"
                               class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-3 rounded text-sm">Export Excel</a>
                        </span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject / Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Venue</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Media</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php $isNews = $item->type === 'news'; ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php if($isNews): ?>
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-cyan-100 text-cyan-800">News</span>
                                            <?php else: ?>
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800">Event</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php if($isNews): ?>
                                                <?php if($item->image_path): ?>
                                                    <img src="<?php echo e(asset('storage/' . $item->image_path)); ?>" alt="<?php echo e($item->title); ?>"
                                                         class="w-12 h-12 rounded-full object-cover">
                                                <?php else: ?>
                                                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs">N/A</div>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(method_exists($item, 'coverImageUrl') && $item->coverImageUrl()): ?>
                                                    <img src="<?php echo e($item->coverImageUrl()); ?>" alt="<?php echo e($item->title); ?>"
                                                         class="w-12 h-12 rounded-full object-cover">
                                                <?php else: ?>
                                                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs">N/A</div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?php echo e(Str::limit($item->title, 50)); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e($isNews ? '—' : ($item->subject ?? ($item->category?->name ?? '—'))); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e(optional($item->display_date)->format('M d, Y') ?? '—'); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e($isNews ? '—' : Str::limit($item->location ?? '', 30)); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php if($isNews): ?>
                                                <?php echo e($item->images_count); ?> img
                                            <?php else: ?>
                                                <?php echo e($item->images_count); ?> img / <?php echo e($item->videos_count); ?> vid
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php if($item->is_featured): ?>
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Featured</span>
                                            <?php else: ?>
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Regular</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php if($item->is_active): ?>
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                            <?php else: ?>
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <?php if($isNews): ?>
                                                    <a href="<?php echo e(route('admin.news.show', $item)); ?>" class="text-blue-600 hover:text-blue-900">View</a>
                                                    <a href="<?php echo e(route('admin.news.edit', $item)); ?>" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    <form method="POST" action="<?php echo e(route('admin.news.destroy', $item)); ?>"
                                                          onsubmit="return confirm('Are you sure you want to delete this article?')" class="inline">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                    </form>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('admin.events.show', $item)); ?>" class="text-blue-600 hover:text-blue-900">View</a>
                                                    <a href="<?php echo e(route('admin.events.edit', $item)); ?>" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    <form method="POST" action="<?php echo e(route('admin.events.destroy', $item)); ?>"
                                                          onsubmit="return confirm('Are you sure you want to delete this event?')" class="inline">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="10" class="px-6 py-4 text-center text-gray-500">
                                        No records found matching your filters.
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php if($items->hasPages()): ?>
                        <div class="mt-6">
                            <?php echo e($items->links()); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/news-events/index.blade.php ENDPATH**/ ?>