@extends('site.layouts.masterlogin')
@section('pageTitle', 'drspy')
@section('pageDescription', 'Forgot page')
@section('content')
<section class="nav-cont">
    @include('site.common_frontend.inner-page-header')
</section>
<section class="content-cont">
    <div class="container">

        <div class="row mt-5 mb-5">
            <div class="pro-cont">
                <h4>Achieve the financial goals you've set for yourself!</h4>
                <div class="progress progress-striped active">
                    <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" style="width:100%"> 100% Complete...</div>
                </div>
            </div>
        </div>

        <div class="row lrtext-cont mt-5 mb-5">
            <div class="col-md-6">
                <div class="ltext-cont">
                    <h1> You're Awesome, So We Want <span>Your Friends Sign Up Too </span> </h1>
                    <h4> Refer Friend, get DrSpy Everywhere for FREE </h4>
                    <button type="button" class="btn btn-primary" id="access_dashboard">Access the Dashboard Here Now</button>
                    <p> Then, check your inbox for your first email with information and instructions about your account. </p>

                </div>
            </div>
            <div class="col-md-6">
                <div class="rtext-cont">
                    <i class="fas fa-star"></i>
                    <h1>This  next step is super important!</h1>
                    <p> To make sure you never miss an email, whitelist us by adding " " to your address book. if you're not sure how to do it, <span> here are simple instructions to follow. </span> it should only take a minute! </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="social-media mt-5">
    <div class="container">
        <div class="row">
            <div class="social-box social-btn">
                <p>Lets <span>Connect </span></p>
                <a href="https://www.facebook.com/TheDrSpy/" target="_blank"><i class="fab fa-facebook-f"></i><span> Facebook </span></a>
                <a href="https://www.youtube.com/channel/UCqm8PviYfvNMUk2cZbjINxA/" target="_blank" class="red"><i class="fab fa-google-plus-g"></i><span> Google+ </span></a>
                <a href="#" class="s-blue"><i class="fab fa-twitter"></i><span> Twitter </span></a>
                <a href="#" class="n-blue"><i class="fab fa-linkedin-in"></i><span> LinkedIn </span></a>
            </div>
        </div>
    </div>
</section>

<section class="testimonial">
    <div class="container">
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide col-md-12" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. consectetur adipiscing elit.</p>
                        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </div>
                    <div class="carousel-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. consectetur adipiscing elit.</p>
                        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </div>
                    <div class="carousel-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. consectetur adipiscing elit.</p>
                        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>

@include('site.common_frontend.footer')
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
  $(document).on('click', '#access_dashboard', function(e){
      e.preventDefault();
      window.location.href = '/user/dashboard';
  });
});
</script>


@stop
