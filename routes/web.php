<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KadesController;
use App\Http\Controllers\KadesPeriodeController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PeriodeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Login
Route::middleware('guest')->group(function () {
    Route::get('/admin', [LoginController::class, 'create'])->name('admin.login');
    Route::post('/admin', [LoginController::class, 'store']);
});

// Admin group prefix
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'auth',
        'as' => 'admin.'
    ],
    function () {
        Route::post('/admin', [LoginController::class, 'destroy']);    
        
        Route::get('/dashboard', [DashboardController::class, 'create'])->name('dashboard');

        Route::resource('people', PeopleController::class);
        Route::resource('kades', KadesController::class);
        Route::resource('periode', PeriodeController::class);
        Route::resource('kades_periode', KadesPeriodeController::class);

    }
);

require __DIR__.'/auth.php';
