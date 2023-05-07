<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use App\Models\Classification;
use App\Models\Customer;
use App\Models\Purchase;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClassificationSeeder::class,
            BookSeeder::class,
            UserSeeder::class,
            CustomerSeeder::class,
            PurchaseSeeder::class,
        ]);
    }
}
