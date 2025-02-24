<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'nome' => 'Teclado Mars',
            'descricao' => 'Teclado mecanico gamer HyperX Mars',
            'preco' => '450',
            'quantidade' => '10',
            'category_id' => '1',
        ]);

        Product::create([
            'nome' => 'Mesa em L',
            'descricao' => 'Mesa em L, perfeita para garantir multitasks',
            'preco' => '1200',
            'quantidade' => '5',
            'category_id' => '2',
        ]);

        Product::create([
            'nome' => 'Cadeira de escritorio',
            'descricao' => 'Cadeira ergonomica de escritorio',
            'preco' => '900',
            'quantidade' => '5',
            'category_id' => '3',
        ]);

    }
}
