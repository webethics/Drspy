<nav class="navbar navbar-expand-md navbar-light bg-light">
		<div class="container-fluid">
				<button type="button" id="sidebarCollapse" class="btn btn-info d-block d-md-none">
						<i class="fas fa-align-left"></i>
						<span>Toggle Sidebar</span>
				</button>
				<?php
				$user_id =	Session::get('user_id');
				if($user_id != '') {
					$response = DB::table('users')->select('first_name')->where('id', $user_id)->get();
					$name =  $response[0]->first_name;
				}
				?>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto top-nav">
								<li class="nav-item">
										<div class="dropdown">
												<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<?php if($name) { ?>
														<img class="img-responsive center-block" src="{{url('frontend-assets/images/user-img.png')}}" alt="logo"> {{$name}}
													<?php } else { ?>
														<img class="img-responsive center-block" src="{{url('frontend-assets/images/user-	img.png')}}" alt="logo"> BobHyden
													<?php } ?>

												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<a class="dropdown-item" href="#">Account Settings</a>
														<a class="dropdown-item" href="{{url('/logout')}}">Signout</a>
												</div>
										</div>
								</li>
						</ul>
				</div>
		</div>
</nav>
</nav>
