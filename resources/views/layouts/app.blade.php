<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        @yield('css')
    </head>

    <body>
        {{-- <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar" class="active">
                <div class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>

                <div class="p-4">
                    <h1><a href="/" class="logo">SMOJI</a></h1>
                    <ul class="list-unstyled components mb-5">
                        <li class="active">
                            <a href="#"><span class="fa fa-home mr-3"></span> Home</a>
                        </li>
                        
                        <li>
                            <a href="#"><span class="fa fa-bars mr-3"></span> My Smojis</a>
                        </li>

                        <li>
                            <a href="#"><span class="fa fa-paper-plane mr-3"></span> Get Premium</a>
                        </li>

                        
                    </ul>

                    <div class="mb-10">
                        <ul class="list-unstyled components mb-5">
                            <li>
                                <a href="#"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> --}}

            <div id="content" class="p-4 p-md-5 pt-5">
                @yield('content')
            </div>
        {{-- </div> --}}


        <script
          src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous"></script>
        
        <script src="{{ asset('js/fabric.js') }}"></script>
        <script src="{{ asset('js/html2canvas.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        @yield('js')

    </body>



</html>