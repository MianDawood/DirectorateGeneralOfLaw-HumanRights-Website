<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ ucfirst($type) }} NGOs Report</title>
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
    <h1>{{ ucfirst($type) }} NGOs Report</h1>
    <div class="meta">
        Generated: {{ $generatedAt->format('Y-m-d H:i') }}
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
        &nbsp;|&nbsp; Total: {{ $ngos->count() }}
    </div>

    @if($ngos->isEmpty())
        <p>No {{ $type }} NGOs found for the selected filters.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NGO Name</th>
                    <th>District</th>
                    <th>Registration No</th>
                    @if($type === 'suspended')
                        <th>Registration Date</th>
                        <th>Suspension Date</th>
                        <th>Thematic Areas</th>
                        <th>Reason of Suspension</th>
                    @else
                        <th>Registration Date</th>
                        <th>Renewal Date</th>
                        <th>{{ $type === 'expired' ? 'Expired On' : 'Expiry Date' }}</th>
                        <th>Thematic Areas</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($ngos as $index => $ngo)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $ngo->profile?->organization_name ?? '' }}</td>
                        <td>{{ $ngo->profile?->district ?? '' }}</td>
                        <td>{{ $ngo->registration_no ?? '' }}</td>
                        @if($type === 'suspended')
                            <td>{{ $ngo->certificate_issue_date?->format('Y-m-d') ?? '' }}</td>
                            <td>{{ $ngo->suspended_at?->format('Y-m-d') ?? '' }}</td>
                            <td>{{ $ngo->profile?->thematic_areas ?? '' }}</td>
                            <td>{{ $ngo->suspension_reason ?? '' }}</td>
                        @else
                            <td>{{ $ngo->certificate_issue_date?->format('Y-m-d') ?? '' }}</td>
                            <td>{{ $ngo->last_renewal_date?->format('Y-m-d') ?? '' }}</td>
                            <td>{{ $ngo->expiry_date?->format('Y-m-d') ?? '' }}</td>
                            <td>{{ $ngo->profile?->thematic_areas ?? '' }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>