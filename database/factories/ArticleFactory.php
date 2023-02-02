<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(25),
            'subtitle' => $this->faker->text(65),
            'slug' => $this->faker->text(40),
            'author' => $this->faker->name(),
            'description' => $this->faker->text(),
        ];
    }
}
