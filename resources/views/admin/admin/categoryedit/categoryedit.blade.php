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
<style>
.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
    background-color: #00a65a !important;
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
							<div class ="user_profile" style="margin-bottom:30px">
								<h2 >Edit User Profile</h2>
							</div>
							{{ Form::open(array('url' => 'admin/savecategoryedit', 'method' => 'post','class'=>'profile form-horizontal','enctype'=>'multipart/form-data')) }}

							@foreach($categorydata as $categorydata)

							<div class="form-group col-md-12">
								<div class="row">
									<div class="col-md-8 row col-xs-12">
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Product Id') }}
											{{ Form::text('product_id', $categorydata->product_id ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('product_id')  }} </span>
										</div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Product Link') }}
											{{ Form::text('product_link', $categorydata->product_link ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('product_link')  }} </span>
										</div>
                    <div class="col-md-12 col-xs-12 field">
											{{ Form::label('Brand Name') }}
											{{ Form::text('brand_name', $categorydata->brand_name ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('brand_name')  }} </span>
										</div>
                    <div class="col-md-12 col-xs-12 field">
											{{ Form::label('Title') }}
											{{ Form::text('title', $categorydata->title ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('title')  }} </span>
										</div>
                    <div class="col-md-12 col-xs-12 field">
											{{ Form::label('Price') }}
											{{ Form::text('price', $categorydata->price ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('price')  }} </span>
										</div>
                    <div class="col-md-12 col-xs-12 field">
											{{ Form::label('Video') }}
											{{ Form::text('video', $categorydata->video ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('video')  }} </span>
										</div>
                    <div class="col-md-12 col-xs-12 field">
											{{ Form::label('Ship From Country') }}
											{{ Form::text('ship_from_country', $categorydata->ship_from_country ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('ship_from_country')  }} </span>
										</div>
                    <div class="col-md-12 col-xs-12 field">
											{{ Form::label('Epacket') }}
											{{ Form::text('epacket', $categorydata->epacket ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('epacket')  }} </span>
										</div>
                    <div class="col-md-12 col-xs-12 field">
											{{ Form::label('Orders') }}
											{{ Form::text('orders', $categorydata->orders ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('orders')  }} </span>
										</div>
                    <div class="col-md-12 col-xs-12 field">
											{{ Form::label('Epacket Delivery') }}
											{{ Form::text('epacketdelivery', $categorydata->epacketdelivery ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('epacketdelivery')  }} </span>
										</div>

										<div class="clearfix"></div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Rating') }}
											{{ Form::text('rating',$categorydata->rating,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('rating') }} </span>
										</div>

										<div class="clearfix"></div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Reviews') }}
											{{ Form::text('reviews',$categorydata->reviews,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('reviews') }} </span>
										</div>

                    <div class="clearfix"></div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Store Age') }}
											{{ Form::text('store_age',$categorydata->store_age,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('store_age') }} </span>
										</div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Wishes') }}
                      {{ Form::text('wishes',$categorydata->wishes,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('wishes') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Cashback') }}
                      {{ Form::text('cashback',$categorydata->cashback,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('cashback') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Estimated Monthly Sales') }}
                      {{ Form::text('estimated_monthly_sales',$categorydata->estimated_monthly_sales,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('estimated_monthly_sales') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Estimated Monthly Revenue') }}
                      {{ Form::text('estimated_monthly_revenue',$categorydata->estimated_monthly_revenue,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('estimated_monthly_revenue') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Keywords') }}
                      {{ Form::text('keywords',$categorydata->keywords,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('keywords') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Store Feedback') }}
                      {{ Form::text('store_feedback',$categorydata->store_feedback,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('store_feedback') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Store Positive Rating') }}
                      {{ Form::text('store_positive_rating',$categorydata->store_positive_rating,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('store_positive_rating') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Store Followers') }}
                      {{ Form::text('store_followers',$categorydata->store_followers,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('store_followers') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Ad') }}
                      {{ Form::text('ad',$categorydata->ad,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('ad') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Ad link') }}
                      {{ Form::text('ad_link',$categorydata->ad_link,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('ad_link') }} </span>
                    </div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="form-group col-md-12">
								 <div class="sign-up-btn ">
									  <input type="hidden" value="{{$categorydata->maincategory_id}}" name="maincategory_id" id="maincategory_id" >
                    <input type="hidden" value="{{$categorydata->id}}" name="id" id="id" >
									  <input name="login" class="loginmodal-submit btn btn-primary" id="profile_update" value="Update" type="submit">
									  <a href="{{URL::previous() }}" name="back" class="loginmodal-submit btn btn-primary" id="profile_back" value="Back" type="submit">Back</a>
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
