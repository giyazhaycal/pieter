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

    public function customer()
    {
        return $this->hasOne('App\Customer','id','customer_id');
    }

    public function item()
    {
        return $this->hasMany('App\OrdersItem','order_id','order_id');
    }

    public function getStatus()
    {
    	$status = $this->status;

    	if ($status == 0 ) {
    		return '<label class="label label-warning">Menunggu</label>';
    	}elseif ($status == 1 ) {
    		return '<label class="label label-success">Diterima</label>';
    	}elseif ($status == 2 ) {
    		return '<label class="label label-primary">Done</label>';
    	}elseif ($status == 3) {
    		return '<label class="label label-danger">Dibatalkan</label>';
    	}elseif ($status == 4){
    		return '<label class="label label-danger">Tukang tidak merespon</label>';
    	}
    }
}
