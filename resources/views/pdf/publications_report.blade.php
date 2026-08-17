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
        Generated: {{ $generatedAt->format('Y-m-d H:i') }}
        @if(filled($filters['category_id']))
            &nbsp;|&nbsp; Category: {{ $publications->first()?->category }}
        @endif
        @if(filled($filters['date_from']))
            &nbsp;|&nbsp; From: {{ $filters['date_from'] }}
        @endif
        @if(filled($filters['date_to']))
            &nbsp;|&nbsp; To: {{ $filters['date_to'] }}
        @endif
        &nbsp;|&nbsp; Total: {{ $publications->count() }}
    </div>

    @if($publications->isEmpty())
        <p>No publications found for the selected filters.</p>
    @else
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
                @foreach($publications as $index => $publication)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $publication->title }}</td>
                        <td>{{ $publication->category }}</td>
                        <td>{{ $publication->published_date ? $publication->published_date->format('Y-m-d') : '' }}</td>
                        <td>{{ $publication->description }}</td>
                        <td>{{ $publication->file_type }}</td>
                        <td>{{ $publication->file_size }}</td>
                        <td>{{ $publication->file_path }}</td>
                        <td>{{ $publication->image_path }}</td>
                        <td>{{ $publication->is_active ? 'Active' : 'Inactive' }}</td>
                        <td>{{ $publication->order }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>