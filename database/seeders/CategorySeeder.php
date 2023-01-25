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
            'id' => 1,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Bebidas';
        Category::create([
            'id' => 2,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Cafe';
        Category::create([
            'id' => 3,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Cereales';
        Category::create([
            'id' => 4,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Condimentos';
        Category::create([
            'id' => 5,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Frutas';
        Category::create([
            'id' => 6,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Galletas';
        Category::create([
            'id' => 7,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Harinas';
        Category::create([
            'id' => 8,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Lacteos';
        Category::create([
            'id' => 9,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Panaderia';
        Category::create([
            'id' => 10,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Pastas';
        Category::create([
            'id' => 11,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Salsas';
        Category::create([
            'id' => 12,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Snacks';
        Category::create([
            'id' => 13,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
        $category = 'Vegetales';
        Category::create([
            'id' => 14,
            'category' => $category,
            'description' => 'test',
            'slug' => Str::slug($category),
            'photo' => 'test',
        ]);
    }
}
