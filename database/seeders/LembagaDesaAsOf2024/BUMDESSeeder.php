<?php

namespace Database\Seeders\LembagaDesaAsOf2024;

use App\Models\BUMDES;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BUMDESSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bumdes
        /*
                BUMDES/SPMDES
        (BADAN USAHA MILIK DESA)
        NO	NAMA	JABATAN
        1	ARIS MIYANTO	DIREKTUR BUMDES
        2	AGUSTINA DAMAYANTI	SEKRETARIS
        3	FEBRINA IKASARI	BENDAHARA
        4	HENDI SALI SAPUTRO	ANGGOTA
        5	JOKO RIYADI	ANGGOTA

         */

        $bumdes = [
            [
                'nama' => 'ARIS MIYANTO',
                'jabatan' => 'DIREKTUR BUMDES',
            ],
            [
                'nama' => 'AGUSTINA DAMAYANTI',
                'jabatan' => 'SEKRETARIS',
            ],
            [
                'nama' => 'FEBRINA IKASARI',
                'jabatan' => 'BENDAHARA',
            ],
            [
                'nama' => 'HENDI SALI SAPUTRO',
                'jabatan' => 'ANGGOTA',
            ],
            [
                'nama' => 'JOKO RIYADI',
                'jabatan' => 'ANGGOTA',
            ],
        ];

        foreach ($bumdes as $data) {
            BUMDES::create($data);
        }
    }
}
