@extends('master')
@section('site-title')
    Mothly Investment Profit History
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="bold">Mothly Investment Profit History</h3>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">

                              <div style="background-color: orange; padding: 10px;">
                                <h5 style="text-align:center; color: white;"><strong>Daily Profit Date: {{ $today_date }}</strong></h5>

                                <h5 style="text-align:center; color: white;"><strong>
                                    {{ $today_amount }} $
                                </strong></h5>
                              </div>
                              <br>
                              <form method="GET" action="{{ route('mothly_profit_investment_history') }}">
                                <input type="date" name="date" value="{{ $today_date }}">
                                <input type="submit" value="SUBMIT" class="btn btn-primary">
                              </form>

                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th  width="5%"> Sl</th>
                                    <th> Username </th>
                                    <th> Name </th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th> Created On </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($income as $key => $data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->memeber->username}}</td>
                                        <td> <a href="{{route('user.view', $data->user_id)}}">{{$data->memeber->first_name}} {{$data->memeber->last_name}} </a> </td>
                                        <td><b>{{$data->amount}} {{$general->symbol}}</b></td>
                                        <td>{{ $data->description}}</td>
                                        <td> {{ \Carbon\Carbon::parse($data->created_at)->format('F dS, Y - h:i A') }}</td>
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

