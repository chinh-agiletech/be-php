<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Color\ColorService;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    protected $service;
    public function __construct(ColorService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->getAll();
    }

}
