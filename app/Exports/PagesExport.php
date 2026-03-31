<?php

namespace App\Exports;

use App\Models\Page;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PagesExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $rowCounter =0;
    public function collection()
    {
        return Page::all();
    }

    public function map($page):array
    {
        $this->rowCounter++;
        return [
             $this->rowCounter,
            $page->title,
            $page->slug,
            $page->sub_title,
            $page->short_content,
            $page->detail_content,
            $page->status==1?'Published':'Hidden',

        ];
    }

    public function Headings():array
    {
        return [
            'S.N',
            'Title',
            'slug',
           ' Sub Title' ,
           ' Short Content',
           ' Detail Content',
            'Status',
        ];
    }
}
