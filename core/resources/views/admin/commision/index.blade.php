@extends('master')
@section('site-title')
    Commission Setting
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
        @if (count($errors) > 0)
            <div class="row">
                <div class="col-md-012">
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
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div id="load">
                    </div>
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Commission Settings
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form method="POST" action="{{route('commission.update', $charge->id)}}" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-body">
                                        <div class="form-group col-md-6">
                                            <strong class="col-md-12 ">Transfer Charge User To User:
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="transfer_charge"  value="{{$charge->transfer_charge}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <strong class="col-md-12">Withdraw Charge:
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="withdraw_charge"  value="{{$charge->withdraw_charge}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <strong class="col-md-12 ">Admin Commision:
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="admin_comm"  value="{{$charge->admin_comm}}">
                                                <span class="input-group-addon" ><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <strong class="col-md-12">Sponsor Commision:
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="sponsor_comm"  value="{{$charge->sponsor_comm}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <strong class="col-md-12">Matrix Commision:
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="matrix_comm"  value="{{$charge->matrix_comm}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        

                                        <div class="form-group col-md-2">
                                            <strong class="col-md-12">level_1
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="level_1"  value="{{$charge->level_1}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <strong class="col-md-12">level_2
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="level_2"  value="{{$charge->level_2}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <strong class="col-md-12">level_3
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="level_3"  value="{{$charge->level_3}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <strong class="col-md-12">level_4
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="level_4"  value="{{$charge->level_4}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <strong class="col-md-12">level_5
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="level_5"  value="{{$charge->level_5}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <strong class="col-md-12">level_6
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="level_6"  value="{{$charge->level_6}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <strong class="col-md-12">level_7
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="level_7"  value="{{$charge->level_7}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <strong class="col-md-12">level_8
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="level_8"  value="{{$charge->level_8}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <strong class="col-md-12">level_9
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="level_9"  value="{{$charge->level_9}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <strong class="col-md-12">level_10
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="level_10"  value="{{$charge->level_10}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                   

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn-block btn blue"><i class="fa fa-check"></i> Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection

