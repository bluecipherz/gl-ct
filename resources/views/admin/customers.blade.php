@extends('layouts.admin')

@section('content')
<div class="col-lg-12 col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Customers
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Email</th>
                    <th>Advertisements</th>
                    <th>Active</th>
                </tr>
                @forelse($customers as $customer)
                    <tr>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->advertisements()->count() }}</td>
                        <td>{{ $customer->active }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Customers</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
@stop