<section class="content-header">
  <!--h1>
    Data Tables
    <small>advanced tables</small>
  </h1-->
  <ol class="breadcrumb">

  <?php
	$currentAction = \Route::currentRouteAction();
	list($controller, $method) = explode('@', $currentAction);
  	$controller = preg_replace('/.*\\\/', '', $controller);
	$breadcrumb = "";
	$utl = "";
	if($controller == "RestaurantController"){
		$breadcrumb = "Restaurant";
		$url = url('/')."/admin/restaurant";
	}
	if($controller == "AdminController"){
		$breadcrumb = "Users";
		$url = url('/')."/admin";
	}
	if($controller == "PageController"){
		$breadcrumb = "Pages";
		$url = url('/')."/admin/pages";
	}
  if($breadcrumb == "Resetpassword")
		$breadcrumb = "Change Password";

	?>
    <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	<?php if(trim($breadcrumb)!=""){ ?>
    <li><a href="<?php echo $url;?>"><?php echo $breadcrumb;?></a></li>
	<?php } ?>
    @if(Route::getFacadeRoot()->current()->uri() != 'admin')
    <!---li><a href="{{ url(Route::getFacadeRoot()->current()->uri()) }}">{{ explode('@', Route::getCurrentRoute()->getActionName())[1] }}</a></li--->
    <li><a href="javascript:void(0);">{{ explode('@', Route::getCurrentRoute()->getActionName())[1] }}</a></li>
    <li class="active"></li>
    @endif
  </ol>
</section>
