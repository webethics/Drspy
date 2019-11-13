<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subcategoryModel extends Model
{
  protected $table = 'subcategorytable';

  public $timestamps = false;

  protected $fillable = ['category_id', 'maincategory_id', 'subcat_name'];
}
