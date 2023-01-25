<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ACEITES
        $title = 'Aceite de Oliva Extra Virgen Artesano 500ml';
        Product::create([
            'category_id' => 1,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Aceite de Oliva Extra Virgen Capri 500 ml';
        Product::create([
            'category_id' => 1,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Aceite de Oliva Extra Virgen Carbonell Arbaquina 1L';
        Product::create([
            'category_id' => 1,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Aceite de Oliva Extra Virgen Gallo 500ml';
        Product::create([
            'category_id' => 1,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Aceite de Oliva Extra Virgen Serrata 750ml';
        Product::create([
            'category_id' => 1,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Aceite de Soya Corcovado 900cm³';
        Product::create([
            'category_id' => 1,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Aceite de Soya Vatel 1L';
        Product::create([
            'category_id' => 1,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Aceite de Soya Vatel 500ml';
        Product::create([
            'category_id' => 1,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Aceite Mazeite de 1L';
        Product::create([
            'category_id' => 1,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Aceite Vegetal Vatel 1L';
        Product::create([
            'category_id' => 1,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);

        // Bebidas
        $title = '7 Up de Lata con Sabor a Limón 355ml';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = '7up 2L';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Agua Minalba 355ml';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Agua Mineral Vida Activa 600ml';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Agua Potable Aguafiel 5L';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Bebida Energética Sin Azúcar Zero Ultra Monster 473ml';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Coca Cola Sabor Ligero 2L';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Coca Cola Sabor Original 1L';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Coca Cola Sabor Original Menos Calorías 2L';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Coca Cola Zero Azúcar 355ml';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Frescolita Sin Calorias 1L';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Gatorade Mandarina 500cm³';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Gatorade Mandarina 500cm³';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Glup Cola 2L';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Jugo de Durazno Yukery 500ml';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Malta Sin Alcohol Maltin Polar 1.5L';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pepsi Cola Lata 355ml';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pepsi Light 2L';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pepsi Light Lata 355ml';
        Product::create([
            'category_id' => 2,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Té Helado con Sabor a Limón Arizona 340ml';
        Product::create([
            'category_id' => 1,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        // Cafe
        $title = 'Café Amanecer 250g';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Cafe Amanecer Gourmet 200g';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Cafe Amanecer Gourmet 500g';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Café Gourmet Della Nonna 200g.';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Cafe Gourmet Molido Arauca 200g';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Cafe Gourmet Molido Bel 250g';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Café Gourmet San Domingo 250g';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Café Gourmet San Domingo 500g';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Café Madrid 250g';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Café Molido Gourmet San Salvador 500g';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Café Tostado Molido Gourmet Amarello 200g';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Capsulas Nespresso Cremoso Intensidad 8 Espresso Italia 10 Und';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Capsulas Nespresso Forte Intensidad 12 Espresso Italia 10 Und';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Capsulas Nespresso Ristretto Intensidad 11 Espresso Italia 20 Und';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Capsulas Nespresso Tierras de Colombia Intensidad 9 Espresso Italia 20 Und';
        Product::create([
            'category_id' => 3,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        // Cereales
        $title = 'Avelina Hojuelas Fortificada 400gr';
        Product::create([
            'category_id' => 4,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Avena En Hojuelas Instantanea Avelina 800g';
        Product::create([
            'category_id' => 4,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Avena en Hojuelas Vizcaya 200g';
        Product::create([
            'category_id' => 4,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Cereal Avena Aros Canela Maizoritos 200g';
        Product::create([
            'category_id' => 4,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Cereal Choko Crispy Vene Pan 300g';
        Product::create([
            'category_id' => 4,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Cereal Mega Aros Miel Tu Cereal 240g';
        Product::create([
            'category_id' => 4,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Cereal Tamaño Familiar Cap\'n Crunch Berries 582g';
        Product::create([
            'category_id' => 4,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Corn Flakes de Kelloggs 230g';
        Product::create([
            'category_id' => 4,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Mega Bol Chocolate Tu Cereal 240g';
        Product::create([
            'category_id' => 4,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        // Condimentos
        // $title = 'Aceite';
        // Product::create([
        //     'category_id' => 5,
        //     'title' => $title,
        //     'description' => $title,
        //     'slug' => Str::slug($title),
        //     'photo_main_product' => 'test',
        // ]);
        // Frutas
        $title = 'Cambur';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Cocos';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Durazno';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Fresas';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Guayaba';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Limon';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Manzana roja';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Manzana verde';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Melon';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Moras';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Naranja';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Patilla';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Piña';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Uvas verdes';
        Product::create([
            'category_id' => 6,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        // Galletas
        $title = 'Barra de Avena y Miel Nature Valley 42g';
        Product::create([
            'category_id' => 7,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Cocosette Nesttle 4und';
        Product::create([
            'category_id' => 7,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Galleta Club Social Original 6 Und';
        Product::create([
            'category_id' => 7,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Galleta de Soda Puig 240g';
        Product::create([
            'category_id' => 7,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Galleta Oreo Chocolate 36g 6 Und';
        Product::create([
            'category_id' => 7,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Galletas Avena con Chocolate Davu 68g';
        Product::create([
            'category_id' => 7,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Galletas Belvita Kraker Bran 9und';
        Product::create([
            'category_id' => 7,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Galletas Chips Ahoy 168g';
        Product::create([
            'category_id' => 7,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Galletas Oreo Tipo Americano 108g';
        Product::create([
            'category_id' => 7,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        // Harinas
        $title = 'Empanizados Maizina Americana 80g';
        Product::create([
            'category_id' => 8,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Harina de Plátano Saneta 400g';
        Product::create([
            'category_id' => 8,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Harina Integral de Maíz Blanco Precocida Maizkel 1Kg';
        Product::create([
            'category_id' => 8,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Harina Maiz Amarillo Pan 1Kg';
        Product::create([
            'category_id' => 8,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Harina Maiz Blanco Pan 1kg';
        Product::create([
            'category_id' => 8,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Harina Maiz Blanco y Arroz Pan 1Kg';
        Product::create([
            'category_id' => 8,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Harina Multiuso Libre de Gluten Kelin 400g';
        Product::create([
            'category_id' => 8,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Harina para Cachapas Pan 500g';
        Product::create([
            'category_id' => 8,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Maizina Americana 400g';
        Product::create([
            'category_id' => 8,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Maizkel con Arroz Kel 500g';
        Product::create([
            'category_id' => 8,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        // Lacteos
        $title = 'Leche Completa UHT Purisima 1L';
        Product::create([
            'category_id' => 9,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Leche Descremada Deslactosada UHT Purisima 1L';
        Product::create([
            'category_id' => 9,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Leche Descremada Esterilizada Light UHT San Simon 1L';
        Product::create([
            'category_id' => 9,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Leche Descremada UHT Mi Vaca 1L';
        Product::create([
            'category_id' => 9,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Leche Descremada UHT Purisima 1L';
        Product::create([
            'category_id' => 9,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Leche en Polvo Completa San Simón 125g';
        Product::create([
            'category_id' => 9,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Leche en Polvo Completa San Simon 900g';
        Product::create([
            'category_id' => 9,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Leche Entera Carabobo UHT 1L';
        Product::create([
            'category_id' => 9,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'PediaSure Sabor Vainilla Abbott 400g';
        Product::create([
            'category_id' => 9,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        // Panaderia
        // $title = 'Aceite';
        // Product::create([
        //     'category_id' => 10,
        //     'title' => $title,
        //     'description' => $title,
        //     'slug' => Str::slug($title),
        //     'photo_main_product' => 'test',
        // ]);
        // Pastas
        $title = 'Farfalle Barilla 500g';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Capelli D´angelo Trattoría 400g';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Fusilli con Guisante N#34 De Cecco 250g';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Integral Penne Rigate N# 20 La Molisana 500g';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Larga Vermicelli Fino Capri 500g';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Linguine Gluten Free N#7 De Cecco 400g';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Linguini Premium Mary 500g';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Orecchiette Baresi Dedicato N.90 Granoro 500g';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Organica de Maiz y Arroz Dakota Growers 340g';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Penne Rigate N#20 La Molisana 400g';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Plumitas Primor 1 Kg';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Premium Ditali Sindoni 1Kg';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Rigatoni Capri 1Kg';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Spaghetti Ristoranti N#14 Granoro 500g';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Vermicelli Superior Mary 1Kg';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta Vermicelli Tradicional Mary 1kg';
        Product::create([
            'category_id' => 11,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        // Salsas
        $title = 'Mayonesa Clásica Hellmann\'s 190g';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Mayonesa Kraft 445g';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Mayonesa Mavesa 445g';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Mostaza Preparada Heinz 490g';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pasta de Tomate Member´s Mark 170g';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Salsa Chili Extra Picante Heinz 150ml';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Salsa De Ajo Iberia 300ml';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Salsa de Soya Baja en Sal Yamasa 148ml';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Salsa De Soya Iberia 300ml';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Salsa de Soya Raquel 300ml';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Salsa de Tomate Ketchup Heinz 397g';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Salsa de Tomate Ketchup Tiquire Flores 397g';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Salsa Pesto Coffee Market 230g';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Salsa Tradicional Italiana Prego 1.28 Kg';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Sriracha Mayo Kikkoman 226g';
        Product::create([
            'category_id' => 12,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        // Snacks
        // $title = 'Aceite';
        // Product::create([
        //     'category_id' => 13,
        //     'title' => $title,
        //     'description' => $title,
        //     'slug' => Str::slug($title),
        //     'photo_main_product' => 'test',
        // ]);
        // Vegetales
        $title = 'Aguacate';
        Product::create([
            'category_id' => 14,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Ajos';
        Product::create([
            'category_id' => 14,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Brocoli';
        Product::create([
            'category_id' => 14,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Jojoto';
        Product::create([
            'category_id' => 14,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Papas';
        Product::create([
            'category_id' => 14,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pepinos';
        Product::create([
            'category_id' => 14,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Pimenton';
        Product::create([
            'category_id' => 14,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Platanos';
        Product::create([
            'category_id' => 14,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Repollo';
        Product::create([
            'category_id' => 14,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Tomates';
        Product::create([
            'category_id' => 14,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
        $title = 'Zanahorias';
        Product::create([
            'category_id' => 14,
            'title' => $title,
            'description' => $title,
            'slug' => Str::slug($title),
            'photo_main_product' => 'test',
        ]);
    }
}
