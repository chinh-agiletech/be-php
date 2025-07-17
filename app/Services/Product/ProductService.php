<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;
use App\Services\BaseServices;

class ProductService extends BaseServices
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function findById($id)
    {
        return $this->repository->getById($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id): void
    {
        $this->repository->delete($id);
    }

    protected function getModelClass(): string
    {
        // TODO: Implement getModelClass() method.
    }
}
