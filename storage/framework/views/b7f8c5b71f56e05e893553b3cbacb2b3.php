<?php $__env->startSection('content'); ?>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Add New Page</h1>
                    <a href="<?php echo e(route('admin.pages.index')); ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
                </div>

                <form method="POST" action="<?php echo e(route('admin.pages.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- title -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Page Title</label>
                            <input type="text" name="title" value="<?php echo e(old('title')); ?>" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm" required>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <!-- parent_id -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Parent Page (Optional)</label>
                                    <select name="parent_selection" id="parent_selection" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">None (Top Level)</option>
                                        <optgroup label="Global Menus">
                                            <option value="static:who_we_are" <?php echo e((old('parent_selection') == 'static:who_we_are' || (isset($page) && $page->static_parent == 'who_we_are')) ? 'selected' : ''); ?>>About Directorate</option>
                                            <option value="static:ngo_registration" <?php echo e((old('parent_selection') == 'static:ngo_registration' || (isset($page) && $page->static_parent == 'ngo_registration')) ? 'selected' : ''); ?>>NGO Registration</option>
                                        </optgroup>
                                        <optgroup label="Existing Pages">
                                            <?php $__currentLoopData = $parentPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentPage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($parentPage->id); ?>" <?php echo e((old('parent_selection') == $parentPage->id || (isset($page) && $page->parent_id == $parentPage->id)) ? 'selected' : ''); ?>>
                                                    <?php echo e($parentPage->title); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </optgroup>
                                    </select>
                            <?php $__errorArgs = ['parent_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>

                        <!-- order -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Display Order</label>
                            <input type="number" name="order" value="<?php echo e(old('order', 0)); ?>" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm">
                        </div>

                        <!-- navigation -->
                        <div class="md:col-span-2 flex items-center">
                            <input type="checkbox" name="show_in_navigation" value="1" <?php echo e(old('show_in_navigation', true) ? 'checked' : ''); ?>>
                            <span class="ml-2 text-sm text-gray-700">Show in Navigation Menu</span>
                        </div>
                    </div>

                    <!-- SEO fields -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">SEO Meta Title</label>
                        <input type="text" name="meta_title" value="<?php echo e(old('meta_title')); ?>" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm">
                    </div>
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">SEO Meta Description</label>
                        <textarea name="meta_description" rows="3" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm"><?php echo e(old('meta_description')); ?></textarea>
                    </div>
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">SEO Meta Keywords</label>
                        <input type="text" name="meta_keywords" value="<?php echo e(old('meta_keywords')); ?>" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm">
                    </div>

                    <!-- Rich Text Editor -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">Page Content</label>
                        <textarea id="content" name="content" rows="15" class="mt-1 block w-full"><?php echo e(old('content')); ?></textarea>
                        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Attach File -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">Attach File (PDF / DOC)</label>
                        <input type="file" name="file_path" accept=".pdf,.doc,.docx"
                               class="mt-1 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-500 file:text-white file:cursor-pointer hover:file:bg-blue-700">
                        <p class="mt-1 text-sm text-gray-500">Optional. PDF, DOC or DOCX files only.</p>
                        <?php $__errorArgs = ['file_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="<?php echo e(route('admin.pages.index')); ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold px-4 py-2 rounded">Cancel</a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">Create Page</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    class PageImageUploadAdapter {
        constructor(loader) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file.then(file => {
                const data = new FormData();
                data.append('upload', file);

                return fetch('<?php echo e(route("admin.pages.upload-image")); ?>', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    body: data
                })
                .then(response => response.json())
                .then(result => {
                    if (!result || !result.url) {
                        throw new Error('Invalid upload response');
                    }

                    return {
                        default: result.url
                    };
                });
            });
        }

        abort() {}
    }

    ClassicEditor.create(document.querySelector('#content'), {
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', '|',
                'bulletedList', 'numberedList', '|',
                'link', 'imageUpload', '|',
                'undo', 'redo'
            ]
        },
    })
    .then(editor => {
        editor.plugins.get('FileRepository').createUploadAdapter = loader => {
            return new PageImageUploadAdapter(loader);
        };
    })
    .catch(error => {
        console.error(error);
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/pages/create.blade.php ENDPATH**/ ?>