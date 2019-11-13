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
                      <th>S.No</th>
                      <th>Product link</th>
    									<th>Title</th>
                      <th>Price</th>
                      <th>Product Rating</th>
                      <th>Action</th>
  								  </tr>
								  </thead>
                    <?php $i = 0; ?>
								    @forelse($category_data as $key=>$value)

    								  <tr>
                        <td><?php $i++; ?>{{$i}}</td>
                        <td><a style="font-weight: 400;"  href="{{$value->product_link}}" target="_blank"><img src="{{$value->product_image}}" class="fillwidth"></a></td>
    									  <td><p class="product_desc"><?php $truncated = (strlen($value->title) > 20) ? substr($value->title, 0, 25) . '...' : $value->title; ?>{{$truncated}}..</p></td>
    									  <td>{{$value->price}}</td>
                        <td>{{$value->product_rating}}</td>
                        <td class="action_links">
                          <a href ="{{url('admin/wish-category-edit')}}/{{$value->maincategory_id}}/{{$value->id}}" title="Edit"><i class="fa fa-pencil"></i></a>
      										<a href ="{{url('admin/wish_category_delete')}}/{{$value->id}}"  onclick="return confirm('Are you sure!')" title="Delete"><i class="fa fa-trash-o"></i></a>
      									</td>
  								  </tr>
                  @empty
                    <tr>
                      <td colspan="12" style="text-align:center;"> No data available! </td>
                    </tr>
								  @endforelse
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
<script>
 $('#users').DataTable();
</script>

@stop
