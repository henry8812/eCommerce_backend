<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| ENG: In this file it will be defined the routes for the API calls
| ESP: En este archivo se definirán las rutas para los llamados de API
|
*/

/***
* Routes for auth logic
*/


    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::middleware('jwt')->post('/auth/refresh', [AuthController::class, 'refresh']);
    

    Route::get('/users', [UserController::class, 'index']);
    Route::middleware('jwt')->post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::middleware('jwt')->put('/users/{id}', [UserController::class, 'update']);
    Route::middleware('jwt')->put('/products/{id}', [ProductController::class, 'update']);
    Route:: delete('/users/{id}', [UserController::class, 'destroy']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::middleware('jwt')->post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::middleware('jwt')->put('/products/{id}', [ProductController::class, 'update']);
    Route::middleware('jwt')->delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::get('/products', [ProductController ::class, 'getFilteredProducts'])->name('products.filtered');
    
    
    Route::get('/categories', [CategoryController::class, 'index']);
