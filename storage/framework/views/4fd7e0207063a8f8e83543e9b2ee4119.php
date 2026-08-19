<?php
    $pageTitle = $metaTitle ?? $page->title;
    $pageDescription = $metaDescription ?? $page->meta_description;
    $isAdmin = auth()->check() && auth()->user()->isAdmin();
?>

<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => $pageTitle]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pageTitle)]); ?>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo e($page->title); ?></h1>
                <?php if (!empty($pageDescription)): ?>
                    <p class="mt-2 text-lg text-gray-600 dark:text-gray-300"><?php echo e($pageDescription); ?></p>
                <?php endif; ?>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-3">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 lg:p-8">
                        <div class="prose prose-lg max-w-none dark:prose-invert">
                            <?php echo $page->content; ?>

                        </div>
                        <?php if($page->file_path): ?>
                            <div class="mt-8 border-t border-gray-100 dark:border-gray-700 pt-6">
                                <a href="<?php echo e(asset('storage/' . $page->file_path)); ?>" target="_blank"
                                   class="inline-flex items-center gap-2 bg-[#123B2D] hover:bg-[#0e2c22] text-white font-bold py-3 px-6 rounded-xl transition-all">
                                    <i data-lucide="download" class="w-4 h-4"></i>
                                    Download <?php echo e(strtoupper(pathinfo($page->file_path, PATHINFO_EXTENSION))); ?> Document
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <?php if ($navigationPages->count() > 0): ?>
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Pages</h3>
                            <nav class="space-y-2">
                                <?php foreach ($navigationPages as $navPage): ?>
                                    <a href="<?php echo e(route('page.show', $navPage->slug)); ?>"
                                       class="block px-3 py-2 rounded-md text-sm font-medium <?php echo e($navPage->id === $page->id ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-700'); ?>">
                                        <?php echo e($navPage->title); ?>

                                    </a>
                                <?php endforeach; ?>
                            </nav>
                        </div>
                    <?php endif; ?>

                    <?php if ($isAdmin): ?>
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Admin Actions</h3>
                            <div class="space-y-2">
                                <a href="<?php echo e(route('admin.pages.edit', $page)); ?>"
                                   class="block w-full text-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md">
                                    Edit Page
                                </a>
                                <a href="<?php echo e(route('admin.pages.show', $page)); ?>"
                                   class="block w-full text-center bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-md">
                                    Admin View
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/page.blade.php ENDPATH**/ ?>