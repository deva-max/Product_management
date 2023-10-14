<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'images' => 'json'
    ];

    protected $fillable = [
        'name',
        'unit_type',
        'price',
        'discount_percentage',
        'discount_amount',
        'discount_start_date',
        'discount_end_date',
        'tax_percentage',
        'tax_amount',
        'stock_quantity',
    ];

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }
}
