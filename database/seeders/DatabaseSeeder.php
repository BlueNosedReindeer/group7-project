<?php

namespace Database\Seeders;

use App\Models\CreditCard;
use App\Models\BookDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CreditCard::factory(10)->create();
        BookDetail::factory(10)->create();
    }
}
