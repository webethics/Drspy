<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class croncsv extends Model
{
  protected $table = 'croncsv';

  public $timestamps = false;

  protected $fillable = ['sitename', 'csvfilename'];
}
