<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\OrdersItem;

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
    // public function index()
    // {
    //     return view('home');
    // }

    public function waiting(Request $request)
    {
        if ($request->user()->is_complete == 0) {
            return redirect('complete-first');
        }elseif($request->user()->is_active == 1){
            return redirect('dashboard');
        }

        return view('waiting');
    }

    public function dashboard(Request $request)
    {
        if ($request->user()->is_complete == 0) {
            return redirect('complete-first');
        }elseif ($request->user()->is_active == 0) {
            return redirect('waiting');
        }

        $data['orders'] = Orders::where('tukang_id', $request->user()->tukang_id)->where('status', 0)->get();

        return view('dashboard', $data);
    }

}
