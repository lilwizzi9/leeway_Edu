@extends('fonts.layouts.user')
@section('site')
    | Videos
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
                            <div class="caption uppercase bold"><i class="fa fa-th"></i> Videos</div>

                            <div class="caption uppercase bold" style="float: right;">
                             <a href="{{ route('allresults') }}" class="btn btn-warning">View Results</a>
                            </div>

                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                @foreach($videos as $all_videos)
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h4 class="panel-title" style=" color: #0e265d; font-weight: 700; text-align:center;">{{$all_videos->title}}</h4>
                                            </div>
                                            <div class="panel-body text-center">
                                                @if(strpos($all_videos->video, '<') === 0)
                                                <div> {{ ($all_videos->video)}}</div>
                                                @endif

                                                 
                                            @if( strpos($all_videos->video, 'https') === 0)
                                          
                                          <script src="{{ ($all_videos->video)}}"></script>
                                          @else
                                          <video width="320" height="100" controls>
                                          <source src="{{ asset('assets/video/'.$all_videos->video) }}" type="video/mp4">
                                          </video>
                                          @endif
                                        
                                                <br>
                                                <br>
                                                <a class="btn btn-warning" href="{{ url('start-mcq') }}/{{ $all_videos->id }}">Complete Video</a>
                                            </div>
                                           
                                        </div>
                                    </div>
                                  
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection