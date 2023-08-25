@extends('master')
@section('site-title')
    News
@endsection

@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title uppercase bold"> News
                <a class="btn dark btn-md pull-right" href="{{route('sub.blog.create.admin')}}">
                    <i class="fa fa-plus"></i>   ADD NEW
                </a>
            </h3>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-list font-green"></i>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> News Image</th>
                                    <th> News Title </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blog as $data)
                                    <tr>
                                        <td><img style="height: 80px" src="{{asset('assets/blog_images/'. $data->image)}}"></td>
                                        <td><h3 class="bold">{{$data->title}}</h3> </td>
                                        <td>
                                            <a class="btn blue" href="{{route('sub.edit.blog.admin', $data->id)}}"><i class="fas fa-pen-square"></i></a>
                                            <a class="btn red"  data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-content">
                                            <form role="form" action="{{route('sub.blog.delete', $data->id)}}" method="post">
                                                {{csrf_field()}}
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <button type="submit" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{$blog->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection