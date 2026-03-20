<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{

protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
    protected $fillable = [
        'company_name',
        'designation',
        'client_name',
        'message',
        'image',
        'status',
    ];
}
