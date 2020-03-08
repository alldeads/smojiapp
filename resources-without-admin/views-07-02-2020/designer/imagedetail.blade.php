@extends('layouts.app')


@section('page-content')
	<style type="text/css">
		.shareonmobile {
			    position: absolute;
			    background: #00000033;
			    color: #fff;
			    border-radius: 50%;
			    width: 30px;
			    padding: 3px 1px 0 0;
			    height: 30px;
			    top: 37px;
			    left: 22px;
		}

		.shareondesktop {
		        position: absolute;
			    background: #00000033;
			    color: #fff;
			    border-radius: 50%;
			    width: 35px;
			    padding: 5px 1px 0 0;
			    height: 35px;
			    right: 37px;
			    bottom: 22px;
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
			    padding: 3px 1px 0 0;
			    height: 30px;
			    top: 70px;
			    left: 39px;
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
			    padding: 3px 1px 0 0;
			    height: 30px;
			    top: 70px;
			    left: 39px;
			}
			
		}
		.content-sticky-footer {
		    min-height: 100%;
		    height: auto;
		    position: relative;
		    display: inline-block;
		    clear: both;
		    width: 100%;
		    padding-top: 25px;
		    background: #dcd8d891;
		}
	</style>
	<div class="container-fluid">
        <div class="row" >
            
                
                <div class="jumbotron text-center " style="margin: 0 auto;">

                      <!-- <div class="shareonmobile share-button d-none"><i class="material-icons" style="font-size: 20px;">share</i></div> -->
                      <img  style="width: 100%;" src="{{ asset('uploads/'.$imagename.' ') }}" >

                      <!-- <div class="a2a_kit a2a_default_style d-none" id="shareondesktop">
						    <a class="a2a_dd" href="https://www.addtoany.com/share">
						        <div class="shareondesktop"><i class="material-icons" style="font-size: 25px;">share</i></div>
						    </a>
					  </div> -->

                </div>
                 

                
                <!-- <script>
				var a2a_config = a2a_config || {};
				a2a_config.onclick = 2;
				</script>
				<script async src="https://static.addtoany.com/menu/page.js"></script> -->


                    
        </div>

    </div>




@endsection

@section('js')
	<!-- <script type="text/javascript">
		  document.querySelector('.share-button').addEventListener('click', function() {
		    if(navigator.share) {
		      navigator.share({
		        title: 'Smoji',
		        text: '',
		        url: "{{ asset('uploads/'.$imagename.' ') }}"
		      })
		      .then(() => console.log('Share complete'))
		      .error((error) => console.error('Could not share at this time', error))
		    }
		  });

		var ua = navigator.userAgent.toLowerCase();
		var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
		if(isAndroid) {}
		var iswindows = ua.indexOf("windows") > -1; //&& ua.indexOf("mobile");
		if(iswindows) {
		    $('.share-button').addClass('d-none');
		    $('#shareondesktop').removeClass('d-none');
		    //document.write('<script src="https://sharehulk.com/api/sharingbutton.php?type=horizontal&u=' + encodeURIComponent(document.location.href) + '"></scr' + 'ipt>')
		}else{
			$('.share-button').removeClass('d-none');
			$('#shareondesktop').addClass('d-none');
		}

		
	</script> -->
@endsection