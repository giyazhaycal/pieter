<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class LapakController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getLapak(Request $request)
    {
        $data['province'] = $this->getProvince();
        $data['user'] = $request->user();
        return view('lapak', $data);
    }

    public function doLapak(Request $request)
    {
        $user = $request->user();
        $user->province = $request->province;
        $user->price_per_day = $request->price_per_day;
        $user->price_per_hour = $request->price_per_hour;
        $user->is_operate = ($request->operate == 'on')? 1 : 0;
        $user->save();
        return redirect('lapak');
        
    }

    public function getProvince()
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
        return $output;
    }



}
