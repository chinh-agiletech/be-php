<?php

namespace App\Services\Brand;
use App\Services\BaseServices;
use App\Repositories\Brand\BrandRepository;

class BrandService extends BaseServices
{

    protected $repository;

    public function __construct(BrandRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): \Illuminate\Support\Collection
    {
        return $this->repository->getBrand();
    }

    public function findById($id): \App\Models\Brand
    {
        return $this->repository->getBrandById($id);
    }
}
