<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class CheckController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request->user()->is_complete == 0) {
            return redirect('complete-first');
        }elseif ($request->user()->active == 0) {
            return redirect('waiting');
        }

        return view('dashboard');
    }

    public function completeData()
    {
        

        $data['province'] = $this->getProvince()->semuaprovinsi;
        // dd($data['province']);

        return view('complete-first', $data);
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

    public function doUpdate(Request $request)
    {
        $user = User::where('tukang_id', $request->tukang_id)->first();
        $user->last_name = $request->last_name;
        $user->province = $request->provinsi;
        $user->dob = $request->dob;
        $user->price_per_day = $request->price_per_day;
        $user->price_per_hour = $request->price_per_hour;
        $user->is_complete = 1;
        $user->save();

        return redirect('chek');

    }
}
