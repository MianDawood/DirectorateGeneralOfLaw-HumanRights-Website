<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label for="title" class="block text-sm font-medium text-gray-700">Title (Optional)</label>
        <input
            type="text"
            name="title"
            id="title"
            value="<?php echo e(old('title', $headerCampaign->title ?? '')); ?>"
            class="mt-1 block w-full rounded-md border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            placeholder="Optional campaign title"
        >
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

    <div class="md:col-span-2">
        <label for="url" class="block text-sm font-medium text-gray-700">Banner Link</label>
        <input
            type="url"
            name="url"
            id="url"
            value="<?php echo e(old('url', $headerCampaign->url ?? '')); ?>"
            class="mt-1 block w-full rounded-md border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            placeholder="https://example.com/page"
            required
        >
        <?php $__errorArgs = ['url'];
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
        <label for="image" class="block text-sm font-medium text-gray-700">Banner Image</label>
        <input
            type="file"
            name="image"
            id="image"
            accept="image/*"
            class="mt-1 block w-full rounded-md border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            <?php echo e(isset($headerCampaign) ? '' : 'required'); ?>

        >
        <p class="mt-1 text-sm text-gray-500">Use a small horizontal image. Max size: 4MB.</p>
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
    </div>

    <div>
        <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
        <input
            type="number"
            name="order"
            id="order"
            min="0"
            value="<?php echo e(old('order', $headerCampaign->order ?? 0)); ?>"
            class="mt-1 block w-full rounded-md border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-blue-500"
        >
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

    <?php if(!empty($headerCampaign?->image_path)): ?>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700">Current Image</label>
            <img
                src="<?php echo e(asset('storage/' . $headerCampaign->image_path)); ?>"
                alt="<?php echo e($headerCampaign->title ?: 'Header campaign'); ?>"
                class="mt-2 h-24 rounded-lg border border-gray-200 object-cover"
            >
        </div>
    <?php endif; ?>

    <div class="md:col-span-2 flex items-center">
        <label class="inline-flex items-center">
            <input
                type="checkbox"
                name="is_active"
                value="1"
                <?php echo e(old('is_active', $headerCampaign->is_active ?? true) ? 'checked' : ''); ?>

                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
            >
            <span class="ml-2 text-sm text-gray-700">Show this campaign in the header</span>
        </label>
    </div>
</div>
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/header-campaigns/_form.blade.php ENDPATH**/ ?>