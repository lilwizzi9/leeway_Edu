<!DOCTYPE html>

<html>

<head>

    <title></title>



    <link href="{{url('/')}}/assets/admin_assets/css/layout.min.css" rel="stylesheet">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>



<body class="noweb3">



    <div class="layout">



        <div class="auth">



            <div class="auth__wrap">



                <div class="auth__left">



                    <br>



                    <div class="auth__title">Login</div>



                    <br>



                    <form class="form-signin"  action="{{ route('login') }}" method="post" name="form">



                        {{csrf_field()}}        



                        <h3 class="mr-auto">Verify your Login details.</h3>



                        <p class="mb-5 mr-auto">For security reason, please verify your details below.</p>



                        @if (Session::has('success'))



                        <div class="alert alert-success">{{ Session::get('success') }}</div>



                        @endif



                        @if ($errors->has('username'))



                        <br>



                        <span class="help-block">



                            <div class="alert alert-danger" style="color: red;">{{ $errors->first('username') }}</div>



                        </span>



                        @endif



                        @if ($errors->has('password'))



                        <br>



                        zcfdsgvhf



                        <span class="help-block">



                            <div class="alert alert-danger" style="color: red;">{{ $errors->first('password') }}</div>



                        </span>



                        @endif



                        <div class="form-group">



                            <div class="input-group">               



                                <input type="hidden" name="username" id="username" class="form-control inp auth__inp" placeholder="User ID" value="">      



                                <input type="hidden" id="ethAccountID" value="">          



                            </div>



                        </div>



                        <div class="form-group">



                            <div class="input-group">                



                                <input type="hidden" name="password" placeholder="Password" id="password" class="form-control inp auth__inp" >



                            </div>



                        </div>



                        <div class="form-group">



                            <button class="btn btn-danger submit-btn auth__btn" id="LoginSubmit">LOGIN</button> <span style="float:right">



                                <br>



                                <a style="color:#888" href="{{url('register')}}">Sign Up?</a></span>



                            </div>



                        </form>



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



        <!----><script>



            var config = {



                lang: {



                    authModeAuto: 'NOTE: never share your private key (12 words) from your wallet!',



                    authModeView: 'NOTE: never share your private key (12 words) from your wallet!',



                }







            };



        </script><script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script><script src="/modules/site/layout/assets/common.js?1587058987"></script><script src="/modules/site/layout/assets/notice.js?1587058987"></script><script src="https://million.money/assets/js/toast.js"></script><script src="/modules/site/auth/assets/common.js?1612999618"></script><script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css" />



        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>





        <script>



            async function getAccount() {



                const accounts = await ethereum.request({ method: 'eth_requestAccounts' });

                const account = accounts[0];

                $('#ethAccountID').val(account);

                $('#username').val(account);

                $('#password').val(account);



            }



            $(document).ready(function(){
                getAccount();
                $(document).on("click","#LoginSubmit",function(event){
                    event.preventDefault();
                    var token = "{{csrf_token()}}";
                    if (typeof window.ethereum == 'undefined')
                    {
                     toastr.error("Please Login Metamask / Install Metamask");
                        return;
                    }
                    $.ajax({
                        url: "/register/login_operation",
                        cache: false,
                        type:"POST",
                        aysnc:false,
                        data:{
                            'username': $('#ethAccountID').val() ,
                            '_token' : token
                        },
                        success: function(res){
                           var jsonRes = JSON.parse(res);
                           if(jsonRes.success == 'redirect_home')
                           {
                             $('.form-signin').submit();
                           }else{
                             toastr.error('Please register first.');
                             return;
                         }
                     }
                 });
                });
            });
            window.onload = function() {
                let lang = $('html').attr('lang');
                if (lang == 'ru') {
                    $('<script/>', {
                        'src': '//code.jivosite.com/widget/5wNWSPqtX8',
                        'async': true
                    }).appendTo('body');
                }
            };
        </script>
        <script type="text/javascript">(function(){window['__CF$cv$params']={r:'67a5a562acfa0897',m:'491f67850b85870d4bfdee80c4a723b3b618c660-1628225444-1800-ARWcxnjULrPbrGx2YlaHMVPgTCo6Agh6UV1jPRbdt6ZYYbmLtE+gDoHKuVzT9sPWanwFx3OBsL8+3TTYkEnyFr0ygJmc4sKXryZozSY+qsP30Bi/Girl+cA8zJz2ADxITA==',s:[0xd299730a44,0x8b1fa1e639],u:'/cdn-cgi/challenge-platform/h/g'}})();</script><script defer="" src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon="{&quot;rayId&quot;:&quot;67a5a562acfa0897&quot;,&quot;version&quot;:&quot;2021.7.0&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;2187677634ed42a0b8ea828c0aa4803d&quot;,&quot;si&quot;:10}">
        </script>

    </body>



    </html>