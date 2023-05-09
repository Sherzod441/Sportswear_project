@extends('layouts.app')

@section('content')
    <section id="orders" class="container shadow-lg rounded-4">
        <div class="basket">
            <h1>Savatcha</h1>
            <hr />
            @if (!session()->has('cart') || !session()->get('cart'))
                <h5>Savatcha bo'sh.</h5>
            @else
                <div class="basket-products">
                    <div class="row">
                        {{-- Bu qism mahsulotlar chiqishi uchun --}}
                        <div class="col-md-9 product-border">
                            <div class="row border-bottom">
                                <div class="col-md-4">
                                    <p>Mahsulot</p>
                                </div>
                                <div class="col-md-2">
                                    <p>Narxi</p>
                                </div>
                                <div class="col-md-2">
                                    <p>Kolvo</p>
                                </div>
                                <div class="col-md-3">
                                    <p>Summa</p>
                                </div>

                            </div>
                            @foreach ($cart as $product)
                                <div class="row d-flex align-items-center mt-2">
                                    <div class="col-md-4">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-4">
                                                <img src="{{ $product['product_image'] }}" alt="Not found"
                                                    class="img-fluid" />
                                            </div>
                                            <div class="col-md-8">
                                                <p class="p-0 m-0">{{ $product['product_name'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <strong>{{ $product['product_price'] }} so'm</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="plus-minus d-flex align-items-center">
                                            <button
                                                onclick="cartItem({{ $product['product_id'] }}, {{ $product['quantity'] }}, status='minus', this)">-</button>
                                            <strong class="quantity"
                                                product-id="{{ $product['product_id'] }}">{{ $product['quantity'] }}</strong>
                                            <button
                                                onclick="cartItem({{ $product['product_id'] }}, {{ $product['quantity'] }}, status='plus')">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <strong class="total_price"
                                            productId="{{ $product['product_id'] }}">{{ $product['total_price'] }}
                                            so'm</strong>
                                    </div>
                                    <div class="col-md-1">
                                        <span class="product-remove" onclick="removeItem({{ $product['product_id'] }})"><i
                                                class="fas fa-trash text-danger"></i></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- bu qism buyurtma berish uchun --}}
                        <div class="col-md-3 border-left">
                            <div class="product-total">
                                @php
                                    $summa = 0;
                                    $cart = session()->has('cart') ? session()->get('cart') : '';
                                    foreach ($cart as $c) {
                                        $summa += $c['total_price'];
                                    }
                                @endphp
                                <h3>Umumiy: <span>{{ $summa }}</span> <strong>so'm</strong></h3>
                            </div>
                            <form>
                                {{-- <input type="hidden" name="total_amount" value="{{ $summa }}" /> --}}
                                <div class="mb-3">
                                    <input type="text" name="customer_name" class="form-control"
                                        placeholder="Ismingizni kiriting" required />
                                </div>
                                <div class="mb-3">
                                    <input type="number" name="customer_number" class="form-control"
                                        placeholder="Tel: (+998941116092)" required />
                                </div>
                                <div class="mb-3">
                                    <input type="button" class="btn btn-success w-100" value="Buyurtma berish"
                                        onclick="order()" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        function cartItem(productId, quantity, el) {
            let quantities = document.querySelectorAll('.quantity'),
                totalPrice = document.querySelectorAll('.total_price'),
                summa = 0;
            $.ajax({
                url: "{{ route('cart.update') }}",
                method: "PUT",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    productId: productId,
                    quantity: quantity,
                    status: status,
                },
                success: function({
                    cart,
                    message
                }) {
                    quantities.forEach((e) => {
                        if (e.getAttribute('product-id') === cart[productId].product_id) {
                            e.innerHTML = cart[productId].quantity
                        }
                    });

                    totalPrice.forEach((e) => {
                        if (e.getAttribute('productId') === cart[productId].product_id) {
                            e.innerHTML = cart[productId].total_price + " so'm";
                        }
                    })

                    for (const [key, value] of Object.entries(cart)) {
                        summa += value.total_price;
                    }
                    $('.product-total span').html(summa);
                }
            })
        }

        function removeItem(productId) {
            $.ajax({
                url: "{{ route('remove.item') }}",
                method: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    productId: productId,
                },
                success: function(res) {
                    if (res.message) {
                        window.location.reload();
                    }
                }
            })
        }

        function order() {
            // 
            $.ajax({
                url: "{{ route('cart.order') }}",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    total_amount: $('.product-total span').html(),
                    customer_name: $('[name=customer_name]').val(),
                    customer_number: $('[name=customer_number]').val(),
                },
                success: function(res) {
                    if (res.message) {
                        window.location.reload();
                    }
                },
            });
        }
    </script>
@endsection
