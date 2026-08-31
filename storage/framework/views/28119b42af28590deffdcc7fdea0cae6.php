<?php
    $ngos = $ngos ?? collect();
    $columns = ['S.No', 'NGO Name', 'District', 'Registration No', 'Registration Date', 'Renewal Date', 'Expired On', 'Thematic Areas', 'Actions'];
    $rows = [];
    $returnTo = url()->full();
    foreach ($ngos as $i => $ngo) {
        $rows[] = [
            '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . ($ngos->firstItem() + $i) . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">' . e($ngo->profile?->organization_name ?: 'N/A') . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . e($ngo->profile?->district ?: '—') . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-mono">' . e($ngo->registration_no ?: '—') . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . ($ngo->certificate_issue_date ? $ngo->certificate_issue_date->format('Y-m-d') : '—') . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . ($ngo->last_renewal_date ? $ngo->last_renewal_date->format('Y-m-d') : '—') . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . ($ngo->expiry_date ? $ngo->expiry_date->format('Y-m-d') : '—') . '</td>',
            '<td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">' . e($ngo->profile?->thematic_areas ?: '—') . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="' . route('admin.registration-applications.show', $ngo) . '?return_to=' . urlencode($returnTo) . '" class="text-blue-600 hover:text-blue-900">View</a>
                <a href="' . route('admin.registration-applications.edit', $ngo) . '?return_to=' . urlencode($returnTo) . '" class="text-indigo-600 hover:text-indigo-900 ml-3">Review</a>
            </td>',
        ];
    }
?>

<?php echo $__env->make('pages.dashboard.ngos._partial', [
    'pageTitle' => 'Expired NGOs',
    'pageDescription' => 'Registered NGOs whose certificate has expired and require renewal.',
    'exportRoute' => 'admin.ngos.expired.export',
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/ngos/expired.blade.php ENDPATH**/ ?>