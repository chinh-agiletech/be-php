<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    protected $guarded = [];

    /**
     * The relationships that should be eager loaded.
     *
     * @var array
     */
    protected $with = ['sizes', 'colors'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['formatted_sizes', 'formatted_colors'];

    /**
     * Get the category that owns the product
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all colors for the product
     */
    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class);
    }

    /**
     * Get all sizes for the product
     */
    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class);
    }

    /**
     * Get all vouchers for the product
     */
    public function vouchers(): BelongsToMany
    {
        return $this->belongsToMany(Voucher::class);
    }

    /**
     * Get formatted sizes attribute
     */
    protected function formattedSizes(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->sizes->pluck('name');
            },
        );
    }

    /**
     * Get formatted colors attribute
     */
    protected function formattedColors(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->colors->pluck('name');
            },
        );
    }

    /**
     * Scope a query to include sizes with product.
     */
    public function scopeWithSizes($query)
    {
        return $query->with('sizes');
    }

    /**
     * Scope a query to include colors with product.
     */
    public function scopeWithColors($query)
    {
        return $query->with('colors');
    }
}
