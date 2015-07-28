
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
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->cost }}</td>
                    </tr>
                @empty
                <tr>
                    <td colspan="3">No products</td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>