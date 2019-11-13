<?php
	$user_id =	Session::get('user_id');
	if($user_id != '') {
		$response = DB::table('users')->select('first_name')->where('id', $user_id)->get();
		$name =  $response[0]->first_name;
	}
?>


<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img class="img-responsive center-block" src="{{url('frontend-assets/images/web-logo.png')}}" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample06">
          <ul class="navbar-nav ml-auto nav-txt">
              <li class="nav-item active">
                  <a class="nav-link" href="#">Tutorials</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/pricing">Pricing</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Picked By DrSpy</a>
              </li>
              <li class="nav-item dropdown">
					<?php if($name) { ?>
						<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{$name}} </a>
					<?php } else { ?>
						<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dashboard </a>
					<?php } ?>
                  
                  <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                      <a class="dropdown-item" href="#">My account</a>
                      <a class="dropdown-item" href="/logout">Log out</a>
                  </div>
              </li>
          </ul>
      </div>
  </nav>
