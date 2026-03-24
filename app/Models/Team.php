<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    protected $fillable = [

        'designation',
        'full_name',
        'email',
        'phone',
        'address',
        'short_bio',
        'image',
        'linkedin',
        'twitter',
        'facebook',
        'ordering',
        'status',
      
    ];
}
