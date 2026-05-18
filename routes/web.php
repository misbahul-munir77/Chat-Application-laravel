<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;


Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'selamat']);

    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'daftar']);

});

Route::middleware('auth')->group(function (){
    Route::get('/user', [UsersController::class, 'index']);

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/user/{id}', [UsersController::class, 'chat']);
    Route::post('/kirimpesan', [UsersController::class, 'kirim']);

    Route::get('/group', [GroupController::class, 'index']);
    Route::get('/group/{id}', [GroupController::class, 'group']);
    Route::post('/group/kirim', [GroupController::class, 'kirim']);

    Route::get('/buatgroup', [GroupController::class, 'buat']);
});