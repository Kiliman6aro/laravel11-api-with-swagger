<?php

use App\Http\Controllers\Auth\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [LoginController::class, 'login'])->withoutMiddleware('auth:sanctum');

Route::post('/register', [RegisterController::class, 'register'])->withoutMiddleware('auth:sanctum');

Route::get('/user', [UserController::class, 'show']);

Route::apiResource('posts', PostController::class)->except([
    'create', 'edit'
]);
