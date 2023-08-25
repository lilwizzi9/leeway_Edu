@extends('fonts.layouts.user')
@section('site')
    | Investment | Packages
@endsection

@section('style')
    <style>
        .panel .panel-body {
            font-size: 15px;
        }
    </style>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption uppercase bold"><i class="fa fa-th"></i> Invest Packages</div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                @foreach($pack as $gate)
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h4 class="panel-title" style=" color: #0e265d; font-weight: 700; text-align:center;">{{$gate->title}}</h4>
                                            </div>
                                            <div class="panel-body text-center">
                                                <p style="color: green;">Invest: {{$general->symbol}} {{$gate->min_amount}}   - {{$general->symbol}} {{$gate->max_amount}} </p>

                                                <p style="color: green">Monthly Profit: {{$gate->monthly_ptofit_min_amount}}  % - {{$gate->monthly_ptofit_max_amount}} %</p>                                                
                                                <p  style="color: black">Saturday Sunday off</p>
                                                <p  style="color: black">{{$gate->days}} Working days Validity</p>
                                                <p  style="color: black">Withdrawl Time {{$gate->period}} Hours.</p>

                                                <!-- <p  style="color: black"><strong>Monthly Profit Of Investment</strong></p>
                                                <table class="table">
                                                 <tr>
                                                  <th>1 Level</th>                                  
                                                  <th>2 Level</th>                                  
                                                  <th>3 Level</th>                                  
                                                 </tr>
                                                 <tr>
                                                   <td>{{$gate->month_pro_inv_level_1}} %</td>
                                                   <td>{{$gate->month_pro_inv_level_2}} %</td>
                                                   <td>{{$gate->month_pro_inv_level_3}} %</td>
                                                 </tr>
                                                </table> -->

                                                <p  style="color: black">Profit withdrawal every Week </p>
                                                <p  style="color: black; font-size: 11px;">Base investment can be withdraw after 250 Working Days.</p>
                                            </div>
                                            <div class="panel-footer">
                                                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#buyModal{{$gate->id}}">Invest</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Buy Modal -->
                                    <div id="buyModal{{$gate->id}}" class="modal fade" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Invest via <strong>{{$gate->title}}</strong></h4>
                                            </div>
                                            <form method="POST" action="{{route('lend.preview')}}">
                                                <div class="modal-body">
                                                    {{csrf_field()}}
                                                   <input type="hidden" name="package_id" value="{{$gate->id}}">
                                                    <div class="form-group">
                                                        <strong class="col-md-12"> Deposit Amount ( {{$gate->min_amount}} {{$general->symbol}} - {{$gate->max_amount}} {{$general->symbol}} )</strong>
                                                        <div class="input-group">
                                                            <input type="text" name="amount" class="form-control" placeholder="Amount of Investment" required>
                                                            <span class="input-group-addon">   {{$general->currency}} 
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Confirm to Invest</button>
                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection