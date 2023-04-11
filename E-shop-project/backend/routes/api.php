<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// CRUD
// CREATE - POST 
// READ - GET 
// UPDATE - PUT 
// DELETE - DELETE

Route::group(['prefix' => 'products'], function() {
    Route::get('/', [ProductsController::class, 'index']);
    Route::get('/s/{keyword}', [ProductsController::class, 'search']);
    Route::get('/{field}/{order}', [ProductsController::class, 'order']);

    // Admino routai
    Route::middleware('auth:sanctum')->get('/{id}', [ProductsController::class, 'singleProduct'])->where('id', '[0-9]+');
    Route::middleware('auth:sanctum')->post('/', [ProductsController::class, 'create']);
    Route::middleware('auth:sanctum')->put('/{id}', [ProductsController::class, 'update'])->where('id', '[0-9]+');
    Route::middleware('auth:sanctum')->delete('/{id}', [ProductsController::class, 'delete'])->where('id', '[0-9]+');
});

Route::group(['prefix' => 'categories'], function() {
    Route::get('/', [CategoriesController::class, 'index']);
    Route::get('/products/{id}', [ProductsController::class, 'categoryProducts'])->where('id', '[0-9]+');

    // Admino routai
    Route::middleware('auth:sanctum')->post('/', [CategoriesController::class, 'create']);
    Route::middleware('auth:sanctum')->delete('/{id}', [CategoriesController::class, 'delete'])->where('id', '[0-9]+');
    Route::middleware('auth:sanctum')->put('/{id}', [CategoriesController::class, 'update'])->where('id', '[0-9]+');
    Route::middleware('auth:sanctum')->get('/{id}', [CategoriesController::class, 'singleCategory'])->where('id', '[0-9]+');
});

Route::group(['prefix' => 'orders'], function() {
    Route::post('/', [OrderController::class, 'create']);

    // Admino routai
    Route::middleware('auth:sanctum')->get('/', [OrderController::class, 'index']);
    Route::middleware('auth:sanctum')->put('/{id}', [OrderController::class, 'update'])->where('id', '[0-9]+');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

//Jei insomnia ar postman meta logout errora, nustatyti headeri name: Accept, value: application/json
Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/check', [AuthController::class, 'index']);
