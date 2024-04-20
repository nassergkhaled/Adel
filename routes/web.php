<?php

use App\Http\Controllers\LegalCasesController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CommunicationController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/test', function () {
    return view('completeRegister');
})->name('test');

/* Route::get('/clients', function () {
    return view('clients.index');
})->name('clients.index');
 */
Route::get('/chating', function () {
    return view('chating.index');
})->name('chating.index');

/* Route::resource('chating',CommunicationController::class);
 */Route::resource('clients',ClientsController::class);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::middleware('auth')->group(function () {

    Route::get('/profile',[MainController::class,'profile'])->name('profile');
    Route::get('/dashboard',[MainController::class,'dashboard'])->name('dashboard');
    Route::post('/newOffice',[MainController::class,'newOffice'])->name('newOffice');
    Route::resource('/legalCases', LegalCasesController::class);

});





require __DIR__ . '/auth.php';
