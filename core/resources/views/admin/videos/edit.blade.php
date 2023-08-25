@extends('master')
@section('site-title')
    Video Edit
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
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-list font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Edit VIdeo [ {{$test->title}} ] </span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form class="form-horizontal" role="form" method="post" action="{{route('video.update', $test->id)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Video Upload</label>
                                    <div class="col-md-9">
                                        <video width="220" height="200" controls>
                                          <source src="{{ asset('assets/video/'.$test->video) }}" type="video/mp4">
                                        </video>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div>
                                                <span class="btn green-soft btn-outline btn-file">
                                                <input type="file" name="video"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Package</label>
                                             <select name="pack_id" class="form-control" >
                                                 <option>Select Package</option>
                                                 @foreach($pack as $packs)
                                                 <option value="{{ $packs->id }}" 
                                                    @if($packs->id == $test->pack_id) selected @endif>{{ $packs->title }}</option>
                                                 @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Title</label>
                                            <input class="form-control text-capitalize" value="{{$test->title}}" type="text" required name="title">
                                        </div>
                                    </div>
                                </div>

                            

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Description</label>
                                            <input class="form-control text-capitalize" value="{{$test->description}}" type="text" required name="description">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn blue-madison btn-block">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection