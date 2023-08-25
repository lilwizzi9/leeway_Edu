@extends('fonts.layouts.master')
@section('site')
    | Policy
@endsection
@section('content')
    <!--blog page start-->
    <section class="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-single-page">
                                <div class="content">
                                    <h2 class="text-center">Terms</h2>
                                    <p>{!! $general->policy !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--blog page end-->
@endsection