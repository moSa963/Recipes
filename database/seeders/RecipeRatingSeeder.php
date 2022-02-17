<?php

namespace Database\Seeders;

use App\Models\RecipeRating;
use Illuminate\Database\Seeder;

class RecipeRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecipeRating::factory()->times(100)->create();
    }
}
