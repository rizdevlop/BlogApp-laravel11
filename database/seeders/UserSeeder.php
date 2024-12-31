<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Riznal Ahya',
            'username' => 'riznalahya',
            'email' => 'riznal.ahya@example.com',
            'password' => Hash::make('password123'),
            'role' => 'Admin',
            'status' => 'active',
            'pekerjaan' => 'Admin Blog App Laravel 11'
        ]);

        User::create([
            'name' => 'Siti Rahmawati',
            'username' => 'sitirahma',
            'email' => 'siti.rahma@example.com',
            'password' => Hash::make('password'),
            'role' => 'Admin',
            'status' => 'active',
            'pekerjaan' => 'Admin Blog App Laravel 11'
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'username' => 'budisantoso',
            'email' => 'budi.santoso@example.com',
            'password' => Hash::make('password'),
            'role' => 'User',
            'status' => 'active',
            'pekerjaan' => 'Koruptor 300T dihukum 6.5th'
        ]);

        User::create([
            'name' => 'Dewi Lestari',
            'username' => 'dewilestari',
            'email' => 'dewi.lestari@example.com',
            'password' => Hash::make('password'),
            'role' => 'User',
            'status' => 'active',
            'pekerjaan' => 'Koruptor akan saya buru sampai ke antartika'
        ]);

        User::create([
            'name' => 'Ahmad Fauzan',
            'username' => 'ahmadfauzan',
            'email' => 'ahmad.fauzan@example.com',
            'password' => Hash::make('password'),
            'role' => 'User',
            'status' => 'active',
            'pekerjaan' => 'Anak mantan presiden jadi wapres'
        ]);

        User::create([
            'name' => 'Ratna Sari',
            'username' => 'ratnasari',
            'email' => 'ratna.sari@example.com',
            'password' => Hash::make('password'),
            'role' => 'User',
            'status' => 'active',
            'pekerjaan' => 'PPN Naik 12 persen'
        ]);

        User::create([
            'name' => 'Rudi Hartono',
            'username' => 'rudihartono',
            'email' => 'rudi.hartono@example.com',
            'password' => Hash::make('password'),
            'role' => 'User',
            'status' => 'active',
            'pekerjaan' => 'Negara rendah UMR'
        ]);

        User::create([
            'name' => 'Yulianti Putri',
            'username' => 'yuliantiputri',
            'email' => 'yulianti.putri@example.com',
            'password' => Hash::make('password'),
            'role' => 'User',
            'status' => 'active',
            'pekerjaan' => 'Negara upah kerja minim'
        ]);

        User::create([
            'name' => 'Fajar Hidayat',
            'username' => 'fajarhidayat',
            'email' => 'fajar.hidayat@example.com',
            'password' => Hash::make('password'),
            'role' => 'User',
            'status' => 'active',
            'pekerjaan' => 'Mentriku adalah admin slot'
        ]);

        User::create([
            'name' => 'Nina Marlina',
            'username' => 'ninamarlina',
            'email' => 'nina.marlina@example.com',
            'password' => Hash::make('password'),
            'role' => 'User',
            'status' => 'inactive',
            'pekerjaan' => 'Adol es teh dipisuhi miftah'
        ]);
    }
}
