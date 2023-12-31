@extends('fonts.layouts.user')
@section('site')
    | Change | Password
@endsection
@section('style')
    <style>
        /*responsive for user dashboard*/
        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .input-lg {
                width: 100%!important;
            }
        }
    </style>
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="bold" style="color: #0e265d;">{{ isset($new_pass)?'CHANGE PASSWORD VERIFY OTP':'CHANGE YOUR PASSWORD' }}</h3>
                        </div>
                        <div class="panel-body">

                            <div class="row">

                                    <form method="post" action="{{ isset($new_pass)? route('change.password.user.otp') : route('change.password.user') }}">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="id" value="{{Auth::user()->id}}">

                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('passwordold') ? ' has-error' : '' }}">
                                                <input class="form-control input-lg" placeholder="Current Password"  name="passwordold" type="{{ isset($old_pass)?'hidden':'password' }}" value="{{ isset($old_pass)?$old_pass:'' }}" required>
                                                @if ($errors->has('passwordold'))
                                                    <span class="help-block">
                                                       <strong>{{ $errors->first('passwordold') }}</strong>
                                                       </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <input class="form-control input-lg" placeholder="New Password"  name="password" type="{{ isset($new_pass)?'hidden':'password' }}" value="{{ isset($new_pass)?$new_pass:'' }}" required>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                       <strong>{{ $errors->first('password') }}</strong>
                                                       </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                <input class="form-control input-lg" placeholder="Confirm Password" name="password_confirmation" value="{{ isset($new_pass)?$new_pass:'' }}" type="{{ isset($old_pass)?'hidden':'password' }}" required>
                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                                       <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                       </span>
                                                @endif
                                            </div>
                                        </div>

                                        @if(isset($new_pass) || isset($old_pass))
                                         <div class="col-md-12">
                                           <div class="form-group{{ $errors->has('otp') ? ' has-error' : '' }}">
                                                <input class="form-control input-lg" placeholder="Enter OTP" name="otp"  type="text" required>
                                                @if ($errors->has('otp'))
                                                    <span class="help-block">
                                                       <strong>{{ $errors->first('otp') }}</strong>
                                                       </span>
                                                @endif
                                            </div> 
                                         </div> 
                                        @endif

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block">Update </button>
                                        </div>
                                    </form>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection