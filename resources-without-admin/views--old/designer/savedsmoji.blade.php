@extends('layouts.app')


@section('page-content')

	<div class="container-fluid">
        <div class="row" style="background: #d8d8d82b;border: 1px solid #ddd;margin-bottom: 15px;padding-bottom: 25px;padding-top: 9px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <h3>My Smoji</h3><hr>
            </div>
            @php 
            $count = count($save_smoji);
            @endphp

            @if($count > 0)
                @foreach( $save_smoji as $key => $smoji )
                    @php
                        $json_data_array = json_decode($smoji->save_smoji_data,true);
                        $decode_data_string = encrypt($smoji->save_smoji_data);                
                        
                    @endphp
                    
                    <div class="col-lg-1 col-md-1 col-sm-2 col-2 text-center" >
                        <div class="card resultContainer">

                            <div class="card-body"  >

                                <div class="resultFinal" >

                                    <a href="{{ url('/smoji/savedresults/'.$decode_data_string.' ') }}">
                                    
                                        <div class="savedHair">
                                            <img src="{{ asset('images/templates/'.$json_data_array['gender'].'/hairs/original/' .$json_data_array['hair_result']. '.png') }}">
                                        </div>

                                        <div  class="savedSkin">
                                            <img src="{{ asset('images/templates/' .$json_data_array['gender']. '/skins/original/' .$json_data_array['skin_result']. '.png') }}">
                                        </div>

                                        <div class="savedEyes">
                                            <img src="{{ asset('images/templates/' .$json_data_array['gender']. '/eyes/original/' .$json_data_array['eye_result']. '.png') }}">
                                        </div>

                                        @if ( $json_data_array['gender'] == "female" )
                                            <div class="savedLip">
                                                <img src="{{ asset('images/templates/' .$json_data_array['gender']. '/lips/original/' .$json_data_array['lip_result']. '.png') }}">
                                            </div>
                                        @endif
                                        @if ( $json_data_array['gender'] == "male" )
                                            <div class="savedBreads">
                                                <img src="{{ asset('images/templates/' .$json_data_array['gender']. '/beards/original/' .$json_data_array['beard_result']. '.png') }}">
                                            </div>
                                        @endif

                                    </a>

                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 ">
                    <div class=" alert alert-info">You have no any SAVED Smoji yet.</div>
                </div>
            @endif
        </div>

    </div>

@endsection