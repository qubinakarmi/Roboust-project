<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
$contacts = [
    [
        'name' => 'Lal Shrestha',
        'email' => 'lalshrestha1@gmail.com',
        'phone' => '980000001',
        'address' => 'Company details',
        'status' => 1,
        'password' => Hash::make('123456788'),
    ],
    [
        'name' => 'Suprem Shrestha',
        'email' => 'supremshrestha2@gmail.com',
        'phone' => '980000002',
        'address' => 'Company details',
        'status' => 0,
        'password' => Hash::make('123456788'),
    ],
    [
        'name' => 'Ramesh Karki',
        'email' => 'rameshkarki3@gmail.com',
        'phone' => '980000003',
        'address' => 'Company details',
        'status' => 1,
        'password' => Hash::make('123456788'),
    ],
    [
        'name' => 'Sita Lama',
        'email' => 'sitalama4@gmail.com',
        'phone' => '980000004',
        'address' => 'Company details',
        'status' => 0,
        'password' => Hash::make('123456788'),
    ],
    [
        'name' => 'Ram Thapa',
        'email' => 'ramthapa5@gmail.com',
        'phone' => '980000005',
        'address' => 'Company details',
        'status' => 1,
        'password' => Hash::make('123456788'),
    ],
    [
        'name' => 'Gita Rai',
        'email' => 'gitarai6@gmail.com',
        'phone' => '980000006',
        'address' => 'Company details',
        'status' => 0,
        'password' => Hash::make('123456788'),
    ],
    [
        'name' => 'Hari Gurung',
        'email' => 'harigurung7@gmail.com',
        'phone' => '980000007',
        'address' => 'Company details',
        'status' => 1,
        'password' => Hash::make('123456788'),
    ],
    [
        'name' => 'Suman Shrestha',
        'email' => 'sumanshrestha8@gmail.com',
        'phone' => '980000008',
        'address' => 'Company details',
        'status' => 0,
        'password' => Hash::make('123456788'),
    ],
    [
        'name' => 'Anita Khatri',
        'email' => 'anitakhatri9@gmail.com',
        'phone' => '980000009',
        'address' => 'Company details',
        'status' => 1,
        'password' => Hash::make('123456788'),
    ],
    [
        'name' => 'Binod Magar',
        'email' => 'binodmagar10@gmail.com',
        'phone' => '980000010',
        'address' => 'Company details',
        'status' => 0,
        'password' => Hash::make('123456788'),
    ],
  
   
];

        foreach($contacts as $contact)
            {
        User::create($contact);

            }
    }
}
