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
            <div class="panel panel-primary ">
              <div class="panel-heading">
                  Order History
              </div>
              <div class="panel-body">
                  <div class="col-md-2">
                    
                  </div>
                  <div class="col-md-8">
                    <table class="table table-default">
                        <thead>
                            <th>#</th>
                            <th>Order code</th>
                            <th>Tukang</th>
                            <th>Price</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach($order as $key => $row)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ $row->order_code }}</td>
                                <td>{{ $row->tukang->name }}</td>
                                <td>Rp {{ number_format($row->total ) }}</td>
                                <td>{!! $row->getStatus($row->order_id) !!}</td>
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
@endsection

