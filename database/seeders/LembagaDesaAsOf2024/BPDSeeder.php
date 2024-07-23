<?php

namespace Database\Seeders\LembagaDesaAsOf2024;

use App\Models\BPD;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BPDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
                BPD 
        (BADAN PERMUSYAWARATAN DESA)

        NO	NAMA	JABATAN    ALAMAT	
        1	SUKIMAN	KETUA	BEKON RT 001
        2	SUTRIYANTO	WAKIL KETUA	TANGGUNG
        3	FERY SATRIYA WIJAYA	SEKRETARIS	GUNGAN RT 006
        4	SUBAGYO	SIE PEMBANGUNAN DAN INFRAST	SOKOWINATAN RT 007
        5	SUPARDI	SIE PEM DAN PEMBERDAYAAN	KARANGMALANG RT 008
        6	AGUNG WIJI HANDAYANI	SIE PERWAKILAN PEREMPUAN	NGEMPLAK RT 003
        7	ARIS JATMIKO	ANGGOTA	KETONGGO RT 014
        8	PRAMISTA FEBRIANI	ANGGOTA	KEDUSAN RT 15
        9	EKO PROJO BUDIONO	ANGGOTA	KARANGMALANG RT 11

         */

        $bpd = [
            [
                'nama' => 'SUKIMAN',
                'jabatan' => 'KETUA',
                'alamat' => 'BEKON RT 001',
            ],
            [
                'nama' => 'SUTRIYANTO',
                'jabatan' => 'WAKIL',
                'alamat' => 'TANGGUNG',
            ],
            [
                'nama' => 'FERY SATRIYA WIJAYA',
                'jabatan' => 'SEKRETARIS',
                'alamat' => 'GUNGAN RT 006',
            ],
            [
                'nama' => 'SUBAGYO',
                'jabatan' => 'SIE PEMBANGUNAN DAN INFRASTRUKTUR',
                'alamat' => 'SOKOWINATAN RT 007',
            ],
            [
                'nama' => 'SUPARDI',
                'jabatan' => 'SIE PEMBANGUNAN DAN PEMBERDAYAAN',
                'alamat' => 'KARANGMALANG RT 008',
            ],
            [
                'nama' => 'AGUNG WIJI HANDAYANI',
                'jabatan' => 'SIE PERWAKILAN PEREMPUAN',
                'alamat' => 'NGEMPLAK RT 003',
            ],
            [
                'nama' => 'ARIS JATMIKO',
                'jabatan' => 'ANGGOTA',
                'alamat' => 'KETONGGO RT 014',
            ],
            [
                'nama' => 'PRAMISTA FEBRIANI',
                'jabatan' => 'ANGGOTA',
                'alamat' => 'KEDUSAN RT 15',
            ],
            [
                'nama' => 'EKO PROJO BUDIONO',
                'jabatan' => 'ANGGOTA',
                'alamat' => 'KARANGMALANG RT 11',
            ],
        ];

        foreach ($bpd as $data) {
            BPD::create($data);
        }
    }
}
