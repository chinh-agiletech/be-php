<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    protected $guarded = [];

    /**
     * Get all products with this color
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
