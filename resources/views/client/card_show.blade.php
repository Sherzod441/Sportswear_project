@extends('layouts.app')

@section('content')

<div class="container">
        @if(!$cart)
            <p>Your cart is empty.</p>
        @else
            <table class="table table-striped mt-5">
                <thead>
                  <tr>
                    <th scope="col" style="width: 18%">Product Name</th>
                    <th scope="col" style="width: 18%">Product price</th>
                    <th scope="col" style="width: 18%">Product size</th>
                    <th scope="col" style="width: 23%">Quantity</th>
                    <th scope="col" style="width: 23%">Product image</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($cart as $product)
                    <tr>
                        <td>{{ $product['product_name'] }}</td>
                        <td>{{ $product['product_price'] }}</td>
                        <td>{{$product['product_size']}}</td>
                        <td> <i class="fa-solid fa-minus  me-3 rounded"></i> {{ $product['quantity'] }} <i class="fa-solid fa-plus ms-3"></i></td>
                        <td><img src="{{ $product['product_image'] }}" alt="{{ $product['product_name'] }}" width="100" height="75"></td>
                    </tr>
                @endforeach
                </tbody>
              </table>
        @endif
</div>

@endsection
