<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use App\Models\TentangKami;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $perangkat_desa = PerangkatDesa::all();
        $tentang_kami = TentangKami::first(); // Fetch the first record or adjust as needed
        return view('guest.home.index', compact('perangkat_desa', 'tentang_kami'));
    }
}
