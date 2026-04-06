<?php

namespace App\Exports;

use App\Models\Author;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AuthorsExport implements FromCollection, WithHeadings, WithMapping
{
    private $rowNumber = 0;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Author::all();
    }

    public function map($author): array
    {
        $this->rowNumber++;

        return [
            $this->rowNumber,
            $author->name,
            $author->email,
            $author->bio,
            $author->created_at->format('d-m-Y'),


        ];
    }

    public function headings(): array
    {
        return [
            'S.N',
            'Name',
            'Email',
            'Bio',
            'Created_at'
        ];
    }
}
