@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2 panel panel-default">
            <div class="panel-heading">
                My Profile
            </div>
            
        </div>
        <div class="col-md-8 panel panel-default">
            <div class="panel-heading">
                Pengaturan Lapak
            </div>
            <div class="panel-body">
                <form method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama Pemesan</label>
                        <input type="text" name="" value="{{ $order->name }} " readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kode Pesanan</label>
                        <input type="text" name="" value="{{ $order->order_code }} " readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="" value="{{ number_format($order->total) }} " readonly class="form-control">
                    </div>

                    <table class="table table-default">
                        <thead>
                            <th>Tanggal</th>
                            <th>Price</th>
                        </thead>
                        <tbody>
                        @foreach($order->item as $row)
                            <tr>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-block">Kerjakan Pesanan Ini?</button>
                    </div>
                </form>

            </div>
            
        </div>
    </div>
</div>
@endsection
