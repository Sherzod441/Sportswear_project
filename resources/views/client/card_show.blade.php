@extends('layouts.app')

@section('content')

    <section id="orders" class="container shadow-lg rounded-4">
        <div class="basket">
            <h1>Savatcha</h1>
            <hr />
            <div class="basket-products">
                <div class="row">
                    {{-- Bu qism mahsulotlar chiqishi uchun --}}
                    <div class="col-md-9"></div>
                    {{-- bu qism buyurtma berish uchun --}}
                    <div class="col-md-3 border-left">
                        <form action="">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="F.I.O ni kiriting" />
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" placeholder="Telefon raqamni kiriting: (+998941116092)" />
                            </div>
                            <div class="mb-3">
                                <input type="button" class="btn btn-success" value="Buyurtma berish" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script type="text/javascript">
        function cartItem(productId, quantity) {
            let quantities = document.querySelectorAll('.quantity');
            $.ajax({
                url: "{{ route('cart.update') }}",
                method: "PUT",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    productId: productId,
                    quantity: quantity,
                    status: status,
                },
                success: function({cart}) {
                    console.log(cart[productId].product_id)    
                 quantities.forEach((e) => {
                    if (e.getAttribute('product-id') === cart[productId].product_id) {
                        console.log(e.innerHTML)
                        e.innerHTML = cart[productId].quantity
                    }
                 });
                //  console.log(t)
                    
                }
            })
        }
    </script>
@endsection
