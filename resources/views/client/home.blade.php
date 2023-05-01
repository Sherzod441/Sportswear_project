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

            {{-- ommaboplari --}}
            {{-- <div class="home-popular my-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="popular-text">
                            <p class="d-flex align-items-center"><i
                                    class="fa-solid fa-star fa-2x me-3 mb-1"></i><strong>Ommabop tovarlar</strong></p>
                        </div>
                    </div>

                </div>
                <div class="row">
                    @foreach (['0' => 'Buxsi', '1' => 'Futbolka', '2' => 'Futbolka classic', '3' => 'Futbolka sport'] as $key => $value)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card card-body border-0 shadow-lg p-0 position-relative mb-3">
                                <div class="card-img-block">
                                    <img src="{{ asset('images/cr' . $key . '.jpg') }}" alt="Image Not Found"
                                        class="img-fluid" />
                                </div>
                                <div class="card-img-text position-absolute">
                                    <p>{{$value}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>   --}}
            {{-- Eng xitlari --}}
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

                            <div class="col-md-3 me-3">
                                <div class="card card-body p-0 border-0">
                                    <div class="product-img">
                                        <img src="{{ asset('images/shoes/sh1.png') }}" alt="Product Image"
                                            class="img-fluid" />
                                    </div>
                                    <div class="product-name mt-2">
                                        <p>Kovush</p>
                                    </div>
                                    <div class="product-price">
                                        <p>200 000 so'm</p>
                                    </div>
                                    <div class="add-product">
                                        <button> <i class="fa-solid fa-basket-shopping"></i> &nbsp;Savatga qo'shish</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 me-3">
                                <div class="card card-body p-0 border-0">
                                    <div class="product-img">
                                        <img src="{{ asset('images/shoes/sh2.png') }}" alt="Product Image"
                                            class="img-fluid" />
                                    </div>
                                    <div class="product-name mt-2">
                                        <p>Kovush</p>
                                    </div>
                                    <div class="product-price">
                                        <p>200 000 so'm</p>
                                    </div>
                                    <div class="add-product">
                                        <button> <i class="fa-solid fa-basket-shopping"></i> &nbsp;Savatga qo'shish</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 me-3">
                                <div class="card card-body p-0 border-0">
                                    <div class="product-img">
                                        <img src="{{ asset('images/shoes/sh3.png') }}" alt="Product Image"
                                            class="img-fluid" />
                                    </div>
                                    <div class="product-name mt-2">
                                        <p>Kovush</p>
                                    </div>
                                    <div class="product-price">
                                        <p>200 000 so'm</p>
                                    </div>
                                    <div class="add-product">
                                        <button> <i class="fa-solid fa-basket-shopping"></i> &nbsp;Savatga qo'shish</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 me-3">
                                <div class="card card-body p-0 border-0">
                                    <div class="product-img">
                                        <img src="{{ asset('images/shoes/sh4.png') }}" alt="Product Image"
                                            class="img-fluid" />
                                    </div>
                                    <div class="product-name mt-2">
                                        <p>Kovush</p>
                                    </div>
                                    <div class="product-price">
                                        <p>200 000 so'm</p>
                                    </div>
                                    <div class="add-product">
                                        <button> <i class="fa-solid fa-basket-shopping"></i> &nbsp;Savatga
                                            qo'shish</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 me-3">
                                <div class="card card-body p-0 border-0">
                                    <div class="product-img">
                                        <img src="{{ asset('images/shoes/sh4.png') }}" alt="Product Image"
                                            class="img-fluid" />
                                    </div>
                                    <div class="product-name mt-2">
                                        <p>Kovush</p>
                                    </div>
                                    <div class="product-price">
                                        <p>200 000 so'm</p>
                                    </div>
                                    <div class="add-product">
                                        <button> <i class="fa-solid fa-basket-shopping"></i> &nbsp;Savatga
                                            qo'shish</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 me-3">
                                <div class="card card-body p-0 border-0">
                                    <div class="product-img">
                                        <img src="{{ asset('images/shoes/sh1.png') }}" alt="Product Image"
                                            class="img-fluid" />
                                    </div>
                                    <div class="product-name mt-2">
                                        <p>Kovush</p>
                                    </div>
                                    <div class="product-price">
                                        <p>200 000 so'm</p>
                                    </div>
                                    <div class="add-product">
                                        <button> <i class="fa-solid fa-basket-shopping"></i> &nbsp;Savatga
                                            qo'shish</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
