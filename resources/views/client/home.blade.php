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
                        <div class="carousel-images shadow-lg">

                            <div class="slider">
                                @foreach ([0, 1, 2, 3] as $item)
                                    <div class="image-block">
                                        <div class="bg-image"></div>
                                        <img src="{{ asset('images/cr' . $item . '.jpg') }}" alt="Image Not Found" class="img-fluid" />
                                    </div>
                                @endforeach
                                {{-- <div class="image-block">
                                    <div class="bg-image"></div>
                                    <img src="{{ asset('images/cr2.jpg') }}" alt="Image Not Found" class="img-fluid" />
                                </div>
                                <div class="image-block">
                                    <div class="bg-image"></div>
                                    <img src="{{ asset('images/cr3.jpeg') }}" alt="Image Not Found" class="img-fluid" />
                                </div>
                                <div class="image-block">
                                    <div class="bg-image"></div>
                                    <img src="{{ asset('images/cr4.jpg') }}" alt="Image Not Found" class="img-fluid" />
                                </div> --}}
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
            <div class="home-popular my-5">
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
                        <div class="col-md-3">
                            <div class="card card-body border-0 shadow-lg p-0 position-relative">
                                <div class="card-img-block">
                                    {{-- {{$item}} --}}
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
            </div>
        </div>
    </section>
@endsection
