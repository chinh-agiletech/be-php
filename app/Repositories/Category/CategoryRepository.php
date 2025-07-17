<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $category = $this->model->find($id);
        if ($category) {
            $category->update($data);
            return $category;
        }
        return null;
    }

    public function delete($id): void
    {
        $category = $this->model->find($id);
        if ($category) {
            $category->delete();
        }
    }
}
