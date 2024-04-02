<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="API для авторизации и аутентификации",
 *     version="1.0.0",
 *     description="API для работы с авторизацией и аутентификацией пользователей"
 * )
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 *  )
 *
 */
abstract class Controller
{
    //
}
