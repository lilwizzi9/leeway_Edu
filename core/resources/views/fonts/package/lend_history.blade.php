@extends('fonts.layouts.user')
@section('site')
    | Invest | History
@endsection

@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
              <div class="row">
              <div class="col-md-12">
                <div class="portlet box dark">
                    <div class="portlet-title">
                        <div class="caption bold">Invest History</div>
                    </div>
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                       
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
                                    <th> Investment Package </th>
                                    <th> Amount </th>
                                    <th> Status </th>
                                    <th> Remain </th>
                                    <th> Invest Date </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($money as $key => $data)
                                 <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->package->title}}</td>
                                    <td>{{$general->symbol}} {{$data->lend_amount}}</td>
                                    <td>
                                      @if($data->status == 1)
                                        <span class="badge badge-primary">Continue</span>
                                      @else
                                        <span class="badge badge-success">Complete</span>
                                      @endif
                                    </td>
                                    <td>
                                     <?php 
                                     $to_date=strtotime(date("Y-m-d"));
                                     $day=$data->package->days;
                                     $from_date=strtotime(date("Y-m-d", strtotime($data->created_at)) . " + ".$day." days");
                                     echo ceil(abs($from_date - $to_date) / 86400) ?> Days</td>
                                     <td>{{$data->created_at}}</td>
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