<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Course extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'short_desc',
        'image',
        'price',
        'status'



    ];


}
