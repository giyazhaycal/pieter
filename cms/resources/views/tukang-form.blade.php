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
                                @if($tukang->is_active != 1)
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input type="submit" name="active" class="btn btn-success btn-sm btn-block" value="Active">
                                    </div>
                                </div>
                                @endif
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input type="submit" name="discard" class="btn btn-danger btn-sm btn-block" value="Discard">
                                    </div>
                                </div>
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