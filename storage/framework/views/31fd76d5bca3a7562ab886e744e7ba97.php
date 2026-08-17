<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Publication Details</h1>
                            <p class="mt-2 text-sm text-gray-600">Review the publication record and download the PDF.</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="<?php echo e(route('admin.publications.edit', $publication)); ?>" class="inline-flex items-center justify-center rounded-md bg-yellow-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-600">
                                Edit
                            </a>
                            <a href="<?php echo e(route('admin.publications.index')); ?>" class="inline-flex items-center justify-center rounded-md bg-gray-600 px-4 py-2 text-sm font-semibold  shadow-sm hover:bg-gray-700">
                                Back to list
                            </a>
                        </div>
                    </div>

                    <div class="grid gap-6 lg:grid-cols-3">
                        <div class="lg:col-span-2 space-y-6">
                            <?php if($publication->coverImageUrl()): ?>
                                <div class="rounded-2xl border border-gray-200 bg-white p-6">
                                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Featured Image</h3>
                                    <img src="<?php echo e($publication->coverImageUrl()); ?>" alt="<?php echo e($publication->title); ?>"
                                         class="w-full rounded-lg border border-gray-200 object-cover">
                                </div>
                            <?php endif; ?>

                            <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6">
                                <h2 class="text-xl font-semibold text-gray-900 mb-4"><?php echo e($publication->title); ?></h2>
                                <p class="text-gray-600 leading-relaxed"><?php echo e($publication->description); ?></p>
                            </div>

                            <div class="rounded-2xl border border-gray-200 bg-white p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Publication PDF</h3>
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="text-sm text-gray-500">File type</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($publication->file_type); ?></p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">File size</p>
                                        <p class="text-base font-semibold text-gray-900"><?php echo e($publication->file_size); ?></p>
                                    </div>
                                    <a href="<?php echo e(route('publications.download', $publication->id)); ?>" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">
                                        Download PDF
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="rounded-2xl border border-gray-200 bg-white p-6">
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Metadata</h3>
                                <dl class="mt-4 space-y-4 text-sm text-gray-700">
                                    <div>
                                        <dt class="font-medium">Category</dt>
                                        <dd><?php echo e($publication->category); ?></dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium">Published Date</dt>
                                        <dd><?php echo e($publication->published_date->format('M d, Y')); ?></dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium">Status</dt>
                                        <dd><?php echo e($publication->is_active ? 'Active' : 'Inactive'); ?></dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium">Display Order</dt>
                                        <dd><?php echo e($publication->order); ?></dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/publications/show.blade.php ENDPATH**/ ?>