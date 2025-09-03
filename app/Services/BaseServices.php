<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseServices
{
    protected BaseRepository $repository;

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Trả về tên class Resource (override nếu cần).
     */
    protected function getResourceClass(): ?string
    {
        return JsonResource::class;
    }

    public function getAll(): Collection
    {
        return $this->repository->all();
    }

    public function findById(int|string $id): ?Model
    {
        return $this->repository->find($id);
    }

    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    public function update(int|string $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int|string $id): bool
    {
        return $this->repository->delete($id);
    }

    /**
     * Convert data sang Resource (nếu có).
     */
    public function resource($data)
    {
        $resourceClass = $this->getResourceClass();

        if ($resourceClass) {
            if ($data instanceof Collection || is_array($data)) {
                return $resourceClass::collection($data);
            }
            return new $resourceClass($data);
        }

        return $data;
    }
}
