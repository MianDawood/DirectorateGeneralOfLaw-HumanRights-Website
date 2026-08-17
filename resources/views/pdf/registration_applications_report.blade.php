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
        Generated: {{ $generatedAt->format('Y-m-d H:i') }}
        @if(filled($filters['search'] ?? null))
            &nbsp;|&nbsp; Search: {{ $filters['search'] }}
        @endif
        @if(filled($filters['district'] ?? null))
            &nbsp;|&nbsp; District: {{ $filters['district'] }}
        @endif
        @if(filled($filters['thematic_area'] ?? null))
            &nbsp;|&nbsp; Thematic Area: {{ $filters['thematic_area'] }}
        @endif
        @if(filled($filters['date_from'] ?? null))
            &nbsp;|&nbsp; From: {{ $filters['date_from'] }}
        @endif
        @if(filled($filters['date_to'] ?? null))
            &nbsp;|&nbsp; To: {{ $filters['date_to'] }}
        @endif
        &nbsp;|&nbsp; Total: {{ $applications->count() }}
    </div>

    @if($applications->isEmpty())
        <p>No registration applications found for the selected filters.</p>
    @else
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
                @foreach($applications as $index => $application)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $application->application_no ?? '' }}</td>
                        <td>{{ $application->registration_no ?? '' }}</td>
                        <td>{{ ucwords(str_replace('_', ' ', (string) $application->status)) }}</td>
                        <td>{{ $application->profile?->organization_name ?? '' }}</td>
                        <td>{{ $application->profile?->district ?? '' }}</td>
                        <td>{{ $application->profile?->thematic_areas ?? '' }}</td>
                        <td>{{ $application->profile?->head_name ?? '' }}</td>
                        <td>{{ $application->profile?->focal_name ?? '' }}</td>
                        <td>{{ $application->profile?->establishment_date ? \Carbon\Carbon::parse($application->profile->establishment_date)->format('Y-m-d') : '' }}</td>
                        <td>{{ $application->submitted_at?->format('Y-m-d H:i') ?? '' }}</td>
                        <td>{{ $application->certificate_issue_date?->format('Y-m-d') ?? '' }}</td>
                        <td>{{ $application->expiry_date?->format('Y-m-d') ?? '' }}</td>
                        <td>{{ $application->last_renewal_date?->format('Y-m-d') ?? '' }}</td>
                        <td>{{ $application->suspended_at?->format('Y-m-d') ?? '' }}</td>
                        <td>{{ $application->suspension_reason ?? '' }}</td>
                        <td>{{ $application->review_notes ?? '' }}</td>
                        <td>{{ $application->created_at?->format('Y-m-d H:i') ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>