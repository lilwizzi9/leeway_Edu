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
                        <div class="caption bold">My Teams</div>
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
                                    <th> Username </th>
                                    <th> Full Name </th>
                                    <th> Email </th>
                                    <th> Level </th>
                                    <th> Type </th>
                                    <th> Date Time </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ref as $key => $data)
                                    <tr>
                                        <td>{{$data->username}}</td>
                                        <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>Level 1</td>
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
                                        <td>{{ \Carbon\Carbon::parse($data->created_at)->format('F d, Y - h:i A') }}</td>
                                    </tr>
                                 <?php
                                  $second_level_id=$data->id;
                                  $second_level=DB::table('users')->where(['referrer_id'=>$second_level_id])->get();
                                 ?>
                                 @foreach($second_level as $key1 => $data1)
                                    <tr>
                                        <td>{{$data1->username}}</td>
                                        <td>{{ $data1->first_name }} {{ $data1->last_name }}</td>
                                        <td>{{ $data1->email }}</td>
                                        <td>Level 2</td>
                                        <td>
                                         <?php
                                         if($data1->paid_status==1){
                                            echo "<a class='btn btn-success btn-xs'>Paid";
                                         }
                                         else{
                                            echo "<a class='btn btn-warning btn-xs'>Free";
                                         }
                                         ?>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($data1->created_at)->format('F d, Y - h:i A') }}</td>
                                    </tr>
                                 <?php
                                  $third_level_id=$data1->id;
                                  $third_level=DB::table('users')->where(['referrer_id'=>$third_level_id])->get();
                                 ?>
                                 @foreach($third_level as $key2 => $data2)
                                    <tr>
                                        <td>{{$data2->username}}</td>
                                        <td>{{ $data2->first_name }} {{ $data2->last_name }}</td>
                                        <td>{{ $data2->email }}</td>
                                        <td>Level 3</td>
                                        <td>
                                         <?php
                                         if($data2->paid_status==1){
                                            echo "<a class='btn btn-success btn-xs'>Paid";
                                         }
                                         else{
                                            echo "<a class='btn btn-warning btn-xs'>Free";
                                         }
                                         ?>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($data2->created_at)->format('F d, Y - h:i A') }}</td>
                                    </tr>
                                 @endforeach
                                 @endforeach
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
