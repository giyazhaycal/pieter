@extends('layouts.app')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
{{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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
    .disabled{
    color:#cecece;
    }
    #picker{
        width:12em;
        margin:1em;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ strtoupper($tukang->name) }} {{ strtoupper($tukang->last_name) }} </h1>
                </div>
                <div class="panel-body">
                    <form>
                        <div class="col-sm-3">
                            <img src="{{ asset('img/user.PNG')}}" style="width: 10rem">
                        </div>  
                        <div class="col-sm-6">
                            <p>Rp {{ number_format($tukang->price_per_day) }} / Days</p>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="example-daterange1">Pick Your Dates</label>
                                <div class="col-md-8">
                                    <div class="input-daterange input-group" data-date-format="mm/dd/yyyy">
                                        <input class="form-control" type="text" id="example-daterange1" name="date-start" placeholder="From">
                                        <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                        <input class="form-control" type="text" id="" name="date-finish" placeholder="To">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('bottom_script')
{{--  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script><script type="text/javascript" src="code.jquery.com/jquery-migrate-1.1.0.js"></script> --}}

@endsection