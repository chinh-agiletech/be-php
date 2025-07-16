<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\userService;
use App\Resources\UserResource;
class UserController extends Controller
{
    protected $sevices;

    public function __construct()
    {
        $this->sevices = new userService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->sevices->getAll();
        return UserResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
