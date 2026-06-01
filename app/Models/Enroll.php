<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'address',
        'state',
        'contact',
        'image',
        'how_find_us',
        'intro'

    ];
}
