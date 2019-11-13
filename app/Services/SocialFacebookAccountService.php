<?php

namespace App\Services;
use App\SocialFacebookAccount;
use App\Models\UsersModel;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser, $service)
    {
        //pr($providerUser, 1);
        try {
			$account = SocialFacebookAccount::whereProvider($service)
            ->whereProviderUserId($providerUser->getId())
            ->first();
		
			if ($account) {
				return $account->id;
			} else {

				$account = new SocialFacebookAccount([
					'provider_user_id' => $providerUser->getId(),
					'provider' => $service
				]);
				echo '<pre>';print_r($account);die;
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

				return $user;
			}
		
		} catch(Exception $e) {
			echo 'comming here <br />';
			pr($e->getMessage(), 1);
		}
        
    }
}
