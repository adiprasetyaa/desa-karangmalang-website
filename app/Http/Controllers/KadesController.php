<?php

namespace App\Http\Controllers;

use App\Models\Kades;
use App\Models\Log;
use App\Models\Periode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KadesController extends Controller
{
    public function view()
    {
        return view('admin.kades.view');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kades = Kades::all();
        
        if ($kades->count() === 0) {
            return response()->json([
                'success' => false,
                'status_code' => 404,
                'message' => 'Data Kepala Desa tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $kades
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
            'name' => 'required|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'period_start_at' => 'required|date',
            'period_end_at' => 'required|date',
        ]); 

        // if photo
        if ($request->hasFile('photo')) {
            $attributes['photo'] = $request->file('photo')->store('images/kades', 'public');
        }

        $kades = Kades::create($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menambahkan data kepala desa',
            'old_data' => '-',
            'new_data' => json_encode($attributes),
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Kepala Desa berhasil ditambahkan',
            'data' => $kades
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kades = Kades::find($id);

        if (!$kades) {
            return response()->json([
                'success' => false,
                'status_code' => 404,
                'message' => 'Data Kepala Desa tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $kades
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kades $kades)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kades = Kades::find($id);

        if (!$kades) {
            return response()->json([
                'success' => false,
                'status_code' => 404,
                'message' => 'Data Kepala Desa tidak ditemukan'
            ]);
        }

        $attributes = $request->validate([
            'name' => 'required|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'period_start_at' => 'required|date',
            'period_end_at' => 'required|date',
        ]);

        // if photo update
        if ($request->hasFile('photo')) {
            $attributes['photo'] = $request->file('photo')->store('images/kades', 'public');
        }

        $kades->update($attributes);

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'mengubah data kepala desa',
            'old_data' => json_encode($kades),
            'new_data' => json_encode($attributes),
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Kepala Desa berhasil diubah',
            'data' => $kades
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $kades = Kades::find($id);

        if (!$kades) {
            return response()->json([
                'success' => false,
                'status_code' => 404,
                'message' => 'Data Kepala Desa tidak ditemukan'
            ]);
        }

        $kades->delete();

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menghapus data kepala desa',
            'old_data' => json_encode($kades),
            'new_data' => '-',
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Kepala Desa berhasil dihapus'
        ]);
    }
}
