<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create admin
        $admin = User::create([
            'name' => 'KKN185UNS',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $krgmalang = User::create([
            'name' => 'Admin',
            'email' => 'desakarangmalangmasaran@gmail.com',
            'password' => bcrypt('password'),
        ]);

            // grant role as superadmin
        $admin->addRole('administrator');
        $krgmalang->addRole('administrator');
    }
}
