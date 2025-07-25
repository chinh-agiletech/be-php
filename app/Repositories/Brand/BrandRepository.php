<?php

namespace App\Repositories\Brand;

use App\Models\Brand;
use App\Repositories\BaseRepository;

class BrandRepository extends BaseRepository
{
    protected $model;
    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

    public function getBrand()
    {
        return $this->model->all();
    }

    public function getBrandById($id)
    {
        return $this->model->find($id);
    }
}
