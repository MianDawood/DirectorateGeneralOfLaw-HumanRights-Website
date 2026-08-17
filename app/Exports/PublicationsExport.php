<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PublicationsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
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
            'ID',
            'Title',
            'Category',
            'Published Date',
            'Description',
            'File Type',
            'File Size',
            'File Path',
            'Cover Image Path',
            'Status',
            'Display Order',
            'Created',
            'Updated',
        ];
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->title ?? '',
            $item->category ?? '',
            $item->published_date ? $item->published_date->format('Y-m-d') : '',
            $item->description ?? '',
            $item->file_type ?? '',
            $item->file_size ?? '',
            $item->file_path ?? '',
            $item->image_path ?? '',
            $item->is_active ? 'Active' : 'Inactive',
            $item->order ?? 0,
            $item->created_at ? $item->created_at->format('Y-m-d H:i') : '',
            $item->updated_at ? $item->updated_at->format('Y-m-d H:i') : '',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}