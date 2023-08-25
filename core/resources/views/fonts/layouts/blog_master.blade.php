<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$general->web_title}} @yield('site') </title>
    <!-- favicon -->
    <link href="{{asset('assets/images/fontend_logo/icon.png')}}" rel="shortcut icon" />
      <link href="{{asset('assets/components/com_sppagebuilder/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/components/com_sppagebuilder/assets/css/animate.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/components/com_sppagebuilder/assets/css/sppagebuilder.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/components/com_sppagebuilder/assets/css/sppagecontainer.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/components/com_layer_slider/base/static/layerslider/css/layerslider1c92.css?ver=6.6.053')}}" rel="stylesheet" type="text/css" />
      <link href="http://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900%7COpen+Sans:300%7CIndie+Flower:regular%7COswald:300,regular,700%7CRoboto:100,300,regular,500,700,900%7CRaleway:100,200,300,regular,500,600,700,800,900&amp;subset=latin%2Clatin-ext" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/modules/mod_owl_carousel/assets/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/modules/mod_owl_carousel/assets/css/owl.theme.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/modules/mod_owl_carousel/assets/css/owl.transitions.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/components/com_sppagebuilder/assets/css/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/templates/mastercoin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/templates/mastercoin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/templates/mastercoin/css/template.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/templates/mastercoin/css/presets/preset9.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/templates/mastercoin/css/custom.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/templates/mastercoin/css/cus_by_faiz.css')}}" rel="stylesheet" type="text/css" />
      <script type="application/json" class="joomla-script-options new">{"csrf.token":"44615d5749b0309694e1307afad77f05","system.paths":{"root":"\/mastercoins","base":"\/mastercoins"}}</script>
      <script src="{{asset('assets/plugins/system/offlajnparams/compat/greensock.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/media/jui/js/jquery.mincc0a.js?5024da497a1f76df514ce741d1edb283')}}" type="text/javascript"></script>
      <script src="{{asset('assets/media/jui/js/jquery-noconflictcc0a.js?5024da497a1f76df514ce741d1edb283')}}" type="text/javascript"></script>
      <script src="{{asset('assets/media/jui/js/jquery-migrate.mincc0a.js?5024da497a1f76df514ce741d1edb283')}}" type="text/javascript"></script>
      <script src="{{asset('assets/components/com_sppagebuilder/assets/js/jquery.parallax.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/components/com_sppagebuilder/assets/js/sppagebuilder.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/components/com_layer_slider/base/static/layerslider/js/layerslider1c92.js?ver=6.6.053')}}" type="text/javascript"></script>
      <script src="{{asset('assets/components/com_layer_slider/base/static/layerslider/js/layerslider.transitions1c92.js?ver=6.6.053')}}" type="text/javascript"></script>
      <script src="{{asset('assets/components/com_sppagebuilder/assets/js/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/templates/mastercoin/js/popper.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/templates/mastercoin/js/bootstrap.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/templates/mastercoin/js/main.js')}}" type="text/javascript"></script>
      <script src="{{asset('assets/system/js/corecc0a.js?5024da497a1f76df514ce741d1edb283')}}" type="text/javascript"></script>
      <style>
          .sweet-alert {
    background-color: #0e265d !important;
    width: 478px;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
    position: fixed;
    left: 50%;
    top: 50%;
    margin-left: -256px;
    margin-top: -200px;
    overflow: hidden;
    display: none;
    z-index: 2000;
    border: 3px solid #fee600;
    color: white;
}

.sweet-alert .sa-icon.sa-success::before, .sweet-alert .sa-icon.sa-success::after {
    content: '';
    border-radius: 50%;
    position: absolute;
    width: 60px;
    height: 120px;
    background: #0e265d !important;
    transform: rotate(
45deg
);
}
.sweet-alert .sa-icon.sa-success .sa-fix {
    width: 5px;
    height: 90px;
    background-color: #0e265d !important;
    position: absolute;
    left: 28px;
    top: 8px;
    z-index: 1;
    transform: rotate(
-45deg
);
}
      </style>
    @yield('style')
</head>

<body>
@guest
	<a></a>
@else
<!--navbar area start-->
<nav class="navbar-area" style="background:#fff">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 ">
                <a href="{{url('/')}}" class="logo">
                    <img style="max-width: 240px;max-height: 54px; margin-top: 15px;" src="{{asset('assets/images/fontend_logo/logo.png')}}" alt="Logo Image Will Be Here">
                </a>
            </div>
            <div class="col-lg-9 text-right ">
                <ul id="main-menu">

                    
                        <!-- <li class=""><a href="{{url('/')}}"> Home</a></li>
                        <li class="<?php echo request()->path() == 'news' ? 'menu-active dropdown open' : ''; ?>"><a href="{{route('news.index')}}"> News</a></li>
                        <li class="<?php echo request()->path() == 'contact' ? 'menu-active dropdown open' : ''; ?>"><a href="{{route('contact.index')}}"> Contact</a></li> 
                        <li class="<?php echo request()->path() == 'login' ? 'menu-active dropdown open' : ''; ?>"><a href="{{route('login')}}"> Sign In</a></li>
                        <li class="<?php echo request()->path() == 'register' ? 'menu-active dropdown open' : ''; ?>"><a href="{{route('register')}}"> Sign Up</a></li>-->
                    
                        <li><a href="{{url('/home')}}"> Dashboard</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    
                </ul>
            </div>
        </div>
    </div>
</nav>
<!--navbar area end-->
@endguest
 

@yield('content')


@guest
	<a></a>
@else
<!--subscription area start-->
<footer class="subscription-area" style="background-image: url('{{asset('assets/front_assets/img/contact-us.jpg')}}'); background-position: center; width: 100%; position: relative; background: cover; background-repeat: no-repeat;">
   @if(request()->path() != "authorization" && request()->path() != "login" && request()->path() != "register" && request()->path() != "password/reset"  )

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <div class="footer-logo">
                        <a href="{{url('/')}}">
                            <img style="max-width: 50%" src="{{asset('assets/images/fontend_logo/logo.png')}}" alt="footer logo">
                        </a>
                    </div>
                    <div class="subscription-form">
                        <h2>SUBSCRIBE TO OUR
                            <span>NEWSLATTER</span>
                        </h2>
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif

                        <form action="{{route('store.new.letter.blog')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-5">
                                    <input type="text" name="name" id="name" required placeholder="Name" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-5">
                                    <input type="email" name="email" id="email" required placeholder="E-mail Address"  value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                        <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-2">
                                    <input type="submit" id="post" value="Subscribe">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

   @endif
    <!--footer area start-->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright-text text-center"> {{$general->footer}}</p>
                </div>
            </div>
        </div>
    </div>
    <!--footer area end-->
</footer>
@endguest
<!--subscription area end-->
<!--preloader start-->
<div class="preloader">
    <div class="preloader-wrapper">
        <div class="preloader-img">
            <img  style="max-width: 240px; max-height: 54px;" src="{{asset('assets/images/fontend_logo/icon.png')}}" alt="preloader image">
        </div>
    </div>
</div>
<!--preloader end-->

<!--back to top start-->
<div class="back-to-top">
    <i class="icofont icofont-simple-up"></i>
</div>
<!--back to top end-->
{{--<script src="{{asset('assets/front_assets/blog_assets/js/jquery-3.3.1.js')}}"></script>--}}


<!--Owl carousel script load-->
<script src="{{asset('assets/front_assets/blog_assets/js/owl.carousel.min.js')}}"></script>
<!--Propper script load here-->
<script src="{{asset('assets/front_assets/blog_assets/js/popper.min.js')}}"></script>
<!--Bootstrap v4 script load here-->
<script src="{{asset('assets/front_assets/blog_assets/js/bootstrap.min.js')}}"></script>
<!--Slick Nav Js File Load-->
<script src="{{asset('assets/front_assets/blog_assets/js/jquery.slicknav.min.js')}}"></script>
<!--Scroll Spy File Load-->
<script src="{{asset('assets/front_assets/blog_assets/js/scrollspy.min.js')}}"></script>
<!--Wow Js File Load-->
<script src="{{asset('assets/front_assets/blog_assets/js/wow.min.js')}}"></script>
<!--Main js file load-->
<script src="{{asset('assets/front_assets/blog_assets/js/main.js')}}"></script>

@yield('script')
</body>

</html>