<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product.
 *
 * @author  The scaffold-interface created at 2017-02-18 06:52:32am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Product extends Model
{
	
	
    protected $table = 'products';

	
	public function category()
	{
		return $this->belongsTo('App\Category','category_id');
	}

	
}
