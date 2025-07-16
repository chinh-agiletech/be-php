<?php

namespace App\Repositories\User;
use App\Repositories\BaseRepository;
use App\Models\User;
class userRepository extends BaseRepository
{
    /**
     * Get the model class name.
     *
     * @return string
     */
    protected  $model;
    public function __contruct()
    {
        $this->model = User::class;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $user = $this->model->find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function delete($id): void
    {
        $user = $this->model->find($id);
        $user->delete();
    }

    public function findById(int|string $id)
    {
        return $this->model->find($id);
    }
}
