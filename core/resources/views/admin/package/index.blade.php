@extends('master')
@section('site-title')
    Packages
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title bold">Invest Packages
                <a class="btn dark btn-md pull-right" data-toggle="modal" href="#basic">
                    <i class="fa fa-plus"></i>  Add New Packages
                </a>
            </h3>
        @if (count($errors) > 0)
            <div class="row">
                <div class="col-md-010">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h12><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</h12>
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
                            <div class="caption">
                                <i class="fa fa-th"></i> Packages List
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                @foreach($pack as $data)
                                    <div class="col-md-3">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading text-center">
                                                {{$data->title}}
                                            </div>
                                            <div class="panel-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item"><h4  class="btn btn-block btn-{{$data->status == 1 ? 'success' : 'danger'}}">{{$data->status == 1 ? 'Active' : 'Deactive'}}</h4></li>
                                                    <li class="list-group-item"> <h5 class="text-center"> Amount: {{$data->amount}}</h5></li>
                                                   
                                                </ul>
                                            </div>
                                            <div class="panel-footer">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                         <a class="btn btn-primary btn-block" data-toggle="modal" href="#editModal{{$data->id}}"><i class="fa fa-edit"></i>Edit</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="editModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit {{$data->title}}</h4>
                                            </div>
                                            <form class="form-horizontal" role="form" method="post" action="{{route('package.upate', $data->id)}}">
                                                {{csrf_field()}}
                                                {{method_field('put')}}
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <strong class="col-md-12">Title</strong>
                                                        <div class="col-md-12">
                                                            <input class="form-control" value="{{$data->title}}" type="text" required name="title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong class="col-md-12">Amount</strong>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="amount" required value="{{$data->amount}}">
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <strong class="col-md-12">Status</strong>
                                                        <div class="col-md-12">
                                                            <input name="status" data-toggle="toggle" {{ $data->status == "1" ? 'checked' : '' }} data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="Deactive"  data-width="100%" type="checkbox">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <button type="submit" class="btn dark">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>

            </div>
        </div>
    </div>

    <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Package for Lending Plan</h4>
            </div>
            <form class="form-horizontal" role="form" method="post" action="{{route('create.package')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="col-md-6">
                        <strong class="col-md-12">Title</strong>
                        <div class="col-md-12">
                            <input class="form-control" placeholder="Package Name" type="text" required name="title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <strong class="col-md-12">Amount</strong>
                        <div class="col-md-12">
                            <input class="form-control" placeholder="Package Amount" type="text" required name="amount">
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                    <button type="submit" class="btn dark">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
