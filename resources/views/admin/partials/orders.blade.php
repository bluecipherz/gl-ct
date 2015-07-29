
<div class="col-lg-12 col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Orders
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>User</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Order Date</th>
                </tr>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->product_id }}</td>
                        <td>{{ $order->qty }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No orders</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>