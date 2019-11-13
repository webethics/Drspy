@extends('site.layouts.masterlogin')
@section('pageTitle', 'drspy')
@section('pageDescription', 'User frontend')
@section('content')
  @include('site.common_frontend.header')
  <style>
    input#profile_update {
        max-width: 100px;
    }
  </style>
<div class="wrapper">
  @include('site.common.sidebar')
  <div class="content-wrapper">
    <div class="col-lg-12">
      <div class="box box-primary">
        <div class="box-body">

          <div class ="user_profile" style="margin-bottom:30px">
            <h2 >Edit User Profile</h2>
          </div>
          @if(session()->has('message.level'))
              <div class="alert alert-{{ session('message.level') }}">
              {!! session('message.content') !!}
              </div>
          @endif

          {{ Form::open(array('url' => '/profile-update', 'method' => 'post','class'=>'profile form-horizontal','enctype'=>'multipart/form-data')) }}
          @foreach($data as $key => $value)
            <div class="form-group col-md-12">
              <div class="row">
                <input type='hidden' name="id" value="{{$value->id}}">
                <div class="col-md-8 row col-xs-12">
                  <div class="col-md-12 col-xs-12 field">
                    {{ Form::label('First Name') }}
                    {{ Form::text('first_name', $value->first_name ,array('class'=>'form-control','placeholder'=>'')) }}
                    <span class="error"> {{ $errors->first('first_name')  }} </span>
                  </div>
                  <div class="col-md-12 col-xs-12 field">
                    {{ Form::label('Last Name') }}
                    {{ Form::text('last_name', $value->last_name ,array('class'=>'form-control','placeholder'=>'')) }}
                    <span class="error"> {{ $errors->first('last_name')  }} </span>
                  </div>

                  <div class="clearfix"></div>
                  <div class="col-md-12 col-xs-12 field">
                    {{ Form::label('Contact Email') }}
                    {{ Form::text('user_email', $value->email  ,array('class'=>'form-control','placeholder'=>'')) }}
                    <span class="error"> {{ $errors->first('email') }} </span>
                  </div>

                  <div class="clearfix"></div>
                  <div class="col-md-12 col-xs-12 field">
                    {{ Form::label('Address') }}
                    {{ Form::text('address', $value->address ,array('class'=>'form-control','placeholder'=>'')) }}
                    <span class="error"> {{ $errors->first('address') }} </span>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          @endforeach
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
@include('site.common_frontend.footer')
@stop
