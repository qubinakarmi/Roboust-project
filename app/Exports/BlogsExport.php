<?php

namespace App\Exports;

use App\Models\Blog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BlogsExport implements FromCollection, WithHeadings, WithMapping
{

    private $rowNumber = 0;

    public function collection()
    {
        // Get all blogs
        return Blog::with('author')->get();
    }

    // Map data to customize each row
    public function map($blog): array
    {

        $this->rowNumber++;
        return [
            $this->rowNumber, // S.N. Column
            $blog->title,
            $blog->author->name,
            $blog->sub_title,
            $blog->short_content,
            $blog->status == 1 ? 'Active' : 'Inactive', // convert 0/1 to readable
            $blog->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'S.N',
            'Title',
            'Author Name',
            'Sub Title',
            'Short Content',
            'Status',
            'Created At'
        ];
    }
}
