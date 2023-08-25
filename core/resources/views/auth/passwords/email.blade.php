
@extends ('fonts.layouts.blog_master')
@section('style')
    <link href="{{url('/')}}/assets/front_assets/2nd_register.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <link rel="stylesheet" href="{{url('/')}}/assets/build/css/intlTelInput.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/build/css/demo.css">
    
      
    
    <style>
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
    }
    body{
      background:#0e265d;
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
        height: 350px;
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
            height: 350px !important;
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

    </style>

    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
@endsection
@section('content')
    <div class="pranto">
        <div class="frame">
            <div class="nav">
                <h3 style="color: #fee600; text-align: center; width: 100%; font-size: 25px;">Forgot Password </h3>
            </div>
            <div>
                 <div ng-app ng-init="checked = false">
                @if (Session::has('alert'))
                    <div class="alert alert-danger">{{ Session::get('alert') }}</div>
                @endif
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <form class="form-signin"  action="{{ route('forget.password.user') }}" method="post" name="form">
                    {{csrf_field()}}
                    <label for="email">Your Email Address</label>
                    <input type="email" class="form-styling" name="email" id="email" placeholder="Your Email Address"/>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                        <button type="submit" class="btn" style="width: 100%; background: #0e265d; color: #fee600;">Reset Now</button>
                </form>
            </div>

            </div>
            <div class="forgot">

            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
