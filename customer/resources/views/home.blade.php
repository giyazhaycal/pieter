@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
<style type="text/css">
    body{
        background-image: url({{asset('img/pict3.jpg')}});
        background-size: cover;
    }
    .control-label{
        color: white
    }
    .mg-bt{
        margin-bottom: 10px;
    }
    .pd-no{
        padding: 2px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Let's Start!</div>
                <div class="panel-body">
                    <div class="col-sm-12 mg-bt">
                        Carilah tukang disekitar andaa!
                    </div>
                    <div class="col-sm-12 mg-bt">
                        <form>
                            <div class="col-sm-3 pd-no">
                                <select name="provinsi" class="form-control" id="provinsi" required>
                                    <option value="">Provinsi</option>
                                    @foreach($provinsi as $key => $row)
                                    <option value="{{$row->id_provinsi}}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 pd-no">
                                <select name="kota" class="form-control" id="kota">
                                    <option value="">Pilih Kota</option>
                                    <option>Tangerang</option>
                                </select>
                            </div>
                            <div class="col-sm-3 pd-no">
                                <select name="kota" class="form-control" id="kecamatan">
                                    <option value="">Pilih Kecamatan</option>
                                    <option>Tangerang</option>
                                </select>
                            </div>
                            <div class="col-sm-3" style="padding: 0px">
                                <button type="submit" class="btn btn-primary btn-block">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if($search)
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Menampilkan {{ count($tukang) }} hasil pencarian untuk provinsi: {{ $search_province}}</div>
                <div class="panel-body">
                    @foreach($tukang as $key => $row)
                    <ul class="list-group">
                        <li class="list-group-item" style="overflow: hidden">
                            <div class="col-sm-3">
                                <img src="{{ asset('img/user.PNG')}}" style="width: 10rem">
                            </div>
                            <div class="col-sm-9">
                                <h3 style="font-size: 3rem; margin:0px; padding: 0px">{{ strtoupper($row->name) }}</h3>
                                <p style="margin: 0px"><i>Rp {{ number_format($row->price_per_day) }} / Day</i></p>
                                <p>{{ getProvince($row->province)->nama }}</p>
                                <p><a href="{{ url('order/'.$row->tukang_id)}}" class="btn-link">Order</a></p>
                            </div>
                        </li>
                    </ul>
                    @endforeach                    
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
