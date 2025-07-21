<?php

namespace App\Repositories\Size;

use App\Repositories\BaseRepository;
use App\Models\Size;

class SizeRepository extends BaseRepository
{
    protected $model;
    public function __construct(Size $model)
    {
        $this->model = $model;
    }

    protected function getModelClass(): string
    {
        return Size::class;
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
