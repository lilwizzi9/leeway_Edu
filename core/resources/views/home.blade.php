<?php
/* $res_S_C_api_token=smartCOntractAPI('getTokenbalance','securitytoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9webc11126&address='.Auth::user()->address);
 $get_S_C_res_token=json_decode($res_S_C_api_token);
 $lewt_token= $get_S_C_res_token->data/1000000000000000000;


 $res_S_C_api_bnb=smartCOntractAPI('getBNBbalance','securitytoken=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9webc11126&address='.Auth::user()->address);
 $get_S_C_res_bnb=json_decode($res_S_C_api_bnb);
 $bnb_balance= $get_S_C_res_bnb->data/1000000000000000000;*/


$total_lewtToken=DB::table('users')->sum('lewt_balance');
$lewt_token= isset(Auth::user()->lewt_balance)?Auth::user()->lewt_balance:0; 
?>

@extends('fonts.layouts.user')
@section('site')
    | DashBoard
@endsection


@section('style')
    <style>
.info-blocks__footer {
    margin: 10px 0 0;
    display: flex;
    align-items: center;
}

.basic123{
    width: 680px !important;
    left: 35% !important;
}
@media(max-width:600px){
  .basic123{
        left: 1% !important;
 }  
}

.basic123 strong{
    margin-top: 7px;
    margin-bottom: 7px;    
}
.basic123 label{
    margin-top: 7px;
    margin-bottom: 7px;    
}
 font{
         color: white !important;
 }
 .m-heading-1>p {
    color: white !important;
    margin: 10px 0 0;
}
.border-dark {
    border-color: #fee600!important;
}
.dashboard-stat {
    background-color: rgb(242, 242, 242) !important;
    color: #fff;
}
        a.more{ color: #fff !important; }
        .visual{
            color: #f7f6ff;
        }
        .pranto{
            margin-bottom: 10px;
            
        }
        .dashboard-stat.custom{box-shadow: 5px 5px 10px #ccc;}
        .dashboard-stat .details .desc {
            text-align: right;
            font-size: 15px !important;
            letter-spacing: 0;
            font-weight: 300;
        }
        /*.dashboard-stat .title{*/
        /*    background: url(https://invest.tradepromarket.com/assets/images/fontend_slide/inv-bg.jpg);*/
        /*    background-position: center;*/
        /*    height:60px;*/
        /*    color:#fff;*/
        /*    padding-top: 18px;*/
        /*}*/
        .dashboard-stat .title span{
            font-size:15px;
            color:#fff;
            padding: 19px;
            font-weight: 500;
        }
        
        rect:nth-child(even){
            fill: #2980b9;

        }
        rect:nth-child(odd){
            fill: #27ae60;
        }
        .pull-right {
            float: right!important;
            padding-right: 10px;
        }
        .m-heading-1 {
            margin: 0 0 20px;
            background: rgb(242, 242, 242);
            /* color: white; */
            padding-left: 15px;
            border-left: 8px solid #88909a;
        }
        
    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://leewayedu.io/assets/css/user0.css">
@endsection
@section('main-content')
<?php
 $get_coin=DB::table('coins')->where('id',1)->first();
?>
    <div class="page-content-wrapper">
        <div class="page-content">
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-06">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</h3>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                         
            <?php
                   $total_deposit=DB::table('deposits')->where(['user_id'=>Auth::user()->id,'status'=>1])->sum('amount');
                   if(DB::table('direct_deposit_bonus')->where('amount',$total_deposit)->count()){
                     $direct_deposit_bonus=DB::table('direct_deposit_bonus')->where('amount',$total_deposit)->first();
                ?>
                 <div class="row" style="background-image: url({{asset('assets/images/giphy-downsized-large.gif')}}); padding: 30px;"> 
                    <div class="col-sm-12" style="background: orange; padding: 13px;">
                        <div class="col-sm-4" style="font-size: 22px; color: white;">Congractulation! {{ Auth::user()->first_name }} [{{ Auth::user()->username }}]</div>
                        <div class="col-md-4">
                          <img height="80px" src="{{asset('assets/images/'. $direct_deposit_bonus->image)}}">
                        </div>
                        <div class="col-sm-4" style="font-size: 22px; color: white;">Your Bonus Is: {{ $direct_deposit_bonus->description }}</div>
                    </div>
                 </div>
                 <br><br>
                <?php
                   }  
                ?>            
            

            <div class="row">

               
                    <div class="col-md-12">
                        
                        <?php
                         $user_news=DB::table('teams')->where('type','List')->get();
                         if(count($user_news)>0){
                         foreach ($user_news as $news) {
                        ?>
                          <div class="alert alert-info" role="alert" style="color: black">
                            <marquee>
                                <strong>{{ $news->name}}. </strong>{{ $news->designation}} 
                            </marquee>
                          </div>
                        <?php } }?>
                        
                    </div>
        <div class="col-md-12">
               <div class="info-blocks invert">

               <div class="info-blocks__item">
                <div class="info-blocks__label">Lewt Balance</div>
                <img src="{{ asset('assets/images/info-block2.png') }}" class="info-blocks__icon">
                <div class="info-blocks__footer"><div class="info-blocks__value">{{ $lewt_token }}</div></div>
               @if($total_lewtToken>3500000)
                 <div class="info-blocks__footer"><div class="info-blocks__value"><a href="{{ url('add_withdraw_leeway') }}" class="btn btn-succes btn-xs" style="padding: 4px 6px; font-size: 10px;">Withdraw LEWT</a></div></div>
               @else
                 <div class="info-blocks__footer"><div class="info-blocks__value"><a href="javascript:void" title="Disabled" class="btn btn-succes btn-xs" style="cursor: not-allowed; padding: 4px 6px; font-size: 10px;">Withdraw LEWT</a></div></div>
               @endif
              </div>

               <div class="info-blocks__item">
                <div class="info-blocks__label">Partners<br><nobr>Total / Last 24h</nobr></div>
                <img src="{{ asset('assets/images/info-block3.png') }}" class="info-blocks__icon">
                <div class="info-blocks__footer"><div class="info-blocks__value">{{ $total_reff }}<small> / {{ $today_total_reff }}</small></div></div>
              </div>

             <div class="info-blocks__item">
                <div class="info-blocks__label">The current level</div>
                <img src="{{ asset('assets/images/info-block4.png') }}" class="info-blocks__icon">
                <div class="info-blocks__footer">
                  <div class="info-blocks__value">
                   {{ $getLevel }}
                   <h6>Upgrade Your Level</h6>
                   <?php 
                     $num = Auth::user()->all_levels;
                     $var = ltrim($num, '0');
                     $mynumber= printMaxNum($var);
                     $mylast_level=substr($mynumber, 0, 1);
                     $leave_levels=DB::table('packages')->where('id','>',$mylast_level)->limit(1)->get();
                     foreach ($leave_levels as $key1) {
                  ?>
                   <a class="btn btn-succes btn-xs" style="padding: 4px 6px; font-size: 10px;" href="{{ url('updateLevel') }}/{{ $key1->id }}">{{ $key1->title }}</a>                       
                  <?php
                     }
                   ?>
                  </div>
                </div>
             </div>

            </div>
        </div>
              
         <div class="col-md-12">
               <div class="info-blocks invert">

               <div class="info-blocks__item">
                <div class="info-blocks__label">BUSD Balance</div>
                <img src="{{ asset('assets/images/info-block2.png') }}" class="info-blocks__icon">
                <div class="info-blocks__footer"><div class="info-blocks__value">{{ Auth::user()->balance }}</div></div>
                <div class="info-blocks__footer"><div class="info-blocks__value">{{ $lewt_token }}</div></div>
               @if($total_lewtToken>3500000)
                 <div class="info-blocks__footer"><div class="info-blocks__value"><a href="{{ url('add_withdraw_leeway') }}" class="btn btn-succes btn-xs" style="padding: 4px 6px; font-size: 10px;">Withdraw BUSD</a></div></div>
               @else
                 <div class="info-blocks__footer"><div class="info-blocks__value"><a href="javascript:void" title="Disabled" class="btn btn-succes btn-xs" style="cursor: not-allowed; padding: 4px 6px; font-size: 10px;">Withdraw BUSD</a></div></div>
               @endif
              </div>
                 
              <div class="info-blocks__item">
                <div class="info-blocks__label">My Address</div>
                <div class="info-blocks__footer"><div class="info-blocks__value" style="fontsize:8px !important;"><input type="text" value="{{ Auth::user()->username }}" class="form-control"></div></div>
              </div>
                 
            <!--   <div class="info-blocks__item">
                <div class="info-blocks__label">My Private Key</div>
                <div class="info-blocks__footer"><div class="info-blocks__value" style="fontsize:8px !important;"><input type="text" value="{{ Auth::user()->privateKey }}" class="form-control"></div></div>
              </div> -->

               <div class="info-blocks__item">
                <div class="info-blocks__label">Total Commisions</div>
                <div class="info-blocks__footer"><div class="info-blocks__value">
                <?php
                 echo number_format(DB::table('transactions')->where(['type'=>25,'type'=>26,'user_id'=>Auth::user()->id])->sum('amount'),2);
                ?>
               </div></div>
              </div>
           
            </div>
        </div>


         <div class="col-md-12">
            <div class="info-blocks invert">
               <div class="info-blocks__item">
                <div class="info-blocks__label" style="max-width: 100%;">Total Matrix Commisions</div>
                <div class="info-blocks__footer"><div class="info-blocks__value">
                <?php
                 echo number_format(DB::table('transactions')->where(['type'=>26,'user_id'=>Auth::user()->id])->sum('amount'),2);
                ?>
               </div></div>
              </div>

              <div class="info-blocks__item">
                <div class="info-blocks__label" style="max-width: 100%;">Total Sponsor Commisions</div>
                <div class="info-blocks__footer"><div class="info-blocks__value">
                <?php
                 echo number_format(DB::table('transactions')->where(['type'=>25,'user_id'=>Auth::user()->id])->sum('amount'),2);
                ?>
               </div></div>
              </div>

              <div class="info-blocks__item">
                <div class="info-blocks__label" style="max-width: 100%;">Total Withdrawl Amount</div>
                <div class="info-blocks__footer"><div class="info-blocks__value">
                <?php
                 echo number_format(DB::table('transactions')->where(['type'=>2,'user_id'=>Auth::user()->id])->sum('amount'),2);
                ?>
               </div></div>
              </div>


            </div>
        </div>


               
<script type="text/javascript">
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  $('.copied_cont').value('Copied');
}
</script>

               
            </div>
        </div>
    </div>

<!-- @if(Auth::user()->profile_not_updated == 0)
<script type="text/javascript">
  $(document).ready(function() {
    $('#basic').modal('show');
     iziToast.show({
        timeout: 10000,
        theme: 'dark',
        position: 'center',
        image:"<?= asset('assets/images/assets_mainindex/img/svg/leeway_logo.svg') ?>",
        maxWidth:'',
        message: 'Hey {{ Auth::user()->first_name }}! Welcome To {{$general->web_title}}',
     });
  });
</script>
@endif -->
<!-- @if(Auth::user()->profile_not_updated == 1 && Auth::user()->redeem_joining_coins == 0)
<script type="text/javascript">
  $(document).ready(function() {      
    setTimeout(function(){ $('#redeem_coin').modal('show'); }, 10000);  
  });
</script>
@endif -->
<!-- @if(Auth::user()->paid_status == 1 && Auth::user()->tfver == 1)
<script type="text/javascript">
  $(document).ready(function() {      
    setTimeout(function(){ $('#google_auth').modal('show'); }, 4000);  
  });
</script>
@endif -->
<!-- <?php
 $user_news_pop=DB::table('teams')->where('type','Popup')->first();
?>
@if(DB::table('teams')->where('type','Popup')->count()>0)
<script type="text/javascript">
  $(document).ready(function() {      
    setTimeout(function(){ $('#user_news_pop').modal('show'); }, 500);  
  });
</script> -->
<!-- <div id="user_news_pop" class="modal fade design" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-content" style="background:rgb(242, 242, 242);">
        <div class="modal-header">
            <h4 class="modal-title" style="text-align: center; color: white;"><strong>{{ $user_news_pop->name }}</strong></h4>
        </div>            
            <div class="modal-body">                
                <br>
                <br>
                <div class="row">
                    <img src="{{asset('assets/images/team/'.$user_news_pop->image)}}" style="width: 100%; padding: 10px;">
                 </div>
                </div>
                <p style="color: white; text-align: center;">
                  {{ $user_news_pop->designation }}   
                </p>
                <div class="row">
                 <div class="col-sm-12">
                     <button type="button" style="margin-top: 40px; width:100%;" class="btn btn-default" data-dismiss="modal">Ok</button>
                 </div>
                </div>
               
                <br>
                <br>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Close</button>
        </div>
    </div>
</div>
@endif -->

<div id="google_auth" class="modal fade design" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-content" style="background:rgb(242, 242, 242);">
        <div class="modal-header">
            <h4 class="modal-title" style="text-align: center; color: black;"><strong>Secure Your Account</strong></h4>  
        </div>          
            <div class="modal-body">
                <br>
                <br>
                <div class="row">
                 <div class="col-sm-4"></div>
                 <div class="col-sm-4"><i class="fa fa-lock" style="font-size: 100px; color: black;"></i></div>
                 <div class="col-sm-4"></div>
                </div>

                <div class="row">
                 <div class="col-sm-6">
                     <a href="{{ url('security/two/step') }}">
                     <button type="submit" style="margin-top: 40px;" class="btn-success btn btn-sm btn-block">Secure Account</button>
                    </a>
                 </div>
                 <div class="col-sm-6">
                     <button type="button" style="margin-top: 40px; width:100%;" class="btn btn-default" data-dismiss="modal">Not Now</button>
                 </div>
                </div>
               
                <br>
                <br>
            </div>
        <div class="modal-footer">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Close</button>
        </div>
    </div>
</div>


<div id="basic" class="modal fade basic123" tabindex="-1" data-backdrop="static" data-keyboard="false">
   <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title" style="text-align: center; color: white;"><strong>Please Update Your Profile</strong></h4>
      </div>
      <div class="modal-body" >
           <form class="form-horizontal" method="post" action="{{ route('update.profile') }}" enctype="multipart/form-data">
               {{ csrf_field() }}
               {{ method_field('put') }}
                 <strong class="col-md-12">Complete Name</strong>
                 <input value="{{ Auth::user()->first_name }}" type="text"  class="form-control" name="first_name" placeholder="Complete Name">
                 @if ($errors->has('first_name'))
                 <span class="help-block">
                 <strong>{{ $errors->first('first_name') }}</strong>
                 </span>
                 @endif
                 <div class="row">
                    <div class="col-md-4{{ $errors->has('month') ? ' has-error' : '' }}">
                     <strong class="col-md-12">Birth Month</strong>
                     <select class="form-control" name="month">
                        <option disabled>--Select Month--</option>
                        <option value='1'>January</option>
                        <option value='2'>February</option>
                        <option value='3'>March</option>
                        <option value='4'>April</option>
                        <option value='5'>May</option>
                        <option value='6'>June</option>
                        <option value='7'>July</option>
                        <option value='8'>August</option>
                        <option value='9'>September</option>
                        <option value='10'>October</option>
                        <option value='11'>November</option>
                        <option value='12'>December</option>
                     </select>
                     @if ($errors->has('month'))
                     <span class="help-block">
                     <strong>{{ $errors->first('month') }}</strong>
                     </span>
                     @endif
                  </div>
                  <div class="col-md-4{{ $errors->has('day') ? ' has-error' : '' }}">
                     <strong class="col-md-12">Select Birth Day</strong>
                     <select class="form-control" name="day">
                        <option value="{{ substr(Auth::user()->birth_day,8) }}">{{ substr(Auth::user()->birth_day,8) }}</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                        <option value='6'>6</option>
                        <option value='7'>7</option>
                        <option value='8'>8</option>
                        <option value='9'>9</option>
                        <option value='10'>10</option>
                        <option value='11'>11</option>
                        <option value='12'>12</option>
                        <option value='13'>13</option>
                        <option value='14'>14</option>
                        <option value='15'>15</option>
                        <option value='16'>16</option>
                        <option value='17'>17</option>
                        <option value='18'>18</option>
                        <option value='19'>19</option>
                        <option value='20'>20</option>
                        <option value='21'>21</option>
                        <option value='22'>22</option>
                        <option value='23'>23</option>
                        <option value='24'>24</option>
                        <option value='25'>25</option>
                        <option value='26'>26</option>
                        <option value='27'>27</option>
                        <option value='28'>28</option>
                        <option value='29'>29</option>
                        <option value='30'>30</option>
                        <option value='31'>31</option>
                     </select>
                     @if ($errors->has('day'))
                     <span class="help-block">
                     <strong>{{ $errors->first('day') }}</strong>
                     </span>
                     @endif
                  </div>
                  <div class="col-md-4{{ $errors->has('year') ? ' has-error' : '' }}">
                     <strong class="col-md-12">Select Birth Year</strong>
                     <select name="year" class="form-control" required>
                        <option value="{{ Auth::user()->birth_day}}" >{{ Auth::user()->birth_day }}</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                        <option value="1979">1979</option>
                        <option value="1978">1978</option>
                        <option value="1977">1977</option>
                        <option value="1976">1976</option>
                        <option value="1975">1975</option>
                        <option value="1974">1974</option>
                        <option value="1973">1973</option>
                        <option value="1972">1972</option>
                        <option value="1971">1971</option>
                        <option value="1970">1970</option>
                        <option value="1969">1969</option>
                        <option value="1968">1968</option>
                        <option value="1967">1967</option>
                        <option value="1966">1966</option>
                        <option value="1965">1965</option>
                        <option value="1964">1964</option>
                        <option value="1963">1963</option>
                        <option value="1962">1962</option>
                        <option value="1961">1961</option>
                        <option value="1960">1960</option>
                        <option value="1959">1959</option>
                        <option value="1958">1958</option>
                        <option value="1957">1957</option>
                        <option value="1956">1956</option>
                        <option value="1955">1955</option>
                        <option value="1954">1954</option>
                        <option value="1953">1953</option>
                        <option value="1952">1952</option>
                        <option value="1951">1951</option>
                        <option value="1950">1950</option>
                     </select>
                     @if ($errors->has('year'))
                     <span class="help-block">
                     <strong>{{ $errors->first('year') }}</strong>
                     </span>
                     @endif
                  </div>
                 </div>
                 <div class="row">
                  <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                     <strong class="col-md-12">Email</strong>
                     <input value="{{ Auth::user()->email }}" type="email"  class="form-control" name="email" placeholder="Your Email">
                     @if ($errors->has('email'))
                     <span class="help-block">
                     <strong>{{ $errors->first('email') }}</strong>
                     </span>
                     @endif
                  </div>
                  <div class="col-md-6 {{ $errors->has('mobile') ? ' has-error' : '' }}">
                     <strong class="col-md-12">Mobile Number</strong>
                     <input value="{{ Auth::user()->mobile }}" type="text"  class="form-control" name="mobile" placeholder="With Country Code">
                     @if ($errors->has('mobile'))
                     <span class="help-block">
                     <strong>{{ $errors->first('mobile') }}</strong>
                     </span>
                     @endif
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-3{{ $errors->has('street_address') ? ' has-error' : '' }}">
                     <strong class="col-md-12">Street </strong>
                     <input value="{{ Auth::user()->street_address }}" type="text"  class="form-control" name="street_address" placeholder="Street Address">
                     @if ($errors->has('street_address'))
                     <span class="help-block">
                     <strong>{{ $errors->first('street_address') }}</strong>
                     </span>
                     @endif
                  </div>
                  <div class="col-md-3{{ $errors->has('city') ? ' has-error' : '' }}">
                     <strong class="col-md-12">City</strong>
                     <input value="{{ Auth::user()->city }}" type="text"  class="form-control" name="city" placeholder="City/State">
                     @if ($errors->has('city'))
                     <span class="help-block">
                     <strong>{{ $errors->first('city') }}</strong>
                     </span>
                     @endif
                  </div>
                  <div class="col-md-3{{ $errors->has('post_code') ? ' has-error' : '' }}">
                     <strong class="col-md-12">Postal Code</strong>
                     <input  value="{{ Auth::user()->post_code }}" type="text"  class="form-control" name="post_code" placeholder="Postal Code">
                     @if ($errors->has('post_code'))
                     <span class="help-block">
                     <strong>{{ $errors->first('post_code') }}</strong>
                     </span>
                     @endif
                  </div>
                  <div class="col-md-3{{ $errors->has('country') ? ' has-error' : '' }}">
                     <strong class="col-md-12">Country</strong>
                     <select class="form-control" data-live-search="true" name="country">
                        <option selected value="{{ Auth::user()->country }}">{{ Auth::user()->country }}</option>
                        <?php
                           $countrys=DB::table('country')->get();
                           foreach($countrys as $countr){
                           ?>
                        <option value="{{ $countr->nicename }}">{{ $countr->nicename }}</option>
                        <?php } ?>
                     </select>
                     @if ($errors->has('country'))
                     <span class="help-block">
                     <strong>{{ $errors->first('country') }}</strong>
                     </span>
                     @endif
                  </div>
                  <br><br>
                  <div class="row">
                     <div class="col-md-12" style="margin-left:20px;">
                        <div class="form-group">
                           <label>Upload Image</label>               
                           <div class="input-group">
                              <span class="input-group-btn">
                              <span class="btn btn-default btn-file  responsive-file-upload">
                              <input type="file" name="image" id="imgInp">
                              </span>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="col-md-12">
                        <button type="submit" style="margin-top: 10px;" class="btn-primary btn btn-lg btn-block">Update</button>
                     </div>
                  </div>
                </form>
               </div>
      </div>
   </div>
</div>

    @php
        $main_chart_data = "[";


        $trans = \App\Transaction::where('user_id',Auth::user()->id)
        ->orderBy('id', 'desc')->take(8)->get();

            foreach ($trans as $data){
             $main_chart_data .= "{ year: '".date('Y-m-d', strtotime($data->time))."' , value:  ".abs($data->amount)."  }".",";
            }

        $main_chart_data .= "]";

    @endphp
@endsection
@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        $(document).ready(function () {
            new Morris.Bar({
                element: 'myfirstchart',
                data: @php echo $main_chart_data  @endphp,
                xkey: 'year',
                ykeys: ['value'],
                // chart.
                labels: ['Value']
            });
        });
    </script>
@endsection
<style>
    #sponsorLinkModal {
    border-radius: 0px !important;
}
.sub-menu>.nav-item >.nav-link>.title{
    color:black!important;
}
</style>
