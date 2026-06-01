<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Page extends Model
{
    //
    protected $fillable = [
        'title',
        'page_content_id',
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

public function pageContent(): BelongsTo
{
    return $this->belongsTo(Page_Content::class, 'page_content_id');
}
}
