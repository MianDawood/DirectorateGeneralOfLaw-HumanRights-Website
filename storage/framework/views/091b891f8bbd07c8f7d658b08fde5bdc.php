<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Edit Page: <?php echo e($page->title); ?></h1>
                        <div class="space-x-2">
                            <a href="<?php echo e(route('admin.pages.show', $page)); ?>"
                               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                View Page
                            </a>
                            <a href="<?php echo e(route('admin.pages.index')); ?>"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <form method="POST" action="<?php echo e(route('admin.pages.update', $page)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-700">Page Title</label>
                                <input type="text" name="title" id="title" value="<?php echo e(old('title', $page->title)); ?>"
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


                            <!-- Parent Page -->
                            <div>
                                <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent Page (Optional)</label>
                                <select name="parent_selection" id="parent_selection"
                                        class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">None (Top Level)</option>
                                    <optgroup label="Global Menus">
                                        <option value="static:who_we_are" <?php echo e((old('parent_selection') == 'static:who_we_are' || $page->static_parent == 'who_we_are') ? 'selected' : ''); ?>>About Directorate</option>
                                        <option value="static:ngo_registration" <?php echo e((old('parent_selection') == 'static:ngo_registration' || $page->static_parent == 'ngo_registration') ? 'selected' : ''); ?>>NGO Registration</option>
                                    </optgroup>
                                    <optgroup label="Existing Pages">
                                        <?php $__currentLoopData = $parentPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($p->id); ?>" <?php echo e((old('parent_selection') == $p->id || $page->parent_id == $p->id) ? 'selected' : ''); ?>>
                                                <?php echo e($p->title); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                                </select>
                                <?php $__errorArgs = ['parent_id'];
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

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status"
                                        class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                    <option value="draft" <?php echo e(old('status', $page->status) === 'draft' ? 'selected' : ''); ?>>Draft</option>
                                    <option value="published" <?php echo e(old('status', $page->status) === 'published' ? 'selected' : ''); ?>>Published</option>
                                    <option value="archived" <?php echo e(old('status', $page->status) === 'archived' ? 'selected' : ''); ?>>Archived</option>
                                </select>
                                <?php $__errorArgs = ['status'];
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
                                <input type="number" name="order" id="order" value="<?php echo e(old('order', $page->order)); ?>" min="0"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <p class="mt-1 text-sm text-gray-500">Lower numbers appear first in navigation</p>
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


                            <!-- Show in Navigation -->
                            <div class="md:col-span-2 flex items-center">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="show_in_navigation" value="1" <?php echo e(old('show_in_navigation', $page->show_in_navigation) ? 'checked' : ''); ?>

                                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Show in Navigation Menu</span>
                                </label>
                            </div>
                        </div>

                        <!-- SEO Meta Title -->
                        <div class="mt-6">
                            <label for="meta_title" class="block text-sm font-medium text-gray-700">SEO Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" value="<?php echo e(old('meta_title', $page->meta_title)); ?>"
                                   class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Leave empty to use page title">
                            <p class="mt-1 text-sm text-gray-500">Recommended: 50-60 characters for optimal SEO</p>
                            <?php $__errorArgs = ['meta_title'];
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

                        <!-- SEO Meta Description -->
                        <div class="mt-6">
                            <label for="meta_description" class="block text-sm font-medium text-gray-700">SEO Meta Description</label>
                            <textarea name="meta_description" id="meta_description" rows="3"
                                      class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="Leave empty to auto-generate from content"><?php echo e(old('meta_description', $page->meta_description)); ?></textarea>
                            <p class="mt-1 text-sm text-gray-500">Recommended: 150-160 characters for optimal SEO</p>
                            <?php $__errorArgs = ['meta_description'];
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

                        <!-- SEO Meta Keywords -->
                        <div class="mt-6">
                            <label for="meta_keywords" class="block text-sm font-medium text-gray-700">SEO Meta Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" value="<?php echo e(old('meta_keywords', $page->meta_keywords)); ?>"
                                   class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="keyword1, keyword2, keyword3">
                            <p class="mt-1 text-sm text-gray-500">Comma-separated keywords</p>
                            <?php $__errorArgs = ['meta_keywords'];
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
                            <label for="content" class="block text-sm font-medium text-gray-700">Page Content</label>
                            <div id="editor-container" class="mt-1">
                                <textarea name="content" id="content" rows="15"
                                          class="hidden"><?php echo e(old('content', $page->content)); ?></textarea>
                                <div id="content-editor" class="min-h-[400px] border border-gray-300 rounded-md shadow-sm"></div>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Rich text editor for page content. Supports formatting, links, and media.</p>
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

                        <!-- Attach File -->
                        <div class="mt-6">
                            <label for="file_path" class="block text-sm font-medium text-gray-700">Attach File (PDF / DOC)</label>
                            <?php if($page->file_path): ?>
                                <div class="mt-2 flex items-center gap-3 bg-gray-50 p-3 rounded-md">
                                    <i class="text-gray-400">📎</i>
                                    <a href="<?php echo e(asset('storage/' . $page->file_path)); ?>" target="_blank"
                                       class="text-sm font-medium text-blue-600 hover:text-blue-900"><?php echo e(basename($page->file_path)); ?></a>
                                </div>
                            <?php endif; ?>
                            <input type="file" name="file_path" id="file_path" accept=".pdf,.doc,.docx"
                                   class="mt-2 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-500 file:text-white file:cursor-pointer hover:file:bg-blue-700">
                            <p class="mt-1 text-sm text-gray-500">PDF, DOC or DOCX files only. Uploading a new file replaces the current one.</p>
                            <?php if($page->file_path): ?>
                                <label class="mt-2 inline-flex items-center">
                                    <input type="checkbox" name="remove_file" value="1" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500">
                                    <span class="ml-2 text-sm text-red-600">Remove current file</span>
                                </label>
                            <?php endif; ?>
                            <?php $__errorArgs = ['file_path'];
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

                        <!-- CKEditor 5 Classic CDN (no API key required) -->
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

                                ClassicEditor
                                    .create(document.querySelector('#content'), {
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

                                        // Set initial content if editing
                                        <?php if(isset($page)): ?>
                                            editor.setData(<?php echo json_encode($page->content, 15, 512) ?>);
                                        <?php endif; ?>
                                    })
                                    .catch(error => {
                                        console.error('CKEditor initialization failed:', error);
                                    });
                            </script>
                        <?php $__env->stopPush(); ?>

                        <div class="mt-6 flex justify-between">
                            <div class="space-x-2">

                            </div>
                            <div class="space-x-3">
                                <a href="<?php echo e(route('admin.pages.index')); ?>"
                                   class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Cancel
                                </a>
                                <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Update Page
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/pages/edit.blade.php ENDPATH**/ ?>