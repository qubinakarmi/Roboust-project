<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ContactsExport implements FromCollection, WithHeadings ,WithMapping
{
     private $rowNumber=0;
    public function collection()
    {
        return Contact::all();
    }

    public function map($contact): array
    {
         $this->rowNumber++;
        return [
             $this->rowNumber,
            $contact->name,
            $contact->email,
            $contact->phone,
            $contact->description,
            $contact->status == 1 ? 'Active' : 'Inactive', // convert 0/1 to readable
            $contact->created_at->format('d-m-Y'),

        ];
    }

    public function headings(): array

    {

        return [
            'S.N',
            'Name',
            'Email',
            'Phone',
            'Description',
            'Status',
            'Created_at'

        ];
    }
}

