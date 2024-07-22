<?php

namespace Database\Seeders;

use App\Models\Kades;
use App\Models\KadesPeriode;
use App\Models\People;
use App\Models\Periode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KadesAsOf2024 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // table people
        $people = [
            ['name' => 'Noto Karsono',], //1946 - 1988
            ['name' => 'Jumadi AP',], // 1988 - 1993
            ['name' => 'Sunarto Noto Yuwono',], // 1993 - 2007
            ['name' => 'Sarjono',], // 2007 - 2013 & 2019 - 2024
            ['name' => 'Suyamto',], // 2013 - 2019
        ];

        $noto_karsono = People::create($people[0]);
        $jumadi_ap = People::create($people[1]);
        $sunarto_noto_yuwono = People::create($people[2]);
        $sarjono = People::create($people[3]);
        $suyamto = People::create($people[4]);

        
        // table periode
        $periode = [
            ['name' => 'Kades Periode 1946 - 1988', 'start_at' => '1946-01-01', 'end_at' => '1988-12-31'],
            ['name' => 'Kades Periode 1988 - 1993', 'start_at' => '1988-01-01', 'end_at' => '1993-12-31'],
            ['name' => 'Kades Periode 1993 - 2007', 'start_at' => '1993-01-01', 'end_at' => '2007-12-31'],
            ['name' => 'Kades Periode 2007 - 2013', 'start_at' => '2007-01-01', 'end_at' => '2013-12-31'],
            ['name' => 'Kades Periode 2013 - 2019', 'start_at' => '2013-01-01', 'end_at' => '2019-12-31'],
            ['name' => 'Kades Periode 2019 - 2024', 'start_at' => '2019-01-01', 'end_at' => '2024-12-31'],
        ];

        foreach ($periode as $p) {
            Periode::create($p);
        }

        // Tambah kades
        $kades = [
            ['people_id' => $noto_karsono->id],
            ['people_id' => $jumadi_ap->id],
            ['people_id' => $sunarto_noto_yuwono->id],
            ['people_id' => $sarjono->id],
            ['people_id' => $suyamto->id],
        ];

        foreach ($kades as $k) {
            Kades::create($k);
        }

        // table kades_periode
        $kades_periode = [
            ['kades_id' => $noto_karsono->id, 'periode_id' => 1],
            ['kades_id' => $jumadi_ap->id, 'periode_id' => 2],
            ['kades_id' => $sunarto_noto_yuwono->id, 'periode_id' => 3],
            ['kades_id' => $sarjono->id, 'periode_id' => 4],
            ['kades_id' => $suyamto->id, 'periode_id' => 5],
            ['kades_id' => $sarjono->id, 'periode_id' => 6],
        ];

        foreach ($kades_periode as $kp) {
            KadesPeriode::create($kp);
        }

        
    }
}
