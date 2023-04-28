@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Orders</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Order date</th>
                        <th>Customer Name</th>
                        <th>Customer Number</th>
                        <th>Total amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_number }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline-block;">
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