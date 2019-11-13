<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\subcategoryModel;

class categoryModel extends Model
{
  protected $table = 'categoryname';

  public $timestamps = false;

  protected $fillable = ['maincategory_id','category_name'];
}
