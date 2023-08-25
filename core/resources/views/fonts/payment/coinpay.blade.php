@extends('fonts.layouts.user')
@section('main-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box dark">
						<div class="portlet-title">
							<div class="caption uppercase bold"><i class="fa fa-plus"></i> Coin Payment</div>
						</div>
						<div class="portlet-body">
							<div class="row">
				<div class="col-md-12">
					<div class="about-us-content">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-inverse">
									<div class="panel-heading">
										<h3 class="panel-title">Confirm Buy {{$general->cur}}</h3>
									</div>
										<div class="panel-body">

										<div  class="col-md-8 col-md-offset-2 text-center">
											<h1><img src="{{ asset('assets/images/fontend_logo/logo.png') }}" width="100px">USD {{$amon}}
											<i class="fa fa-arrow-circle-right" aria-hidden="true"></i> {{ $bcoin }}</h1>
									    	<b style="color: red;"> Minimum 3 Confirmation Required to Credited Your Account.<br/>(It May Take Upto 2 to 24 Hours)</b>
										    <br/>
									    </div>
										<div class="row">
										  <div class="col-sm-4"></div>
										  <div class="col-sm-4">	<p>{!! $form !!}</p></div>
										  <div class="col-sm-4"></div>
										</div>


										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection