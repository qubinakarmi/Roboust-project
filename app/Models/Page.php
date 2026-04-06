<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $fillable = [
        'title',
        'slug',
        'sub_title',
        'short_content',
        'detail_content',
        'image',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'meta_image',
        'status',
    ];
}
