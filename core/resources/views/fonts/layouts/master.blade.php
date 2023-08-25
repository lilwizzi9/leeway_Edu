<!doctype html>
<html lang="en-gb" dir="ltr">
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="canonical" href="index">
      <base  /> 
       <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/fontend_logo/icon.png')}}"/>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="description" content="{{$general->web_title}}" />
      <meta name="generator" content="Joomla! - Open Source Content Management" />
      <title>{{$general->web_title}} @yield('site') </title>
      <!--<link href="{{asset('assets/images1/favicon.png')}}" rel="shortcut icon" type="image/vnd.microsoft.icon" />-->
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
      
      <style type="text/css">
        #sppb-addon-1570144103904 ul li.email {
            margin-left: 15px !important;
        }
        .pricingTable{
    font-family: 'Mukta', sans-serif;
    text-align: center;
    padding: 0 20px;
    position: relative;
    z-index: 1;
}
.pricingTable:before{
    content: '';
    background-color: #fff;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.4);
    position: absolute;
    left: 0;
    top: 100px;
    bottom: 0;
    right: 0;
    z-index: -1;
}
.pricingTable .pricingTable-header{
    background: linear-gradient(#36D1DC, #5B86E5);
    width: 200px;
    height: 200px;
    padding: 60px 15px;
    margin: 0 auto 25px;
    border-radius: 50%;
}
.pricingTable .title{
    color: #272727;
    font-size: 32px;
    font-weight: 700;
    text-transform: uppercase;
    margin: 0 0 10px;
}
.pricingTable .price-value{ color: #fff; }
.pricingTable .price-value .amount{
    font-size: 55px;
    font-weight: 500;
    line-height: 50px;
}
.pricingTable .price-value .amount-sm{
    font-size: 25px;
    font-weight: 400;
    margin: -2px 0 0;
    vertical-align: top;
    display: inline-block;
}
.pricingTable .pricing-content{
    padding: 0;
    margin: 0 0 15px;
    list-style: none;
}
.pricingTable .pricing-content li{
    color: #333;
    font-size: 14px;
    font-weight: 500;
    text-transform: capitalize;
    line-height: 25px;
    padding-bottom: 10px;
    margin: 0 0 12px;
    border-bottom: 2px solid #e7e7e7;
}
.pricingTable .pricing-content li:last-child{ margin-bottom: 0; }
.pricingTable .pricingTable-signup{
    background: linear-gradient(#36D1DC, #5B86E5);
    padding: 100px 10px 20px;
    margin: 0 -20px;
    clip-path: polygon(50% 45%, 101% 0, 101% 100%, 0 100%, 0 0);
}
.pricingTable .pricingTable-signup a{
    color: #fff;
    background: #272727;
    font-size: 32px;
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 2px 30px 0;
    border: 2px solid transparent;
    border-radius: 10px;
    display: inline-block;
    transition: all 0.5s;
}
.pricingTable .pricingTable-signup a:hover{
    color: #272727;
    background: #fff;
    text-shadow: 4px 4px 0 #e7e7e7;
    border-color: #272727;
}
.pricingTable.green .pricingTable-header,
.pricingTable.green .pricingTable-signup{
    background: linear-gradient(#38ef7d, #11998e);
}
@media only screen and (max-width: 990px) {
    .pricingTable{ margin-bottom: 40px; }
}
@media (min-width: 992px){
.text-lg-left {
    text-align: right!important;
}
}
.text-primary {
    color: #fee600 !important;
}
.sppb-addon-title{
 color:white;
}
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
.offcanvas-menu .offcanvas-inner .sp-module ul > li {
    border: 0;
    padding: 0;
    margin: 0;
    position: relative;
    overflow: hidden;
    display: block;
    border-bottom: 1px solid #fee600;
}

.offcanvas-menu .offcanvas-inner .sp-module ul > li ul li a {
    color: rgb(254 230 0);
}
.offcanvas-menu .offcanvas-inner .sp-module ul > li.menu-parent > a > .menu-toggler, .offcanvas-menu .offcanvas-inner .sp-module ul > li.menu-parent > .menu-separator > .menu-toggler {
    color: rgb(254 230 0);
}

.offcanvas-menu .offcanvas-inner .sp-module ul > li a, .offcanvas-menu .offcanvas-inner .sp-module ul > li span {
    color: #fee600;
}
.offcanvas-menu {
    background-color: #0e265d;
    color: #222222;
}
      </style>

      <script type="text/javascript">
         var j2storeURL = 'index.html';
         
         ;(function ($) {
         $.ajaxSetup({
         headers: {
             'X-CSRF-Token': '{{ csrf_token() }}'
         }
         });
         })(jQuery);
         jQuery(function($) {
         $('a[target=ls-scroll]').each(function() {
         var href = this.getAttribute('href'), root = 'index.html';
         if (href.indexOf(root) === 0) this.setAttribute('href', href.substr(root.length));
         });
         });
         var LS_Meta = {"v":"6.6.053"};
         
         
         var jQowlImg = false;
         function initJQ() {
         if (typeof(jQuery) == 'undefined') {
         if (!jQowlImg) {
             jQowlImg = true;
             document.write('<scr' + 'ipt type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></scr' + 'ipt>');
         }
         setTimeout('initJQ()', 500);
         }
         }
         initJQ(); 
         
         if (jQuery) jQuery.noConflict();    
         
         
         
         
         
         var jQowlImg = false;
         function initJQ() {
         if (typeof(jQuery) == 'undefined') {
         if (!jQowlImg) {
             jQowlImg = true;
             document.write('<scr' + 'ipt type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></scr' + 'ipt>');
         }
         setTimeout('initJQ()', 500);
         }
         }
         initJQ(); 
         
         if (jQuery) jQuery.noConflict();    
         
         
         
         jQuery(function($){
         
             var addonId                 = $("#sppb-addon-1570405908475"),
                     prentSectionId  = addonId.parent().closest("section");
         
             if($("#sppb-addon-1570405908475").find(".optintype-popup").length !== 0 && $("body:not(.layout-edit)").length !== 0){
                     prentSectionId.hide();
             }
         
             if($("#sppb-addon-1570405908475").find(".optintype-popup").length !== 0 && $("body:not(.layout-edit)").length !== 0){
                 //var parentSection     = $("#sppb-addon-1570405908475").parent().closest("section"),
                 var addonWidth          = addonId.parent().outerWidth(),
                         optin_timein        = 2000,
                         optin_timeout       = 10000,
                         prentSectionId  = ".com-sppagebuilder:not(.layout-edit) #" + addonId.attr("id");
         
                     $(window).load(function () {
                     setTimeout(function(){
                         $.magnificPopup.open({
                         items: {
                             src: "<div class=\"sppb-optin-form-popup-wrap\" \">"+$(addonId)[0].outerHTML + "</div>"
                             //src: "<div style=\"width:+"addonWidth"+\">" + $(addonId)[0].outerHTML + "</div>"
                         },
                         type: "inline",
                                 mainClass: "mfp-fade",
                                 disableOn: function() {
                                 return true;
                             },
                                 callbacks: {
                             open: function() {
                                 if(optin_timeout){
                                 setTimeout(function(){
                                     $("#sppb-addon-1570405908475").magnificPopup("close");
                                 }, optin_timeout);
                                 }
                             }
                             }
                     });
                     }, optin_timein);
                 }); //window
             };
         })
         
         var jQowlImg = false;
         function initJQ() {
         if (typeof(jQuery) == 'undefined') {
         if (!jQowlImg) {
             jQowlImg = true;
             document.write('<scr' + 'ipt type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></scr' + 'ipt>');
         }
         setTimeout('initJQ()', 500);
         }
         }
         initJQ(); 
         
         if (jQuery) jQuery.noConflict();    
         
         
         
         template="mastercoin";
      </script>
      <meta property="og:title" content="Home" />
      <meta property="og:type" content="website" />
      <meta property="og:url" content="http://demo.joomlabuff.com/mastercoins/" />
      <meta property="og:site_name" content="Master Coin" />
      <meta name="twitter:card" content="summary" />
      <meta name="twitter:site" content="Master Coin" />
      <script type = "text/javascript" src = "{{asset('assets/modules/mod_owl_carousel/assets/js/owl.carousel.min.js')}}"></script>
      <style type="text/css">
         .owl_carousel_mod_107 {
         max-width: 600px;
         }
      </style>
      <style type="text/css">
         .owl_carousel_mod_108 {
         max-width: 600px;
         }
      </style>
      <style type="text/css">
         .owl_carousel_mod_109 {
         max-width: 600px;
         }
      </style>
      <link href="https://widgets.bitcoin.com/widget.css?28" rel="stylesheet">
      <body class="site helix-ultimate com-sppagebuilder view-page layout-default task-none itemid-101 en-gb ltr sticky-header layout-fluid offcanvas-init offcanvs-position-right">
    <div class="body-wrapper">
    <div class="body-innerwrapper">
    <section id="sp-top">
        <div class="row">
            <div id="sp-top1" class="col-lg-12 ">
                <div class="sp-column ">
                    <div class="sp-module ">
                        <div class="sp-module-content">
                            <div class="mod-sppagebuilder  sp-page-builder" data-module_id="103">
                                <div class="page-content">
                                    <div id="section-id-1570144009199" class="sppb-section" >
                                        <div class="sppb-container-inner">
                                            <div class="sppb-row">
                                                <div class="sppb-col-md-9" id="column-wrap-id-1570144009198">
                                                    <div id="column-id-1570144009198" class="sppb-column" >
                                                        <div class="sppb-column-addons">
                                                            <div id="sppb-addon-wrapper-1570144103904" class="sppb-addon-wrapper">
                                                                <div id="sppb-addon-1570144103904" class="clearfix "     >
                                                                    <div class="sppb-addon sppb-addon-raw-html text-center text-lg-left">
                                                                        <div class="sppb-addon-content">
                                                                            <ul class="clearfix">
                                                                      
                                                                                <li style="font-size: 12px;"><span class="icon fa fa-envelope-o"></span>{{$general->email}}</li>

                                                                                 <li style="font-size: 12px;"><span class="icon fa fa-phone"></span>{{$general->mobile}}</li>
                                                                                                                                                              
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <style type="text/css">#sppb-addon-wrapper-1570144103904 {
                                                                        margin:0px 0px 0px 0px;}
                                                                        #sppb-addon-1570144103904 {
                                                                        box-shadow: 0 0 0 0 #ffffff;
                                                                        }
                                                                        @media (min-width: 768px) and (max-width: 991px) {#sppb-addon-1570144103904 {}#sppb-addon-wrapper-1570144103904 {margin-top: 0px;margin-right: 0px;margin-bottom: 0px;margin-left: 0px;}}@media (max-width: 767px) {#sppb-addon-1570144103904 {}#sppb-addon-wrapper-1570144103904 {margin-top: 0px;margin-right: 0px;margin-bottom: 0px;margin-left: 0px;}}#sppb-addon-1570144103904 ul li{position:relative;font-size:15px;color:#fff;font-weight:600;padding:9px 0px;display:inline-block;padding-right:16px;margin-right:15px;font-family:'Raleway', sans-serif;}#sppb-addon-1570144103904 ul li.email{margin-left:40px;}#sppb-addon-1570144103904 ul li span{font-weight:700;font-family:'Roboto', sans-serif;}#sppb-addon-1570144103904 ul li.email a{color:#ffffff;font-weight:600;-webkit-transition:all 300ms ease;-ms-transition:all 300ms ease;-o-transition:all 300ms ease;-moz-transition:all 300ms ease;transition:all 300ms ease;font-family:'Raleway', sans-serif;}#sppb-addon-1570144103904 ul li .icon{position:relative;color:#fee600;font-size:16px;line-height:1em;margin-right:10px;font-family:'FontAwesome';}#sppb-addon-1570144103904 ul li.email a:hover{color:#fee600;}@media (max-width: 1200px){#sppb-addon-1570144103904 ul li.email{margin-left:25px;}#sppb-addon-1570144103904 ul li span{font-weight:700;font-family:'Roboto', sans-serif;}#sppb-addon-1570144103904 ul li.email a{color:#ffffff;font-weight:600;-webkit-transition:all 300ms ease;-ms-transition:all 300ms ease;-o-transition:all 300ms ease;-moz-transition:all 300ms ease;transition:all 300ms ease;font-family:'Raleway', sans-serif;}#sppb-addon-1570144103904 ul li .icon{position:relative;color:#fee600;font-size:16px;line-height:1em;margin-right:10px;font-family:'FontAwesome';}#sppb-addon-1570144103904 ul li.email a:hover{color:#fee600;}}@media (max-width: 992px){#sppb-addon-1570144103904 ul li.email{margin-left:0;}#sppb-addon-1570144103904 ul li span{font-weight:700;font-family:'Roboto', sans-serif;}#sppb-addon-1570144103904 ul li.email a{color:#ffffff;font-weight:600;-webkit-transition:all 300ms ease;-ms-transition:all 300ms ease;-o-transition:all 300ms ease;-moz-transition:all 300ms ease;transition:all 300ms ease;font-family:'Raleway', sans-serif;}#sppb-addon-1570144103904 ul li .icon{position:relative;color:#fee600;font-size:16px;line-height:1em;margin-right:10px;font-family:'FontAwesome';}#sppb-addon-1570144103904 ul li.email a:hover{color:#fee600;}}@media (min-width: 992px){#sppb-addon-1570144103904 ul li{color:#262626;}#sppb-addon-1570144103904 ul li span{font-weight:700;font-family:'Roboto', sans-serif;}#sppb-addon-1570144103904 ul li.email a{color:#ffffff;font-weight:600;-webkit-transition:all 300ms ease;-ms-transition:all 300ms ease;-o-transition:all 300ms ease;-moz-transition:all 300ms ease;transition:all 300ms ease;font-family:'Raleway', sans-serif;}#sppb-addon-1570144103904 ul li .icon{position:relative;color:#fee600;font-size:16px;line-height:1em;margin-right:10px;font-family:'FontAwesome';}#sppb-addon-1570144103904 ul li.email a:hover{color:#fee600;}}
                                                                    </style>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sppb-col-md-3" id="column-wrap-id-1570144072016">
                                                    <div id="column-id-1570144072016" class="sppb-column" >
                                                        <div class="sppb-column-addons">
                                                            <div id="sppb-addon-wrapper-1570145759926" class="sppb-addon-wrapper">
                                                                <div id="sppb-addon-1570145759926" class="clearfix "     >
                                                                    <div class="sppb-addon sppb-addon-raw-html text-center text-lg-right">
                                                                        <div class="sppb-addon-content">
                                                                         @guest
                                                                            <ul class="clearfix">
                                                                                <li><a href="{{url('login')}}" target="_blank"><span class="icon flaticon-web-log-in text-primary"></span>Login</a></li>
                                                                                <li><a href="{{url('register')}}" target="_blank"><span class="icon flaticon-file-1 text-primary"></span>Register</a></li>
                                                                            </ul>
                                                                           @else
                                                                            <ul class="clearfix">
                                                                                <li><a href="{{url('/home')}}"><span class="icon flaticon-web-log-in text-primary"></span>Dashboard</a></li>
                                                                                <li>
                                                                                   
                                                                                 <a href="{{ route('logout') }}"
                                                                                   onclick="event.preventDefault();
                                                                                    document.getElementById('logout-form').submit();" class="icon flaticon-file-1 text-primary">Logout
                                                                                 </a>
                                                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                                        {{ csrf_field() }}
                                                                                    </form>
                                                                                </li>
                                                                            </ul>
                                                                         @endguest
                                                                        </div>
                                                                    </div>
                                                                    <style type="text/css">#sppb-addon-wrapper-1570145759926 {
                                                                        margin:0px 0px 0px 0px;}
                                                                        #sppb-addon-1570145759926 {
                                                                        box-shadow: 0 0 0 0 #ffffff;
                                                                        }
                                                                        @media (min-width: 768px) and (max-width: 991px) {#sppb-addon-1570145759926 {}#sppb-addon-wrapper-1570145759926 {margin-top: 0px;margin-right: 0px;margin-bottom: 0px;margin-left: 0px;}}@media (max-width: 767px) {#sppb-addon-1570145759926 {}#sppb-addon-wrapper-1570145759926 {margin-top: 0px;margin-right: 0px;margin-bottom: 0px;margin-left: 0px;}}#sppb-addon-1570145759926 ul > li{position:relative;margin-right:10px;font-size:14px;color:#bbbbbb;padding:9px 0px;padding-right:12px;display:inline-block;}#sppb-addon-1570145759926 ul > li:last-child{margin-right:0;padding-right:0;}#sppb-addon-1570145759926 ul > li > a{font-size:15px;font-weight:600;color:#ffffff;-webkit-transition:all 300ms ease;-ms-transition:all 300ms ease;-o-transition:all 300ms ease;-moz-transition:all 300ms ease;transition:all 300ms ease;font-family:'Raleway', sans-serif;}#sppb-addon-1570145759926 ul > li:after{position:absolute;content:'';right:0px;top:16px;width:1px;height:14px;background-color:rgba(255,255,255,0.20);}#sppb-addon-1570145759926 ul > li:last-child:after{display:none;}#sppb-addon-1570145759926 ul > li > a:hover{color:#fee600;}#sppb-addon-1570145759926 ul > li > a > .icon{position:relative;top:1px;font-size:15px;color:#fee600;margin-right:8px;}
                                                                    </style>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <style type="text/css">.sp-page-builder .page-content #section-id-1570201659693{padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;}#column-id-1570201659692{box-shadow:0 0 0 0 #fff;}.sp-page-builder .page-content #section-id-1570407244380{padding-top:80px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;background-image:url({{asset('assets/images1/2019/10/07/2.jpg')}};background-repeat:no-repeat;background-size:cover;background-attachment:scroll;background-position:0 0;}.sp-page-builder .page-content #section-id-1570407244380 > .sppb-row-overlay {background-color:rgba(27,51,77,0.95)}.sp-page-builder .page-content #section-id-1570407244380 > .sppb-row-overlay {mix-blend-mode:normal;}#column-id-1570407244379{box-shadow:0 0 0 0 #fff;}.sp-page-builder .page-content #section-id-1570407446420{padding:0px 0px 0px 0px;margin:0px 0px 0px 0px;}#column-id-1570407446421{box-shadow:0 0 0 0 #fff;}.sp-page-builder .page-content #section-id-1570408044693{padding-top:20px;padding-right:0px;padding-bottom:20px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;}#column-id-1570408044694{box-shadow:0 0 0 0 #fff;}.sp-page-builder .page-content #section-id-1570408231061{padding-top:18px;padding-right:0px;padding-bottom:18px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;background-color:#152b43;}#column-id-1570408231060{box-shadow:0 0 0 0 #fff;}.sp-page-builder .page-content #section-id-1570144009199{padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;background-color:#0e265d;}#column-id-1570144009198{box-shadow:0 0 0 0 #fff;}</style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <header id="sp-header">
        <div class="container">
            <div class="container-inner">
                <div class="row">
                    <div id="sp-logo" class="col-6 col-sm-5 col-md-4 col-lg-3 col-xl-3 ">
                        <div class="sp-column ">
                            <div class="logo"><a href="{{ url('/') }}"><img class="logo-image d-none d-lg-inline-block" src="{{asset('assets/images/fontend_logo/logo.png')}}" alt="Master Coin"><img class="logo-image-phone d-inline-block d-lg-none" src="{{asset('assets/images/fontend_logo/logo.png')}}" alt="Master Coin"></a></div>
                        </div>
                    </div>
                    <div id="sp-menu" class="col-6 col-sm-7 col-md-8 col-lg-9 col-xl-9 ">
                        <div class="sp-column ">
                            <nav class="sp-megamenu-wrapper" role="navigation">
                                <a id="offcanvas-toggler" aria-label="Navigation" class="offcanvas-toggler-right" href="#"><i class="fa fa-bars" aria-hidden="true" title="Navigation"></i></a>
                                <ul class="sp-megamenu-parent menu-animation-fade d-none d-lg-block">
                                    <li class="sp-menu-item current-item active"><a  href="{{ url('/') }}" >Home</a></li>
                                    
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="sp-section-3">
        <div class="row">
            <div id="sp-title" class="col-lg-12 ">
                <div class="sp-column "></div>
            </div>
        </div>
    </section>
      @yield('content')
      
<div class="owl_carouselmod_109 ">  
    <div id="owl-example-mod_109" class="owl-carousel owl-theme" >  
        <div class="owl-item"><a href="https://windstripethemes.com/" target="_self"><img src="/mastercoins/images/clients/1.png" alt="" /></a></div><div class="owl-item"><a href="https://windstripethemes.com/" target="_self"><img src="/mastercoins/images/clients/2.png" alt="" /></a></div><div class="owl-item"><a href="https://windstripethemes.com/" target="_self"><img src="/mastercoins/images/clients/3.png" alt="" /></a></div><div class="owl-item"><a href="https://windstripethemes.com/" target="_self"><img src="/mastercoins/images/clients/4.png" alt="" /></a></div><div class="owl-item"><a href="https://windstripethemes.com/" target="_self"><img src="/mastercoins/images/clients/5.png" alt="" /></a></div><div class="owl-item"><a href="https://windstripethemes.com/" target="_self"><img src="/mastercoins/images/clients/1.png" alt="" /></a></div><div class="owl-item"><a href="https://windstripethemes.com/" target="_self"><img src="/mastercoins/images/clients/2.png" alt="" /></a></div><div class="owl-item"><a href="https://windstripethemes.com/" target="_self"><img src="/mastercoins/images/clients/3.png" alt="" /></a></div><div class="owl-item"><a href="https://windstripethemes.com/" target="_self"><img src="/mastercoins/images/clients/4.png" alt="" /></a></div><div class="owl-item"><a href="https://windstripethemes.com/" target="_self"><img src="/mastercoins/images/clients/5.png" alt="" /></a></div>  </div>  
    
    <div style="clear:both;"></div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" />
@if(Session::has('msg'))
  <script>      
          swal("{{Session::get('msg')}}","", "success");
  </script>
@endif
@if(Session::has('delmsg'))
  <script>
          swal("{{Session::get('delmsg')}}","", "warning");
  </script>
@endif

@if(Session::has('message'))
  <script>      
          swal("{{Session::get('message')}}","", "success");
  </script>
@endif

      </div>
      </div>
      <!-- Off Canvas Menu -->
      <div class="offcanvas-overlay"></div>
      <div class="offcanvas-menu">
         <a href="#" class="close-offcanvas"><span class="fa fa-remove"></span></a>
         <div class="offcanvas-inner" style="    background: #0e265d;">
            <div class="sp-module ">
               <div class="sp-module-content">
                  <div class="mod-sppagebuilder  sp-page-builder" data-module_id="104">
                     <div class="page-content">
                        <div id="section-id-1570201659693" class="sppb-section sppb-hidden-sm sppb-hidden-xs" >
                           <div class="sppb-container-inner">
                              <div class="sppb-row">
                                 <div class="sppb-col-md-12" id="column-wrap-id-1570201659692">
                                    <div id="column-id-1570201659692" class="sppb-column" >
                                       <div class="sppb-column-addons">
                                          <div id="sppb-addon-wrapper-1570201659696" class="sppb-addon-wrapper">
                                             <div id="sppb-addon-1570201659696" class="clearfix "     >
                                                <div class="sppb-addon sppb-addon-single-image sppb-text-center ">
                                                   <div class="sppb-addon-content">
                                                      <div class="sppb-addon-single-image-container">
                                                      <img class="sppb-img-responsive" src="{{asset('assets/images/fontend_logo/logo.png')}}" alt="Master Coin">
                                                      </div>
                                                   </div>
                                                </div>
                                                <style type="text/css">#sppb-addon-wrapper-1570201659696 {
                                                   margin:0px 0px 0px 0px;}
                                                   #sppb-addon-1570201659696 {
                                                   box-shadow: 0 0 0 0 #ffffff;
                                                   }
                                                   @{{asset('assets (min-width: 768px) and (max-width: 991px) {#sppb-addon-1570201659696 {}#sppb-addon-wrapper-1570201659696 {margin-top: 0px;margin-right: 0px;margin-bottom: 0px;margin-left: 0px;}}@{{asset('assets (max-width: 767px) {#sppb-addon-1570201659696 {}#sppb-addon-wrapper-1570201659696 {margin-top: 0px;margin-right: 0px;margin-bottom: 0px;margin-left: 0px;}}#sppb-addon-1570201659696 .sppb-addon-single-image{padding-bottom:30px;margin-bottom:35px;border-bottom:1px solid #f2f2f2;}
                                                </style>
                                                <style type="text/css">#sppb-addon-1570201659696 img{}</style>
                                             </div>
                                          </div>
                                          <div id="sppb-addon-wrapper-1570203479892" class="sppb-addon-wrapper">
                                             <div id="sppb-addon-1570203479892" class="clearfix "     >
                                                <div class="sppb-addon sppb-addon-ajax-contact ">
                                                   <h2 class="sppb-addon-title">
                                                      Free Consultation 
                                                      <div class="separator"></div>
                                                   </h2>
                                                   <div class="sppb-ajax-contact-content">
                                                      <div class="contact-form">
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif
                            <form method="post" action="{{route('contact.us.message')}}" class="contact-page-form-1">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="text" required value="{{ old('name') }}" class="name" name="name" placeholder="Name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12">
                                        <input type="email" required value="{{ old('email') }}" class="email" name="email" placeholder="Email">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12">
                                        <textarea name="message" placeholder="Your Message..." rows="5" class="form-control"></textarea><br><br>
                                        @if ($errors->has('message'))
                                            <span class="help-block">
                                                        <strong>{{ $errors->first('message') }}</strong>
                                                    </span>
                                        @endif
                                        <input type="submit" value="send now" class="btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                                                      <div style="display:none;margin-top:10px;" class="sppb-ajax-contact-status"></div>
                                                   </div>
                                                </div>
                                                <style type="text/css">#sppb-addon-wrapper-1570203479892 {
                                                   margin:0px 0px 0px 0px;}
                                                   #sppb-addon-1570203479892 {
                                                   box-shadow: 0 0 0 0 #ffffff;
                                                   }
                                                   @{{asset('assets (min-width: 768px) and (max-width: 991px) {#sppb-addon-1570203479892 {}#sppb-addon-wrapper-1570203479892 {margin-top: 0px;margin-right: 0px;margin-bottom: 0px;margin-left: 0px;}}@{{asset('assets (max-width: 767px) {#sppb-addon-1570203479892 {}#sppb-addon-wrapper-1570203479892 {margin-top: 0px;margin-right: 0px;margin-bottom: 0px;margin-left: 0px;}}#sppb-addon-1570203479892 .sppb-addon-title{position:relative;color:#262626;font-size:26px;font-weight:400;line-height:1.1em;margin-bottom:38px;padding:0;}#sppb-addon-1570203479892 .separator{margin-top:20px;position:relative;width:50px;height:4px;margin-left:25px;background-color:#fee600;}#sppb-addon-1570203479892 .separator::before{position:absolute;content:'';top:0px;left:0px;width:20px;height:4px;margin-left:-25px;background-color:#fee600;}#sppb-addon-1570203479892 .sppb-form-control{position:relative;display:block;width:100%;line-height:28px;padding:10px 20px;height:50px;color:#222222;font-size:16px;border:1px solid transparent;background-color:#f7f7f7;transition:all 300ms ease;-ms-transition:all 300ms ease;-webkit-transition:all 300ms ease;}#sppb-addon-1570203479892 .sppb-btn{padding:5px 30px;}
                                                </style>
                                                <style type="text/css">#sppb-addon-1570203479892 .sppb-ajaxt-contact-form .sppb-form-group input:not(.sppb-form-check-input) {border-radius: px;transition:.35s;}#sppb-addon-1570203479892 .sppb-ajaxt-contact-form div.sppb-form-group textarea{border-radius: px;transition:.35s;}#sppb-addon-1570203479892 .sppb-ajaxt-contact-form div.sppb-form-group {margin: 0px 0px 30px 0px;}@{{asset('assets (min-width: 768px) and (max-width: 991px) {#sppb-addon-1570203479892 .sppb-ajaxt-contact-form div.sppb-form-group{margin: 0px 0px 15px 0px;}}@{{asset('assets (max-width: 767px) {#sppb-addon-1570203479892 .sppb-ajaxt-contact-form div.sppb-form-group {margin: 0px 0px 15px 0px;}}</style>
                                             </div>
                                          </div>
                                          <div id="sppb-addon-wrapper-1570203830698" class="sppb-addon-wrapper">
                                             <div id="sppb-addon-1570203830698" class="clearfix "     >
                                                <div class="sppb-addon sppb-addon-raw-html ">
                                                   <div class="sppb-addon-content">
                                                      <div class="btns-box">
                                                         <a href="{{ url('login') }}" class="signin-btn sppb-btn"><span class="icon flaticon-web-log-in"></span> Sign In</a>
                                                         <span class="or" style="    color: #fee600;">or</span>
                                                         <a href="{{ url('register') }}" class="signup-btn sppb-btn"><span class="icon flaticon-edit"></span> Sign Up</a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <style type="text/css">#sppb-addon-wrapper-1570203830698 {
                                                   margin:0px 0px 0px 0px;}
                                                   #sppb-addon-1570203830698 {
                                                   box-shadow: 0 0 0 0 #ffffff;
                                                   }
                                                   @{{asset('assets (min-width: 768px) and (max-width: 991px) {#sppb-addon-1570203830698 {}#sppb-addon-wrapper-1570203830698 {margin-top: 0px;margin-right: 0px;margin-bottom: 0px;margin-left: 0px;}}@{{asset('assets (max-width: 767px) {#sppb-addon-1570203830698 {}#sppb-addon-wrapper-1570203830698 {margin-top: 0px;margin-right: 0px;margin-bottom: 0px;margin-left: 0px;}}#sppb-addon-1570203830698 .btns-box{position:relative;padding-top:40px;margin-top:40px;border-top:1px solid #f2f2f2;}#sppb-addon-1570203830698 .btns-box .signin-btn{position:relative;width:100%;display:block;color:#fee600;font-size:16px;padding:11px 20px;text-align:center;background-color:#0e265d;}#sppb-addon-1570203830698 .btns-box .or{position:relative;color:#fee600;font-size:14px;width:100%;display:block;margin:10px 0px;text-align:center;text-transform:uppercase;}#sppb-addon-1570203830698 .btns-box .signin-btn .icon{margin-right:5px;}#sppb-addon-1570203830698 .btns-box .signup-btn{position:relative;width:100%;display:block;color:#262626;font-size:16px;font-weight:600;padding:11px 20px;text-align:center;background-color:#fee600;font-family:'Raleway', sans-serif;}
                                                </style>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <style type="text/css">.sp-page-builder .page-content #section-id-1570201659693{padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;}#column-id-1570201659692{box-shadow:0 0 0 0 #fff;}</style>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sp-module ">
               <div class="sp-module-content">
                  <ul class="menu">
                      <div class="sppb-addon sppb-addon-single-image sppb-text-center " style="margin-bottom: 30px;">
                       <div class="sppb-addon-content">
                          <div class="sppb-addon-single-image-container">
                          <img class="sppb-img-responsive" src="{{asset('assets/images/fontend_logo/logo.png')}}" alt="Master Coin">
                          </div>
                       </div>
                    </div>
                    
                     <li class="item-101 default current"><a  href="{{ url('/') }}" >Home</a></li>
                                  
                  </ul>
               </div>
            </div>
            
         </div>
      </div>
      <!-- Go to top -->
      
      </body>
</html>