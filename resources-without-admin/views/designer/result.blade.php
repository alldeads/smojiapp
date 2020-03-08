@extends('layouts.app')

@section('page-content')
 <script src="https://retifrav.github.io/html2canvas-example/html2canvas.min.js"></script>

  

    <style type="text/css">
            .box-width {
                  -webkit-box-flex: 0;
                  flex: 0 0 21.5%;
                  max-width: 21.5%;
                  position: relative;
                  width: 100%;
                  padding-right: 15px;
                  padding-left: 15px;
            }

            @media only screen and (max-width: 600px) {
                .box-width {
                  -webkit-box-flex: 0;
                  flex: 0 0 100%;
                  max-width: 100%;
                  position: relative;
                  width: 100%;
                  padding-right: 15px;
                  padding-left: 15px;
                }
            }

            .shareonmobile {
                  position: absolute;
                  background: #00000033;
                  color: #fff;
                  border-radius: 50%;
                  width: 30px;
                  padding: 3px 0px 0px 3px;
                  height: 30px;
                  top: 5px;
                  right: 5px;
                  z-index: 2;
            }

            .shareondesktop {
                position: absolute;
                background: #00000040;
                color: #fff;
                border-radius: 50%;
                width: 35px;
                padding: 5px 1px 0px 5px;
                height: 35px;
                right: 7px;
                bottom: 11px;
                z-index: 10;
            }

            /* Ipad Pro*/
            @media only screen 
              and (min-width: 1024px) 
              and (max-height: 1366px) 
              and (-webkit-min-device-pixel-ratio: 1.5) {

                .shareonmobile {
                   position: absolute;
                  background: #00000033;
                  color: #fff;
                  border-radius: 50%;
                  width: 30px;
                  padding: 3px 0px 0px 3px;
                  height: 30px;
                  top: 5px;
                  right: 5px;
                  z-index: 2;
              }


              .box-width {
                  -webkit-box-flex: 0;
                  flex: 2 0 33%;
                  max-width: 33%;
                  position: relative;
                  width: 100%;
                  padding-right: 15px;
                  padding-left: 15px;
              }


            }
            /* Ipad */
            @media only screen 
              and (min-width: 768px) 
              and (max-height: 1024px) 
              and (-webkit-min-device-pixel-ratio: 1.5) {

                .shareonmobile {
                  position: absolute;
                  background: #00000033;
                  color: #fff;
                  border-radius: 50%;
                  width: 30px;
                  padding: 3px 0px 0px 3px;
                  height: 30px;
                  top: 5px;
                  right: 5px;
                  z-index: 2;
              }
              .box-width {
                  -webkit-box-flex: 0;
                  flex: 2 0 50%;
                  max-width: 50%;
                  position: relative;
                  width: 100%;
                  padding-right: 15px;
                  padding-left: 15px;
              }

            }


            .loadernew {
                border: 10px solid #f3f3f3;
                border-radius: 50%;
                border-top: 10px solid #4e54c8;
                width: 80px;
                height: 80px;
                -webkit-animation: spin 2s linear infinite;
                animation: spin 2s linear infinite;
                background: #ffffff;
                left: 50%;
                top: 45%;
                position: absolute;
                transform: translate(50%, 50%);
                z-index: 999;
            }
            #loaderback{
                height: 100%;
                width: 100%;
                position: fixed;
                background: rgba(0, 0, 0, 0.3);
                z-index: 9999;
                display: flex;
                    top: 0;

            }
            #backdropmodal{
                height: 100%;
                width: 100%;
                position: fixed;
                background: rgba(0, 0, 0, 0.3);
                z-index: 9999;
                display: flex;
                    top: 0;

            }

            /* Safari */
            @-webkit-keyframes spin {
              0% { -webkit-transform: rotate(0deg); }
              100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }

            .smojilogostriker
            {    
              z-index: 10;
              position: absolute;
              width: 160px;bottom: -52px;left: 0;
            }
            .resultFinal{
              cursor: pointer;
            }

    </style>
    @if(count($errors))
      <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.
          <br/>
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
      </div>
    @endif
    <div style="display: none;">
      <form action="/smoji/payment" method="post" id="subscribe-form">
            @csrf
            <h3 class="page-header">Tell us about yourself</h3>
            <input type="hidden" id="plan-desc" name="plan-desc" value="Plan Basic ($6.00)" />
            <input type="hidden" id="plan-price" name="plan-price" value="100" />
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer[first_name]">First Name</label>
                        <input type="text" class="form-control" name="customer[first_name]" 
                              maxlength=50 required data-msg-required="cannot be blank" value="kunal">
                        <small for="customer[first_name]" class="text-danger"></small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer[last_name]">Last Name</label>
                        <input type="text" class="form-control" name="customer[last_name]" 
                              maxlength=50 required data-msg-required="cannot be blank" value="soni">
                        <small for="customer[last_name]" class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer[email]">Email</label>
                        <input id="email" type="text" class="form-control" name="customer[email]" maxlength=50
                                   data-rule-required="true" data-rule-email="true" 
                                   data-msg-required="Please enter your email address" 
                                   data-msg-email="Please enter a valid email address" value="bijig61597@mailrunner.net">
                        <small for="customer[email]" class="text-danger"></small>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer[phone]">Phone</label>
                        <input id="phone" type="text" maxlength="10" class="form-control" name="customer[phone]" 
                               maxlength=50 required data-msg-required="cannot be blank" value="1234567890">
                        <small for="customer[phone]" class="text-danger"></small>
                    </div>
                </div>                   
            </div>                
            <input type="hidden" name="stripeToken" value="" />
            <input type="hidden" name="packagetype" value="" />
            <hr>                            
            <p><small class="text-danger" style="display:none;">There were errors while submitting</small></p>
            <p><input id="submit-btn" type="submit" class="btn btn-success btn-lg pull-left" value="Proceed to Payment">&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="subscribe-process process" style="display:none;">Processing&hellip;</span>
                <small class="alert-danger text-danger"></small>
            </p>
      </form>
    </div>

    <div id="loaderback" class="d-none">
      <div class="loadernew" id="myloader"></div>
    </div>

    <div class="container-fluid">

        
        <!--Start : Free -->
        <div class="row justify-content-center" id="">
            @php
              $subscription = 'free';
            @endphp
            @for( $i = 1; $i <= ${$gender}['counts'][$subscription]; $i++ )           
            @php
              $ibox = 'mystrikerBox'.$subscription.'-'.$gender . '-' . $i;
              $main_ibox = 'main_'.$subscription.'-'.$gender . '-' . $i;
            @endphp
                <div class="box-width mb-4" onclick="screenshot('{{$main_ibox}}','{{$ibox}}','currentpage')">

                    <div class="card resultContainer" id="{{$main_ibox}}">

                        <div class="card-body" id="{{$ibox}}" >

                            <div class="resultFinal" >

                                <div id="resultSticker{{$subscription.'-'.$gender . '-' . $i}}" class="resultSticker">
                                    <img src="{{ asset('images/results/'.$subscription.'/stickers/'.$gender.'/'.$i.'.png') }}" class="share-imag">
                                </div>
                                

                                <div id="resultBase{{$subscription.'-'.$gender . '-' . $i}}" class="resultSkin">
                                    <img src="{{ asset('images/results/'.$subscription.'/pose/'.$gender.'/pose-'.$i.'/'.$skin_result.'-01.png') }}">
                                </div>

                                <div id="resultHair{{$subscription.'-'.$gender . '-' . $i}}" class="resultHair">
                                    <img src="{{ asset('images/results/hair/'.$gender.'/'.$hair_result.'.png') }}">
                                </div>

                                @if ( $gender == "female" )
                                    <div id="resultLip{{$subscription.'-'.$gender . '-' . $i}}" class="resultLip">
                                        <img src="{{ asset("images/lip/" . $gender . "/" . $lip_result . ".png") }}">
                                    </div>
                                @endif

                                  <!-- <div id="resultEyes{{$gender . '-' . $i}}" class="resultEyes">
                                      <img src="{{ asset("images/eyes/" . $gender . "/" . $eye_result . ".png") }}">
                                  </div> -->
                                
                                  <div id="resultEyes{{$subscription.'-'.$gender . '-' . $i}}" class="resultEyes">
                                      <img src="{{ asset("images/eyes/" . $gender . "/" . $eye_result . ".png") }}">
                                  </div>
                                
                                @if ( $gender == "male" && $beard_result != "1")
                                    
                                    <div id="resultBeard{{$subscription.'-'.$gender . '-' . $i}}" class="resultBreads">
                                        <img src="{{ asset("images/beards/thumbnail/" . $beard_result . ".png") }}">
                                    </div>
                                    
                                @endif
                                <img src="{{ asset('images/new_logo.png') }}" alt="" class="smojilogostriker">

                            </div>

                            <div class="shareondesktop d-none" onclick="screenshot('{{$ibox}}','currentpage')" style="cursor: pointer;"><i class="material-icons" style="font-size: 25px;">visibility</i></div>
                        </div>
                    </div>

                </div>
            @endfor

        </div>
        <!-- ENd : Free -->


        <!--Start :  Premium -->
        <div class="row justify-content-center" id="">
            @php
              $subscription = 'premium';
            @endphp
            @for( $i = 1; $i <= ${$gender}['counts'][$subscription]; $i++ )           
            @php
              $ibox = 'mystrikerBox'.$subscription.'-'.$gender . '-' . $i;
              $main_ibox = 'main_'.$subscription.'-'.$gender . '-' . $i;
            @endphp
                <div class="box-width mb-4" onclick="screenshotPrem('{{$main_ibox}}','{{$ibox}}','currentpage')">

                    <div class="card resultContainer" id="{{$main_ibox}}">

                        <div class="card-body {{$is_premium}}" id="{{$ibox}}" >

                            <div class="resultFinal" >

                                <div id="resultSticker{{$subscription.'-'.$gender . '-' . $i}}" class="resultSticker">
                                    <img src="{{ asset('images/results/'.$subscription.'/stickers/'.$gender.'/'.$i.'.png') }}" class="share-imag">
                                </div>
                                

                                <div id="resultBase{{$subscription.'-'.$gender . '-' . $i}}" class="resultSkin">
                                    <img src="{{ asset('images/results/'.$subscription.'/pose/'.$gender.'/pose-'.$i.'/'.$skin_result.'-01.png') }}">
                                </div>

                                <div id="resultHair{{$subscription.'-'.$gender . '-' . $i}}" class="resultHair">
                                    <img src="{{ asset('images/results/hair/'.$gender.'/'.$hair_result.'.png') }}">
                                </div>

                                @if ( $gender == "female" )
                                    <div id="resultLip{{$subscription.'-'.$gender . '-' . $i}}" class="resultLip">
                                        <img src="{{ asset("images/lip/" . $gender . "/" . $lip_result . ".png") }}">
                                    </div>
                                @endif

                                  <!-- <div id="resultEyes{{$gender . '-' . $i}}" class="resultEyes">
                                      <img src="{{ asset("images/eyes/" . $gender . "/" . $eye_result . ".png") }}">
                                  </div> -->
                                
                                  <div id="resultEyes{{$subscription.'-'.$gender . '-' . $i}}" class="resultEyes">
                                      <img src="{{ asset("images/eyes/" . $gender . "/" . $eye_result . ".png") }}">
                                  </div>
                                

                                @if ( $gender == "male" && $beard_result != "1")
                                    <div id="resultBeard{{$subscription.'-'.$gender . '-' . $i}}" class="resultBreads">
                                        <img src="{{ asset("images/beards/thumbnail/" . $beard_result . ".png") }}">
                                    </div>
                                @endif
                                <img src="{{ asset('images/new_logo.png') }}" alt="" class="smojilogostriker">
                            </div>
                            <div class="shareondesktop d-none" onclick="screenshot('{{$ibox}}','currentpage')" style="cursor: pointer;"><i class="material-icons" style="font-size: 25px;">visibility</i></div>
                        </div>
                    </div>
                    <center>        
                      @if ( $is_premium == "blur" )
                            <!-- <div class="col-md-12  btn btn-primary  submit-btn" > Get Raunchy! </div> -->
                            <div class="col-md-12  btn btn-primary" > <a href="/premium" class="text-white">Get Raunchy!</a> </div>
                      @endif
                    </center>

                </div>
            @endfor

        </div>
        <!--End :  Premium -->
        
  
        <!--Start :  Valentine -->
        <div class="row justify-content-center" id="">
            @php
              $subscription = 'valentine';
            @endphp
            @for( $i = 1; $i <= ${$gender}['counts'][$subscription]; $i++ )           
            @php
              $ibox = 'mystrikerBox'.$subscription.'-'.$gender . '-' . $i;
              $main_ibox = 'main_'.$subscription.'-'.$gender . '-' . $i;
            @endphp
                <div class="box-width mb-4" onclick="screenshotValentine('{{$main_ibox}}','{{$ibox}}','currentpage')">

                    <div class="card resultContainer" id="{{$main_ibox}}">

                        <div class="card-body {{$is_valentine}}" id="{{$ibox}}" >

                            <div class="resultFinal" >

                                <div id="resultSticker{{$subscription.'-'.$gender . '-' . $i}}" class="resultSticker">
                                    <img src="{{ asset('images/results/'.$subscription.'/stickers/'.$gender.'/'.$i.'.png') }}" class="share-imag">
                                </div>
                                

                                <div id="resultBase{{$subscription.'-'.$gender . '-' . $i}}" class="resultSkin">
                                    <img src="{{ asset('images/results/'.$subscription.'/pose/'.$gender.'/pose-'.$i.'/'.$skin_result.'-01.png') }}">
                                </div>

                                <div id="resultHair{{$subscription.'-'.$gender . '-' . $i}}" class="resultHair">
                                    <img src="{{ asset('images/results/hair/'.$gender.'/'.$hair_result.'.png') }}">
                                </div>

                                @if ( $gender == "female" )
                                    <div id="resultLip{{$subscription.'-'.$gender . '-' . $i}}" class="resultLip">
                                        <img src="{{ asset("images/lip/" . $gender . "/" . $lip_result . ".png") }}">
                                    </div>
                                @endif
                                
                                  <div id="resultEyes{{$subscription.'-'.$gender . '-' . $i}}" class="resultEyes">
                                      <img src="{{ asset("images/eyes/" . $gender . "/" . $eye_result . ".png") }}">
                                  </div>
                                

                                @if ( $gender == "male" && $beard_result != "1")
                                    <div id="resultBeard{{$subscription.'-'.$gender . '-' . $i}}" class="resultBreads">
                                        <img src="{{ asset("images/beards/thumbnail/" . $beard_result . ".png") }}">
                                    </div>
                                @endif
                                <img src="{{ asset('images/new_logo.png') }}" alt="" class="smojilogostriker">
                            </div>
                            <div class="shareondesktop d-none" onclick="screenshot('{{$ibox}}','currentpage')" style="cursor: pointer;"><i class="material-icons" style="font-size: 25px;">visibility</i></div>
                        </div>
                    </div>
                    <center>        
                      @if ( $is_valentine == "blur" )
                            <div class="col-md-12  btn btn-primary  submit-btn-valentine" > Valentines Day Package </div>
                      @endif
                    </center>

                </div>
            @endfor

        </div>
        <!-- End  :  Valentine -->


    </div>



    <div  id="backdropmodal" class="d-none">
      <div class="modal" id="favoritesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
               
                <div class="modal-body">
                      <span id="bodyhtml"></span>
                      <span id="btnlink"></span>
                </div>
                <div class="" style="border-top: 1px solid #ddd;color: #000;">        
                  <div style="float: left;text-align: left;padding: 7px 0 0 20px;">Long Press Image to Share!</div>
                  <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>            
                </div>

                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>            
                </div> -->
              </div>
            </div>
      </div>
    </div>



@endsection


    
@section('js')
    
  

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type='text/javascript'>

        
        //when modal opens
        $('#favoritesModal').on('shown.bs.modal', function (e) {
          /*$(".page").css({ opacity: 0.5 });*/
          $("#backdropmodal").removeClass('d-none');
        })

        //when modal closes
        $('#favoritesModal').on('hidden.bs.modal', function (e) {
          /*$(".page").css({ opacity: 1 });*/
          $("#backdropmodal").addClass('d-none');
        })


        var ua = navigator.userAgent.toLowerCase();
        var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
        if(isAndroid) {}
        var iswindows = ua.indexOf("windows") > -1; //&& ua.indexOf("mobile");
        /*if(iswindows) {
            $('.share-button').addClass('d-none');
            $('.shareondesktop').removeClass('d-none');
        }else{
          $('.share-button').removeClass('d-none');
          $('.shareondesktop').addClass('d-none');
        }*/

          
  

        function screenshot(mainId,iddiv,type){
          $("#loaderback").removeClass('d-none');
          var downId = iddiv+'_download';
            console.log('clicked ' + iddiv);
            console.log('clicked ' + iddiv);
           //var boxSave = document.getElementById('boxSave');
           var boxSave = 'mystrikerBoxfree-male-1';
           $('#'+iddiv).find('.shareondesktop').addClass('d-none');
           html2canvas( document.getElementById(iddiv), {scale: 2} ).then(function(canvas) {

              canvas.id = iddiv;
              var main = document.getElementById(mainId);
              while (main.firstChild) { main.removeChild(main.firstChild); }
              main.appendChild(canvas);
              //this.href = document.getElementById("canvasID").toDataURL();
              //this.download = "canvas-image.png";
              //console.log('this.download');
              //console.log(this.download);

             /*var idprev = 'previ_'+iddiv;
             document.getElementById(idprev).appendChild(canvas);*/

             //var boxPrev = document.getElementById('previ_mystrikerBoxfree-male-1');

             //document.body.appendChild(canvas);
             //document.body.appendChild(canvas);

             // Get base64URL
                  var base64URL = document.getElementById(iddiv).toDataURL();

              
                   $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
                   });
                   jQuery.ajax({
                      url: "{{ url('/smoji/saveimg') }}",
                      method: 'post',
                      type:'json',
                      data: {
                        "_token": "{{ csrf_token() }}",
                        image: base64URL
                      },
                      success: function(result){
                        console.log(result);     
                        $('#'+iddiv).find('.shareondesktop').removeClass('d-none');
                        $("#loaderback").addClass('d-none');                    
                        showimageonModal(result);

                      }
                   });
                   



           });
        }

        /*$(function() {
            $('#favoritesModal').on("show.bs.modal", function (e) {
                
                 //var imageName = $(e.relatedTarget).data('title');
                 var imageName = 'screenshot_5e22ac358f0d4.png';
                 var htmldata = '<img style="width: 100%;" src="{{ asset("uploads") }}/'+imageName+' ">';                 
                 var btnlink = '<a  class="btn btn-primary btn-lg"  href="{{ url("/smoji/download") }}/'+imageName+'">Download</a>';
                 //$("#favoritesModalLabel").html($(e.relatedTarget).data('title'));
                 //$("#fav-title").html($(e.relatedTarget).data('title'));
                 $("#bodyhtml").html(htmldata);
                 //$("#btnlink").html(btnlink);
            });
        });*/

        function showimageonModal(imageName){

                 console.log('image Name = ' + imageName);
                 $('#favoritesModal').modal('show');
                 //var imageName = $(e.relatedTarget).data('title');
                 //var imageName = 'screenshot_5e22ac358f0d4.png';
                 var htmldata = '<img style="width: 100%;" src="{{ asset("uploads") }}/'+imageName+' ">';                 
                 var btnlink = '<a  class="btn btn-primary btn-lg"  href="{{ url("/smoji/download") }}/'+imageName+'">Download</a>';
                 $("#bodyhtml").html(htmldata);
                 //$("#btnlink").html(btnlink);
            
        } 


        function showallscreenshot(){
          
          //screenshot('mystrikerBoxfree-male-1');
          var total_size = $(".mygeneratedButton").length;
          var tot = parseInt(total_size - 1);
          console.log(total_size);
          
          $(".mygeneratedButton").each(function(index) {  
              var thisId = $(this).attr('id');      
              (function(that, i) { 
                  var t = setTimeout(function() {                     
                    screenshot(thisId);
                    console.log('click 3 sec . index' + i);
                    if(index == tot){
                      a.close();
                    }
                  }, 6000 * i);


              })(this, index);
              
          });

        }
    </script>
    
    
    <script type="text/javascript" src="https://malsup.github.io/jquery.form.js"></script>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script type="text/javascript">

        
        function showProcessing() {
            $('.subscribe-process').show();
        }

        function hideProcessing() {
            $('.subscribe-process').hide();
        }
        
        // Handling and displaying error during form submit.
        function subscribeErrorHandler(jqXHR, textStatus, errorThrown) {
                try{
                    var resp = JSON.parse(jqXHR.responseText);
                    if ('error_param' in resp) {
                        var errorMap = {};
                        var errParam = resp.error_param;
                        var errMsg = resp.error_msg;
                        errorMap[errParam] = errMsg;
                        $("#subscribe-form").validate().showErrors(errorMap);
                    } else {
                        var errMsg = resp.error_msg;
                        $(".alert-danger").show().text(errMsg);
                    }
                } catch(err) {
                    $(".alert-danger").show().text("Error while processing your request");
                }
        }
        
        // Forward to thank you page after receiving success response.
        function subscribeResponseHandler(responseJSON) {
            console.log(responseJSON);
            //window.location.replace(responseJSON.forward);
            window.location.href = '/smoji/thanks';
        }

        
        function handleStripeToken(token, args) {
                    form = $("#subscribe-form");
                    $("input[name='stripeToken']").val(token.id );
                    var options = {
                        beforeSend: showProcessing,
                        // post-submit callback when error returns
                        error: subscribeErrorHandler, 
                        // post-submit callback when success returns
                        success: subscribeResponseHandler, 
                        complete: hideProcessing,
                        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        dataType: 'json'
                    };
                    // Doing AJAX form submit to your server.
                    form.ajaxSubmit(options);
                    return false;
                }
        
                
        $(document).ready(function() {
            // Creating Stripe Checkout handler object and also 
            // configuring Stripe publishable key and setting the options in Stripe Js.
            var handler = StripeCheckout.configure({
                //Replace it with your stripe publishable key
                //key: '{{env("STRIPE_PUBLISHABLE_KEY")}}',
                key: '{{ $stripe_publishable_key }}',
                image: "{{ asset('images/favicon.png') }}",
                allowRememberMe: false,
                token: handleStripeToken
            });
            

            
            // Calling Stripe Js to display pop up on button click event
            $(".submit-btn").on('click', function(e) {
                $("input[name='packagetype']").val('premium');
                $('#subscribe-form').attr('action','/smoji/payment');
                handler.open({
                       name: 'Smoji Premium',
                       description: 'plan for premium $2.99' ,
                       amount: 299 ,
                       email: '{{$user_email}}' ,
                });
                return false;
            });

            $(".submit-btn-valentine").on('click', function(e) {
                $("input[name='packagetype']").val('valentine');
                $('#subscribe-form').attr('action','/smoji/paymentValentine');
                handler.open({
                       name: 'Valentines Day Package',
                       description: 'plan for Valentines Day  $5.00' ,
                       amount: 500 ,
                       email: '{{$user_email}}' ,
                });
                return false;
            });
            
            
        });
    </script>

    @if ( $is_premium != "blur" )
    <script type='text/javascript'>
        function screenshotPrem(mainId,iddiv,type){
          $("#loaderback").removeClass('d-none');
          var downId = iddiv+'_download';
            console.log('clicked ' + iddiv);
            console.log('clicked ' + iddiv);
           //var boxSave = document.getElementById('boxSave');
           var boxSave = 'mystrikerBoxfree-male-1';
           $('#'+iddiv).find('.shareondesktop').addClass('d-none');
           html2canvas( document.getElementById(iddiv), {scale: 2} ).then(function(canvas) {

              canvas.id = iddiv;
              var main = document.getElementById(mainId);
              while (main.firstChild) { main.removeChild(main.firstChild); }
              main.appendChild(canvas);
              //this.href = document.getElementById("canvasID").toDataURL();
              //this.download = "canvas-image.png";
              //console.log('this.download');
              //console.log(this.download);

             /*var idprev = 'previ_'+iddiv;
             document.getElementById(idprev).appendChild(canvas);*/

             //var boxPrev = document.getElementById('previ_mystrikerBoxfree-male-1');

             //document.body.appendChild(canvas);
             //document.body.appendChild(canvas);

             // Get base64URL
                  var base64URL = document.getElementById(iddiv).toDataURL();

              
                   $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
                   });
                   jQuery.ajax({
                      url: "{{ url('/smoji/saveimg') }}",
                      method: 'post',
                      type:'json',
                      data: {
                        "_token": "{{ csrf_token() }}",
                        image: base64URL
                      },
                      success: function(result){
                        console.log(result);     
                        $('#'+iddiv).find('.shareondesktop').removeClass('d-none');
                        $("#loaderback").addClass('d-none');                    
                        showimageonModal(result);

                      }
                   });
                   



           });
        }
    </script>
    @else
    <script type='text/javascript'>
        function screenshotPrem(mainId,iddiv,type){
           alert('Purchase plan');
        }
    </script>
    @endif
    @if ( $is_valentine != "blur" )
    <script type='text/javascript'>
        function screenshotValentine(mainId,iddiv,type){
          $("#loaderback").removeClass('d-none');
          var downId = iddiv+'_download';
            console.log('clicked ' + iddiv);
            console.log('clicked ' + iddiv);
           //var boxSave = document.getElementById('boxSave');
           var boxSave = 'mystrikerBoxfree-male-1';
           $('#'+iddiv).find('.shareondesktop').addClass('d-none');
           html2canvas( document.getElementById(iddiv), {scale: 2} ).then(function(canvas) {

              canvas.id = iddiv;
              var main = document.getElementById(mainId);
              while (main.firstChild) { main.removeChild(main.firstChild); }
              main.appendChild(canvas);
              
                  var base64URL = document.getElementById(iddiv).toDataURL();

              
                   $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
                   });
                   jQuery.ajax({
                      url: "{{ url('/smoji/saveimg') }}",
                      method: 'post',
                      type:'json',
                      data: {
                        "_token": "{{ csrf_token() }}",
                        image: base64URL
                      },
                      success: function(result){
                        console.log(result);     
                        $('#'+iddiv).find('.shareondesktop').removeClass('d-none');
                        $("#loaderback").addClass('d-none');                    
                        showimageonModal(result);

                      }
                   });
                   



           });
        }
    </script>
    @else
    <script type='text/javascript'>
        function screenshotValentine(mainId,iddiv,type){
           alert('Purchase plan');
        }
    </script>
    @endif
@endsection
 