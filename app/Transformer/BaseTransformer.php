<?php

namespace App\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;

class BaseTransformer {
    /**
     * Get the model class name.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return Str::replaceLast('Transformer', '', (new ReflectionClass($this))->getName());
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
     * Create a new resource instance.
     *
     * @param mixed $data
     * @return JsonResource
     */
    public function resource($data): JsonResource
    {
        return app($this->getResourceClass(), ['resource' => $data]);
    }
}
