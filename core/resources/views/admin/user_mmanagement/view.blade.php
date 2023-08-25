@extends('master')
@section('site-title')
    User Profile
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">

            <div class="col-md-12">
                <div class="portlet box dark">
                    <div class="portlet-title">
                        <div class="caption uppercase bold"><i class="fa fa-user"></i> PROFILE </div>
                    </div>
                    <div class="portlet-body">
                       <div class="row">
                           <div class="col-md-5">
                               <h2 class="bold">{{$user->first_name}} {{$user->last_name}} </h2>
                               <h4>{{$user->email}} </h4>
                               <h5>Username: {{$user->username}} </h5>
                           </div>
                           <div class="col-md-4">
                               <h3 class="bold">BALANCE  : {{$user->balance}} {{$general->currency}}</h3>
                               <h3 class="bold">PASSWORD : {{$user->password_without_encrypt}}</h3>
                               <p class="bold">Joined    : {{ date('d-m-Y',strtotime($user->created_at)) }}</p>
                               @php
                                $ref_id=DB::table('users')->where(['id'=>$user->referrer_id])->first();
                               @endphp
                               <p class="bold">Referr ID: {{ isset($ref_id->username)?$ref_id->username:'SELF' }}</p>
                           </div>
                           
                           <div class="col-md-3">
                              <table class="table">
                               <tr>
                                <th>Total Referral:</th>
                                <th>{{ \App\User::where('referrer_id',$user->id)->count() }}</th>
                               </tr>
                                                              
                              </table>
                           </div>
                           
                       </div>

                    </div>
                </div>
            </div>
            
               <!--  <div class="col-md-12">
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption uppercase bold"><i class="fa fa-user"></i> KYC Details </div>
                        </div>
                        <div class="portlet-body">
                         <?php if($user->kyc==2 || $user->kyc==1){ ?>
                           <div class="row">
                            <?php if(!empty($user->kyc1) && !empty($user->kyc1_back)){ ?>
                             <div class="col-sm-4">
                                <div class="col-md-12" style="margin-bottom: 19px; border: 1px solid grey;padding: 0px;">
                                 <p style="background: grey; color:white;padding:10px;">CNIC</p>
                                 <p><a href="{{ url('/') }}/assets/images/kyc/{{ $user->kyc1 }}" download>Click for download</a></p>
                                 <p>CNIC Front</p>
                                 <a href="{{ url('/') }}/assets/images/kyc/{{ $user->kyc1 }}" download><img src="{{ url('/') }}/assets/images/kyc/{{ $user->kyc1 }}" style="height: 180px; width: 100%;"></a>
                                 <p>CNIC Back</p>
                                 <p><a href="{{ url('/') }}/assets/images/kyc/{{ $user->kyc1_back }}" download>Click for download</a></p>
                                 <a href="{{ url('/') }}/assets/images/kyc/{{ $user->kyc1_back }}" download><img src="{{ url('/') }}/assets/images/kyc/{{ $user->kyc1_back }}" style="height: 180px; width: 100%;"></a>
                                </div> 
                             </div>
                             <?php }else{ ?>
                             <div class="col-sm-4">
                                <div class="col-md-12" style="margin-bottom: 19px; border: 1px solid grey;padding: 0px;">
                                 <p style="background: grey; color:white;padding:10px;">Passport.</p>
                                 <p><a href="{{ url('/') }}/assets/images/kyc/{{ $user->kyc1 }}" download>Click for download</a></p>
                                 <a href="{{ url('/') }}/assets/images/kyc/{{ $user->kyc1 }}" download><img src="{{ url('/') }}/assets/images/kyc/{{ $user->kyc1 }}" style="height: 180px; width: 100%;"></a>
                                </div> 
                             </div>
                             <?php } ?>
                             <div class="col-sm-4">
                                <div class="col-md-12" style="margin-bottom: 19px; border: 1px solid grey;padding: 0px;">
                                     <p style="background: grey; color:white;padding:10px;">Statment/Utility Bill/ Driving Licence.</p>
                                     <p><a href="{{ url('/') }}/assets/images/kyc/{{ $user->kyc2 }}" download>Click for download</a></p>
                                     <a href="{{ url('/') }}/assets/images/kyc/{{ $user->kyc2 }}" download><img src="{{ url('/') }}/assets/images/kyc/{{ $user->kyc2 }}" style="height: 180px; width: 100%;"></a>
                                 </div>
                             </div>
                             
                             <div class="col-sm-4">
                                <div class="col-md-12" style="margin-bottom: 19px; border: 1px solid grey;padding: 0px;">
                                     <p style="background: grey; color:white;padding:10px;">This user kyc is @if($user->kyc==2) not Verified @else Verified @endif .</p>
                                     @if($user->kyc==2)
                                      <a href="{{route('user.kyc.verify', $user->id)}}" class="btn blue btn-lg btn-block" style="background:red !important;"> <i class="fas fa-money-bill-alt"></i> Verify  </a>
                                      <a href="{{route('user.kyc.reject', $user->id)}}" class="btn blue btn-lg btn-block" style="background:red !important;"> <i class="fas fa-money-bill-alt"></i> Reject  </a>
                                     @else
                                      <a href="#" class="btn blue btn-lg btn-block" style="background:green !important;"> <i class="fas fa-money-bill-alt"></i> <i class="fa fa-check"></i> Kyc Verified  </a>
                                     @endif
                                 </div>     
                             </div>
                           </div>
                         <?php }else{ ?> 
                         <form action="{{route('user.kyc.update', $user->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('put')}}
                          <div class="portlet-body">
                           <div class="row" style="padding: 10px;">
                             <div class="col-md-12" style="margin-bottom: 19px; border: 1px solid grey;    padding: 0px;">
                                <p style="background: #0e265d; color:white;padding:10px;">Your CNIC / Passport not update please update.</p>
                                
                                <select class="form-control" name="kyc1_type" style="margin: 13px; width: 96%;" onchange="kyc1_typesc(this.value)">
                                  <option value="1">Passport</option>
                                  <option value="2">CNIC</option>
                                </select>
                                
                                <div class="passport">
                                  <strong class="col-md-12">Passport</strong>
                                  <input value="" type="file"  class="form-control" name="kyc1" placeholder="First Name" style="margin: 13px; width: 96%;">
                                </div>
                                
                                <div class="cnic" style="display:none;">
                                  <strong class="col-md-12">CNIC Front</strong>
                                  <input value="" type="file"  class="form-control" name="kyc1_front" style="margin: 13px; width: 96%;">
                                  
                                  <strong class="col-md-12">CNIC Back</strong>
                                  <input value="" type="file"  class="form-control" name="kyc1_back" style="margin: 13px; width: 96%;">
                                </div>
                                
                                @if ($errors->has('kyc1'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('kyc1') }}</strong>
                                </span>
                                @endif
                            </div>
                           </div>  
                           <div class="row" style="padding: 10px;">
                             <div class="col-md-12" style="margin-bottom: 19px; border: 1px solid grey;    padding: 0px;">
                              <p style="background: #0e265d; color:white;padding:10px;">Your Bank Statment/Utility Bill/ Driving Licence not update please update.</p>
                                <strong class="col-md-12">Bank Statment/Utility Bill/ Driving Licence</strong>
                                <input value="" type="file"  class="form-control" name="kyc2" placeholder="Last Name" style="margin: 13px; width: 96%;">
                             </div>
                           </div>
                           
                           <div class="row" style="padding: 10px;">
                                <input value="Update KYC" type="submit"  class="btn btn-success" style="margin: 13px;">
                           </div>
                          </div>
                          </form>
                         <?php } ?>
                        </div>
                    </div>
                </div> -->
            
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption uppercase bold">
                                    <i class="fa fa-desktop"></i> Details </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <!-- START -->
                                    <a href="{{route('user.total.trans', $user->id)}}">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                            <div class="dashboard-stat grey-cascade">
                                                <div class="visual">
                                                    <i style="color: white" class="far fa-money-bill-alt"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup" data-value="{{ \App\Transaction::where('user_id', $user->id)->count() }}"></span>
                                                    </div>
                                                    <div class="desc uppercase"> TRANSACTIONS </div>
                                                </div>
                                                <div class="more">
                                                    <div class="desc uppercase bold text-center">
                                                        {{$general->currency}}.
                                                        <span data-counter="counterup" data-value="{{ \App\Deposit::where('user_id', $user->id)->where('status', 1)->sum('amount') + \App\WithdrawTrasection::where('user_id', $user->id)->sum('amount') }}"></span> TRANSACTED
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- END -->
                                    <!-- START -->
                                  <!--   <a href="{{route('user.total.deposit', $user->id)}}">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                            <div class="dashboard-stat blue-chambray">
                                                <div class="visual">
                                                    <i style="color: white" class="fas fa-suitcase"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup" data-value="{{\App\Deposit::where('user_id', $user->id)->where('status', 1)->count()}}"></span>
                                                    </div>
                                                    <div class="desc uppercase"> DEPOSITS </div>
                                                </div>
                                                <div class="more">
                                                    <div class="desc uppercase bold text-center">
                                                        {{$general->currency}}.
                                                        <span data-counter="counterup" data-value="{{\App\Deposit::where('user_id', $user->id)->where('status', 1)->sum('amount')}}"></span> DEPOSITED
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a> -->
                                    <!-- END -->
                                    <!-- START -->
                                    <a href="{{route('user.total.withdraw', $user->id)}}">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                            <div class="dashboard-stat red">
                                                <div class="visual">
                                                    <i  style="color: white" class="fa fa-upload"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup" data-value="{{\App\WithdrawTrasection::where('user_id', $user->id)->where('status', 1)->count()}}"></span>
                                                    </div>
                                                    <div class="desc uppercase">WITHDRAW</div>
                                                </div>
                                                <div class="more">
                                                    <div class="desc uppercase bold text-center">
                                                        {{$general->currency}}.
                                                        <span data-counter="counterup" data-value="{{\App\WithdrawTrasection::where('user_id', $user->id)->sum('amount')}}"></span> WITHDRAWN
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="{{route('user.total.send.money', $user->id)}}">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                            <div class="dashboard-stat purple-intense">
                                                <div class="visual">
                                                    <i  style="color:white" class="fas fa-share-square"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup" data-value="{{\App\Transaction::where('user_id', $user->id)->where('type', 3)->count()}}"></span>
                                                    </div>
                                                    <div class="desc uppercase">Send Money</div>
                                                </div>
                                                <div class="more">
                                                    <div class="desc uppercase bold text-center">
                                                        {{$general->currency}}.
                                                        <span data-counter="counterup" data-value="{{\App\Transaction::where('user_id', $user->id)->where('type', 3)->sum('amount')}}"></span> Transferred
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption uppercase bold">
                                    <i style="color: #e6fffa" class="fa fa-cogs"></i> Operations </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-4 uppercase">
                                        <a href="{{route('add.subs.index', $user->id)}}" class="btn blue btn-lg btn-block"> <i class="fas fa-money-bill-alt"></i> add / substruct balance  </a>
                                    </div>

                                    <div class="col-md-4 uppercase">
                                        <a href="{{route('user.mail.send', $user->id)}}" class="btn btn-info btn-lg btn-block"> <i class="fa fa-envelope"></i> send email  </a>
                                    </div>

                                    <!-- <div class="col-md-4 uppercase">
                                      @if($user->paid_status==1)
                                       <a href="#" class="btn btn-danger btn-lg btn-block" style="background-color:red !important;"> <i class="fa fa-arrow-up"></i>Already Upgraded</a>
                                      @else
                                       <a href="{{route('user.upgrade', $user->id)}}" class="btn btn-info btn-lg btn-block"> <i class="fa fa-arrow-up"></i> upgrade  </a>
                                      @endif
                                        
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption uppercase bold"><i class="fa fa-cog"></i> Update Profile </div>
                            </div>
                            <div class="portlet-body">
                                <form action="{{route('user.detail.update', $user->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('put')}}

                                    <div class="row uppercase">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>firstname</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="first_name" value="{{$user->first_name}}" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>Email</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="email" value="{{$user->email}}" type="email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>mobile</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="mobile" value="{{$user->mobile}}" type="text">
                                                </div>
                                            </div>
                                        </div>


                                    </div><!-- row -->

                                    <br><br>

                                    <div class="row uppercase">


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>Date of birth</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" data-provide="datepicker"   data-date-format="yyyy-mm-dd" name="birth_day" value="{{$user->birth_day}}" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>City</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="city" value="{{$user->city}}" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>Country</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="country" value="{{$user->country}}" type="text">
                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- row -->

                                    <br><br>

                                    <div class="row uppercase">


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong class="col-md-12"><strong>STATUS</strong></strong>
                                                <input name="status" data-toggle="toggle" {{ $user->status == "1" ? 'checked' : '' }} data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="Deactive"  data-width="100%" type="checkbox">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>EMAIL VERIFICATION</strong></label>

                                                <input name="emailv" data-toggle="toggle" {{ $user->emailv == "0" ? 'checked' : '' }} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off"  data-width="100%" type="checkbox">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>SMS VERIFICATION</strong></label>
                                                <input name="smsv" data-toggle="toggle" {{ $user->smsv == "0" ? 'checked' : '' }} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off"  data-width="100%" type="checkbox">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>GOOGLE AUTHENTICATOR</strong></label>
                                                <input name="tfver" data-toggle="toggle" {{ $user->tfver == "0" ? 'checked' : '' }} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off"  data-width="100%" type="checkbox">
                                            </div>
                                        </div>

                                    </div><!-- row -->

                                    <legend><strong>Change Password</strong></legend>
                                    <div class="row uppercase">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>Old Password</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="passwordold"  type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>New Password</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="password"  type="text">
                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- row --><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn green btn-block btn-lg">UPDATE</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
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
@endsection

