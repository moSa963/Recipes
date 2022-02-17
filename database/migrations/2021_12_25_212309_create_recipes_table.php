<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete();
            $table->bigInteger("category_id")->unsigned();
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnDelete();

            $table->string("title");
            $table->string("description")->default("-");
            $table->string("ingredients");
            $table->string("directions");
            $table->string("note")->nullable();
            $table->string("cook_time")->default("-");
            $table->string("preparation_time")->default("-");
            $table->integer("servings")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("recipes");
    }
}
