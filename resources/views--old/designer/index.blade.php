@extends('layouts.app')


@section('page-content')

	<div class="container-fluid">
        

        <div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-12">

        		<p class="smoji-title">CREATE A SMOJI</p>

        		<h3> Select a Gender Character</h3><br>
        	</div>

        	<div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
        		<div class="card">
        			<div class="card-body">
        				<a href="/designer/male">
        					<img src="{{ asset("images/templates/male.jpg") }}" alt="male" width="250">
        				</a>
        			</div>
        		</div>
        	</div>

        	<div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
        		<div class="card">
        			<div class="card-body">
        				<a href="/designer/female">
	        				<img src="{{ asset("images/templates/female.jpg") }}" alt="female" width="250">
	        			</a>
        			</div>
        		</div>
        	</div>
        </div>
    </div>

@endsection