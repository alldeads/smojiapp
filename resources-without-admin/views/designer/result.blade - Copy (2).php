@extends('layouts.app')

@section('page-content')


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
          <h3 class="page-header">Where would you like us to deliver
              <small>(Only shipped within USA)</small>
          </h3>
          <!-- <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="shipping_address[line1]">Address</label>
                      <input type="text" class="form-control" name="shipping_address[line1]" 
                             maxlength=50 required data-msg-required="cannot be blank" value="omnagar">
                      <small for="shipping_address[line1]" class="text-danger"></small>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="shipping_address[line2]">Address2</label>
                      <input type="text" class="form-control" name="shipping_address[line2]" maxlength=50 value="add 2">
                      <small for="shipping_address[line2]" class="text-danger"></small>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="shipping_address[city]">City</label>
                      <input type="text" class="form-control" name="shipping_address[city]" maxlength=50
                             required data-msg-required="cannot be blank" value="rajpur">
                      <small for="shipping_address[city]" class="text-danger"></small>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="shipping_address[state]">State</label>
                      <input type="text" class="form-control" name="shipping_address[state]" maxlength=20
                             required data-msg-required="cannot be blank" value="gujrat">
                      <small for="shipping_address[state]" class="text-danger"></small>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="shipping_address[zip_code]">Zip Code</label>
                      <input id="zip_code" type="text" class="form-control" name="shipping_address[zip_code]" 
                             maxlength=10 required number data-msg-required="cannot be blank" value="7544212">
                      <small for="shipping_address[zip_code]" class="text-danger"></small>
                  </div>
              </div>                                                
          </div> --> 
          <input type="hidden" name="stripeToken" value="" />
          <hr>                            
          <p><small class="text-danger" style="display:none;">There were errors while submitting</small></p>
          <p><input id="submit-btn" type="submit" class="btn btn-success btn-lg pull-left" value="Proceed to Payment">&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="subscribe-process process" style="display:none;">Processing&hellip;</span>
              <small class="alert-danger text-danger"></small>
          </p>
    </form>


    <div class="container-fluid">
        <div class="row justify-content-center" id="">
            @php
              $subscription = 'free';
            @endphp
            @for( $i = 1; $i <= ${$gender}['counts'][$subscription]; $i++ )           
            @php
              $ibox = 'mystrikerBox'.$subscription.'-'.$gender . '-' . $i;
            @endphp
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-4" >

                    <div class="card resultContainer">

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
                                

                                @if ( $gender == "male" )
                                    <div id="resultBeard{{$subscription.'-'.$gender . '-' . $i}}" class="resultBreads">
                                        <img src="{{ asset("images/beards/thumbnail/" . $beard_result . ".png") }}">
                                    </div>
                                @endif

                            </div>

                            <!-- <span class="mygenDownBtn">Download</span> -->
                        </div>
                    </div>

                    <center>                         
                      <div class="" style="clear: both;margin: 5px auto;display: none;">
                        <div onclick="screenshot('{{$ibox}}','download')" style="float: left;" class="col-md-5  pull-left btn btn-primary mygeneratedButton" id="{{$ibox}}">Download</div>
                        <div onclick="screenshot('{{$ibox}}','share')" class="col-md-5 btn btn-primary  shareonfacebook" id="{{$ibox}}" 
                        style="background-color: #4267b2;float: right;background-image: none;">Share on Facebook</div>
                      </div>
                      <!-- <a target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;" 
                      href="https://www.facebook.com/sharer/sharer.php?u=https://run.smojiapp.com/images/templates/male/skins/thumbnail/2.png&picture=https://run.smojiapp.com/images/templates/male/skins/thumbnail/2.png&title=titlehere&description=Yourdescription">
                        shareon facebook
                      </a> -->


                        <!-- AddToAny END -->
                        

                        <!-- <div id="previ_{{$ibox}}"></div> -->
                    </center>
                </div>
            @endfor

        </div>
        <div class="row justify-content-center" id="">
            @php
              $subscription = 'premium';
            @endphp
            @for( $i = 1; $i <= ${$gender}['counts'][$subscription]; $i++ )           
            @php
              $ibox = 'mystrikerBox'.$subscription.'-'.$gender . '-' . $i;
            @endphp
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-4" >

                    <div class="card resultContainer">

                        <div class="card-body" id="{{$ibox}}" style="filter: blur(6px);">

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
                                

                                @if ( $gender == "male" )
                                    <div id="resultBeard{{$subscription.'-'.$gender . '-' . $i}}" class="resultBreads">
                                        <img src="{{ asset("images/beards/thumbnail/" . $beard_result . ".png") }}">
                                    </div>
                                @endif

                            </div>

                            <!-- <span class="mygenDownBtn">Download</span> -->
                        </div>
                    </div>

                    <center>        
                      <div class="col-md-12  btn btn-primary  submit-btn" >Go Premium</div>                 
                      <div class="" style="clear: both;margin: 5px auto;display: none;">
                        <div onclick="screenshot('{{$ibox}}','download')" style="float: left;" class="col-md-5  pull-left btn btn-primary mygeneratedButton" id="{{$ibox}}">Download</div>
                        <div onclick="screenshot('{{$ibox}}','share')" class="col-md-5 btn btn-primary  shareonfacebook" id="{{$ibox}}" 
                        style="background-color: #4267b2;float: right;background-image: none;">Share on Facebook</div>
                      </div>
                      <!-- <a target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;" 
                      href="https://www.facebook.com/sharer/sharer.php?u=https://run.smojiapp.com/images/templates/male/skins/thumbnail/2.png&picture=https://run.smojiapp.com/images/templates/male/skins/thumbnail/2.png&title=titlehere&description=Yourdescription">
                        shareon facebook
                      </a> -->


                        <!-- AddToAny END -->
                        

                        <!-- <div id="previ_{{$ibox}}"></div> -->
                    </center>
                </div>
            @endfor

        </div>

    </div>


    <div class="modal" id="favoritesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
             
              <div class="modal-body">
                    <span id="bodyhtml"></span>
                    <span id="btnlink"></span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>            
              </div>
            </div>
          </div>
    </div>

@endsection


    
    @section('js')


    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/javascript">

      /*var a = $.dialog({
            icon: 'fa fa-spinner fa-spin',
            title: 'Wait ...!',
            content: 'Your smoji is creating...',
            animation: 'scale',
            columnClass: 'medium',
            closeAnimation: 'scale',
            closeIcon: false,
            backgroundDismiss: true,
            onContentReady: function () {
                var self = this;
                //this.setContentPrepend('<div>Prepended text</div>');
                setTimeout(function () {
                    //self.setContentAppend('<div>Appended text after 2 seconds</div>');
                    showallscreenshot();
                }, 2000);
            },
            keyboardEnabled: false,
            backgroundDismiss: false,
            theme: 'supervan',
              });

      a.open();*/

      /*setTimeout(function() { 
        a.close();
      }, 5000 );*/


                    
                   
    </script>
    <script type='text/javascript'>

        function screenshot(iddiv,type){
          var downId = iddiv+'_download';
            console.log('clicked ' + iddiv);
            console.log('clicked ' + iddiv);
           //var boxSave = document.getElementById('boxSave');
           var boxSave = 'mystrikerBoxfree-male-1';
           html2canvas( document.getElementById(iddiv) ).then(function(canvas) {
             /*var idprev = 'previ_'+iddiv;
             document.getElementById(idprev).appendChild(canvas);*/

             //var boxPrev = document.getElementById('previ_mystrikerBoxfree-male-1');

             //document.body.appendChild(canvas);
             //document.body.appendChild(canvas);

             // Get base64URL
             var base64URL = canvas.toDataURL('image/jpeg').replace('image/jpeg', 'image/octet-stream');

              
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
                         

                         
                         //var btnDwnLnk = '<a  class="btn btn-primary btn-lg" id="'+downId+'" href="{{ url("/smoji/download") }}/'+result+'">Download</a>';
                         //$("#"+iddiv).find('.mygenDownBtn').html(btnDwnLnk);
                         //$("#"+iddiv).find('.mygenDownBtn').css('display','none');
                        if(type == 'download'){

                          var htmldata = '<img  style="width: 100%;" src="{{ asset("uploads") }}/'+result+' ">';  
                          var htmldata = '<img  style="width: 100%;" src="{{ asset("uploads") }}/'+result+' ">';  
                          $("#"+iddiv).find('.resultFinal').html(htmldata);

                          setTimeout(function() { 
                            window.location.href = '{{ url("/smoji/download") }}/'+result+'';
                          }, 1000 );

                        }
                        if(type == 'share'){
                            
                          imagelink = '{{ asset("uploads") }}/'+result;
                          console.log(imagelink);
                          var url = imagelink;
                          var title = 'title';
                          var descr = imagelink;
                          var image = imagelink;
                          var winWidth = '600';
                          var winHeight = '250';
                          
                          //https://www.facebook.com/sharer/sharer.php?u=https://run.smojiapp.com/images/templates/male/skins/thumbnail/2.png&picture=https://run.smojiapp.com/images/templates/male/skins/thumbnail/2.png&title=titlehere&description=Yourdescription

                              var winTop = (screen.height / 2) - (winHeight / 2);
                              var winLeft = (screen.width / 2) - (winWidth / 2);
                              window.open('http://www.facebook.com/sharer.php?u=' + url + '&picture=' + image + '&title=' + title + '&description=' + descr, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width='+winWidth+',height='+winHeight);
                          

                        }
                         //showimageonModal(result);
                      }
                   });
                   



           });
        }

        $(function() {
            $('#favoritesModal').on("show.bs.modal", function (e) {
                
                 //var imageName = $(e.relatedTarget).data('title');
                 var imageName = 'screenshot_5e22ac358f0d4.png';
                 var htmldata = '<img style="width: 100%;" src="{{ asset("uploads") }}/'+imageName+' ">';                 
                 var btnlink = '<a  class="btn btn-primary btn-lg"  href="{{ url("/smoji/download") }}/'+imageName+'">Download</a>';
                 //$("#favoritesModalLabel").html($(e.relatedTarget).data('title'));
                 //$("#fav-title").html($(e.relatedTarget).data('title'));
                 $("#bodyhtml").html(htmldata);
                 $("#btnlink").html(btnlink);
            });
        });

        function showimageonModal(imageName){

                 console.log('image Nmae' + imageName);
                 $('#favoritesModal').modal('show');
                 //var imageName = $(e.relatedTarget).data('title');
                 //var imageName = 'screenshot_5e22ac358f0d4.png';
                 var htmldata = '<img style="width: 100%;" src="{{ asset("uploads") }}/'+imageName+' ">';                 
                 var btnlink = '<a  class="btn btn-primary btn-lg"  href="{{ url("/smoji/download") }}/'+imageName+'">Download</a>';
                 $("#bodyhtml").html(htmldata);
                 $("#btnlink").html(btnlink);
            
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













        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js"></script>
        <script type="text/javascript" src="http://malsup.github.io/jquery.form.js"></script>
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
        
        
        
        <script src="https://checkout.stripe.com/checkout.js">           
        </script>
        
        
        <!-- It is better to have the below script as separate file.-->
        <script type="text/javascript">
            // Setting the error class and error element for form validation.
            jQuery.validator.setDefaults({
                errorClass: "text-danger",
                errorElement: "small"
            });
            
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
                $("#subscribe-form").validate({
                    rules: {
                        zip_code: {number: true},
                        phone: {number: true}
                    }
                });
                
                
                // Creating Stripe Checkout handler object and also 
                // configuring Stripe publishable key and setting the options in Stripe Js.
                var handler = StripeCheckout.configure({
                    //Replace it with your stripe publishable key
                    key: '{{env("STRIPE_PUBLISHABLE_KEY")}}',
                    image: "{{ asset('images/favicon.png') }}",
                    allowRememberMe: false,
                    token: handleStripeToken
                });
                

                
                // Calling Stripe Js to display pop up on button click event
                $("#submit-btn").on('click', function(e) {
                    var form = $("#subscribe-form");
                    if(!$(form).valid()) {
                        return false;
                    }
                    handler.open({
                           name: 'Smoji Premium',
                           description: 'plan for premium $1.00' ,
                           amount: 100 ,
                           email: $('#email').val() ,
                    });
                    return false;
                });
                
                
            });
        </script>
    @endsection
 