@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-8 panel panel-default">
            <div class="panel-heading">
                Riwayat Pesanan
            </div>
            <div class="panel-body">
				@if(count($orders) > 0)
            	Hai, kamu mempunyai {{ count($orders) }} buah permintaan yang menunggu tanggapan..!

	            <table class="table table-default">
                    <thead>
                        <th>#</th>
                        <th>Order code</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Price</th>
                        <th>Status</th>
                        {{-- <th>Action</th> --}}
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $row)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $row->order_code }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>Rp {{ number_format($row->total ) }}</td>
                            <td>{{ $row->getStatus() }}</td>
                            {{-- <td>
                            	<a href="{{ url('order/'.$row->order_id) }}">Lihat</a>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>Belum ada permintaan untukmu :(</p>
            	@endif
            	
            </div>
            
        </div>
    </div>
</div>
@endsection
