<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('frontend-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ url('frontend-assets/css/site.css')}}">
    <link rel="stylesheet" href="{{ url('frontend-assets/assets/frontend/css/jquery-ui.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('frontend-assets/assets/frontend/images/favicon.png')}}">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="{{ url('frontend-assets/js/jquery-3.3.1.slim.min.js')}}"></script> -->
    <!-- <script src="{{ url('frontend-assets/js/sweeralert-min.js') }}"></script> -->
    <title>Drspy - @yield('pageTitle')</title>
    <meta name="description" content="@yield('pageDescription')" />
  </head>
    <?php
      $email='';
      $currentAction = \Route::currentRouteAction();
      list($controller, $method) = explode('@', $currentAction);
      $controller = preg_replace('/.*\\\/', '', $controller);
      if($method=='index'){
        echo '<body> ';
      }
      else {
        echo '<body>';
      }
    ?>
    @yield('content')
    <div class="elfsight-app-c4bc573d-458f-4876-bb0b-113955922543"></div>
  </body>
<!-- Optional JavaScript -->
<script src="{{ url('frontend-assets/js/bootstrap.bundle.min.js')}}"></script>

</html>
