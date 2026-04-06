<?php

namespace App\Exports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ServicesExport implements FromCollection,WithHeadings,WithMapping
{

    private $rowNumber = 0;

    /**
     */
    public function collection()
    {
        return Service::with('category')->get();
    }


    public function map($service): array
    {

        $this->rowNumber++;
        return [
            $this->rowNumber, // S.N. Column
            $service->title,
            $service->category->name,
            $service->slug,
            $service->sub_title,
            $service->short_desc,
            $service->description,
            $service->status == 1 ? 'Active' : 'Inactive', // convert 0/1 to readable
            $service->created_at->format('d-m-Y'),
        ];
    }

    public function headings(): array
    {
        return [
            'S.N',
            'Title',
            'Category Name',
            'Slug',
            'Sub Title',
            'Short Content',
            'Description',
            'Status',
            'Created At'
        ];
    }
}
