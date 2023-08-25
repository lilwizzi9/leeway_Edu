<?php
$all  = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=ETH,BUSD,USD,EUR");
$res  = json_decode($all);
$busd = $res->BUSD;
?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
   <link href="{{url('/')}}/assets/front_assets/2nd_register.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
   <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="{{url('/')}}/assets/build/css/intlTelInput.css">
   <!--<link rel="stylesheet" href="{{url('/')}}/assets/build/css/demo.css">-->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
   <link href="{{url('/')}}/assets/admin_assets/css/layout.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.5.2/web3.min.js" type="text/javascript"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <style>
   #preloader {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #fff;
      /* change if the mask should have another color then white */
      z-index: 99;
      /* makes sure it stays on top */
   }
   #status {
      width: 200px;
      height: 200px;
      position: absolute;
      left: 50%;
      /* centers the loading animation horizontally one the screen */
      top: 50%;
      /* centers the loading animation vertically one the screen */
      background-image: url(https://raw.githubusercontent.com/niklausgerber/PreLoadMe/master/img/status.gif);
      /* path to your loading animation */
      background-repeat: no-repeat;
      background-position: center;
      margin: -100px 0 0 -100px;
      /* is width and height divided by two */
   }
   [type="checkbox"]:not(:checked) + label:before, [type="checkbox"]:checked + label:before {
      width: 65px;
      height: 30px;
      background: rgb(14 38 93);
      border-radius: 15px;
      left: 0;
      top: -3px;
      transition: all .2s ease;
   }
   label {
      display: inline-block;
      margin-bottom: .5rem;
      color: #0e265d;
      font-weight: 600;
      float: left;
      margin-top: 13px;
   }
   body{
      background:#ff6b16;
   }
   .nav {
      width: 100%;
      height: 55px;
      padding-top: 10px;
      opacity: 1;
      transition: all .5s ease;
      border-top: 4px solid #fee600;
      background: #0e265d;
   }
   .frame {
      height: 790px;
      width: 50%;
      background: #fee600;
      background-size: cover;
      margin-left: auto;
      margin-right: auto;
      border-top: solid 1px rgba(255,255,255,.5);
      border-radius: 5px;
      box-shadow: 0px 2px 7px rgb(0 0 0 / 20%);
      overflow: hidden;
      transition: all .5s ease;
   }
   .iti__country-list {
      position: absolute;
      z-index: 4;
      width: 275px;
      list-style: none;
      text-align: left;
      padding: 0;
      margin: 0 0 0 -1px;
      box-shadow: 1px 1px 4px rgb(0 0 0 / 20%);
      background-color: white;
      border: 1px solid #CCC;
      white-space: nowrap;
      max-height: 200px;
      overflow-y: scroll;
      -webkit-overflow-scrolling: touch;
   }
   .iti {
      position: relative;
      display: inline-block;
      width: 275px;
   }
   .form-signin {
      width: 100%;
      height: 100%;
   }
   select{
      padding: 5px 20px;
      width: 100%;
      font-size: 16px;
   }
   @media only screen and (max-width : 480px) {
      .frame {
         height: 1175px !important;
         width: 340px!important;
      }
   }
   .signup-active a {
      cursor: pointer;
      color: #ffffff;
      text-decoration: none;
      border: none;
      padding-bottom: 10px;
   }
   input[disabled], button[disabled] {
      background-color: #eee !important;
      cursor: pointer !important;
   }
</style>
</head>
<body class="noweb3" style="margin:0px;">
   <div id="preloader" style="display:none;">
      <div id="status">&nbsp;</div>
   </div>
   <div class="layout">
      <div class="auth">
         <div class="auth__wrap">
            <div class="auth__left" style="padding:0px;">
               <br>
               <div class="auth__title">Sign Up</div>
               <hr>
               <form class="form-signin" action="{{ route('register') }}" method="post" name="registerForm" id="registerForm">
                  {{ csrf_field()}}
                  <input type="hidden" id="ethAccountID" value="">
                  <?php
$get_firstuser = DB::table('users')->orderBy('id', 'ASC')->first();
?>
                  <div class="row">
                     <div class="col-md-12">
                        <label for="fullname">Referrer Id</label>
                        <input class="form-styling" type="text" value="{{ isset($username)?$username:$get_firstuser->username }}" id="ref_name" required {{ isset($username)?'disabled':'' }} placeholder=""/ style="    width: 447px;">
                        <div id="ref">
                        </div>
                        @if ($errors->has('referrer_id'))
                        <span class="help-block">
                           <strong>{{ $errors->first('referrer_id') }}</strong>
                        </span>
                        @endif
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-md-12">
                           <label for="fullname" style="margin-left: 15px;">Select Levels</label>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <?php
$packages = DB::table('packages')->get();
foreach ($packages as $package) {
    ?>
                          <div class="btn btn-primary col-sm-3" style="padding: 5px; margin: 5px;">
                           <label style="padding: 2px; margin:0px;">{{ $package->title }} &nbsp;
                              <input type="checkbox" class="level" name="" style="padding: 0px;" value="{{ $package->amount }}" data="{{ $package->id }}" onclick="getLevels({{ $package->id }})">
                           </label>
                        </div>
                        <script type="text/javascript">
                        //   function getLevels{{ $package->id }}(val){
                        //     var val1 = val-1;
                        //     var total = 0;
                        //     var lev_id = 0;
                        //     for(var i=val1; i>0; i--) {
                        //       if($(".level"+i).is(':checked') == true) {
                        //         //$(".level"+i).prop('disabled', true);
                        //      }
                        //      else if($(".level"+i).is(':checked') == false) {
                        //          alert($(".level"+i).is(':checked'))
                        //         $(".level"+i).prop('checked', true);
                        //      }
                        //      else{
                        //       $(".level"+i).prop('checked', true);
                        //       //$(".level"+i).prop('disabled', true);
                        //      }
                        //     $(this).each(function() {
                        //      total += parseInt($(".level"+i).val());
                        //      lev_id += $(".level"+i).attr("data-id").split(",");
                        //   });
                        //  }
                        //  var realCheckVal= parseInt($(".level"+val).val());
                        //  var GetallTotal = realCheckVal + total;
                        //  var totalamountbusd = GetallTotal * {{ $busd }};
                        //          //alert(totalamountbusd);
                        //          var lev_ids = lev_id + $(".level"+val).attr("data-id");
                        //          $("#total_level_amount").val(GetallTotal);
                        //          $("#total_amount").val(totalamountbusd);
                        //          $("#all_levels").val(lev_ids);
                        //       }
                         function getLevels(val)
                         {
                             var val1 = val-1;
                             var total = 0;
                             var lev_id = 0;
                             $('.level').each(function(){
                                 
                                if($(this).attr('data')<=val)
                                {
                                  $(this).prop('checked', true); 
                                }
                                else
                                {
                                   $(this).prop('checked', false); 
                                }
                                if($(this).prop('checked')==true)
                                {
                                    total += parseInt($(this).val());
                                    lev_id += $(this).attr("data").split(",");
                                }
                             })
                             var realCheckVal= 0;
                             var GetallTotal = realCheckVal + total;
                             var totalamountbusd = GetallTotal * {{ $busd }};
                                 var lev_ids = lev_id ;
                                 $("#total_level_amount").val(GetallTotal);
                                 $("#total_amount").val(totalamountbusd);
                                 $("#all_levels").val(lev_ids);
                            
                         }
                           </script>
                        <?php }?>
                        <br>
                     </div>
                     <input type="hidden" name="all_levels" id="all_levels">
                     <input type="hidden" name="total_amount" id="total_amount">
                     <input type="hidden" name="total_level_amount" id="total_level_amount">
                        <!--   <div class="col-md-6">
                           <label for=" First Name"> Full Name</label>
                           <input value="{{old('first_name')}}" class="form-styling" required type="text" name="first_name" id="first_name">
                           @if ($errors->has('first_name'))
                           <span class="help-block">
                           <strong>{{ $errors->first('first_name') }}</strong>
                           </span>
                           @endif
                        </div> -->
                     </div>
                     <!-- <div class="row">
                        <div class="col-md-6">
                           <label for="Email"> Email</label>
                           <input required type="email" class="form-styling" name="email" id="email"  value="{{old('email')}}">
                           @if ($errors->has('email'))
                           <span class="help-block">
                           <strong>{{ $errors->first('email') }}</strong>
                           </span>
                           @endif
                        </div>
                        <div class="col-md-6">
                           <label>Mobile Number</label>
                           <input required type="text" class="form-styling" name="mobile" id="mobile" value="{{old('mobile')}}">
                           @if ($errors->has('mobile'))
                           <span class="help-block">
                           <strong>{{ $errors->first('mobile') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div> -->
                     <!--  <div class="row">
                        <div class="col-md-6">
                           <label>  Select Country</label>
                           <select class="select_panel" data-live-search="true" name="country" id="country" required>
                              <?php
$countrys = DB::table('country')->get();
foreach ($countrys as $countr) {
    ?>
                              <option value="{{ $countr->nicename }}">{{ $countr->nicename }}</option>
                              <?php }?>
                           </select>
                           @if ($errors->has('country'))
                           <span class="help-block">
                           <strong>{{ $errors->first('country') }}</strong>
                           </span>
                           @endif
                        </div>
                        <div class="col-md-6">
                           <label>  Select Package</label>
                           <select class="select_panel" data-live-search="true" name="package" id="package" required>
                              <option>Select</option>
                              <?php
$packages = DB::table('packages')->where('id', 1)->get();
foreach ($packages as $package) {
    ?>
                              <option value="{{ $package->id }}">{{ $package->title }}</option>
                              <?php }?>
                           </select>
                           @if ($errors->has('package'))
                           <span class="help-block">
                           <strong>{{ $errors->first('package') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div> -->
                     <br>
                     <br>
                     <div class="row">
                        <div class="col-sm-12">
                           <input type="checkbox" id="checkbox" name="agreement" style="width: 14px; height: 25px;">
                           <label for="checkbox" style="font-size:12px;"><span class="ui"></span>Agree with the
                              <a href="{{url('terms')}}" style="color: limegreen" >Terms</a> and <a href="{{url('policy')}}" style="color: limegreen"> Policy </a>
                           </label>
                           <br>
                           <br> Already have account <a style="margin-left:5px;" href="{{url('login')}}"> Sign In?</a></span>
                        </div>
                     </div>
                     @if ($errors->has('agreement'))
                     <span class="help-block">
                        <strong>{{ $errors->first('agreement') }}</strong>
                     </span>
                     @endif
                     <br>
                     <div class="row" style="margin-bottom: 20px;">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                           <button type="submit" class="btn" id="RegisterSubmit" style="width: 100%; background: #0e265d;  color: #fee600;">Sign up</button>
                        </div>
                        <div class="col-sm-4"></div>
                     </div>
                  </form>
                  <!-- <button type="submit" class="btn" id="ContractWithdraw" style="width: 100%; background: #0e265d;  color: #fee600;">ContractWithdraw</button>
 -->
               </div>
               <div class="auth__right">
                  <a href="https://leewayedu.io/" class="auth__logo"><img src="{{asset('assets/assets_mainindex/img/logo.jpeg')}}" alt="" class="img-fluid rounded-circle" style="height:100px;border-radius:50%;"></a>
                  <div class="auth__subtitle2">Follow us on social networks</div>
                  
                        <div class="auth__social"><a href="https://twitter.com/leeway" target="_blank"><i class="fa fa-fw fa-twitter"></i></a><a href="https://linkedin.com/company/leewayedu" target="_blank"><i class=""><span class="iconify" data-icon="akar-icons:linkedin-fill"></span></i></a><a href="https://facebook.com/leewayedu" target="_blank"><i class=""><span class="iconify" data-icon="bi:facebook"></span></i></a></div>



                        <br>



<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

                  <div class="auth__links" href="https://leewayedu.io/"><span style="color: #fff">Leeway<br><br></span></div>
               </div>
            </div>
         </div>
      </div>
      <?php
$get_level1Package       = DB::table('packages')->where('id', 1)->first();
$get_level1PackageAmount = 0.0096 * 1000000000000000000;
?>
      <!----><script>
         var config = {
           lang: {
             authModeAuto: 'NOTE: never share your private key (12 words) from your wallet!',
             authModeView: 'NOTE: never share your private key (12 words) from your wallet!',
          }
       };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
    
      <!--<script src="/modules/site/layout/assets/common.js?1587058987"></script>-->
      
      <!--<script src="/modules/site/layout/assets/notice.js?1587058987"></script>-->
      
      <!--<script src="https://million.money/assets/js/toast.js"></script>
      <script src="/modules/site/auth/assets/common.js?1612999618"></script>-->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
    @section('script')
    <script>
      async function getAccount() {
       const accounts = await ethereum.request({ method: 'eth_requestAccounts' });
       const account = accounts[0];
       $('#ethAccountID').val(account);
    }
    $(document).ready(function() {
      /** REGISTER USING METAMASK VALIDATION **/
      getAccount();
      setTimeout(function(){
        if($('#ethAccountID').val() == '')
        {
           if (typeof window.ethereum == 'undefined')
           {
             toastr.error("Please Login Metamask / Install Metamask");
             return;
          }
       }
    }, 1000);
      $(document).on('click','#RegisterSubmit',function(event){
       event.preventDefault();
       var all_levels   = $("#all_levels").val();
       var total_amount = $("#total_amount").val();
       var total_level_amount = $("#total_level_amount").val();
       var referrer_id = $('#referrer_id').val();
       var package = $('#package').val();
       var token = "{{csrf_token()}}";
       if($('#referrer_id').val() == "")
       {
         toastr.error("Please enter Referrer Id.");
         return;
      }
      if($('.level1').val() == "")
      {
        toastr.error("Please select Package.");
        return;
     }
     if($('input#checkbox').prop("checked") == false)
     {
        toastr.error("Please agree to the terms & conditions.");
        return;
     }
     $('#preloader').show();
     $.ajax({
      url: "/register/register_operation",
      cache: false,
      type:"POST",
      aysnc:false,
      data:{
        'referrer_id': '' ,
                   // 'first_name': '' ,
                   // 'email': '' ,
                   // 'mobile': '' ,
                   // 'country': '' ,
                   'total_level_amount': '' ,
                   'all_levels': '' ,
                   'package': '' ,
                   'trans_hash': '' ,
                   'username': $('#ethAccountID').val() ,
                   '_token' : token
                },
                success: function(res){
                 var jsonRes = JSON.parse(res);
                 if(jsonRes.error == 'user_exists')
                 {
                  $('#preloader').delay(350).fadeOut('slow');
                  toastr.error('User already exists.Please login');
                  return;
               }else if(jsonRes.success == 'go_forward'){
                if (typeof window.ethereum !== 'undefined')
                {
                  var minABI = [{"constant":false,"inputs":[],"name":"disregardProposeOwner","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"name","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_spender","type":"address"},{"name":"_value","type":"uint256"}],"name":"approve","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"assetProtectionRole","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"r","type":"bytes32[]"},{"name":"s","type":"bytes32[]"},{"name":"v","type":"uint8[]"},{"name":"to","type":"address[]"},{"name":"value","type":"uint256[]"},{"name":"fee","type":"uint256[]"},{"name":"seq","type":"uint256[]"},{"name":"deadline","type":"uint256[]"}],"name":"betaDelegatedTransferBatch","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"sig","type":"bytes"},{"name":"to","type":"address"},{"name":"value","type":"uint256"},{"name":"fee","type":"uint256"},{"name":"seq","type":"uint256"},{"name":"deadline","type":"uint256"}],"name":"betaDelegatedTransfer","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_from","type":"address"},{"name":"_to","type":"address"},{"name":"_value","type":"uint256"}],"name":"transferFrom","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"initializeDomainSeparator","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"unpause","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_addr","type":"address"}],"name":"unfreeze","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"claimOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_newSupplyController","type":"address"}],"name":"setSupplyController","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"paused","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"_addr","type":"address"}],"name":"balanceOf","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"initialize","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"pause","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"getOwner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"target","type":"address"}],"name":"nextSeqOf","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_newAssetProtectionRole","type":"address"}],"name":"setAssetProtectionRole","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_addr","type":"address"}],"name":"freeze","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"owner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_newWhitelister","type":"address"}],"name":"setBetaDelegateWhitelister","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_value","type":"uint256"}],"name":"decreaseSupply","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"_addr","type":"address"}],"name":"isWhitelistedBetaDelegate","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_to","type":"address"},{"name":"_value","type":"uint256"}],"name":"transfer","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_addr","type":"address"}],"name":"whitelistBetaDelegate","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_proposedOwner","type":"address"}],"name":"proposeOwner","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_value","type":"uint256"}],"name":"increaseSupply","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"betaDelegateWhitelister","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"proposedOwner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_addr","type":"address"}],"name":"unwhitelistBetaDelegate","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"_owner","type":"address"},{"name":"_spender","type":"address"}],"name":"allowance","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_addr","type":"address"}],"name":"wipeFrozenAddress","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"EIP712_DOMAIN_HASH","outputs":[{"name":"","type":"bytes32"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"_addr","type":"address"}],"name":"isFrozen","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"supplyController","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"reclaimBUSD","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"owner","type":"address"},{"indexed":true,"name":"spender","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"currentOwner","type":"address"},{"indexed":true,"name":"proposedOwner","type":"address"}],"name":"OwnershipTransferProposed","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"oldProposedOwner","type":"address"}],"name":"OwnershipTransferDisregarded","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"oldOwner","type":"address"},{"indexed":true,"name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[],"name":"Pause","type":"event"},{"anonymous":false,"inputs":[],"name":"Unpause","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"addr","type":"address"}],"name":"AddressFrozen","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"addr","type":"address"}],"name":"AddressUnfrozen","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"addr","type":"address"}],"name":"FrozenAddressWiped","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"oldAssetProtectionRole","type":"address"},{"indexed":true,"name":"newAssetProtectionRole","type":"address"}],"name":"AssetProtectionRoleSet","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"SupplyIncreased","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"SupplyDecreased","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"oldSupplyController","type":"address"},{"indexed":true,"name":"newSupplyController","type":"address"}],"name":"SupplyControllerSet","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"value","type":"uint256"},{"indexed":false,"name":"seq","type":"uint256"},{"indexed":false,"name":"fee","type":"uint256"}],"name":"BetaDelegatedTransfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"oldWhitelister","type":"address"},{"indexed":true,"name":"newWhitelister","type":"address"}],"name":"BetaDelegateWhitelisterSet","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"newDelegate","type":"address"}],"name":"BetaDelegateWhitelisted","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"oldDelegate","type":"address"}],"name":"BetaDelegateUnwhitelisted","type":"event"}];
                  var resSuccess = "";
                  var contractAddress = '0xFA7466A078f679CAd7b09F7aC949509dC24400de';
                  const web3 = new Web3(window.web3.currentProvider);
                  const contractInstance =  new web3.eth.Contract(minABI, contractAddress);
                  const amount = total_amount;
                  // THIS IS LATEST CONTRACT ADDRESS
                  var toAddress = '0x195ecc837340754610e730d04cf5c3abb6a62a95';
                  const tx = {
                    from: $('#ethAccountID').val(),
                    to: contractInstance._address,
                    gas: '210000',
                    gasPrice: '10000000000',
                    data: contractInstance.methods.transfer(toAddress, web3.utils.toWei( amount.toString() ) ).encodeABI(),
                 }
                 web3.eth.sendTransaction(tx).then(res => {
                    transactionSuccess(res);
                 }).catch(err => {
                  console.log("err",err)
               });
              }else
              {
                 toastr.error('MetaMask is not installed!');
                 return;
              }
           }
        }
     });
});
});
/** REGISTER USING METAMASK VALIDATION **/
         </script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         <script>
            $(document).ready(function() {
              $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                  $('#show_hide_password input').attr('type', 'password');
                  $('#show_hide_password i').addClass( "fa-eye-slash" );
                  $('#show_hide_password i').removeClass( "fa-eye" );
               }else if($('#show_hide_password input').attr("type") == "password"){
                  $('#show_hide_password input').attr('type', 'text');
                  $('#show_hide_password i').removeClass( "fa-eye-slash" );
                  $('#show_hide_password i').addClass( "fa-eye" );
               }
            });
});
$( function() {
  $( "#datepicker" ).datepicker();
} );
var Password = {
  _pattern : /[a-zA-Z0-9_\-\+\.]/,
  _getRandomByte : function()
  {
    if(window.crypto && window.crypto.getRandomValues)
    {
      var result = new Uint8Array(1);
      window.crypto.getRandomValues(result);
      return result[0];
   }
   else if(window.msCrypto && window.msCrypto.getRandomValues)
   {
      var result = new Uint8Array(1);
      window.msCrypto.getRandomValues(result);
      return result[0];
   }
   else
   {
      return Math.floor(Math.random() * 256);
   }
},
generate : function(length)
{
   return Array.apply(null, {'length': length})
   .map(function()
   {
      var result;
      while(true)
      {
        result = String.fromCharCode(this._getRandomByte());
        if(this._pattern.test(result))
        {
          return result;
       }
    }
 }, this)
   .join('');
}
};
</script>
<?php
//if(isset($username)){
?>
<script type="text/javascript">
   var ref_id = $('#ref_name').val();
   var token = "{{csrf_token()}}";
   var postion = $('#position').val();
   $.ajax({
     type: "POST",
     url:"{{route('get.ref.id')}}",
     data:{
       'ref_id': ref_id ,
       '_token' : token
    },
    success:function(data){
       $("#ref").html(data);
       if(postion ==null || postion =='L' || postion=='R'){
         updateHand()
      }
   }
});
   $(document).on('keyup','#ref_name',function() {
     var ref_id = $('#ref_name').val();
     var token = "{{csrf_token()}}";
     var postion = $('#position').val();
     $.ajax({
       type: "POST",
       url:"{{route('get.ref.id')}}",
       data:{
         'ref_id': ref_id ,
         '_token' : token
      },
      success:function(data){
         $("#ref").html(data);
         if(postion ==null || postion =='L' || postion=='R'){
           updateHand()
        }
     }
  });
  });
   $(document).on('change', '#position', function () {
     updateHand();
  });
   function updateHand() {
     var pos = $('#position').val();
     var referrer_id = $('#referrer_id').val();
     var token = "{{csrf_token()}}";
     $.ajax({
       type: "POST",
       url:"{{route('get.user.position')}}",
       data:{
         'pos': pos ,
         'referrer_id': referrer_id ,
         '_token' : token
      },
      success:function(data){
         $("#ref_pos").html(data);
      }
   });
  }
</script>
@if(Session::has('msg'))
<script>
   $(document).ready(function(){
     swal("{{Session::get('msg')}}","", "success");
  });
</script>
@endif
@if(Session::has('delmsg'))
<script>
   $(document).ready(function(){
     swal("{{Session::get('delmsg')}}","", "warning");
  });
</script>
@endif
<script type="text/javascript">(function(){window['__CF$cv$params']={r:'67a5a562acfa0897',m:'491f67850b85870d4bfdee80c4a723b3b618c660-1628225444-1800-ARWcxnjULrPbrGx2YlaHMVPgTCo6Agh6UV1jPRbdt6ZYYbmLtE+gDoHKuVzT9sPWanwFx3OBsL8+3TTYkEnyFr0ygJmc4sKXryZozSY+qsP30Bi/Girl+cA8zJz2ADxITA==',s:[0xd299730a44,0x8b1fa1e639],u:'/cdn-cgi/challenge-platform/h/g'}})();</script><script defer="" src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon="{&quot;rayId&quot;:&quot;67a5a562acfa0897&quot;,&quot;version&quot;:&quot;2021.7.0&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;2187677634ed42a0b8ea828c0aa4803d&quot;,&quot;si&quot;:10}"></script>
<script>
   function transactionSuccess(transactionData){
    var txHash = transactionData.blockHash;
    var all_levels   = $("#all_levels").val();
    var total_amount = $("#total_amount").val();
    var total_level_amount = $("#total_level_amount").val();
    var referrer_id = $('#referrer_id').val();
    var package = $('#package').val();
    $.ajax({
       url: "/register/register_operation",
       cache: false,
       type:"POST",
       aysnc:false,
       data:{
         'total_level_amount': total_level_amount ,
         'all_levels': all_levels ,
         'package': package ,
         'trans_hash': txHash ,
         'username': $('#ethAccountID').val(),
         'referrer_id': referrer_id,
         '_token' : token
      },
      success: function(res){
       $('#preloader').delay(350).fadeOut('slow');
       var jsonRes = JSON.parse(res);
       if(jsonRes.success == true)
       {
         toastr.success('You are successfully registered.');
         setTimeout(function(){ window.location.href="{{url('/')}}/home"; }, 3000);
      }else{
         toastr.error('You are not register because this sponsor have 3 users please try another sponsor.');
      }
   }
})
 }
 /** code for contract transfer BUSD **/
 $(document).on('click','#ContractWithdraw',function(){
  var minABI = [{"constant":false,"inputs":[],"name":"disregardProposeOwner","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"name","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_spender","type":"address"},{"name":"_value","type":"uint256"}],"name":"approve","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"assetProtectionRole","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"r","type":"bytes32[]"},{"name":"s","type":"bytes32[]"},{"name":"v","type":"uint8[]"},{"name":"to","type":"address[]"},{"name":"value","type":"uint256[]"},{"name":"fee","type":"uint256[]"},{"name":"seq","type":"uint256[]"},{"name":"deadline","type":"uint256[]"}],"name":"betaDelegatedTransferBatch","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_from","type":"address"},{"name":"_to","type":"address"},{"name":"_value","type":"uint256"}],"name":"transferFromContract","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"sig","type":"bytes"},{"name":"to","type":"address"},{"name":"value","type":"uint256"},{"name":"fee","type":"uint256"},{"name":"seq","type":"uint256"},{"name":"deadline","type":"uint256"}],"name":"betaDelegatedTransfer","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_from","type":"address"},{"name":"_to","type":"address"},{"name":"_value","type":"uint256"}],"name":"transferFrom","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"amount","type":"uint256"}],"name":"withdraw","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"initializeDomainSeparator","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"unpause","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_addr","type":"address"}],"name":"unfreeze","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"claimOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_newSupplyController","type":"address"}],"name":"setSupplyController","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"paused","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"_addr","type":"address"}],"name":"balanceOf","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"initialize","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"pause","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"getOwner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"target","type":"address"}],"name":"nextSeqOf","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_newAssetProtectionRole","type":"address"}],"name":"setAssetProtectionRole","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_addr","type":"address"}],"name":"freeze","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"owner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_newWhitelister","type":"address"}],"name":"setBetaDelegateWhitelister","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"_addr","type":"address"}],"name":"isWhitelistedBetaDelegate","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_to","type":"address"},{"name":"_value","type":"uint256"}],"name":"transfer","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_addr","type":"address"}],"name":"whitelistBetaDelegate","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_proposedOwner","type":"address"}],"name":"proposeOwner","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"betaDelegateWhitelister","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"proposedOwner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_addr","type":"address"}],"name":"unwhitelistBetaDelegate","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"_owner","type":"address"},{"name":"_spender","type":"address"}],"name":"allowance","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_addr","type":"address"}],"name":"wipeFrozenAddress","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"EIP712_DOMAIN_HASH","outputs":[{"name":"","type":"bytes32"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"_addr","type":"address"}],"name":"isFrozen","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"supplyController","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"reclaimBUSD","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"owner","type":"address"},{"indexed":true,"name":"spender","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"currentOwner","type":"address"},{"indexed":true,"name":"proposedOwner","type":"address"}],"name":"OwnershipTransferProposed","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"oldProposedOwner","type":"address"}],"name":"OwnershipTransferDisregarded","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"oldOwner","type":"address"},{"indexed":true,"name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[],"name":"Pause","type":"event"},{"anonymous":false,"inputs":[],"name":"Unpause","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"addr","type":"address"}],"name":"AddressFrozen","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"addr","type":"address"}],"name":"AddressUnfrozen","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"addr","type":"address"}],"name":"FrozenAddressWiped","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"oldAssetProtectionRole","type":"address"},{"indexed":true,"name":"newAssetProtectionRole","type":"address"}],"name":"AssetProtectionRoleSet","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"SupplyIncreased","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"SupplyDecreased","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"oldSupplyController","type":"address"},{"indexed":true,"name":"newSupplyController","type":"address"}],"name":"SupplyControllerSet","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"value","type":"uint256"},{"indexed":false,"name":"seq","type":"uint256"},{"indexed":false,"name":"fee","type":"uint256"}],"name":"BetaDelegatedTransfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"oldWhitelister","type":"address"},{"indexed":true,"name":"newWhitelister","type":"address"}],"name":"BetaDelegateWhitelisterSet","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"newDelegate","type":"address"}],"name":"BetaDelegateWhitelisted","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"oldDelegate","type":"address"}],"name":"BetaDelegateUnwhitelisted","type":"event"}];
  var resSuccess = "";
  var contractAddress = '0x1da7A1744fb6d639219e92fBC026164199608Ff8';
  const web3 = new Web3(window.web3.currentProvider);
  const contractInstance =  new web3.eth.Contract(minABI, contractAddress);
  total_amount = 0.01;
  const amount = total_amount;
  var toAddress = '0x109E90F3F17B7c4f46d7936d1E85F5f3c9A8a18f';
 async function transferBUSD() {
     amount1 = 1;
     trans = await contractInstance.methods.transferFromContract('0x1da7A1744fb6d639219e92fBC026164199608Ff8','0x6D49bF5894c94026A73b2F0Eaea16Eb626465Bb4',web3.utils.toWei(amount1.toString() )).call();
    return trans;
 }
 async function getBalance() {
    balance = await contractInstance.methods.balanceOf('0x109E90F3F17B7c4f46d7936d1E85F5f3c9A8a18f').call();
    return balance;
 }
 console.log(transferBUSD());
 console.log("rahulsharma");
 return;
 const tx = {
  from: contractInstance._address,
  to: '0x6D49bF5894c94026A73b2F0Eaea16Eb626465Bb4',
  gas: '210000',
  gasPrice: '10000000000',
  data: contractInstance.methods.transfer('0x6D49bF5894c94026A73b2F0Eaea16Eb626465Bb4', web3.utils.toWei( amount.toString() ) ).encodeABI(),
}
web3.eth.sendTransaction(tx).then(res => {
  alert("WEB3 TRANSACTION ");
}).catch(err => {
   console.log("err",err)
});
});
/** code for contract transfer BUSD **/
</script>
</body>
</html>