<?php

namespace Database\Seeders;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purchase::factory()->count(50)->create();

    }
}
