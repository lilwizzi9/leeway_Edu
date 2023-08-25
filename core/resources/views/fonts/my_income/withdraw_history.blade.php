@extends('fonts.layouts.user')
@section('site')
    | My | Withdraw Requests
@endsection
@section('main-content') 
    <div class="page-content-wrapper">
        <div class="page-content">
            
            <div class="row">
             <div class="col-md-12">
                <div class="portlet box dark">
                    <div class="portlet-title">
                        <div class="caption uppercase bold">Withdraw Requests History</div>
                        <div class="caption uppercase bold pull-right">                         
                            <a  class="btn" href="{{ route('request.add_users_management.index') }}"><i class="fas fa-plus"></i> Add Request Withdraw</a>
                        </div>
                    </div>
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet-body">
                    <!-- Date Filter -->    
                     <div class="row">
                       <form method="GET" action="{{ route('request.users_management.index') }}" >
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
                        
                        <div class="portlet-body portlet light bordered">
                               <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th> Wd Id </th>
                                    <th> Amount </th>
                                    <th> Charge </th>
                                    <th> Method </th>
                                    <th> Details </th>
                                    <th> Requested On</th>
                                    <th> Processed On</th>
                                    <th> Action</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($WithdrawTrasection as $key=>$data)
                                    <tr class="@if($data->status == 3) danger @elseif($data->status == 1) success @else warning @endif">

                                        <td >{{$data->withdraw_id}}</td>
                                        <td>{{$general->symbol}} {{$data->amount}}</td>
                                        <td>{{$general->symbol}} {{$data->charge}}</td>
                                        <td>{{$data->method_name}}</td>

                                        <td>
                                            <a type="button" class="btn btn-info" data-toggle="modal" href="#viewtable{{$data->id}}" >View Detail</a>
                                            <div id="viewtable{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" style="color:black;">View Detail #{{$data->withdraw_id}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-hover">
                                                                <thead>
                                                                <th>Admin Respond Message</th>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        {!! $data->respond_message !!}
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>

                                        <td>{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</td>
                                        <td>{{date('g:ia \o\n l jS F Y', strtotime($data->updated_at))}}</td>
                                        <td>
                                            @if($data->status == 3)
                                                <span class="badge badge-pill badge-danger">REFUNDED</span>
                                            @elseif($data->status == 1)
                                                <span class="badge badge-pill badge-success"> PAID</span>
                                            @else
                                                <span class="badge badge-pill badge-warning"> PENDING</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection