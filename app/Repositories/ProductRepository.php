<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nome',
        'descricao',
        'preco',
        'quantidade',
        'category_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Product::class;
    }

    public function where($column, $value){
        return Product::where($column, $value);
    }

    public function orderBy($column, $direction = 'asc')
    {
        return $this->model->orderBy($column, $direction);
    }
}
