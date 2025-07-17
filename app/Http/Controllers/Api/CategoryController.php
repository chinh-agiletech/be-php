<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use App\Resources\CategoryResource;
use App\Services\Category\CategoryService;

class CategoryController extends Controller
{

    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->getAll();
        return CategoryResource::collection($categories);
    }

    public function show($id)
    {
        $category = $this->service->findById($id);
        return new CategoryResource($category);
    }

    public function store(Request $request)
    {




        $category = $this->service->create($data);
        return new CategoryResource($category);
    }

    protected function getModelClass(): string
    {
        return \App\Models\Category::class;
    }
}
