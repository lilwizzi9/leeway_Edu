@extends ('fonts.layouts.master')
@section('site')
    | 404
@endsection
@section('content')
    <!-- Breadcrumb Section start -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- breadcrumb Section Start -->
                    <div class="breadcrumb-content">
                        <h2>404 Page</h2>
                    </div>
                    <!-- Breadcrumb section End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <div class="clearfix"></div>

    <section class="error-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="error-thumb">
                        <img style="max-width: 50%;" src="{{asset('assets/images/fontend_logo/logo.png')}}" alt="error">
                        <p>page not found</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="error-content">
                        <h2>Oops... Sorry</h2>
                        <a href="{{url('/')}}"><i class="fa fa-arrow-left"></i>go to our homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>
@endsection