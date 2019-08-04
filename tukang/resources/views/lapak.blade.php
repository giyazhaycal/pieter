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
                <form action="{{ url('lapak') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Area</label>
                            <select class="form-control" name="province">
                                <option>-Choose Province-</option>
                                @foreach($province->semuaprovinsi as $row)
                                <option value="{{$row->id}}" {{ $user->province == $row->id ? 'selected' : '' }}>{{ $row->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Price Per Day (IDR)</label>
                            <input type="number" name="price_per_day" class="form-control" value="{{ $user->price_per_day }}">
                        </div>
                        <div class="col-md-6">
                            <label>Price Per Hour (IDR)</label>
                            <input type="number" name="price_per_hour" class="form-control" value="{{ $user->price_per_hour }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Operate</label>
                            <input type="checkbox" name="operate" {{ $user->is_operate ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12" style="margin-top: 10px">
                            <button type="submit" class="btn btn-success btn-block">Simpan Perubahan</button>
                        </div>
                    </div>
                    
                </form>

            </div>
            
        </div>
    </div>
</div>
@endsection
