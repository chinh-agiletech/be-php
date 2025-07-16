<?php

namespace App\Services\User;
use App\Models\User;
use App\Repositories\User\userRepository;
use App\Services\BaseServices;
class userService extends BaseServices
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): \Illuminate\Support\Collection
    {
        return $this->repository->getAll();
    }

    public function findById($id): User
    {
        return $this->repository->findById($id);
    }

    public function create(array $data): User
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data): void
    {
        $this->repository->update($id, $data);
    }

    public function delete($id): void
    {
        $this->repository->delete($id);
    }

    protected function getModelClass(): string
    {
        return User::class;
    }
}
