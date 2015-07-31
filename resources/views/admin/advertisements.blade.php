@extends('layouts.admin')

@section('content')
<div class="col-lg-12 col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Reseller ads
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Product Name</th>
                    <th>Brand Name</th>
                    <th>Cost</th>
                </tr>
                @forelse($advertisements as $ad)
                    <tr>
                        <td>{{ $ad->name }}</td>
                        <td>{{ $ad->brand }}</td>
                        <td>{{ $ad->cost }}</td>
                    </tr>
                @empty
                <tr>
                    <td colspan="3">No advertisements</td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
@stop