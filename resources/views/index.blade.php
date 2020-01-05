<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body style="width: 100%;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                
                @for( $i = 1; $i < 2; $i++ )
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12" style="border: 1px solid #dee2e6; width: 100%;">

                        <figure style="height: 320px;">

                            <div class="fsticker">
                                <img src="{{ asset("images/stickers/female/".$i.".png") }}" 
                                    alt="{{ 1 }}">
                            </div>

                            <div class="fbase fbase{{$i}}">
                                <img src="{{ asset("images/base/female/pose-".$i."/5.png") }}" 
                                    alt="{{ 1 }}" >
                            </div>

                            <div class="flip flip{{$i}}">
                                <img src="{{ asset("images/lip/lip.png") }}" alt="{{ $i }}">
                            </div>

                            <div class="feyes feyes{{$i}}">
                                <img src="{{ asset("images/eyes/female/45.png") }}" alt="{{ $i }}">
                            </div>

                            <div class="fhair fhair{{$i}}">
                                <img src="{{ asset("images/hair/female/3.png") }}" alt="{{ $i }}">
                            </div>
                        </figure>
{{-- 
                        @if ( $i == 1 )
                            <div class="lip" style="z-index: 100; position: relative; bottom: 130%; left: -38%; transform: rotateY(-180deg);">
                                <img src="{{ asset("images/lip/lip.png") }}" alt="{{ $i }}" width="45">
                            </div>

                            <div class="eyes" style="z-index: 101; position: relative;">
                                <img src="{{ asset("images/eyes/female/1.png") }}" alt="{{ $i }}" width="40">
                            </div>
                        @endif

                        @if ( $i == 2 )
                            <div class="lip" style="z-index: 100; position: relative; bottom: 122%; left: 48%;">
                                <img src="{{ asset("images/lip/lip.png") }}" alt="{{ $i }}" width="37">
                            </div>
                        @endif

                        @if ( $i == 3 )
                            <div class="lip" style="z-index: 100; position: relative; bottom: 125%; left: 42%;">
                                <img src="{{ asset("images/lip/lip.png") }}" alt="{{ $i }}" width="50">
                            </div>
                        @endif

                        @if ( $i == 4 )
                            <div class="lip" style="z-index: 100; position: relative; bottom: 132%; left: 46%;">
                                <img src="{{ asset("images/lip/lip.png") }}" alt="{{ $i }}" width="45">
                            </div>
                        @endif

                        @if ( $i == 5 )
                            <div class="lip" style="z-index: 100; position: relative; bottom: 155%; left: -14.5%; transform: rotateY(180deg) rotate(-45deg)">
                                <img src="{{ asset("images/lip/lip.png") }}" alt="{{ $i }}" width="40">
                            </div>
                        @endif

                        
                        </figure> --}}
                    </div>
                @endfor
                
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
