@extends('layouts.app')

@section('title')
	Customer
@endsection

@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                View Customer
            </h1>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <form id="f-customer" method="post" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <!-- Material Register -->
                <div class="block block-themed">
                    <div class="block-content">
                        <div class="form-horizontal push-10-t push-10">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" id="name" type="text" name="name" placeholder="Enter name" value="{{ $customer->name . ' ' . $customer->last_name}}" readonly />
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" id="email" type="text" name="email" placeholder="Enter email" value="{{ $customer->email }}" readonly />
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END Material Register -->
            </div>
                        <div class="col-md-6">
                <div class="block block-themed">
                    <div class="block-content">
                        <div class="form-horizontal push-10-t push-10">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label>Riwayat Order</label>
                                    @if($customer->orders())
                                    <table class="table table-default">
                                        <thead>
                                            <th>#</th>
                                            <th>email cust</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Tgl</th>
                                        </thead>
                                        <tbody>
                                            @foreach($customer->orders() as $row)
                                            <tr>
                                                <td>{{ $row->order_code}}</td>
                                                <td>{{ $row->email}}</td>
                                                <td>{{ $row->total}}</td>
                                                <td>{!! $row->getStatus() !!}</td>
                                                <td>{{ $row->created_at }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>Belum ada order</p>
                                    @endif
                                    
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <!-- Material Register -->
                <div class="block block-themed">
                    <div class="block-content" style="overflow-y: auto; max-height: 650px;">
                        <table class="table table-condensed">
                            <thead> 
                                <tr>
                                    <th>No.</th>
                                    <th>Order No</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="notify">
                                @foreach ($customer->order as $key => $element)
                                    @php
                                        $label = 'label-warning';

                                        if($element->status == config('mineral.order_status_payment_received'))
                                        {
                                            $label = 'label-success';
                                        }
                                        else if($element->status == config('mineral.order_status_shipped'))
                                        {
                                            $label = 'label-info';
                                        }
                                        else if($element->status == config('mineral.order_status_canceled') || $element->status == config('mineral.order_status_expired'))
                                        {
                                            $label = 'label-default';
                                        }

                                        $status =  '<span class="label '.$label.'">'.$element->getStatus().'</span>';
                                    @endphp
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><a href="{{ $element->getUrl() }}" title="See details...">{{ $element->order_code }}</a></td>
                                        <td>{{ $element->created_at }}</td>
                                        <td>{!! $status !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- END Material Register -->
            </div> --}}
        </div> 
{{--         <div class="row">
            <div class="col-md-6">
                <!-- Material Register -->
                <div class="block block-themed">
                    <div class="block-content">
                        <div class="form-horizontal push-10-t push-10">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        @php
                                            $failed = $customer->order()
                                                ->whereIn('status', [
                                                    config('mineral.order_status_canceled'),
                                                    config('mineral.order_status_expired')
                                                ])
                                                ->count();
                                        @endphp
                                        <input class="form-control" id="order_failed" type="text" name="order_failed" value="{{ $failed }}" readonly />
                                        <label for="order_failed">Order Failed</label>
                                    </div>
                                </div>
                            </div>

                            @if ($failed >= 3)
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <label class="css-input switch switch-sm switch-success">
                                        <input type="checkbox" name="is_banned" {{ ($customer->is_banned == 1 ? "checked" : "") }} /><span></span> Ban this customer?
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-success" type="submit"><i class="si si-check push-5-r"></i> Save</button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- END Material Register -->
            </div>
        </div>  --}}
{{--         <div class="row">
            <div class="col-md-6">
                <!-- Material Register -->
                <div class="block block-themed">
                    <div class="block-content">
                        <div class="form-horizontal push-10-t push-10">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" id="new_password" type="text" name="new_password" value="" readonly />
                                        <label for="new_password">Set new password</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button id="generate" class="btn btn-success" type="button" title="Click to generate code" onclick="return makeCode();"><i class="si si-chemistry push-5-r"></i> Generate </button> &nbsp;
                                    <button id="save_password" class="btn btn-success" type="button" style="display: none;"><i class="si si-check push-5-r"></i> Save</button>
                                </div>
                            </div>

                            <div class="alert alert-success alert-dismissable" style="display: none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p>Success, password updated! Dont forget to send this new password to customer.</p>
                            </div>

                            <div class="alert alert-danger alert-dismissable" style="display: none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p>Oops, something wrong! please refresh page and try again.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Material Register -->
            </div>
        </div>  --}}
    </form>
</div>

@endsection