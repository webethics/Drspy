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
								<h2 >Change Password</h2>
							</div>
							{{ Form::open(array('url' => 'admin/changePassword', 'method' => 'post','class'=>'profile form-horizontal','enctype'=>'multipart/form-data')) }}

							<div class="form-group col-md-12">
								<div class="row">
									<div class="col-md-8 row col-xs-12">
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Old Password') }}
											{{ Form::password('oldpasssword',array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('oldpasssword')  }} </span>
										</div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('New Password') }}
											{{ Form::password('new_password',array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('new_password')  }} </span>
										</div>

										<div class="clearfix"></div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Confirm Password') }}
											{{ Form::password('confirmpassword',array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('confirmpassword') }} </span>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="form-group col-md-12">
								 <div class="sign-up-btn ">
                   <input name="login" class="loginmodal-submit btn btn-primary" id="profile_update" value="Update" type="submit">
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
