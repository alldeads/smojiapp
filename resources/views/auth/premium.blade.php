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

                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{!! \Session::get('error') !!}</li>
                        </ul>
                    </div>
                @endif

        </div>

        <div class="col-md-8 offset-md-2">
            
            <div class="card">
                <div class="card-header">Your subscriptions</div>

                <div class="card-body bgsyan">
                    
                          
                        <section class="pricing py-5">
                          <div class="container">
                            <div class="row">
                              @php 
                                    $activated = '';
                                    $freeactivated = '';
                              @endphp
                              @if ( $is_subcription_on == "yes" )

                                    @php 
                                        $activated = 'Active';
                                        $btnlbl_free = 'Free';
                                        $btnlbl_plan = 'Active';
                                    @endphp  

                              @else

                                    @php
                                        $freeactivated = 'Active';
                                        $btnlbl_plan = 'buy now';
                                        $btnlbl_free = 'Active';
                                    @endphp    

                              @endif

                              
                              <!-- Free Tier -->
                              <div class="col-lg-4">
                                <div class="card mb-5 mb-lg-0">
                                    <h5 class="card-title text-muted text-uppercase text-center mt-5 planname">Free</h5>
                                  <div class="card-body ">
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
                              <div class="col-lg-4">
                                <div class="card mb-5 mb-lg-0">
                                    <h5 class="card-title text-muted text-uppercase text-center mt-5 planname">Get Raunchy!</h5>
                                  <div class="card-body">
                                    
                                    @if ($is_subcription_on == 'yes' )

                                        <h6 class="card-price text-center amount">{{$amount}}<span class="period pertype">/ {{$plan_period_type}}</span></h6>
                                    @else
                                        <div class="row justify-content-center">
                                            <div class="" style="margin-right: 10px;">
                                                <label class="container_radio">Monthly
                                                  <input type="radio" checked="checked" name="radioplantype" value="monthly">
                                                  <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="">
                                                <label class="container_radio">Annual pay
                                                  <input type="radio" name="radioplantype" value="yearly" id="preradio">
                                                  <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <h6 class="card-price text-center amount">$2.99<span class="period pertype">/ Month</span></h6>
                                    @endif

                                    <hr>
                                    <ul class="fa-ul">
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Get Access to all free stickers</li>
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Get Access to all Premium sticker</strong></li>
                                    </ul>

                                    @if ( $is_subcription_on == "yes" )
                                        <a href="javascript:void(0)" class="btn btn-block btn-primary text-uppercase activated ">Active</a>
                                    @else
                                        <a href="javascript:void(0)" class="btn btn-block btn-primary text-uppercase  submit-btn">Buy Now</a>
                                    @endif

                                    @if ($is_subcription_on == 'yes' && $last_date_sub != NULL )
                                        <div class="text-danger text-center" style="margin-top: 5px;font-size: 14px;">You subscription will stop on {{$last_date_sub}}</div>
                                    @endif
                                    
                                    @if ( $last_date_sub == "" && $is_subcription_on == 'yes' )

                                        <a href="/cancel" class="btn btn-block btn-danger text-uppercase">Cancel</a>
                                    @endif

                                            
                                  </div>
                                </div>
                              </div>


                              <!-- Plus Tier -->
                              <div class="col-lg-4">
                                <div class="card mb-5 mb-lg-0">
                                    <h5 class="card-title text-muted text-uppercase text-center mt-5 planname bg-danger">Valentines day!</h5>
                                  <div class="card-body">
                                        <h6 class="card-price text-center">$5<span class="period">/ One time</span></h6>
                                    <hr>
                                    <ul class="fa-ul">
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span>Get Access to all free stickers</li>
                                      <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Get Access to all Valentines day sticker</strong></li>
                                    </ul>

                                    @if ( $is_valentine_package == "yes" )
                                        <a href="javascript:void(0)" class="btn btn-block btn-primary text-uppercase activated">Activated</a>
                                    @else
                                        <a href="javascript:void(0)" class="btn btn-block btn-primary text-uppercase submit-btn-valentine">Buy now</a>
                                    @endif

                                   


                                            
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




@if ( $is_subcription_on == "no" || $is_valentine_package != "yes" )
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
        <input type="hidden" name="plantype" id="plantype" value="monthly" />
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
    
    @if ( $is_subcription_on == "no" || $is_valentine_package != "yes" )
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
            console.log('page response call');
            console.log(responseJSON);
            //window.location.replace(responseJSON.forward);
            window.location.href = '/smoji/thanks';
        }

        
        function handleStripeToken(token, args) {
                    form = $("#subscribe-form");
                    $("input[name='stripeToken']").val(token.id);
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
                key: '{{ $stripe_publishable_key }}',
                image: "{{ asset('images/favicon.png') }}",
                allowRememberMe: false,
                token: handleStripeToken
            });
            

            
            // Calling Stripe Js to display pop up on button click event
            $(".submit-btn").on('click', function(e) {
                $('#subscribe-form').attr('action','/smoji/payment');
                var radioValue = $("input[name='radioplantype']:checked").val();
                if(radioValue == 'monthly'){
                    amount = 299;
                    var desc =  'plan for premium $2.99/monthly';
                }else{
                    amount = 3588;                    
                    var desc = 'plan for premium $35.55/Yearly';
                }
                handler.open({
                       name: 'Smoji Premium',
                       description: desc ,
                       amount: amount ,
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
    <script>
        $(document).ready(function(){
            $("input[type='radio']").click(function(){
                var radioValue = $("input[name='radioplantype']:checked").val();
                if(radioValue == 'monthly'){
                    var txt = '$2.99<span class="period pertype">/ Month</span>';
                    $('.amount').html(txt);
                    $('#plantype').val('monthly');
                }else{
                    var txt = '$35.88‬<span class="period pertype">/ Annual pay</span>';               
                    $('.amount').html(txt);
                    $('#plantype').val('yearly');
                }
            });
        });
    </script>
    @endif 
@endsection



