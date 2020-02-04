@extends('layouts.app')

@section('page-content')
	<div class="container-fluid">
        <div class="row justify-content-center">

            {{-- @for( $i = 1; $i <= ${$gender}['counts']['stickers']; $i++ ) --}}
            @for( $i = 1; $i <= ${$gender}['counts']['free']; $i++ )            
            @php
            $ibox = 'mystrikerBox'.$subscription.'-'.$gender . '-' . $i
            @endphp
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-4" >

                    <div class="card resultContainer">

                        <div class="card-body" id="{{$ibox}}">

                            <div class="resultFinal" >

                                <div id="resultSticker{{$subscription.'-'.$gender . '-' . $i}}" class="resultSticker">
                                    <img src="{{ asset('images/results/'.$subscription.'/stickers/'.$gender.'/'.$i.'.png') }}">
                                </div>

                                <div id="resultBase{{$subscription.'-'.$gender . '-' . $i}}" class="resultSkin">
                                    <img src="{{ asset('images/results/'.$subscription.'/pose/'.$gender.'/pose-'.$i.'/'.$skin_result.'-01.png') }}">
                                </div>

                                <div id="resultHair{{$subscription.'-'.$gender . '-' . $i}}" class="resultHair">
                                    <img src="{{ asset('images/results/hair/'.$gender.'/'.$hair_result.'.png') }}">
                                </div>

                                {{-- @if ( $gender == "female" )
                                    <div id="resultLip{{$subscription.'-'.$gender . '-' . $i}}" class="resultLip">
                                        <img src="{{ asset("images/lip/lips.png") }}">
                                    </div>
                                @endif --}}

                                <div id="resultEyes{{$gender . '-' . $i}}" class="resultEyes">
                                    <img src="{{ asset("images/eyes/" . $gender . "/" . $eye_result . ".png") }}">
                                </div>

                                @if ( $gender == "male" )
                                    <div id="resultBeard{{$gender . '-' . $i}}" class="resultBreads">
                                        <img src="{{ asset("images/beards/thumbnail/" . $beard_result . ".png") }}">
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                    <center>                         
                        <div onclick="screenshot('{{$ibox}}')" class="btn btn-primary btn-lg">Create and Download</div>
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
    <script type='text/javascript'>

        

         function screenshot(iddiv){
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
                         showimageonModal(result);
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

    </script>
    @endsection
 