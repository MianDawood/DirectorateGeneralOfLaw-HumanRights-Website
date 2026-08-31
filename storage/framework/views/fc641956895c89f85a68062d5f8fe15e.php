<?php $__env->startSection('content'); ?>
    <?php
        $query = collect($filters)->filter(fn ($v) => filled($v))->all();
    ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Publications</h1>
                            <p class="mt-2 text-sm text-gray-600">Manage official publications, reports, and PDF resources.</p>
                        </div>
                        <a href="<?php echo e(route('admin.publications.create')); ?>"
                           class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">
                            Add Publication
                        </a>
                    </div>

                    <?php if(session('success')): ?>
                        <div class="mb-6 rounded-lg bg-green-50 p-4 text-sm text-green-700">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="GET" action="<?php echo e(route('admin.publications.index')); ?>" class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                        <div>
                            <label for="category_id" class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Subject / Category</label>
                            <select name="category_id" id="category_id"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">All Categories</option>
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
                        <div class="md:col-span-3 flex gap-2">
                            <button type="submit"
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Apply Filters</button>
                            <a href="<?php echo e(route('admin.publications.index')); ?>"
                               class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Reset</a>
                        </div>
                    </form>

                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm text-gray-500">Showing <?php echo e($publications->total()); ?> record(s)</span>
                        <span>
                            <a href="<?php echo e(route('admin.publications.export', array_merge(['format' => 'pdf'], $query))); ?>"
                               class="inline-flex items-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-3 rounded text-sm">Export PDF</a>
                            <a href="<?php echo e(route('admin.publications.export', array_merge(['format' => 'xlsx'], $query))); ?>"
                               class="inline-flex items-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-3 rounded text-sm">Export Excel</a>
                        </span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Cover</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Published</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">File</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <?php $__empty_1 = true; $__currentLoopData = $publications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php if($publication->coverImageUrl()): ?>
                                                <img src="<?php echo e($publication->coverImageUrl()); ?>" alt="<?php echo e($publication->title); ?>"
                                                     class="h-12 w-20 rounded object-cover">
                                            <?php else: ?>
                                                <span class="text-xs text-gray-400">—</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($publication->title); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($publication->category); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($publication->published_date->format('M d, Y')); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($publication->file_type); ?> • <?php echo e($publication->file_size); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <?php if($publication->is_active): ?>
                                                <span class="rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-800">Active</span>
                                            <?php else: ?>
                                                <span class="rounded-full bg-red-100 px-2 py-1 text-xs font-semibold text-red-800">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="<?php echo e(route('admin.publications.show', $publication)); ?>" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                            <a href="<?php echo e(route('admin.publications.edit', $publication)); ?>" class="text-yellow-600 hover:text-yellow-900 mr-3">Edit</a>
                                            <form action="<?php echo e(route('admin.publications.destroy', $publication)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Delete this publication?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="7" class="px-6 py-8 text-center text-sm text-gray-500">
                                            No publications found. Add a publication to get started.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        <?php echo e($publications->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/publications/index.blade.php ENDPATH**/ ?>