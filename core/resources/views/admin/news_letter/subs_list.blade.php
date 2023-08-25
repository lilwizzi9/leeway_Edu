@extends('master')
@section('site-title')
    Subscriber List
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-trophy"></i> Subscriber List
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="awards">
                                <thead>
                                <tr>
                                    <th> Subscriber Name </th>
                                    <th> Subscriber Email </th>
                                    <th> Raised Time </th>
                                    <th> Delete </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscriber as $key=>$data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{date('g:ia \o\n l jS F Y',strtotime($data->created_at))}}</td>
                                    <td><a class="btn red"  data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-content">
                                        <form role="form" action="{{route('subscriber.delete', $data->id)}}" method="post">
                                            {{csrf_field()}}
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                <button type="submit" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{$subscriber->links()}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection