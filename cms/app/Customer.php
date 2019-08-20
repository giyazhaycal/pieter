<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    public function orders()
    {
    	$orders = Orders::where('customer_id', $this->id)->get();
    	if ($orders) {
    		return $orders;
    	}else{
    		return false;
    	}
    }
}
