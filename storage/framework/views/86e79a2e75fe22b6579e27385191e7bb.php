<?php $__env->startSection('content'); ?>
    <div class="px-4 py-8 mx-auto max-w-4xl">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Homepage Settings</h1>
            <p class="mt-1 text-sm text-gray-500">Update the two campaign labels shown in the frontend header.</p>
        </div>

        <?php if(session('success')): ?>
            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <form method="POST" action="<?php echo e(route('admin.site-settings.homepage.update')); ?>" class="space-y-6 p-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div>
                    <label for="home_campaign_primary" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Primary Campaign Label
                    </label>
                    <input
                        type="text"
                        id="home_campaign_primary"
                        name="home_campaign_primary"
                        value="<?php echo e(old('home_campaign_primary', $settings['home_campaign_primary'])); ?>"
                        class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-3 text-sm text-gray-900 shadow-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white"
                    >
                    <?php $__errorArgs = ['home_campaign_primary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
<!-- 
                <div>
                    <label for="home_campaign_secondary" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Secondary Campaign Label
                    </label>
                    <input
                        type="text"
                        id="home_campaign_secondary"
                        name="home_campaign_secondary"
                        value="<?php echo e(old('home_campaign_secondary', $settings['home_campaign_secondary'])); ?>"
                        class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-3 text-sm text-gray-900 shadow-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white"
                    >
                    <?php $__errorArgs = ['home_campaign_secondary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div> -->

                <div class="flex items-center justify-end">
                    <button
                        type="submit"
                        class="inline-flex items-center rounded-lg bg-brand-500 px-5 py-3 text-sm font-medium text-white transition hover:bg-brand-600"
                    >
                        Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/site-settings/homepage.blade.php ENDPATH**/ ?>