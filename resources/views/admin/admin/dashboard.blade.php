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
        <!-- <div class="row">
          <div class="col-lg-12"> -->
            <h3 style="text-align:center;"> Comming Soon </h3>
            <!-- </div>
          </div>
        </div> -->
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
