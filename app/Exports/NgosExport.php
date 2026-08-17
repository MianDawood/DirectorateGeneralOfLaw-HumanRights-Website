<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class NgosExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function __construct(public Collection $items, public string $type = 'registered')
    {
    }

    public function collection(): Collection
    {
        return $this->items;
    }

    public function headings(): array
    {
        return match ($this->type) {
            'suspended' => [
                'NGO Name',
                'District',
                'Registration No',
                'Registration Date',
                'Suspension Date',
                'Thematic Areas',
                'Reason of Suspension',
            ],
            'expired' => [
                'NGO Name',
                'District',
                'Registration No',
                'Registration Date',
                'Renewal Date',
                'Expired On',
                'Thematic Areas',
            ],
            default => [
                'NGO Name',
                'District',
                'Registration No',
                'Registration Date',
                'Renewal Date',
                'Expiry Date',
                'Thematic Areas',
            ],
        };
    }

    public function map($ngo): array
    {
        $registrationDate = $ngo->certificate_issue_date?->format('Y-m-d') ?? '';
        $renewalDate = $ngo->last_renewal_date?->format('Y-m-d') ?? '';
        $thematic = $ngo->profile?->thematic_areas ?? '';
        $name = $ngo->profile?->organization_name ?? '';
        $district = $ngo->profile?->district ?? '';
        $regNo = $ngo->registration_no ?? '';

        return match ($this->type) {
            'suspended' => [
                $name,
                $district,
                $regNo,
                $registrationDate,
                $ngo->suspended_at?->format('Y-m-d') ?? '',
                $thematic,
                $ngo->suspension_reason ?? '',
            ],
            'expired' => [
                $name,
                $district,
                $regNo,
                $registrationDate,
                $renewalDate,
                $ngo->expiry_date?->format('Y-m-d') ?? '',
                $thematic,
            ],
            default => [
                $name,
                $district,
                $regNo,
                $registrationDate,
                $renewalDate,
                $ngo->expiry_date?->format('Y-m-d') ?? '',
                $thematic,
            ],
        };
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}