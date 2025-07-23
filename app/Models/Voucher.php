<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Voucher extends Model
{
    protected $guarded = [];

    /**
     * Get all products related to this voucher
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
