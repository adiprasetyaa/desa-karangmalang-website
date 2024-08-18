<?php

namespace App\Http\Controllers;

use App\Models\BUMDES;
use App\Models\Log;
use Illuminate\Http\Request;

class BUMDESController extends Controller
{
    public function view() {
        return view('admin.pemerintahan.lembaga_desa.bumdes.view');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bumdes = BUMDES::all();

        if (!$bumdes) {
            return response()->json([
                'success' => false,
                'status_code' => 500,
                'message' => 'Data BUMDES tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $bumdes
        ]);
    }

    public function guestView()
    {
        $bumdes = BUMDES::all(); // Mengambil semua data BPD dari database

        return view('guest.pemerintahan.lembaga_desa.bumdes.view', compact('bumdes')); // Mengirim data ke view
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // null
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'Nama' => 'required|string',
            'Jabatan' => 'required|string',
        ]); 

        $bumdes = BUMDES::create($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menambahkan data BUMDES',
            'old_data' => '-',
            'new_data' => json_encode($attributes),
        ]);

        if(!$bumdes) {
            return response()->json([
                'success' => false,
                'status_code' => 500,
                'message' => 'Data Bumdes gagal ditambahkan'
            ]);
        }
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Bumdes berhasil ditambahkan',
            'data' => $bumdes
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bumdes = BUMDES::find($id);
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $bumdes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BUMDES $bUMDES)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $bumdes = BUMDES::find($id);
        
        $attributes = $request->validate([
            'Nama' => 'required|string',
            'Jabatan' => 'required|string',
        ]); 

        $old_data = $bumdes;
        $bumdes->update($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'mengubah data BUMDES',
            'old_data' => json_encode($old_data),
            'new_data' => json_encode($attributes),
        ]);

        if (!$bumdes) {
            return response()->json([
                'success' => false,
                'status_code' => 500,
                'message' => 'Data BUMDES gagal diubah'
            ]);
        }
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data BUMDES berhasil diubah',
            'data' => $bumdes
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {

        $bumdes = BUMDES::find($id);

        $old_data = $bumdes;
        $bumdes->delete();

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menghapus data BUMDES',
            'old_data' => json_encode($old_data),
            'new_data' => '-',
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data BUMDES berhasil dihapus'
        ]);
    }
}
