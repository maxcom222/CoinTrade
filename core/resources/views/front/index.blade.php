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
      @include('layouts.message')
    <!--navbar area start-->
    <nav class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 ">
                    <a href="{{url('/')}}" class="logo"><img src="{{asset('assets/images/logo/logo.png') }}" alt="logo image" style="max-height: 40px;"></a>
                </div>   
                <div class="col-lg-9 text-right ">     
                    <ul id="main-menu" >
                        <li><a href="#about">About</a></li>
                        <li><a href="#service">Service</a></li>
                        <li><a href="#contact">Contact</a></li>
                        @auth
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        @else
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('register')}}">Register</a></li>
                        @endauth
                    </ul>
                </div>   
            </div>
        </div>
    </nav>
    <!--navbar area end-->
    <!--header area start-->
    <header class="header-area header-bg" id="home" style="background-image: url({{asset('assets/images/slider') }}/{{$sliders->image}});
background-position: center;
background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="header-wrapper">
                        <div class="header-area-inner">
                            <h1>{{$sliders->small}}</h1>
                            <p>{{$sliders->large}}</p>
                            <a href="#contact" class="boxed-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--header area end-->

    <!--account call to action area start-->
    <section class="acc-cta-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2>Get access to Your account </h2>
                </div>
                <div class="col-lg-4 text-right">
                    <div class="acc-btn-right">
                            <a href="{{route('login')}}" class="boxed-btn blank">Sign in</a>
                            <a href="{{route('register')}}" class="boxed-btn">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--account call to action area end-->
    <!--what is bitcoin area start-->
    <section class="what-is-bcoin" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2>What is  <span>{{$gnl->title}}</span> ?</h2>
                    <p>{{$ints->abdesc}}</p>
                </div>
                <div class="col-lg-5">
                    <div class="what-is-bcoin-img">
                        <img src="{{asset('assets/images/interface/about.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--what is bitcoin area end-->
    <!--service area start-->
    <section class="service-area" id="service">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>{{$ints->sthead}}</span></h2>
                        <p>{{$ints->stdesc}} </p>
                    </div>
                </div>
            </div>
            <div class="row text-center">
            @foreach($services as $ser)
                <div class="col-lg-4 col-md-6 ">
                    <div class="single-service-box">
                        <div class="icon">
                            <i class="fa fa-{{$ser->image}}"></i>
                        </div>
                        <div class="content">
                            <h4>{{$ser->large}}</h4>
                            <p>{{$ser->small}}</p>
                        </div>
                    </div>
                </div>
            @endforeach  

            </div>
        </div>
    </section>
    <!--service area end-->

   
    <!--testimonial area start-->
    <section class="testimonial-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>Testimonials
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <div class="testimonial-wrapper">
                        <div class="testimonial-carousel">
                    @foreach($testims as $test)
                            <div class="single-testimonial-item">
                                <div class="img-thumb">
                                    <img src="{{asset('assets/images/testimonial') }}/{{$test->photo}}" alt="testimonial image">
                                </div>
                                <div class="content">
                                    <h4>{{$test->name}}</h4>
                                    <ul class="rating">
                                    @for($i=1;$i<=$test->star;$i++)
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                        </li>

                                    @endfor
                                    </ul>
                                    <div class="description">
                                        <p>{{$test->comment}}</p>
                                    </div>
                                </div>
                            </div>

                    @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--testimonial area end-->

    

<!-- contact us section start-->
<section class="contact-area" id="contact">
    <div class="contat-section-right-bg contact-form-bg"></div>
    <div class="img-wrapper">
        <img src="{{asset('assets/images/interface/story.jpg') }}" alt="contact image">
    </div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6 "> 
                <div class="contact-wrapper contact-form-bg">
                    <div class="section-title">
                        <h2>Get in
                            <span>touch</span>
                        </h2>
                    </div>
                    <div class="contact-form">
                        <form action="{{route('contact.email')}}" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Full Name*" required>
                                    <input type="tel" placeholder="Your Phone" name="phone">
                                </div>
                                <div class="col-lg-6">
                                     <input type="email" placeholder="Your Email*" name="email" required>
                                     <input type="text" placeholder="Your Topic" name="subject">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="Message" id="message" cols="30" rows="5" required></textarea>
                                    <input type="submit" value="send now">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact us section end-->

<!--faq area start-->
<section class="faq-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <h2>Frequently Asked
                        <span>Questions</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @foreach($faqs as $fq) 
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#general{{$fq->id}}" aria-expanded="true">
                                     {{ $fq->ques}} 
                                </a>
                            </h4>
                        </div>
                        <div id="general{{$fq->id}}" class="panel-collapse collapse" role="tabpanel">
                            <div class="panel-body">
                                {!! $fq->ans !!}
                            </div>
                        </div>
                    </div>
                @endforeach                 
                </div>
            </div>
        </div>
    </div>
</section>
<!--faq area end-->

<!--subscription area start-->
<footer class="subscription-area subscription-bg" style="background-color:#000;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                    <div class="footer-logo">
                        <a href="#"><img src="{{asset('assets/images/logo/logo.png') }}" alt="footer logo" style="max-width: 200px;"></a>
                    </div>
                    <div class="subscription-form">
                        <h2>SUBSCRIBE TO OUR <span>NEWSLATTER</span></h2>
                        <form>
                            <div class="row">
                                <div class="col-lg-5">
                                    <input type="text" id="subname" name="name" placeholder="Your Name*" required>
                                </div>
                                <div class="col-lg-5">
                                    <input type="email" id="subemail" name="email" placeholder="Your Email*" required>
                                </div>
                                <div class="col-lg-2">
                                    <input type="submit" id="subsc" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>

<script>
  $(document).ready(function(){
    $(document).on('click','#subsc',function(e){
        e.preventDefault();
      var email = $('#subemail').val();
      var name = $('#subname').val();
      $.ajax({
       type:'GET',
       url:'{{ route('subscribe') }}',
       data:{email:email, name:name},
       success:function(data){
        swal('success','Successfully Subscribed','success');
        console.log(data);
      },
      error:function (error) {
        var message = JSON.parse(error.responseText);
        swal('error',message.errors.email,'error');
        console.log(message.errors.email);

      }
    });
    });
  }); 
</script>
    <!--footer area start-->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 ">
                    <p class="copyright-text">{{$ints->ftcon}}</p>
                </div>
                <div class="col-lg-6  col-md-5 text-right">
                </div>
            </div>
        </div>
    </div>
    <!--footer area end-->
</footer>
<!--subscription area end-->
<!--preloader start-->
<div class="preloader">
    <div class="preloader-wrapper">
        <div class="preloader-img">
            <img src="{{asset('assets/images/logo/icon.png') }}" alt="*">
        </div>
    </div>
</div>
<!--preloader end-->

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




