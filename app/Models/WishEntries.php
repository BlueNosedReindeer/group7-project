<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class WishEntries extends Model  
{
    protected $fillable = 'book_id';

    public function profile(): BelongsTo
    {
        return $this->belongsTo(WishList::class);
    }

    public function getID(){
        $ret = $this->attributes['book_id'];
        return $ret;
    }
}

