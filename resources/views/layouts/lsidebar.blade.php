<div class="sidebar sidebar-left">
    <div class="profile-link">
        <a href="#" class="media">
            <div class="w-auto h-100">
                <figure class="avatar avatar-40"><img src="{{ asset('images/logo.png') }}" alt=""> </figure>
            </div>
            <div class="media-body mt-2">
                <h5 class="  mb-0 text-white">{{ auth()->user()->name }} <span class="status-online bg-success"></span></h5>
            </div>
        </a>
    </div>
    <nav class="navbar">
        <ul class="navbar-nav">                    
            <li class="nav-item">
                <a href="/" class="sidebar-close">
                    <div class="item-title">
                        <i class="material-icons">star</i> Welcome
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a href="/savedsmoji" class="sidebar-close">
                    <div class="item-title">
                        <i class="material-icons">poll</i> Change Smoji
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="sidebar-close">
                    <div class="item-title">
                        <i class="material-icons">person</i> User Profile
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void()" class="sidebar-close">
                    <div class="item-title">
                        <i class="material-icons">infornation</i> Get Raunchy!
                    </div>
                </a>
            </li>
        </ul>
    </nav>
    <div class="profile-link text-center">
        <a class="btn btn-link text-white btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
<!-- sidebar left ends -->