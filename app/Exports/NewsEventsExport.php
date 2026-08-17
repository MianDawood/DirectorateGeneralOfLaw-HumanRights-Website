<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class NewsEventsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
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
            'Type',
            'Subject / Category',
            'Title',
            'Date',
            'Venue',
            'Excerpt',
            'Detail / Description',
            'Images',
            'Videos',
            'Featured',
            'Status',
            'Display Order',
            'Created',
            'Updated',
            'Image Path',
        ];
    }

    public function map($item): array
    {
        $isNews = ($item->type ?? null) === 'news';

        return [
            $isNews ? 'News' : 'Event',
            $isNews ? '' : ($item->subject ?? ''),
            $item->title ?? '',
            $item->display_date
                ? $item->display_date->format('Y-m-d H:i')
                : '',
            $isNews ? '' : ($item->location ?? ''),
            $isNews ? ($item->excerpt ?? '') : '',
            $isNews ? ($item->content ?? '') : ($item->description ?? ''),
            $item->images_count ?? $item->images?->count() ?? 0,
            $isNews ? 0 : $item->videos_count ?? 0,
            $item->is_featured ? 'Yes' : 'No',
            $item->is_active ? 'Active' : 'Inactive',
            $item->order ?? 0,
            $item->created_at ? $item->created_at->format('Y-m-d H:i') : '',
            $item->updated_at ? $item->updated_at->format('Y-m-d H:i') : '',
            $item->image_path ?? '',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}