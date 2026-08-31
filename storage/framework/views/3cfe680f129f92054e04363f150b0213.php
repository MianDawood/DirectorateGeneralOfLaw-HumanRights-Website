<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Add New News Article</h1>
                        <a href="<?php echo e(route('admin.news-events.index')); ?>"
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                    </div>

                    <form method="POST" action="<?php echo e(route('admin.news.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title" value="<?php echo e(old('title')); ?>"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                       required>
                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Image -->
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                                <input type="file" name="image" id="image" accept="image/*"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <p class="mt-1 text-sm text-gray-500">Recommended size: 800x400px. Max file size: 2MB</p>
                            </div>

                            <!-- Published Date -->
                            <div>
                                <label for="published_date" class="block text-sm font-medium text-gray-700">Published Date</label>
                                <input type="date" name="published_date" id="published_date" value="<?php echo e(old('published_date', date('Y-m-d'))); ?>"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                       required>
                                <?php $__errorArgs = ['published_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Order -->
                            <div>
                                <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
                                <input type="number" name="order" id="order" value="<?php echo e(old('order', 0)); ?>" min="0"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Is Featured -->
                            <div class="flex items-center">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_featured" value="1" <?php echo e(old('is_featured') ? 'checked' : ''); ?>

                                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Mark as Featured Article</span>
                                </label>
                            </div>

                            <!-- Is Active -->
                            <div class="flex items-center">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', true) ? 'checked' : ''); ?>

                                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Publish Article (Active)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Excerpt -->
                        <div class="mt-6">
                            <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt (Short Summary)</label>
                            <textarea name="excerpt" id="excerpt" rows="3"
                                      class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                      required><?php echo e(old('excerpt')); ?></textarea>
                            <p class="mt-1 text-sm text-gray-500">This will be displayed on the homepage card (max 500 characters)</p>
                            <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Content -->
                        <div class="mt-6">
                            <label for="content" class="block text-sm font-medium text-gray-700">Full Content</label>
                            <textarea name="content" id="content" rows="12"
                                      class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                      required><?php echo e(old('content')); ?></textarea>
                            <p class="mt-1 text-sm text-gray-500">Use double line breaks to create paragraphs. This content will be displayed on the news detail page.</p>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Gallery Images -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Gallery Images</h3>
                            <p class="text-sm text-gray-500 mb-4">Upload one or more photos. Visitors can click to enlarge on the news detail page.</p>
                            <input type="file" name="images[]" id="images" accept="image/*" multiple
                                   class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php $__errorArgs = ['images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <p class="mt-1 text-sm text-gray-500">JPG, PNG, WEBP. Max 4MB per image. Select multiple files at once.</p>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Article
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/news/create.blade.php ENDPATH**/ ?>