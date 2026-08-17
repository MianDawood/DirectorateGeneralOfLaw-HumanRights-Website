<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">NGO Notices Page Management</h1>
                        <a href="<?php echo e(route('admin.ngo-notices-pages.create')); ?>" class="bg-brand-500 hover:bg-brand-600 text-white font-bold py-2 px-4 rounded">Add Section</a>
                    </div>
                    <?php if(session('success')): ?><div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"><?php echo e(session('success')); ?></div><?php endif; ?>
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-50"><tr><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Section</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th></tr></thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__empty_1 = true; $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900"><?php echo e($section->section_key); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500"><?php echo e(Str::limit($section->title, 30)); ?></td>
                                    <td class="px-6 py-4 text-sm font-medium">
                                        <a href="<?php echo e(route('admin.ngo-notices-pages.edit', $section)); ?>" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                        <form method="POST" action="<?php echo e(route('admin.ngo-notices-pages.destroy', $section)); ?>" class="inline" onsubmit="return confirm('Are you sure?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit" class="text-red-600 hover:text-red-900">Delete</button></form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="3" class="px-6 py-4 text-center text-gray-500">No sections found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/ngo-notices-pages/index.blade.php ENDPATH**/ ?>