<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provinsi;
use App\Orders;

class AccountController extends Controller
{
    public function getAccount(Request $request)
    {
  		$data['province'] = $this->getProvince();
  		$data['user'] = $request->user();
       return view('account', $data);
    }

    public function getHistory(Request $request)
    {
  		$data['order'] = Orders::where('customer_id', $request->user()->id)->get();
       return view('account-history', $data);
    }

}


