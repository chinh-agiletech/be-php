<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

abstract class BaseServices
{
    /**
     * Get the model class name.
     *
     * @return string
     */
    abstract protected function getModelClass(): string;

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
        return $this->model()->newQuery()->get();
    }

    /**
     * Find by ID.
     *
     * @param int|string $id
     * @return Model|null
     */
    public function findById($id): ?Model
    {
        return $this->model()->find($id);
    }

    /**
     * Create new record.
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model()->create($data);
    }

    /**
     * Update record by ID.
     *
     * @param int|string $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data): void
    {
        $model = $this->findById($id);

        if ($model) {
            $model->update($data);
        }
    }
    /**
     * Delete record by ID.
     *
     * @param int|string $id
     * @return bool
     */
    public function delete($id): void
    {
        $model = $this->findById($id);

        if ($model) {
            $model->delete();
        }
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
