@extends('fonts.layouts.user')
@section('site')
| Add | Fund
@endsection
@section('main-content')
<style>
.panel-footer {
    padding: 10px 15px;
    background-color: #f5f5f5;
    /* border-top: 1px solid #ddd; */
    background: #bcbcbc;
    border-bottom-right-radius: 0px;
    border: none;
    border-bottom-left-radius: 0px;
    border-radius: 0px !important;
}
	.panel-primary {
    border-color: #337ab7;
    border: none;
}
.page-content-wrapper .page-content1 {
    margin-left: 235px;
    margin-top: 0;
    min-height: 600px;
    padding: 25px 20px 10px;
    background: #f9fbfd;
}

</style>
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
        @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box dark">
                    <div class="portlet-title">
                        <div class="caption uppercase bold"><i class="fa fa-plus"></i> Add Funds</div>
                        <div class="caption uppercase bold pull-right">
                         <a href="#deposit_history" class="btn" style="background-color:red;">
                            <i class="fa fa-arrow-down"></i>Deposit History</a>
                        </div>
                    </div>
                    
                    <div class="portlet-body">
                        <div class="row">
                            @foreach($gates as $gate)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel panel-primary" style="background-color:#bcbcbc;">
                                    <div class="panel-body text-center">
										<img src="{{asset('assets/images/gateway')}}/{{$gate->gateimg}}" style="width:100%">
                                    </div>
                                    <section class="text-center">
                                      <span>Processing</span>
                                      <span>1-24hours</span>
                                    </section>
                                    <div class="panel-footer">
                                        <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#buyModal{{$gate->id}}">Add Funds </button>
                                    </div>
                                </div>
                            </div>
                            <!--Buy Modal -->
                            <div id="buyModal{{$gate->id}}" class="modal fade" role="dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Fund via <strong>{{$gate->name}}</strong></h4>
                                    </div>
                                    <form method="POST" action="{{route('buy.preview')}}">
                                        <div class="modal-body">
                                            <p style="color: red"> Charge : {{$gate->chargefx}} {{$general->currency}} & {{$gate->chargepc}} %</p>
                                            <div id="resu"></div>
                                            {{csrf_field()}}
                                            <input type="hidden" name="gateway" value="{{$gate->id}}">
                                            <div class="form-group">
                                                <strong class="col-md-12"> Deposit Amount ( {{$gate->minamo}} - {{$gate->maxamo}} )</strong>
                                                <div class="input-group">
                                                    <input type="text" name="amount" class="form-control amount" id="inputAmountAdd" placeholder="Amount of Add your Fund" required>
                                                    <span class="input-group-addon"> {{$general->currency}} </span>
                                                </div>
                                                <div id="showMessage">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info">Preview</button>
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
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box dark">
                    <div class="portlet-title">
                        <div class="caption uppercase bold">Deposit History</div>
                    </div>
                    
                    <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <!-- Date Filter -->    
                     <div class="row">
                       <form method="GET" action="{{ route('add.fund.index') }}" >
                        <div class="col-sm-4">
                          <input type="date" name="from_date" class="form-control" value="{{ isset($from_date)?$from_date:'' }}" required>
                        </div>
                        <div class="col-sm-4">
                          <input type="date" name="to_date" class="form-control" value="{{ isset($to_date)?$to_date:'' }}" required>
                        </div>
                        <div class="col-sm-4">
                          <input type="submit" value="VIEW" class="btn btn-primary" style="width:100%;">
                        </div>                          
                       </form>
                       <br>
                       <br>
                        @if(!empty($from_date) && !empty($to_date))
                          <h4 style="text-align:center;"><strong>Search Result From Date: {{ $from_date }} To Date: {{ $to_date }}</strong></h4>
                        @endif
                     </div>
                     <br>
                     <!-- End Date Filter -->  
                        <div class="portlet-title">
                            <div class="caption font-dark">
                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th width="10%"> SL </th>
                                    <th> Transaction ID </th>
                                    <th> Amount </th>
                                    <th> Trx Charge </th>
                                    <th> Gateway </th>
                                    <th> Status </th>
                                    <th> Date Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                 @php
                                 $a=1;
                                 @endphp
                                 @foreach($deposits as $deposit_his)
                                 @php
                                  $gateway=DB::table('gateways')->where(['id'=>$deposit_his->gateway_id])->first();
                                 @endphp
                                  <tr>
                                   <td>{{ $a++ }}</td>
                                   <td>{{ $deposit_his->trx }}</td>
                                   <td>$ {{ $deposit_his->amount }}</td>
                                   <td>$ {{ $deposit_his->trx_charge }}</td>
                                   <td>{{ $gateway->name }}</td>
                                   <td>
                                       @if($deposit_his->status ==0)
                                        Pending
                                       @elseif($deposit_his->status ==1)
                                        Success
                                       @else
                                        Not Defined
                                       @endif
                                   </td>
                                   <td>{{ \Carbon\Carbon::parse($deposit_his->created_at)->format('F dS, Y - h:i A') }}</td>
                                  </tr>
                                 @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
                </div>
            </div>
        </div>
    </div>

        

</div>
@endsection