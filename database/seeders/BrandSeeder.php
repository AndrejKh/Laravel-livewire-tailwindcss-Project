<?php

namespace Database\Seeders;

use App\Models\AddressBrands;
use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand1 = 'Supermarket General';
        Brand::create([
            'id' => 1,
            'brand' => $brand1,
            'user_id' => 2,
            'slug' => Str::slug($brand1),
        ]);
        AddressBrands::create([
            'brand_id' => 1,
            'state_id' => rand(1, 20),
            'city_id' => rand(1, 20),
        ]);

        $brand2 = 'Supermarket Principal';
        Brand::create([
            'id' => 2,
            'brand' => $brand2,
            'user_id' => 3,
            'slug' => Str::slug($brand2),
        ]);
        AddressBrands::create([
            'brand_id' => 2,
            'state_id' => rand(1, 20),
            'city_id' => rand(1, 20),
        ]);

        $brand3 = 'Supermarket Total';
        Brand::create([
            'id' => 3,
            'brand' => $brand3,
            'user_id' => 4,
            'slug' => Str::slug($brand3),
        ]);
        AddressBrands::create([
            'brand_id' => 3,
            'state_id' => rand(1, 20),
            'city_id' => rand(1, 20),
        ]);

        $brand4 = 'Abasto General';
        Brand::create([
            'id' => 4,
            'brand' => $brand4,
            'user_id' => 5,
            'slug' => Str::slug($brand4),
        ]);
        AddressBrands::create([
            'brand_id' => 4,
            'state_id' => rand(1, 20),
            'city_id' => rand(1, 20),
        ]);

        $brand5 = 'Abasto Principal';
        Brand::create([
            'id' => 5,
            'brand' => $brand5,
            'user_id' => 6,
            'slug' => Str::slug($brand5),
        ]);
        AddressBrands::create([
            'brand_id' => 5,
            'state_id' => rand(1, 20),
            'city_id' => rand(1, 20),
        ]);

        $brand6 = 'Abasto Total';
        Brand::create([
            'id' => 6,
            'brand' => $brand6,
            'user_id' => 7,
            'slug' => Str::slug($brand6),
        ]);
        AddressBrands::create([
            'brand_id' => 6,
            'state_id' => rand(1, 20),
            'city_id' => rand(1, 20),
        ]);

    }
}
