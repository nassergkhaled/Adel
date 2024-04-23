<?php

use App\Http\Controllers\LegalCasesController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CompleteRegistration;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\TasksController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/test', function () {
})->name('test');



/* Route::get('/clients', function () {
    return view('clients.index');
})->name('clients.index');
 */
Route::get('/chating', function () {
    return view('chating.index');
})->name('chating.index');






/* Route::resource('chating',CommunicationController::class);*/
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::middleware(['auth', CompleteRegistration::class])->group(function () {
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/calender', [MainController::class, 'calender'])->name('calender');
    Route::resource('/legalCases', LegalCasesController::class);
    Route::resource('tasks',TasksController::class);
    Route::resource('clients',ClientsController::class);
    Route::put('/updateBasicInfo', [ProfileController::class, 'updateBasicInfo'])->name('updateBasicInfo');
    Route::post('/Update_Avatar_Email', [ProfileController::class, 'Update_Avatar_Email'])->name('UpdateAvatarEmail');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/CompleteRegistration', [MainController::class, 'completeRegistration'])->name('complete.registration');
    Route::post('/newOffice', [MainController::class, 'newOffice'])->name('newOffice');

});









require __DIR__ . '/auth.php';
