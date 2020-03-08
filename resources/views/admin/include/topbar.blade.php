<!-- Top Bar Start -->
<div class="topbar">
   <!-- LOGO -->
   <div class="topbar-left">
      <!-- <a href="index.html" class="logo"><span>G<span>B</span></span><i class="mdi mdi-cube"></i></a> --> 
      <!-- Image logo -->
      <a href="javascript:void(0)" class="logo">
         Smoji
      <span>
      <img src="{{ asset('images/logo.png') }}" alt="" height="30">
      </span>
      <i>
      <img src="{{ asset('images/logo.png') }}" alt="" height="28">            </i>
      </a>
   </div>
   <!-- Button mobile view to collapse sidebar menu -->
   <div class="navbar navbar-default" role="navigation">
      <div class="container">
         <!-- Navbar-left -->
         <ul class="nav navbar-nav navbar-left">
            <li>
               <button class="button-menu-mobile open-left waves-effect waves-light">
               <i class="mdi mdi-menu"></i>
               </button>
            </li>
         </ul>
         <!-- Right(Notification) -->
         <ul class="nav navbar-nav navbar-right">
           
           
            <li class="dropdown user-box">
               <a href="#" class="dropdown-toggle waves-effect waves-light user-link" data-toggle="dropdown" aria-expanded="true">
               <img src="{{ asset('images/logo.png') }}" alt="user-img" class="img-circle user-img">
               </a>
               <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                  <li>
                     <h5>Hi, Admin </h5>
                  </li>
                  
                  <li><a href="{{url('admin/logout')}}"><i class="mdi mdi-logout m-r-5"></i> Logout</a></li>
               </ul>
            </li>
         </ul>
         <!-- end navbar-right -->
      </div>
      <!-- end container -->
   </div>
   <!-- end navbar -->
</div>
<!-- Top Bar End