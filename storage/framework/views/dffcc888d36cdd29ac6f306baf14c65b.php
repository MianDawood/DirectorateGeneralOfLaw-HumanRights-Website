<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">NGO Renewals</h1>
                            <p class="mt-1 text-sm text-gray-600">Manage registration renewals for expiring NGO certificates.</p>
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

                    <form method="GET" action="<?php echo e(route('admin.ngos.renewals.index')); ?>" class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Scope</label>
                            <select name="scope"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="due" <?php if(request('scope', $scope) === 'due'): echo 'selected'; endif; ?>>Due / Expiring (90 days)</option>
                                <option value="all" <?php if(request('scope', $scope) === 'all'): echo 'selected'; endif; ?>>All Approved</option>
                            </select>
                        </div>
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
                        <div class="flex gap-2 items-end">
                            <button type="submit"
                                    class="bg-gray-800 hover:bg-gray-900 dark:bg-brand-600 dark:hover:bg-brand-700 text-white font-bold py-2 px-4 rounded text-sm">Apply Filters</button>
                            <a href="<?php echo e(route('admin.ngos.renewals.index')); ?>"
                               class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Reset</a>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NGO Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">District</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registration No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registration Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expiry Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Days Left</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Renewals</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $__empty_1 = true; $__currentLoopData = $ngos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ngo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php
                                        $daysLeft = $ngo->expiry_date ? $ngo->expiry_date->diffInDays(now(), false) : null;
                                        $isExpired = $daysLeft !== null && $daysLeft < 0;
                                        $urgent = $daysLeft !== null && $daysLeft >= 0 && $daysLeft <= 90;
                                    ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                            <?php echo e($ngo->profile?->organization_name ?: 'N/A'); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($ngo->profile?->district ?: '—'); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-mono"><?php echo e($ngo->registration_no ?: '—'); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e(optional($ngo->certificate_issue_date)->format('Y-m-d') ?: '—'); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php if($isExpired): ?>
                                                <span class="text-red-600 font-semibold"><?php echo e(optional($ngo->expiry_date)->format('Y-m-d')); ?></span>
                                            <?php elseif($urgent): ?>
                                                <span class="text-amber-600 font-semibold"><?php echo e(optional($ngo->expiry_date)->format('Y-m-d')); ?></span>
                                            <?php else: ?>
                                                <?php echo e(optional($ngo->expiry_date)->format('Y-m-d') ?: '—'); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e($daysLeft === null ? '—' : ($isExpired ? abs($daysLeft) . ' days overdue' : $daysLeft . ' days')); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo e($ngo->last_renewal_date ? 'Renewed ' . $ngo->last_renewal_date->format('Y-m-d') : 'Never'); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"
                                            x-data="renewModal({
                                                years: 3,
                                                ngoId: <?php echo e($ngo->id); ?>,
                                                ngoName: <?php echo \Illuminate\Support\Js::from($ngo->profile?->organization_name ?: 'N/A')->toHtml() ?>,
                                                regNo: <?php echo \Illuminate\Support\Js::from($ngo->registration_no ?: '—')->toHtml() ?>,
                                                currentExpiry: <?php echo \Illuminate\Support\Js::from(optional($ngo->expiry_date)->format('d M Y') ?: '—')->toHtml() ?>,
                                                expiryDate: <?php echo \Illuminate\Support\Js::from($ngo->expiry_date ? $ngo->expiry_date->format('Y-m-d') : null)->toHtml() ?>,
                                                daysLeft: <?php echo e($daysLeft === null ? 'null' : $daysLeft); ?>,
                                                isExpired: <?php echo e($isExpired ? 'true' : 'false'); ?>,
                                                scope: <?php echo \Illuminate\Support\Js::from(request('scope', $scope))->toHtml() ?>,
                                                district: <?php echo \Illuminate\Support\Js::from(request('district'))->toHtml() ?>,
                                                thematicArea: <?php echo \Illuminate\Support\Js::from(request('thematic_area'))->toHtml() ?>
                                            })">
                                            <button type="button" @click="open()"
                                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-1.5 px-3 rounded text-xs">
                                                Renew
                                            </button>

                                            <form method="POST" id="renew-form-<?php echo e($ngo->id); ?>"
                                                  action="<?php echo e(route('admin.ngos.renewals.renew', $ngo)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="renew_years" :value="years">
                                                <input type="hidden" name="scope" value="<?php echo e(request('scope', $scope)); ?>">
                                                <input type="hidden" name="district" value="<?php echo e(request('district')); ?>">
                                                <input type="hidden" name="thematic_area" value="<?php echo e(request('thematic_area')); ?>">
                                            </form>

                                            <div x-show="modalOpen" x-cloak style="display:none"
                                                 class="fixed inset-0 z-50 overflow-y-auto" @keydown.escape.window="modalOpen = false">
                                                <div class="flex items-center justify-center min-h-screen px-4">
                                                    <div class="fixed inset-0 bg-black/50" @click="modalOpen = false"></div>
                                                    <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md p-6 my-8">
                                                        <div class="flex justify-between items-center mb-4">
                                                            <h3 class="text-lg font-bold text-gray-900">Renew NGO Registration</h3>
                                                            <button type="button" @click="modalOpen = false" class="text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
                                                        </div>

                                                        <div class="space-y-4">
                                                            <div class="rounded-lg bg-slate-50 border border-slate-100 p-4 space-y-2">
                                                                <p x-text="'Organization: ' + ngoName" class="text-sm text-gray-800"></p>
                                                                <p x-text="'Registration No: ' + regNo" class="text-sm text-gray-600"></p>
                                                                <p class="text-sm text-gray-600">
                                                                    <span x-text="'Current Expiry: ' + currentExpiry"></span>
                                                                    <span x-show="expiryDate" x-text="' (' + (isExpired ? Math.abs(daysLeft) + ' days overdue' : daysLeft + ' days left') + ')'" class="text-xs"></span>
                                                                </p>
                                                            </div>

                                                            <div>
                                                                <label for="renew-years-input" class="block text-sm font-medium text-gray-700">Renewal Duration (Years)</label>
                                                                <input type="number" id="renew-years-input" x-model.number="years" min="1" max="10"
                                                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                <p class="mt-1 text-xs text-gray-500">Enter a duration between 1 and 10 years.</p>
                                                            </div>

                                                            <div class="rounded-lg bg-blue-50 border border-blue-100 p-4 text-center">
                                                                <p class="text-xs font-semibold uppercase tracking-wider text-blue-600 mb-1">New Expiry Date</p>
                                                                <p class="text-xl font-bold text-blue-900" x-text="newExpiry"></p>
                                                            </div>
                                                        </div>

                                                        <div class="mt-6 flex justify-end gap-2">
                                                            <button type="button" @click="modalOpen = false"
                                                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">
                                                                Cancel
                                                            </button>
                                                            <button type="submit" form="renew-form-<?php echo e($ngo->id); ?>"
                                                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-sm">
                                                                Confirm Renewal
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                            No renewals found.
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

<?php $__env->startPush('scripts'); ?>
<script>
function renewModal(config) {
    return {
        modalOpen: false,
        years: config.years || 3,
        ngoId: config.ngoId,
        ngoName: config.ngoName,
        regNo: config.regNo,
        currentExpiry: config.currentExpiry,
        daysLeft: config.daysLeft,
        isExpired: config.isExpired,
        expiryDate: config.expiryDate,
        open() {
            this.modalOpen = true;
        },
        get newExpiry() {
            const years = Math.max(1, Math.min(10, parseInt(this.years, 10) || 1));
            let base;
            if (this.expiryDate) {
                base = new Date(this.expiryDate + 'T00:00:00');
                base.setDate(base.getDate() + 1);
            } else {
                base = new Date();
            }
            base.setFullYear(base.getFullYear() + years);

            const pad = (n) => String(n).padStart(2, '0');
            return `${base.getFullYear()}-${pad(base.getMonth() + 1)}-${pad(base.getDate())}`;
        },
    };
}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/ngos/renewals.blade.php ENDPATH**/ ?>