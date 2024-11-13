<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;    

Route::get('/', function () {
    return view('welcome');
});

Route::get('/berita', [BeritaController::class, 'index']);
Route::post('/berita', [BeritaController::class, 'store']);