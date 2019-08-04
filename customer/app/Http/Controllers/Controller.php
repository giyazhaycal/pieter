<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getProvince($id = null)
	{
	    if ($id) {
		    $data = \App\Provinsi::where('id_provinsi', $id)->first();
	    }else{
	        $data = \App\Provinsi::get();
	    }
	    return $data;
	}

	public function getKota($id_provinsi = null, $id_kota = null)
	{
	    if ($id_provinsi) {
		    $data = \App\Kota::where('id_provinsi', $id)->get();
	    }else if($id_kota){
	        $data = \App\Kota::where('id_kota', $id)->first();;
	    }else{
	        $data = \App\Kota::get();
	    }
	    return $data;
	}

	public function getKecamatan($id_kota = null, $id_kecamatan = null)
	{
	    if ($id_kota) {
		    $data = \App\Kota::where('id_provinsi', $id)->get();
	    }else if($id_kecamatan){
	        $data = \App\Kota::where('id_kecamatan', $id)->first();;
	    }else{
	        $data = \App\Kota::get();
	    }
	    return $data;
	}

}
