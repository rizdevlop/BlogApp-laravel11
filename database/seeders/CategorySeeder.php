<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
        ]);

        Category::create([
            'name' => 'Kesehatan',
            'slug' => 'kesehatan',
        ]);

        Category::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan',
        ]);

        Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
        ]);

        Category::create([
            'name' => 'Kuliner',
            'slug' => 'kuliner',
        ]);

        Category::create([
            'name' => 'Traveling',
            'slug' => 'traveling',
        ]);

        Category::create([
            'name' => 'Keuangan',
            'slug' => 'keuangan',
        ]);

        Category::create([
            'name' => 'Gaya Hidup',
            'slug' => 'gaya-hidup',
        ]);

        Category::create([
            'name' => 'Seni dan Hiburan',
            'slug' => 'seni-dan-hiburan',
        ]);

        Category::create([
            'name' => 'Bisnis',
            'slug' => 'bisnis',
        ]);
    }
}
