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
            'color' => 'blue',
        ]);

        Category::create([
            'name' => 'Kesehatan',
            'slug' => 'kesehatan',
            'color' => 'green', 
        ]);

        Category::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan',
            'color' => 'yellow', 
        ]);

        Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
            'color' => 'orange', 
        ]);

        Category::create([
            'name' => 'Kuliner',
            'slug' => 'kuliner',
            'color' => 'red', 
        ]);

        Category::create([
            'name' => 'Traveling',
            'slug' => 'traveling',
            'color' => 'teal', 
        ]);

        Category::create([
            'name' => 'Keuangan',
            'slug' => 'keuangan',
            'color' => 'purple', 
        ]);

        Category::create([
            'name' => 'Gaya Hidup',
            'slug' => 'gaya-hidup',
            'color' => 'cyan', 
        ]);

        Category::create([
            'name' => 'Seni dan Hiburan',
            'slug' => 'seni-dan-hiburan',
            'color' => 'pink', 
        ]);

        Category::create([
            'name' => 'Bisnis',
            'slug' => 'bisnis',
            'color' => 'indigo', 
        ]);
    }
}
