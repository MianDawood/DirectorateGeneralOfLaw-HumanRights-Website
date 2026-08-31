<?php
    $publication = $publication ?? null;
    $categories = $categories ?? collect();
?>

<div class="grid grid-cols-1 gap-6">
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" id="title" name="title" value="<?php echo e(old('title', $publication?->title)); ?>" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500" />
        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" name="description" rows="4" required
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500"><?php echo e(old('description', $publication?->description)); ?></textarea>
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div x-data="manageCategories()">
            <div class="flex items-center justify-between">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Subject / Category</label>
                <button type="button" @click="open()"
                        class="inline-flex items-center px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-50 rounded-md hover:bg-blue-100">
                    + Manage Categories
                </button>
            </div>
            <select id="category_id" name="category_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
                <option value="">— Select Category —</option>
                <template x-for="cat in categories" :key="cat.id">
                    <option :value="cat.id" x-text="cat.name" :selected="String(cat.id) === selectedId"></option>
                </template>
            </select>
            <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <div x-show="modalOpen" x-cloak style="display:none"
                 class="fixed inset-0 z-50 overflow-y-auto" @keydown.escape.window="modalOpen = false">
                <div class="flex items-center justify-center min-h-screen px-4">
                    <div class="fixed inset-0 bg-black/50" @click="modalOpen = false"></div>
                    <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md p-6 my-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold text-gray-900">Manage Publication Categories</h3>
                            <button type="button" @click="modalOpen = false" class="text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
                        </div>

                        <div class="flex gap-2 mb-2">
                            <input type="text" x-model="newName" placeholder="New category name"
                                   @keydown.enter.prevent="add()"
                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm">
                            <button type="button" @click="add()"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md">Add</button>
                        </div>
                        <p x-show="error" x-text="error" class="text-sm text-red-600 mb-2"></p>

                        <ul class="divide-y divide-gray-100 max-h-72 overflow-y-auto">
                            <template x-for="cat in categories" :key="cat.id">
                                <li class="flex items-center justify-between py-2 gap-2">
                                    <template x-if="editingId !== cat.id">
                                        <span class="text-sm text-gray-800 flex-1" x-text="cat.name"></span>
                                    </template>
                                    <template x-if="editingId === cat.id">
                                        <input type="text" x-model="editingName"
                                               @keydown.enter.prevent="save(cat)"
                                               class="flex-1 px-2 py-1 border border-gray-300 rounded-md text-sm">
                                    </template>
                                    <div class="flex items-center gap-3 shrink-0">
                                        <template x-if="editingId !== cat.id">
                                            <button type="button" @click="beginEdit(cat)" class="text-indigo-600 hover:text-indigo-900 text-sm">Rename</button>
                                        </template>
                                        <template x-if="editingId === cat.id">
                                            <button type="button" @click="save(cat)" class="text-green-600 hover:text-green-900 text-sm">Save</button>
                                        </template>
                                        <button type="button" @click="remove(cat)" class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                                    </div>
                                </li>
                            </template>
                            <li x-show="categories.length === 0" class="py-3 text-sm text-gray-500 text-center">No categories yet.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <label for="published_date" class="block text-sm font-medium text-gray-700">Published Date</label>
            <input type="date" id="published_date" name="published_date" value="<?php echo e(old('published_date', $publication?->published_date?->format('Y-m-d') ?? date('Y-m-d'))); ?>" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500" />
            <?php $__errorArgs = ['published_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="file" class="block text-sm font-medium text-gray-700"><?php echo e($publication ? 'Replace PDF File' : 'PDF File'); ?></label>
            <input type="file" id="file" name="file" accept="application/pdf" <?php echo e($publication ? '' : 'required'); ?>

                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500" />
            <?php if($publication): ?>
                <p class="mt-2 text-sm text-gray-500">Current: <?php echo e($publication->file_path); ?></p>
            <?php endif; ?>
            <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Featured Image</label>
            <input type="file" id="image" name="image" accept="image/*"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500" />
            <?php if($publication?->coverImageUrl()): ?>
                <div class="mt-2">
                    <img src="<?php echo e($publication->coverImageUrl()); ?>" alt="<?php echo e($publication->title); ?>"
                         class="h-24 w-40 rounded object-cover border border-gray-200">
                    <label class="mt-2 inline-flex items-center text-sm text-gray-600">
                        <input type="checkbox" name="remove_image" value="1" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2">Remove featured image</span>
                    </label>
                </div>
            <?php else: ?>
                <p class="mt-2 text-sm text-gray-500">Upload a banner image shown on the public publications page.</p>
            <?php endif; ?>
            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <label class="inline-flex items-center">
            <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $publication?->is_active ?? true) ? 'checked' : ''); ?>

                   class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
            <span class="ml-2 text-sm text-gray-700">Active</span>
        </label>
        <label class="flex-1">
            <span class="block text-sm font-medium text-gray-700">Display Order</span>
            <input type="number" name="order" value="<?php echo e(old('order', $publication?->order ?? 0)); ?>" min="0"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500" />
            <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </label>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function manageCategories() {
    return {
        categories: <?php echo \Illuminate\Support\Js::from(
            $categories->map(fn ($c) => ['id' => $c->id, 'name' => $c->name])->values()->all()
        )->toHtml() ?>,
        selectedId: '<?php echo e(old('category_id', $publication?->category_id)); ?>',
        modalOpen: false,
        newName: '',
        editingId: null,
        editingName: '',
        error: '',
        csrf() {
            return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
        },
        open() {
            this.modalOpen = true;
            this.error = '';
            this.fetchAll();
        },
        async fetchAll() {
            try {
                const res = await fetch('<?php echo e(route('admin.publication-categories.index')); ?>', {
                    headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                });
                if (!res.ok) throw new Error();
                this.categories = await res.json();
            } catch (e) {
                this.error = 'Could not load categories.';
            }
        },
        async add() {
            const name = this.newName.trim();
            if (!name) return;
            this.error = '';
            try {
                const res = await fetch('<?php echo e(route('admin.publication-categories.store')); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': this.csrf(),
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: JSON.stringify({ name }),
                });
                const data = await res.json();
                if (!res.ok) throw new Error(data?.errors?.name?.[0] ?? 'Could not add category.');
                this.newName = '';
                await this.fetchAll();
            } catch (e) {
                this.error = e.message || 'Could not add category.';
            }
        },
        beginEdit(cat) {
            this.editingId = cat.id;
            this.editingName = cat.name;
        },
        async save(cat) {
            const name = this.editingName.trim();
            if (!name) return;
            this.error = '';
            try {
                const res = await fetch(
                    '<?php echo e(route('admin.publication-categories.update', ['category' => '__ID__'])); ?>'.replace('__ID__', cat.id),
                    {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': this.csrf(),
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        body: JSON.stringify({ name }),
                    }
                );
                const data = await res.json();
                if (!res.ok) throw new Error(data?.errors?.name?.[0] ?? 'Could not save category.');
                this.editingId = null;
                await this.fetchAll();
            } catch (e) {
                this.error = e.message || 'Could not save category.';
            }
        },
        async remove(cat) {
            if (!confirm('Delete category "' + cat.name + '"?')) return;
            this.error = '';
            try {
                const res = await fetch(
                    '<?php echo e(route('admin.publication-categories.destroy', ['category' => '__ID__'])); ?>'.replace('__ID__', cat.id),
                    {
                        method: 'DELETE',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': this.csrf(),
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    }
                );
                if (!res.ok) throw new Error();
                await this.fetchAll();
            } catch (e) {
                this.error = 'Could not delete category.';
            }
        },
    };
}
</script>
<?php $__env->stopPush(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/publications/_form.blade.php ENDPATH**/ ?>