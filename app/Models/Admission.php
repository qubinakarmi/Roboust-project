<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Admission extends Model
{
    //
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'course_id',
        'start_date',
        'address',
        'message'
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
