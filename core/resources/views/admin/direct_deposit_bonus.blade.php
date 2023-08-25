@extends('master')
@section('site-title')
    Direct Deposit Bonus 
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title uppercase bold"> Direct Deposit Bonus 
                <a class="btn blue-dark btn-md pull-right" data-toggle="modal" href="#basic">
                    <i class="fa fa-plus"></i>   ADD NEW
                </a>
            </h3>
            <hr>
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
                    <div class="portlet box blue-dark">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-road"></i>Direct Deposit Bonus 
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-scrollable table-bordered table-hover" id="awards">
                                    <thead>
                                    <tr>
                                        <th> Serial </th>
                                        
                                        <th>Image</th>
                                        <th> Deposit Amount </th>
                                        <th>Description</th>
                                        <th style="text-align: center"> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($test as $key => $data)
                                        <tr id="table_tr_{{$data->id}}">
                                            <td>{{$key+1}}</td>
                                            <td><img height="80px" src="{{asset('assets/images/'. $data->image)}}"></td>
                                            <td>${{$data->amount}}</td>
                                            <td><b>{{$data->description}}</b></td>
                                            <td>
                                                <a class="btn blue-madison" data-toggle="modal" href="#editModal{{$data->id}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a class="btn red"  data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-content">
                                                <form role="form" action="{{route('direct_deposit_bonus.delete', $data->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                        <button type="submit" class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                        <div id="editModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Update Direct Joining Commision</h4>
                                                    </div>
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('update.direct_deposit_bonus', $data->id)}}" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}

                                                      <div class="form-group ">
                                                            <label class="control-label col-md-3">Image Upload #1</label>
                                                            <div class="col-md-9">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">

                                                <span class="btn green-soft btn-outline btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="image"> </span>
                                                                        <a href="javascript:;" class="btn green-soft fileinput-exists" data-dismiss="fileinput"> Remove </a>

                                                                </div>
                                                            </div>
                                                        </div>


                                                    <div class="row">
                                                      <div class="col-md-12">
                                                        <img height="80px" src="{{asset('assets/images/'. $data->image)}}">
                                                      </div>
                                                    </div>

                                                       <div class="row">
                                                           <div class="form-group">
                                                               <div class="col-md-12">
                                                                   <div class="col-md-12">
                                                                       <label class="control-label">Deposit Amount</label>
                                                                       <input class="form-control" name="amount" value="{{$data->amount}}" type="text">
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <div class="row">
                                                           <div class="form-group">
                                                               <div class="col-md-12">
                                                                   <div class="col-md-12">
                                                                       <label class="control-label">Description</label>
                                                                       <input class="form-control text-capitalize" value="{{$data->description}}" type="text" required name="description">
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>


                                                       <div class="modal-footer">
                                                           <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                           <button type="submit" class="btn blue-madison">Update</button>
                                                       </div>

                                                    </form>
                                                </div>

                                            </div>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-5"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add New Direct Deposit Bonus </h4>
                            </div>

                            <form class="form-horizontal" role="form" method="POST" action="{{route('store.direct_deposit_bonus')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Image Upload #1</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                        <span class="btn green-soft btn-outline btn-file">
                        <span class="fileinput-new"> Select image </span>
                        <span class="fileinput-exists"> Change </span>
                        <input type="file" name="image"> </span>
                                                <a href="javascript:;" class="btn green-soft fileinput-exists" data-dismiss="fileinput"> Remove </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Deposit Amount</label>
                                            <input class="form-control text-capitalize" placeholder="Enter Deposit Amount" type="text" required name="amount">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Description</label>
                                            <input class="form-control text-capitalize" placeholder="Enter Description" type="text" required name="description">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    <button type="submit" class="btn green-meadow">Save</button>
                                </div>
                            </form>
                        </div>

                </div>

            </div>
        </div>
    </div>
@endsection
