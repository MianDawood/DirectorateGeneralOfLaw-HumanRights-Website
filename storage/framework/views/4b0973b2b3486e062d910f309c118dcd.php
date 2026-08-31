<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Edit Publication</h1>
                            <p class="mt-2 text-sm text-gray-600">Update the publication details or replace the PDF file.</p>
                        </div>
                        <a href="<?php echo e(route('admin.publications.index')); ?>" class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-600 px-4 py-2 text-sm font-semibold shadow-sm hover:bg-gray-700">
                            Back to list
                        </a>
                    </div>

                    <form action="<?php echo e(route('admin.publications.update', $publication)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <?php echo $__env->make('pages.dashboard.publications._form', ['publication' => $publication, 'categories' => $categories], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">
                                Update Publication
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/publications/edit.blade.php ENDPATH**/ ?>