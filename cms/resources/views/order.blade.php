@extends('layouts.app')

@section('title')
    Tukang
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('asset') }}/js/plugins/datatables/jquery.dataTables.min.css">
    <style>
    .js-dataTable-mineral td:last-child{
        text-align: center;
    }
</style>
@endsection

@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                List {{ $type ? $type : 'All'}} Order <a href="{{ url('export/'.$type) }}"  class="btn btn-dark">Export</a>

                {{-- <a href="{{ url('order/export') }}" class="btn btn-success push-5-l"><i class="fa fa-plus"></i> Export Tukang</a> --}}
            </h1>

        </div>
    </div>
</div>

<div class="content">
    <!-- Dynamic Table Full Pagination -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">List of Orders</h3>
        </div>
        <div class="block-content">
            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/base_tables_datatables.js -->
            <table class="table table-bordered table-striped" id="order-table">
                <thead>
                    <tr>
                        <th>Nomor Order</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection

@section('footer_scripts')
<!-- Page JS Plugins -->
<script src="{{ asset('asset/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">
    @if($type)
    var ajax_url = '{{ url("orders/datatable/".$type) }}';
    @else
    var ajax_url = '{{ url("orders/datatable") }}';
    @endif
    $('#order-table').DataTable({
        'ajax' : ajax_url,
        'columns' : [
            { data: 'order_code', name: 'order_code' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        // 'columnDefs' : [ { orderable: false, targets: [ 4 ] } ],
        'pageLength' : 10,
        'lengthMenu' : [[5, 10, 15, 20], [5, 10, 15, 20]],
    });

</script>
<!-- Page JS Code -->
<script src="{{ asset('asset/js/pages/base_tables_datatables.js') }}"></script>
</script>
@endsection