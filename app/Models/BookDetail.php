<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'isbn',
        'title',
        'author_id',
        'publisher',
        'publication_year',
        'genre',
        'description',
        'price',
        'copies_sold'];
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
