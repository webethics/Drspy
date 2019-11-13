<?php
namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller, Validator, Auth, Redirect, Session, DB, View, Input;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller
{
    /*Index page*/
    public function index(Request $request) {
      if(Session::get('user_id')){
        return redirect('user/dashboard');
      } else {
         return view('site.login');
      }
    }

    /*login functionality*/
    public function login(Request $request) {
      if(Session::get('user_id')){
          return redirect('user/dashboard');
  		} else {
 	      $email='';
  			$password='';
  			$checked='';
  			if(isset($_COOKIE['remember_email'])) {
  				$email=$_COOKIE['remember_email'];
  				$password=$_COOKIE['remember_password'];
  				$checked='on';
  			}

        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Please login  to continue!');
  			return view("site.login",compact('email','password','checked'));
  		 }
    }

   	public function check_login(Request $request) {
		
  		$rules = array(
			'email' => 'required|email',
  			'login_password' => 'required',
  		);

  		$validator = Validator::make($request->input(), $rules);
  		if ($validator->fails()) {
			return redirect('/login')->withErrors($validator)->withInput($request->except('password'));
		} else {
  			$result1 = DB::table('users')
  			->where('email', '=', $request->get('email'))
  			->where('user_type', '=', 'user')
  			->get();
  			//~ pr($result1, 1);

			if(isset($result1[0]->id)) {
				$result = DB::table('users')
				  ->where('email', '=', $request->get('email'))
				  ->where('password', '=', md5($request->get('login_password')))
				  ->where('user_type', '=', 'user')
				  ->get();

				if(isset($result[0]->id)) {
					if($result[0]->user_status != 'enable') {
						if($result[0]->user_status == 'disable') {
							$request->session()->flash('message.level', 'danger');
							$request->session()->flash('message.content', 'Your Account is disabled!');
							return Redirect::to('/login');
							 die;
						}

						//~ if($result[0]->delete_status == 'on') {
							//~ $request->session()->flash('message.level', 'danger');
							//~ $request->session()->flash('message.content', 'Invalid Credentials!');
							//~ return Redirect::to('/login');
							//~ die;
						//~ }

						//~ if($result[0]->register_token != NULL) {
							//~ $request->session()->flash('message.level', 'danger');
							//~ $request->session()->flash('message.content', 'Please verify your email!');
							//~ return Redirect::to('/login');
						//~ }
					} else {
						$check_trial_or_subscribed = $result1[0]->is_trial;
						//~ pr($check_trial_or_subscribed, 1);
						if($check_trial_or_subscribed >= 0) {
							Session::put('user_id', $result[0]->id);
							return Redirect('/user/dashboard');
							
						} else {
							Session::put('user_id', $result[0]->id);
							return Redirect('/pricing');
						}
					}
				} else {
					$request->session()->flash('message.level', 'danger');
					$request->session()->flash('message.content', 'Invalid Credentials!');
					return Redirect::to('/login');
				}
			} else {
				$request->session()->flash('message.level', 'danger');
				$request->session()->flash('message.content', 'Invalid Credentials!');
				return Redirect::to('/login');
			}
		}
	}

	/*Logout function*/
	public function logout() {
		Session::put('user_id', '');
		return redirect('/login');
	}

	//***************registration functionality****************************//
	public function register() {
		$data = DB::table('plan')->get();
		return view("site.login")->with('data', $data);
	}

	/*check email*/
	public function verifyregistrationemail(Request $request) {
		if(!empty($request->input('email'))) {
		  $data = DB::table('users')->where('email', $request->input('email'))->count();
		  if($data > 0) {
			return 0;
		  } else {
			return 1;
		  }
		}
	}

	/*Register function code starts here*/

	/*Function to save details in db and return status*/
	public function register_user(Request $request) {
		
		$rules = array(
					'first_name'    => 'required',
					'last_name'    => 'required',
					'email' => 'required|email|unique:users',
					'password' => 'min:6|required_with:confirm_passsword|same:confirm_passsword',
					'confirm_passsword' => 'min:6',
				);
		$validator = Validator::make($request->input(), $rules);
		$messages = $validator->messages();
		if ($validator->fails()) {
			return json_encode(array('status'=>400, 'msg'=>$messages));
		}	else {
			if(!empty($request->input('email'))) {
			  $data = DB::table('users')->where('email', $request->input('email'))->count();
			  if($data > 0) {
				return json_encode(array('status'=>404, 'msg'=>'email is already registered'));
			  } else {
				$result =  $request->all();
				if(!empty($result))  {
					$register_token = $result['_token'];
					$token = $this->getToken();
					$time = date('Y-m-d H:i:s');
					$result = array('email'=>$result['email'],'password'=>md5($result['password']),
					'first_name'=>$result['first_name'],'last_name'=>$result['last_name'],'user_type'=>'user', 'user_status'=>'enable');
					$id = DB::table('users')->insertGetId($result);
					Session::put('user_id', $id);
					return json_encode(['status'=>200, 'msg'=>'User added successfully']);
				}
			  }
			}
		}
	}

	/*Check user if he is subscribing or asking for free trial*/
	public function submit_ac_details(Request $request) {
		$rules = array(
			  'first_name'    => 'required',
			  'last_name'    => 'required',
			  'email' => 'required',
			  'card_name' => 'required',
			  'card_number' => 'required',
			  'month'=> 'required',
			  'year' => 'required',
			  'cvvcode' => 'required',
		  );
		$validator = Validator::make($request->input(), $rules);
		$messages = $validator->messages();
		$plan_id = $request->input('price');
		// pr($messages, 1);
		if ($validator->fails()) {
		  return redirect('/user/account-page/'.$price)->withErrors($validator)->withInput($request->except('password'));
		} else {
			\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
			try {
				$billing_details = $request->all();
				$result = DB::table('plan_details')->where('id', $plan_id)->get();
				$sripe_plan_id = $result[0]->stripeplanid;
				$response = \Stripe\Token::create(array(
						  "card" => array(
						  "number"    => $request->input('card_number'),
						  "exp_month" => $request->input('month'),
						  "exp_year"  => $request->input('year'),
						  "cvc"       => $request->input('cvvcode'),
						  "name"      => $request->input('card_name')
					  )));
				$res = $response->__toArray();
				$token = $res['id'];
				$return_data = array();
				$data1 = array();
				if(isset($sripe_plan_id)) {
				  $plan_details = \Stripe\Plan::retrieve($sripe_plan_id);
				  $plandetail = $plan_details->__toArray();
				  $planamount = $plandetail['amount'];
				  if($planamount >= 0) {
					$data1['source'] = $token;
					$data1['email']	 = $billing_details['email'];
					if(!empty($data1)) {
						$customer = \Stripe\Customer::create($data1);
						$customer1 = \Stripe\Customer::retrieve($customer['id']);
						$return_data['success']['customer_id'] = $customer1['id'];

						$sub =	\Stripe\Subscription::create(array(
							  "customer" => $customer1['id'],
							  "plan" => $sripe_plan_id,
							  "prorate" => true,
							));
					  $return_data['success']['subscription_id'] = $sub['id'];
					  $return_data['success']['subscription_status'] = $sub['status'];
					}
				  }
				}

				if(!empty($return_data)) {
					$user_id = Session::get('user_id');
					$token = $this->getToken();
					$time = date('Y-m-d H:i:s');
					$result = array('is_trial'=>0, 'stripeplan_id'=>$sripe_plan_id, 'stripecustomerid'=>$return_data['success']['customer_id'], 
					'stripe_subscription_id'=>$return_data['success']['subscription_id']);
					DB::table('users')->where('id', $user_id)->update($result);
					return Redirect::to('/user/refer-page');
				}
			} catch (Exception $e) {
				pr($e->getMessage(), 1);
			}
		}
	}
  /*Register function code ends here*/

	public function getToken() {
		$length = 20;
		$token = "";
		$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		$codeAlphabet.= "0123456789";
		$max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
		    $token .= $codeAlphabet[rand(0, $max-1)];
		}

        return $token;
	}

	function send_email($to='',$subject='',$message='',$from='',$fromname=''){
		try {
  			$mail = new PHPMailer(true);
  			$mail->isSMTP(); // tell to use smtp
  			$mail->CharSet = "utf-8"; // set charset to utf8
			$mail->SMTPDebug = 2;
  			$mail->Host = "smtp.gmail.com";
  			$mail->SMTPAuth = true;
  			$mail->Port = 465;
			$mail->SMTPSecure = "tls";
  			$mail->Username = "care@drspy.io";
  			$mail->Password = "IamDrSpy97010!@#123";
  			$mail->From = "care@drspy.io";
  			$mail->FromName = $fromname;
  			$mail->AddAddress($to);
  			$mail->IsHTML(true);
  			$mail->Subject = $subject;
  			$mail->Body = $message;
  			$mail->SMTPOptions= array(
    			'ssl' => array(
    			'verify_peer' => true,
    			'verify_peer_name' => false,
    			'allow_self_signed' => true
    			)
  			);
  			$mail->send();
			return true ;
		} catch (phpmailerException $e) {
			pr($e->getMessage(), 1);
			return Redirect::to('/forgot-password');
		} catch (Exception $e) {
			pr($e->getMessage(), 1);
			return Redirect::to('/forgot-password');
		}
	    return false ;
	}

	public function verify($token) {
		if(!empty($token)) {
			try {
				$data = array('register_token'=>$token, 'user_status'=>'enable');
				$res = DB::table('users')->where('register_token',$token)->update($data);
				$request->session()->flash('message.level', 'success');
				$request->session()->flash('message.content', 'Your account has been veryfied!');
				return redirect('/login');
			} catch (\Exception $e) {
				$request->session()->flash('message.level', 'danger');
				$request->session()->flash('message.content', $e->getMessage());
				return Redirect::to('/forgot-password');
			}
		}
	}

	/************ forgot password functionality  ****************************/
	public function forgot_password() {
		return view("site.forgot_password");
	}

	public function forgot_password_email(Request $request) {
		$rules = array('email'    => 'required|email');
		$validator = Validator::make($request->input(), $rules);
		if ($validator->fails()) {
				return redirect('/forgot-password')->withErrors($validator)->withInput($request->except('password'));
		} else {
			 $result = DB::table('users')
			->where('email', '=', $request->get('email'))
		   ->get();

		 if(count($result)>0){
			$token = $this->getToken();

			 $password_email = DB::table('password_resets')
			->where('email', '=', $request->get('email'))
			->get();
			 $time = date('Y-m-d H:i:s');
			 $data = array('email'=>$request->get('email'),'token'=>$token,'created_at'=>$time);
			 if(count($password_email)>0){
				 DB::table('password_resets')->where('email', '=', $request->get('email'))
				->update($data);
			 }else{
				DB::table('password_resets')->insert($data);
			 }
			$url= url('/reset-password/'.$token);
			$link = $url ;
			$message = 'Please Click <a href="'.$link.'">here</a> to reset your password.<br><br>';
			$to = $result[0]->email;
			$subject = 'Reset Password';
			$fromname='';
			$from = "care@drspy.io";
			$result = DB::table('email')->where('title', '=' , 'User-Forgot-Password' )->get();
			$logo_url = url('frontend-assets/assets/frontend/images/magento.png');

			$message_body_db = $result[0]->description;

			$list = Array
				  (
					 '[logo]' => $logo_url,
					 '[message]' => $message
				  );

			$find = array_keys($list);
			$replace = array_values($list);
			$message_body = str_ireplace($find, $replace, $message_body_db);
			$mail = $this->send_email($to, $subject, $message_body, $from, $fromname);
			return json_encode(['status'=>200, 'msg'=>'Email send successfully']);
		  }else{
			return json_encode(['status'=>404, 'msg'=>'Error in sending email']);
		  }
		}
	}

	/******************* Open Reset Password Form  *************************/
	public function reset_password($token) {
		$result = DB::table('password_resets')
  		->where('token', '=', $token)
  		->get();
		$flag = false;
		if(count($result)>0){
  		$email =  $result[0]->email;
  		$date =  date('Y-m-d H:i:s');
  		$hourdiff = round((strtotime($date) - strtotime($result[0]->created_at))/3600, 1);
  		if($hourdiff>24){
  		    $flag =true;
  		    return view('site.reset_password',compact('token','flag','email'));
  		} else {
          return view('site.reset_password',compact('token','flag','email'));
  		}
		} else {
		      return redirect('/login');
		}
	}
	/**************** Save Password from reset form page  ***********************/
	public function save_reset_password (Request $request) {

		$rules = array('password' => 'min:6|required_with:password_confirmation|same:password_confirmation',);

		$validator = Validator::make($request->input(), $rules);

		if ($validator->fails()) {
			return redirect('/reset-password/'.$request->input('password_token'))->withInput()->withErrors($validator);
		} else{
			$result = DB::table('users')
						->where('email', '=', $request->get('email'))
						->get();

			if(count($result)>0) {
				  $date = date('Y-m-d H:i:s');
				  $data = array('password'=>md5($request->get('password')));
				   DB::table('users')->where('email', '=', $request->get('email'))
						->update($data);

            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Your password has been updated successfully.');


					return redirect('/login');
			} else {
					return redirect('/login');
			}
		}
	}
}
