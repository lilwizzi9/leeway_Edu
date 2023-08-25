@extends('master')
@section('site-title')
     Coins Sale List
@endsection
@section('style')
    <style>
        #imaginary_container{
            margin-top:20%; /* Don't copy this */
        }
        .stylish-input-group .input-group-addon{
            background: white !important;
        }
        .stylish-input-group .form-control{
            border-right:0;
            box-shadow:0 0 0;
            border-color:#ccc;
        }
        .stylish-input-group button{
            border:0;
            background:transparent;
        }
    </style>
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="bold">
                Coins Sale List
            </h3>

            <div class="row">              
             
                    <div class="col-md-12">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption uppercase bold"><i class="fa fa-user"></i> Coins Sale</div>
                            </div>
                            <div class="portlet-body table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th> Sl</th>
                                        <th> Name </th>
                                        <th> UserName </th>
                                        <th> Coin </th>
                                        <th>Coin Amount</th>
                                        <th>No of coins</th>
                                        <th> Total amount</th>
                                        <th> Date time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pack as $key => $data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$data->first_name}}</td>
                                            <td><b>{{$data->username}}</b></td>
                                            <td><b>{{$data->name}}</b></td>
                                            <td><b>${{$data->coin_amount}}</b></td>
                                            <td>{{ $data->no_of_coins}}</td>
                                            <td>${{ $data->total_amount }}</td>                                           
                                            <td>{{ \Carbon\Carbon::parse($data->created_at)->format('F dS, Y - h:i A') }}</td>                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection

