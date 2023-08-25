@extends ('fonts.layouts.master')
@section('site')
    | Dashboard
@endsection
@section('style')
    <style>
        input[type=text], .form-element input[type=email], input[type=email], input[type=tel], input[type=url], input[type=password], input[type=number], textarea {
            padding: 10px 20px;
            margin-bottom: 20px;
            border: 1px solid cornflowerblue;
            width: 100%;
            border-radius: 5px;
        }
        .blog-single-page .content{
            border: 1px solid green;
            padding: 50px; 
        }

        @media only screen and (max-width : 320px) {
            .blog-single-page .content{
                border: none;
                padding: 0px;
            }
        }
    </style>
@endsection
@section('content')
<br>
<br>
<br>
<br>
    <!--blog page start-->
    <section class="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            @if (Session::has('alert'))
                                <div class="alert alert-danger">{{ Session::get('alert') }}</div>
                            @endif
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif

                            <div class="blog-single-page">
                                @if (Auth::user()->status != '1')
                                    <h3 style="color: #cc0000; text-align: center;" >Your account is Deactivated</h3>

                                @elseif(Auth::user()->emailv != '1')
                                
                                    <div class="row">
                                        <!--  <div class="col-lg-6">-->
                                        <!--    <div class="content">                           -->
                                        <!--        <div class="card-body text-center">-->
                                        <!--            <p>Your Email address:</p>-->
                                        <!--            <h3>{{Auth::user()->email}}</h3>-->
                                        <!--            <form action="{{route('sendemailver')}}" method="POST">-->
                                        <!--                {{csrf_field()}}-->
                                        <!--                <button type="submit" class="btn btn-lg btn-block btn-primary">Resend Verification Code</button>-->
                                        <!--            </form>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">
                                           <fieldset>
                                             <legend>Please verify your Email:</legend>
                                             <p>Verification Code Send This Email : {{Auth::user()->email}}</p>
                                            <div class="content">
                                                <form action="{{route('emailverify') }}" method="POST">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"  name="code" placeholder="Enter Verification Code" value="{{ Auth::user()->vercode }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-lg btn-block btn-success" style="background-color: #fee600;">Verify</button>
                                                    </div>
                                                </form>
                                                    <div class="form-group">
                                                       <form action="{{route('sendemailver')}}" method="POST">
                                                         {{csrf_field()}}
                                                         <button type="submit" class="btn btn-lg btn-block btn-primary">Resend Verification Code ?</button>
                                                       </form>
                                                    </div>
                                                
                                            </div>
                                          </fieldset>
                                        </div>
                                        <div class="col-lg-4"></div>            
                                    </div>
                                @elseif(Auth::user()->smsv != '1')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-title text-center">Please verify your Mobile</div>
                                                <div class="card-body">
                                                    <p>Your Mobile no:</p>
                                                    <h3>{{Auth::user()->mobile}}</h3>
                                                    <form action="{{route('sendsmsver')}}" method="POST">
                                                        {{csrf_field()}}
                                                        <button type="submit" class="btn btn-lg btn-block btn-primary">Send Verification Code</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-title text-center">Verify Code</div>

                                                <form action="{{route('smsverify') }}" method="POST">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" required name="code" placeholder="Enter Verification Code">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-block btn-lg btn-success">Verify</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                @elseif(Auth::user()->tfver != '1')
                                    <div class="col-md-12">

                                        <h2 class="text-center">Verify Google Authenticator Code</h2>
                                        <div class="form-body">
                                            <form action="{{route('go2fa.verify') }}" method="POST">
                                                {{csrf_field()}}
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="code" required placeholder="Enter Google Authenticator Code">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-success btn-block">Verify</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--blog page end-->

<br>
<br>
<br>
<br>
<br>

@endsection
