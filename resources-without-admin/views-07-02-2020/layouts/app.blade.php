<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Smoji</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/materializeicon/material-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/swiper/css/swiper.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5e39631d4309200012893ba2&product=inline-share-buttons" async="async"></script> -->
        @yield('css')
    </head>

    @auth
        <body class="color-theme-blue push-content-right theme-light">
    @else
        <body class="color-theme-blue">
    @endauth

        <div class="loader justify-content-center ">
            <div class="maxui-roller align-self-center">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        
        <div class="wrapper">
            <!-- sidebar left start -->
        
            @auth
                @include('layouts.lsidebar')
            @endauth

            <!-- page main start -->
            <div class="page">
                @auth
                    @include('layouts.header')
                @endauth

                @yield('content')

                <div class="page-content">
                    <div class="content-sticky-footer">
                        {{-- <div class="block-title text-center">Blank</div>
                        <h2 class="text-center mt-0 mb-4">We are Overux</h2>
                        <div class="row mx-0">
                            <div class="col ">

                            </div>
                        </div>
                        <br> --}}

                        @yield('page-content')
                    </div>
                </div>
            </div>
            <!-- page main ends -->

        </div>

        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <script src="{{ asset('css/cookie/jquery.cookie.js') }}"></script>
        <script src="{{ asset('css/sparklines/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('css/circle-progress/circle-progress.min.js') }}"></script>
        <script src="{{ asset('css/swiper/js/swiper.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        <script src="{{ asset('js/fabric.js') }}"></script>
        <!-- <script src="{{ asset('js/html2canvas.js') }}" defer></script> -->
        <!-- <script src="{{ asset('js/html2canvas.min.js') }}"></script> -->
        
        @yield('js')
    </body>
</html>