@extends('fonts.layouts.user')
@section('site')
    | Results
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
              <div class="row">
              <div class="col-md-12">
                <div class="portlet box dark">
                    <div class="portlet-title">
                        <div class="caption bold">My Results</div>
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
                                        <th> Level </th>
                                        <th> Video Title </th>
                                        <th> Total Question </th>
                                        <th> Skipped </th>
                                        <th> Correct Answer </th>
                                        <th> Wrong Answer </th>
                                        <th> MCQ Attempt Total Marks  </th>
                                        <th> Total Get Marks </th>
                                        <th> Percentage </th>
                                        <th> Status<small> (Passed / Failed)</small> </th>
                                        <th> Date Time </th>
                                    </tr> 
                                    </thead>
                                    <tbody>
                                    @foreach($allresults as $key => $data)
                                    @php
                                     $getVideo=DB::table('videos')->where('id',$data->vdo_id)->first();
                                     $getpackages=DB::table('packages')->where('id',$getVideo->pack_id)->first();
                                    @endphp
                                    <tr>
                                       <td>{{$key+1}}</td>
                                       <td>{{$getpackages->title }}</td>
                                       <td>{{$getVideo->title }}</td>
                                       <td>{{$data->totalQuestions }}</td>
                                       <td>{{$data->total_notanswer }}</td>
                                       <td>{{$data->correct_ans }}</td>
                                       <td>{{$data->wrong_ans }}</td>
                                       <td>{{$data->quiz_total_marks }}</td>
                                       <td>{{$data->total_marks }}</td>
                                       <td>{{ number_format($data->get_total_perc,0) }} %</td>
                                       <td>{{$data->result_status }}</td>
                                       <td>{{ \Carbon\Carbon::parse($data->datetime)->format('F dS, Y - h:i A') }}</td>
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