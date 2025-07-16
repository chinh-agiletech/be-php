<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Get the model class name.
     *
     * @return string
     */
    abstract protected function getModelClass(): string;

    /**
     * Get the resource class name.
     *
     * @return string|null
     */
    protected function getResourceClass(): ?string
    {
        return null;
    }

    /**
     * Get the model instance.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function model()
    {
        return app($this->getModelClass());
    }
}
