<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{$general->web_title}} @yield('site')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="{{asset('assets/fonts/css/user-responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/user0.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/fontend_logo/icon.png')}}"/>
    
    @include('template-part.style')
    @yield('style')
    
    <style>
    :root {
    --gold_sub: #cc9933;
    --gold: #D4AF37;
    --black: black;}
    
        .page-sidebar .page-sidebar-menu .sub-menu>li>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu .sub-menu>li>a {
            color: #000000;
        }
        .panel-heading {
            background: rgb(243, 246, 249);
        }
        .modal button{
            background: rgb(243, 246, 249) !important;
            color: black !important;
        }
        
        .page-header.navbar {
            background-color: var(--gold);
        }
        .logo.desktop-logo {
                   max-width: 206px;
                    max-height: 80px;
                    margin-top: -9px;

        }
        a.dt-button.btn.yellow.btn-outline {
            display: none;
        }
        @media (max-width: 480px){
            .page-header.navbar .top-menu {
                background-color: #364150;
                margin-left: -11px;
                margin-right: -10px;
            }
            .page-header.navbar .top-menu .navbar-nav {
              margin-right: -4px;
            }
            .page-header.navbar .top-menu .navbar-nav>li.dropdown-user .dropdown-toggle {
                background-color: #364150;
            }
        }
        
        
        @media (max-width: 600px){
         .media_query_logo_coin{
             margin-left:130px !important;
         }   
        }
        .media_query_logo_coin{
             margin-left:80px;
         } 
         .modal {
            left: 50%;
            border-radius: 55px !important;
            bottom: auto;
            right: auto;
            padding: 0;
            width: 363px;
            margin-left: -114px;
            background-color: #ffffff;
            border: 2px solid rgb(243, 246, 249);
            -webkit-box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
            box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
            background-clip: padding-box;
        }
.modal-content{
    background:rgb(242, 242, 242);
}
   @media(max-width:600px){
    .navbar-fixed-top{
        background: #364150 !important;
    }

     .modal {
        left: 5%;
        border-radius: 55px !important;
        bottom: auto;
        right: auto;
        padding: 0;
        width: 325px !important;
        margin-left: -114px;
        background-color: #ffffff;
        border: 1px solid #999999;
        border: 1px solid rgba(0, 0, 0, 0.2);
        -webkit-box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
        box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
        background-clip: padding-box;
    }
    .swal-modal {
        width: 350px !important;
    }
    .swal-title{
        font-size:20px !important;
    }
   }
 

   .swal-modal {
        width: 478px;
        opacity: 0;
        pointer-events: none;
        background-color: #081738;
        text-align: center;
        border-radius: 5px;
        position: static;
        margin: 20px auto;
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        z-index: 10001;
        transition: opacity .2s,-webkit-transform .3s;
        transition: transform .3s,opacity .2s;
        transition: transform .3s,opacity .2s,-webkit-transform .3s;
    }
    .swal-icon--success:before {
        border-radius: 120px 0 0 120px;
        top: -7px;
        left: -33px;
        display:none;
        -webkit-transform: rotate(
        -45deg
        );
            transform: rotate(
        -45deg
        );
        -webkit-transform-origin: 60px 60px;
        transform-origin: 60px 60px;
    }
    .swal-icon--success:after {
        display:none;
        border-radius: 0 120px 120px 0;
        top: -11px;
        left: 30px;
        -webkit-transform: rotate(
    -45deg
    );
        transform: rotate(
    -45deg
    );
        -webkit-transform-origin: 0 60px;
        transform-origin: 0 60px;
        -webkit-animation: rotatePlaceholder 4.25s ease-in;
        animation: rotatePlaceholder 4.25s ease-in;
    }
    .swal-icon--success__hide-corners {
        width: 5px;
        height: 90px;
        background-color: #081738;
        padding: 1px;
        position: absolute;
        /* left: 28px; */
        /* top: 8px; */
        z-index: 1;
        -webkit-transform: rotate(
    -45deg
    );
        transform: rotate(
    -45deg
    );
    }
    .swal-title {
        color: white;
        font-weight: 600;
        text-transform: none;
        position: relative;
        display: block;
        padding: 13px 16px;
        font-size: 27px;
        line-height: normal;
        text-align: center;
        margin-bottom: 0;
    }
    
    .swal-button {
        background-color: rgb(243, 246, 249);
        color: #081738;
        border: none;
        box-shadow: none;
        border-radius: 5px;
        font-weight: 600;
        font-size: 14px;
        padding: 10px 24px;
        margin: 0;
        cursor: pointer;
    }
    .swal-overlay--show-modal .swal-modal {
        opacity: 1;
        border: 2px solid rgb(243, 246, 249);
        pointer-events: auto;
        box-sizing: border-box;
        -webkit-animation: showSweetAlert .3s;
        animation: showSweetAlert .3s;
        will-change: transform;
    }
    
    table{
        border: 2px solid rgb(243, 246, 249) !important;
    }
    
    thead{
        background: rgb(243, 246, 249);
        /*color: rgb(242, 242, 242);*/
    }
    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
        color: rgb(243, 246, 249);
    }
    
    </style>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" />
    <style>
        .page-header.navbar {
            background-color: #fff;
        }
        .page-sidebar .page-sidebar-menu>li.active.open>a, .page-sidebar .page-sidebar-menu>li.active>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active.open>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active>a
        ,.page-sidebar:hover .page-sidebar-menu>li.active>a:hover,
        .page-sidebar .page-sidebar-menu>li.open>a, .page-sidebar .page-sidebar-menu>li:hover>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.open>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li:hover>a
        {
            background-color: rgb(243, 246, 249);
            color: black;
        }
        .page-header.navbar .top-menu .navbar-nav>li.dropdown-language>.dropdown-toggle>.langname, .page-header.navbar .top-menu .navbar-nav>li.dropdown-user>.dropdown-toggle>.username, .page-header.navbar .top-menu .navbar-nav>li.dropdown-user>.dropdown-toggle>i {
            color: #fff;
        }
        .page-sidebar.navbar-collapse.collapse,
        body{
            background: black;
        }
        .page-sidebar .page-sidebar-menu>li>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li>a{
            border-top: 1px solid #3d4957;
            color: #fff;
        }
        .modal .modal-header {
            border-bottom: 1px solid rgba(0,0,0,.05);
            background: rgb(242, 242, 242) !important;
        }
        .modal-footer {
            padding: 15px;
            text-align: right;
            border-top: 1px solid #e5e5e5;
            background: rgb(242, 242, 242) !important;
        }
        .portlet.box.blue-ebonyclay>.portlet-title{
            background-color: rgb(243, 246, 249);
        }
        .portlet.box.blue-ebonyclay>.portlet-title>.caption{
                color: rgb(242, 242, 242);
        }
        .btn{
                background: rgb(243, 246, 249) !important;
                border-radius: 30px !important;
                color: black !important;
                border: 1px solid;
        }
        .panel-primary>.panel-heading {
            color: #fff;
            background-color: rgb(243, 246, 249);
            border-color: rgb(243, 246, 249);
        }
        .page-sidebar .page-sidebar-menu>li>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li>a {
            border-top: 1px solid #fff;
            color: black;
            font-weight: 500;
        }
        .page-header.navbar {
            background-color: rgb(248, 248, 248);
        }
       
        .dropdown-menu>li:hover>a {
            text-decoration: none;
            background-image: none;
            background-color: rgb(243, 246, 249);
            color: rgb(242, 242, 242) !important;
            filter: none;
        }
        .dropdown-menu>li:hover>a, .fas {
            color: rgb(242, 242, 242) !important;
        }
        .portlet.light {
            padding: 12px 20px 15px;
            background-color: rgb(242, 242, 242);
        }
       
        
        .page-content{
          background: rgb(255, 255, 255) !important;
        }
        .portlet.box>.portlet-body {
            background-color: rgb(242, 242, 242);
            padding: 15px;
            border: 1px solid rgb(243, 246, 249);
        }
        .page-sidebar .page-sidebar-menu>li.active>a>.selected{
            display: block;
            float: right;
            position: absolute;
            right: 0;
            top: 8px;
            background: 0 0;
            width: 0;
            height: 0;
            border-top: 12px solid transparent;
            border-bottom: 12px solid transparent;
            border-right: 12px solid rgb(242, 242, 242);
        }
        
        .dashboard-stat:hover{
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
            border: 2px solid rgb(243, 246, 249) !important;
        }
       .page-header-fixed{
           background-color:var(--gold_sub);
       }
    </style>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<!--preloader start-->
<div class="preloader">
    <div class="preloader-wrapper">
        <div class="preloader-img">
            <img style="max-width:100px; " src="{{asset('assets/images/Loader.gif')}}" alt="Preloader Image">
        </div>
    </div>
</div>
<!--preloader end-->
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">

        <div class="page-logo">

            <a href="{{route('home')}}">
                <img class="logo desktop-logo" src="{{asset('assets/assets_mainindex/img/svg/leeway_logo.svg')}}" style="height: 50px;">
            </a>
            <!--<div class="menu-toggler sidebar-toggler"></div>-->
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>

        <div class="top-menu">
            <ul class="nav navbar-nav">
            
                <?php
                  $all = file_get_contents("https://blockchain.info/ticker");
                  $res = json_decode($all);
                  $buy_usd_price = $res->USD->last;
                  $usd_btc = round($buy_usd_price, 1);
                  $sell_usd_price = $res->USD->sell;
                  $sell_usd_btc = round($sell_usd_price, 1);
                ?>
                <!--<li style="font-size: 20px; color: #000; margin-top: 10px;"><span style="color: black;font-weight:400;font-size: 12px;vertical-align: middle;"><i class="fa fa-briefcase"></i> &nbsp;Main Wallet: {{$general->symbol}} {{round(Auth::user()->balance, 4)}} </span></li>-->
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                     <span class="username username-hide-on-mobile" style="color: black">
                        <span style="color: black;font-weight:600;font-size: 12px;vertical-align: middle;">
                            {{Auth::user()->first_name}}[ 
                            {{Auth::user()->username}} ]</span>
                     </span>
                        <i style="color: black;" class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default" style="    background-color: rgb(242, 242, 242);">
                       <!-- <li>
                            <a href="{{ route('profile.index') }}">
                                <i class="fas fa-user"></i> My Profile
                            </a>
                        </li><li>
                            <a href="{{ route('security.index') }}">
                                <i class="fas fa-key"></i> Change Password
                            </a>
                        </li>-->
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <i class="fas fa-lock"></i> Log Out
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"> </div>
<div class="page-container">
    @include('template-part.user_sidebar')
    @yield('main-content') 
</div>

<div id="sponsorLinkModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title text-center" style="color: #00B356" id="exampleModalLabel">Sponsor Link</h3>
        </div>
        <div class="modal-body">
         <div class="row">
           <div class="col-sm-9 col-xs-9">
              <input type="text" id="myInput" value="{{ url('/') }}/register/{{ Auth::user()->username }}" class="form-control">
            </div>
            <div class="col-sm-3 col-xs-3">
                <button onclick="myFunction()" class="btn btn-danger"><i class="fas fa-copy"></i> Copy</button>
                <p class="copied_cont" style="color: green"></p>
            </div> 
         </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

@include('template-part.footer')
@include('template-part.script')

<script>
  $(document).ready(function(){
     $('form').submit(function() {
      $(this).find("button[type='submit']").prop('disabled',true);
    });
    
    $('.btnclick').click(function() {
      $(".btnclick").remove();
      $(".btnclick_after").css("display","block");
    });
    
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous"></script>
@if(Session::has('message'))
    <script>
        $(document).ready(function(){
            swal("{{Session::get('message')}}","", "success");

        });
    </script>
@endif
@if(Session::has('alert'))
    <script>
        $(document).ready(function(){
            swal("{{Session::get('alert')}}","", "warning");
        });

    </script>
@endif
@yield('script')
</body>
</html>