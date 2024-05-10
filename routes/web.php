<?php

use App\Http\Controllers\LegalCasesController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CompleteRegistration;
use App\Http\Middleware\RegistrationComplete;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\TasksController;
use App\Models\ChatSession;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('home');
})->name('home');

// Auth::routes(['verify' => true]);


/* Route::get('/clients', function () {
    return view('clients.index');
})->name('clients.index');
 */







/* Route::resource('chating',CommunicationController::class);*/
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::middleware(['auth', RegistrationComplete::class, 'verified'])->group(function () {
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/calender', [MainController::class, 'calender'])->name('calender');
    Route::resource('/legalCases', LegalCasesController::class);

    Route::get('/chating', function () {
        // $users=User::whereNot('id',Auth()->id())->get();
        $chats = ChatSession::all();
        return view('chating.index', compact('chats'));
    })->name('chating.index');


    // Route::resource('tasks',TasksController::class);
    Route::resource('clients', ClientsController::class);
    Route::put('/updateBasicInfo', [ProfileController::class, 'updateBasicInfo'])->name('updateBasicInfo');
    Route::post('/Update_Avatar_Email', [ProfileController::class, 'Update_Avatar_Email'])->name('UpdateAvatarEmail');
});

Route::middleware(['auth', CompleteRegistration::class])->group(function () {
    // Route::get('/CompleteRegistration', [MainController::class, 'completeRegistration'])->name('complete.registration');


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









require __DIR__ . '/auth.php';
