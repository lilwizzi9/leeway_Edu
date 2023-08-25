@extends('fonts.layouts.master')
@section('site')
    | {{$news->title}}
@endsection
@section('content')
    <!--blog page start-->
    <section class="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-single-page">
                                <div class="post-thumb">
                                    <img style="width: 100%;" src="{{asset('assets/blog_images/'. $news->image)}}" alt="blog single page">
                                </div>
                                <div class="content">
                                    <h4>{{$news->title}}</h4>

                                    <p>{!! $news->description !!}</p>

                                </div>
                                <div class="social-share">
                                    <h4>Share This Post :</h4>
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}">
                                                <i class="icofont icofont-social-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}">
                                                <i class="icofont icofont-social-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://plus.google.com/share?url={{urlencode(url()->current()) }}">
                                                <i class="icofont icofont-social-google-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary">
                                                <i class="icofont icofont-brand-linkedin"></i>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="comments-section">
                                <h2>Comments</h2>
                                <div class="comment-list">
                                    <div id="fb-root"></div>
                                    <script>(function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) return;
                                            js = d.createElement(s); js.id = id;
                                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1421567158073949";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));
                                    </script>
                                    <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
                                </div>

                            </div>

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
                                                <h5 class="mt-0 mb-1"><a href="{{route('news.show.pranto',['id' => $data->id , 'title' => Replace($data->title)])}}"> {{$data->title}}</a> </h5>
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