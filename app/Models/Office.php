<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //
        protected $fillable = [
        'name',
        'slug',
        'address',
        'email',
        'phone_1',
        'phone_2',
        'phone_3',
        'is_head_office',
        'map_link',
        'status'
    ];
}
