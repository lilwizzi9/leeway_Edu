<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"> </div>
            </li>
            <li class="sidebar-search-wrapper">
            </li>

            <li class="nav-item start @php echo "active",(request()->path() != 'admin/home')?:"";@endphp">
                <a href="{{url('admin/home')}}" class="nav-link nav-toggle">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            @php
                $url = Find_fist_int(request()->path());
            @endphp

             <li class="heading">
                <h3 class="uppercase">Users Management</h3>
            </li>

            <li class="nav-item  @php echo "active",(request()->path() != 'admin/users')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/paid/user')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/deactive/user')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/free/user')?:"";@endphp">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-users"></i>
                    <span class="title">Users Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/users' ) active open @endif">
                        <a href="{{route('user.manage')}}" class="nav-link ">
                            <i class="far fa-user-circle"></i>
                            <span class="title">All Users</span>
                        </a>
                    </li>

                   <!--  <li class="nav-item  @if( request()->path() == 'admin/paid/user' ) active open @endif">
                        <a href="{{route('paid.user.index')}}" class="nav-link ">
                            <i class="far fa-user"></i>
                            <span class="title">Paid Users</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/free/user' ) active open @endif">
                        <a href="{{route('free.user.index')}}" class="nav-link ">
                            <i class="fas fa-user-times"></i>
                            <span class="title">Free Users</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/deactive/user' ) active open @endif">
                        <a href="{{route('index.deactive.user')}}" class="nav-link ">
                            <i class="fas fa-user"></i>
                            <span class="title">Pending KYC Users</span>
                        </a>
                    </li> -->


                </ul>
            </li>

            <!-- <li class="nav-item  @php echo "active",(request()->path() != 'admin/newsletter')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/subscriber')?:"";@endphp
            @php echo "active",(request()->path() != '')?:"";@endphp">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-newspaper"></i>
                    <span class="title">Newsletter</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/newsletter' ) active open @endif">
                        <a href="{{route('newletter.index')}}" class="nav-link ">
                            <i class="far fa-paper-plane"></i>
                            <span class="title">Send Mail</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/subscriber' ) active open @endif">
                        <a href="{{route('sunscriber.index')}}" class="nav-link ">
                            <i class="fas fa-bullhorn"></i>
                            <span class="title">Subscribers</span>
                        </a>
                    </li>

                </ul>
            </li> -->

           <!--  @php $check_count = \App\Ticket::where('status', 1)->get() @endphp
            <li class="nav-item @if( request()->path() == 'admin/supports' || request()->path() == 'admin/supports' ) active open @endif
            @if( request()->path() == '' || request()->path() == '' ) active open @endif">
                <a href="{{route('support.admin.index')}}" class="nav-link nav-toggle">
                    <i class="fas fa-ticket-alt"></i>
                    <span class="title">Support @if(count($check_count) == 0)  @else <span class="badge badge-danger"> {{count($check_count)}} @endif </span></span>
                    <span class="selected"></span>
                </a>
            </li> -->


            <li class="heading">
                <h3 class="uppercase">Levels Management</h3>
            </li>

            <li class="nav-item  @php echo "active",(request()->path() != 'admin/lending/packages')?:"";@endphp
            @php echo "active",(request()->path() != '')?:"";@endphp">
                <a href="{{route('package.index')}}" class="nav-link nav-toggle">
                    <i class="fas fa-chart-bar"></i>
                    <span class="title">Levels</span>
                    <span class="selected"></span>
                </a>
            </li>

            <!--<li class="nav-item  @php echo "active",(request()->path() != 'admin/lending/history')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/lending/complete')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/lending/referral/bonus')?:"";@endphp">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="far fa-list-alt"></i>
                    <span class="title">Invest History</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  @if( request()->path() == 'admin/lending/history' ) active open @endif">
                        <a href="{{route('lend.history.index')}}" class="nav-link ">
                            <i class="fas fa-history"></i>
                            <span class="title">All History</span>
                        </a>
                    </li>

                   


                </ul>
            </li>-->

            <li class="heading">
                <h3 class="uppercase">Others</h3>
            </li>

            <li class="nav-item  @php echo "active",(request()->path() != 'admin/general')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/terms')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/sms-api')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/template')?:"";@endphp">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-desktop"></i>
                    <span class="title">Website Settings</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/general' ) active open @endif">
                        <a href="{{route('general.index')}}" class="nav-link ">
                            <i class="fas fa-cog"></i>
                            <span class="title">General Settings</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/terms' ) active open @endif">
                        <a href="{{route('terms.polices')}}" class="nav-link ">
                            <i class="far fa-sticky-note"></i>
                            <span class="title">Policy And Terms</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/template' ) active open @endif">
                        <a href="{{route('email.index.admin')}}" class="nav-link ">
                            <i class="fas fa-envelope-open"></i>
                            <span class="title">Email Template</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/sms-api' ) active open @endif">
                        <a href="{{route('sms.index.admin')}}" class="nav-link ">
                            <i class="far fa-comments"></i>
                            <span class="title">SMS Api</span>
                        </a>
                    </li>

                </ul>
            </li>

            <!-- <li class="nav-item  @if( request()->path() == 'admin/direct_joining_comm/index' ) active open @endif">
                <a href="{{route('direct_joining_comm.index')}}" class="nav-link ">
                    <i class="fas fa-money-bill-alt"></i>
                    <span class="title">Direct Joining Commision</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item  @if( request()->path() == 'admin/direct_deposit_bonus/index' ) active open @endif">
                <a href="{{route('direct_deposit_bonus.index')}}" class="nav-link ">
                    <i class="fas fa-money-bill-alt"></i>
                    <span class="title">Direct Deposit Bonus</span>
                    <span class="selected"></span>
                </a>
            </li> -->
            
            <li class="nav-item  @if( request()->path() == 'admin/charge/commission' ) active open @endif">
                <a href="{{route('charge.commission')}}" class="nav-link ">
                    <i class="fas fa-money-bill-alt"></i>
                    <span class="title">Charge And Commision</span>
                    <span class="selected"></span>
                </a>
            </li>
            
            <li class="nav-item  @if( request()->path() == 'admin/team' ) active open @endif">
                <a href="{{route('team.index')}}" class="nav-link ">
                    <i class="fas fa-money-bill-alt"></i>
                    <span class="title">Users News</span>
                </a>
            </li>

            <li class="nav-item  @php echo "active",(request()->path() != 'admin/videos')?:"";@endphp
            @php echo "active",(request()->path() != '')?:"";@endphp">
                <a href="{{url('admin/videos')}}" class="nav-link nav-toggle">
                    <i class="fas fa-eye"></i>
                    <span class="title">Videos</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item  @php echo "active",(request()->path() != 'admin/results')?:"";@endphp
            @php echo "active",(request()->path() != '')?:"";@endphp">
                <a href="{{url('admin/results')}}" class="nav-link nav-toggle">
                    <i class="fas fa-eye"></i>
                    <span class="title">MCQ Results</span>
                    <span class="selected"></span>
                </a>
            </li>


            <!--<li class="nav-item   @if( request()->path() == 'admin/testimonial' || request()->path() == "admin/testimonial_edit/$url" ) active open @endif
            @php echo "active",(request()->path() != 'admin/menu')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/menu/create')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/logo/icon')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/service')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/about')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/social/index')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/contact')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/footer')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/testimonial'  )?:"";@endphp
            @php echo "active",(request()->path() != 'admin/footer'  )?:"";@endphp
            @php echo "active",(request()->path() != 'admin/background/images'  )?:"";@endphp
            @php echo "active",(request()->path() != 'admin/tree/image'  )?:"";@endphp
            @php echo "active",(request()->path() != 'admin/news/create/new'  )?:"";@endphp
            @php echo "active",(request()->path() != 'admin/news'  )?:"";@endphp
            @php echo "active",(request()->path() != 'admin/slider')?:"";@endphp">

                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fab fa-internet-explorer"></i>
                    <span class="title">Website Interface </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/news/create/new'  ) active open @endif
                    @if( request()->path() == 'admin/news' ) active open @endif
                    @if( request()->path() == '' ) active open @endif">
                        <a href="{{route('sub.blog.index')}}" class="nav-link ">
                            <i class="fas fa-rss-square"></i>
                            <span class="title">News</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/slider' ) active open @endif">
                        <a href="{{route('slide.settings')}}" class="nav-link ">
                            <i class="fas fa-images"></i>
                            <span class="title">Slider Image</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/logo/icon' ) active open @endif">
                        <a href="{{route('logo.icon')}}" class="nav-link ">
                            <i class="fas fa-file-image"></i>
                            <span class="title">Logo</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/service' ) active open @endif">
                        <a href="{{route('service.index')}}" class="nav-link ">
                            <i class="fab fa-servicestack"></i>
                            <span class="title">Service</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/contact' || request()->path() == "admin/contact" ) active open @endif">
                        <a href="{{route('contact.admin.index')}}" class="nav-link ">
                            <i class="fab fa-contao"></i>
                            <span class="title">Contact</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/about' || request()->path() == "admin/about" ) active open @endif">
                        <a href="{{route('about.admin.index')}}" class="nav-link ">
                            <i class="fab fa-buysellads"></i>
                            <span class="title">About</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/social/index' || request()->path() == "admin/social/index" ) active open @endif">
                        <a href="{{route('social.admin.index')}}" class="nav-link ">
                            <i class="fab fa-stripe-s"></i>
                            <span class="title">Social</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/footer' || request()->path() == "admin/footer" ) active open @endif">
                        <a href="{{route('footer.index.admin')}}" class="nav-link ">
                            <i class="fab fa-foursquare"></i>
                            <span class="title">Footer</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'admin/testimonial' || request()->path() == "admin/testimonial_edit/$url" ) active open @endif">
                        <a href="{{route('testimonial.index')}}" class="nav-link ">
                            <i class="fas fa-comment-alt"></i>
                            <span class="title">Testimonial</span>
                        </a>
                    </li>

                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/tree/image')?:"";@endphp">
                        <a href="{{route('user.tree.image')}}" class="nav-link nav-toggle">
                            <i class="fas fa-user-circle"></i>
                            <span class="title">Users Tree Image</span>
                        </a>
                    </li>
                </ul>
            </li>-->

            @php $req = \App\WithdrawTrasection::where('status', 0)->count() @endphp

            <li class="nav-item @php echo "active",(request()->path() != 'admin/withdraw/method')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/withdraw/requests')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/withdraw/log')?:"";@endphp">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="far fa-money-bill-alt"></i>
                    <span class="title">Withdraw System @if($req == 0)  @else<span class="badge badge-danger">{{$req}} @endif</span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/withdraw/method' ) active open @endif">
                        <a href="{{route('add.withdraw.method')}}" class="nav-link ">
                            <i class="fab fa-paypal"></i>
                            <span class="title">Withdraw Methods</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/withdraw/requests' ) active open @endif">
                        <a href="{{route('withdraw.request.index')}}" class="nav-link ">
                            <i class="fas fa-spinner"></i>
                            <span class="title">Withdraw Requests @if($req == 0)  @else<span class="badge badge-danger">{{$req}} @endif</span></span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/withdraw/log' ) active open @endif">
                        <a href="{{route('withdraw.viewlog.admin')}}" class="nav-link ">
                            <i class="fas fa-eye"></i>
                            <span class="title">View Log</span>
                        </a>
                    </li>
                </ul>
            </li>

           <!--  <li class="nav-item  @if( request()->path() == 'admin/gateway' ) active open @endif">
                <a href="{{route('gateway.index')}}" class="nav-link ">
                    <i class="far fa-credit-card"></i>
                    <span class="title">Payment Gateways</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item  @if( request()->path() == 'admin/add/fund/user' ) active open @endif">
                <a href="{{route('index.deposit.user')}}" class="nav-link ">
                    <i class="fab fa-cc-mastercard"></i>
                    <span class="title">Payment Log</span>
                    <span class="selected"></span>
                </a>
            </li> -->

<!-- 
            <li class="nav-item @php echo "active",(request()->path() != 'admin/admin/add/coins')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/admin/add/buying')?:"";@endphp
            @php echo "active",(request()->path() != 'admin/admin/add/sale')?:"";@endphp"">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="far fa-money-bill-alt"></i>
                    <span class="title">Coin Management</span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                   <li class="nav-item  @if( request()->path() == 'admin/admin/add/coins' ) active open @endif">
                    <a href="{{route('add.coins')}}" class="nav-link ">
                        <i class="fab fa-cc-mastercard"></i>
                        <span class="title">Coins</span>
                        <span class="selected"></span>
                    </a>
                   </li>
                   <li class="nav-item  @if( request()->path() == 'admin/admin/add/buying' ) active open @endif">
                    <a href="{{route('add.buying')}}" class="nav-link ">
                        <i class="fab fa-cc-mastercard"></i>
                        <span class="title">Buying</span>
                        <span class="selected"></span>
                    </a>
                   </li>   

                   <li class="nav-item  @if( request()->path() == 'admin/admin/add/sale' ) active open @endif">
                    <a href="{{route('add.sale')}}" class="nav-link ">
                        <i class="fab fa-cc-mastercard"></i>
                        <span class="title">Sale</span>
                        <span class="selected"></span>
                    </a>
                   </li>                    
                </ul>
            </li> -->
<!-- 
            <li class="nav-item @if( request()->path() == '' || request()->path() == '' ) active open @endif
            @if( request()->path() == '' || request()->path() == '' ) active open @endif">
                <a  data-toggle="modal" href="#basic" class="nav-link nav-toggle">
                    <i class="fas fa-sync-alt"></i>
                    <span class="title">GENERATE PAYOUT</span>
                    <span class="selected"></span> 
                </a>
            </li> -->

            <!-- <li class="nav-item  @php echo "active",(request()->path() != 'admin/match')?:"";@endphp">
                <a href="{{route('match.index')}}" class="nav-link nav-toggle">
                    <i class="far fa-clone"></i>
                    <span class="title">Salary Bonus</span>
                    <span class="selected"></span>
                </a>
            </li> -->

           

        </ul>
    </div>
</div>