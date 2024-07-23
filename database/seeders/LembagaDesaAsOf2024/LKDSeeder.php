<?php

namespace Database\Seeders\LembagaDesaAsOf2024;

use App\Models\LKD;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LKDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
                LKD

        NO	NAMA	JABATAN
        1	IDHA HERIWATI	KETUA
        2	SULASTRI	BENDAHARA
        3	SRI MULATSIH	SEKRETARIS
         */

            $lkd = [
                [
                    'nama' => 'IDHA HERIWATI',
                    'jabatan' => 'KETUA',
                ],
                [
                    'nama' => 'SULASTRI',
                    'jabatan' => 'BENDAHARA',
                ],
                [
                    'nama' => 'SRI MULATSIH',
                    'jabatan' => 'SEKRETARIS',
                ],
            ];

        foreach ($lkd as $data) {
            LKD::create($data);
        }
    }
}
