@extends('layouts.admin')

@section('content')
<div class="col-lg-12 col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Reseller Advertisements
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Customer</th>
                </tr>
                @forelse($advertisements as $ad)
                    <tr>
                        <td>{{ $ad->title }}</td>
                        <td>{{ str_limit($ad->description, 50) }}</td>
                        <td>{{ $ad->quantity }}</td>
                        <td>{{ $ad->customer->name }}</td>
                    </tr>
                @empty
                <tr>
                    <td colspan="4">No advertisements</td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
@stop