@extends('site.layouts.masterlogin')
@section('pageTitle', 'drspy')
@section('pageDescription', 'Forgot page')
@section('content')
@include('site.common_frontend.inner-page-header')
<section class="content-cont">
    <div class="container">
        <div class="row mt-5 mb-3">
            <div class="pro-cont">
                <h4>Achieve the financial goals you've set for yourself!</h4>
                <div class="progress progress-striped active">
                    <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" style="width:70%"> 70% Complete...</div>
                </div>
                <button class="nextStep" id="accountpagenext">Almost Done</button>
            </div>
        </div>
    </div>
</section>

<section class="account-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="acc-text"> Leverage Micro-Influencers for Monster Growth! </h1> </div>
            <div class="col-md-6">
                <div class="account-cont">
                    <h2> WHAT YOU GET TODAY </h2>
                    <div class="value-box">
                        <h3> <i class="far fa-check-circle"></i> Create</h3>
                        <p>Value
                            <br> <span> $ </span></p>
                    </div>

                    <div class="value-box mt-2">
                        <h3> <i class="far fa-check-circle"></i> Store UNLIMITED Active Subscriber Email Records</h3>
                        <p>Value
                            <br> <span> $ </span></p>
                    </div>

                    <div class="value-box mt-2">
                        <h3> <i class="far fa-check-circle"></i> Full Automation Center Access With</h3>
                        <p>Value
                            <br> <span> $ </span></p>
                    </div>

                    <div class="value-box mt-2">
                        <h3> <i class="far fa-check-circle"></i> Full Security Center Access With</h3>
                        <p>Value
                            <br> <span> $ </span></p>
                    </div>

                    <div class="value-box mt-2">
                        <h3> <i class="far fa-check-circle"></i> All Pro Features Includina</h3>
                        <p>Value
                            <br> <span> $ </span></p>
                    </div>

                    <div class="ribbon-cont">
                        <div id="header" class="ribbon">
                            <h1><a>+ For Everyone who join us today!</a></h1>
                        </div>
                        <div class="rline"></div>

                    </div>

                    <h3 class="mb-5"> Join now! claim your perkzilla 'Vip' bonuses and extras </h3>

                    <div class="value-box mt-2">
                        <h3> <i class="far fa-check-circle"></i> All Pro Features Includina</h3>
                        <p>Value
                            <br> <span> $ </span></p>
                    </div>
                    <div class="value-box mt-2">
                        <h3> <i class="far fa-check-circle"></i> All Pro Features Includina</h3>
                        <p>Value
                            <br> <span> $ </span></p>
                    </div>
                    <div class="value-box mt-2">
                        <h3> <i class="far fa-check-circle"></i> All Pro Features Includina</h3>
                        <p>Value
                            <br> <span> $ </span></p>
                    </div>
                    <div class="value-box mt-2">
                        <h3> <i class="far fa-check-circle"></i> All Pro Features Includina</h3>
                        <p>Value
                            <br> <span> $ </span></p>
                    </div>

                    <div class="total-box mt-5">
                        <h1> <span> Total Value over </span> $21,292.00 </h1>

                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="ac-txt-cont">
                    <h1> Create your account now to get </h1>
                    <ul>
                        <li>All New V2 Features Coming Fall / Winter 2019! ( Early Access )</li>
                        <li>All New Forms, Widgets and Landing Pages Coming Fall / Winter 2019!
                          ( Early Access )</li>
                        <li>Get 4 Extra Bonuses Included! ( Time Limited )</li>
                    </ul>

                    <p> Here's how to claim your extra bonuses </p>
                    <p> Send in a copy of your full receipt including transaction number, full name and
                      email used to this email address: help@promotelabs.com </p>
                    <p> Subject: 'Perkzilla V2 Extra Bonuses Claim' </p>
                    <p> Please allow up to 72hrs for our friendly support team to verify your sale and send
                      you your bonus access. </p>
                    <p> This is a goldan opportunity to start increasing your traffic, growing your email
                      lists while reducing your advertising costs but it will only be around for a limited time. </p>
                    <p> Jump in fast to save your spot.</p>

                </div>

                <div class="ac-form-cont mt-5">
                    <h1> Contact Information </h1>
                    <div class="custom-form">
                      @if(session()->has('message.level'))
                          <div class="alert alert-{{ session('message.level') }}">
                          {!! session('message.content') !!}
                          </div>
                      @endif

                      @if ($errors->any())
                      <div class="alert alert-danger">
                        @foreach ($errors->all() as $error){{ $error }}@endforeach
                      </div>
                    @endif
                      @foreach($data as $val)
                        <form class="form-horizontal" method="post" action="/user/submit-account-details" id="account_details_form" enctype="multipart/form-data">
                          {{ csrf_field() }}
                            <fieldset>

                                <input type="hidden" name="price" value="{{$id}}">
                                <!-- Text input-->
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <input id="account_first_name" name="first_name" type="text"
                                        placeholder="Enter first name" class="form-control input-md account_page_detail" required="" value="{{$val->first_name}}">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <input id="account_last_name" name="last_name"
                                        type="text" placeholder="Enter last name" class="form-control input-md account_page_detail" required="" value="{{$val->last_name}}">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <input id="account_email" name="email"
                                        type="text" placeholder="Enter email" class="form-control input-md account_page_detail" required="" value="{{$val->email}}">
                                    </div>
                                </div>
                                <!-- Text input-->

                                <img class="img-responsive center-block payment" src="{{url('frontend-assets/images/payment.jpg')}}" alt="logo">

                                <!-- Text input-->
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <input id="account_card_name" name="card_name" type="text" placeholder="Enter name on card" class="form-control input-md account_page_detail" required="">
                                    </div>
                                </div>
                                <!-- Text input-->

                                <div class="row">
                                    <div class=" form-group col-lg-12">
                                        <input id="account_card_number" name="card_number" type="text" placeholder=" Enter credit card number"  pattern="\d*" maxlength="16" class="form-control input-md account_page_detail" required="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-4 ">
                                      <!-- <input type="text" class="form-control account_page_detail" id="account_exampleFormControlInput1" name="month" placeholder=" 01 - January "> -->
                                      <select name='month' id='month' class="form-control account_page_detail">
                                          <option value=''>Month</option>
                                          <option value='01'>January</option>
                                          <option value='02'>February</option>
                                          <option value='03'>March</option>
                                          <option value='04'>April</option>
                                          <option value='05'>May</option>
                                          <option value='06'>June</option>
                                          <option value='07'>July</option>
                                          <option value='08'>August</option>
                                          <option value='09'>September</option>
                                          <option value='10'>October</option>
                                          <option value='11'>November</option>
                                          <option value='12'>December</option>
                                      </select>
                                    </div>

                                    <div class="form-group col-lg-4 ">
                                        <!-- <input type="text" class="form-control account_page_detail" id="account_exampleFormControlInput1" name="year" placeholder="2019"> -->
                                        <select id="selectElementId" name="year" class="form-control account_page_detail"></select>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <input type="text" class="form-control account_page_detail" id="account_cvv_code" placeholder="CVV Code" name="cvvcode">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="auep">
                                            <h1> Yes, Add Unlimited Expansion Pack </h1>
                                            <p> Increase Your PerZilla power with UNLIMTED subscribe ( $3,500 / Year Value ) </p>
                                        </div>
                                    </div>
                                </div>

                                <img class="img-responsive center-block coupon"
                                src="{{url('frontend-assets/images/coupon.jpg')}}" alt="logo">

                                <div class="row">
                                    <div class=" form-group col-lg-12">
                                        <label class="checkbox float-left">
                                            <input type="checkbox" value="remember-me"> I agree to the <a href="#"> Terms of Service, Privacy Policy </a>
                                        </label>
                                    </div>
                                </div>

                                <!-- Login button -->
                                <a href="#" class="download"> Get Instant Access To PerkZilla Now </a>
                                <div class="submit">
                                    <input type="submit" value="60 Day Money Back Guarantee"
                                    class="btn btn-info btn-block">
                                </div>

                            </fieldset>
                        </form>
                        @endforeach
                    </div>

                </div>

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
<script src="{{url('frontend-assets/js/jquery.js')}}"></script>
<script src="{{url('sitejs/register.js')}}"></script>
<script src="{{url('sitejs/helpers.js')}}"></script>

<script>
$(document).ready(function() {

  var min = new Date().getFullYear(),
    max = min + 9,
    select = document.getElementById('selectElementId');

  for (var i = min; i<=max; i++){
      var opt = document.createElement('option');
      opt.value = i;
      opt.innerHTML = i;
      select.appendChild(opt);
  }

  //~ $(document).on('click', '#accountpagenext', function(e){
      //~ e.preventDefault();
      //~ window.location.href = '/user/refer-page';
  //~ });
});
</script>


@stop
