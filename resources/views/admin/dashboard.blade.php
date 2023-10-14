@extends('layouts.app')
@section('content')
    @can('create-product')
        <a href="{{ route('create.product') }}">Create Product</a>
    @else
        <script>
            alert('You don\'t have permission to create a product');
        </script>
    @endcan
@endsection
