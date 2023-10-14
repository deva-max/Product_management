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
            'name' => 'required|string|max:255',
            'unit_type' => 'required|in:Qty,Ltr,KG,Meter',
            'categories' => 'required|array',
            'categories.*' => 'integer|exists:product_categories,id',
            'images' => 'required|array|min:3',
            'price' => 'required|numeric',
            'discount_percentage' => 'nullable|numeric',
            'discount_amount' => 'nullable|numeric',
            'discount_start_date' => 'nullable|date',
            'discount_end_date' => 'nullable|date|after_or_equal:discount_start_date',
            'tax_percentage' => 'required|numeric',
            'tax_amount' => 'nullable|numeric',
            'stock_quantity' => 'required|integer',  
        ];
    }
}
