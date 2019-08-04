<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Provinsi, Tukang, Orders, OrdersItem};
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getOrder(Request $request, $id)
    {

        $data['tukang'] = Tukang::where('tukang_id', $id)->first();

        return view('order', $data);
    }

    public function doOrder(Request $request, $id)
    {
        // dd($request->all());
        $tukang = Tukang::where('tukang_id', $id)->first();
        $users = $request->user();

        // cari order user apakah masih ada yang pending?
        $cek = Orders::where('status', 0)->where('customer_id', $users->id)->orWhere('email', $users->email)->get();
        // dd($cek);
        // kalau ada yang pending, maka user tidak dapat melakukan pemesanan
        if (count($cek) > 0) {
            return redirect('undone');
        }

        // 

        $date = $request->date;
        // cek apakah tanggal bentrok
        $bentrok = array();
        $bentrok_status = false;
        foreach ($date as $key => $value) {
            $tgl =  Carbon::parse($value)->format('Y-m-d') ;
            $item_date = OrdersItem::where('status', '!=', 4)->where('tukang_id', $id)->where('date', $tgl)->get();
            if (count($item_date) > 0) {
                array_push($bentrok, $tgl);
                $bentrok_status = true;
            }
        }

        if ($bentrok_status) {
            return redirect()->back()->withErrors([ $bentrok]);
        }

        $hitung = Orders::get();
        
        // create orders
        $orders = new Orders;
        $orders->order_code = 'ET'.date('Ymd').(count($hitung)+1);
        $orders->tukang_id = $id;
        $orders->customer_id = $users->id;
        $orders->name = $request->nama;
        $orders->email = $request->email;
        $orders->job_desc = $request->job_desc;
        $orders->price = (int)$tukang->price_per_day;
        $orders->status = 0;
        $orders->save();

        $subtotal = 0;

        foreach ($date as $key => $value) {
            $new_order = new OrdersItem;
            $new_order->date = Carbon::parse($value)->format('Y-m-d');
            $new_order->tukang_id = $id;
            $new_order->order_id = $orders->order_id;
            $new_order->order_code = $orders->order_code;
            $new_order->price = (int)$tukang->price_per_day;
            $new_order->status = 0;
            $new_order->save();
            $subtotal = (int)$subtotal +(int)$new_order->price;
        }

        $orders->total = $subtotal;
        $orders->save();

        return redirect('success?order='.$orders->order_code);
    }

    public function getUndone()
    {
        return view('order-sorry');
    }

    public function getSuccess(Request $request)
    {

        $data['order'] = Orders::where('order_code', $request->order)->first();
        return view('success', $data);
    }

}

