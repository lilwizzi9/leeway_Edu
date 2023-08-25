@extends('fonts.layouts.user')
@section('site')
    | Transfer | Fund
@endsection
@section('style')
    <style> 
        /*responsive for user dashboard*/
        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .input-lg{
                width: 100% !important;
            }
        }
        @media only screen and (max-width: 480px) { 
            .input-lg.responsive{
                width: 100% !important;
            }
            .input-group-addon.responsive{
                font-size: 12px;
            }
            
        }
    </style>
@endsection
@section('main-content')
<style>
.portlet.box.blue-ebonyclay {
    border: 1px solid #fee600;
    border-top: 0;
}
.portlet.blue-ebonyclay, .portlet.box.blue-ebonyclay>.portlet-title, .portlet>.portlet-body.blue-ebonyclay {
    background-color: #fee600;
}
</style>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                 <div class="col-sm-2"></div>
                 <div class="col-sm-8">
                    <div class="portlet box blue-ebonyclay">
                        <div class="portlet-title">
                            <div class="caption uppercase bold"><i class="fa fa-th"></i> Fund Transfer</div>
                            <div class="caption uppercase bold pull-right"><a href="#transfer_history" style="color: #0e265d ;"><i class="fa fa-arrow-down"></i> Fund Transfer History</a></div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p style="color: white">Share your Balance with Other User</p>
                                    <p  style="color: white" >Shared Balance Will Added to Account Balance</p>
                                    <p  style="color: white" >Minimum 01 {{$general->currency}} Can be Transferred</p>
                                </div>
                            </div>

                            <div class="row">
                                <form action="{{route('store.transfer.fund')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="col-md-12 product-service md-margin-bottom-30">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input class="form-control input-lg " placeholder="USERNAME to Transfer" id="refname" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div id="resu"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon responsive">TRANSFER</span>
                                                        <input class="form-control input-lg responsive" placeholder="AMOUNT YOU WANT TO SHARE" name="amount" type="text" id="inputAmount" required>
                                                        <span class="input-group-addon responsive">{{$general->currency}}</span>
                                                    </div>
                                                    <div id="showMessage">

                                                    </div>
                                                    <p style="color:red; font-weight: bold; font-size:15px;"> {{$comission->transfer_charge}}% Transfer Charge will Applied and transferred Fund will go to Secondary Balance.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn blue-ebonyclay btn-block"> Transfer Now</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-sm-2"></div>
                </div>
            </div>
        </div>


        <div class="page-content" id="transfer_history" >
           
            <div class="row" style="margin-top: -200px !important;">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                  <div class="portlet box blue-ebonyclay">
                        <div class="portlet-title">
                            <div class="caption uppercase bold"><i class="fa fa-th"></i> Fund Transfer History</div>
                        </div>
                    <div class="portlet light">
                    <!-- Date Filter -->    
                     <div class="row">
                       <form method="GET" action="{{ route('fund.transfer.index') }}" >
                        <div class="col-sm-4">
                          <input type="date" name="from_date" class="form-control" value="{{ isset($from_date)?$from_date:'' }}" required>
                        </div>
                        <div class="col-sm-4">
                          <input type="date" name="to_date" class="form-control" value="{{ isset($to_date)?$to_date:'' }}" required>
                        </div>
                        <div class="col-sm-4">
                          <input type="submit" value="VIEW" class="btn btn-primary" style="width:100%;">
                        </div>                          
                       </form>
                       <br>
                       <br>
                        @if(!empty($from_date) && !empty($to_date))
                          <h4 style="text-align:center;"><strong>Search Result From Date: {{ $from_date }} To Date: {{ $to_date }}</strong></h4>
                        @endif
                     </div>
                     <br>
                    <!-- End Date Filter -->  
                        <div class="portlet-title">
                            <div class="caption font-dark">

                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                               <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th width="10%"> SL </th>
                                    <th> Transaction Number </th>
                                    <th> Transected on </th>
                                    <th> Description </th>
                                    <th> Amount </th>
                                    <th>Charge</th>
                                    <th> Post Balance </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trans as $key=>$data)
                                    <tr class="@if($data->amount <= 0) danger @elseif($data->type == 3 ) danger @elseif($data->type == 5 ) @else success @endif">
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->trans_id}}</td>
                                        <td>{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</td>
                                        <td>{{$data->description}}</td>
                                        <td>{{$general->symbol}} {{abs($data->amount)}} </td>
                                        @if($data->charge != '')
                                            <td>{{$general->symbol}} {{ $data->charge }} </td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>{{$general->symbol}} {{round($data->new_balance,4)}} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>


    </div>


@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('input','#refname',function() {
                var search_name = $('#refname').val();
                var token = "{{csrf_token()}}";

                $.ajax({
                    type: "POST",
                    url:"{{route('get.user')}}",
                    data:{
                        'name': search_name ,
                        '_token' : token
                    },
                    success:function(data){
//                      console.log(data);
                        $("#resu").html(data);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(document).on('keyup','#inputAmount',function() {
                var inputAmount = parseFloat($('#inputAmount').val());
                var token = "{{csrf_token()}}";

                $.ajax({
                    type: "POST",
                    url:"{{route('get.total.charge')}}",
                    data:{
                        'inputAmount': inputAmount ,
                        '_token' : token
                    },
                    success:function(data){
//                        console.log(data);
                        $("#showMessage").html(data);

                    }
                });

                $('#inputAmount').keyup(function(event){
                    var regex = /[0-9]|\./;
                    var text = $('#inputAmount').val();

                    if( !(regex.test(text))) {
                        $("#showMessage").html("<span style='color: red'>Invalid Amount</span>");
                    }
                });
            });
        });
    </script>
@endsection