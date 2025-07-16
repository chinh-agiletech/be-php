<?php

namespace App\Services\User;
use App\Services\BaseServices;
class userService extends BaseServices
{
    /**
     * Get the model class name.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return \App\Models\User::class;
    }

    /**
     * Get the resource class name.
     *
     * @return string
     */
    protected function getResourceClass(): string
    {
        return \App\Http\Resources\UserResource::class;
    }
}
