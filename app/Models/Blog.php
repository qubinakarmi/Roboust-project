<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{

    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'sub_title',
        'blog_content',
        'short_content',
        'images',
        'status',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
