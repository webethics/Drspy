<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = ['first_name', 'last_name', 'city', 'post_code', 'country', 'telephone', 'user_status',  'email', 'register_token',  'password', 'user_type', 'stripeplan_id', 'stripecustomerid', 'stripe_subscription_id'];
}
