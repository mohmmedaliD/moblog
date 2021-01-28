<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'desc' => $this->faker->text($this->faker->numberBetween(200,250)),
            'content' => $this->faker->text(1000),
            'category_id' => rand(1,10),
            'img' => $this->faker->imageUrl($width = 640, $height = 480)
        ];
    }
}
