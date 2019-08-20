<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tukang extends Model
{
    protected $table = 'users_tukang';
    protected $primaryKey = 'tukang_id';

    public function getImg($file = null)
    {
    	return env('STORAGE_BASE_URL').'/user/'.$file;
    }

    public function getProvince()
    {
    	$prov = Provinsi::where('id_provinsi', $this->province)->first();
    	if ($prov) {
    		# code...
    		return $prov->nama;
    	}
    	else{
    		return 'Provinsi belum dipilih';
    	}
    }

    public function orders()
    {
    	$orders = Orders::where('tukang_id', $this->tukang_id)->get();
    	if ($orders) {
    		return $orders;
    	}else{
    		return false;
    	}
    }
}
