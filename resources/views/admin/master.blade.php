<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
    <!-- App title -->
    <title>Smoji Admin</title>

    <!-- date range picker -->
    <link href="{{ asset('backend/custom.css?x=1') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- App css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/switchery/switchery.min.css') }}">
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/modernizr.min.js') }}"></script>

    <script type="text/javascript">
        var baseURL = "";
    </script>


    <link href="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/assets/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css">

</head>
<body class="fixed-left">

    <!-- <div id="preloader">
        <div class="circle"></div>
        <div class="circle1"></div>
    </div> -->

  <!-- Loader all pages-->
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




    <!-- Begin page -->
        <div id="wrapper">
          @include('admin.include.topbar')             

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.include.leftbar')            
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                @yield('content')
                @yield('page-content')
                @include('admin.include.footer')

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            @include('admin.include.rightbar')
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->




      <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        
        <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/detect.js') }}"></script>
        <script src="{{ asset('backend/assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('backend/assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('backend/assets/js/waves.js') }}"></script>
        <script src="{{ asset('backend/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('backend/assets/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/switchery/switchery.min.js') }}"></script>

        <!-- Counter js  -->
        <script src="{{ asset('backend/assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/counterup/jquery.counterup.min.js') }}"></script>

        <!-- Flot chart js -->
        

        <script src="{{ asset('backend/assets/plugins/moment/moment.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>



        <!-- App js -->
        <script src="{{ asset('backend/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('backend/assets/js/jquery.app.js') }}"></script>
        <script src="{{ asset('backend/assets/js/custom.js') }}"></script>


        
        <!-- Sweet-Alert  -->
        <script src="{{ asset('backend/assets/plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

        <!-- init -->
        <script src="{{ asset('backend/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>

        <script>
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2016',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-success',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });
        </script>

        <script type="text/javascript">
         $(document).ready(function() {
          
                var url = window.location;
                var urlnew = window.location.href;

                 urlnew = urlnew.replace(/^(.+)(\/[^\/]+)$/g, '$1');
                // Will only work if string in href matches with location
                $('.has_sub li a[href="' + url + '"]').parent().addClass('active');
                // Will also work for relative and absolute hrefs
                $('.has_sub li a').filter(function() {
                    return this.href == url || this.href == urlnew;
                }).parent().parent().parent().addClass('active');


                $('.has_sub li a[href="' + url + '"]').parent().addClass('active');
                // Will also work for relative and absolute hrefs
                $('.has_sub li a').filter(function() {
                    return this.href == url || this.href == urlnew;
                }).parent().parent().prev().addClass('active');


                $('.has_sub li a[href="' + url + '"]').parent().parent().addClass('active');
                // Will also work for relative and absolute hrefs
                $('.has_sub li a').filter(function() {
                    return this.href == url || this.href == urlnew;
                }).parent().parent().parent().parent().parent().addClass('active');



                // for open sub menu for detail page
                /*$('.has_sub li a[href="' + url + '"]').parent().parent().addClass('active');
                // Will also work for relative and absolute hrefs
                $('.has_sub li a').filter(function() {
                    return  this.href == urlnew;
                }).parent().parent().prev().click();*/ 



                urlnew.replace(/\/$/, "");
                $('.has_sub li a[href="' + urlnew + '"]').parent().parent().addClass('active');
                // Will also work for relative and absolute hrefs
                $('.has_sub li a').filter(function() {
                    return  this.href == urlnew;
                }).parent().parent().prev().click();



            });
    </script>
    @yield('js')

</body>
</html>