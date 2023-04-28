@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Products</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create Product</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Size</th>
                        <th>Product type</th>
                        <th>Product Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->product_size }}</td>
                            <td>{{ $product->product_type_id }}</td>
                            <td>{{ $product->product_image }}</td>
                            <td>
                                {{-- <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Show</a> --}}
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection