<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use App\Models\Post;
use App\Models\TentangKami;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $perangkat_desa = PerangkatDesa::all();
        $tentang_kami = TentangKami::first(); // Fetch the first record or adjust as needed
        $artikels = Post::orderBy('created_at', 'desc')->paginate(3); // 5 articles per page, ordered by latest
        return view('guest.home.index', compact('perangkat_desa', 'tentang_kami','artikels'));
    }
}
