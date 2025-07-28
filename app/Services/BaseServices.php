<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

abstract class BaseServices
{
    /**
     * The repository instance.
     *
     * @var mixed
     */
    protected $repository;

    /**
     * Inject repository through the constructor.
     *
     * @param mixed $repository
     */
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get the resource class name.
     *
     * @return string|null
     */
    protected function getResourceClass(): ?string
    {
        return JsonResource::class;
    }

    /**
     * Get all records.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    /**
     * Find by ID.
     *
     * @param int|string $id
     * @return Model|null
     */
    public function findById($id): ?Model
    {
        return $this->repository->findById($id);
    }

    /**
     * Create new record.
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    /**
     * Update record by ID.
     *
     * @param int|string $id
     * @param array $data
     * @return void
     */
    public function update($id, array $data): void
    {
        $this->repository->update($id, $data);
    }

    /**
     * Delete record by ID.
     *
     * @param int|string $id
     * @return void
     */
    public function delete($id): void
    {
        $this->repository->delete($id);
    }

    /**
     * Transform model to resource.
     *
     * @param mixed $data
     * @return JsonResource|mixed
     */
    public function resource($data)
    {
        $resourceClass = $this->getResourceClass();

        if ($resourceClass) {
            return new $resourceClass($data);
        }

        return $data;
    }
}
