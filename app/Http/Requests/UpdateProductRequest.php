<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255', // Use 'sometimes' to allow the name to be optional for updates.
            'unit_type' => 'sometimes|in:Qty,Ltr,KG,Meter',
            'categories' => 'sometimes|array',
            'categories.*' => 'sometimes|integer|exists:product_categories,id',
            'images' => 'sometimes|array|min:3',
            'price' => 'sometimes|numeric',
            'discount_percentage' => 'sometimes|nullable|numeric',
            'discount_amount' => 'sometimes|nullable|numeric',
            'discount_start_date' => 'sometimes|nullable|date',
            'discount_end_date' => 'sometimes|nullable|date|after_or_equal:discount_start_date',
            'tax_percentage' => 'sometimes|numeric',
            'tax_amount' => 'sometimes|nullable|numeric',
            'stock_quantity' => 'sometimes|integer',
        ];
    }
}
