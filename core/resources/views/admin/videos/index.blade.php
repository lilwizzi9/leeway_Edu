@extends('master')
@section('site-title')
    Videos
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title uppercase bold"> Videos
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
                                <i class="fa fa-road"></i>Videos
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-scrollable table-bordered table-hover" id="awards">
                                    <thead>
                                    <tr>                                        
                                        <th>Title</th>
                                        <th>Package</th>
                                        <th>Description</th>
                                        <th> Video </th>
                                        <th style="text-align: center"> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($videos as $all_videos)
                                     <tr>
                                      <td>{{ $all_videos->title }}</td>  
                                      <td>
                                        @php
                                         $get_pack=DB::table('packages')->where('id',$all_videos->pack_id)->first();

                                         echo $get_pack->title;
                                        @endphp
                                      </td>  
                                      <td>{{ $all_videos->description }}</td>  
                                      <td>
                                          
                                        
                                            @if( strpos($all_videos->video, 'https') === 0)
                                          <script src="{{ ($all_videos->video)}}"></script>
                                          @else
                                          <video width="320" height="100" controls>
                                          <source src="{{ asset('assets/video/'.$all_videos->video) }}" type="video/mp4">
                                          </video>
                                          @endif
                                        
                                      </td>  
                                       <td>
                                        <a class="btn green-meadow" href="{{route('video.mcq', $all_videos->id)}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                                        <a class="btn green-meadow" href="{{route('video.edit', $all_videos->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="btn red"  data-toggle="modal" href="#deleteModal{{$all_videos->id}}"><i class="fa fa-trash"></i></a>
                                      </td>
                                     </tr>

                                     <div id="deleteModal{{$all_videos->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-content">
                                                <form role="form" action="{{route('video.delete', $all_videos->id)}}" method="post">
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
                                <h4 class="modal-title">Add New Video</h4>
                            </div>

                            <form class="form-horizontal" role="form" method="POST" action="{{route('video.store')}}" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Package</label>
                                            
                                            <select name="pack_id" class="form-control">
                                             <option>Select Package</option>
                                             @foreach($pack as $packs)
                                              <option value="{{ $packs->id }}">{{ $packs->title }}</option>
                                             @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label class="control-label col-md-3">Video Upload</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                        <span class="btn green-soft btn-outline btn-file">
                        <input type="text" name="video"> </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Title</label>
                                            <input class="form-control text-capitalize" placeholder="Title" type="text" required name="title">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Description</label>
                                            <input class="form-control text-capitalize" placeholder="Description" type="text" required name="description">
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
