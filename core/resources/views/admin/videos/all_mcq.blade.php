@extends('master')
@section('site-title')
    All Questions For [ {{ $video_details->title }} ]
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title uppercase bold"> All Questions For [ {{ $video_details->title }} ]
                <a class="btn blue-dark btn-md pull-right" data-toggle="modal" href="#basic">
                    <i class="fa fa-plus"></i>   ADD QUESTION
                </a> 
            </h3 >
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
                                <i class="fa fa-road"></i>Questions
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-scrollable table-bordered table-hover" id="awards">
                                    <thead>
                                    <tr>                                        
                                        <th>Question</th>
                                        <th>Option 1</th>
                                        <th>Option 2</th>
                                        <th>Option 3</th>
                                        <th>Option 4</th>
                                        <th>Marks</th>
                                        <th style="text-align: center"> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($question as $all_question)
                                     <tr>
                                      <td>{{ $all_question->question }}</td>  
                                      <td>{{ $all_question->option_1 }}</td>  
                                      <td>{{ $all_question->option_2 }}</td>  
                                      <td>{{ $all_question->option_3 }}</td>  
                                      <td>{{ $all_question->option_4 }}</td>  
                                      <td>{{ $all_question->marks }}</td>  
                                     
                                       <td>
                                      
                                        <a class="btn green-meadow" data-toggle="modal" href="#basic-edit{{$all_question->id}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="btn red"  data-toggle="modal" href="#deleteModal{{$all_question->id}}"><i class="fa fa-trash"></i></a>
                                      </td>
                                     </tr>

                                     <div id="deleteModal{{$all_question->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-content">
                                                <form role="form" action="{{route('video_mcq.delete', $all_question->id)}}" method="post">
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

                    <div id="basic-edit{{$all_question->id}}" class="modal fade" style="width:90% !important;" tabindex="-1" data-backdrop="static" data-keyboard="false">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Edit Question</h4>
                            </div>

                            <form class="form-horizontal" role="form" method="POST" action="{{route('edit.video.mcq')}}" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <input type="hidden" required  value="{{ $video_details->id }}" name="vdo_id">
                                <input type="hidden" required  value="{{ $all_question->id }}" name="id">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Question</label>
                                            <input class="form-control" placeholder="Type Question" type="text" required name="question" value="{{ $all_question->question }}">
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="control-label">Option 1</label>
                                            <input class="form-control" placeholder="Option 1" type="text" required name="option_1" value="{{ $all_question->option_1 }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="control-label">Option 2</label>
                                            <input class="form-control" placeholder="Option 2" type="text" required name="option_2" value="{{ $all_question->option_2 }}">
                                        </div>
                                    </div>
                                </div>


                                 <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="control-label">Option 3</label>
                                            <input class="form-control" placeholder="Option 3" type="text" required name="option_3" value="{{ $all_question->option_3 }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="control-label">Option 4</label>
                                            <input class="form-control" placeholder="Option 4" type="text" required name="option_4" value="{{ $all_question->option_4 }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="control-label">Correct Option</label>
                                            <select class="form-control" name="correct_option">
                                             <option value="{{ $all_question->correct_option }}">Option {{ $all_question->correct_option }}</option>
                                             <option value="1">Option 1</option>
                                             <option value="2">Option 2</option>
                                             <option value="3">Option 3</option>
                                             <option value="4">Option 4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="control-label">Marks</label>
                                            <input class="form-control" placeholder="Marks" type="number" required name="marks" value="{{ $all_question->marks }}">
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


                <div id="basic" class="modal fade" style="width:90% !important;" tabindex="-1" data-backdrop="static" data-keyboard="false">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add New Question</h4>
                            </div>

                            <form class="form-horizontal" role="form" method="POST" action="{{route('add.video.mcq')}}" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <input type="hidden" required  value="{{ $video_details->id }}" name="vdo_id">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Question</label>
                                            <input class="form-control" placeholder="Type Question" type="text" required name="question">
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="control-label">Option 1</label>
                                            <input class="form-control" placeholder="Option 1" type="text" required name="option_1">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="control-label">Option 2</label>
                                            <input class="form-control" placeholder="Option 2" type="text" required name="option_2">
                                        </div>
                                    </div>
                                </div>


                                 <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="control-label">Option 3</label>
                                            <input class="form-control" placeholder="Option 3" type="text" required name="option_3">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="control-label">Option 4</label>
                                            <input class="form-control" placeholder="Option 4" type="text" required name="option_4">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="control-label">Correct Option</label>
                                            <select class="form-control" name="correct_option">
                                             <option value="1">Option 1</option>
                                             <option value="2">Option 2</option>
                                             <option value="3">Option 3</option>
                                             <option value="4">Option 4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="control-label">Marks</label>
                                            <input class="form-control" placeholder="Marks" type="number" required name="marks">
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
