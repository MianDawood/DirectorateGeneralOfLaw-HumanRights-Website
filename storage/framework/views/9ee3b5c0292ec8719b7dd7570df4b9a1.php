<?php
    $settings = \App\Models\SiteSetting::getSettings();
?>

<?php $__env->startSection('content'); ?>
    <div class="relative z-1 bg-white p-6 sm:p-0 dark:bg-gray-900">
        <div class="relative flex h-screen w-full flex-col justify-center sm:p-0 lg:flex-row dark:bg-gray-900">
            <div class="flex w-full flex-1 flex-col lg:w-1/2">
                <div class="mx-auto w-full max-w-md pt-10">
                    <a href="<?php echo e(route('login')); ?>"
                        class="inline-flex items-center text-sm text-gray-500 transition-colors hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg class="stroke-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M12.7083 5L7.5 10.2083L12.7083 15.4167" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Back to login
                    </a>
                </div>

                <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center">
                    <div class="mb-5 sm:mb-8">
                        <h1 class="text-title-sm sm:text-title-md mb-2 font-semibold text-gray-800 dark:text-white/90">
                            Forgot Password
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Enter your administrator email and we will send you a password reset link.
                        </p>
                    </div>

                    <?php if(session('status')): ?>
                        <div class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="space-y-5">
                            <div>
                                <label for="email" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Email<span class="text-error-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                                    placeholder="admin@example.com"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-error-500 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-xs text-error-500"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div>
                                <button type="submit"
                                    class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 flex w-full items-center justify-center rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                                    Send Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-brand-950 relative hidden h-full w-full items-center lg:grid lg:w-1/2 dark:bg-white/5">
                <div class="z-1 flex items-center justify-center">
                    <?php if (isset($component)) { $__componentOriginalbde5387982a24421da847c9781a86dc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbde5387982a24421da847c9781a86dc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.common.common-grid-shape','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('common.common-grid-shape'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbde5387982a24421da847c9781a86dc0)): ?>
<?php $attributes = $__attributesOriginalbde5387982a24421da847c9781a86dc0; ?>
<?php unset($__attributesOriginalbde5387982a24421da847c9781a86dc0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbde5387982a24421da847c9781a86dc0)): ?>
<?php $component = $__componentOriginalbde5387982a24421da847c9781a86dc0; ?>
<?php unset($__componentOriginalbde5387982a24421da847c9781a86dc0); ?>
<?php endif; ?>
                    <div class="flex max-w-xs flex-col items-center">
                        <a href="/" class="mb-4 block">
                            <img src="<?php echo e($settings->logo ? asset('storage/' . $settings->logo) : asset('images/logo.jpg')); ?>" alt="Logo" class="w-20" />
                        </a>
                        <p class="text-center text-gray-400 dark:text-white/60 text-xl font-bold">
                            Human Rights Directorate <br> KP
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fullscreen-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/auth/forgot-password.blade.php ENDPATH**/ ?>