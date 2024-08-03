<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\BPDController;
use App\Http\Controllers\BUMDESController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KadesController;
use App\Http\Controllers\KadesPeriodeController;
use App\Http\Controllers\KetuaRTController;
use App\Http\Controllers\LinmasController;
use App\Http\Controllers\LKDController;
use App\Http\Controllers\LPMDController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SPMDESController;

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

        Route::resource('bpd', BPDController::class);
        Route::resource('bumdes', BUMDESController::class);
        Route::resource('ketua_rt', KetuaRTController::class);
        Route::resource('linmas', LinmasController::class);
        Route::resource('lkd', LKDController::class);
        Route::resource('lpmd', LPMDController::class);
        Route::resource('perangkat_desa', PerangkatDesaController::class);
        Route::resource('spmdes', SPMDESController::class);

        Route::resource('post', PostController::class);
        Route::resource('category', CategoryController::class);
        
    }
);

require __DIR__.'/auth.php';
