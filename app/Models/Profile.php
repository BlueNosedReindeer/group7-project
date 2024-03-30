<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
        'address',
        'home_address'
    ];
    protected $hidden = [
        'password',
    ];
    protected $casts = [
        'password' => 'hashed',
    ];

    public function creditCards(): HasMany
    {
        return $this->hasMany(CreditCard::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
}
