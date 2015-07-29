
<div class="col-lg-12 col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Pricing Rules
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Percent</th>
                    <th>Duration</th>
                </tr>
                @forelse($price_rules as $price_rule)
                    <tr>
                        <td>{{ $price_rule->name }}</td>
                        <td>{{ $price_rule->percent }}</td>
                        <td>{{ $price_rule->duration }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Price Rules</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>