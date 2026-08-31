<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-900 mb-6">Add New Content</h1>

                    <form method="POST" action="<?php echo e(route('admin.page-contents.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Page</label>
                                <select name="page_key" class="w-full border-gray-300 rounded-md shadow-sm focus:border-brand-500 focus:ring-brand-500">
                                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e($pageKey === $key ? 'selected' : ''); ?>><?php echo e($name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Section</label>
                                <select name="section_key" class="w-full border-gray-300 rounded-md shadow-sm focus:border-brand-500 focus:ring-brand-500">
                                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                                <input type="text" name="title" class="w-full border-gray-300 rounded-md shadow-sm focus:border-brand-500 focus:ring-brand-500">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                                <textarea name="content" rows="6" class="w-full border-gray-300 rounded-md shadow-sm focus:border-brand-500 focus:ring-brand-500"></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image Path</label>
                                <input type="text" name="image" placeholder="e.g., images/hero.jpg" class="w-full border-gray-300 rounded-md shadow-sm focus:border-brand-500 focus:ring-brand-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                                <input type="text" name="button_text" class="w-full border-gray-300 rounded-md shadow-sm focus:border-brand-500 focus:ring-brand-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                                <input type="text" name="button_link" placeholder="e.g., /contact" class="w-full border-gray-300 rounded-md shadow-sm focus:border-brand-500 focus:ring-brand-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                                <input type="number" name="order" value="0" class="w-full border-gray-300 rounded-md shadow-sm focus:border-brand-500 focus:ring-brand-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <div class="flex items-center mt-4">
                                    <input type="checkbox" name="is_active" id="is_active" value="1" checked class="w-4 h-4 text-brand-600 border-gray-300 rounded focus:ring-brand-500">
                                    <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6 gap-4">
                            <a href="<?php echo e(route('admin.page-contents.index', ['page' => $pageKey])); ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
                            <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-bold py-2 px-4 rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/page-contents/create.blade.php ENDPATH**/ ?>