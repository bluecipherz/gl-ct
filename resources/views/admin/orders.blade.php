<div class="col-lg-12 col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Orders
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Customer</th>
                    <th>Items</th>
                    <th>Total</th>
                </tr>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>
                        @foreach($order->orderItems as $item)
                        {{ $item->product->name . 'x' . $item->quantity }}
                        @endforeach
                        </td>
                        <td>{{ $order->orderItems->sum('price') }}</td>
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