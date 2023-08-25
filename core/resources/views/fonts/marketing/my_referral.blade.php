@extends('fonts.layouts.user')
@section('site')
    | My | Referral
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
             <div class="row">
              <div class="col-md-12">
                <div class="portlet box dark">
                    <div class="portlet-title">
                        <div class="caption bold">My Referrals</div>
                    </div>
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered portlet-body">
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
                                    <th> Username </th>
                                    <th> Full Name </th>
                                    <th> Email </th>
                                    <th> Type </th>
                                    <th> Date Time </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ref as $key => $data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$data->username}}</td>
                                        <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                        <td>{{ $data->email }}</td>
                                         <td>
                                         <?php
                                         if($data->paid_status==1){
                                            echo "<a class='btn btn-success btn-xs'>Paid";
                                         }
                                         else{
                                            echo "<a class='btn btn-warning btn-xs'>Free";
                                         }
                                         ?>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($data->created_at)->format('F dS, Y - h:i A') }}</td>
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
