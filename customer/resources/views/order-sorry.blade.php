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
                  Oops Sorry!
              </div>
              <div class="panel-body">
                  Maaf, sepertinya anda memiliki pesanan yang belum diselesaikan, anda harus menyelesaikan pesanan untuk membuat pesanan baru, terima kasih
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

