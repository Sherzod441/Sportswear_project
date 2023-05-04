@extends('layouts.app')

@section('content')
<h1>Shopping Cart</h1>

@if (count($cartItems) === 0)
    <p>Your cart is empty.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $id => $quantity)
                <tr>
                    <td>{{ $products[$id]->name }}</td>
                    <td>{{ $quantity }}</td>
                    <td>{{ $products[$id]->price }}</td>
                    <td>{{ $quantity * $products[$id]->price }}</td>
                    <td>
                        <form method="post" action="{{ route('cart.remove', ['id' => $id]) }}">
                            @csrf
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td>{{ $total }}</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
@endif

@endsection
