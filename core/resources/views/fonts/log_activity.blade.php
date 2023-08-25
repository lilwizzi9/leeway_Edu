@extends('fonts.layouts.user')
@section('site')
    | Log Activity
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
                            <div class="caption uppercase bold"><i class="fa fa-th"></i>Log Activity</div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th width="10%"> SL </th>
                                    <th> IP </th>
                                    <th> Agent </th>
                                    <th> Exact Location </th>
                                    <th> Date Time </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($LendingLog as $key => $data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->ip}}</td>
                                    <td>{{$data->agent}}</td>
                                    <td>{{$data->track_location}}</td>
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
    </div>
@endsection