
<div class="col-md-12 col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			Latest Transactions
		</div>
		<div class="panel-body">
			<table class="table">
				<tr>
					<th>Order</th>
					<th>Amount</th>
				</tr>
				@forelse($transactions as $transaction)
				<tr>
					<td>{{ $transaction->order_id }}</td>
					<td>{{ $transaction->amount }}</td>
				</tr>
				@empty
				<tr>
					<td colspan="2">No Transactions</td>
				</tr>
				@endforelse
			</table>
		</div>
	</div>
<div>