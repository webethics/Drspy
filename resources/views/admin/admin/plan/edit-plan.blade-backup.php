@extends('admin.layouts.master')
@section('content')
  <div class="wrapper">
  <!-- Main Header -->
  @include('admin.common.admin_header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.common.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{--- @include('admin.common.breadcrumb') ----}}
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="box box-primary">
          <div class="box-body">
            <div class="main_container">
              @if(session()->has('message.level'))
                  <div class="alert alert-{{ session('message.level') }}">
                  {!! session('message.content') !!}
                  </div>
              @endif
            </div>
						@if(Session::has('success'))
              <div class="success-msg">
                {{ Session::get('success') }}
              </div>
						@endif
            @if(Session::has('error'))
              <div class="success-msg">
            	  {{ Session::get('error') }}
              </div>
            @endif
            <div>
              {{ Form::open(array('url' => 'admin/plan/edit-submit-plan', 'method' => 'post','class'=>'profile form-horizontal','enctype'=>'multipart/form-data')) }}
             <div class="form-group col-md-12">
               <div class="row">
                    <?php foreach ($user_details as $key => $value): 
							//~ pr($value, 1);
                    ?>
                       <div class="col-md-12 col-xs-12 field">
                         <input type="hidden" name="plan_id" value="{{$value->id}}">
                         {{ Form::label('Plan name') }}
                         {{ Form::text('plan_name',$value->plan_name,array('class'=>'form-control','placeholder'=>'Plan Name')) }}
                         <span class="error"> {{ $errors->first('plan_name')  }} </span>
                       </div>
<!--
                       <div class="col-md-12 col-xs-12 field">
                          {{ Form::label('Product Save') }}
                          {{ Form::text('Productsave',$value->Productsave,array('class'=>'form-control','placeholder'=>'Plan Save')) }}
                         <span class="error"> {{ $errors->first('Productsave')  }} </span>
                       </div>
                       <div class="col-md-12 col-xs-12 field">
                          {{ Form::label('Video') }}
                          <div class="col-sm-6 col-xl-3 col-lg-4">
                           	<input class="styled-checkbox"  type="checkbox" value="yes" data-name="video" name="video" <?php //if($value->video == 'yes') echo 'checked="checked"'; ?>>
                         </div>
                         <span class="error"> {{ $errors->first('video')  }} </span>
                       </div>
                       <div class="col-md-12 col-xs-12 field">
                          {{ Form::label('BrandName') }}
                          <div class="col-sm-6 col-xl-3 col-lg-4">
                           	<input class="styled-checkbox"  type="checkbox" value="yes" data-name="brandname" name="brandname" <?php// if($value->brandname == 'yes') echo 'checked="checked"'; ?>>
                         </div>
                         <span class="error"> {{ $errors->first('brandname')  }} </span>
                       </div>
                       <div class="col-md-12 col-xs-12 field">
                          {{ Form::label('Ship From Country') }}
                          <div class="col-sm-6 col-xl-3 col-lg-4">
                           	<input class="styled-checkbox"  type="checkbox" value="yes" data-name="shipfromcountry" name="shipfromcountry" <?php //if($value->shipfromcountry == 'yes') echo 'checked="checked"'; ?>>
                         </div>
                         <span class="error"> {{ $errors->first('shipfromcountry')  }} </span>
                       </div>
                       <div class="col-md-12 col-xs-12 field">
                          {{ Form::label('Ad') }}
                          <div class="col-sm-6 col-xl-3 col-lg-4">
                           	<input class="styled-checkbox"  type="checkbox" value="yes" data-name="Ad" name="Ad" <?php// if($value->Ad == 'yes') echo 'checked="checked"'; ?>>
                         </div>
                         <span class="error"> {{ $errors->first('Ad')  }} </span>
                       </div>
                       <div class="col-md-12 col-xs-12 field">
                          {{ Form::label('Adlink') }}
                          <div class="col-sm-6 col-xl-3 col-lg-4">
                           	<input class="styled-checkbox"  type="checkbox" value="yes" data-name="Adlink" name="Adlink" <?php //if($value->Adlink == 'yes') echo 'checked="checked"'; ?>>
                         </div>
                         <span class="error"> {{ $errors->first('Adlink')  }} </span>
                       </div>
-->

                     <?php endforeach; ?>
                   <div class="clearfix"></div>
               </div>
             </div>

             <div class="form-group col-md-12">
                <div class="sign-up-btn ">
                  <input name="submitplan" class="loginmodal-submit btn btn-primary" id="submitplan" value="Add Plan" type="submit">
                  <a href="{{url('admin/plan/manage-plan')}}" name="back" class="loginmodal-submit btn btn-primary" id="profile_back" value="Back" type="submit">Back</a>
               </div>
             </div>
                 {{ Form::close() }}
            </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
    <div class="control-sidebar-bg"></div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@stop
