<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::post('addproduct', [ProductController::class, 'store']);
    Route::get('getproducts', [ProductController::class, 'get']);
    Route::post('buy', [ProductUserController::class, 'store']);
        Route::get('search', [ProductController::class, 'search']);
        Route::get('myproduct', [ProductUserController::class, 'myproduct']);
        Route::get('get/buy', [ProductUserController::class, 'get']);

        Route::post('store/invoice', [InvoiceController::class, 'store']);

        Route::get('get', [ProductUserController::class, 'get']);
       Route::get('get/invoice', [InvoiceController::class, 'get']);
       Route::get('get/all/invoice', [InvoiceController::class, 'getall']);
       Route::post('hide', [ProductController::class, 'hide']);
       Route::post('charge', [ProductController::class, 'charge']);




});
