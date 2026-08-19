<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Tenders Management</h1>
                        <a href="<?php echo e(route('admin.tenders.create')); ?>"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add New Tender
                        </a>
                    </div>

                    <?php if(session('success')): ?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="GET" action="<?php echo e(route('admin.tenders.index')); ?>" class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                        <div>
                            <label for="search" class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Search</label>
                            <input type="text" name="search" id="search" value="<?php echo e(request('search')); ?>"
                                   placeholder="Search by title, reference no, or description..."
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="flex gap-2">
                            <button type="submit"
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Search</button>
                            <a href="<?php echo e(route('admin.tenders.index')); ?>"
                               class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Reset</a>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reference No.</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publish Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Closing Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $__empty_1 = true; $__currentLoopData = $tenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?php echo e($tender->title); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e($tender->reference_no); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e(optional($tender->publish_date)->format('M d, Y') ?? '—'); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e(optional($tender->closing_date)->format('M d, Y') ?? '—'); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo e(strtolower($tender->status) === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'); ?>">
                                                <?php echo e(ucfirst($tender->status)); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="<?php echo e(route('admin.tenders.show', $tender)); ?>"
                                               class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                            <a href="<?php echo e(route('admin.tenders.edit', $tender)); ?>"
                                               class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                            <form method="POST" action="<?php echo e(route('admin.tenders.destroy', $tender)); ?>"
                                                  class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this tender?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                            No tenders found.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <?php echo e($tenders->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/tenders/index.blade.php ENDPATH**/ ?>