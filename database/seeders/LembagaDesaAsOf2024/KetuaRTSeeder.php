<?php

namespace Database\Seeders\LembagaDesaAsOf2024;

use App\Models\KetuaRT;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KetuaRTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ketua RT
        /*
                LAMPIRAN KEPUTUSAN KEPALA DESA KARANGMALANG
        NOMOR
        : 141.1/ 13/ XII/ 2023
        TANGGAL
        : 19 Desember 2023
        1
        JUMARI
        SRAGEN/ 10 MARET 1967
        BEKON
        RT 001
        081327383039
        2
        Drs.SUPARLAN, M.Pd
        KARANGANYAR/ 03 MARET 1962
        KARANGHARJO
        RT 002
        085876799820
        3
        SARIYEM
        KARANGANYAR/ 10 AGUSTUS 1962
        NGEMPLAK
        RT 003
        081329545679
        4
        SURYANTO
        SRAGEN/ 05 JULI 1972
        BORONGAN
        RT 004
        081290066667
        5
        TRI WAHYUDI, S.Pd
        SRAGEN/ 19 DESEMBER 1984
        KARANGNONGKO
        RT 005
        08562828341
        6
        SUMARNO
        SRAGEN/ 09 JULI 1972
        GUNGAN
        RT 006
        085727501940
        7
        SUTOMO
        SRAGEN/ 12 MEI 1970
        SOKOWINATAN
        RT 007A
        085713532057
        8
        SUYADI
        SRAGEN/ 31 DESEMBER 1968
        SOKOWINATAN
        RT 007B
        085934554886
        9
        Drs.SISWO WIDODO
        SRAGEN/ 14 JANUARI 1967
        KARANGMALANG
        RT 008
        085747309505
        10
        MULYOTO
        SRAGEN/ 13 SEPTEMBER 1976
        KARANGMALANG
        RT 009
        085213516282
        11
        SARJONO
        SRAGEN/ 01 JANUARI 1965
        KARANGMALANG
        RT 010
        081225936877
        12
        SUYATNO
        SRAGEN/ 01 JANUARI 1957
        KARANGMALANG
        RT 011A
        085293030108
        13
        JUMADI
        SRAGEN/ 15 JUNI 1979
        KARANGMALANG
        RT 011B
        085641152846
        14
        KASIDI
        SRAGEN/ 17 AGUSTUS 1957
        NGEMPLAKREJO
        RT 012A
        081329152189
        15
        NANANG SURYANTO, SE
        SRAGEN/ 12 MEI 1978
        NGEMPLAKREJO
        RT 012B
        0816671160
        16
        GIYANTO
        SRAGEN/ 31 DESEMBER 1965
        KETONGGO
        RT 013
        081225188780
        17
        ANWAR WARDOYO
        SRAGEN/ 30 DESEMBER 1968
        KETONGGO
        RT 014
        081574147387
        18
        CIPTO SUWARNO
        SRAGEN/ 16 MEI 1966
        KEDUSAN
        RT 015A
        081226142623
        19
        SUMARNO
        KARANGANYAR/ 24 FEBRUARI 1970
        KEDUSAN
        RT 015B
        085327874790
        20
        JUMASIR, S.Pd, SD
        SRAGEN/ 25 NOVEMBER 1966
        GADING
        RT 016
        085293333588
        21
        SABAR AHMADI
        SRAGEN/ 31 DESEMBER 1959
        TANGGUNG
        RT 017
        081390367053
        22
        TUGIMAN
        SRAGEN/ 26 APRIL 1969
        TANGGUNG
        RT 018
        085878153402
        23
        RAMIDI
        SRAGEN/ 26 NOVEMBER 1974
        TANGGUNG
        RT 019
        085702858158
        Kepala Desa Karangmalang
        SARJONO
        DAFTAR KETUA RUKUN TETANGGA (RT) DESA KARANGMALANG
        KECAMATAN MASARAN KABUPATEN SRAGEN
        MASA BAKTI TAHUN 2023 s/d 2028
        No.
        NAMA
        TTL
        ALAMAT
        JABATAN
        NO HP
         */
        $ketua_rt = [
            [
                'rt' => 'RT 001',
                'nama' => 'JUMARI',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1967-03-10',
                'alamat' => 'BEKON',
                'nohandphone' => '081327383039',
            ],
            [
                'rt' => 'RT 002',
                'nama' => 'Drs.SUPARLAN, M.Pd',
                'tempat_lahir' => 'KARANGANYAR',
                'tanggal_lahir' => '1962-03-03',
                'alamat' => 'KARANGHARJO',
                'nohandphone' => '085876799820',
            ],
            [
                'rt' => 'RT 003',
                'nama' => 'SARIYEM',
                'tempat_lahir' => 'KARANGANYAR',
                'tanggal_lahir' => '1962-08-10',
                'alamat' => 'NGEMPLAK',
                'nohandphone' => '081329545679',
            ],
            [
                'rt' => 'RT 004',
                'nama' => 'SURYANTO',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1972-07-05',
                'alamat' => 'BORONGAN',
                'nohandphone' => '081290066667',
            ],
            [
                'rt' => 'RT 005',
                'nama' => 'TRI WAHYUDI, S.Pd',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1984-12-19',
                'alamat' => 'KARANGNONGKO',
                'nohandphone' => '08562828341',
            ],
            [
                'rt' => 'RT 006',
                'nama' => 'SUMARNO',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1972-07-09',
                'alamat' => 'GUNGAN',
                'nohandphone' => '085727501940',
            ],
            [
                'rt' => 'RT 007A',
                'nama' => 'SUTOMO',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1970-05-12',
                'alamat' => 'SOKOWINATAN',
                'nohandphone' => '085713532057',
            ],
            [
                'rt' => 'RT 007B',
                'nama' => 'SUYADI',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1968-12-31',
                'alamat' => 'SOKOWINATAN',
                'nohandphone' => '085934554886',
            ],
            [
                'rt' => 'RT 008',
                'nama' => 'Drs.SISWO WIDODO',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1967-01-14',
                'alamat' => 'KARANGMALANG',
                'nohandphone' => '085747309505',
            ],
            [
                'rt' => 'RT 009',
                'nama' => 'MULYOTO',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1976-09-13',
                'alamat' => 'KARANGMALANG',
                'nohandphone' => '085213516282',
            ],
            [
                'rt' => 'RT 010',
                'nama' => 'SARJONO',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1965-01-01',
                'alamat' => 'KARANGMALANG',
                'nohandphone' => '081225936877',
            ],
            [
                'rt' => 'RT 011A',
                'nama' => 'SUYATNO',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1957-01-01',
                'alamat' => 'KARANGMALANG',
                'nohandphone' => '085293030108',
            ],
            [
                'rt' => 'RT 011B',
                'nama' => 'JUMADI',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1979-06-15',
                'alamat' => 'KARANGMALANG',
                'nohandphone' => '085641152846',
            ],
            [
                'rt' => 'RT 012A',
                'nama' => 'KASIDI',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1957-08-17',
                'alamat' => 'NGEMPLAKREJO',
                'nohandphone' => '081329152189',
            ],
            [
                'rt' => 'RT 012B',
                'nama' => 'NANANG SURYANTO, SE',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1978-05-12',
                'alamat' => 'NGEMPLAKREJO',
                'nohandphone' => '0816671160',
            ],
            [
                'rt' => 'RT 013',
                'nama' => 'GIYANTO',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1965-12-31',
                'alamat' => 'KETONGGO',
                'nohandphone' => '081225188780',
            ],
            [
                'rt' => 'RT 014',
                'nama' => 'ANWAR WARDOYO',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1968-12-30',
                'alamat' => 'KETONGGO',
                'nohandphone' => '081574147387',
            ],
            [
                'rt' => 'RT 015A',
                'nama' => 'CIPTO SUWARNO',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1966-05-16',
                'alamat' => 'KEDUSAN',
                'nohandphone' => '081226142623',
            ],
            [
                'rt' => 'RT 015B',
                'nama' => 'SUMARNO',
                'tempat_lahir' => 'KARANGANYAR',
                'tanggal_lahir' => '1970-02-24',
                'alamat' => 'KEDUSAN',
                'nohandphone' => '085327874790',
            ],
            [
                'rt' => 'RT 016',
                'nama' => 'JUMASIR, S.Pd, SD',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1966-11-25',
                'alamat' => 'GADING',
                'nohandphone' => '085293333588',
            ],
            [
                'rt' => 'RT 017',
                'nama' => 'SABAR AHMADI',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1959-12-31',
                'alamat' => 'TANGGUNG',
                'nohandphone' => '081390367053',
            ],
            [
                'rt' => 'RT 018',
                'nama' => 'TUGIMAN',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1969-04-26',
                'alamat' => 'TANGGUNG',
                'nohandphone' => '085878153402',
            ],
            [
                'rt' => 'RT 019',
                'nama' => 'RAMIDI',
                'tempat_lahir' => 'SRAGEN',
                'tanggal_lahir' => '1974-11-26',
                'alamat' => 'TANGGUNG',
                'nohandphone' => '085702858158',
            ],
        ];

        foreach ($ketua_rt as $data) {
            KetuaRT::create($data);
        }
    }
}
