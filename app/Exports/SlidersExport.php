<?php

namespace App\Exports;

use App\Models\Slider;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SlidersExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $rowCounter =0;
    public function collection()
    {
        return Slider::all();
    }

    public function map($slider):array
    {
        $this->rowCounter++;
        return [
            $this->rowCounter,
            $slider->title,
            $slider->sub_title,
            $slider->url_link,
            $slider->video_link,
            $slider->ordering,
            $slider->status==1?'Published':'Hidden',

        ];
    }

    public function Headings():array
    {
        return[
            'S.N',
            'Title',
            'Sub Title',
            'Url Link',
            'Video Link',
            'Ordering',
            'Status',
        ];
    }
}
