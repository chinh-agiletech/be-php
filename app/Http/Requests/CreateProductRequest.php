<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'prd_name' => 'required|string|max:255',
            'prd_slug' => 'required|string|max:255|unique:products,slug',
            'prd_price' => 'required|numeric|min:0',
            'prd_description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'prd_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
