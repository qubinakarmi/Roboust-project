<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    //
        protected $table = 'about_us';

    protected $fillable = [
        'title',
        'sub_title',
        'detail_content',
        'mission_title',
        'mission_content',
        'location_title',
        'location_content',
        'image'
    ];
}
