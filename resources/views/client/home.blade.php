@extends('layouts.app')

@section('content')
    {{-- Search place and carousel --}}
    <section id="banner">
        <div class="container">
            {{-- search place --}}
            <div class="banner-search">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-catalog">
                            <div class="row">
                                <div class="col-md-9">
                                    <form action="">
                                        <span class="search-start" id="search_start">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </span>
                                        <input type="text" id="input" placeholder="Qidirish..." class="shadow-lg" />
                                        <span id="search_end" class="search-end"><i
                                                class="fa-solid fa-arrow-right"></i></span>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <div class="banner-filter shadow-lg">
                                        <p class="text-white">Narx bo'yicha <i class="fa-solid fa-shuffle"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Carousel --}}
            <div class="banner-carousel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="carousel-images shadow-sm">

                            <div class="slider">
                                {{-- @foreach ([0, 1, 2, 3] as $item) --}}
                                <div class="image-block">
                                    <div class="bg-image"></div>
                                    <img src="{{ asset('images/cr0.jpg') }}" alt="Image Not Found" class="img-fluid" />
                                </div>
                                {{-- @endforeach --}}
                                <div class="image-block">
                                    <div class="bg-image"></div>
                                    <img src="{{ asset('images/cr1.jpg') }}" alt="Image Not Found" class="img-fluid" />
                                </div>
                                <div class="image-block">
                                    <div class="bg-image"></div>
                                    <img src="{{ asset('images/cr2.jpg') }}" alt="Image Not Found" class="img-fluid" />
                                </div>
                                <div class="image-block">
                                    <div class="bg-image"></div>
                                    <img src="{{ asset('images/cr3.jpg') }}" alt="Image Not Found" class="img-fluid" />
                                </div>
                            </div>
                            <div class="carousel-button">
                                <button class="slick-left">
                                    <i class="fa-solid fa-angle-left"></i> </button>
                                <button class="slick-right">
                                    <i class="fa-solid fa-angle-right"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xit-products shadow rounded-5 p-4 my-4">

                <div class="text-slider-icon d-flex justify-content-between align-items-center p-2">
                    <div class="text-product">
                        <h1>Barcha Mahsulotlar</h1>
                    </div>
                    <div class="icon-slider">
                        <button class="icon-left">
                            <i class="fa-solid fa-angle-left"></i> </button>
                        <button class="icon-right">
                            <i class="fa-solid fa-angle-right"></i> </button>
                    </div>
                </div>
                <div class="products mt-3">
                    <div class="row">
                        <div class="slider-product">
                            @foreach ($products as $product)
                                <div class="col-md-3 me-3">
                                    <div class="card card-body p-0 border-0">
                                        <div class="product-img">
                                            <img src="{{ $product->product_image }}" alt="Product Image"
                                                class="img-fluid" />
                                        </div>
                                        <div class="product-name mt-2">
                                            <p>{{ $product->product_name }}</p>
                                        </div>
                                        <div class="product-price">
                                            <p>{{ $product->product_price }} so'm</p>
                                        </div>
                                        <div class="add-product">
                                            <form>
                                                <button type="button" onclick="addProduct({{ $product->id }})"> <i class="fa-solid fa-basket-shopping"
                                                        ></i> &nbsp;Savatga
                                                    qo'shish</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function addProduct(productId) {
            $.ajax({
                url: "{{ route('cart.add') }}",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    product_id: productId
                },
                success: function({cart}) {
                    console.log(cart)
                    if (cart) {
                        let count = Object.keys(cart).length
                        $('.cart-count').html(count);
                    }
                }
            });
        }
    </script>
@endsection
