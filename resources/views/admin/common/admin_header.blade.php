<header class="main-header">
  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    @if(!empty(Session::get('admin_user_name')))
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    @endif
<!-- Logo -->
<a href="{{url('/admin')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">
       Drspy
<!--       <img src="{{ url('images/logo.png')}}" class="user-image" width="30px" alt="User Image"> -->
    </span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><span class="name">Drspy<span></span>
  </a>

    <!-- Navbar Right Menu -->
    @if(!empty(Session::get('admin_user_name')))
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->

            <img src="{{ url('assets/admin/dist/img/man.png')}}" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <?php $name = Session::get('admin_user_name'); $response = explode(' ', $name); ?>
            <span>{{ $response[0] }}</span>
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
                <a href="{{url('admin/change-password')}}" class="btn btn-default btn-flat">Change Password</a>
              </div>
              <div class="pull-right">
                <a href="{{url('admin/logout')}}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    @endif
  </nav>
</header>
