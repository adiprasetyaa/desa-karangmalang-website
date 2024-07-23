<?php

namespace App\Http\Controllers;

use App\Models\Kades;
use App\Models\Periode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodes = Periode::all()->map(function ($periode) {
            $periode->start_at = Carbon::parse($periode->start_at)->format('Y');
            $periode->end_at = Carbon::parse($periode->end_at)->format('Y');
            return $periode;
        });
        return view('admin.kades.index', [
            'periodes' => $periodes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kades $kades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kades $kades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kades $kades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kades $kades)
    {
        //
    }
}
