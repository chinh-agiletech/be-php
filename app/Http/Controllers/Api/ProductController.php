<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json($this->service->getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        return response()->json(
            $this->service->create($request->validated()),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->service->findById($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = $this->service->findById($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $this->service->update($id, $request->all());
        return response()->json(['message' => 'Product updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->service->findById($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $this->service->delete($id);
        return response()->json(['message' => 'Product deleted successfully'], 204);
    }


}
