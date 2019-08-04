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

    public function getStatus()
    {
    	$status = $this->status;

    	if ($status == 1 ) {
    		return 'Menunggu';
    	}elseif ($status == 2 ) {
    		return 'Accepted';
    	}elseif ($status == 3 ) {
    		return 'Done';
    	}elseif ($status == 4) {
    		return 'Dibatalkan';
    	}elseif ($status == 5){
    		return 'Tukang tidak merespon';
    	}
    }
}
