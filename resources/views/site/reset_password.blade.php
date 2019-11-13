@extends('site.layouts.masterlogin')
@section('pageTitle', 'drspy')
@section('pageDescription', 'Magento Register')
@section('content')
@include('site.common_frontend.header')
<div class="login-form">
  <div class="login-wraper">
  <div class="container">
    <div class="row">
	  <div class="col-12 login_box_new">
    <div class="login-cont">
      <div class="login-text">
      <div class="panel-register">
        <div class="form-title">Reset Password</div>

              <div class="login-box-body">
                 @if(!$flag)

                {{ Form::open(array('url' => 'save-reset-password', 'method' => 'post')) }}

                        <div class="form-group has-feedback">
                            {{ Form::password('password',array('class'=>'form-control','placeholder'=>'Password','required'=>'')) }}
                            <span class="glyphicon glyphicon-lock
                            form-control-feedback"></span>
                            <span class="error" >  {{ $errors->first('password')  }} </span>
                        </div>
                        <div class="form-group has-feedback">
                            {{ Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>'Confirm Password','required'=>'')) }}
                            <span class="glyphicon glyphicon-lock
                            form-control-feedback"></span>
                            <span class="error" >  {{ $errors->first('password_confirmation')  }} </span>
                        </div>


        @if($token !='' )
        <input name="password_token"  value="{{$token}}" type="hidden">
        @endif
        <input name="email"  value="{{$email}}" type="hidden">
        <div id="button_reset_submit">

                {{ Form::submit('Submit',array('class'=>'btn btn-primary btn-block btn-flat')) }}


        </div>
        {{ Form::close() }}

        @else
        <h3 style="color:red"> Your Link has been expired. </h3>

        @endif

      </div>
      </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>
</div>
@include('site.common_frontend.footer')
@stop
