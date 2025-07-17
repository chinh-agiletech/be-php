<?php

namespace App\Resources;

class CategoryResource{
    /**
     * Transform the category data into a resource array.
     *
     * @param  \App\Models\Category  $category
     * @return array
     */
    public static function toArray($category)
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'description' => $category->description,
            'created_at' => $category->created_at->toDateTimeString(),
            'updated_at' => $category->updated_at->toDateTimeString(),
        ];
    }

    public static function collection(\Illuminate\Support\Collection $data)
    {
        return $data->map(function ($item) {
            return self::toArray($item);
        });
    }
}
