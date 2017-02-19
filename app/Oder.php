<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Oder.
 *
 * @author  The scaffold-interface created at 2017-02-18 07:46:59am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Oder extends Model
{
	
	
    protected $table = 'oders';

	
	public function customer()
	{
		return $this->belongsTo('App\Customer','customer_id');
	}

	
}
