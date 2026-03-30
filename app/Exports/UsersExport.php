<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection,WithHeadings,WithMapping
{
 private $rowCounter =0;
    public function collection()
    {
        return User::all();
    }


    public function map($user):array{
        $this->rowCounter++;
        return [
             $this->rowCounter++,
            $user->name,
            $user->email,
            $user->phone,
            $user->address,
            $user->status ==1 ? 'Active':'Inactive',
            $user->created_at

        ];
    }

    public function headings():array{

    return[
        'S.N',
        'Name',
        'Email',
        'Phone',
        'Address',
        'Status',
        'Created_at'
    ];
    }
}
