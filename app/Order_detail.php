<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order_detail.
 *
 * @author  The scaffold-interface created at 2017-02-18 07:51:52am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Order_detail extends Model
{
	
	
    protected $table = 'order_details';

	
	public function oder()
	{
		return $this->belongsTo('App\Oder','oder_id');
	}

	
	public function product()
	{
		return $this->belongsTo('App\Product','product_id');
	}

	
}
