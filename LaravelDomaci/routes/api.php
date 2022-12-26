<?php

use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/users', [UserController::class,'index']);
Route::get('/users/{id}', [UserController::class,'show']);

// Route::delete('/destroyUser/{id}', [UserController::class, 'destroy']);


Route::get('/categories', [CategoryController::class,'index']);
Route::get('/category/{category}', [CategoryController::class,'show']);


Route::get('/products', [ProductController::class,'index']);

Route::get('/productsOfBrand/{id}', [BrandProductController::class,'index']);


