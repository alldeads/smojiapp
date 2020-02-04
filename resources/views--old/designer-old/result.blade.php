@extends('layouts.app')

@section('page-content')
  <div class="container-fluid">
        <div class="row justify-content-center" id="">
            
            <!-- <button class="btn btn-info btn-block example-the-2">Supervan</button> -->

            {{-- @for( $i = 1; $i <= ${$gender}['counts']['stickers']; $i++ ) --}}
            {{-- @for( $i = 1; $i <= ${$gender}['counts']['free']; $i++ )     --}}       
            {{-- @for( $i = 1; $i <= 10; $i++ ) --}}  

            @for( $i = 1; $i <= ${$gender}['counts'][$subscription]; $i++ )           
            @php
            $ibox = 'mystrikerBox'.$subscription.'-'.$gender . '-' . $i
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
    @endsection
 