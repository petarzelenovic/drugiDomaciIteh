<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\BrandController;
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
//ajde

Route::get('/categories', [CategoryController::class,'index']);
Route::get('/category/{category}', [CategoryController::class,'show']);

Route::get('/brands', [BrandController::class,'index']);
// Route::get('/brands/{brand}', [BrandController::class,'show']);
// izbacen brand show


Route::get('/products', [ProductController::class,'index']);

Route::get('/productsOfBrand/{id}', [BrandProductController::class,'index']);

Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::resource('products', ProductController::class)->only(['update', 'store', 'destroy']);
    Route::put('products/{id}', [ProductController::class, 'update']);
    Route::delete('products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});






