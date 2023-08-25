<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse" style="padding-top: 20px;">
            
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"> </div>
            </li>
            <li class="sidebar-search-wrapper">
            </li>
            @php $coin_img=DB::table('coins')->where(['id'=>1])->first();   @endphp
           
           <!--  <p style="text-align: center;">
                <span style="color: #ffffff;font-weight:600;font-size: 12px;vertical-align: middle;"><i class="fa fa-user"></i> &nbsp;TYPE : <?php if(Auth::user()->paid_status==1){ echo "<button class='btn btn-success btn-xs'>PREMIUM MEMBER</button>"; }else{ echo "<button class='btn btn-danger btn-xs'>FREE MEMBER</button>"; } ?>
            </p> -->
            <li class="nav-item start @php echo "active",(request()->path() != 'home')?:"";@endphp">
                <a href="{{ url('/home') }}" class="nav-link nav-toggle">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="title">Dashboard </span>
                    <span class="selected"></span>
                </a>
            </li>
            
            <li class="nav-item  @php echo "active",(request()->path() != 'log_activity/coins')?:"";@endphp">
                <a href="#sponsorLinkModal" data-toggle="modal" class="nav-link nav-toggle">
                    <i class="fas fa-link"></i>
                    <span class="title">Sponsor Link</span>
                    <span class="selected"></span>
                </a>
            </li>

            <!-- <li class="nav-item  @php echo "active",(request()->path() != 'lend/coins')?:"";@endphp">
                <a href="{{route('coin.index')}}" class="nav-link nav-toggle">
                    <img src="{{asset('assets/images/fontend_logo/icon.png')}}" style="height: 19px;">
                    <span class="title">Coin</span>
                    <span class="selected"></span>
                </a>
            </li> -->

            <li class="nav-item  @if( request()->path() == 'fund' ) active open @endif
                    @if( request()->path() == 'deposit/store' ) active open @endif
                    @if( request()->path() == 'add/confirm' ) active open @endif
                    @if( request()->path() == 'withdraw' ) active open @endif
                    @if( request()->path() == 'withdraw/preview' ) active open @endif
                    @if( request()->path() == 'transfer/fund' ) active open @endif
                    @if( request()->path() == 'transaction' ) active open @endif
                    ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-sitemap"></i>
                    <span class="title">Finance</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                   <!--  <li class="nav-item  @if( request()->path() == 'fund' ) active open @endif
                    @if( request()->path() == 'deposit/store' ) active open @endif
                    @if( request()->path() == 'add/confirm' ) active open @endif">
                       <a href="{{route('add.fund.index')}}" class="nav-link ">
                            <i class="far fa-credit-card"></i>
                            <span class="title">My Deposit</span>
                            <span class="selected"></span>
                        </a>
                    </li> -->

                     <li class="nav-item  @if( request()->path() == 'withdraw' ) active open @endif
                        @if( request()->path() == 'withdraw/preview' ) active open @endif">
                            <a href="{{route('request.users_management.index')}}" class="nav-link ">
                                <i class="fas fa-spinner"></i>
                                <span class="title">My Withdraw</span>
                                <span class="selected"></span>
                            </a>
                     </li>
                      <!-- <li class="nav-item  @if( request()->path() == 'transfer/fund' ) active open @endif">
                        <a href="{{route('fund.transfer.index')}}" class="nav-link ">
                            <i class="fas fa-exchange-alt"></i>
                            <span class="title">My Fund Transfer </span>
                            <span class="selected"></span>
                        </a>
                      </li> -->

                     <li class="nav-item  @php echo "active",(request()->path() != 'transaction')?:"";@endphp">
                        <a href="{{route('transaction.history')}}" class="nav-link nav-toggle">
                            <i class="far fa-clone"></i>
                            <span class="title">Transaction History </span>
                            <span class="selected"></span>
                            <span class="selected"></span>
                        </a>
                       </li>

                </ul>
            </li>


           
            <li class="nav-item  <?php echo request()->path() == 'binary/summery' ? 'active' : ''; ?>
            <?php echo request()->path() == 'tree' ? 'active' : ''; ?>
            <?php echo request()->path() == 'referral' ? 'active' : ''; ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-sitemap"></i>
                    <span class="title">My Network</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'tree' ) active open @endif">
                        <a href="{{ route('tree.index') }}" class="nav-link ">
                            <i class="fas fa-sitemap"></i>
                            <span class="title">My Tree</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'referral' ) active open @endif">
                        <a href="{{route('referral.index')}}" class="nav-link ">
                            <i class="fas fa-registered"></i>
                            <span class="title">My Referral</span>
                        </a>
                    </li>
                   <!--  <li class="nav-item  @if( request()->path() == 'myteam' ) active open @endif">
                        <a href="{{ route('myteam') }}" class="nav-link ">
                            <i class="fas fa-sitemap"></i>
                            <span class="title">My Team</span>
                        </a>
                    </li> -->

                </ul>
            </li>

           <!--  <li class="heading">
                <h3 class="uppercase">Investment Management</h3>
            </li>

            <li class="nav-item @php echo "active",(request()->path() != 'lend/packages')?:"";@endphp
                    @php echo "active",(request()->path() != 'lend/preview')?:"";@endphp
                    @php echo "active",(request()->path() != 'lending/history')?:"";@endphp
                    @php echo "active",(request()->path() != 'lending/history')?:"";@endphp
                    ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-bookmark"></i>
                    <span class="title">Investment</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                   <li class="nav-item  @php echo "active",(request()->path() != 'lend/packages')?:"";@endphp
                    @php echo "active",(request()->path() != 'lend/preview')?:"";@endphp">
                        <a href="{{route('lend.index')}}" class="nav-link nav-toggle">
                            <i class="fas fa-bookmark"></i>
                            <span class="title">Investment </span>
                            <span class="selected"></span>
                        </a>
                    </li>     

                     <li class="nav-item  @php echo "active",(request()->path() != 'lending/history')?:"";@endphp">
                        <a href="{{route('lend.history')}}" class="nav-link nav-toggle">
                            <i class="fas fa-book"></i>
                            <span class="title">My Invest</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item  @php echo "active",(request()->path() != 'lending/history')?:"";@endphp">
                        <a href="{{route('all.roi.index')}}" class="nav-link nav-toggle">
                            <i class="fas fa-book"></i>
                            <span class="title">My Profit History</span>
                            <span class="selected"></span>
                        </a>
                    </li>          

                </ul>
            </li> -->

            <!--<li class="nav-item @php echo "active",(request()->path() != 'profile')?:"";@endphp
            @php echo "active",(request()->path() != 'security')?:"";@endphp
            @php echo "active",(request()->path() != 'security/two/step')?:"";@endphp">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fas fa-cogs"></i>
                    <span class="title">General Settings</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'profile' ) active open @endif">
                        <a href="{{ route('profile.index') }}" class="nav-link ">
                            <i class="fas fa-user-circle"></i>
                            <span class="title">My Profile</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'security' ) active open @endif">
                        <a href="{{ route('security.index') }}" class="nav-link ">
                            <i class="fas fa-key"></i>
                            <span class="title">Change Password</span>
                        </a>
                    </li>

                    <li class="nav-item  @if( request()->path() == 'security/two/step' ) active open @endif">
                        <a href="{{route('two.factor.index')}}" class="nav-link ">
                            <i class="fas fa-lock"></i>
                            <span class="title">Security</span>
                        </a>
                    </li>

                </ul>
            </li>
            -->
            <li class="nav-item  @php echo "active",(request()->path() != 'vedios')?:"";@endphp">
                <a href="{{route('videos.index')}}" class="nav-link nav-toggle">
                    <i class="fas fa-eye"></i>
                    <span class="title">Watch Videos</span>
                    <span class="selected"></span>
                </a>
            </li>

             <li class="nav-item  @php echo "active",(request()->path() != 'log_activity/coins')?:"";@endphp">
                <a href="{{route('log_activity.index')}}" class="nav-link nav-toggle">
                    <i class="fas fa-bookmark"></i>
                    <span class="title">Log Activity</span>
                    <span class="selected"></span>
                </a>
            </li>
            @php 
              $get_ticket = \App\Ticket::where(['customer_id'=>Auth::user()->id,'status'=>2])->get();
              $get_comment=0;
              foreach($get_ticket as $get_ticket123){
                $get_comment+=DB::table('ticket_comments')->where(['ticket_id'=>$get_ticket123->ticket,'status'=>0,'type'=>0])->count();
              }
              
            @endphp
            <li class="nav-item  @if( request()->path() == 'support/new' ) active open @endif
            @if( request()->path() == 'support' ) active open @endif">
                <a href="{{route('support.index.customer')}}" class="nav-link ">
                    <i class="fas fa-ticket-alt"></i>
                    <span class="title">Support Ticket  @if($get_comment == 0)  @else <span class="badge badge-danger"> {{ $get_comment }} @endif </span>
                </a>
            </li>

        </ul>
    </div>
</div>