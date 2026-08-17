<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">View Partner</h1>
                        <div>
                            <a href="<?php echo e(route('admin.partners.edit', $partner)); ?>"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Edit
                            </a>
                            <a href="<?php echo e(route('admin.partners.index')); ?>"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <div class="flex items-center gap-6 mb-6">
                                <img src="<?php echo e(asset('storage/' . $partner->logo_path)); ?>" alt="<?php echo e($partner->name); ?>"
                                     class="h-24 w-auto object-contain border border-gray-100 rounded-lg p-2">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900"><?php echo e($partner->name); ?></h2>
                                    <div class="mt-2">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo e($partner->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                            <?php echo e($partner->is_active ? 'Active' : 'Inactive'); ?>

                                        </span>
                                        <span class="ml-2 text-sm text-gray-500">Order: <?php echo e($partner->order); ?></span>
                                    </div>
                                    <?php if($partner->url): ?>
                                        <a href="<?php echo e($partner->url); ?>" target="_blank"
                                           class="mt-2 inline-flex items-center gap-1 text-sm text-blue-600 hover:text-blue-800">
                                            <?php echo e($partner->url); ?>

                                            <i data-lucide="external-link" class="w-3 h-3"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Metadata</h3>
                            <dl class="space-y-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Created At</dt>
                                    <dd class="text-sm text-gray-900"><?php echo e($partner->created_at->format('M d, Y H:i')); ?></dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                                    <dd class="text-sm text-gray-900"><?php echo e($partner->updated_at->format('M d, Y H:i')); ?></dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Logo Path</dt>
                                    <dd class="text-sm text-gray-900 break-all"><?php echo e($partner->logo_path); ?></dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <?php if($partner->description): ?>
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Description</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-700"><?php echo e($partner->description); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/partners/show.blade.php ENDPATH**/ ?>