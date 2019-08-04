@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/id.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>

<script>
$( function() {
    var array = ["2019-08-14","2019-08-15","2019-08-16"]
    $( ".datepicker" ).datepicker({
            beforeShowDay: function(date){
            // var string = formatDate('yy-mm-dd', date);
            var string = moment().format('yy-mm-dd');  ;
            return [ array.indexOf(string) == -1 ]
        }
    });
} );
</script>
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
                    <h3>Form Pemesanan Tukang</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        {{ csrf_field() }}

                        <div class="col-sm-3 text-center">
                            <img src="{{ asset('img/user.PNG')}}" style="width: 10rem">
                            <p style="margin-top: 10px; text-align: center;">{{ strtoupper($tukang->name) }} {{ strtoupper($tukang->last_name) }}</p>
                        </div>  
                        <div class="col-sm-6">
                            @if(count($errors->messages()))
                            <div class="alert alert-danger">
                                <h4>Tukang ini tidak dapat dipesan pada:</h4>
                                {{-- {{dd($errors->messages())}} --}}
                                @foreach($errors->messages() as $key => $row)
                                <p>{{ $row[$key] }}</p>
                                @endforeach
                            </div>
                            @endif
                            <h4 style="margin-bottom: 20px">Rp {{ number_format($tukang->price_per_day) }} / Days</h4>
                            <div class="form-group">
                                <label>Nama Pemesan</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Pekerjaan</label>
                                <textarea name="job_desc" class="form-control" placeholder="Jelaskan deskripsi pekerjaan singkat disini.." required></textarea>
                            </div>
                            <div id="dates">
                                <label>Pilih tanggalnya!</label>
                                <div class="form-group" id="form-date" style="overflow: hidden">
                                    <div class="col-xs-9" style="padding: 0px">
                                        <input type="text" id="datepicker" class="form-control datepicker" name="date[]" placeholder="pilih tanggal.." required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 20px">
                                <button type="button" class="btn btn-primary btn-sm new-date">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Pesan</button>
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
    <script type="text/javascript">

        $('.new-date').on('click', function() {
            var dates = '<div class="form-group next" id="form-date" style="overflow:hidden">';
            dates += '<div class="col-xs-9" style="padding: 0px"><input type="text" id="datepicker" class="form-control datepicker" name="date[]" placeholder="pilih tanggal" required></div>'
            dates += '<div class="col-xs-2" style="padding: 0px"><button type="button" class="btn btn-danger" onclick="return deleteDates(this);">Cancel</button></div>';
            dates += '</div>';
            $('#dates').append(dates);
            $( ".datepicker" ).datepicker();
        })

        function deleteDates(obj)
        {
            if(confirm('Delete this?')) {
                $(obj).parents('.next').remove();
            } else {
                return;
            }
        }

    </script>
@endsection