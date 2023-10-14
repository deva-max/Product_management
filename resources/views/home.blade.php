@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @role('admin')
                    <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                    @endrole

                    <div class="card-body">
                        <h5>Products List</h5>
                        <table id="productTable" class="display">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Unit Type</th>
                                    <th>Price</th>
                                    <th>Discount Percentage</th>
                                    <th>Discount Amount</th>
                                    <th>Discount Start Date</th>
                                    <th>Discount End Date</th>
                                    <th>Tax Percentage</th>
                                    <th>Tax Amount</th>
                                    <th>Stock Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <!-- ... Your product data here ... -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <script>
                    $(document).ready(function(){
                        $('#productTable').DataTable();
                    })
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
