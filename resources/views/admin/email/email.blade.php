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
          <div class ="table-title">
                  Email Template
              </div>
          <div class="row">
            	<div class="col-lg-12">
              		  <div class="box box-primary">
                          <!-- /.box-header -->
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
                  <tbody><tr>
                    <td><a href="{{url('admin/email/new')}}" name="back" class="loginmodal-submit btn btn-primary" id="profile_back" value="Back" type="submit">Add Template</a></td>
                    
                  </tr>
                  </tbody>
                </table>
              </div>
							  <div class="table-responsive">
								<table id="users" class="table table-bordered table-striped">
								  <thead>
								  <tr>
									<!-- <th>Name</th>
									 -->
									<th>Sr.No</th>
									<th>Title</th>
                  <th>Subject</th>
									<!--th>Message Body</th-->
                  <th>Action</th>
								  </tr>
								  </thead>
                  <?php $i=1; ?>
								  @foreach($details as $key=>$data)
								  <tr>


									<td><?php echo $i; ?></td>
									<td> {{ $data->title }}</td>
                  <td> {{ $data->subject }}</td>
                  <!--td>{{ str_limit($data->description, 50) }}</td-->
									<td class="action_links">

										<a href ="{{url('admin/email/edit')}}/{{$data->id}}" title="Edit"><i class="fa fa-pencil"></i></a>
                    <a href ="javascript:void(0)"  data-target="#myModal" onclick="confirm_delete('{{url('admin/delete/template')}}/{{$data->id}}')" title="Delete"><i class="fa fa-trash-o"></i></a>
									</td>
								  </tr>
                  <?php  $i++; ?>
								  @endforeach
								</table>
							  </div>
                          </div>
                    </div>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <div class="control-sidebar-bg"></div>

		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

         </div>
         <div class="modal-body">
			<h4 class="modal-title" id="myModalLabel">Are you Sure! Do you want to delete?</h4>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary" id="delete">Yes</button>
         </div>
      </div>
   </div>
</div>

    @stop
