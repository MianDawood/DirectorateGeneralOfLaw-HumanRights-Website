<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo e(ucfirst($type)); ?> NGOs Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #1f2937; }
        h1 { font-size: 18px; margin: 0 0 2px; }
        .meta { font-size: 10px; color: #6b7280; margin-bottom: 18px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #123B2D; color: #fff; text-align: left; padding: 6px 8px; font-size: 10px; }
        td { border: 1px solid #e5e7eb; padding: 6px 8px; vertical-align: top; }
        tr:nth-child(even) td { background: #f9fafb; }
    </style>
</head>
<body>
    <h1><?php echo e(ucfirst($type)); ?> NGOs Report</h1>
    <div class="meta">
        Generated: <?php echo e($generatedAt->format('Y-m-d H:i')); ?>

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
        &nbsp;|&nbsp; Total: <?php echo e($ngos->count()); ?>

    </div>

    <?php if($ngos->isEmpty()): ?>
        <p>No <?php echo e($type); ?> NGOs found for the selected filters.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NGO Name</th>
                    <th>District</th>
                    <th>Registration No</th>
                    <?php if($type === 'suspended'): ?>
                        <th>Registration Date</th>
                        <th>Suspension Date</th>
                        <th>Thematic Areas</th>
                        <th>Reason of Suspension</th>
                    <?php else: ?>
                        <th>Registration Date</th>
                        <th>Renewal Date</th>
                        <th><?php echo e($type === 'expired' ? 'Expired On' : 'Expiry Date'); ?></th>
                        <th>Thematic Areas</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $ngos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ngo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($ngo->profile?->organization_name ?? ''); ?></td>
                        <td><?php echo e($ngo->profile?->district ?? ''); ?></td>
                        <td><?php echo e($ngo->registration_no ?? ''); ?></td>
                        <?php if($type === 'suspended'): ?>
                            <td><?php echo e($ngo->certificate_issue_date?->format('Y-m-d') ?? ''); ?></td>
                            <td><?php echo e($ngo->suspended_at?->format('Y-m-d') ?? ''); ?></td>
                            <td><?php echo e($ngo->profile?->thematic_areas ?? ''); ?></td>
                            <td><?php echo e($ngo->suspension_reason ?? ''); ?></td>
                        <?php else: ?>
                            <td><?php echo e($ngo->certificate_issue_date?->format('Y-m-d') ?? ''); ?></td>
                            <td><?php echo e($ngo->last_renewal_date?->format('Y-m-d') ?? ''); ?></td>
                            <td><?php echo e($ngo->expiry_date?->format('Y-m-d') ?? ''); ?></td>
                            <td><?php echo e($ngo->profile?->thematic_areas ?? ''); ?></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pdf/ngos_report.blade.php ENDPATH**/ ?>