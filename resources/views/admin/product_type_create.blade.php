@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Create Product</h2>
            <form action="{{ route('product_types.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Product type name</label>
                    <input type="text" name="product_type_name" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>    

@endsection