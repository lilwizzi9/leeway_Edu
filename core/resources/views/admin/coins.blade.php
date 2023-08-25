@extends('master')
@section('site-title')
    Coins
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title bold">Coins
                <a class="btn dark btn-md pull-right" data-toggle="modal" href="#basic">
                    <i class="fa fa-plus"></i>  Add New Coins
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
                                <i class="fa fa-th"></i> Coins List
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                @foreach($pack as $data)
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading text-center">
                                                {{$data->title}}
                                            </div>
                                            <div class="panel-body">
                                                <ul class="list-group">
                                                  
                                                    <li class="list-group-item">
                                                     <img src="{{ asset('assets/images/') }}<?= "/".$data->image; ?>" style="height: 200px;">
                                                    </li>
                                                    <li class="list-group-item"> <h5 class="text-center">Coin Name: {{$data->name}}</h5></li>
                                                    <li class="list-group-item"> <h5 class="text-center">Buy Amount: {{$data->coin_amount}} {{$general->symbol}}</h5></li>

                                                     <li class="list-group-item"> <h5 class="text-center">Sell Amount: {{$data->sell_amount}} {{$general->symbol}}</h5></li>

                                                     <li class="list-group-item"> <h5 class="text-center">Referral Comission: {{$data->referal_comission}} %</h5></li>

                                                    <li class="list-group-item"> <h5 class="text-center">Description: {{$data->description}}</h5></li>

                                                  
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
                                                <h4 class="modal-title">Edit {{$data->name}}</h4>
                                            </div>
                                            <form class="form-horizontal" role="form" method="post" action="{{route('coin.upate', $data->id)}}" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                {{method_field('put')}}
                                               
                                               <div class="form-group">
                    <div class="col-md-12">
                        <strong class="col-md-12">Coin Name</strong>
                        <div class="col-md-12">
                            <input class="form-control" placeholder="Coin Name" type="text" required name="name" value="{{$data->name}}">
                        </div>
                    </div>
                </div>
                <img src="{{ asset('assets/images/') }}<?= "/".$data->image; ?>" style="height: 100px;">
                <div class="form-group">
                    <div class="col-md-12">
                        <strong class="col-md-12">Coin Image</strong>
                        <div class="col-md-12">
                            <input class="form-control" placeholder="Coin Image" type="file" name="image" value="{{$data->image}}">
                        </div>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-md-12">
                        <strong class="col-md-12">Buy Coin Amount</strong>
                        <div class="col-md-12">
                            <input class="form-control" placeholder="Buy Coin Amount" type="text" required name="coin_amount" value="{{$data->coin_amount}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <strong class="col-md-12">Sell Coin Amount</strong>
                        <div class="col-md-12">
                            <input class="form-control" placeholder="Sell Coin Amount" type="text" required name="sell_amount" value="{{$data->sell_amount}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <strong class="col-md-12">Referral Commision</strong>
                        <div class="col-md-12">
                            <input class="form-control" placeholder="Sell Coin Amount" type="text" required name="referal_comission" value="{{$data->referal_comission}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <strong class="col-md-12">Discription</strong>
                        <div class="col-md-12">
                          <input class="form-control" placeholder="Description" type="text" required name="description" value="{{$data->description}}">
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
                <h4 class="modal-title">Create New Coin</h4>
            </div>
            <form class="form-horizontal" role="form" method="post" action="{{route('create.coin')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="col-md-12">
                        <strong class="col-md-12">Coin Name</strong>
                        <div class="col-md-12">
                            <input class="form-control" placeholder="Coin Name" type="text" required name="name">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <strong class="col-md-12">Coin Image</strong>
                        <div class="col-md-12">
                            <input class="form-control" placeholder="Coin Image" type="file" required name="image">
                        </div>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-md-12">
                        <strong class="col-md-12">Buy Coin Amount</strong>
                        <div class="col-md-12">
                            <input class="form-control" placeholder="Sell Coin Amount" type="text" required name="coin_amount">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <strong class="col-md-12">Sell Coin Amount</strong>
                        <div class="col-md-12">
                            <input class="form-control" placeholder="Sell Coin Amount" type="text" required name="sell_amount">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <strong class="col-md-12">Discription</strong>
                        <div class="col-md-12">
                          <input class="form-control" placeholder="Description" type="text" required name="description">
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
