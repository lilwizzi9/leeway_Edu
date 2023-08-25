@extends('fonts.layouts.user')
@section('site')
    | Binary | Commission
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="bold">Binary Commission
            </h3>
            <div class="row">
                <div class="col-md-12">
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
                                    <th width="10%"> SL# </th>
                                    <th> Amount </th>
                                    <th> Description </th>
                                    <th> Time </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($b_income as $key => $data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$general->symbol}} {{$data->amount}} </td>
                                        <td>{{$data->description}}</td>
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
