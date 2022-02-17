<?php

namespace Database\Seeders;

use App\Models\RecipeImage;
use Illuminate\Database\Seeder;

class RecipeImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecipeImage::factory()->times(100)->create();
    }
}
