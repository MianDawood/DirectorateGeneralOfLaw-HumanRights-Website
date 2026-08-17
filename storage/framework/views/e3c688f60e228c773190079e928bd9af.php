<?php $__env->startSection('content'); ?>
    <div class="px-4 py-8 mx-auto max-w-7xl">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">User Profile</h1>
            <p class="mt-1 text-sm text-gray-500">Manage your account details and login credentials.</p>
        </div>

        <?php if(session('success')): ?>
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-200 dark:bg-white">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Account Overview</h2>

                <div class="space-y-4 text-sm">
                    <div>
                        <p class="text-gray-500">Full Name</p>
                        <p class="font-medium text-gray-900"><?php echo e($user->name); ?></p>
                    </div>
                    <div>
                        <p class="text-gray-500">Email Address</p>
                        <p class="font-medium text-gray-900"><?php echo e($user->email); ?></p>
                    </div>
                    <div>
                        <p class="text-gray-500">Email Verified</p>
                        <p class="font-medium text-gray-900">
                            <?php echo e($user->email_verified_at ? $user->email_verified_at->format('M d, Y h:i A') : 'Not verified'); ?>

                        </p>
                    </div>
                    <div>
                        <p class="text-gray-500">Member Since</p>
                        <p class="font-medium text-gray-900"><?php echo e($user->created_at->format('M d, Y')); ?></p>
                    </div>
                    <div>
                        <p class="text-gray-500">Last Updated</p>
                        <p class="font-medium text-gray-900"><?php echo e($user->updated_at->format('M d, Y h:i A')); ?></p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-200 dark:bg-white">
                <h2 class="text-lg font-semibold text-gray-800 mb-6">Update Profile</h2>

                <form method="POST" action="<?php echo e(route('dashboard.profile.update')); ?>" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="<?php echo e(old('name', $user->name)); ?>"
                            class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-brand-500 focus:ring-brand-500 dark:border-gray-300 dark:bg-white dark:text-gray-900"
                            required
                        >
                        <?php $__errorArgs = ['name'];
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

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="<?php echo e(old('email', $user->email)); ?>"
                            class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-brand-500 focus:ring-brand-500 dark:border-gray-300 dark:bg-white dark:text-gray-900"
                            required
                        >
                        <?php $__errorArgs = ['email'];
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

                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-sm font-semibold text-gray-900 mb-3">Change Password (Optional)</h3>
                        <p class="text-xs text-gray-500 mb-4">Leave password fields empty if you do not want to change it.</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="md:col-span-2">
                                <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Current Password</label>
                                <input
                                    type="password"
                                    id="current_password"
                                    name="current_password"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-brand-500 focus:ring-brand-500 dark:border-gray-300 dark:bg-white dark:text-gray-900"
                                >
                                <?php $__errorArgs = ['current_password'];
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

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">New Password</label>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-brand-500 focus:ring-brand-500 dark:border-gray-300 dark:bg-white dark:text-gray-900"
                                >
                                <?php $__errorArgs = ['password'];
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

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Confirm New Password</label>
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-brand-500 focus:ring-brand-500 dark:border-gray-300 dark:bg-white dark:text-gray-900"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-5 py-2.5 bg-brand-500 text-white text-sm font-medium rounded-lg hover:bg-brand-600 transition"
                        >
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/profile.blade.php ENDPATH**/ ?>