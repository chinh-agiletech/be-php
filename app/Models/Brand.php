<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name_brand',
    ];

    /**
     * Get all products that belong to the brand
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
