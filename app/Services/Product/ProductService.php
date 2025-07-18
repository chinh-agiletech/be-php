<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use App\Services\BaseServices;

class ProductService extends BaseServices
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): \Illuminate\Support\Collection
    {
        return $this->repository->getAll();
    }

    public function findById($id): Product
    {
        return $this->repository->getById($id);
    }

    public function create(array $data): Product
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data): void
    {
        $this->repository->update($id, $data);
    }

    public function delete($id): void
    {
        $this->repository->delete($id);
    }

    protected function getModelClass(): string
    {
        return Product::class;
    }
}
