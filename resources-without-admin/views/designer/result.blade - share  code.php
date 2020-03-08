@extends('layouts.app')

@section('page-content')

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
        padding: 5px 1px 0px 3px;
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
      bottom: 6px;
      left: 4px;
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

        <div class="row justify-content-center" id="">
            @php
              $subscription = 'free';
            @endphp
            @for( $i = 1; $i <= ${$gender}['counts'][$subscription]; $i++ )           
            @php
              $ibox = 'mystrikerBox'.$subscription.'-'.$gender . '-' . $i;
            @endphp
                <div class="box-width mb-4" >

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
                                
                                @if ( $gender == "male" && $beard_result != "1")
                                    
                                    <div id="resultBeard{{$subscription.'-'.$gender . '-' . $i}}" class="resultBreads">
                                        <img src="{{ asset("images/beards/thumbnail/" . $beard_result . ".png") }}">
                                    </div>
                                    
                                @endif
                                <img src="{{ asset('images/favicon.png') }}" alt="" class="smojilogostriker">

                            </div>
                            <div class="shareonmobile share-button d-none" onclick="screenshotCurrentpage('{{$ibox}}','currentpage')"><i class="material-icons" style="font-size: 20px;">share</i></div>
                            <div class="shareondesktop" onclick="screenshotCurrentpage('{{$ibox}}','currentpage')" style="cursor: pointer;"><i class="material-icons" style="font-size: 25px;">share</i></div>
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
                <div class="box-width mb-4" >

                    <div class="card resultContainer">

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
                                

                                @if ( $gender == "male" )
                                    <div id="resultBeard{{$subscription.'-'.$gender . '-' . $i}}" class="resultBreads">
                                        <img src="{{ asset("images/beards/thumbnail/" . $beard_result . ".png") }}">
                                    </div>
                                @endif
                                <img src="{{ asset('images/favicon.png') }}" alt="" class="smojilogostriker">
                            </div>
                            <div class="shareonmobile share-button d-none" onclick="screenshotCurrentpage('{{$ibox}}','currentpage')"><i class="material-icons" style="font-size: 20px;">share</i></div>
                            <div class="shareondesktop" onclick="screenshotCurrentpage('{{$ibox}}','currentpage')" style="cursor: pointer;"><i class="material-icons" style="font-size: 25px;">share</i></div>
                            <!-- <span class="mygenDownBtn">Download</span> -->
                        </div>
                    </div>

                    <center>        
                      @if ( $is_premium == "blur" )
                            <div class="col-md-12  btn btn-primary  submit-btn" >Go Premium</div>
                      @endif
                                       
                      
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


    <!-- <div class="a2a_kit a2a_default_style " id="shareondesktop" data-a2a-url="http://127.0.0.1:8000/smoji/savedresults/easd">
          <a class="a2a_dd" href="https://www.addtoany.com/share" id="clicktosharedesktop">
              <div class="shareondesktop"><i class="material-icons" style="font-size: 25px;">share</i></div>
          </a>
    </div> -->


    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
        <a class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        <a class="a2a_dd" href="https://www.addtoany.com/share"  id="clicktosharedesktop"></a>
    </div>
   

@endsection


    
@section('js')
    <script>
        var a2a_config = a2a_config || {};
        a2a_config.onclick = 2;
        </script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type='text/javascript'>

        

        var ua = navigator.userAgent.toLowerCase();
        var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
        if(isAndroid) {}
        var iswindows = ua.indexOf("windows") > -1; //&& ua.indexOf("mobile");
        if(iswindows) {
            $('.share-button').addClass('d-none');
            $('.shareondesktop').removeClass('d-none');
            //document.write('<script src="https://sharehulk.com/api/sharingbutton.php?type=horizontal&u=' + encodeURIComponent(document.location.href) + '"></scr' + 'ipt>')
        }else{
          $('.share-button').removeClass('d-none');
          $('.shareondesktop').addClass('d-none');
        }


        
        function screenshotCurrentpage(iddiv,type){
          $("#loaderback").removeClass('d-none');
          var downId = iddiv+'_download';
            console.log('clicked ' + iddiv);
            console.log('clicked ' + iddiv);
           var boxSave = 'mystrikerBoxfree-male-1';
           let final_iddiv = iddiv;

            var ua = navigator.userAgent.toLowerCase();
            var iswindows = ua.indexOf("windows") > -1;

            if(iswindows) {
               $('#'+final_iddiv).find('.shareondesktop').addClass('d-none');
            }else{
              $('#'+final_iddiv).find('.shareonmobile').addClass('d-none');
            }

           html2canvas( document.getElementById(final_iddiv) ).then(function(canvas) {
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
                         
                        if(iswindows) {
                           
                          $('#'+final_iddiv).find('.shareondesktop').removeClass('d-none');
                          setTimeout(function() {
                               a2a_config.linkname = 'Smoji';
                               a2a_config.linkurl = '{{ url("/smoji/detail") }}/'+result+'';
                               a2a.init('page');
                          }, 1500 );

                          setTimeout(function() {
                              $("#loaderback").addClass('d-none');
                              document.getElementById("clicktosharedesktop").click();
                          }, 3000 );

                        }else{

                          $('#'+final_iddiv).find('.shareonmobile').removeClass('d-none');
                          $("#loaderback").addClass('d-none');  
                          //document.querySelector('.share-button').addEventListener('click', function() {
                          if(navigator.share) {
                              navigator.share({
                                title: 'Smoji',
                                text: '',
                                url: '{{ url("/smoji/detail") }}/'+result+''
                              })
                              .then(() => console.log('Share complete'))
                              .error((error) => console.error('Could not share at this time', error))
                            }
                          //});
                          

                        }


                        
                        
                      }
                   });
                   



           });
        }

        function screenshotDetailpage(iddiv,type){
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
                        if(type == 'newpage'){

                          var htmldata = '<img  style="width: 100%;" src="{{ asset("uploads") }}/'+result+' ">';  
                          var htmldata = '<img  style="width: 100%;" src="{{ asset("uploads") }}/'+result+' ">';  
                          $("#"+iddiv).find('.resultFinal').html(htmldata);

                          setTimeout(function() { 
                            window.location.href = '{{ url("/smoji/detail") }}/'+result+'';
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
    <script type="text/javascript" src="https://malsup.github.io/jquery.form.js"></script>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    
    <script src="https://checkout.stripe.com/checkout.js">           
    </script>
    
    <!-- It is better to have the below script as separate file.-->
    <script type="text/javascript">
        // Setting the error class and error element for form validation.
       /* jQuery.validator.setDefaults({
            errorClass: "text-danger",
            errorElement: "small"
        });*/
        
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
                       description: 'plan for premium $1.00' ,
                       amount: 100 ,
                       email: '{{$user_email}}' ,
                });
                return false;
            });
            
            
        });
    </script>

@endsection
 