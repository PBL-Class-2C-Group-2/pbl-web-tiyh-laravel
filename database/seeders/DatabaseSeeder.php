<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'nip' => '123456789',
            'name' => 'Admin Tambong',
            'alamat' => 'Desa Tambong',
            'email' => 'tambong@tambong.co.id',
            'password' => bcrypt('123456789'),
        ]);
    }
}
