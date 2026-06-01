<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Rate extends Model
{
    //
    protected $fillable = [
        'course_id',
        'rate'
    ];

public function course(): BelongsTo
{
    return $this->belongsTo(Course::class);
}
}
