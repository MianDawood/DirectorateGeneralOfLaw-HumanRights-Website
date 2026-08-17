<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">View Official Message</h1>
                        <div>
                            <a href="<?php echo e(route('admin.official-messages.edit', $officialMessage)); ?>"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Edit
                            </a>
                            <a href="<?php echo e(route('admin.official-messages.index')); ?>"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Image and Basic Info -->
                        <div>
                            <div class="flex items-center gap-6 mb-6">
                                <img src="<?php echo e(asset('storage/' . $officialMessage->image_path)); ?>" alt="<?php echo e($officialMessage->name); ?>"
                                     class="w-24 h-24 rounded-full object-cover border-4 border-gray-300 shadow-lg <?php echo e($officialMessage->image_path === 'images/logo.jpg' ? 'p-2 bg-white' : ''); ?>">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900"><?php echo e($officialMessage->name); ?></h2>
                                    <p class="text-sm font-medium text-blue-600 uppercase tracking-wider"><?php echo e($officialMessage->position); ?></p>
                                    <div class="mt-2">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo e($officialMessage->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                            <?php echo e($officialMessage->is_active ? 'Active' : 'Inactive'); ?>

                                        </span>
                                        <span class="ml-2 text-sm text-gray-500">Order: <?php echo e($officialMessage->order); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Metadata -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Metadata</h3>
                            <dl class="space-y-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Created At</dt>
                                    <dd class="text-sm text-gray-900"><?php echo e($officialMessage->created_at->format('M d, Y H:i')); ?></dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                                    <dd class="text-sm text-gray-900"><?php echo e($officialMessage->updated_at->format('M d, Y H:i')); ?></dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Image Path</dt>
                                    <dd class="text-sm text-gray-900 break-all"><?php echo e($officialMessage->image_path); ?></dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Statement -->
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Statement (Modal Display)</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="text-gray-700 prose max-w-none">
                                <?php $__currentLoopData = explode("\n\n", $officialMessage->statement); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p><?php echo e($paragraph); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/official-messages/show.blade.php ENDPATH**/ ?>