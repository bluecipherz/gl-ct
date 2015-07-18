@extends('layouts.core')

@section('content')

<div class="boxx">
	<div class="overlay-content">
		<div class="cartWindow">
			<div class="cartHead">
				<span>CART</span>
			</div>
			<div class="cartBody">
				<div class="cartTableCont">
					<table class="cartTable">
						<tr>
							<th>ITEM DETAILS</th>
							<th>QTY</th>
							<th>PRICE</th>
							<th>DELIVERY DETAILS</th>
							<th>SUB TOTAL</th>
						</tr>
						<tr>
							<td>
								<div class="productDetails-horizontal">
									<div class="productThumb">
										<span class="sampleThumb"></span>
									</div>
									<div class="productDesc">
										<div class="productName">Samsung S7</div>
										<div class="productDescInner">
											A short description about the item
										</div>
									</div>
								</div>
							</td>
							<td>5</td>
							<td>5238 AED</td>
							<td>Estimated Delivery 3 - 4 Days</td>
							<td>5128 AED</td>
						</tr>
					</table>
					<div class="cartTableRowInverse">
						<span>Total <span class="text-success">127 AED</span></span>
					</div>
				</div>
			</div>
			<div class="cartFoot">
				<button class="glob-control cartContinue">Continue Shopping</button>
				<button class="glob-control cartCheckout">Proceed To Checkout</button>
			</div>
		</div>
	</div>
</div>

@stop