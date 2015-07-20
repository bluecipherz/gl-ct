@extends('layouts.core')

@section('content')

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
						
						</div>
						<div class="w-log-sec-3" >
							<div class="backbtn cust-btn -btn-back" btnId="1" >Back</div>
							<div class="nextbtn cust-btn -btn-next" btnId="1" >Proceed</div>
						</div>
					</div>
					<div class="w-reg">
						<span>Register with <span>GLOBEXCART</span></span>
						<div>
							<input type="text" class="glob-control" placeholder="Your email"/>
						</div>
						<div>
							<input type="text" class="glob-control" placeholder="Your password"/>
						</div>
						<div>
							<input type="text" class="glob-control" placeholder="Confirm Password"/>
						</div>
						<div>Register with email and recieve latest offers ogf globex cart</div>
						<div class="backbtn cust-btn -btn-back" btnId="1" >Back</div>
						<div class="nextbtn cust-btn -btn-next" btnId="1" >Proceed</div>
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
				TAB 2 
				<div class="backbtn cust-btn -btn-back" btnId="2" >Back</div>
				<div btnId="2" class="nextbtn cust-btn -btn-next" >Proceed</div> 
			</div>
			<div id="wizardT-3"> 
				TAB 3 
				<div class="backbtn cust-btn -btn-back" btnId="3" >Back</div>
				<div btnId="3" class="nextbtn cust-btn -btn-next" >Proceed</div> 
			</div>
			<div id="wizardT-4"> 
				TAB 4 
				<div class="backbtn cust-btn -btn-back" btnId="4" >Back</div>
				<div btnId="4" class="nextbtn cust-btn -btn-next" >Proceed</div> 
			</div>
		</div>
	</div>
</div>

@stop