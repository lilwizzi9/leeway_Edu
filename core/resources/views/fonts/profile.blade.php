@extends('fonts.layouts.user')
@section('site')
    | Profile
@endsection

@section('style')
   <style>
       /*img#img-upload {*/
           /*height: 165px!important;*/
           /*!* margin-top: -145px; *!*/
       /*}*/
       .image-funs label {
            display:  block;
            padding-bottom: 20px;
        }

        .image-funs img {
            margin-bottom: 20px;
        }

        .image-funs .responsive-file-upload {
            border: none;
            display:block;
            font-size:14px;
        }
        .modal {
    left: 50%;
    bottom: auto;
    right: auto;
    padding: 0;
    width: 700px;
    margin-left: -250px;
    background-color: #ffffff;
    border: 1px solid #999999;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    background-clip: padding-box;
}

strong , label{
    color:white;
}
   </style>
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-010">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h12><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</h12>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-th"></i> My Profile Update
                            </div>
                        </div>
                        <div class="portlet-body">

                            <div class="row">
                                <form class="form-horizontal" method="post" action="{{ route('update.profile') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{method_field('put')}}

                                    <div class="col-md-4 image-funs pranto">
                                        <div class="form-group" style=" 
                                       padding: 40px !important;
                                       margin-bottom: 8px !important;
                                       padding-bottom: 5px !important;">
                                            <label>Upload Image</label>
                                            <img id='img-upload' style="height: 100px !important;"/>
                                            @if(Auth::user()->image == '')
                                                <img id="default" src="{{asset('assets/images/user_profile_pic/default.jpg')}}">
                                            @else
                                                <img style="width:150px;" src="{{asset('assets/images/user_profile_pic/'. Auth::user()->image)}}">
                                            @endif
                                            <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file  responsive-file-upload">
                                             <input type="file" name="image" id="imgInp">
                                        </span>
                                    </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group col-md-12">
                                            <div class="col-md-12 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <strong class="col-md-12">Full Name</strong>
                                                <input value="{{ Auth::user()->first_name }}" type="text"  class="form-control" name="first_name" placeholder="Full Name">
                                                @if ($errors->has('first_name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                                @endif
                                            </div>                                           
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="col-md-4{{ $errors->has('month') ? ' has-error' : '' }}">
                                                <strong class="col-md-12">Bith Month</strong>
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
                                                <select name="year" class="form-control">
                                                    <option value="{{ round(Auth::user()->birth_day,4) }}" >{{ round(Auth::user()->birth_day,4) }}</option>
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

                                        <div class="form-group col-md-12">
                                            <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <strong class="col-md-12">Email</strong>
                                                <input value="{{ Auth::user()->email }}" type="email"  class="form-control" name="email" placeholder="Your Email" readonly="">
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


                                        <div class="form-group col-md-12">
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
                                        
                                        <br><br><br>
                                       
                                        
                                         <div class="form-group ">
                                        <div class="col-md-12">
                                        
                                            <button type="submit" style="margin-top: 40px;" class="btn-primary btn btn-lg btn-block">Update</button>
                                        </div>
                                    </div>
                                        </div>

                                    </div>

                                   
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>

            </div>
        </div>
    </div>
     <script>
         function kyc1_typesc(id){
          if(id==2){
           $(".passport").css("display","none");
           $(".cnic").css("display","block");
          }
          else{
             $(".cnic").css("display","none");
             $(".passport").css("display","block");  
          }
         }
            
     </script>
    




<div id="redeem_coin" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style=" left: 45% !important; width: 50% !important;">
    <div class="modal-content" style="background:#f3b033;">
        <div class="modal-header">
            <h4 class="modal-title" style="text-align: center; color: white;"><strong>Free Coins</strong></h4>            
            <div class="col-md-12">
                <br>
                <br>
                <h4>Click this button you earn 1000 coins</h4>
                <a href="{{ route('redeem_coin') }}">
                <button type="submit" style="margin-top: 40px;" class="btn-success btn btn-sm btn-block">Get free Coin</button>
                </a>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        $(document).ready( function() {

            $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) $('#default').hide();
                }

            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function(){
                readURL(this);
            });
        });
    </script>
@endsection