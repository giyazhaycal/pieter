@extends('layouts.app')

@section('title')
	Customer
@endsection

{{-- @section('style')
	<link rel="stylesheet" href="{{ asset('asset') }}/js/plugins/datatables/jquery.dataTables.min.css">
@endsection --}}

@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Customer List
                {{-- <a href="{{ url('customer/export') }}" class="btn btn-success push-5-l"><i class="fa fa-plus"></i> Export Customer</a> --}}
            </h1>

        </div>
    </div>
</div>

<div class="content">
    <!-- Dynamic Table Full Pagination -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">List of Customers</h3>
        </div>
        <div class="block-content">
            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/base_tables_datatables.js -->
            <table class="table table-bordered table-striped" id="customer-table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        {{-- <th class="text-center">Status</th> --}}
                        <th class="text-center">Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                	@php
                		$no = 1;
                	@endphp
                	@foreach($customer as $row)
                	<tr>
                		<td>{{ $no++ }}</td>
                		<td>{{ $row->name }}</td>
                		<td>{{ $row->email }}</td>
                		<td>{{ $row->created_at }}</td>
                		<td><a href="{{ url('customer/form/'.$row->id) }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a></td>
                	</tr>
                	@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection

@section('footer_scripts-')
<!-- Page JS Plugins -->
<script src="{{ asset('asset/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">
    var ajax_url = '{{ url("customer/datatable") }}';
    var dt_conf =  {
        'ajax' : ajax_url,
        'columns' : [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            // { data: 'is_banned', name: 'is_banned' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        // 'columnDefs' : [ { orderable: false, targets: [ 4 ] } ],
        'pageLength' : 10,
        'lengthMenu' : [[5, 10, 15, 20], [5, 10, 15, 20]],
    };
</script>
<!-- Page JS Code -->
<script src="{{ asset('asset/js/pages/base_tables_datatables.js') }}"></script>
</script>
@endsection