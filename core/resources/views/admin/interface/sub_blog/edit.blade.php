@extends('master')
@section('site-title')
    News Edit
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title uppercase bold"> News Edit
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
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-list font-green"></i>
                                <span class="caption-subject font-black bold uppercase">Update {{$blog->blog_name}}</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form role="form" method="POST" action="{{route('sub.blog.update.admin', $blog->id )}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{method_field('put')}}

                                <div class="form-body">
                                    <div class="form-group">
                                        <label>News Image</label>
                                        <img style="height: 120px" src="{{asset('assets/blog_images/'. $blog->image)}}">
                                        <input type="file" class="form-control" name="image" >

                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control input-lg" name="title" required value="{{$blog->title}}">
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Page Content</label>
                                        <textarea name="description" class="form-control" rows="10">{!! $blog->description !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <button type="submit" class="btn blue btn-block">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection