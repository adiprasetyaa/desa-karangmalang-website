<?php

namespace Database\Seeders\LembagaDesaAsOf2024;

use App\Models\PerangkatDesa as PerangkatDesa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerangkatDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Ditambahkan Juli 2024
        /*
        Perangkat Desa

        1	SARJONO	KEPALA DESA
        2	LUSIA DWI WIJAYANTI, S.Pd	SEKRETARIS DESA
        3	SUGIYONO	KEBAYAN I
        4	SUTOPO	KEBAYAN II
        5	ANGGONO	KEBAYAN III
        6	GUNADI	KASI KESEJAHTERAAN
        7	MURTINI	KAUR KEUANGAN
        8	ENDANG SURTININGSIH	KAUR PERENCANAAN
        9	SUGIARTO	KAUR TU DAN UMUM
        10	SUYAMTO	KASI PEMERINTAHAN

         */

         $perangkat_desa = [
            [
                'nama' => 'SARJONO',
                'jabatan' => 'KEPALA DESA',
            ],
            [
                'nama' => 'LUSIA DWI WIJAYANTI, S.Pd',
                'jabatan' => 'SEKRETARIS DESA',
            ],
            [
                'nama' => 'SUGIYONO',
                'jabatan' => 'KEBAYAN I',
            ],
            [
                'nama' => 'SUTOPO',
                'jabatan' => 'KEBAYAN II',
            ],
            [
                'nama' => 'ANGGONO',
                'jabatan' => 'KEBAYAN III',
            ],
            [
                'nama' => 'GUNADI',
                'jabatan' => 'KASI KESEJAHTERAAN',
            ],
            [
                'nama' => 'MURTINI',
                'jabatan' => 'KAUR KEUANGAN',
            ],
            [
                'nama' => 'ENDANG SURTININGSIH',
                'jabatan' => 'KAUR PERENCANAAN',
            ],
            [
                'nama' => 'SUGIARTO',
                'jabatan' => 'KAUR TU DAN UMUM',
            ],
            [
                'nama' => 'SUYAMTO',
                'jabatan' => 'KASI PEMERINTAHAN',
            ],
        ];

        foreach ($perangkat_desa as $perangkat) {
            PerangkatDesa::create($perangkat);
        }

    }
}
