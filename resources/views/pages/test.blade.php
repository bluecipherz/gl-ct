@extends('layouts.core')

@section('content')
<?php

	$estTotal = 10004;

?>
<div class="boxx">
	<div class="row">
		<div id="tab-container">
			<ul class="wizard-tab">
				<li tabID="1" name="wizardT-1" id="WT-1" class="active">Login/Register</li>
				<li tabID="2" name="wizardT-2" id="WT-2"  class="CNext">Address Confirmation</li>
				<li tabID="3"name="wizardT-3" id="WT-3"  class="CNext">Review Order</li>
				<li tabID="4" name="wizardT-4" id="WT-4"  class="CNext">Payment Details</li>
			</ul>
		</div>
		<div id="tab-content">
			<div id="wizardT-1" class="CDisplay"> 
				<div class="login">
					<div class="w-log">
						<div class="w-log-sec-1" >
							<span class="wlg-sub1-sec1" >login</span>
							<span class="hard-logo" >GLOBEXCART</span>
						</div>
						<div class="w-log-sec-2" >
							<input type="text" class="cust-input-block" placeholder="Your email"/>
							<input type="text" class="cust-input-block" placeholder="Password"/>
							<div class="regbtnOuter">Dont have an account? <span class="b-fakeLink regbtn">Register</span></div>
						</div>
						<div class="w-log-sec-3" >
							<div class="backbtn cust-btn -btn-back" btnId="1" >Back</div>
							<div class="nextbtn cust-btn -btn-next" btnId="1" >Login</div>
						</div>
					</div>
					<div class="w-reg">
						<div class="w-reg-sec-1" >
							<span  class="w-reg-head" >Register with </span><span class="w-reg-headL" >GLOBEXCART</span>
						</div>
						<div class="w-reg-sec-2" >
							<input type="text" class="cust-input-block" placeholder="Your email"/>
							<input type="text" class="cust-input-block" placeholder="Password"/>
							<input type="text" class="cust-input-block" placeholder="Confirm Password"/>
							<div class="w-reg-sec2-text">Already have an account? <span class="b-fakeLink logbtn" > Login </span></div>
						</div>
						<div class="w-reg-sec-3" >
							<div class="backbtn cust-btn -btn-back" btnId="1" >Back</div>
							<div class="nextbtn cust-btn -btn-next" btnId="1" >Register</div>
						</div>	
					</div>
				</div> 
				<div class="loggedin">
					<div class="lgin-sec-1">
						<span>GLOBEXCART</span>
					</div> 
					<div class="lgin-sec-2">
						You are already logged in. want to login </br>from different account ?
					</div> 
					<div class="lgin-sec-3">
						<div class="backbtn cust-btn -btn-back" btnId="1" >back to cart</div>
						<div class="loginbtn cust-btn -btn-back" btnId="1" >Login from another account</div>
						<div class="nextbtn cust-btn -btn-next" btnId="1" >Proceed</div>
					</div> 
				</div>
			</div> 
			<div id="wizardT-2">
				<div class="w2-sec1" >
					<div class="w2-labOuter" >
						<div class="w2-inp-label" >Name</div>
						<div class="w2-inp-label" >PIN</div>
						<div class="w2-inp-label w2-inp-label-t" >Address</div>
						<div class="w2-inp-label" >State</div>
						<div class="w2-inp-label" >City</div>
						<div class="w2-inp-label" >Phone</div>
					</div>
					<div class="w2-inp" >
						<input type="text" class="cust-input w2-inp-f" placeholder="Your name"/>
						<input type="text" class="cust-input w2-inp-f" placeholder="PIN"/>
						<textarea type="text" class="cust-input w2-inp-t" placeholder="Your address"></textarea>
						<input type="text" class="cust-input w2-inp-f" placeholder="Your state"/>
						<input type="text" class="cust-input w2-inp-f" placeholder="Your city"/>
						<input type="text" class="cust-input w2-inp-f" placeholder="Your phone number"/>
					</div>
				</div>
				<div class="w2-sec2" >
					<div class="w2-sec1-1" >
						
					</div>
					<div class="w2-sec1-2" >
						<div class="backbtn cust-btn -btn-back" btnId="2" >Back</div>
						<div btnId="2" class="nextbtn cust-btn -btn-next" >Proceed</div> 
					</div>
				</div>
			</div>
			<div id="wizardT-3"> 
			
				<div class="cartWindow">
					<div class="cartBody">
						<div class="cartTableCont">
							<table class="cartTable">
								<tr class="cartTableHeader" >
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
								<span>Total <span class="est-amount">127 AED</span></span>
							</div>
						</div>
					</div>
					<div class="cartFoot">
						
						<button class=" nextbtn cust-btn -btn-next"  btnId="3" >Proceed To Checkout</button>
						<button class=" backbtn cust-btn -btn-back" btnId="3" >Back</button>
					</div>
				</div>
				
			</div>
			<div id="wizardT-4"> 
				<div class=" w4-tab">
					<div btnId="1" class="w4-tab-b-1 b-fakeLink w4-tab-act">Credit Card</div>
					<div btnId="2" class="w4-tab-b-2 b-fakeLink" >Debit Card</div>
					<div btnId="3" class="w4-tab-b-3 b-fakeLink" >Net banking</div>
					<div btnId="4" class="w4-tab-b-4 b-fakeLink" >Cash on Delivery</div>
				</div>
				<div class="w4-content">
					<div id="w4-1" class=" w4-tab-c">
						<div class="w4-c-sec-1"> 
							<span class="w4-header"> Estimated Total - <span class="est-amount-d">{{ $estTotal }}</span> AED</span>
						</div>
						<div class="w4-c-sec-2"> 
							<span>This feature is not available for the selected product</span>
						</div>
						<div class="w4-c-sec-3"> 
							<div btnId="4" class="nextbtn cust-btn -btn-next btn-inactive" >Place Order</div> 
							<div class="backbtn cust-btn -btn-back" btnId="4" >Back</div>
						</div>
					</div>
					<div id="w4-2" class=" w4-tab-c">
						<div class="w4-c-sec-1"> 
							<span class="w4-header"> Estimated Total - <span class="est-amount-d">{{ $estTotal }}</span> AED</span>
						</div>
						<div class="w4-c-sec-2"> 
							<span>This feature is not available for the selected product</span>
						</div>
						<div class="w4-c-sec-3"> 
							<div btnId="4" class="nextbtn cust-btn -btn-next btn-inactive" >Place Order</div> 
							<div class="backbtn cust-btn -btn-back" btnId="4" >Back</div>
						</div>
					</div>
					<div id="w4-3" class=" w4-tab-c">
						<div class="w4-c-sec-1"> 
							<span class="w4-header"> Estimated Total - <span class="est-amount-d">{{ $estTotal }}</span> AED</span>
						</div>
						<div class="w4-c-sec-2"> 
							<span>This feature is not available for the selected product</span>
						</div>
						<div class="w4-c-sec-3"> 
							<div btnId="4" class="nextbtn cust-btn -btn-next btn-inactive" >Place Order</div> 
							<div class="backbtn cust-btn -btn-back" btnId="4" >Back</div>
						</div>
					</div>

					<div id="w4-4" class=" w4-tab-c">
						<div class="w4-c-sec-1"> 
							<span class="w4-header"> Estimated Total - <span class="est-amount-d">{{ $estTotal }}</span> AED</span>
						</div>
						<div class="w4-c-sec-2"> 
							<span class="w4-c-sec-4">Make payment when we deliver your order at your home</span>
						</div>
						<div class="w4-c-sec-3"> 
							<div btnId="4" class="nextbtn cust-btn -btn-next" >Place Order</div> 
							<div class="backbtn cust-btn -btn-back" btnId="4" >Back</div>
							<span>By placing the order i have read and agreed to Globexcart.com Terms of use and Temrs od Sale</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop