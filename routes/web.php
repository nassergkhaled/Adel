<?php

use App\Http\Controllers\LegalCasesController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestedFundController;
use App\Http\Controllers\SessionsController;
use App\Http\Middleware\CompleteRegistration;
use App\Http\Middleware\RegistrationComplete;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\witnessesController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ExpenseController;

use App\Http\Controllers\BillingsController;
use App\Http\Controllers\managerFunctionsController;
use App\Http\Controllers\OCRController;
use App\Http\Middleware\acceptedJoinRequest;
use App\Http\Middleware\fullAccess;
use App\Http\Middleware\Lawyer;
use App\Http\Middleware\Manager;
use App\Http\Middleware\notLawyer;
use App\Http\Middleware\notManager;
use App\Http\Middleware\pendingJoinRequest;
use App\Http\Middleware\suspendedAccess;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('home');
})->name('home');

use App\Http\Controllers\Auth\LoginController;

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Route::get('auth/facebook', [LoginController::class, 'redirectToFacebook']);
// Route::get('auth/facebook/callback', [LoginController::class, 'handleFacebookCallback']);


// Auth::routes(['verify' => true]);

// Route::get("/test", function () {
//     return view("tasks.index");
// });

Route::middleware(['auth', RegistrationComplete::class, 'verified'])->group(function () {
    Route::middleware([acceptedJoinRequest::class, fullAccess::class])->group(function () {

        Route::get('/profile', [MainController::class, 'profile'])->name('profile');
        Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
        Route::get('/calendar', [MainController::class, 'calendar'])->name('calendar');


        Route::get('/chating', [MainController::class, 'fetchChatSessions'])->name('chating.index');

        Route::resource('tasks', TasksController::class);



        Route::put('/updateBasicInfo', [ProfileController::class, 'updateBasicInfo'])->name('updateBasicInfo');
        Route::post('/Update_Avatar_Email', [ProfileController::class, 'Update_Avatar_Email'])->name('UpdateAvatarEmail');


        Route::middleware([notManager::class])->group(function () {
            Route::resource('/legalCases', LegalCasesController::class);
            Route::resource('/witnesses', witnessesController::class);
            Route::resource('/Sessions', SessionsController::class);
            Route::resource('/billings', BillingsController::class);
            Route::resource('/invoices', InvoiceController::class);
            Route::resource('/expenses', ExpenseController::class);
            Route::resource('/requestedfunds', RequestedFundController::class);
        });



        Route::middleware([Lawyer::class])->group(function () {
            Route::resource('clients', ClientsController::class);
            Route::post('/clients/storeById/{id}', [ClientsController::class, 'storeById'])->name('clients.storeById');
            Route::post('/witnesses/storeById/{id}', [witnessesController::class, 'storeById'])->name('witnesses.storeById');
            Route::post('/ManagerInterface', [MainController::class, "switchToManagerInterface"])->name("switchToManagerInterface");
        });


        Route::middleware([Manager::class])->group(function () {

            Route::post('/LawyerInterface', [MainController::class, "switchToLawyerInterface"])->name("switchToLawyerInterface");
            Route::post('/ManagerLawyerAccount', [MainController::class, "createManagerLawyerAccount"])->name("createManagerLawyerAccount");


            Route::get("/joinRequests", [managerFunctionsController::class, 'joinRequests'])->name('joinRequests');
            Route::put("/joinRequests/{id}", [managerFunctionsController::class, 'updateJoinRequests'])->name('updateJoinRequests');
            Route::get('/officeMembers', [managerFunctionsController::class, "officeMembers"])->name("officeMembers");
            Route::put("/updateMemberAccess/{id}", [managerFunctionsController::class, 'updateMemberAccess'])->name('updateMemberAccess');
        });




        // Route::post('/ocr', [OCRController::class, 'parseImage'])->name('ocr');

    });

    Route::middleware([pendingJoinRequest::class])->group(function () {
        Route::post("/cancelMembershipRequest", [MainController::class, 'cancelMembershipRequest'])->name('cancelMembershipRequest');
        Route::get('/pendingJoinRequest', function () {
            return view('newUser.pendingJoinRequest');
        })->name('pendingJoinRequest');
    });


    Route::middleware([suspendedAccess::class])->group(function () {
        Route::get('/suspendedAccess', function () {
            return view('suspendedAccess');
        })->name('suspendedAccess');
    });
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
