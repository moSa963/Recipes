<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;


Route::get('/recipes', [RecipeController::class, "list"])
->name("recipe.list");

Route::get('/recipe', [RecipeController::class, "create"])
->middleware("auth")
->name("recipe.create");

Route::post('/recipe', [RecipeController::class, "store"])
->middleware("auth")
->name("recipe.store");

Route::delete('/recipe/{id}', [RecipeController::class, "destroy"])
->middleware("auth")
->name("recipe.destroy");

Route::get('/recipe/{id}', [RecipeController::class, "show"])
->name("recipe.show");

Route::get('/recipe/{recipe_id}/image/{img_id}', [RecipeController::class, "image"])
->name("recipe.image");