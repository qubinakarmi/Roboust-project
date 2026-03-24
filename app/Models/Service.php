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
        'status',

    ];

    protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
    public function category(): BelongsTo

    { 
        return $this->belongsTo(Category::class);
    }


  

}
