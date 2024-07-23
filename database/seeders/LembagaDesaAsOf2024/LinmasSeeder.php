<?php

namespace Database\Seeders\LembagaDesaAsOf2024;

use App\Models\Linmas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Linmas
        /*
                 LINMAS
        NO	NAMA	ALAMAT	JABATAN
        1	SAIDI	BEKON RT 001	Anggota
        2	SLAMET SANTOSO	BEKON RT 001	Anggota
        3	NICODEMUS LOLAEN	KARANGHARJO RT 002	Anggota
        4	SUWARNO	KARANGHARJO RT 002	Anggota
        5	SUKARMAN	NGEMPLAK RT 003	Anggota
        6	SUNARDI	NGEMPLAK RT 003	Anggota
        7	SUPARDI	BORONGAN RT 004	Anggota
        8	JUMADI	KARANGNONGKO RT 005	Anggota
        9	MULYONO	GUNGAN RT006	Anggota
        10	SUPADI	SOKOWINATAN RT 007	Anggota
        11	PURNOMO	SOKOWINATAN RT 007	Anggota
        12	PARWANTO	KARANGMALANG RT 008	Anggota
        13	SURANTO	KARANGMALANG RT 009	Anggota
        14	SARWONO	KARANGMALANG RT 010	Anggota
        15	MULYADI	KARANGMALANG RT 011	Anggota
        16	BUNGKUS RIYAWAN	KARANGMALANG RT 011	Anggota
        17	NGADIMAN	NGEMPLAKREJO RT 012	Anggota
        18	JAIMIN PARTOWIRAHARJO	NGEMPLAKREJO RT 012	Anggota
        19	SATIMAN	KETONGGO RT 013	Anggota
        20	SUGIMAN	KETONGGO RT 013	Anggota
        21	SARTONO	KETONGGO RT 014	Anggota
        22	SUYAMTO	KETONGGO RT 014	Anggota
        23	NARSO SEMITO	KEDUSAN RT 015	Anggota
        24	JUWADI	KEDUSAN RT 015	Anggota
        25	DWI SISWANTO	GADING RT 016	Anggota
        26	MUNGIN	TANGGUNG RT 018	Anggota
        27	AGUS SURANTO	TANGGUNG RT 019	Anggota
        28	PARJO WIYONO	TANGGUNG RT 019	Anggota


         */

        $linmas = [
            [
                'nama' => 'SAIDI',
                'alamat' => 'BEKON RT 001',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'SLAMET SANTOSO',
                'alamat' => 'BEKON RT 001',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'NICODEMUS LOLAEN',
                'alamat' => 'KARANGHARJO RT 002',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'SUWARNO',
                'alamat' => 'KARANGHARJO RT 002',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'SUKARMAN',
                'alamat' => 'NGEMPLAK RT 003',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'SUNARDI',
                'alamat' => 'NGEMPLAK RT 003',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'SUPARDI',
                'alamat' => 'BORONGAN RT 004',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'JUMADI',
                'alamat' => 'KARANGNONGKO RT 005',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'MULYONO',
                'alamat' => 'GUNGAN RT006',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'SUPADI',
                'alamat' => 'SOKOWINATAN RT 007',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'PURNOMO',
                'alamat' => 'SOKOWINATAN RT 007',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'PARWANTO',
                'alamat' => 'KARANGMALANG RT 008',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'SURANTO',
                'alamat' => 'KARANGMAL',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'SARWONO',
                'alamat' => 'KARANGMALANG RT 010',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'MULYADI',
                'alamat' => 'KARANGMALANG RT 011',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'BUNGKUS RIYAWAN',
                'alamat' => 'KARANGMALANG RT 011',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'NGADIMAN',
                'alamat' => 'NGEMPLAKREJO RT 012',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'JAIMIN PARTOWIRAHARJO',
                'alamat' => 'NGEMPLAKREJO RT 012',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'SATIMAN',
                'alamat' => 'KETONGGO RT 013',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'SUGIMAN',
                'alamat' => 'KETONGGO RT 013',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'SARTONO',
                'alamat' => 'KETONGGO RT 014',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'SUYAMTO',
                'alamat' => 'KETONGGO RT 014',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'NARSO SEMITO',
                'alamat' => 'KEDUSAN RT 015',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'JUWADI',
                'alamat' => 'KEDUSAN RT 015',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'DWI SISWANTO',
                'alamat' => 'GADING RT 016',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'MUNGIN',
                'alamat' => 'TANGGUNG RT 018',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'AGUS SURANTO',
                'alamat' => 'TANGGUNG RT 019',
                'jabatan' => 'Anggota',
            ],
            [
                'nama' => 'PARJO WIYONO',
                'alamat' => 'TANGGUNG RT 019',
                'jabatan' => 'Anggota',
            ],
        ];

        foreach ($linmas as $data) {
            Linmas::create($data);
        }
    }
}
