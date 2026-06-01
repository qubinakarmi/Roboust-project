<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page_Content extends Model
{
    //
        protected $table = 'page_contents';

    protected $fillable = [
        'title',
        'slug'
    ];
}
