@extends('layouts.admin')

@section('content')
<div class="col-lg-12 col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Shippers
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Cost / KM</th>
                    <th>Total Shippings</th>
                </tr>
                @forelse($shippers as $shipper)
                    <tr>
                        <td>{{ $shipper->name }}</td>
                        <td>{{ $shipper->cost }}</td>
                        <td>{{ '0' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Shippers</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Shipments
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Order</th>
                    <th>Shipper</th>
                    <th>Status</th>
                </tr>
                @forelse($shipments as $shipment)
                    <tr>
                        <td>{{ $shipment->order_id }}</td>
                        <td>{{ $shipment->shipper_id }}</td>
                        <td>{{ $shipment->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Shipments</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>

@stop