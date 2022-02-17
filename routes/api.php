<?php

use App\Http\Controllers\ApiRatingController;
use App\Http\Controllers\ApiRecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/recipe/list', [ApiRecipeController::class, 'list'])
->name('api.recipe.list');

Route::get('/comment/list/{id}', [ApiRatingController::class, 'list'])
->name('api.comment.list');