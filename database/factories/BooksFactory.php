<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Books;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    protected $model = Books::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'genre' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'isbn' => $this->faker->isbn13,
            'image' => $this->faker->imageUrl,
            'published' => $this->faker->dateTimeBetween('-30 years', 'now')->format('Y-m-d'),
            'publisher' => $this->faker->company,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Books $book) {
            $response = json_decode(Http::get('https://fakerapi.it/api/v1/books?_quantity=500'));

            $booksData = collect($response->data)->map(function ($bookData) {
                return [
                    'title' => $bookData->title,
                    'author' => $bookData->author,
                    'genre' => $bookData->genre,
                    'description' => $bookData->description,
                    'isbn' => $bookData->isbn,
                    'image' => $bookData->image,
                    'published' => $bookData->published,
                    'publisher' => $bookData->publisher
                ];
            });

            Books::insert($booksData->toArray());
        });
    }
}
