<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provinsi;
class ProvinceController extends Controller
{
    public function province()
    {
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "http://dev.farizdotid.com/api/daerahindonesia/provinsi"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        $output = curl_exec($ch); 
        $output = json_decode($output);

        // close curl resource to free up system resources 
        curl_close($ch); 
        

        foreach ($output->semuaprovinsi as $key => $value) {
        	$data = New Provinsi;
        	$data->id_provinsi = $value->id;
        	$data->nama = $value->nama;
        	$data->save();
        }

        dd('done');
    }

}


