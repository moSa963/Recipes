<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_rating', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete();
            $table->bigInteger("recipe_id")->unsigned();
            $table->foreign("recipe_id")->references("id")->on("recipes")->cascadeOnDelete();
            $table->tinyInteger("rating");
            $table->string("comment")->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'recipe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("recipe_rating");
    }
}
