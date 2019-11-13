@extends('admin.layouts.master')
@section('content')
    <div class="wrapper">
      <!-- Main Header -->
     @include('admin.common.admin_header')
      <!-- Left side column. contains the logo and sidebar -->
      @include('admin.common.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	@include('admin.common.breadcrumb')
        <!-- Main content -->

		<section class="content usr-contnt">
			<div class="row">

				<div class="col-lg-12">
					<div class="box box-primary">
						<div class="box-body">
							@if(Session::has('success'))
								<div class="success-msg">
								   {{Session::get('success')}}
								</div>
					        @endif
					        @foreach($result as $data)
							<div class ="user_profile" style="margin-bottom:30px">
								<h2 >{{ $data->title }}</h2>
							</div>

							{{ Form::open(array('url' => 'admin/pages/update', 'method' => 'post','class'=>'profile form-horizontal')) }}


							<div class="form-group col-md-12">
								<div class="row">
									<div class="col-md-8 row col-xs-12">
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('title') }}
											{{ Form::text('title',$data->title,array('id'=>'subject','class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('title')  }} </span>
										</div>
										<div class="clearfix"></div>
										
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Description') }}
											{{ Form::textarea('description',$data->description,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('description')  }} </span>

										</div>

										<div class="clearfix"></div>




									</div>

								</div>
							</div>


							<div class="form-group col-md-12">
								 <div class="sign-up-btn ">
									<input type="hidden" value="{{$data->id}}" name="page_content_id" id="page_content_id" >
									 <input name="login" class="loginmodal-submit btn btn-primary" id="profile_update" value="Update" type="submit">
									 <a href="{{url('admin/pages')}}" name="back" class="loginmodal-submit btn btn-primary" id="profile_back" value="Back" type="submit">Back</a>
								</div>
							</div>
							@endforeach
								  {{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<!-- <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script> -->
    <script>
        CKEDITOR.replace( 'description',{
    allowedContent: true
} );
    </script>
    @stop
