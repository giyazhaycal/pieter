<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Customer;
use Carbon\Carbon;

// use Excel;

class CustomerController extends Controller
{
    public function getCustomer()
    {
    	$data['customer'] = Customer::get();
    	$data['title'] = 'List Customer';

    	return view('customer', $data);
    }

    public function datatable(Request $request)
    {
        $customer = Customer::query();
        return DataTables::eloquent($customer)
        // ->editColumn('is_banned', function($row) {
        //     return $row->is_banned ? '<span class="label label-warning">Banned</span>' : '<span class="label label-success">Active</span>';
        // })
        ->addColumn('action', function ($row) {
            return '<div class="btn-group">
                        <a href="'.url('customer/form').'/'.$row->user_cid.'" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                    </div>';
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function form($id = null)
    {
    	if (!empty($id)) {
    		$cust = Customer::where('id', $id)->first();
    	}else{
    		$cust = new Customer;
    	}

    	$data['customer'] = $cust;

    	return view('customer-form', $data);

    }
}
