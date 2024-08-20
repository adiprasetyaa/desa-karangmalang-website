<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangKamiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tentang_kami')->insert([
            'description' => 'Pemerintah Desa Karangmalang senantiasa berupaya memberikan pelayanan terbaik bagi masyarakat. Kami hadir untuk memenuhi kebutuhan masyarakat, baik dalam hal administrasi, pembangunan, maupun pemberdayaan masyarakat. Dengan transparansi dan akuntabilitas yang tinggi, kami berkomitmen untuk mewujudkan pemerintahan yang bersih dan melayani.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
