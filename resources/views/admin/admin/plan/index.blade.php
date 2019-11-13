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

            <h3>Plan Details</h3>

            </div>

            <div class="table-responsive">
            <table id="users" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Plan Name</th>
                  <th>Plan Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
                @foreach($plan_details as $plan)

                  <?php
					$plan_name = $plan->plan_name;
					$plan_id = $plan->id;
                    $planid = $plan->stripeplanid;
                    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                    $plan_details = \Stripe\Plan::retrieve($planid);
                    $plan = $plan_details->__toArray();
                    $amount = $plan['amount'];
                    
                  ?>
                  <tr>
                    <td>{{ $plan_name }}</td>
                    <td> $ {{ $amount }}</td>
                    <td class="action_links">
                      <a href ="{{url('admin/plan/edit')}}/{{$plan_id}}" title="Edit"><i class="fa fa-pencil"></i></a>
                    </td>
                  </tr>
                @endforeach
            </table>
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
