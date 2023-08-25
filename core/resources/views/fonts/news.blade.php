@extends('fonts.layouts.master')
@section('site')
    | Blog
@endsection
@section('content')
    <!--blog page start-->
    <section class="blog-page">
        <div class="container">
            <br>
            <div class="row">
                <h2 style="border-bottom: 1px solid #cec9c9;"><strong>News</strong></h2>

            </div>
            <br>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        @php
                            $c = 0;
                        @endphp
                        @foreach($news as $data)
                            @php
                                if ($c == 0){
                                echo '<div class="row">';
                                }
                            @endphp
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="thumb">
                                    <img src="{{asset('assets/blog_images/'. $data->image)}}" alt="blog post">
                                </div>
                                <div class="content">
                                    <a href="{{route('news.show.pranto',['id' => $data->id , 'title' => Replace($data->title)])}}">
                                        <h4>{{$data->title}}</h4>
                                    </a>
                                    <p>{{Short_Text($data->description,50)}}</p>
                                    <a href="{{route('news.show.pranto',['id' => $data->id , 'title' => Replace($data->title)])}}">View more <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>

                                </div>

                            </div>
                        </div>
                            @php
                                $c++;
                                    if ($c == 2){
                                    echo '</div>';
                                    $c = 0;}
                            @endphp

                        @endforeach


                    </div>
                    <div class="row ">
                        <div class="col-lg-12 text-center ">
                            <ul class="page-navigation">
                                {{$news->links()}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">

                        <div class="widget category">
                            <div class="widget-title">
                                <h4>Related Post</h4>
                            </div>
                            <div class="widget-body">
                                <ul>
                                    @foreach($last_first as $data)
                                    <li><a href="{{route('news.show.pranto',['id' => $data->id , 'title' => Replace($data->title)])}}"><i class="icofont icofont-arrow-right"></i>  {{$data->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget popular-post">
                            <div class="widget-title">
                                <h4>Popular Post</h4>
                            </div>
                            <div class="widget-body">
                                <ul class="list-unstyled">
                                   @foreach($first_last as $data)
                                    <li class="media my-4">
                                        <img style="height: 50px;margin-top: 5px;" class="d-flex mr-3 " src="{{asset('assets/blog_images/'. $data->image)}}">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1"><a href="{{route('news.show.pranto',['id' => $data->id , 'title' => Replace($data->title)])}}">{{$data->title}} </a></h5>
                                        </div>
                                    </li>
                                   @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--blog page end-->
@endsection