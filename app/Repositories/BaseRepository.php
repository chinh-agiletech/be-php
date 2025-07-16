<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BaseRepository {
    /**
     * Get the model class name.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }

    /**
     * Get the resource class name.
     *
     * @return string
     */
    protected function getResourceClass(): string
    {
        return JsonResource::class;
    }

    /**
     * Get the model instance.
     *
     * @return Model
     */
    public function model(): Model
    {
        return app($this->getModelClass());
    }

    /**
     * Get the resource instance.
     *
     * @param mixed $data
     * @return JsonResource
     */
    public function resource($data): JsonResource
    {
        return app($this->getResourceClass(), ['resource' => $data]);
    }
}
