<?php

namespace Database\Seeders;

use App\Models\TentangKami;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(LaratrustSeeder::class);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(SuperAdminSeeder::class); // superadmin
        $this->call(AdminSeeder::class); // administrator
        $this->call(KadesAsOf2024Seeder::class); // kades
        $this->call(LembagaDesaAsOf2024Seeder::class); // lemdes
        $this->call(CategorySeeder::class);
        $this->call(TentangKamiSeeder::class);
        $this->call(VisiMisiSeeder::class);
        
    }
}
