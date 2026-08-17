<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Registration Applications Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 10px; color: #1f2937; }
        h1 { font-size: 18px; margin: 0 0 2px; }
        .meta { font-size: 10px; color: #6b7280; margin-bottom: 18px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #123B2D; color: #fff; text-align: left; padding: 5px 7px; font-size: 9px; }
        td { border: 1px solid #e5e7eb; padding: 5px 7px; vertical-align: top; }
        tr:nth-child(even) td { background: #f9fafb; }
    </style>
</head>
<body>
    <h1>Registration Applications Report</h1>
    <div class="meta">
        Generated: <?php echo e($generatedAt->format('Y-m-d H:i')); ?>

        <?php if(filled($filters['search'] ?? null)): ?>
            &nbsp;|&nbsp; Search: <?php echo e($filters['search']); ?>

        <?php endif; ?>
        <?php if(filled($filters['district'] ?? null)): ?>
            &nbsp;|&nbsp; District: <?php echo e($filters['district']); ?>

        <?php endif; ?>
        <?php if(filled($filters['thematic_area'] ?? null)): ?>
            &nbsp;|&nbsp; Thematic Area: <?php echo e($filters['thematic_area']); ?>

        <?php endif; ?>
        <?php if(filled($filters['date_from'] ?? null)): ?>
            &nbsp;|&nbsp; From: <?php echo e($filters['date_from']); ?>

        <?php endif; ?>
        <?php if(filled($filters['date_to'] ?? null)): ?>
            &nbsp;|&nbsp; To: <?php echo e($filters['date_to']); ?>

        <?php endif; ?>
        &nbsp;|&nbsp; Total: <?php echo e($applications->count()); ?>

    </div>

    <?php if($applications->isEmpty()): ?>
        <p>No registration applications found for the selected filters.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Application No</th>
                    <th>Registration No</th>
                    <th>Status</th>
                    <th>NGO Name</th>
                    <th>District</th>
                    <th>Thematic Areas</th>
                    <th>Head Name</th>
                    <th>Focal Person</th>
                    <th>Establishment Date</th>
                    <th>Submitted At</th>
                    <th>Issue Date</th>
                    <th>Expiry Date</th>
                    <th>Last Renewal</th>
                    <th>Suspension Date</th>
                    <th>Suspension Reason</th>
                    <th>Review Notes</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($application->application_no ?? ''); ?></td>
                        <td><?php echo e($application->registration_no ?? ''); ?></td>
                        <td><?php echo e(ucwords(str_replace('_', ' ', (string) $application->status))); ?></td>
                        <td><?php echo e($application->profile?->organization_name ?? ''); ?></td>
                        <td><?php echo e($application->profile?->district ?? ''); ?></td>
                        <td><?php echo e($application->profile?->thematic_areas ?? ''); ?></td>
                        <td><?php echo e($application->profile?->head_name ?? ''); ?></td>
                        <td><?php echo e($application->profile?->focal_name ?? ''); ?></td>
                        <td><?php echo e($application->profile?->establishment_date ? \Carbon\Carbon::parse($application->profile->establishment_date)->format('Y-m-d') : ''); ?></td>
                        <td><?php echo e($application->submitted_at?->format('Y-m-d H:i') ?? ''); ?></td>
                        <td><?php echo e($application->certificate_issue_date?->format('Y-m-d') ?? ''); ?></td>
                        <td><?php echo e($application->expiry_date?->format('Y-m-d') ?? ''); ?></td>
                        <td><?php echo e($application->last_renewal_date?->format('Y-m-d') ?? ''); ?></td>
                        <td><?php echo e($application->suspended_at?->format('Y-m-d') ?? ''); ?></td>
                        <td><?php echo e($application->suspension_reason ?? ''); ?></td>
                        <td><?php echo e($application->review_notes ?? ''); ?></td>
                        <td><?php echo e($application->created_at?->format('Y-m-d H:i') ?? ''); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pdf/registration_applications_report.blade.php ENDPATH**/ ?>