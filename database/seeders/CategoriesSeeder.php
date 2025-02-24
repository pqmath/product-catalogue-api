<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['nome' => 'Teclados', 'descricao' => 'Categoria de Teclados']);
        Category::create(['nome' => 'Mesas', 'descricao' => 'Categoria de Mesas']);
        Category::create(['nome' => 'Cadeiras', 'descricao' => 'Categoria de Cadeiras']);

    }
}
