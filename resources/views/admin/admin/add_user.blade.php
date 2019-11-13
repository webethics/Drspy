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

					<div class="box box-primary">
						<div class="box-body">
							@if(Session::has('success'))
								<div class="success-msg">
								   {{Session::get('success')}}
								</div>
					        @endif
							@if(Session::has('error'))
								<div class="error-msg">
								   {{Session::get('error')}}
								</div>
					        @endif
							<div class="col-lg-7">
							<div class ="user_profile" style="margin-bottom:30px">
								<h2 >Add New User</h2>
							</div>

							{{ Form::open(array('url' => 'admin/user/admin-save-user', 'method' => 'post','class'=>'profile form-horizontal','enctype'=>'multipart/form-data')) }}
							<div class="form-group col-md-12">
								<div class="row">
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('First Name') }}
											{{ Form::text('first_name','',array('class'=>'form-control','placeholder'=>'First Name')) }}
											<span class="error"> {{ $errors->first('first_name')  }} </span>
										</div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Last Name') }}
											{{ Form::text('last_name','',array('class'=>'form-control','placeholder'=>'Last Name')) }}
											<span class="error"> {{ $errors->first('last_name')  }} </span>
										</div>

										<div class="clearfix"></div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Contact Email') }}
											{{ Form::text('email','',array('id'=>'user_email','class'=>'form-control','placeholder'=>'Email')) }}
											<span class="error"> {{ $errors->first('email') }} </span>
										</div>
										<div class="col-md-12 col-xs-12 field">
												{{ Form::label('Password') }}
												{{ Form::password('password',array('class'=>'form-control','placeholder'=>'Password')) }}
												<span class="error" >  {{ $errors->first('password')  }} </span>
										</div>
										<div class="col-md-12 col-xs-12 field">
												{{ Form::label('Confirm Password') }}
												{{ Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>'Confirm Password')) }}
												<span class="error" >  {{ $errors->first('password_confirmation')  }} </span>
										</div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Address') }}
											{{ Form::text('address','',array('class'=>'form-control','placeholder'=>'Address')) }}
											<span class="error"> {{ $errors->first('address') }} </span>
										</div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('User Type') }}
                      {!! Form::select('user_type', array('admin' => 'Admin', 'User' => 'User'), 'Admin'); !!}
                      <span class="error"> {{ $errors->first('user_type') }} </span>
                    </div>
										<div class="clearfix"></div>
								</div>
							</div>

							<div class="form-group col-md-12">
								 <div class="sign-up-btn ">
									 <input name="login" class="loginmodal-submit btn btn-primary" id="profile_update" value="Add User" type="submit">
									 <a href="{{url('admin/users-details')}}" name="back" class="loginmodal-submit btn btn-primary" id="profile_back" value="Back" type="submit">Back</a>
								</div>
							</div>
								  {{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
 @stop
