<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                     <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Gallery Items</h1>
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-end md:ml-auto">
                            <form method="GET" action="<?php echo e(route('admin.gallery-items.index')); ?>" class="flex items-center gap-2">
                               
                                <select name="type" id="type"
                                        class="px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm"
                                        onchange="this.form.submit()">
                                    <option value="">All</option>
                                    <option value="photo" <?php echo e(request('type') === 'photo' ? 'selected' : ''); ?>>Photo</option>
                                    <option value="video" <?php echo e(request('type') === 'video' ? 'selected' : ''); ?>>Video</option>
                                </select>
                            </form>
                            <a href="<?php echo e(route('admin.gallery-items.create')); ?>"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add Item
                            </a>
                        </div>
                    </div>

                    <?php if(session('success')): ?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preview</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php
                                        $preview = $item->thumbnail_path ?: $item->media_path;
                                        $previewUrl = $preview
                                            ? (str_starts_with($preview, 'images/') ? asset($preview) : asset('storage/' . $preview))
                                            : null;
                                    ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php if($previewUrl): ?>
                                                <img src="<?php echo e($previewUrl); ?>" alt="<?php echo e($item->title ?? 'Preview'); ?>" class="w-12 h-12 rounded object-cover">
                                            <?php else: ?>
                                                <div class="w-12 h-12 rounded bg-gray-100 flex items-center justify-center text-gray-400 text-xs">
                                                    N/A
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?php echo e($item->title ?? 'Untitled'); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e(ucfirst($item->type)); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo e(strtolower($item->status) === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'); ?>">
                                                <?php echo e(ucfirst($item->status)); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e($item->order); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="<?php echo e(route('admin.gallery-items.show', $item)); ?>"
                                               class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                            <a href="<?php echo e(route('admin.gallery-items.edit', $item)); ?>"
                                               class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                            <form method="POST" action="<?php echo e(route('admin.gallery-items.destroy', $item)); ?>"
                                                  class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this item?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                            No gallery items found.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <?php echo e($items->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/gallery-items/index.blade.php ENDPATH**/ ?>