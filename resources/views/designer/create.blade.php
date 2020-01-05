@extends('layouts.app')

@section('content')
	<div class="container-fluid">
        <div class="row justify-content-center">

        	<div class="col-lg-10 col-md-10 col-sm-12 col-12 text-center">
        		<div class="card">

        			<div class="card-header">
        				<form method="POST" action="/smoji/results">
        					@csrf
        					<input type="hidden" name="inputskins"  id="inputskins"  value="1">
        					<input type="hidden" name="inputeyes"   id="inputeyes"   value="1">
        					<input type="hidden" name="inputhairs"  id="inputhairs"  value="1">
        					<input type="hidden" name="inputbeards" id="inputbeards" value="1">
        					<input type="hidden" name="gender" value="{{$gender}}">

        					<button type="submit" class="btn btn-primary"> SAVE</button>
        				</form>
        			</div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6" id="drawingArea">

                                <div id="designhairs">
                                    <img src="{{ asset('images/templates/'.$gender.'/hairs/original/1.png') }}">
                                </div>

                                <div id="designskins">
                                    <img src="{{ asset('images/templates/' .$gender. '/skins/original/1.png') }}">
                                </div>
                                
                                <div id="designeyes">
                                    <img src="{{ asset('images/templates/' .$gender. '/eyes/original/1.png') }}">
                                </div>

                                @if ( $gender == "male" )
                                    <div id="designbeards">
                                        <img src="{{ asset('images/templates/' .$gender. '/beards/original/1.png') }}">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

        			<div class="card-footer text-center">

                        <!-- Nav pills -->
                        <ul class="nav nav-pills justify-content-center">
                            @foreach( ${$gender}['assets'] as $key => $assets )
                                <li class="nav-item">
                                    <a class="nav-link {{ $key == 0? "active" : "" }}" data-toggle="pill" href="#{{strtolower($assets)}}">{{$assets}}</a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content" style="padding-top: 10px;">
                            <div class="tab-pane container active" id="skin">
                                <div class="row skins-thumbnail">
                                    @for($i = 1; $i <= ${$gender}['counts']['skin']; $i++)
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-6 text-center">
                                            <a class="smojidesign" href="#" data-id="skins-{{$i}}-{{$gender}}">
                                                <img src="{{ asset('images/templates/'.$gender.'/skins/thumbnail/' . $i . '.png') }}" alt="{{$i}}" width="80">
                                            </a>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="eyes">   
                                <div class="row eyes-thumbnail">
                                    @for($i = 1; $i <= ${$gender}['counts']['eyes']; $i++)
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-6 text-center">
                                            <a class="smojidesign" href="#" data-id="eyes-{{$i}}-{{$gender}}">
                                                <img src="{{ asset('images/templates/'.$gender.'/eyes/thumbnail/' . $i . '.png') }}" alt="{{$i}}" width="80">
                                            </a>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="hair">  
                                <div class="row hairs-thumbnail">
                                    @for($i = 1; $i <= ${$gender}['counts']['hair']; $i++)
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-6 text-center">
                                            <a class="smojidesign" href="#" data-id="hairs-{{$i}}-{{$gender}}">
                                                <img src="{{ asset('images/templates/'.$gender.'/hairs/thumbnail/' . $i . '.png') }}" alt="{{$i}}" width="50">
                                            </a>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            @if ( $gender == "male" )
                                <div class="tab-pane container fade" id="beard">  
                                    <div class="row hairs-thumbnail">
                                        @for($i = 1; $i <= ${$gender}['counts']['beard']; $i++)
                                            <div class="col-lg-2 col-md-2 col-sm-6 col-6 text-center">
                                                <a class="smojidesign" href="#" data-id="beards-{{$i}}-{{$gender}}">
                                                    <img src="{{ asset('images/templates/'.$gender.'/beards/thumbnail/' . $i . '.png') }}" alt="{{$i}}" width="50">
                                                </a>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endif
                        </div>        			
        			</div>
        		</div>
        	</div>
        </div>
    </div>
@endsection

@section('js')
    
    <script type="text/javascript">


        $(function() {

            var run = {

                'init' : function () {
                    this.create();
                },

                'create' : function () {

                    $(".smojidesign").on( 'click', function () {

                        var x = $(this).data('id');

                        var z = x.split('-');

                        if ( z.length == 3 ) {

                            var a = z[0];
                            var b = z[1];
                            var c = z[2];
                            var src = "/images/templates/" + c + "/" + a + "/original/" + b + ".png";

                            $("#design" + a + " img").attr("src", src);

                            $("#input" + a).val(b);
                        }
                    } );

                }

            };

            run.init();

        } );

        // html2canvas(document.querySelector("#drawingArea")).then( canvas => {

        //     document.querySelector("#result").appendChild(canvas)
        // }) ;
    

    </script>

@endsection