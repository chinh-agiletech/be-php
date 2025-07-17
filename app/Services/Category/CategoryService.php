<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Services\BaseServices;
use Illuminate\Http\Request;

class CategoryService extends BaseServices
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function all(){
        return $this->categoryRepository->getAll();
    }

    public function findById($id): Category
    {
        return $this->categoryRepository->getById($id);
    }

    public function create($data): Category
    {
        return $this->categoryRepository->create($data);
    }

    public function update($id, $data): void
    {
        $this->categoryRepository->update($id, $data);
    }

    public function delete($id): void
    {
        $this->categoryRepository->delete($id);
    }

    /**
     * Get the model class name.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return \App\Models\Category::class;
    }

}
