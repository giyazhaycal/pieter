<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Tukang;
use Carbon\Carbon;

// use Excel;

class TukangController extends Controller
{
    public function getTukang()
    {
    	$data['tukang'] = Tukang::get();
    	$data['title'] = 'List Tukang';

    	return view('tukang', $data);
    }

    public function datatable(Request $request)
    {
        $tukang = Tukang::orderBy('tukang_id');
        return DataTables::eloquent($tukang)
        ->editColumn('is_complete', function($row) {
            return $row->is_complete ? '<span class="label label-success">Lengkap</span>' : '<span class="label label-warning">Belum Lengkap</span>';
        })
        ->editColumn('is_active', function($row) {
            return $row->is_active ? '<span class="label label-success">Aktif</span>' : '<span class="label label-warning">Belum Aktif</span>';
        })
        ->addColumn('action', function ($row) {
            return '<div class="btn-group">
                        <a href="'.url('tukang/form').'/'.$row->tukang_id.'" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                    </div>';
        })
        ->rawColumns(['action', 'is_complete', 'is_active'])
        ->toJson();
    }

    public function showTukang($id = null)
    {
    	if (!empty($id)) {
    		$tukang = Tukang::where('tukang_id', $id)->first();
    	}else{
    		$tukang = new Tukang;
    	}

    	$data['tukang'] = $tukang;

    	return view('tukang-form', $data);

    }

    public function doTukang(Request $request)
    {
        
        $tukang = Tukang::where('tukang_id', $request->tukang_id)->first();
        if ($request->has('active')) {
            $tukang->is_active = 1; 
            $tukang->message = null; 
        }elseif($request->has('recheck')) {
            # code...
            $tukang->is_complete = 0; 
            $tukang->message = $request->message; 
        }

        $tukang->save();

        return redirect('tukang/form/'.$tukang->tukang_id);

    }
}
