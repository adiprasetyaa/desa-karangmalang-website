<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('visimisi')->insert([
            'visi' => json_encode([
                "ops" => [
                    [
                        "attributes" => [
                            "italic" => true,
                            "bold" => true
                        ],
                        "insert" => "Terwujudnya Desa Karangmalang sebagai Desa Sejahtera."
                    ],
                    [
                        "insert" => "\nDengan penjelasan sebagai berikut :\nDesa Sejahtera mengandung pengertian bahwa bertekad mensejahterakan rakyat, sesuai dengan Visi Kabupaten Sragen Gerbang Sukowati ( Greget mBangun Sukowati ).\n"
                    ]
                ]
            ]),
            'misi' => json_encode([
                'ops' => [
                    ['insert' => "a. Mewujudkan Pemerintahan yang Bersih, Akuntabel, dan Transparan.\n"],
                    ['insert' => "b. Meningkatkan Kesejahteraan Masyarakat.\n"],
                    ['insert' => "c. Mewujudkan Desa Karangmalang yang beradab dan berakhlak mulia.\n"]
                ]
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
