<div class="">
    <div class="panel panel-default">
        <div class="panel-heading">
            Reseller Advertisements
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Action</th>
                    <th>Id</th>
                    <th>Customer</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Name</th>
                    <th>PIN</th>
                    <th>Address</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Images</th>
                </tr>
                @forelse($advertisements as $ad)
                    <tr>
                        <td>
                            {!! Form::open(['route' => ['products.destroy', $ad->id], 'method' => 'DELETE']) !!}
                                <button class="btn btn-default btn-xs cat-del-btn" type="submit" title="Delete"><span class="glyphicon glyphicon-remove"></span></button>
                            {!! Form::close() !!}
                        </td>
                        <td>{{ $ad->id }}</td>
                        <td>{{ $ad->customer_id }}</td>
                        <td>{{ $ad->product->category_id }}</td>
                        <td>{{ $ad->product->title }}</td>
                        <td>{{ str_limit($ad->product->description, 50) }}</td>
                        <td>{{ $ad->product->price }}</td>
                        <td>{{ $ad->name }}</td>
                        <td>{{ $ad->pin }}</td>
                        <td>{{ $ad->address }}</td>
                        <td>{{ $ad->state }}</td>
                        <td>{{ $ad->city }}</td>
                        <td>{{ $ad->phone }}</td>
                        <td>{{ $ad->product->images->count() }}</td>
                    </tr>
                @empty
                <tr>
                    <td colspan="13">No advertisements</td>
                </tr>
                @endforelse
            </table>
            {!! $advertisements->render() !!}
        </div>
    </div>
</div>