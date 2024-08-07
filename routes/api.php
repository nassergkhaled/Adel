<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\api\TestController;

// Route::get('/test', [TestController::class, 'test'])->middleware("auth:sanctum");
// Route::post('/r', [TestController::class, 'returnRequest']);



use App\Http\Controllers\api\ApiAuthController;
use App\Http\Controllers\api\apiTasksController;

Route::post('/register', [ApiAuthController::class, 'register'])->name("apiRegister");
Route::post('/login', [ApiAuthController::class, 'login'])->name("apiLogin");



// Add these routes to routes/api.php

use App\Http\Controllers\ChatSessionController;
use App\Http\Controllers\ChatMessageMetadataController;
use App\Http\Controllers\LegalCasesController;
use App\Http\Controllers\TasksController;
use App\Http\Middleware\CheckApiTokenByAdel;
use App\Http\Middleware\CheckApiTokenByAdelV2;
use Illuminate\Support\Facades\Hash;

// Chat Sessions Routes
Route::get('/chat_sessions', [ChatSessionController::class, 'index']);
Route::post('/chat_sessions', [ChatSessionController::class, 'store']);
Route::get('/chat_sessions/{id}', [ChatSessionController::class, 'show']);
Route::put('/chat_sessions/{id}', [ChatSessionController::class, 'update']);
Route::delete('/chat_sessions/{id}', [ChatSessionController::class, 'destroy']);

// Chat Messages Routes


// Route::resource('{api_token}/tasks', apiTasksController::class)->middleware(CheckApiTokenByAdel::class);


Route::post('/newClientSission', [ChatSessionController::class, 'newClientSission'])->middleware(CheckApiTokenByAdelV2::class);


// Route::get('/chat_messages/{id}', [ChatMessageMetadataController::class, 'show']);
// Route::put('/chat_messages/{id}', [ChatMessageMetadataController::class, 'update']);
// Route::delete('/chat_messages/{id}', [ChatMessageMetadataController::class, 'destroy']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/legalCases', [LegalCasesController::class, "apiIndex"]);
    Route::post('/legalCases', [LegalCasesController::class, "store"]);
    Route::get('/legalCases/{id}', [LegalCasesController::class, "APIshow"]);



    Route::post('/chat_messages', [ChatMessageMetadataController::class, 'sendMessage']);
    Route::get('/chat_messages/{id}', [ChatMessageMetadataController::class, 'fetchMessages']);

    Route::get('/getTasks',[apiTasksController::class,"getApiTasks"]);
});

Route::post('/hash', function (Request $request) {
    $hash = Hash::make($request->pass);
    return response()->json(['hash' => $hash], 200);
});

Route::post('/check', function (Request $request) {
    $hash = Hash::check($request->pass, $request->hash);
    return response()->json(['hash' => $hash], 200);
});