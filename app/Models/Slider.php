<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable =[
        'title',
        'sub_title',
        'url_link',
        'video_link',
        'ordering',
        'image',
        'status',
    ];
}
