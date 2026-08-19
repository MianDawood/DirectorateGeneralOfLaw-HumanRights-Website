<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Newsletter Subscriptions</h1>
                    </div>

                    <?php if(session('success')): ?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="GET" action="<?php echo e(route('admin.newsletter-subscriptions.index')); ?>"
                          class="mb-4 flex items-center gap-2">
                        <input type="text" name="search" value="<?php echo e($search ?? ''); ?>"
                               placeholder="Search by name, email or phone..."
                               class="flex-1 rounded border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition-all">
                        <button type="submit"
                                class="bg-gray-800 hover:bg-gray-900 dark:bg-brand-600 dark:hover:bg-brand-700 text-white font-bold py-2 px-4 rounded text-sm">
                            Search
                        </button>
                        <?php if(!empty($search)): ?>
                            <a href="<?php echo e(route('admin.newsletter-subscriptions.index')); ?>"
                               class="text-gray-500 hover:text-gray-700 text-sm font-medium">Clear</a>
                        <?php endif; ?>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subscribed At</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $__empty_1 = true; $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?php echo e($subscription->full_name ?: '—'); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e($subscription->email); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e($subscription->phone ?: '—'); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e($subscription->created_at?->format('d M Y, h:i A')); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <form method="POST" action="<?php echo e(route('admin.newsletter-subscriptions.destroy', $subscription)); ?>"
                                                  class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this subscription?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            <?php echo e(empty($search) ? 'No subscriptions found.' : 'No subscriptions match your search.'); ?>

                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <?php echo e($subscriptions->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/newsletter-subscriptions/index.blade.php ENDPATH**/ ?>