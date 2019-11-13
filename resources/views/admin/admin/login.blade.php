@extends('admin.layouts.masterlogin')
@section('content')
<style>
.navbar, .skin-blue .main-header .navbar {
    background: #248afd;
}
.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.login_error {
  border: 1px solid red !important;
}
.container {
    max-width: 100%;
}
.form-title {
	text-align:center;
}
.form-title {
    font-size: 20px;
    margin-bottom: 20px;
}
.wrapper {
	background-color: #feffff !important;
}
footer {
	background-image: url(https://panel.mage2go.com/frontend-assets/assets/frontend/images/footer-bg.png);
background-repeat: repeat;
padding-top: 2px;
margin-top: auto;
position: fixed;
padding: 15px 0;
left: 0;
right: 0;
bottom: 0;
}
.navbar-toggle {
    color: rgb(255, 255, 255);
    border-width: 0px;
    border-style: initial;
    border-color: initial;
    border-image: initial;
    margin: 0px;
    padding: 15px;
}
.login-form {
    max-width: 725px;
    margin: 0px auto;
    box-shadow: 0 0 40px 0 rgba(0,0,0,0.15);
    width: 100%;
    padding: 30px;
}
.navbar {
    position: relative;
    min-height: 50px;
    margin-bottom: 20px;
    border: 1px solid transparent;
}
footer p {
    text-align: center;
    color: #e7e7e7;
    margin: 0;
}
}
</style>
<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <!-- button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button -->
          <a class="navbar-brand" href="{{url('/admin')}}">Drspy</a>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
<div class="login-wraper">
	<div class="container">
		<div class="row">
		 <div class="login-cont">

<div class="col-md-12">
<div class="login-form">
			<div class="login-text">
			<div class="form-title">Admin Panel</div>
			  <!-- /.login-logo -->

				 @if(Session::has('error'))
						<p class="alert alert-error">{{ Session::get('error') }}</p>
				 @endif
					{{ Form::open(array('url' => 'admin/checklogin','method' => 'post')) }}
					   <div class="form-group has-feedback">
							{{ Form::text('email', '',array('id'=>'email','class'=>'email form-control','placeholder'=>'Email','required'=>'','autocomplete'=>"off")) }}
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							<span class="error" >  {{ $errors->first('email')  }} </span>
						</div>
						<div class="form-group has-feedback">
							{{ Form::password('password',array('class'=>'form-control password','placeholder'=>'Password','required'=>'')) }}
							<span class="glyphicon glyphicon-lock
							form-control-feedback"></span>
							<span class="error" >  {{ $errors->first('password')  }} </span>
						</div>

								{{ Form::submit('Sign In',array('class'=>'btn btn-primary submit_btn btn-block btn-flat')) }}

				{{ Form::close() }}
			</div>
		</div>

		</div>
		</div>
	</div>
</div>
</div>


<footer class="footer">
      <div class="container">
        <p>© Copyright 2019. All Rights Reserved</p>
      </div>
    </footer>
    <script>
    $(document).ready(function(e) {

      $(document).on('click', '.submit_btn', function(e) {
        e.preventDefault();
        if($('.email').val() == '') {
          $('.email').addClass('login_error');
          return false;
        }

        if($('.password').val() == '') {
          $('.password').addClass('login_error');
          return false;
        }



        $(this).closest('form').submit();

      })

    })
    </script>
@stop
