<?php

namespace App\Http\Controllers;

use App\Models\Kades;
use App\Models\PerangkatDesa;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class PemerintahDesaController extends Controller
{
    public function view()
    {
        $struktur_organisasi = StrukturOrganisasi::first(); // Mengambil semua data BPD dari database
        $perangkat_desa = PerangkatDesa::all();
        $kepala_desa = Kades::all();

        return view('guest.pemerintahan.pemerintah_desa.view', compact('struktur_organisasi', 'perangkat_desa', 'kepala_desa')); // Mengirim data ke view
    }

}
