<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Customer;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    protected $model = Purchase::class;


    public function definition()
    {
        $book = Book::inRandomOrder()->first();
        $customer = Customer::inRandomOrder()->first();

        return [
            'book_id' => $book->id,
            'customer_id' => $customer->id,
            'price' => $book->price,
        ];
    }
}
