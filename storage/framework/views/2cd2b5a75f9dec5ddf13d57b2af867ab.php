<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Publications Report</title>
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
    <h1>Publications Report</h1>
    <div class="meta">
        Generated: <?php echo e($generatedAt->format('Y-m-d H:i')); ?>

        <?php if(filled($filters['category_id'])): ?>
            &nbsp;|&nbsp; Category: <?php echo e($publications->first()?->category); ?>

        <?php endif; ?>
        <?php if(filled($filters['date_from'])): ?>
            &nbsp;|&nbsp; From: <?php echo e($filters['date_from']); ?>

        <?php endif; ?>
        <?php if(filled($filters['date_to'])): ?>
            &nbsp;|&nbsp; To: <?php echo e($filters['date_to']); ?>

        <?php endif; ?>
        &nbsp;|&nbsp; Total: <?php echo e($publications->count()); ?>

    </div>

    <?php if($publications->isEmpty()): ?>
        <p>No publications found for the selected filters.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Published Date</th>
                    <th>Description</th>
                    <th>File Type</th>
                    <th>File Size</th>
                    <th>File Path</th>
                    <th>Cover Image Path</th>
                    <th>Status</th>
                    <th>Order</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $publications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $publication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($publication->title); ?></td>
                        <td><?php echo e($publication->category); ?></td>
                        <td><?php echo e($publication->published_date ? $publication->published_date->format('Y-m-d') : ''); ?></td>
                        <td><?php echo e($publication->description); ?></td>
                        <td><?php echo e($publication->file_type); ?></td>
                        <td><?php echo e($publication->file_size); ?></td>
                        <td><?php echo e($publication->file_path); ?></td>
                        <td><?php echo e($publication->image_path); ?></td>
                        <td><?php echo e($publication->is_active ? 'Active' : 'Inactive'); ?></td>
                        <td><?php echo e($publication->order); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pdf/publications_report.blade.php ENDPATH**/ ?>