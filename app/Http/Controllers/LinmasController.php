<?php

namespace App\Http\Controllers;

use App\Models\Linmas;
use App\Models\Log;
use Illuminate\Http\Request;

class LinmasController extends Controller
{
    public function view() {
        return view('admin.pemerintahan.lembaga_desa.linmas.view');
    }

    public function guestView()
    {
        $linmas = Linmas::all(); // Mengambil semua data BPD dari database

        return view('guest.pemerintahan.lembaga_desa.linmas.view', compact('linmas')); // Mengirim data ke view
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $linmas = Linmas::all();

        if (!$linmas) {
            return response()->json([
                'success' => false,
                'status_code' => 500,
                'message' => 'Data Linmas tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $linmas
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
            'Alamat' => 'required|string',
        ]); 

        $linmas = Linmas::create($attributes);
        
        if (!$linmas) {
            return response()->json([
                'success' => false,
                'status_code' => 500,
                'message' => 'Data Linmas gagal ditambahkan'
            ]);
        }

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menambahkan data Linmas',
            'old_data' => '-',
            'new_data' => json_encode($attributes),
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Linmas berhasil ditambahkan',
            'data' => $linmas
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $linmas = Linmas::find($id);
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $linmas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Linmas $linmas)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $linmas = Linmas::find($id);

            $attributes = $request->validate([
                'Nama' => 'required|string',
                'Jabatan' => 'required|string',
                'Alamat' => 'required|string',
            ]); 
            
            $old_data = $linmas;
            $linmas->update($attributes);
            
            if (!$linmas) {
                return response()->json([
                    'success' => false,
                    'status_code' => 500,
                    'message' => 'Data Linmas gagal diubah'
                ]);
            }
            
            Log::create([
                'ip_address' => $request->ip(),
                'user_id' => auth()->id(),
                'message' => 'mengubah data Linmas',
                'old_data' => json_encode($old_data),
                'new_data' => json_encode($attributes),
            ]);
            
            return response()->json([
                'success' => true,
                'status_code' => 200,
                'message' => 'Data Linmas berhasil diubah',
                'data' => $linmas
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $linmas = Linmas::find($id);
        $old_data = $linmas;
        $linmas->delete();
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menghapus data Linmas',
            'old_data' => json_encode($old_data),
            'new_data' => '-',
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Linmas berhasil dihapus'
        ]);
    }
}
