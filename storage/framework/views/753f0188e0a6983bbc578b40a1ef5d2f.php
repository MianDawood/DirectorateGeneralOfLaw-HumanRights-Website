<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900"><?php echo e($page->title); ?></h1>
                        <div class="space-x-2">
                            <a href="<?php echo e($page->url); ?>" target="_blank"
                               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                View Live Page
                            </a>
                            <a href="<?php echo e(route('admin.pages.edit', $page)); ?>"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit Page
                            </a>
                            <a href="<?php echo e(route('admin.pages.index')); ?>"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <!-- Page Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Status</h3>
                            <p class="mt-1">
                                <?php if($page->status === 'published'): ?>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                                <?php elseif($page->status === 'draft'): ?>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Draft</span>
                                <?php else: ?>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Archived</span>
                                <?php endif; ?>
                            </p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Navigation</h3>
                            <p class="mt-1">
                                <?php if($page->show_in_navigation): ?>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Visible</span>
                                <?php else: ?>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Hidden</span>
                                <?php endif; ?>
                            </p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">URL Slug</h3>
                            <p class="mt-1 text-sm font-mono text-gray-900"><?php echo e($page->slug); ?></p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Order</h3>
                            <p class="mt-1 text-lg font-semibold text-gray-900"><?php echo e($page->order); ?></p>
                        </div>
                    </div>

                    <!-- SEO Information -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">SEO Information</h2>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Meta Title</h3>
                                    <p class="mt-1 text-sm text-gray-900"><?php echo e($page->meta_title ?: 'Using page title'); ?></p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Meta Description</h3>
                                    <p class="mt-1 text-sm text-gray-900"><?php echo e($page->meta_description ?: 'Auto-generated from content'); ?></p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Meta Keywords</h3>
                                    <p class="mt-1 text-sm text-gray-900"><?php echo e($page->meta_keywords ?: 'Not set'); ?></p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Template</h3>
                                    <p class="mt-1 text-sm text-gray-900"><?php echo e(ucfirst($page->template)); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Page Content -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Page Content</h2>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="prose max-w-none">
                                <?php echo $page->content; ?>

                            </div>
                        </div>
                    </div>

                    <!-- Attached File -->
                    <?php if($page->file_path): ?>
                        <div class="mb-8">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Attached File</h2>
                            <div class="bg-gray-50 p-4 rounded-lg flex items-center gap-3">
                                <i class="text-2xl">📎</i>
                                <a href="<?php echo e(asset('storage/' . $page->file_path)); ?>" target="_blank"
                                   class="text-sm font-medium text-blue-600 hover:text-blue-900"><?php echo e(basename($page->file_path)); ?></a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Additional Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Created</h3>
                            <p class="mt-1 text-sm text-gray-900"><?php echo e($page->created_at->format('M d, Y \a\t h:i A')); ?></p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Last Updated</h3>
                            <p class="mt-1 text-sm text-gray-900"><?php echo e($page->updated_at->format('M d, Y \a\t h:i A')); ?></p>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mt-8 flex flex-wrap gap-2">
                        <form method="POST" action="<?php echo e(route('admin.pages.toggle-status', $page)); ?>" class="inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                <?php echo e($page->status === 'published' ? 'Set to Draft' : 'Publish'); ?>

                            </button>
                        </form>

                        <form method="POST" action="<?php echo e(route('admin.pages.toggle-navigation', $page)); ?>" class="inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                                <?php echo e($page->show_in_navigation ? 'Hide from Navigation' : 'Show in Navigation'); ?>

                            </button>
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/pages/show.blade.php ENDPATH**/ ?>