@extends('admin.layouts.master')
@section('content')
<style>
 table.dataTable thead tr .sorting:last-child:after{
  display:none !important;
}
</style>

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

							 <div class="msg_sec"></div>
    							<div class="dtable_custom_controls">
                   <table id="filterStatus" cellspacing="5" cellpadding="5" border="0" style="display:inline-block;">
                    <tbody>
                  </table>
                </div>
							  <div class="table-responsive">
								<table id="users" class="table table-bordered table-striped">
								  <thead>
  								  <tr>
    									<th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>User Type</th>
                      <th>Action</th>
				  </tr>
				  </thead>

					@foreach($user_details as $key=>$user)
					  <tr>
						<td>
							<?php
							  $first = $user->first_name;
							  $last = $user->last_name;
							  $name = $first.' '.$last;
							 echo ucwords($name);
							?>
						 </td>
						<td>{{ $user->email }}</td>
						<td>
							<label class="switch">
								@if($user->user_status == "enable")
									<input class="usr_status" id="on_off" data-val="{{ $user->id }}" checked="checked" type="checkbox">
								@else
									<input class="usr_status" id="on_off1" data-val="{{ $user->id }}" type="checkbox">
								@endif
								<span class="slider round"></span>
							</label>
						  </td>
						  <td> {{ $user->user_type }} </td>
<!--
						  <td>
							  <?php $date = explode(" ", $user->created_at); $timestamp = strtotime($date[0]); ?>
							  {{date('d M Y', $timestamp)}}
						  </td>
-->
						  <td class="action_links">
								<a href ="{{url('admin/user/edit')}}/{{$user->id}}" title="Edit"><i class="fa fa-pencil"></i></a>
								<a href ="{{url('admin/deleteuser')}}/{{$user->id}}"  onclick="return confirm('Are you sure!')" title="Delete"><i class="fa fa-trash-o"></i></a>
							</td>
				  </tr>
				  @endforeach
				</table>
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
<script type="text/javascript">
 $('#users').DataTable();
$(".usr_status").change(function(){

        $(".success-msg").hide();
        $(".erorr-msg").hide();
        if($(this).data('val')!=""){
            var u_id = $(this).data('val');
            var usr_tokn = $('input[name="_token"]').val();

            var ajax_url = "";
            var ustatus = "";
            if($(this).prop("checked") == true){
                ajax_url = "/admin/user/enableuser/"+u_id;
                ustatus = "enable";
            }else{
                ajax_url = "/admin/user/disableuser/"+u_id;
                ustatus = "disable";
            }

            $.ajax({
                type: "POST",
                url: ajax_url,
                data:{'_token':usr_tokn, 'usatatus':ustatus},
                success: function (response) {
                    var data = JSON.parse(response);
                    console.log(data.status);
                    if(data.status == "success"){
                        $(".msg_sec").html('<div class="success-msg">User Status '+ustatus+' Successfully.</div>')
                    }else{
                        $(".msg_sec").html('<div class="success-msg">Something went wrong status was not updated .</div>')
                    }

                    $(".msg_sec").show();
                }
            });
        }
    });
</script>
    @stop
