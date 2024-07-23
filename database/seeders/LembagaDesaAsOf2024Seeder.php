<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LembagaDesaAsOf2024Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            LembagaDesaAsOf2024\BPDSeeder::class,
            LembagaDesaAsOf2024\BUMDESSeeder::class,
            LembagaDesaAsOf2024\KetuaRTSeeder::class,
            LembagaDesaAsOf2024\LinmasSeeder::class,
            LembagaDesaAsOf2024\LKDSeeder::class,
            LembagaDesaAsOf2024\LPMDSeeder::class,
            LembagaDesaAsOf2024\PerangkatDesaSeeder::class,
            LembagaDesaAsOf2024\SPMDESSeeder::class,

        ]);
    }
}
