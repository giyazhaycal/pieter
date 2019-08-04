<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;

class OrderController extends Controller
{
    public function getOrder(Request $request, $id)
    {
      $data['order'] = Orders::where('order_id', $id)->first();
      return view('order-details', $data);
    }

    public function doOrder(Request $request, $id)
    {

        $order = Orders::where('order_id', $id)->first();
        if ($order) {
          $order->status = 1;
          $order->save();
        }

        return redirect('dashboard');
      
    }

}


