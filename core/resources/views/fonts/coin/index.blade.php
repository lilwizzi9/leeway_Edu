@extends('fonts.layouts.user')
@section('site')
    | Coin | History
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
                            <div class="caption uppercase bold"><i class="fa fa-th"></i> Coin</div>
                        </div>                        
                        <div class="portlet-body">                            
                                @foreach($pack as $coin)
                                  <div class="row">
                                    <!-- <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h4 class="panel-title" style="text-align: center;">{{$coin->name}}</h4>
                                            </div>
                                            <div class="panel-body text-center">
                                              <img src="{{ asset('assets/images/') }}<?= "/".$coin->image; ?>" style="height: 200px;">                       
                                              <h4 class="panel-title" style="text-align: center;"><strong>Amount: {{$coin->coin_amount}}$</strong></h4>
                                              <p>{{$coin->description}}</p>
                                            </div>
                                            <div class="panel-footer">
                                             <div class="row">
                                                  <div class="col-sm-6">
                                                <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#buyModal{{$coin->id}}">BUY NOW</button>
                                              </div>
                                              <div class="col-sm-6">
                                                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#sellModal{{$coin->id}}">SELL NOW</button>
                                              </div>
                                             </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-sm-4">
                                       <img src="{{ asset('assets/images/') }}<?= "/".$coin->image; ?>" style="height: 270px;">      
                                    </div>

                                    <div class="col-sm-8">
                                      <h1 style="text-align: center; color:white;"><strong>{{$coin->name}}</strong></h1>
                                      <h4 class="panel-title" style="color:white;"><strong>Buy Coin Amount: {{$coin->coin_amount}}$</strong></h4><br>
                                      <h4 class="panel-title" style="color:white;"><strong>Sell Coin Amount: {{$coin->sell_amount}}$</strong></h4><br>

                                      <p style="color:white;">When you buy coins then your referral earn some coins depend on Referral Percentage : {{$coin->referal_comission}} %</p>

                                      <p style="color:white;"> {{$coin->description}}</p>
                                      <div class="row">
                                          <div class="col-sm-4">
                                            <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#buyModal{{$coin->id}}">Buy Now</button>
                                          </div>
                                          <div class="col-sm-4">
                                            <button class="btn btn-success btn-block" data-toggle="modal" data-target="#sellModal{{$coin->id}}">Sell Now</button>
                                          </div>
                                          <div class="col-sm-4">
                                            <button class="btn btn-success btn-block"><a href="#coin_history">History <i class="fa fa-arrow-down"></i></a></button>
                                          </div>

                                         </div>
                                    </div>

                                    <!--Buy Modal -->
                                    <div id="buyModal{{$coin->id}}" class="modal fade" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background: #32485a;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" style="color: white;">Buy Coin:  <strong>{{$coin->name}}</strong></h4>
                                            </div>                                            
                                            <form method="POST" action="{{route('lend.buy_coin')}}">
                                                <div class="modal-body">    
                                                 <p><strong>One Coin Amount: {{$coin->coin_amount}} $</strong></p> 
                                                 <p><strong>Your Main Wallet Balance: {{ number_format(Auth::user()->balance,4) }} $</strong></p> 

                                                 <p><strong>You Can BUY Coin With Your Wallet Only: <?php if($coin->coin_amount>0){ Auth::user()->balance/$coin->coin_amount; }else{ echo"0"; } ?> Coins. If you want BUY more coins Please add fund in your main wallet <a href="{{ url('fund') }}">Add Fund</a></strong></p> 

                                                    {{csrf_field()}}
                                                    <input type="hidden" name="coin_id" value="{{$coin->id}}">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" name="coin" class="form-control" placeholder="Enter No Of Buy Coins" required>
                                                            <span class="input-group-addon"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Confirm to BUY</button>
                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div id="sellModal{{$coin->id}}" class="modal fade" role="dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background: #32485a;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" style="color: white;">Sell Coin:  <strong>{{$coin->name}}</strong></h4>
                                            </div>                                            
                                            <form method="POST" action="{{route('lend.sell_coin')}}">
                                                <div class="modal-body">    
                                                 <p><strong>One Coin Amount: {{$coin->sell_amount}} $</strong></p> 
                                                 <p><strong>Your Coin Balance: {{ Auth::user()->coin_balance }} Coins</strong></p> 

                                                    {{csrf_field()}}
                                                    <input type="hidden" name="coin_id" value="{{$coin->id}}">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" name="coin" class="form-control" placeholder="Enter No Of Sell Coins" required>
                                                            <span class="input-group-addon"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Confirm to SELL</button>
                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                  </div>
                                @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content" id="coin_history">
            <div class="row" style="margin-top: -200px !important;">
                  <div class="col-md-6">
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption bold">Buy Coin History</div>
                        </div>
                    
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered portlet-body" >
                        <div class="portlet-title">
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th width="10%"> SL </th>
                                    <th> Coin Amount </th>
                                    <th> No Of Coins </th>
                                    <th> Total Amount </th>
                                    <th> Date Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                 @php
                                  $a=1;
                                 @endphp
                                 @foreach($buy_coin as $buy_coin_rec)
                                  <tr>
                                   <td>{{ $a++ }}</td>
                                   <td>$ {{ $buy_coin_rec->coin_amount }}</td>
                                   <td>{{ $buy_coin_rec->no_of_coins }}</td>
                                   <td>$ {{ $buy_coin_rec->total_amount }}</td>
                                   <td>{{ \Carbon\Carbon::parse($buy_coin_rec->created_at)->format('F dS, Y - h:i A') }}</td>
                                  </tr>
                                 @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                
                 </div>
              </div>
                  <div class="col-md-6">
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption bold">Sell Coin History</div>
                        </div>
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                             <table class="table table-striped table-bordered table-hover" id="sample_2">
                                <thead>
                                <tr>
                                    <th width="10%"> SL </th>
                                    <th> Coin Amount </th>
                                    <th> No Of Coins </th>
                                    <th> Total Amount </th>
                                    <th> Date Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                 @php
                                  $a1=1;
                                 @endphp
                                 @foreach($sell_coin as $sell_coin_rec)
                                  <tr>
                                   <td>{{ $a1++ }}</td>
                                   <td>$ {{ $sell_coin_rec->coin_amount }}</td>
                                   <td>{{ $sell_coin_rec->no_of_coins }}</td>
                                   <td>$ {{ $sell_coin_rec->total_amount }}</td>
                                   <td>{{ \Carbon\Carbon::parse($sell_coin_rec->created_at)->format('F dS, Y - h:i A') }}</td>
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