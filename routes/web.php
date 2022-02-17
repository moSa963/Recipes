<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, "create"])->name("home");

Route::get('/user', [UserController::class, "create"])
->middleware("auth")
->name("user.create");

Route::get('/user/{id}', [UserController::class, "show"])
->name("user.show");

Route::post('/user', [UserController::class, "update"])
->middleware("auth")
->name("user.update");

Route::get('/user/image/{id}', [UserController::class, "image"])
->name("user.image");

Route::post('/comment/{recipe_id}', [RatingController::class, "store"])
->middleware("auth")
->name("comment.store");

Route::post('/report', [ReportController::class, "store"])
->middleware("auth")
->name("report.store");

require __DIR__.'/auth.php';
require __DIR__.'/recipe.php';
