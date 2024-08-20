<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\BPDController;
use App\Http\Controllers\BUMDESController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoDemografiController;
use App\Http\Controllers\InfoGeografisController;
use App\Http\Controllers\KadesController;
use App\Http\Controllers\KadesPeriodeController;
use App\Http\Controllers\KetuaRTController;
use App\Http\Controllers\LayananPublikController;
use App\Http\Controllers\LinmasController;
use App\Http\Controllers\LKDController;
use App\Http\Controllers\LPMDController;
use App\Http\Controllers\PemerintahDesaController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SPMDESController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\VisiMisiController;
use App\Models\InfoGeografis;
use App\Models\LayananPublik;
use App\Models\Linmas;
use App\Models\Role;
use App\Models\SPMDES;
use App\Models\TentangKami;
use App\Models\VisiMisi;

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

    Route::get('/profil-desa/visi-misi', [VisiMisiController::class, 'guestView'])->name('guest.profil_desa.visi_misi');
    Route::get('/profil-desa/tentang-kami', [TentangKamiController::class, 'guestView'])->name('guest.profil_desa.tentang_kami');

    Route::get('/informasi-publik/layanan-publik', [LayananPublikController::class, 'guestView'])->name('guest.informasi_publik.layanan_publik');

    Route::get('/informasi-publik/galeri', [GalleryController::class, 'guestView'])->name('guest.informasi_publik.galeri');

    Route::get('/pemerintahan/pemerintah-desa', [PemerintahDesaController::class, 'view'])->name('guest.pemerintahan.pemerintah_desa');

    Route::get('/profil-desa/demografi-desa', [InfoDemografiController::class, 'guestView'])->name('guest.profil_desa.demografi_desa');
    Route::get('/profil-desa/geografis-desa', [InfoGeografisController::class, 'guestView'])->name('guest.profil_desa.geografis_desa');
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
        Route::get('kades', [KadesController::class, 'view'])->name('kades.view');
        Route::get('ketua_rt', [KetuaRTController::class, 'view'])->name('ketua_rt.view');
        Route::get('bpd', [BPDController::class, 'view'])->name('bpd.view');
        Route::get('bumdes', [BUMDESController::class, 'view'])->name('bumdes.view');
        Route::get('linmas', [LinmasController::class, 'view'])->name('linmas.view');
        Route::get('lkd', [LKDController::class, 'view'])->name('lkd.view');
        Route::get('lpmd', [LPMDController::class, 'view'])->name('lpmd.view');
        Route::get('spmdes', [SPMDESController::class, 'view'])->name('spmdes.view');
        
        // -- Resourceful API --

        Route::group(['prefix' => 'api', 'as' => 'api.'],function(){
            Route::resource('kades', KadesController::class);
            Route::resource('ketua_rt', KetuaRTController::class);
            Route::resource('bpd', BPDController::class);
            Route::resource('bumdes', BUMDESController::class);
            Route::resource('linmas', LinmasController::class);
            Route::resource('lkd', LKDController::class);
            Route::resource('lpmd', LPMDController::class);
            Route::resource('spmdes', SPMDESController::class);
        });

        // old
        Route::resource('perangkat_desa', PerangkatDesaController::class);

        Route::resource('post', PostController::class);
        Route::resource('category', CategoryController::class);

        Route::resource('visimisi', VisiMisiController::class);
        Route::resource('tentang_kami', TentangKamiController::class);

        Route::resource('layanan_publik', LayananPublikController::class);

        Route::resource('struktur_organisasi', StrukturOrganisasiController::class);

        Route::resource('demografi_desa', InfoDemografiController::class);
        Route::resource('geografis_desa', InfoGeografisController::class);

        Route::resource('gallery', GalleryController::class);
    }
);

require __DIR__.'/auth.php';
