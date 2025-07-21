<?php

namespace App\Repositories\Color;
use App\Models\Color;

class ColorRepository
{
    protected $model;

    public function __construct(Color $model)
    {
        $this->model = $model;
    }

    public function getAll(): \Illuminate\Support\Collection
    {
        return $this->model->all();
    }

    public function findById($id): Color
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): Color
    {
        return $this->model->create($data);
    }

    public function update($id, array $data): void
    {
        $color = $this->findById($id);
        $color->update($data);
    }

    public function delete($id): void
    {
        $color = $this->findById($id);
        $color->delete();
    }
}
