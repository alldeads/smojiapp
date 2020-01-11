@extends('layouts.app')

@section('content')
	<div class="container-fluid">
        <div class="row justify-content-center">

            {{-- @for( $i = 1; $i <= ${$gender}['counts']['stickers']; $i++ ) --}}
            @for( $i = 1; $i <= ${$gender}['counts']['free']; $i++ )
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">

                    <div class="card resultContainer">

                        <div class="card-body">

                            <div class="resultFinal">

                                <div class="resultSticker">
                                    <img src="{{ asset('images/results/'.$subscription.'/stickers/'.$gender.'/'.$i.'.png') }}">
                                </div>

                                <div id="resultBase{{$subscription.'-'.$gender . '-' . $i}}" class="resultSkin">
                                    <img src="{{ asset('images/results/'.$subscription.'/pose/'.$gender.'/pose-'.$i.'/'.$skin_result.'-01.png') }}">
                                </div>

                                {{-- @if ( $gender == "female" )

                                    <div id="resultLip{{$gender . '-' . $i}}" class="resultLip">
                                        <img src="{{ asset("images/lip/lips.png") }}">
                                    </div>

                                @endif

                                <div id="resultEyes{{$gender . '-' . $i}}" class="resultEyes">
                                    <img src="{{ asset("images/eyes/" . $gender . "/" . $eye_result . ".png") }}">
                                </div>

                                <div id="resultHair{{$gender . '-' . $i}}" class="resultHair">
                                    <img src="{{ asset("images/hair/" . $gender . "/" . $hair_result . ".png") }}">
                                </div> --}}
                            </div>

                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection