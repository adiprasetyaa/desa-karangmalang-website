<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('struktur_organisasi')->insert([
            [
                'id' => 1,
                'image' => 'public/images/pemerintahan/pemerintah_desa/struktur_organisasi/struktur_karangmalang.png',
                'periode_awal' => '2020-01-01',
                'periode_akhir' => '2025-12-31',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
