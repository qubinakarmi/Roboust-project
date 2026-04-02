<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Content extends Model
{
    //
    protected $fillable = [

        'page_id',
        'title',
        'description',
        'image',
        'status'
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
