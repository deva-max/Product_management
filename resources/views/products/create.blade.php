@extends('layouts.app')
@section('content')
    @role('admin')
        <h5>Create Product</h5>
        <div class='container'>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Product Name</label>
                    <input class="form-control" type="text" value="" name="name" placeholder="Enter text" required/>
                    <!-- Corrected syntax: "form-control" -->
                    <!-- Corrected syntax: "placeholder" (typo) -->
                </div>
                <div class="form-group">
                    <label>Unit Type</label>
                    <select name="unit_type" class="form-select">
                        <option disabled selected>Select one</option>
                        <!-- Corrected syntax: "selected" (typo) -->
                        <option value="Qty">Qty</option>
                        <option value="Ltr">Ltr</option>
                        <option value="KG">KG</option>
                        <option value="Mtr">Mtr</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="number" value="" placeholder="Enter number" step="0.01" name="price" required/>
                </div>
                <div class="form-group">
                    <label>Discount Percentage</label>
                    <input class="form-control" type="number" value="" placeholder="Enter number" name="discount_percentage" step="0.01" required/>
                </div>
                <div class="form-group">
                    <label>Discount Amount</label>
                    <input class="form-control" type="number" value="" placeholder="Enter number" name="discount_amount" step="0.01" required/>
                </div>
                <div class="form-group">
                    <label>Discount Start Date</label>
                    <input class="form-control" type="date" value="" name="discount_start_date" required/>
                </div>
                <div class="form-group">
                    <label>Discount End Date</label>
                    <input class="form-control" type="date" value="" name="discount_end_date" required/>
                </div>
                <div class="form-group">
                    <label>Tax Percentage</label>
                    <input class="form-control" type="number" value="" name="tax_percentage" step="0.01" required/>
                </div>
                <div class="form-group">
                    <label>Tax Amount</label>
                    <input class="form-control" type="number" value="" name="tax_amount" step="0.01" required/>
                </div>
                <div class="form-group">
                    <label>Stock Quantity</label>
                    <input class="form-control" type="number" value="" name="stock_quantity" required/>
                    <!-- Corrected input name: "stock_quantity" -->
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input class="form-control-file" type="file" name="images[]" multiple required/>
                </div>

                <button type="submit" class="btn btn-primary">Create Product</button>
            </form>
        </div>
    @else
        <script>
            alert('You don\'t have permission to create a product');
        </script>
    @endrole
@endsection
