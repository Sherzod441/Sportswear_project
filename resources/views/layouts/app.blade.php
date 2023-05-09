<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- Css  --}}
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/slick.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/slick.theme.css') }}" rel="stylesheet" />

    {{-- JS --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>

    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @if (Auth::user())
            @include('layouts.admin_header')
        @else
            @include('layouts.header')
        @endif

        <main class="py-4">
            @yield('content')
        </main>

        {{-- services --}}
        @include('layouts.services')
        {{-- footer --}}
        @include('layouts.footer')
    </div>
    <script>
        $(document).ready(function() {
            // script for CAROUSEL
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 3000,
                nextArrow: $('.slick-right'),
                prevArrow: $('.slick-left')
            });

            // script for SEARCH PLACE
            $('#input').focus(function() {
                $('#search_end').addClass("focus")
                $('#search_start').addClass('focus')
            })
            $('#input').focusout(function() {
                $('#search_end').removeClass("focus")
                $('#search_start').removeClass('focus')
            })

            // product slider
            $('.slider-product').slick({
                autoplay: true,
                autoplaySpeed: 3000,
                slidesToShow: 4,
                slidesToScroll: 1,
                nextArrow: $('.icon-right'),
                prevArrow: $('.icon-left')
            });

        });

        function changeLang(lang) {
            let url = "{{ route('language') }}";
            window.location.href = url + "?lang=" + lang;
            // console.log(url)
        }
    </script>
    @yield('scripts')
</body>

</html>
