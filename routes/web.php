<?php

use App\Http\Controllers\ApiRatingController;
use App\Http\Controllers\ApiRecipeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "create"])->name("home");

Route::middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('/user', 'create')->name("user.create");
    Route::get('/user/{id}', 'show')->name("user.show");
    Route::post('/user', 'update')->name("user.update");
    Route::get('/user/image/{id}', 'image')->name("user.image");
});

Route::middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('/user', 'create')->name("user.create");
    Route::get('/user/{id}', 'show')->name("user.show");
    Route::post('/user', 'update')->name("user.update");
    Route::get('/user/image/{id}', 'image')->name("user.image");
});

Route::post('/comment/{recipe_id}', [RatingController::class, "store"])
    ->middleware("auth")
    ->name("comment.store");

Route::post('/report', [ReportController::class, "store"])
    ->middleware("auth")
    ->name("report.store");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->controller(RecipeController::class)->group(function () {
    Route::get('/recipes', 'list')->name("recipe.list");
    Route::get('/recipe', 'create')->name("recipe.create");
    Route::post('/recipe', 'store')->name("recipe.store");
    Route::delete('/recipe/{id}', 'destroy')->name("recipe.destroy");
    Route::get('/recipe/{id}', 'show')->name("recipe.show");
    Route::get('/recipe/{recipe}/image/{image}', 'image')->name("recipe.image");
});

Route::get('/api/recipe/list', [ApiRecipeController::class, 'list'])
    ->name('api.recipe.list');

Route::get('/api/comment/list/{id}', [ApiRatingController::class, 'list'])
    ->name('api.comment.list');

require __DIR__ . '/auth.php';
