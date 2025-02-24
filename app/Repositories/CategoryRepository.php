<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nome',
        'descricao'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Category::class;
    }

    public function orderBy($column, $direction = 'asc')
    {
        return $this->model->orderBy($column, $direction);
      }
}
