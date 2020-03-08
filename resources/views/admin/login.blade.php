<!DOCTYPE html>
<html class="account-pages-bg">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
        <!-- App title -->
        <title>Smoji -  Admin Panel</title>

        <!-- App css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/pages.css') }}?x=1" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />


        <script src="{{ asset('backend/assets/js/modernizr.min.js') }}"></script>


    </head>


    <body class="bg-transparent">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                  <div class="spinner-wrapper">
                    <div class="rotator">
                      <div class="inner-spin"></div>
                      <div class="inner-spin"></div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">
                         

                           

                        <div class="wrapper-page" style="margin: 18% auto;">


                             @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif   
                                 @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul style="    margin: 0;">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                
                            <h1 class="text-center">Smoji</h1>
                            <div class=" m-t-40 account-pages">
                                <!-- Start : Error msg -->
                                    
                                

                                <!-- End : Error msg -->
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="javascript:void(0)" class="text-success">
                                            <span><img src="{{ asset('images/favicon.png') }}" alt="" height="36"></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form method="post" class="form-horizontal" action="{{ route('admin.login') }}">
                                         {{ csrf_field() }}
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input name="email" class="form-control" type="text"  placeholder="email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password"  name="password" placeholder="Password">
                                            </div>
                                        </div>

                                        <!-- <div class="form-group ">
                                            <div class="col-xs-12">
                                                <div class="checkbox checkbox-success">
                                                    <input name="remember" id="checkbox-signup" type="checkbox" checked>
                                                    <label for="checkbox-signup">
                                                        Remember me
                                                    </label>
                                                </div>

                                            </div>
                                        </div> -->

                                        <div class="form-group account-btn text-center m-t-40">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-success waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
        </section>
          <!-- END HOME -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/detect.js') }}"></script>
        <script src="{{ asset('backend/assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('backend/assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('backend/assets/js/waves.js') }}"></script>
        <script src="{{ asset('backend/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('backend/assets/js/jquery.scrollTo.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('backend/assets/js/jquery.app.js') }}"></script>

    </body>

</html>









