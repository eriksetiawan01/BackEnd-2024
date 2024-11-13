<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::get('/news/search/{title}', [NewsController::class, 'search']);
Route::get('/news/category/sport', [NewsController::class, 'getSportNews']);
Route::get('/news/category/finance', [NewsController::class, 'getFinanceNews']);
Route::get('/news/category/automotive', [NewsController::class, 'getAutomotiveNews']);
Route::post('/news', [NewsController::class, 'store']);
Route::put('/news/{id}', [NewsController::class, 'update']);
Route::delete('/news/{id}', [NewsController::class, 'destroy']);
