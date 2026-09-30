<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topping extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price_medium',
        'price_large',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}