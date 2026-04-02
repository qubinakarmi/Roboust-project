<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CategoriesExport implements FromCollection,WithHeadings,WithMapping
{
    private $rowNumber=0;
    /**
    */
    public function collection()
    {
        return Category::all();
    }

    public function map($category):array
    {
        $this->rowNumber++;
        return [
             $this->rowNumber,
            $category->name,
            $category->slug,
                        $category->created_at,

        ];
    }

    public function headings():array{
          return [
        'S.N',
        'Category Name',
        'Slug',
        'Created_at'
    ];
    }
  
}
