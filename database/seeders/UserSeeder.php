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
            'name' => 'Andi Surya',
            'username' => 'andisurya',
            'email' => 'andi.surya@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Siti Rahmawati',
            'username' => 'sitirahma',
            'email' => 'siti.rahma@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'username' => 'budisantoso',
            'email' => 'budi.santoso@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Dewi Lestari',
            'username' => 'dewilestari',
            'email' => 'dewi.lestari@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Ahmad Fauzan',
            'username' => 'ahmadfauzan',
            'email' => 'ahmad.fauzan@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Ratna Sari',
            'username' => 'ratnasari',
            'email' => 'ratna.sari@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Rudi Hartono',
            'username' => 'rudihartono',
            'email' => 'rudi.hartono@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Yulianti Putri',
            'username' => 'yuliantiputri',
            'email' => 'yulianti.putri@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Fajar Hidayat',
            'username' => 'fajarhidayat',
            'email' => 'fajar.hidayat@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Nina Marlina',
            'username' => 'ninamarlina',
            'email' => 'nina.marlina@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
