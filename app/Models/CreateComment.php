<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateComment extends Model
{

    use HasFactory;

    protected $fillable =
    [
        'Comment',
        'userId',
        'bookId'
    ];
}
