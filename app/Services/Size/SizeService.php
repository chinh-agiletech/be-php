<?php

namespace App\Services\Size;

use App\Repositories\Size\SizeRepository;
use App\Services\BaseServices;

class SizeService extends BaseServices
{
    protected $repository;

    public function __construct(SizeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): \Illuminate\Support\Collection
    {
        return $this->repository->getAll();
    }

    protected function getModelClass(): string
    {
        // TODO: Implement getModelClass() method.
    }
}
