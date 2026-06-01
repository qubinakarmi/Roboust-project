<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'slug',
        'short_desc',
        'image',
        'duration',
        'status',
        'course_info',
        'career_outcome',
        'tool',
        'certification',
        'video',
        'benefits'
        


    ];
    public function rate(): HasMany
    {
        return $this->hasMany(Rate::class);
    }
}
