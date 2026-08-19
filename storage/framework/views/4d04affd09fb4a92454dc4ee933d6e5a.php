<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900"><?php echo e($event->title); ?></h1>
                        <div class="flex gap-2">
                            <a href="<?php echo e(route('events.show', $event)); ?>" target="_blank"
                               class="bg-gray-100 hover:bg-gray-200 dark:text-gray-800 text-gray-800 font-bold py-2 px-4 rounded text-sm">Public View</a>
                            <a href="<?php echo e(route('admin.events.edit', $event)); ?>"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">Edit</a>
                            <a href="<?php echo e(route('admin.news-events.index')); ?>"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-sm">Back</a>
                        </div>
                    </div>

                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm mb-8">
                        <div><dt class="font-semibold text-gray-500">Date</dt>
                            <dd class="dark:text-gray-300"><?php echo e($event->event_date?->format('d M Y, h:i A')); ?></dd></div>
                        <div><dt class="font-semibold text-gray-500">Venue</dt>
                            <dd class="dark:text-gray-300"><?php echo e($event->location); ?></dd></div>
                        <?php if($event->subject): ?>
                            <div class="md:col-span-2"><dt class="font-semibold text-gray-500">Subject</dt><dd class="dark:text-gray-300"><?php echo e($event->subject); ?></dd></div>
                        <?php endif; ?>
                        <div class="md:col-span-2"><dt class="font-semibold text-gray-500">Description</dt><dd class="dark:text-gray-300 whitespace-pre-wrap"><?php echo e($event->description); ?></dd></div>
                    </dl>

                    <h3 class="font-bold text-gray-900 mb-3">Images (<?php echo e($event->images->count()); ?>)</h3>
                    <?php if($event->images->isNotEmpty()): ?>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8">
                            <?php $__currentLoopData = $event->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e(asset('storage/' . $image->image_path)); ?>" alt="" class="rounded-lg h-32 w-full object-cover">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500 mb-8">No images uploaded.</p>
                    <?php endif; ?>

                    <h3 class="font-bold text-gray-900 mb-3">Videos (<?php echo e($event->videos->count()); ?>)</h3>
                    <?php if($event->videos->isNotEmpty()): ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <?php $__currentLoopData = $event->videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <?php if (isset($component)) { $__componentOriginal65c1bc827ee2e7b04750a06fc4595f0e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal65c1bc827ee2e7b04750a06fc4595f0e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.youtube-embed','data' => ['videoId' => $video->youtube_video_id,'title' => $event->title]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.youtube-embed'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['videoId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($video->youtube_video_id),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($event->title)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal65c1bc827ee2e7b04750a06fc4595f0e)): ?>
<?php $attributes = $__attributesOriginal65c1bc827ee2e7b04750a06fc4595f0e; ?>
<?php unset($__attributesOriginal65c1bc827ee2e7b04750a06fc4595f0e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal65c1bc827ee2e7b04750a06fc4595f0e)): ?>
<?php $component = $__componentOriginal65c1bc827ee2e7b04750a06fc4595f0e; ?>
<?php unset($__componentOriginal65c1bc827ee2e7b04750a06fc4595f0e); ?>
<?php endif; ?>
                                    <p class="text-xs text-gray-500 mt-1 truncate"><?php echo e($video->youtube_url); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500">No YouTube videos linked.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/events/show.blade.php ENDPATH**/ ?>