<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class maincategoryModel extends Model
{
  protected $table = 'maincategory';

  public $timestamps = false;

  protected $fillable = ['name', 'sitename'];
}
