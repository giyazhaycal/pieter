<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Orders;
use Carbon\Carbon;

// use Excel;

class OrderController extends Controller
{
    public function getOrder($type = null)
    {

    	// $data['order'] = Orders::get();
    	$data['type'] = ucfirst($type);
        
    	return view('order', $data);
    }

    public function getDatatable(Request $request, $type = null)
    {
        if ($type) {
            if ($type == 'Pending') {
                $status = 0;
            }elseif ($type == 'Accepted') {
                $status = 1;
            }elseif ($type == 'Completed') {
                $status = 2;
            }elseif ($type == 'Cancelled') {
                $status = 3;
            }
            
            $order = Orders::where('status', $status);
        }else{
            $order = Orders::query();
        }
        return DataTables::eloquent($order)
        ->editColumn('status', function($row) {
            return $row->getStatus();
        })
        ->addColumn('action', function ($row) {
            return '<div class="btn-group">
                        <a href="'.url('order/form').'/'.$row->order_id.'" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                    </div>';
        })
        ->rawColumns(['action', 'status'])
        ->toJson();
    }

    public function showOrder($id = null)
    {
    	$data['order'] = Orders::where('order_id', $id)->first();

    	return view('order-form', $data);

    }
}
