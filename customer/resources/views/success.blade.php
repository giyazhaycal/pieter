@extends('layouts.app')

@section('style')

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
            <div class="panel panel-default text-center">
              <div class="panel-heading">
                  Thank you!
              </div>
              <div class="panel-body">
                  <p>Nomor Order Anda:</p>
                  <h3>{{ $order->order_code }}</h3>
                  <p>Pesanan anda sudah berhasil dibuat, saat ini anda dapat menunggu tanggapan dari Tukang terkait.</p>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

