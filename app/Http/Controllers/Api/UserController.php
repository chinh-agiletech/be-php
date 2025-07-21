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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = $this->sevices->create($data);

        return response()->json([
            'message' => 'User created successfully',
            'user' => UserResource::toArray($user)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->sevices->findById($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): void
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|required|string|min:8|confirmed',
        ]);

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user = $this->sevices->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->sevices->findById($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $this->sevices->delete($id);

        return response()->json(['message' => 'User deleted successfully']);
    }
}
