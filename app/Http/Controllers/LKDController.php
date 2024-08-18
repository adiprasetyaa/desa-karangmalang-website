<?php

namespace App\Http\Controllers;

use App\Models\LKD;
use App\Models\Log;
use Illuminate\Http\Request;

class LKDController extends Controller
{
    public function view()
    {
        return view('admin.pemerintahan.lembaga_desa.lkd.view');
    }

    public function guestView()
    {
        $lkd = LKD::all(); // Mengambil semua data BPD dari database

        return view('guest.pemerintahan.lembaga_desa.lkd.view', compact('lkd')); // Mengirim data ke view
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lkd = LKD::all();

        if (!$lkd) {
            return response()->json([
                'success' => false,
                'status_code' => 500,
                'message' => 'Data LKD tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $lkd
        ]);
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

        $lkd = LKD::create($attributes);
        
        if (!$lkd) {
            return response()->json([
                'success' => false,
                'status_code' => 500,
                'message' => 'Data LKD gagal ditambahkan'
            ]);
        }

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menambahkan data LKD',
            'old_data' => '-',
            'new_data' => json_encode($attributes),
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data LKD berhasil ditambahkan',
            'data' => $lkd
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lkd = LKD::find($id);

        if (!$lkd) {
            return response()->json([
                'success' => false,
                'status_code' => 500,
                'message' => 'Data LKD tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $lkd
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LKD $lKD)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $lkd = LKD::find($id);

        $attributes = $request->validate([
            'Nama' => 'required|string',
            'Jabatan' => 'required|string',
        ]); 

        $old_data = $lkd;
        $lkd->update($attributes);

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'mengubah data LKD',
            'old_data' => json_encode($old_data),
            'new_data' => json_encode($attributes),
        ]);

        if (!$lkd) {
            return response()->json([
                'success' => false,
                'status_code' => 500,
                'message' => 'Data LKD gagal diubah'
            ]);
        }

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data LKD berhasil diubah',
            'data' => $lkd
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $lkd = LKD::find($id);
        $old_data = $lkd;
        $lkd->delete();

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menghapus data LKD',
            'old_data' => json_encode($old_data),
            'new_data' => '-',
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data LKD berhasil dihapus'
        ]);
    }
}
