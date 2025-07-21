<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
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

    public function store(CreateCategoryRequest $request)
    {
        $category = $this->service->create($request->all());
        return new CategoryResource($category);
    }

    public function update(CreateCategoryRequest $request, $id)
    {
        $this->service->update($id, $request->all());
        return response()->json(['message' => 'Category updated successfully'], 200);
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Category deleted successfully'], 204);
    }
}
