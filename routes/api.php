<?php

use App\Http\Controllers\Auth\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [LoginController::class, 'login']);

Route::post('/register', [RegisterController::class, 'register']);

/**
 * @OA\Get(
 *     path="/user",
 *     summary="Получить информацию о текущем пользователе",
 *     description="Получает информацию о текущем аутентифицированном пользователе.",
 *     tags={"Пользователи"},
 *     security={{"sanctum": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Успешный ответ",
 *         @OA\JsonContent(
 *             @OA\Property(property="user", type="object", ref="#/components/schemas/User")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Ошибка аутентификации",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Unauthenticated")
 *         )
 *     )
 * )
 */
Route::get('/user', [UserController::class, 'show'])->middleware('auth:sanctum');
