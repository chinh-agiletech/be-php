<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Size extends Model
{
    protected $guarded = [];

    /**
     * Get all products with this size
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
