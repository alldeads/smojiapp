@extends('layouts.app')

@section('content')
	<div class="container-fluid">
        <div class="row justify-content-center">
        	<div class="col-lg-10 col-md-10 col-sm-12 col-12">
        		<div class="card">
        			<div class="card-body text-center">
        				<img src="{{ asset('images/templates/'. $gender .'/skins/original/1.png') }}" alt="" width="150">
        			</div>

        			<div class="card-footer">

        				<div class="row skins-thumbnail">
        					@for($i = 1; $i <= $mskins; $i++)
        						<div class="col-lg-2 col-md-2 col-sm-6 col-6 text-center">
        							<a class="smojidesign" href="#" data-id="">
        								<img src="{{ asset('images/templates/'.$gender.'/skins/thumbnail/' . $i . '.png') }}" alt="{{$i}}" width="80">
        							</a>
        						</div>
        					@endfor
        				</div>

        				<div class="row hairs-thumbnail">
        					@for($i = 1; $i <= $mhairs; $i++)
        						<div class="col-lg-2 col-md-2 col-sm-6 col-6 text-center">
        							<a class="smojidesign" href="#" data-id="">
        								<img src="{{ asset('images/templates/'.$gender.'/hairs/thumbnail/' . $i . '.png') }}" alt="{{$i}}" width="50">
        							</a>
        						</div>
        					@endfor
        				</div>

        				@if ( $gender == "male" )

	        				<div class="row beards-thumbnail">
	        					@for($i = 1; $i <= $mbeards; $i++)
	        						<div class="col-lg-2 col-md-2 col-sm-6 col-6 text-center">
	        							<a class="smojidesign" href="#" data-id="">
	        								<img src="{{ asset('images/templates/'.$gender.'/beards/thumbnail/' . $i . '.png') }}" alt="{{$i}}" width="50">
	        							</a>
	        						</div>
	        					@endfor
	        				</div>
	        			@endif

        				<div class="row eyes-thumbnail">
        					@for($i = 1; $i <= $meyes; $i++)
        						<div class="col-lg-2 col-md-2 col-sm-6 col-6 text-center">
        							<a class="smojidesign" href="#" data-id="">
        								<img src="{{ asset('images/templates/'.$gender.'/eyes/thumbnail/' . $i . '.png') }}" alt="{{$i}}" width="50">
        							</a>
        						</div>
        					@endfor
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
@endsection