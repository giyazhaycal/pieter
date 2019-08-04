<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;

class AccountController extends Controller
{
    public function getHistory(Request $request)
    {
         $data['orders'] = Orders::where('tukang_id', $request->user()->tukang_id)->get();

        return view('account-history', $data);
    }

}


