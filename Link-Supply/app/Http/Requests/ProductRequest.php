<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, array<int, mixed>> */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'price_unit' => ['required', 'string', 'max:50'],
            'min_order' => ['required', 'integer', 'min:1'],
            'min_order_unit' => ['required', 'string', 'max:50'],
            'stock' => ['required', 'integer', 'min:0'],
            'stock_unit' => ['required', 'string', 'max:50'],
            'location' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:150'],
            'rating' => ['required', 'numeric', 'between:0,5'],
            'sold_count' => ['required', 'string', 'max:50'],
            'image' => ['required', 'string', 'max:2048'],
            'description' => ['required', 'string'],
        ];
    }
}
