<div id="register" class="tab-pane">
    <div class="custom-form">
      <form  class="form-horizontal" method="post" action="" id="registerform" enctype="multipart/form-data">
<!--
        {{ csrf_field() }}
-->
			<input type="hidden" name="_token"  id="token_value" value="{{ csrf_token() }}">
            <fieldset>
                <!-- Text input-->
                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                    <div class="col-md-12">
                        <input id="first_name" name="first_name" type="text" placeholder="First Name"
                        class="form-control input-md register_blade" required="">
                        <div class="first_name error">
                          {!! $errors->first('first_name', '<p class="alert alert-error">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                    <div class="col-md-12">
                        <input id="last_name" name="last_name" type="text" placeholder="Last Name"
                         class="form-control input-md register_blade" required="">
                        <div class="last_name error">
                          {!! $errors->first('last_name', '<p class="alert alert-error">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
                    <div class="col-md-12">
                        <input id="telephone" name="telephone" type="text" placeholder="Phone number
                              " class="form-control input-md register_blade" required="">
                       <div class="telephone error">
                         {!! $errors->first('telephone', '<p class="alert alert-error">:message</p>') !!}
                       </div>
                    </div>
                </div>
                <!-- Text input-->

                <!-- Text input-->
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <div class="col-md-12">
                        <input id="email" name="email" type="text" placeholder="Email
                          " class="form-control input-md register_blade" required="">
                       <div class="email error">
                         {!! $errors->first('email', '<p class="alert alert-error">:message</p>') !!}
                       </div>
                    </div>
                </div>
                <!-- Text input-->

                <!-- Text input-->
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                    <div class="col-md-12">
                        <input id="password" name="password" type="password" placeholder="Enter password" class="form-control input-md register_blade" required="">
                        <div class="password error">
                          {!! $errors->first('password', '<p class="alert alert-error">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('confirm_passsword') ? 'has-error' : ''}}">
                    <div class="col-md-12">
                        <input id="confirm_passsword" name="confirm_passsword" type="password" placeholder="Re-enter password" class="form-control input-md register_blade" required="">
                        <div class="confirm_passsword error">
                          {!! $errors->first('confirm_passsword', '<p class="alert alert-error">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <!-- Login button -->
                <div class="submit">
                    <input type="button" value="Next" id="signupform" class="btn btn-info btn-block">
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
