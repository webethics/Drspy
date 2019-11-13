<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plandetails extends Model
{
  protected $table = 'plan';

  public $timestamps = false;

  protected $fillable = ['name', 'Price', 'Features', 'stripeplanid', 'access_products', 'video', 'brandname', 'shipfromcountry', 'Ad', 'Adlink', 'Productsave', 'sortedby'];
}
