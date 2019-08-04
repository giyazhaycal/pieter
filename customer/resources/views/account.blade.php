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
                  Account
              </div>
              <div class="panel-body">
                  <div class="col-md-2">
                    
                  </div>
                  <div class="col-md-8">
                    <form>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                    </form>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

