<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    $contacts=[['name'=>'Qubi Nakarmi',
        'email'=>'qubinakarmi@gmail.com',
        'phone'=>'12345678',
        'subject'=>'Gain the more info ',
        'description'=>'Want to more about the company',

        ],
        ['name'=>'Suprem Shrestha',
        'email'=>'supremshrestha12@gmail.com',
        'phone'=>'12345678',
        'subject'=>'Gain the more info ',
        'description'=>'Want to more about the company',],
        
        ['name'=>'Suprem Shrestha',
        'email'=>'supremshrestha12@gmail.com',
        'phone'=>'12345678',
        'subject'=>'Gain the more info ',
        'description'=>'Want to more about the company',],
        
        
        ];

        foreach($contacts as $contact)
            {
        Contact::create($contact);

            }
    }
}
