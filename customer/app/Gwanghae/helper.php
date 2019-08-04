<?php 

function helpProvince($id = null)
{
    if ($id) {
	    $data = \App\Provinsi::where('id_provinsi', $id)->first();
    }else{
        $data = \App\Provinsi::get();
    }
    return $data;
}

function helpKota($id_provinsi = null, $id_kota = null)
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

function helpKecamatan($id_kota = null, $id_kecamatan = null)
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

?>