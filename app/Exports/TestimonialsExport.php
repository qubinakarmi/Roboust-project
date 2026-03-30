<?php

namespace App\Exports;

use App\Models\Testimonial;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TestimonialsExport implements FromCollection,WithMapping,WithHeadings
{
    private $rowNumber = 0;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Testimonial::all();
    }


    public function map($testimonial): array
    {
        $this->rowNumber++;
        return [
            $this->rowNumber,
            $testimonial->company_name,
            $testimonial->designation,
            $testimonial->client_name,
            $testimonial->message,
            $testimonial->status == 1 ? 'Published' : 'Hidden',
            $testimonial->created_at



        ];
    }

    public function Headings(): array
    {
        return [
            'S.N',
            'Company Name',
            'Designation',
            'Client Name',
            'Message',
            'Status',
            'created_at'
        ];
    }
}
