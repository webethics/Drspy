<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialFacebookAccountService, Session;
use App\SocialFacebookAccount;
use App\Models\UsersModel;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAuthFacebookController extends Controller {
   /*
   0*
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect($service) {
		//~ pr($service, 1);
		return Socialite::driver($service)->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $account, $service) {
	
		$data = Socialite::driver($service)->user();
		$user = $this->createOrGetUser($data, $service);
		if($user) {
			//$data = $user->toArray();
			//$user_id = $data['user_id'];
			
			Session::put('user_id', $user);
			return redirect()->to('/pricing');
			
		} else {
			return redirect()->to('/login');
		}
    }
    
    public function createOrGetUser($providerUser, $service)
    {
      
        try {
			 // pr($providerUser, 1);
			$account = SocialFacebookAccount::whereProvider($service)
            ->whereProviderUserId( $providerUser->getId())
            ->first();
            
			if ($account) {
				return $account->user_id;
			} else {

				$account = new SocialFacebookAccount([
					'provider_user_id' => $providerUser->getId(),
					'provider' => $service
				]);
				
				$user = UsersModel::whereEmail($providerUser->getEmail())->first();

				$name = $providerUser->getName();
				$name = explode(' ', $name);
				if (!$user) {
					$user = UsersModel::create([
						'email' => $providerUser->getEmail(),
						'first_name' => $name[0],
						'last_name' => $name[1],
						'user_status' => 'enable',
						'password' => md5(rand(1,10000)),

					]);
				}

				$account->user()->associate($user);
				$account->save();
				
				$user_id = $account->user_id;
				
				return $user_id;

				
			}
		
		} catch(Exception $e) {
			echo 'comming here <br />';
			pr($e->getMessage(), 1);
		}
        
    }
}
