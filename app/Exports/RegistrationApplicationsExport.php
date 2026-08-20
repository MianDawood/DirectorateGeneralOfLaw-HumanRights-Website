<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RegistrationApplicationsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function __construct(public Collection $items)
    {
    }

    public function collection(): Collection
    {
        return $this->items;
    }

    public function headings(): array
    {
        return [
            'Application No',
            'Registration No',
            'Status',
            'NGO Name',
            'District',
            'Thematic Areas',
            'Head Name',
            'Establishment Date',
            'Submitted At',
            'Certificate Issue Date',
            'Expiry Date',
            'Last Renewal Date',
            'Suspension Date',
            'Suspension Reason',
            'Review Notes',
            'Created At',
        ];
    }

    public function map($application): array
    {
        $profile = $application->profile;

        return [
            $application->application_no ?? '',
            $application->registration_no ?? '',
            ucwords(str_replace('_', ' ', (string) $application->status)),
            $profile?->organization_name ?? '',
            $profile?->district ?? '',
            $profile?->thematic_areas ?? '',
            $profile?->head_name ?? '',
            $profile?->establishment_date ? \Carbon\Carbon::parse($profile->establishment_date)->format('Y-m-d') : '',
            $application->submitted_at?->format('Y-m-d H:i') ?? '',
            $application->certificate_issue_date?->format('Y-m-d') ?? '',
            $application->expiry_date?->format('Y-m-d') ?? '',
            $application->last_renewal_date?->format('Y-m-d') ?? '',
            $application->suspended_at?->format('Y-m-d') ?? '',
            $application->suspension_reason ?? '',
            $application->review_notes ?? '',
            $application->created_at?->format('Y-m-d H:i') ?? '',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}