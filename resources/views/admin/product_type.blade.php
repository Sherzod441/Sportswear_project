@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Products</h2>
            <a href="{{ route('product_types.create') }}" class="btn btn-primary mb-3">Create Product</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mahsulot Idsi</th>
                        <th>Type name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product_types as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->type_name }}</td>
                            <td>
                                {{-- <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Show</a> --}}
                                <a href="{{ route('product_types.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('product_types.destroy', $product->id) }}" method="POST" style="display: inline-block;">
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