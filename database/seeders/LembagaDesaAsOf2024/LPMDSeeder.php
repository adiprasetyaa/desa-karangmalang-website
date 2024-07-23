<?php

namespace Database\Seeders\LembagaDesaAsOf2024;

use App\Models\LPMD;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LPMDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
                LPMD
        (LEMBAGA PEMBERDAYAAN DAN PEMBANGUNAN MASYARAKAT)

        NO	NAMA	JABATAN	
        1	SUHARSO	KETUA UMUM	NGEMPLAKREJO RT 12
        2	SUMARNO	WAKIL KETUA	KARANGMALANG
        3	IWAN DH	SEKRETARIS	KEDUSAN RT 15
        4	NGADIMAN	BENDAHARA	KARANGMALANG RT 10
        5	SUDALI	SEKSI AGAMA	SOKOWINATAN RT 07
        6	SURYANTO	SEKSI KAMTIBMAS	BORONGAN RT 004
        7	SUTRISNO	SEKSI PENDIDIKAN	KARANGMALANG RT 11A
        8	SUPARJO	SEKSI PEMBANGUNAN, PERBERDAYAAN PEREKONOMIAN PERTANIAN	KARANGHARJO RT 002
        9	SUHARDI	SEKSI KEPENDUDUKAN KESEHATAN DAN KB	BEKON RT 001
        10	SUKARDI	SEKSI KESEJAHTERAAN SOSIAL	KETONGGO RT 14
        11	PURWADI	SEKSI PEMUDA & OLAHRAGA	KEDUSAN RT 15
        12	WARJIMIN	SEKSI KEBERSIHAN, KETERTIBAN DAN KEINDAHAN SERTA LINGKUNGAN HIDUP	TANGGUNG 

         */

         $lpmd = [
            [
                'nama' => 'SUHARSO',
                'jabatan' => 'KETUA UMUM',
                'alamat' => 'NGEMPLAKREJO RT 12',
            ],
            [
                'nama' => 'SUMARNO',
                'jabatan' => 'WAKIL KETUA',
                'alamat' => 'KARANGMALANG',
            ],
            [
                'nama' => 'IWAN DH',
                'jabatan' => 'SEKRETARIS',
                'alamat' => 'KEDUSAN RT 15',
            ],
            [
                'nama' => 'NGADIMAN',
                'jabatan' => 'BENDAHARA',
                'alamat' => 'KARANGMALANG RT 10',
            ],
            [
                'nama' => 'SUDALI',
                'jabatan' => 'SEKSI AGAMA',
                'alamat' => 'SOKOWINATAN RT 07',
            ],
            [
                'nama' => 'SURYANTO',
                'jabatan' => 'SEKSI KAMTIBMAS',
                'alamat' => 'BORONGAN RT 004',
            ],
            [
                'nama' => 'SUTRISNO',
                'jabatan' => 'SEKSI PENDIDIKAN',
                'alamat' => 'KARANGMALANG RT 11A',
            ],
            [
                'nama' => 'SUPARJO',
                'jabatan' => 'SEKSI PEMBANGUNAN, PERBERDAYAAN PEREKONOMIAN PERTANIAN',
                'alamat' => 'KARANGHARJO RT 002',
            ],
            [
                'nama' => 'SUHARDI',
                'jabatan' => 'SEKSI KEPENDUDUKAN KESEHATAN DAN KB',
                'alamat' => 'BEKON RT 001',
            ],
            [
                'nama' => 'SUKARDI',
                'jabatan' => 'SEKSI KESEJAHTERAAN SOSIAL',
                'alamat' => 'KETONGGO RT 14',
            ],
            [
                'nama' => 'PURWADI',
                'jabatan' => 'SEKSI PEMUDA & OLAHRAGA',
                'alamat' => 'KEDUSAN RT 15',
            ],
            [
                'nama' => 'WARJIMIN',
                'jabatan' => 'SEKSI KEBERSIHAN, KETERTIBAN DAN KEINDAHAN SERTA LINGKUNGAN HIDUP',
                'alamat' => 'TANGGUNG',
            ],
        ];

        foreach ($lpmd as $data) {
            LPMD::create($data);
        }
    }
}
