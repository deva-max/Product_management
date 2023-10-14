@extends('layouts.app')

@section('content')
    @role('admin')
        <h5>Edit Product</h5>
        
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label for="unit_type">Unit Type</label>
                <input type="text" name="unit_type" class="form-control" value="{{ $product->unit_type }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" value="{{ $product->price }}" step="0.01" required>
            </div>

            <div class "form-group">
                <label for="discount_percentage">Discount Percentage</label>
                <input type="number" name="discount_percentage" class="form-control" value="{{ $product->discount_percentage }}" step="0.01">
            </div>

            <div class="form-group">
                <label for="discount_amount">Discount Amount</label>
                <input type="number" name="discount_amount" class="form-control" value="{{ $product->discount_amount }}" step="0.01">
            </div>

            <div class="form-group">
                <label for="discount_start_date">Discount Start Date</label>
                <input type="date" name="discount_start_date" class="form-control" value="{{ $product->discount_start_date }}">
            </div>

            <div class="form-group">
                <label for="discount_end_date">Discount End Date</label>
                <input type="date" name="discount_end_date" class="form-control" value="{{ $product->discount_end_date }}">
            </div>

            <div class="form-group">
                <label for="tax_percentage">Tax Percentage</label>
                <input type="number" name="tax_percentage" class="form-control" value="{{ $product->tax_percentage }}" step="0.01">
            </div>

            <div class="form-group">
                <label for="tax_amount">Tax Amount</label>
                <input type="number" name="tax_amount" class="form-control" value="{{ $product->tax_amount }}" step="0.01">
            </div>

            <div class="form-group">
                <label for="stock_quantity">Stock Quantity</label>
                <input type="number" name="stock_quantity" class="form-control" value="{{ $product->stock_quantity }}" required>
            </div>

            <div class="form-group">
                <label for="images">Product Images (Min 3-Images)</label>
                <input type="file" name="images[]" class="form-control-file" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    @else
        <div class="alert alert-danger">
            You don't have permission to edit a product.
        </div>
    @endrole
@endsection
