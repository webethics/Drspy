<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paymenthistory extends Model
{
  protected $table = 'paymenthistory';

  public $timestamps = false;

  protected $fillable = ['user_id', 'transaction_id', 'payment_id'];

}
