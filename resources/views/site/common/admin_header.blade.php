<header class="main-header">
  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
<!-- Logo -->
<a href="{{url('/admin')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">
       Admin
<!--       <img src="{{ url('images/logo.png')}}" class="user-image" width="30px" alt="User Image"> -->
    </span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><span class="name">Admin<span></span>
  </a>

    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            
            <img src="{{ url('assets/admin/dist/img/man.png')}}" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{ Session::get('admin_user_name') }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="{{ url('assets/admin/dist/img/man.png')}}" class="img-circle" alt="User Image">
              <p>
                {{ Session::get('admin_user_name') }}
              </p>
            </li>
            <!-- Menu Body -->
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{url('admin/resetpassword')}}" class="btn btn-default btn-flat">Change Password</a>
              </div>
              <div class="pull-right">
                <a href="{{url('admin/logout')}}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
