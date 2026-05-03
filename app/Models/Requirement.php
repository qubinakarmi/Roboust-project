<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    //

        protected $fillable = [
        'section_id',
        'details',
        'status'
    ];


    public function section()
{
    return $this->belongsTo(Section::class);
}
}
