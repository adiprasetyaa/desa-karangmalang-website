<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //

    public function index()
    {
        //
        // $artikels = Post::all();
        $artikels = Post::paginate(10); // 10 artikel per halaman

        return view('guest.informasi_publik.artikel.view', compact('artikels'));
    }

    public function show($id)
    {
        $artikels = Post::find($id);
        // $sidebar_artikels = Post::paginate(5);
        $sidebar_artikels = Post::orderBy('created_at', 'desc')->paginate(5); // 5 articles per page, ordered by latest
        return view('guest.informasi_publik.artikel.show', compact('artikels', 'sidebar_artikels'));
        //
    }


}
