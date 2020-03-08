@extends('layouts.app')

@section('page-content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <h3>Get Raunchy!</h3><hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="    margin: 0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </div>

        <div class="col-md-6 offset-md-3">
            
            <div class="card">
                <div class="card-header">You plan</div>

                <div class="card-body bgsyan">
                    
                          
                        <section class="pricing py-5">
                          <div class="container">
                            <div class="row">
                              @php 
                                    $activated = '';
                                    $freeactivated = '';
                              @endphp
                              @if ( $plan != "" )

                                    @php 
                                        $activated = 'activated';
                                        $btnlbl_free = 'Free';
                                        $btnlbl_plan = 'Activated';
                                    @endphp  

                              @else

                                    @php
                                        $freeactivated = 'activated';
                                        $btnlbl_plan = 'buy now';
                                        $btnlbl_free = 'Activated';
                                    @endphp    

                              @endif
                              <!-- Free Tier -->
                              <div class="col-lg-6">
                                <div class="card mb-5 mb-lg-0">
                                  <div class="card-body ">
                                    <h5 class="card-title text-muted text-uppercase text-center planname">Free</h5>
                                    <h6 class="card-price text-center">$0<span class="period">/month</span></h6>
                                    <hr>
                                    <ul class="fa-ul">
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Get Access to all free stickers</li>
                                      <li style="list-style: none;">&nbsp;</li>
                                    </ul>
                                    <a href="#" class="btn btn-block btn-primary text-uppercase {{$freeactivated}}">{{$btnlbl_free}}</a>
                                  </div>
                                </div>
                              </div>
                              
                              <!-- Plus Tier -->
                              <div class="col-lg-6">
                                <div class="card mb-5 mb-lg-0">
                                  <div class="card-body">
                                    <h5 class="card-title text-muted text-uppercase text-center planname">Get Raunchy!</h5>
                                    <h6 class="card-price text-center">$2.99<span class="period">/month</span></h6>
                                    <hr>
                                    <ul class="fa-ul">
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Get Access to all free stickers</li>
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Get Access to all Premium sticker</strong></li>
                                    </ul>
                                    <a href="javascript:void(0)" class="btn btn-block btn-primary text-uppercase {{$activated}} submit-btn">{{$btnlbl_plan}}</a>
                                  </div>
                                </div>
                              </div>
                              

                            </div>
                          </div>
                        </section>

                </div>
            </div>
        </div>    
        
    </div>
</div>




@if ( $plan == "" )
<!-- stripe form -->
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
        <hr>                            
        <p><small class="text-danger" style="display:none;">There were errors while submitting</small></p>
        <p><input id="submit-btn" type="submit" class="btn btn-success btn-lg pull-left" value="Proceed to Payment">&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="subscribe-process process" style="display:none;">Processing&hellip;</span>
            <small class="alert-danger text-danger"></small>
        </p>
  </form>
</div>
<!-- stripe form -->
@endif

@endsection


@section('js')
    @if ( $plan == "" )
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
                key: '{{env("STRIPE_PUBLISHABLE_KEY")}}',
                image: "{{ asset('images/favicon.png') }}",
                allowRememberMe: false,
                token: handleStripeToken
            });
            

            
            // Calling Stripe Js to display pop up on button click event
            $(".submit-btn").on('click', function(e) {
                
                handler.open({
                       name: 'Smoji Premium',
                       description: 'plan for premium $2.99' ,
                       amount: 299 ,
                       email: '{{$user_email}}' ,
                });
                return false;
            });
            
            
        });
    </script>
    @endif 
@endsection



