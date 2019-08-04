<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    public function tukang()
    {
        return $this->hasOne('App\Tukang','tukang_id','tukang_id');
    }

    public function item()
    {
        return $this->hasMany('App\OrdersItem','order_id','order_id');
    }

    public function getStatus()
    {
    	$status = $this->status;

    	if ($status == 0 ) {
    		return 'Menunggu';
    	}elseif ($status == 1 ) {
    		return 'Diterima';
    	}elseif ($status == 2 ) {
    		return 'Done';
    	}elseif ($status == 3) {
    		return 'Dibatalkan';
    	}elseif ($status == 4){
    		return 'Tukang tidak merespon';
    	}
    }
}
