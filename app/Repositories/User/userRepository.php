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
}
