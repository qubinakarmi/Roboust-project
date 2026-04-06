<?php

namespace App\Exports;

use App\Models\Team;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TeamsExport implements FromCollection, WithHeadings, WithMapping
{

    private $rowNumber = 0;

    public function collection()
    {
        return Team::all();
    }

    public function map($team):array
    {
        $this->rowNumber++;
       return [
            $this->rowNumber,
            $team->designation,
            $team->email,
            $team->phone,
            $team->address,
            $team->short_bio,
            $team->linkedin,
            $team->facebook,
            $team->twitter,
            $team->ordering,
            $team->status==1 ? 'Active':'Inactive',
            $team->created_at->format('d-m-Y')


        ];
    }

    public function headings():array
    {
        return [
            'S.N',
            'Designation',
            'Email',
            'Phone',
            'Adress',
            'Short bio',
            'Linkedin',
            'Facebook',
            'Twitter',
            'Ordering',
            'Status',
            'Created_at',

            

        ];
    }
}
