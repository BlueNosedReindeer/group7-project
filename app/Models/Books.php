<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $casts = [
        'price' => 'decimal:2', // Cast to decimal with 2 decimal places
    ];
}
