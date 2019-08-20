@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(Auth::user()->message)
            <h1>Maaf, {{Auth::user()->message}}  . :(</h1>
            <p>Mohon Perbaiki kembali </p>
            @else
            <h1>Completing Your Data :)</h1>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Enter your data</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('check/update') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="tukang_id" value="{{ Auth::user()->tukang_id }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-5 control-label">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>
                                <small>sesuai KTP</small>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-5 control-label">Alamat Lengkap</label>
                            <div class="col-md-6">
                                <textarea name="alamat" class="form-control" required></textarea>
                            </div>
                        </div>
{{-- 
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-5 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="last_name" value="{{ old('name') }}" required autofocus>

                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label for="name" class="col-md-5 control-label">Provinsi</label>
                            <div class="col-md-6">
                                <select name="provinsi" class="form-control" required>
                                    <option>-  Pilih Provinsi - </option>
                                    @foreach($province as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-5 control-label">Tanggal Lahir</label>
                            <div class="col-md-6">
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-5 control-label">Price per Day (IDR)</label>
                            <div class="col-md-6">
                                <input type="number" name="price_per_day" class="form-control" required>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label for="name" class="col-md-5 control-label">Price per Hour (IDR)</label>
                            <div class="col-md-6">
                                <input type="number" name="price_per_hour" class="form-control" required>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label for="name" class="col-md-5 control-label">Upload Foto Selfie Mu Disini!</label>
                            <div class="col-md-6">
                                <input type="file" name="img_selfie">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-5 control-label">Upload Foto Selfie KTP Mu Disini !</label>
                            <div class="col-md-6">
                                <input type="file" name="img_ktp">
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
