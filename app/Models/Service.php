<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'sub_title',
        'short_desc',
        'description',
        'image',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'meta_image',
        'status',

    ];


    public function category(): BelongsTo

    {
        return $this->belongsTo(Category::class);
    }
}
