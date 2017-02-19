<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address.
 *
 * @author  The scaffold-interface created at 2017-02-18 07:56:27am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Address extends Model
{
	
	
    protected $table = 'addresses';

	
	public function customer()
	{
		return $this->belongsTo('App\Customer','customer_id');
	}

	
}
