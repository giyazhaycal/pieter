<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Orders;
use Carbon\Carbon;
use Excel;

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

    public function doReportOrder(Request $request, $type = null, $format='xls')
    {
        $this->type = $type;
        ini_set('memory_limit','256M');
        Excel::create('E-Tekang - Report Order '. date('Y-m-d Hi'), function($excel) {

            $excel->sheet('Sheet1', function($sheet) {
                $row = 1; // baris pertama
                $sheet->row($row, array(
                    'No', 
                    'Nomor Order', 
                    'ID Tukang',
                    'ID Customer',
                    'Email', 
                    'Name',  
                    'Price', 
                    'total'
                )); 
                $sheet->row($row, function($row) {
                    $row->setBackground('#fff600');
                });

                $row++;
            
                // $orders = Order::whereBetween('created_at', [
                //     Carbon::createFromTimestamp(strtotime($request->input('started_at')))->startOfDay(), 
                //     Carbon::createFromTimestamp(strtotime($request->input('ended_at')))->endOfDay()
                // ]);

                if ($this->type) {
                    if ($type == 'Pending') {
                        $status = 0;
                    }elseif ($type == 'Accepted') {
                        $status = 1;
                    }elseif ($type == 'Completed') {
                        $status = 2;
                    }elseif ($type == 'Cancelled') {
                        $status = 3;
                    }
                    
                    $orders = Orders::where('status', $status)->get();
                }else{
                    $orders = Orders::get();
                }

                foreach ($orders as $value) 
                {
                    $sheet->row($row, array(
                            $row-1, // No 
                            $value->order_code, // ID
                            $value->tukang_id, // Email
                            $value->customer_id, // Email
                            $value->email, // Name
                            $value->name, // Name
                            $value->price, // Item Value
                            $value->total, // Item Value
                           
                        ));
                        $row++;                    

                }

            });

        })
        ->download($format);

    }  
}
