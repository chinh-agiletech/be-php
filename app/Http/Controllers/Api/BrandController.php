<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use \App\Services\Brand\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    protected $service;
    public function __construct(BrandService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->service->getAll(),
            'message' => 'List of Brands',
        ], 200);
    }

    public function show(string $id)
    {
        $brand = $this->service->findById($id);

        if (!$brand) {
            return response()->json([
                'message' => 'Brand not found',
            ], 404);
        }

        return response()->json([
            'data' => $brand,
            'message' => 'Brand details',
        ], 200);
    }
}
