@extends('layouts.app')

@section('content')
@if(!$cart)
    <p>Your cart is empty.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td><img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" width="50"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif


@endsection
