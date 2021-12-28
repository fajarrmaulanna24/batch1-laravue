<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fisrtBook = \App\Models\Book::orderBy('id', 'asc')->first();
        $lastBook = \App\Models\Book::orderBy('id', 'desc')->first();

        $firstTrc = \App\Models\Transaction::orderBy('id', 'asc')->first();
        $lastTrc = \App\Models\Transaction::orderBy('id', 'desc')->first();

        return [
            'transaction_id' => $this->faker->numberBetween($firstTrc->id, $lastTrc->id),
            'book_id' => $this->faker->numberBetween($fisrtBook->id, $lastBook->id),
            'qty' => 1
        ];
    }
}
