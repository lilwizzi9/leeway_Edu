@extends('master')
@section('site-title')
    DashBoard Of Admin
@endsection
@section('style')
    <style>
        .visual{
            color: #f7f6ff;
        }
        .pranto{
            margin-bottom: 10px;
        }

        rect:nth-child(even){
            fill: #3498db;
        }
        rect:nth-child(odd){
            fill: #1abc9c;
        }
    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
                @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-md-06">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</h4>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            <h3 class="page-title">Admin Dashboard</h3>
        @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif



    <div class="row">
        <div class="col-md-12">
            <div class="portlet box dark">
                <div class="portlet-title">
                    <div class="caption uppercase bold"><i class="fas fa-signal"></i> Transaction Statistic </div>
                </div>
                <div class="portlet-body">
                    <div class="row">

                        <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue-madison">
                                <div class="visual">
                                    <i class="fas fa-money-bill-alt"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{number_format(\App\User::sum('balance'),2)}}">0 </span> BUSD
                                    </div>
                                    <div class="desc"> All Users BUSD Balance</div>
                                </div>
                                <a class="more" href="{{url('admin/users')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>

                        <!-- <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green-jungle ">
                                <div class="visual">
                                    <i class="far fa-credit-card"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{number_format(\App\Deposit::where('status', 1)->sum('amount'),2)}}">0</span> {{$general->symbol}}
                                    </div>
                                    <div class="desc">Total Add Fund</div>
                                </div>
                                <a class="more" href="{{route('index.deposit.user')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div> -->

                        <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red-soft ">
                                <div class="visual">
                                    <i class="fas fa-retweet"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" style="font-size: 29px;" data-value="{{\App\WithdrawTrasection::where('status', 1)->sum('amount')}}">0</span> {{$general->symbol}}
                                    </div>
                                    <div class="desc">Total Withdraw</div>
                                </div>
                                <a class="more" href="{{url('admin/withdraw/log')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>

                        <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat grey-mint ">
                                <div class="visual">
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{abs(\App\Transaction::where('type', 5)->sum('amount'))}}">0</span> {{$general->symbol}}
                                    </div>
                                    <div class="desc">Admin Generated</div>
                                </div>
                                <a class="more" href="{{route('admin.generate.view')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                      	
                         <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat grey-mint ">
                                <div class="visual">
                                    <i class="fas fa-retweet"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{abs(\App\User::sum('lewt_balance'))}}">0</span> LEWT
                                    </div>
                                    <div class="desc">Total LEWT Balance</div>
                                </div>
                                
                            </div>
                        </div>
                      
                    </div>

                    <div class="row">

                        <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red-pink ">
                                <div class="visual">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{abs(\App\Transaction::where('type', 6)->sum('amount'))}}">0</span> {{$general->symbol}}
                                    </div>
                                    <div class="desc">Admin Subtract</div>
                                </div>
                                <a class="more" href="{{route('admin.subtract.view')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>

                       <!--  <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue-chambray">
                                <div class="visual">
                                    <i class="fas fa-stopwatch"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{\App\Income::where('type', 'B')->sum('amount')}}">0</span> {{$general->symbol}}
                                    </div>
                                    <div class="desc">Total Binary Amount</div>
                                </div>
                                <a class="more" href="{{url('admin/match')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div> -->

                       <!--  <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green-seagreen ">
                                <div class="visual">
                                    <i class="fas fa-link"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{\App\Income::where('type', 'R')->sum('amount')}}">0</span> {{$general->symbol}}
                                    </div>
                                    <div class="desc">Total Referral Amount</div>
                                </div>
                                <a class="more" href="{{route('ref.amount.total')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div> -->

                        <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red-thunderbird  ">
                                <div class="visual">
                                    <i class="fas fa-spinner"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{\App\WithdrawTrasection::where('status', 0)->count()}}">0</span>
                                    </div>
                                    <div class="desc">Withdraw Requests</div>
                                </div>
                                <a class="more" href="{{ url('admin/withdraw/requests') }}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                     <div class="row">
                       <!--  <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red-thunderbird  ">
                                <div class="visual">
                                    <i class="fas fa-spinner"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{ number_format(DB::table('roi_transactions')->where('type',1)->sum('amount'),2) }}">0</span>
                                        {{$general->symbol}}
                                    </div>
                                    <div class="desc">Total Daily Investment Profit</div>
                                </div>
                                <a class="more" href="{{ url('admin/mothly_profit_investment_history') }}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
 -->
                        <!-- <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green-seagreen ">
                                <div class="visual">
                                    <i class="fa fa-archive"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{ DB::table('lending_logs')->sum('lend_amount')}}">0</span>
                                        {{$general->symbol}}
                                    </div>
                                    <div class="desc">Total Investments</div>
                                </div>
                                <a class="more" href="{{ route('lend.history') }}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div> -->

                       <!--  <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue-madison">
                                <div class="visual">
                                    <i class="fas fa-money-bill-alt"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{ \App\Income::where('type', 'B')->get()->sum('amount')}}">0</span>
                                        {{$general->symbol}}
                                    </div>
                                    <div class="desc">Total Salary Generate</div>
                                </div>
                                <a class="more" href="{{ route('match.index') }}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div> -->
                        
                  <!--       
                       <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue-madison">
                                <div class="visual">
                                </div>
                                @php
                                 $total_reg_mem=DB::table('users')->count();
                                 $total_free_mem=DB::table('users')->where('paid_status',0)->count();
                                 $total_paid_mem=DB::table('users')->where('paid_status',1)->count();
                                @endphp
                                <div class="details">
                                 <h5 style="color:white;"><strong>Total Registered Member : </strong> {{ $total_reg_mem }} </h5>
                                 <h5 style="color:white;"><strong>Free Member : </strong> {{ $total_free_mem }}</h5>
                                 <h5 style="color:white;"><strong>Paid Member : </strong> {{ $total_paid_mem }}</h5>
                                </div>
                                <a class="more" href="{{url('admin/users')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div> -->
                        

                     </div>

                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet box dark">
                <div class="portlet-title">
                    <div class="caption uppercase bold"><i class="far fa-money-bill-alt"></i> Admin Income </div>
                </div>
                <div class="portlet-body">
                    <div class="row">

                        <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat dark  ">
                                <div class="visual">
                                    <i class="fas fa-money-bill-alt"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{number_format(\App\Transaction::where('type', 2)->sum('charge'),2)}}">0 </span> {{$general->symbol}}
                                    </div>
                                    <div class="desc">Total Withdraw Charge</div>
                                </div>
                                <a class="more" href="{{url('admin/withdraw/log')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>

                        <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue-sharp ">
                                <div class="visual">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{number_format(\App\Transaction::where('type', 3)->sum('charge'),2)}}">0</span> {{$general->symbol}}
                                    </div>
                                    <div class="desc">Total Transfer Charge</div>
                                </div>
                                <a class="more" href="{{route('index.transfer.user')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>

                    

                      <!--   <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat grey-gallery">
                                <div class="visual">
                                    <i class="fas fa-plus-square"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{\App\Deposit::where('status', 1)->sum('trx_charge')}}">0</span> {{$general->symbol}}
                                    </div>
                                    <div class="desc">Add Fund Charge</div>
                                </div>
                                <a class="more" href="{{url('admin/add/fund/user')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div> -->
                    </div>

                  

                    </div>
                </div>
            </div>
        </div>

                   <!--  <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption uppercase bold"><i class="fas fa-chart-line"></i> Investment Chart </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="myfirstchart" style="height: 250px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                    @php

                        $trans = \App\LendingLog::orderBy('id', 'desc')->take(10)->get();

                        $main_chart_data = "[";

                        foreach ($trans as $index => $data)
                        {
                         $main_chart_data .= "{ year: '".date('Y-m-d', strtotime($data->created_at))."' , value:  ".abs($data->lend_amount)."  }".",";
                        }

                        $main_chart_data .= "]";

                    @endphp

        </div>
    </div>


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
