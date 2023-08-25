@extends('fonts.layouts.user')
@section('site')
    | My | ROI INCOME
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
              <div class="row">
              <div class="col-md-12">
                <div class="portlet box dark">
                    <div class="portlet-title">
                        <div class="caption bold">My Profit History</div>
                    </div>
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered portlet-body">
                         <!-- Date Filter -->    
                     <div class="row">
                       <form method="GET" action="{{ route('all.roi.index') }}" >
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
                                        <th> Transaction Number </th>
                                        <th> Transected on </th>
                                        <th> Description </th>
                                        <th> Amount </th>
                                        <th>Charge</th>
                                        <th> Post Balance </th>
                                    </tr> 
                                    </thead>
                                    <tbody>
                                    @foreach($roi_income as $key => $data)
                                    <tr>
                                       <td>{{$key+1}}</td>
                                        <td>{{$data->trans_id}}</td>
                                        <td>{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</td>
                                        <td>{{$data->description}}</td>
                                        <td>$ {{abs($data->amount)}}</td>
                                        @if($data->charge != '')
                                            <td>$ {{ $data->charge }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>$ {{round($data->new_balance,4)}} </td>
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