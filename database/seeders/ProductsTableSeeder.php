<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Product Name ' . uniqid(date('YmdHis')),
            'description' => 'Descrição do Produto Aqui ' . uniqid(date('YmdHis')),
            'image' => 'filme1.png',
            'price' => 10.2
        ]);
        Product::create([
            'name' => 'Product Name ' . uniqid(date('YmdHis')),
            'description' => 'Descrição do Produto Aqui ' . uniqid(date('YmdHis')),
            'image' => 'filme2.png',
            'price' => 10.2
        ]);
        Product::create([
            'name' => 'Product Name ' . uniqid(date('YmdHis')),
            'description' => 'Descrição do Produto Aqui ' . uniqid(date('YmdHis')),
            'image' => 'filme3.png',
            'price' => 10.2
        ]);
        Product::create([
            'name' => 'Product Name ' . uniqid(date('YmdHis')),
            'description' => 'Descrição do Produto Aqui ' . uniqid(date('YmdHis')),
            'image' => 'filme1.png',
            'price' => 10.2
        ]);
        Product::create([
            'name' => 'Product Name ' . uniqid(date('YmdHis')),
            'description' => 'Descrição do Produto Aqui ' . uniqid(date('YmdHis')),
            'image' => 'filme2.png',
            'price' => 10.2
        ]);
        Product::create([
            'name' => 'Product Name ' . uniqid(date('YmdHis')),
            'description' => 'Descrição do Produto Aqui ' . uniqid(date('YmdHis')),
            'image' => 'filme3.png',
            'price' => 10.2
        ]);
        Product::create([
            'name' => 'Product Name ' . uniqid(date('YmdHis')),
            'description' => 'Descrição do Produto Aqui ' . uniqid(date('YmdHis')),
            'image' => 'filme1.png',
            'price' => 10.2
        ]);
        Product::create([
            'name' => 'Product Name ' . uniqid(date('YmdHis')),
            'description' => 'Descrição do Produto Aqui ' . uniqid(date('YmdHis')),
            'image' => 'filme2.png',
            'price' => 10.2
        ]);
        Product::create([
            'name' => 'Product Name ' . uniqid(date('YmdHis')),
            'description' => 'Descrição do Produto Aqui ' . uniqid(date('YmdHis')),
            'image' => 'filme3.png',
            'price' => 10.2
        ]);
        Product::create([
            'name' => 'Product Name ' . uniqid(date('YmdHis')),
            'description' => 'Descrição do Produto Aqui ' . uniqid(date('YmdHis')),
            'image' => 'filme1.png',
            'price' => 10.2
        ]);
        Product::create([
            'name' => 'Product Name ' . uniqid(date('YmdHis')),
            'description' => 'Descrição do Produto Aqui ' . uniqid(date('YmdHis')),
            'image' => 'filme2.png',
            'price' => 10.2
        ]);
        Product::create([
            'name' => 'Product Name ' . uniqid(date('YmdHis')),
            'description' => 'Descrição do Produto Aqui ' . uniqid(date('YmdHis')),
            'image' => 'filme3.png',
            'price' => 10.2
        ]);
    }
}
