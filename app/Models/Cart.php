<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $fillable = ['user_id', 'title', 'author', 'price'];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}

