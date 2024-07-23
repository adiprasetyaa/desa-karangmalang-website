<?php

namespace Database\Seeders\LembagaDesaAsOf2024;

use App\Models\SPMDES;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SPMDESSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SPMDES

        /*
                SPMDES	
        1	SUTINI	MANAJER SPMDES
        2	ZETY WULANDARI	SEKRETARIS
        3	MURSINI	BENDAHARA
        4	TRI PALUPI	TIM VERIFIKASI
        5	SARIYEM	TIM VERIFIKASI

         */

        $spmdes = [
            [
                'nama' => 'SUTINI',
                'jabatan' => 'MANAJER SPMDES',
            ],
            [
                'nama' => 'ZETY WULANDARI',
                'jabatan' => 'SEKRETARIS',
            ],
            [
                'nama' => 'MURSINI',
                'jabatan' => 'BENDAHARA',
            ],
            [
                'nama' => 'TRI PALUPI',
                'jabatan' => 'TIM VERIFIKASI',
            ],
            [
                'nama' => 'SARIYEM',
                'jabatan' => 'TIM VERIFIKASI',
            ],
        ];

        foreach ($spmdes as $data) {
            SPMDES::create($data);
        }
    }
}
