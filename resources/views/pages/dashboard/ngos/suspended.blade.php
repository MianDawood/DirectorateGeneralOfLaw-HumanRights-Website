@php
    $ngos = $ngos ?? collect();
    $columns = ['S.No', 'NGO Name', 'District', 'Registration No', 'Registration Date', 'Suspension Date', 'Thematic Areas', 'Reason of Suspension', 'Actions'];
    $rows = [];
    $returnTo = url()->full();
    foreach ($ngos as $i => $ngo) {
        $rows[] = [
            '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . ($ngos->firstItem() + $i) . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">' . e($ngo->profile?->organization_name ?: 'N/A') . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . e($ngo->profile?->district ?: '—') . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-mono">' . e($ngo->registration_no ?: '—') . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . ($ngo->certificate_issue_date ? $ngo->certificate_issue_date->format('Y-m-d') : '—') . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . ($ngo->suspended_at ? $ngo->suspended_at->format('Y-m-d') : '—') . '</td>',
            '<td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">' . e($ngo->profile?->thematic_areas ?: '—') . '</td>',
            '<td class="px-6 py-4 text-sm text-gray-500 max-w-sm">' . e($ngo->suspension_reason ?: '—') . '</td>',
            '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="' . route('admin.registration-applications.show', $ngo) . '?return_to=' . urlencode($returnTo) . '" class="text-blue-600 hover:text-blue-900">View</a>
                <a href="' . route('admin.registration-applications.edit', $ngo) . '?return_to=' . urlencode($returnTo) . '" class="text-indigo-600 hover:text-indigo-900 ml-3">Review</a>
            </td>',
        ];
    }
@endphp

@include('pages.dashboard.ngos._partial', [
    'pageTitle' => 'Suspended NGOs',
    'pageDescription' => 'NGOs whose registration has been suspended.',
    'exportRoute' => 'admin.ngos.suspended.export',
])