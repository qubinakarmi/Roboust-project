<?php

namespace App\Exports;

use App\Models\Content;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SubPagesExport implements FromCollection,WithHeadings,WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $rowCounter = 0;
    public function collection()
    {
        return Content::all();
    }



    public function map($content): array
    {
        $this->rowCounter++;
        return [
            $this->rowCounter,
            $content->page->title,
            $content->title,
            $content->description,
            $content->status == 1 ? 'Published' : 'Hidden',
            $content->created_at,


        ];
    }

    public function headings(): array
    {
        return [
            'S.N',
            'Page_title',
            'Title',
            ' Description',
            'Status',
            'Created_at'
        ];
    }
}
