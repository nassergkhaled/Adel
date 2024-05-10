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



// Add these routes to routes/api.php

use App\Http\Controllers\ChatSessionController;
use App\Http\Controllers\ChatMessageMetadataController;
use App\Http\Controllers\TasksController;
use App\Http\Middleware\CheckApiTokenByAdel;

// Chat Sessions Routes
Route::get('/chat_sessions', [ChatSessionController::class, 'index']);
Route::post('/chat_sessions', [ChatSessionController::class, 'store']);
Route::get('/chat_sessions/{id}', [ChatSessionController::class, 'show']);
Route::put('/chat_sessions/{id}', [ChatSessionController::class, 'update']);
Route::delete('/chat_sessions/{id}', [ChatSessionController::class, 'destroy']);

// Chat Messages Routes
Route::get('/chat_messages/{id}', [ChatMessageMetadataController::class, 'fetchMessages']);
Route::post('/chat_messages', [ChatMessageMetadataController::class, 'sendMessage']);


Route::resource('{api_token}/tasks', TasksController::class)->middleware(CheckApiTokenByAdel::class);


// Route::get('/chat_messages/{id}', [ChatMessageMetadataController::class, 'show']);
// Route::put('/chat_messages/{id}', [ChatMessageMetadataController::class, 'update']);
// Route::delete('/chat_messages/{id}', [ChatMessageMetadataController::class, 'destroy']);
