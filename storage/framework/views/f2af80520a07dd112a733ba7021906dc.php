<?php
    $ngos = $ngos ?? collect();
    $type = $type ?? 'registered';
    $districts = $districts ?? [];
    $thematicAreas = $thematicAreas ?? [];
    $pageTitle = $pageTitle ?? 'NGOs';
    $pageDescription = $pageDescription ?? '';
    $statusBadge = $statusBadge ?? null;

    $date = function ($value) {
        return $value ? \Carbon\Carbon::parse($value)->format('Y-m-d') : '—';
    };
?>



<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900"><?php echo e($pageTitle); ?></h1>
                            <p class="mt-1 text-sm text-gray-600"><?php echo e($pageDescription); ?></p>
                        </div>
                        <span class="inline-flex items-center rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-700">
                            Total: <?php echo e($ngos->total()); ?>

                        </span>
                    </div>

                    <?php if(session('success')): ?>
                        <div class="border border-green-400 bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="GET" action="<?php echo e(url()->current()); ?>" class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">District</label>
                            <select name="district"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">All Districts</option>
                                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($d); ?>" <?php if(request('district') === $d): echo 'selected'; endif; ?>><?php echo e($d); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Thematic Area</label>
                            <select name="thematic_area"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">All Thematic Areas</option>
                                <?php $__currentLoopData = $thematicAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($label); ?>" <?php if(request('thematic_area') === $label): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Date From</label>
                            <input type="date" name="date_from" value="<?php echo e(request('date_from')); ?>"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Date To</label>
                            <input type="date" name="date_to" value="<?php echo e(request('date_to')); ?>"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="md:col-span-4 flex gap-2 flex-wrap">
                            <button type="submit"
                                    class="bg-gray-800 hover:bg-gray-900 dark:bg-brand-600 dark:hover:bg-brand-700 text-white font-bold py-2 px-4 rounded text-sm">Apply Filters</button>
                            <a href="<?php echo e(url()->current()); ?>"
                               class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Reset</a>
                            <span class="flex-1"></span>
                            <?php if(isset($exportRoute) && $exportRoute): ?>
                                <?php $query = request()->only(['district', 'thematic_area', 'date_from', 'date_to']); ?>
                                <a href="<?php echo e(route($exportRoute, array_merge(['format' => 'pdf'], $query))); ?>"
                                   class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded text-sm">Export PDF</a>
                                <a href="<?php echo e(route($exportRoute, array_merge(['format' => 'xlsx'], $query))); ?>"
                                   class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-3 rounded text-sm">Export Excel</a>
                            <?php endif; ?>
                        </div>
                    </form>

                    <?php if($customFilters ?? null): ?>
                        <?php echo e($customFilters); ?>

                    <?php endif; ?>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"><?php echo e($column); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $__empty_1 = true; $__currentLoopData = $ngos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ngo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <?php $__currentLoopData = $rows[$loop->index]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $cell; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="<?php echo e(count($columns)); ?>" class="px-6 py-4 text-center text-gray-500">
                                            No <?php echo e(strtolower($pageTitle)); ?> found.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php if($ngos->hasPages()): ?>
                        <div class="mt-6">
                            <?php echo e($ngos->links()); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/ngos/_partial.blade.php ENDPATH**/ ?>