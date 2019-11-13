@extends('admin.layouts.master')
@section('content')
    <div class="wrapper">
      <!-- Main Header -->
     @include('admin.common.admin_header')
      <!-- Left side column. contains the logo and sidebar -->
      @include('admin.common.sidebar')
        @include('admin.common.confirm')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       @include('admin.common.breadcrumb')
        <!-- Main content -->

		<section class="content usr-contnt">
			<div class="row">
				<!--a href="#" data-toggle="modal" data-target="#signup-next" data-dismiss="modal" class="loginmodal-submit">Next</a-->
				<div class="col-lg-12">
					<div class="box box-primary">
						<div class="box-body">
							@if(Session::has('success'))
								<div class="success-msg">
								   {{Session::get('success')}}
								</div>
					        @endif
							<div class ="user_profile" style="margin-bottom:30px">
								<h2 >Edit User Profile</h2>
							</div>
							{{ Form::open(array('url' => 'admin/user/admin-user-edit', 'method' => 'post','class'=>'profile form-horizontal','enctype'=>'multipart/form-data')) }}

							@foreach($result as $user_data)
							<div class="form-group col-md-12">
								<div class="row">
									<div class="col-md-8 row col-xs-12">
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('First Name') }}
											{{ Form::text('first_name', $user_data->first_name ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('first_name')  }} </span>
										</div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Last Name') }}
											{{ Form::text('last_name', $user_data->last_name ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('last_name')  }} </span>
										</div>

										<div class="clearfix"></div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Contact Email') }}
											{{ Form::text('user_email',$user_data->email,array('class'=>'form-control','placeholder'=>'','readonly' => 'true')) }}
											<span class="error"> {{ $errors->first('email') }} </span>
										</div>

										<div class="clearfix"></div>
<!--
										
-->
									</div>
								</div>
							</div>
							<div class="form-group col-md-12">
								 <div class="sign-up-btn ">
									<input type="hidden" value="{{$user_data->id}}" name="user_edit_id" id="user_edit_id" >
									 <input name="login" class="loginmodal-submit btn btn-primary" id="profile_update" value="Update" type="submit">
									 <a href="{{url('/admin/users-details')}}" name="back" class="loginmodal-submit btn btn-primary" id="profile_back" value="Back" type="submit">Back</a>
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

    @stop
