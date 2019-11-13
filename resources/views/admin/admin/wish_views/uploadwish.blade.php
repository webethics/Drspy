@extends('admin.layouts.master')
@section('content')
  <div class="wrapper">
    <!-- Main Header -->
    @include('admin.common.admin_header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.common.sidebar')
    <div class="content-wrapper">
      <!-- Main content -->
      <style>
      i.fa.fa-download {
          float: right;
          font-size: 30px;
      }
      </style>



         <section class="content usr-contnt">

           <div class="row">

             <!--a href="#" data-toggle="modal" data-target="#signup-next" data-dismiss="modal" class="loginmodal-submit">Next</a-->
             <div class="col-lg-12">
               <div class="box box-primary">
                 <div class="box-body">
                   @if(session()->has('message.level'))
                  <div class="alert alert-{{ session('message.level') }}">
                  {!! session('message.content') !!}
                  </div>
                @endif


                      @if(count($errors) > 0)
                       <div class="alert alert-danger">
                        Upload Validation Error<br><br>
                        <ul>
                         @foreach($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                        </ul>
                       </div>
                      @endif

                   @if($message = Session::get('success'))
                   <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>{{ $message }}</strong>
                   </div>
                   @endif
                   @if(Session::has('success'))
                     <div class="success-msg">
                        {{Session::get('success')}}
                     </div>
                       @endif
                   <div class ="user_profile" style="margin-bottom:30px">
                     <h2 >Upload Files</h2>
                     <a class="mr-1 edit" href="/admin/download_json" data-toggle="tooltip" title="downloadSample"><i class="fa fa-download" aria-hidden="true"></i></a>
                   </div>



                   {{ Form::open(array('url' => '/admin/import-excel/import1', 'id' => 'package_form' , 'method' => 'post','class'=>'profile form-horizontal','enctype'=>'multipart/form-data')) }}
                   <div class="form-group col-md-12">
                     <div class="row">
                       <div class="col-md-8 row col-xs-12">
                          <div class="col-md-12 col-xs-12 field">
                            {{ Form::label('Please Select ') }}
        									  <select class="form-control" id="extention_type" name="extention_type">
        										  <option value="" disabled>Select Extention</option>
                              <option value="wish-bestseller">Wish Best Seller</option>
                              <option value="wish-newtrending">New Trending Products</option>
        									  </select>
                            <span class="error"> {{ $errors->first('package_name')  }} </span>
                          </div>
                          <div class="col-md-12 col-xs-12 field">
                            {{ Form::label('Select File for Upload') }}
                            {{ Form::file('select_file',array('id'=>'select_file', 'class'=>'form-control')) }}
                            <span class="error"> {{ $errors->first('select_file')  }} </span>
                          </div>
                          <div class="clearfix"></div>
                       </div>
                     </div>
                   </div>
                   <div class="form-group col-md-12">
                      <div class="sign-up-btn ">
                        <input class="loginmodal-submit btn btn-primary" value="Upload" type="submit">
                        <a href="{{url('admin/upload-wish-csv')}}" name="back" class="loginmodal-submit btn btn-primary" id="profile_back" value="Back" type="submit">Back</a>
                     </div>
                   </div>
                       {{ Form::close() }}
               </div>
             </div>
           </div>
         </div>
       </div>
      </section>


@endsection
