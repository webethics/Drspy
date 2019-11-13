<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subchildcategorymodel extends Model
{
    protected $table = 'subchildcategory';

	public $timestamps = false;

	protected $fillable = ['maincategory_id', 'subcategoryid', 'subchildcategoryname'];
}
