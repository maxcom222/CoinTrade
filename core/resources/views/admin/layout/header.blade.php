<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{url('admin/home')}}">
             <img src="{{ asset('assets/images/logo/logo.png') }}" style="max-width:100px;" class="img-responsive">
         </a>
         <div class="menu-toggler sidebar-toggler"> </div>
     </div>
     <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>

     <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown dropdown-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <span class="username username-hide-on-mobile">{{Auth::guard('admin')->user()->name}}</span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-default">
                    <li>
                        <a href="{{route('admin.register')}}">
                            <i class="icon-user"></i>Add New Admin </a>
                        </li>
                        <li>
                            <a href="{{route('change.password')}}">
                                <i class="icon-lock"></i>Change Password</a>
                            </li>

                            <li class="divider"> </li>

                            <li>
                                <a href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
