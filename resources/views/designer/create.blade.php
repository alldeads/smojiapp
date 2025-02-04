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
        					<input type="hidden" name="inputskins"  id="inputskins"  value="1">
        					<input type="hidden" name="inputeyes"   id="inputeyes"   value="1">
                            <input type="hidden" name="inputlips"   id="inputlips"   value="1">
        					<input type="hidden" name="inputhairs"  id="inputhairs"  value="1">
        					<input type="hidden" name="inputbeards" id="inputbeards" value="1">
        					<input type="hidden" name="gender" value="{{$gender}}">
        					<button type="submit" class="btn btn-primary"> SAVE</button>
        				</form>
        			</div>


                    <!-- Start : Strip payment DIV -->
                    <div class="row text-left payment_div" style="display: none;">
                       <div class="col-md-9 offset-md-3">
                          <div class="plan-exp-box">
                             
                             <div class="row">
                               
                                <!-- stripe form -->
                                <div class="col-md-8">
                                    <div class="card panel panel-default credit-card-box">
                                       
                                        <div class="panel-body card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-left"> <div id="error-message"></div></div>
                                                <div class="col-md-6 text-left"><h4 class="panel-title display-td " >Payment information </h4></div>
                                                <div class="col-md-6 text-right"><img class="img-responsive " src="http://i76.imgup.net/accepted_c22e0.png"></div>
                                            </div>
                                            <form action="/smoji/payment"  method="POST" name="frmStripePayment" id="frmStripePayment">
                                                @csrf
                                                <div class="news-letter-box services">
                                                    <div class="row">

                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <p for="example-text-input">Card Holder Name </p>
                                                                <input class="form-control"  type="text" placeholder="Your Card Number" id="name" maxlength="16" name="name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <p for="example-text-input">Email </p>
                                                                <input class="form-control"  type="email" placeholder="Email" id="email"  name="email" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <p for="example-text-input">Card Number</p>
                                                                <input class="form-control"  type="text" placeholder="Your Card Number" id="card-number" maxlength="16" name="card-number" required>
                                                            </div>
                                                        </div>
                                                        

                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <p for="example-text-input">Exp. Month</p>
                                                                <select class="form-control"  id="month" name="month" required>   
                                                                    @foreach( $months as $key => $month )
                                                                    <option value="{{$key}}">{{$month}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <p for="example-text-input">Exp. Year</p>
                                                                <select class="form-control"  name="year" id="year" required>   
                                                                    @php
                                                                       $year = date('Y');
                                                                       $toYear = $year + 15;                                                                       
                                                                    @endphp
                                                                    
                                                                    @for($i=$year;$i<=$toYear;$i++)
                                                                             <option value="{{$i}}">{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <p for="example-text-input">CVV</p>
                                                                <input type="text" class="form-control" style="border: 1px solid #ced4da !important" name="cvc" id="cvc" placeholder="CVV" maxlength="3" Value="" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 update_btn">
                                                            <div class="form-group">
                                                                <button type="submit" id="paynow" name="paynow" onClick="stripePay(event);" class="btn btn-primary">Pay Now</button>
                                                                <!-- <div>
                                                                    <input type="submit" name="pay_now" value="Submit"
                                                                        id="submit-btn" class="btnAction"
                                                                        onClick="stripePay(event);">

                                                                    <div id="loader">
                                                                        <img alt="loader" src="LoaderIcon.gif">
                                                                    </div>
                                                                </div> -->

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>        
                                </div>
                                <!-- stripe form -->
                             </div>
                          </div>
                       </div>
                    </div>


                    <!-- <?php if(!empty($successMessage)) { ?>
                    <div id="success-message"><?php echo $successMessage; ?></div>
                    <?php  } ?> -->

                    <!-- End : Strip payment DIV -->
                    
                    <div class="draw_div">
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