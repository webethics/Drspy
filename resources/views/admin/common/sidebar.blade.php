<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
		<?php
  		$currentAction = \Route::currentRouteAction();
  		list($controller, $method) = explode('@', $currentAction);
  		$controller = preg_replace('/.*\\\/', '', $controller);
		?>

		<?php if(Session::get('user_type') == 'admin'){ ?>

			<li <?php if(($controller == "AdminController") && ($method == 'index')){ echo "class='active'";} ?>>
			 <a href="{{url('/admin')}}">
				<i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span>
			  </a>
			</li>

			<li
				<?php if(($controller == "UsersController") && ($method == 'usersdetails' || $method == 'editUser' || $method == 'adduser')){ echo "class='active'";} ?>>
				<a href="#">
					<i class="fa fa-users text-aqua"></i>
					<span>Manage Users</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li
						<?php if(($controller == "UsersController") && ($method == 'usersdetails')){ echo "class='active'";} ?> >
						<a href="{{url('admin/users-details')}}">
							<i class="fa fa-user"></i>
							<span>Users</span>
						</a>
					</li>
					<li
						<?php if(($controller == "UsersController") && ($method == 'adduser')){ echo "class='active'";} ?> >
						<a href="{{url('admin/user/adduser')}}">
							<i class="fa fa-user"></i>
							<span>Add Users</span>
						</a>
					</li>
				</ul>
			</li>

			<li <?php if(($controller == "AliexpressController") && ($method == 'Aebestseller' || $method == 'Aedropshipping' || $method == 'Aemostwished' ||  $method == 'Aehandpicked' || $method == 'uploadaecsv' || $method == 'uploadaecsv')){ 		echo "class='active'";} ?>>
        <a href="#">
					<i class="fa fa-users text-aqua"></i>
					<span>AE Listing</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li <?php if(($controller == "AliexpressController") && ($method == 'Aebestseller')){ echo "class='active'";} ?> >
						<a href="{{url('admin/aebestseller')}}">
							<i class="fa fa-user"></i>
							<span>BestSeller</span>
						</a>
					</li>
          <li <?php if(($controller == "AliexpressController") && ($method == 'Aedropshipping')){ echo "class='active'";} ?> >
						<a href="{{url('admin/aedropshipping')}}">
							<i class="fa fa-user"></i>
							<span>DropShipping</span>
						</a>
					</li>
          <li <?php if(($controller == "AliexpressController") && ($method == 'Aemostwished')){ echo "class='active'";} ?> >
						<a href="{{url('admin/aemostwished')}}">
							<i class="fa fa-user"></i>
							<span>MostWished</span>
						</a>
					</li>
					<li
						<?php if(($controller == "AliexpressController") && ($method == 'Aehandpicked')){ echo "class='active'";} ?> >
						<a href="{{url('admin/aehandpicked')}}">
							<i class="fa fa-user"></i>
							<span>HandPicked</span>
						</a>
					</li>
          <li
            <?php if(($controller == "AliexpressController") && ($method == 'uploadaecsv')){ echo "class='active'";} ?> >
            <a href="{{url('admin/aeuploadaecsv')}}">
              <i class="fa fa-user"></i>
              <span>UploadAeCsv</span>
            </a>
          </li>
				</ul>
			</li>

      <li <?php if(($controller == "WishController") && ($method == 'wishBestSeller' || $method == 'uploadwishcsv' )){ echo "class='active'"; }?>>
        <a href="#">
          <i class="fa fa-users text-aqua"></i>
          <span>Wish Listing</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if(($controller == "WishController") && ($method == 'wishBestSeller')){ echo "class='active'";} ?> >
            <a href="{{url('admin/wish_bestseller')}}">
              <i class="fa fa-user"></i>
              <span>BestSeller</span>
            </a>
          </li>
          <li <?php if(($controller == "WishController") && ($method == 'uploadwishcsv')){ echo "class='active'";} ?> >
            <a href="{{url('admin/upload-wish-csv')}}">
              <i class="fa fa-user"></i>
              <span>UploadWishCsv</span>
            </a>
          </li>
        </ul>
			</li>

			<li <?php if(($controller == "PlanController") && ($method == 'index' || $method == 'addplan')){ 		echo "class='active'";} ?>>
         <a href="#">
           <i class="fa fa-users text-aqua"></i>
           <span>Manage Plan</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li
             <?php if(($controller == "PlanController") && ($method == 'index')){ echo "class='active'";} ?> >
             <a href="{{url('admin/plan/manage-plan')}}">
               <i class="fa fa-user"></i>
               <span>Available Plans</span>
             </a>
           </li>
           <!-- <li
             <?php if(($controller == "PlanController") && ($method == 'index')){ echo "class='active'";} ?> >
             <a href="{{url('admin/plan/add-plan')}}">
               <i class="fa fa-user"></i>
               <span>Add Plans</span>
             </a>
           </li> -->
         </ul>
			</li>

		<?php } ?>
	</ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
