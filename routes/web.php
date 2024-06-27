<?php

use App\Http\Controllers\LegalCasesController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionsController;
use App\Http\Middleware\CompleteRegistration;
use App\Http\Middleware\RegistrationComplete;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\witnessesController;
use App\Http\Controllers\BillingsController;
use App\Http\Controllers\OCRController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('home');
})->name('home');

// Auth::routes(['verify' => true]);

// Route::get("/test", function () {
//     return view("tasks.index");
// });

Route::middleware(['auth', RegistrationComplete::class, 'verified'])->group(function () {
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/calendar', [MainController::class, 'calendar'])->name('calendar');
    Route::resource('/legalCases', LegalCasesController::class);
    Route::resource('/witnesses', witnessesController::class);
    Route::resource('/Sessions', SessionsController::class);
    Route::resource('/billings', BillingsController::class);


    Route::get('/chating', [MainController::class, 'fetchChatSessions'])->name('chating.index');

    Route::resource('tasks', TasksController::class);
    Route::resource('clients', ClientsController::class);
    Route::post('/clients/storeById/{id}', [ClientsController::class, 'storeById'])->name('clients.storeById');
    Route::post('/witnesses/storeById/{id}', [witnessesController::class, 'storeById'])->name('witnesses.storeById');


    Route::put('/updateBasicInfo', [ProfileController::class, 'updateBasicInfo'])->name('updateBasicInfo');
    Route::post('/Update_Avatar_Email', [ProfileController::class, 'Update_Avatar_Email'])->name('UpdateAvatarEmail');



    // Route::post('/ocr', [OCRController::class, 'parseImage'])->name('ocr');
});

Route::middleware(['auth', CompleteRegistration::class, 'verified'])->group(function () {

    Route::post('/newOffice', [MainController::class, 'newOffice'])->name('newOfficeX');
    Route::post('/joinOffice', [MainController::class, 'joinOffice'])->name('joinOfficeX');

    Route::post('/newClientUser', [MainController::class, 'newClientUser'])->name('newClientUser');

    Route::get('/createOffice', function () {
        return view('newUser/createOffice');
    })->name('createOffice');

    Route::get('/joinOffice', function () {
        return view('newUser/joinOffice');
    })->name('joinOffice');
});
require __DIR__ . '/auth.php';
