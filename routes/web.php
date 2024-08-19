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
use App\Http\Controllers\LayananPublikController;
use App\Http\Controllers\LinmasController;
use App\Http\Controllers\LKDController;
use App\Http\Controllers\LPMDController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SPMDESController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\VisiMisiController;
use App\Models\LayananPublik;
use App\Models\Linmas;
use App\Models\SPMDES;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'home'])->name('home');

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
    Route::get('/pemerintahan/lembaga-desa/bpd', [BPDController::class, 'guestView'])->name('guest.pemerintahan.lembaga_desa.bpd');
    Route::get('/pemerintahan/lembaga-desa/bumdes', [BUMDESController::class, 'guestView'])->name('guest.pemerintahan.lembaga_desa.bumdes');
    Route::get('/pemerintahan/lembaga-desa/linmas', [LinmasController::class, 'guestView'])->name('guest.pemerintahan.lembaga_desa.linmas');
    Route::get('/pemerintahan/lembaga-desa/lkd', [LKDController::class, 'guestView'])->name('guest.pemerintahan.lembaga_desa.lkd');
    Route::get('/pemerintahan/lembaga-desa/lpmd', [LPMDController::class, 'guestView'])->name('guest.pemerintahan.lembaga_desa.lpmd');
    Route::get('/pemerintahan/lembaga-desa/spmdes', [SPMDESController::class, 'guestView'])->name('guest.pemerintahan.lembaga_desa.spmdes');
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
        // -- View --
        Route::get('ketua_rt', [KetuaRTController::class, 'view'])->name('ketua_rt.view');
        Route::get('bpd', [BPDController::class, 'view'])->name('bpd.view');
        Route::get('bumdes', [BUMDESController::class, 'view'])->name('bumdes.view');
        Route::get('linmas', [LinmasController::class, 'view'])->name('linmas.view');
        Route::get('lkd', [LKDController::class, 'view'])->name('lkd.view');
        Route::get('lpmd', [LPMDController::class, 'view'])->name('lpmd.view');
        Route::get('spmdes', [SPMDESController::class, 'view'])->name('spmdes.view');
        
        // -- Resourceful API --

        Route::group(['prefix' => 'api', 'as' => 'api.'],function(){
            Route::resource('ketua_rt', KetuaRTController::class);
            Route::resource('bpd', BPDController::class);
            Route::resource('bumdes', BUMDESController::class);
            Route::resource('linmas', LinmasController::class);
            Route::resource('lkd', LKDController::class);
            Route::resource('lpmd', LPMDController::class);
            Route::resource('spmdes', SPMDESController::class);
        });

        // old
        Route::resource('people', PeopleController::class);
        Route::resource('kades', KadesController::class);
        Route::resource('periode', PeriodeController::class);
        Route::resource('kades_periode', KadesPeriodeController::class);

        Route::resource('perangkat_desa', PerangkatDesaController::class);

        Route::resource('post', PostController::class);
        Route::resource('category', CategoryController::class);

        Route::resource('visimisi', VisiMisiController::class);
        Route::resource('tentang_kami', TentangKamiController::class);

        Route::resource('layanan_publik', LayananPublikController::class);
    }
);

require __DIR__.'/auth.php';
