@extends('layouts.app')

@section('title')
	Tukang
@endsection

@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                View Tukang
            </h1>

        </div>
    </div>
</div>
<!-- END Page Header -->
@if($tukang->message && $tukang->is_complete == 0)
<div class="container">
    <div class="alert alert-warning">
    Perbaikan: {{ $tukang->message}}
    </div>
</div>
@endif
    
<!-- Page Content -->
<div class="content content-narrow">
    <form id="f-tukang" method="post" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <input type="hidden" name="tukang_id" value="{{ $tukang->tukang_id }}">
        <div class="row">
            @if($tukang->is_active == 2)
            <div class="alert alert-danger">
                <p>This Account has been suspended</p>
            </div>
            @endif
            <div class="col-md-6">
                <!-- Material Register -->
                <div class="block block-themed">
                    <div class="block-content">
                        <div class="form-horizontal push-10-t push-10">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" id="name" type="text" name="name" placeholder="Enter name" value="{{ $tukang->name . ' ' . $tukang->last_name}}" readonly />
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" id="email" type="text" name="email" placeholder="Enter email" value="{{ $tukang->email }}" readonly />
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" id="email" type="text" name="email" placeholder="Enter email" value="{{ $tukang->alamat }}" readonly />
                                        <label for="email">Alamat</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" id="email" type="text" name="email" placeholder="Enter email" value="{{ $tukang->getProvince() }}" readonly />
                                        <label for="email">Area Provinsi</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="block block-themed">
                    <div class="block-content">
                        <div class="form-horizontal push-10-t push-10">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label>Riwayat Order</label>
                                    @if($tukang->orders())
                                    <table class="table table-default">
                                        <thead>
                                            <th>#</th>
                                            <th>email cust</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Tgl</th>
                                        </thead>
                                        <tbody>
                                            @foreach($tukang->orders() as $row)
                                            <tr>
                                                <td>{{ $row->order_code}}</td>
                                                <td>{{ $row->email}}</td>
                                                <td>{{ $row->total}}</td>
                                                <td>{!! $row->getStatus() !!}</td>
                                                <td>{{ $row->created_at }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>Belum ada order</p>
                                    @endif
                                    
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
                                <div class="col-xs-6">
                                    @if($tukang->img_selfie))
                                    <img src="{{ $tukang->getImg($tukang->img_selfie)}}" style="max-width: 100%">
                                    @else
                                    <p>Image Belum Di Uplaod</p>
                                    @endif
                                    <label>Foto Selfie</label>                                    
                                </div>
                                <div class="col-xs-6">
                                    @if($tukang->img_ktp))
                                    <img src="{{ $tukang->getImg($tukang->img_ktp) }}" style="max-width: 100%">
                                    @else
                                    <p>Image Belum Di Uplaod</p>
                                    @endif
                                    <label>Foto KTP</label>                                    
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
                            @if($tukang->tukang_id)
                            <div class="form-group">
                                @if($tukang->is_active == 0)
                                <div class="col-xs-4">
                                    <div class="form-material">
                                        <input type="text" name="" class="form-control" value="Data sudah sesuai, tukang akan diaktifkan">
                                    </div>
                                    <div class="form-material">
                                        <input type="submit" name="active" class="btn btn-success btn-sm btn-block" value="Aktifkan? (Data Sesuai)">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-material">
                                        <select class="form-control" name="message">
                                            <option value="">Pesan</option>
                                            <option>Gambar Buram</option>
                                            <option>Gambar Yang di upload tidak sesuai</option>
                                            <option>Nama tidak sesuai KTP</option>
                                            <option>Alamat Berbeda</option>
                                            <option>Data tidak lengkap</option>
                                        </select>
                                    </div>
                                    <div class="form-material">
                                        <input type="submit" name="recheck" class="btn btn-danger btn-sm btn-block" value="Perbaiki Data">
                                    </div>
                                </div>
                                @endif
                                @if($tukang->is_active == 1)
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input type="submit" name="suspend" class="btn btn-warning btn-sm btn-block" value="Suspend">
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div> 
    </form>
</div>

@endsection