<?php

namespace App\Services\Color;
use App\Repositories\Color;
use App\Repositories\Color\ColorRepository;
use App\Services\BaseServices;

class ColorService extends BaseServices
{
    protected $repository;

    public function __construct(ColorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): \Illuminate\Support\Collection
    {
        return $this->repository->getAll();
    }

    public function findById($id): ?\Illuminate\Database\Eloquent\Model
    {
        return $this->repository->findById($id);
    }

    public function create(array $data): \Illuminate\Database\Eloquent\Model
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
}
