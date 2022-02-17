<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 100),
            'category_id' => $this->faker->numberBetween(1, 25),
            'title' => $this->faker->title(),
            'description' => $this->faker->sentence(),
            'ingredients' => $this->faker->sentence(),
            'directions' => $this->faker->sentence(),
            'note' => $this->faker->sentence(),
            'cook_time' => $this->faker->numberBetween(0, 100),
            'preparation_time' => $this->faker->numberBetween(0, 100),
            'servings' => $this->faker->numberBetween(0, 10),
        ];
    }
}
