<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Widodo',
            'username' => 'admin',
            'email' => 'admin@terminalbmd.com',
            'password' => Hash::make('adminterminalbmd'),
            'role' => 'admin',
        ]);

        // Pegawai user
        User::create([
            'name' => 'Pegawai',
            'username' => 'pegawai',
            'email' => 'pegawai@terminalbmd.com',
            'password' => Hash::make('pegawaiterminalbmd'),
            'role' => 'pegawai',
        ]);
    }
}
