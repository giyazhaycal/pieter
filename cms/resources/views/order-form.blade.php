@extends('layouts.app')

@section('title')
	Customer
@endsection

@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Detail Order
            </h1>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <form id="f-customer" method="post" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="block block-themed">
                    <div class="block-content">
                        <div class="form-horizontal push-10-t push-10">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Nomor Pesanan:</label>
                                    <h2>{{ $order->order_code}}</h2>
                                </div>
                                <div class="col-md-4">
                                    <label>Total</label>
                                    <h5> IDR {{ number_format($order->total)}} </h5>
                                </div>
                                <div class="col-md-4">
                                    <label>Status Pesanan:</label>
                                    <h5>{!! $order->getStatus() !!}</h5>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Tukang  </b>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material">
                                    <input type="text" class="form-control" readonly value="{{ $order->tukang->name}}">  
                                    <label>Nama</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material">
                                    <input type="text" class="form-control" value="{{ $order->tukang->email }}" readonly>  
                                    <label>Email</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Customer</b>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material">
                                    <input type="text" class="form-control" readonly value="{{ $order->customer->name}}">  
                                    <label>Nama</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material">
                                    <input type="text" class="form-control" value="{{ $order->customer->email }}" readonly>  
                                    <label>Email</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="block block-themed">
                    <div class="block-content">
                        <div class="form-horizontal push-10-t push-10">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input type="text" name="" class="form-control" value="{{ $order->job_desc }}" readonly>  
                                        <label>Rincian Pekerjaan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <table class="table table-default">
                                        <thead>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Biaya</th>
                                        </thead>
                                        <tbody>
                                            @foreach($order->item as $key => $row)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $row->date}}</td>
                                                <td>{{ $row->price }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
           {{--  <div class="col-md-6">
                <!-- Material Register -->
                <div class="block block-themed">
                    <div class="block-content">
                        <div class="form-horizontal push-10-t push-10">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" id="name" type="text" name="name" placeholder="Enter name" value="{{ $customer->name . ' ' . $customer->last_name}}" readonly />
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" id="email" type="text" name="email" placeholder="Enter email" value="{{ $customer->email }}" readonly />
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}
            
    </form>
</div>

@endsection