<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$gnl->title}} | {{$gnl->subtitle}} </title>
        <!--Favicon add-->
        <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logo/icon.png') }}">
        <!--bootstrap Css-->
        <link href="{{asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">
        <!--font-awesome Css-->
        <link href="{{asset('assets/front/css/icofont.min.css') }}" rel="stylesheet">
        <!--owl.carousel Css-->
        <link href="{{asset('assets/front/css/owl.carousel.min.css') }}" rel="stylesheet">
        <!--Slick Nav Css-->
        <link href="{{asset('assets/front/css/slicknav.min.css') }}" rel="stylesheet">
        <!--Animate Css-->
        <link href="{{asset('assets/front/css/animate.css') }}" rel="stylesheet">
        <!--Style Css-->
        <link href="{{asset('assets/front/css/style.css') }}" rel="stylesheet">
        <!--Responsive Css-->
        <link href="{{asset('assets/front/css/responsive.css') }}" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
              integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    
    <link href="{{ asset('assets/front/css/color.php?color=') }}{{ $gnl->color }}" rel="stylesheet">

        
    </head>
    <body>
    <nav class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 ">
                    <a href="{{url('/')}}" class="logo"><img src="{{asset('assets/images/logo/logo.png') }}" alt="logo image" style="max-height: 44px;"></a>
                </div>   
                <div class="col-lg-9 text-right ">     
                    <ul id="main-menu" >
                        @auth
                        <li><a href="{{route('home')}}">Home</a></li>
                          <li>
              <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
              <span>SIGN OUT</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          </li>
                        @else
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('register')}}">Register</a></li>
                        @endauth
                    </ul>
                </div>   
            </div>
        </div>
    </nav>
@include('layouts.message')
<div class="content-for-template @if(request()->path() == 'login' || request()->path() == 'register' || request()->path() == 'authorization' || request()->path() == 'password/reset') content-template-bg @endif">
@yield('content')  
</div>


<!--preloader start-->
<div class="preloader">
    <div class="preloader-wrapper">
        <div class="preloader-img">
           <img src="{{asset('assets/images/logo/icon.png') }}" alt="*">
        </div>
    </div>
</div>
<!--preloader end-->

<footer >
    <!--footer area start-->
    <div class="copyright-area">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-6 col-md-7 ">
                    <p class="copyright-text">{{$gnl->title}}- {{$gnl->subtitle}}</p>
                </div>
            </div>
        </div>
    </div>
    <!--footer area end-->
</footer>


    <!--back to top start-->
    <div class="back-to-top">
        <i class="icofont icofont-simple-up"></i>
    </div>
    <!--back to top end-->

        <!--jquery script load-->
        <script src="{{asset('assets/front/js/jquery.js') }}"></script>
        <!--Owl carousel script load-->
        <script src="{{asset('assets/front/js/owl.carousel.min.js') }}"></script>
        <!--Propper script load here-->
        <script src="{{asset('assets/front/js/popper.min.js') }}"></script>
        <!--Bootstrap v4 script load here-->
        <script src="{{asset('assets/front/js/bootstrap.min.js') }}"></script>
        <!--Slick Nav Js File Load-->
        <script src="{{asset('assets/front/js/jquery.slicknav.min.js') }}"></script>
        <!--Scroll Spy File Load-->
        <script src="{{asset('assets/front/js/scrollspy.min.js') }}"></script>
        <!--Wow Js File Load-->
        <script src="{{asset('assets/front/js/wow.min.js') }}"></script>
        <!--Main js file load-->
        <script src="{{asset('assets/front/js/main.js') }}"></script>
    </body>
</html>
