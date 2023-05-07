<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 10, 50),
            'image' => $this->faker->imageUrl(),
            'stock' => $this->faker->numberBetween(1, 100),
            'classification_id' => rand(1, 5),
        ];
    }
}
