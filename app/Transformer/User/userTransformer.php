<?php

namespace App\Transformers\User;

use App\Transformers\BaseTransformer;

class userTransformer extends BaseTransformer
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
}
