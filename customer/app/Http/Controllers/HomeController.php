<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Provinsi, Tukang};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['provinsi'] = Provinsi::get();
        $data['search'] = 0;
        if (isset($request->provinsi)) {
            $data['search'] = 1;
            $id = $request->provinsi;
            $data['search_province'] = Provinsi::where('id_provinsi', $id)->first()->nama;
            $data['tukang'] = Tukang::where('province', $id)->where('is_operate', 1)->get();
        }

        return view('home', $data);
    }

}
