<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RegistrarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function() {
        return view('pages.dashboard', ['user' => Auth::user()]);
    })->name('pages.dashboard');

    //Route::view('/dashboard', 'pages.dashboard')->name('pages.dashboard');

    Route::get('/registrars', [RegistrarController::class, 'index'])->name('registrars.index');
    Route::get('/registrars/{registrar}', [RegistrarController::class, 'show'])->name('registrars.show');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{notification}', [NotificationController::class, 'show'])->name('notifications.show');

    Route::resource('/domains', DomainController::class);
});
