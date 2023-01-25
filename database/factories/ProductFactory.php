<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->name();
        return [
            'category_id' => rand(1, 25),
            'title' => $title,
            'description' => $this->faker->text(),
            'slug' => Str::slug($title),
            'photo_main_product' => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}
