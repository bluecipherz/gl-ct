
<div class="col-lg-12 col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Customers
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Active</th>
                </tr>
                @forelse($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
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