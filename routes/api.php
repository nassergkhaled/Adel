<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\api\TestController;

Route::get('/test', [TestController::class, 'test']);
Route::post('/r', [TestController::class, 'returnRequest']);



use App\Http\Controllers\api\ApiAuthController;
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
