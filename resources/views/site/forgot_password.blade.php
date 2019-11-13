@extends('site.layouts.masterlogin')
@section('pageTitle', 'drspy')
@section('pageDescription', 'Forgot page')
@section('content')
<div class="main-container landing">
			 <div class="flex-container">
					 <div class="scalable">

							 <div class="right-container">
									 <div class="life-img">
											 <h2> Forgot Your <br> Password </h2>
									 </div>
							 </div>

							 <div class="left-container">
									 <div class="logo">
											 <img class="img-responsive center-block" src="{{url('frontend-assets/images/logo.png')}}" alt="logo">
									 </div>
									 <div class="custom-form">

											 <div class="custom-txt">
											 </div>
											 @if(session()->has('message.level'))
	                         <div class="alert alert-{{ session('message.level') }}">
	                         {!! session('message.content') !!}
	                         </div>
	                     @endif
											 @if ($errors->any())
	                     <div class="alert alert-danger">
	                       @foreach ($errors->all() as $error){{ $error }}@endforeach
	                     </div>
	                   @endif
										 @if(Session::has('error'))
											 <p class="alert alert-error">{{ Session::get('error') }}</p>
										 @endif
										 @if(Session::has('success'))
											 <p class="alert alert-success">{{ Session::get('success') }}</p>
										 @endif

											 <form class="form-horizontal"  method="post" action="/forgot-password-email">
												 	<input type="hidden" name="_token" value="{{csrf_token()}}">
													 <fieldset>

															 <!-- Text input-->
															 <div class="form-group">
																	 <div class="col-md-12">
																			 <input id="email" name="email" type="text" placeholder="Enter your email" class="form-control input-md" required="">

																	 </div>
															 </div>
															 <!-- Text input-->

															 <!-- Login button -->
															 <div class="submit">
																	 <input type="submit" value="Send" class="btn btn-info btn-block">
															 </div>
															 <p><a href="{{url('/login') }}"> Click here to Login! </a></p>
													 </fieldset>
											 </form>
									 </div>

							 </div>

					 </div>

			 </div>
			 <div id="particles-js"></div>
	 </div>

@stop
