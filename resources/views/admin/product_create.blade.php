@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success p-3">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            <h2>Create Product</h2>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Product name</label>
                    <input type="text" name="product_name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Product price</label>
                    <input type="number" name="product_price" class="form-control">
                </div>
                <div class="form-group">
                    <label>Product size</label>
                    <input type="text" name="product_size" class="form-control">
                </div>
                <div class="form-group">
                    <label>Product type</label>
                    
                    <select class="form-select" name="product_type_id" aria-label="Default select example">
                        @foreach($product_types as $product_type)

                        <option name="product_type_id" value="{{$product_type->id}}">{{$product_type->type_name}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label>Product image</label>
                    <input type="file" name="product_image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>    

@endsection