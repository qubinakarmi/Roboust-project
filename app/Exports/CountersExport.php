<?php

namespace App\Exports;

use App\Models\Counter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CountersExport implements FromCollection,WithMapping,WithHeadings
{
    private $rowCounter;
    public function collection()
    {
        return Counter::all();
    }


    public function map($counter): array
    {
        $this->rowCounter++;

        return [
            $this->rowCounter,
            $counter->title,
            $counter->description,
            $counter->prefix,
            $counter->suffix,
            $counter->status == 1 ? 'Active' : 'InActive',
                        $counter->created_at->format('d-m-Y'),


        ];
    }
    public function headings(): array
    {
        return[
            'S.N',
            'Title',
            'Description',
            'Prefix',
            'Suffix',
            'Status',
            'Created_at'

        ];
    }
}
