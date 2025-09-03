<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseRepository
{
    /**
     * Lấy tên class model.
     */
    abstract protected function modelClass(): string;

    /**
     * Lấy tên class resource.
     */
    abstract protected function resourceClass(): string;

    /**
     * Khởi tạo model instance.
     */
    public function model(): Model
    {
        $class = $this->modelClass();
        return new $class;
    }

    /**
     * Lấy toàn bộ record.
     */
    public function all(): Collection
    {
        return $this->model()->newQuery()->get();
    }

    /**
     * Tìm record theo ID.
     */
    public function find(int $id): ?Model
    {
        return $this->model()->newQuery()->find($id);
    }

    /**
     * Tạo record mới.
     */
    public function create(array $data): Model
    {
        return $this->model()->newQuery()->create($data);
    }

    /**
     * Cập nhật record.
     */
    public function update(int $id, array $data): bool
    {
        $record = $this->find($id);
        return $record ? $record->update($data) : false;
    }

    /**
     * Xóa record.
     */
    public function delete(int $id): bool
    {
        $record = $this->find($id);
        return $record ? (bool) $record->delete() : false;
    }

    /**
     * Convert dữ liệu sang resource.
     */
    public function resource($data): JsonResource
    {
        $resource = $this->resourceClass();

        if ($data instanceof Collection || is_array($data)) {
            return $resource::collection($data);
        }

        return new $resource($data);
    }
}
