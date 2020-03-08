@extends('layouts.app')

@section('css')
<style type="text/css">
    .nav-link.active{
        background-color: #494ca2 !important;
    }
</style>
    
@endsection

@section('page-content')
	<div class="container-fluid">
        <div class="row justify-content-center">

        	<div class="col-lg-10 col-md-10 col-sm-12 col-12 text-center">
        		<div class="card">

        			<div class="card-header">
        				<form method="POST" action="/smoji/results">
        					@csrf



                            <style type="text/css">
                                
                                /* Create a custom radio button */
                                .container_radio {
                                  display: block;
                                  position: relative;
                                  padding-left: 35px;
                                  margin-bottom: 12px;
                                  cursor: pointer;
                                  font-size: 22px;
                                  -webkit-user-select: none;
                                  -moz-user-select: none;
                                  -ms-user-select: none;
                                  user-select: none;
                                }

                                /* Hide the browser's default radio button */
                                .container_radio input {
                                  position: absolute;
                                  opacity: 0;
                                  cursor: pointer;
                                }

                                .checkmark {
                                  position: absolute;
                                  top: 0;
                                  left: 0;
                                  height: 25px;
                                  width: 25px;
                                  background-color: #eee;
                                  border-radius: 50%;
                                }

                                /* On mouse-over, add a grey background color */
                                .container_radio:hover input ~ .checkmark {
                                  background-color: #ccc;
                                }

                                /* When the radio button is checked, add a blue background */
                                .container_radio input:checked ~ .checkmark {
                                  background-color: #2196F3;
                                }

                                /* Create the indicator (the dot/circle - hidden when not checked) */
                                .checkmark:after {
                                  content: "";
                                  position: absolute;
                                  display: none;
                                }

                                /* Show the indicator (dot/circle) when checked */
                                .container_radio input:checked ~ .checkmark:after {
                                  display: block;
                                }

                                /* Style the indicator (dot/circle) */
                                .container_radio .checkmark:after {
                                    top: 9px;
                                    left: 9px;
                                    width: 8px;
                                    height: 8px;
                                    border-radius: 50%;
                                    background: white;
                                }
                            </style>
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <label class="container_radio">Free
                                      <input type="radio" checked="checked" name="radiosubscription" value="free">
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="container_radio">Premium
                                      <input type="radio" name="radiosubscription" value="premium">
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>



        					<input type="hidden" name="inputskins"  id="inputskins"  value="1">
        					<input type="hidden" name="inputeyes"   id="inputeyes"   value="1">
                            <input type="hidden" name="inputlips"   id="inputlips"   value="1">
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

                                @if ( $gender == "female" )
                                    <div id="designlips">
                                        <img src="{{ asset('images/templates/' .$gender. '/lips/original/1.png') }}">
                                    </div>
                                @endif
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

                            @if ( $gender == "female" )
                                <div class="tab-pane container fade" id="lips">  
                                    <div class="row hairs-thumbnail">
                                        @for($i = 1; $i <= ${$gender}['counts']['lips']; $i++)
                                            <div class="col-lg-2 col-md-2 col-sm-6 col-6 text-center">
                                                <a class="smojidesign" href="#" data-id="lips-{{$i}}-{{$gender}}">
                                                    <img src="{{ asset('images/templates/'.$gender.'/lips/thumbnail/' . $i . '.png') }}" alt="{{$i}}" width="50">
                                                </a>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endif

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
                            console.log(src);
                            $("#design" + a + " img").attr("src", src);
                            console.log(b);
                            console.log(a);
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