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
							{{ Form::open(array('url' => 'admin/savewishcategoryedit', 'method' => 'post','class'=>'profile form-horizontal','enctype'=>'multipart/form-data')) }}

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
											{{ Form::label('Product Image') }}
											{{ Form::text('product_image', $categorydata->product_image ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('product_image')  }} </span>
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
											{{ Form::label('Price + Shipping') }}
											{{ Form::text('price_shipping', $categorydata->price_shipping ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('price_shipping')  }} </span>
										</div>
                    <div class="col-md-12 col-xs-12 field">
											{{ Form::label('Currency') }}
											{{ Form::text('currency', $categorydata->currency ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('currency')  }} </span>
										</div>
                    <div class="col-md-12 col-xs-12 field">
											{{ Form::label('Maximum Delivery') }}
											{{ Form::text('minimum_delivery', $categorydata->minimum_delivery ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('minimum_delivery')  }} </span>
										</div>
                    <div class="col-md-12 col-xs-12 field">
											{{ Form::label('Minium Delivery') }}
											{{ Form::text('minimum_delivery', $categorydata->minimum_delivery ,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('minimum_delivery')  }} </span>
										</div>

										<div class="clearfix"></div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Delivery Difference') }}
											{{ Form::text('delivery_difference', $categorydata->delivery_difference, array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('delivery_difference') }} </span>
										</div>

										<div class="clearfix"></div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Estimated Arrival') }}
											{{ Form::text('estimated_arrival',$categorydata->estimated_arrival,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('estimated_arrival') }} </span>
										</div>

                    <div class="clearfix"></div>
										<div class="col-md-12 col-xs-12 field">
											{{ Form::label('Product Rating') }}
											{{ Form::text('product_rating',$categorydata->product_rating,array('class'=>'form-control','placeholder'=>'')) }}
											<span class="error"> {{ $errors->first('product_rating') }} </span>
										</div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Product Rating Count') }}
                      {{ Form::text('product_rating_count',$categorydata->product_rating_count,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('product_rating_count') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Total Inventory') }}
                      {{ Form::text('total_inventory',$categorydata->total_inventory,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('total_inventory') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Orders') }}
                      {{ Form::text('orders',$categorydata->orders,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('orders') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Shipping Badge') }}
                      {{ Form::text('shipping_badge',$categorydata->shipping_badge,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('shipping_badge') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Size Rating Count') }}
                      {{ Form::text('size_rating_count',$categorydata->size_rating_count,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('size_rating_count') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Rating too Small') }}
                      {{ Form::text('rating_to_small',$categorydata->rating_to_small,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('rating_to_small') }} </span>
                    </div>


                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Rating Just Right') }}
                      {{ Form::text('rating_just_right',$categorydata->rating_just_right,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('rating_just_right') }} </span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Rating too big') }}
                      {{ Form::text('rating_too_big',$categorydata->rating_too_big,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('rating_too_big') }} </span>
                    </div>
										<div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Description') }}
                      {{ Form::text('description',$categorydata->description,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('description') }} </span>
                    </div>
										<div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Keywords') }}
                      {{ Form::text('keywords',$categorydata->keywords,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('keywords') }} </span>
                    </div>
										<div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Verified by wishstore') }}
                      {{ Form::text('verified_by_wishstore',$categorydata->verified_by_wishstore,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('verified_by_wishstore') }} </span>
                    </div>
										<div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Store') }}
                      {{ Form::text('store',$categorydata->store,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('store') }} </span>
                    </div>
										<div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Store Link') }}
                      {{ Form::text('store_link',$categorydata->store_link,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('store_link') }} </span>
                    </div>
										<div class="clearfix"></div>
                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Store Rating') }}
                      {{ Form::text('store_rating',$categorydata->store_rating,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('store_rating') }} </span>
                    </div>
										<div class="clearfix"></div>

                    <div class="col-md-12 col-xs-12 field">
                      {{ Form::label('Store Rating Count') }}
                      {{ Form::text('store_rating_count',$categorydata->store_rating_count,array('class'=>'form-control','placeholder'=>'')) }}
                      <span class="error"> {{ $errors->first('store_rating_count') }} </span>
                    </div>
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
