<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = 'Aceite';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Bebidas';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Cafe';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Cereales';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Condimentos';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Frutas';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Galletas';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Harinas';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Lacteos';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Panaderia';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Pastas';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Salsas';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Snacks';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Vegetales';
        Category::create([
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
    }
}
