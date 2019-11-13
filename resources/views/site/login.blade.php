@extends('site.layouts.masterlogin')
@section('pageTitle', 'drspy')
@section('pageDescription', 'User frontend')
@section('content')
  <style>
  .error {
    color:red !important;
  }
  </style>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" type="text/css" href="{{url('js/QapTcha.jquery.css')}}" media="screen" />
<div class="main-container landing">
   <div class="flex-container">
       <div class="scalable">
           <div class="logo">
               <img class="img-responsive center-block" src="{{url('frontend-assets/images/web-logo.png')}}" alt="logo">
           </div>

           <div class="pro-cont">
               <h4>Achieve the financial goals you've set for yourself!</h4>
               <div class="progress progress-striped active">
                   <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" style="width:40%"> Almost Complete...</div>
               </div>
               <button class="nextStep">next step</button>
           </div>

           <div class="left-container ">
               <h2>Join thousands of happy entrepreneurs already using DrSpy to build an amazing business.</h2>
               <div class="lc-txt-box">
                   <h4>Can I switch between plans or cancel my subscription any-time later? </h4>
                   <p>Yes, you can download / upgrade your plan at any time or cancel your subscription at any moment. In case your not 100% satisfied with the service, there is a t day money back guarantee.</p>
               </div>
               <div class="lc-txt-box">
                   <h4>Are there any hidden fees or contract obligations? </h4>
                   <p>No, we do not enforce any contracts for long-term commitments or other contract obligations whatsoever. And there are no hidden charges or fees.</p>
               </div>
               <div class="lc-txt-box">
                   <h4>Does the paid trail limit my access to features? </h4>
                   <p>The paid trial enables you to try out our pro and / or Guru plans and you will be able to enjoy full access to the features available to those plans.</p>
               </div>
               <div class="lc-txt-box">
                   <h4>Are there any custom plans available? </h4>
                   <p>Absolutely! Our Enterprise plan is 100% flexible to suit your most unique marketing needs. Please contact us to discuss further details.</p>
               </div>

               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Pay Now</button>

           </div>

           <div class="right-container">
               <h2>Create an account with DrSpy </h2>
               <div class="rc-form-cont">

                   <div class="">
                       <ul id="tabsJustified" class="nav nav-tabs">
                           <li class="nav-item"><a href="" data-target="#login" data-toggle="tab"
                             class="btnlogin nav-link small text-uppercase active">login</a></li>
                           <li class="nav-item"><a href="" data-target="#register"
                             data-toggle="tab" class="btnregister nav-link small text-uppercase ">register</a></li>

                       </ul>
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

                     <div id="tabsJustifiedContent" class="tab-content">
                         <div id="login" class="tab-pane fade active show">
                             <div class="custom-form">
                                <form class="form-horizontal" action='user/checklogin' method="post">
                                   {{ csrf_field() }}
                                    <fieldset>
                                       <!-- Text input-->
                                       <div class="form-group">
                                           <div class="col-md-12">
                                               <input id="login_email" name="email" type="text" placeholder="Enter user name" class="form-control input-md" required="">
                                           </div>
                                       </div>
                                       <!-- Text input-->

                                       <!-- Text input-->
                                       <div class="form-group">
                                           <div class="col-md-12">
                                               <input id="login_password" name="login_password" type="password" placeholder="Enter password" class="form-control input-md" required="">
                                           </div>
                                       </div>

                                       <div class="form-group">
                                           <div class="col-md-12">
                                                <div class="QapTcha">{!! NoCaptcha::display() !!}</div>

                                           </div>
                                       </div>

                                       <div class="form-group">
                                           <div class="col-md-12">
                                               <label class="checkbox float-left">
                                                   <input type="checkbox" value="remember-me"> Remember me
                                               </label>
                                           </div>
                                       </div>

                                       <!-- Login button -->
                                       <div class="submit">
                                           <input type="submit" value="Login" class="btn btn-info btn-block">
                                           <p><a href="#" id="forgot_password"> Forgot Your Password? </a></p>
                                       </div>

                                       <div class="text-center social-btn">
                                           <span>Or login with : </span>
                                           <a href="{{url('/redirect/facebook')}}"><i class="fab fa-facebook-f"></i></a>
                                           <a href="redirect/google"><i class="fab fa-youtube"></i></a>
                                       </div>
                                    </fieldset>
                                 </form>
                             </div>
                         </div>
                        @include('site.register_section')
                     </div>
                     <div id="forgotpassword-section" style="display:none;">
                       <label for="forgot_section"> Forgot Section </label>
                       <form class="form-horizontal"  method="post" action="">
                          <input type="hidden" name="_token" id="csrf_token_field" value="{{csrf_token()}}">
                           <fieldset>
                              <!-- Text input-->
                               <div class="form-group">
                                   <div class="forgot_password_div">
                                       <input id="forgot_password_email" name="forgot_password_email" type="text" placeholder="Enter your email" class="form-control input-md" required="">
                                       <div class="forgot_message_error error"> </div>
                                   </div>
                                   
                               </div>
                               <!-- Text input-->

                               <!-- Login button -->
                               <div class="submit">
                                   <input type="submit" value="Send" id="forgot_pass_section" class="btn btn-info btn-block">
                               </div>
                               <a href="{{url('/login') }}" class="mrgt-4"> Click here to Login! </a>
                           </fieldset>
                       </form>
                     </div>
                   </div>

               </div>
           </div>
           <div id="loader-section" style="display:none">
            <img src="{{url('frontend-assets/images/loader.gif')}}" />
           </div>
       </div>
   </div>

   <div id="particles-js"></div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <img class="img-responsive center-block" src="{{url('frontend-assets/images/web-logo.png')}}" alt="logo">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body box-modal">
               <div class="footer-btn  pop-btn mt-3">
                   <button type="button" class="btn btn-primary trial mb-2">Start A 7- Day Trial for $7</button>
                   <p> Gain hands-on experience with your own Account </p>
               </div>

               <div class="pop-contact">
                   <!--  <i class="far fa-comment-dots"></i> -->
                   <div class="connect-de">
                       <a href="#"><i class="fas fa-envelope-open"></i><span> Support @ </span></a>
                       <a href="#"><i class="fab fa-facebook-f"></i><span> Facebook.com </span></a>
                   </div>
                   <p> Meet with our product expert to learn how you can benefit </p>
               </div>
           </div>
       </div>
   </div>
</div>
<div id="particles-js"></div>
<script src="{{url('frontend-assets/js/jquery.js')}}"></script>
<script src="{{ url('frontend-assets/js/particles.js') }}"></script>
<script src="{{ url('frontend-assets/js/app.js') }}"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="{{url('sitejs/register.js')}}"></script>
<script src="{{url('sitejs/helpers.js')}}"></script>
</div>
   <script>
      $(".nextStep").click(function() {
          $("#progressBar")
              .css({
                  "width": "70%"
              })
              .setAttribute('aria-valuenow', 100);
      });

      $(document).ready(function() {
		$(".btnregister").on("click", function() {
			$(".progress-striped").css("display", "flex");
			$(".nextStep").css("display", "inline-block");
		});
		
		$(".btnlogin").on("click", function() {
		    $(".progress-striped,.nextStep").css("display", "none");
		});

		$(document).on('click', '#forgot_password', function(e) {
			e.preventDefault();
			$('#tabsJustifiedContent').hide();
			$('#tabsJustified').hide();
			$('#forgotpassword-section').show();
		});

		/*forgot password section click*/
		$(document).on('click', '#forgot_pass_section', function(e) {
			e.preventDefault();
			var email = $('#forgot_password_email').val();
			if(email != '') {
				var result = validateEmail(email);
				if(result == true) {
					$.ajax({
					  url:'/forgot-password-email',
					  method:"post",
					  async:false,
					  headers: {
						  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					  },
					  data:{'email':email},
					  success:function(response) {
						console.log(response);
					  },  error:function(err) {
						console.log(err);
					  }
					})
				} else {
					$('.forgot_message_error').html('');
					var html = 'Please enter a valid email address';
					$('.forgot_message_error').append(html);
					return false;
				}
			} else {
				$('.forgot_password_div').addClass('error');
				
				return false;
			}
		});
      })
   </script>
 @stop
