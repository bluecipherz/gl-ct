@extends('layouts.core')

@section('content')

<div class="boxx">
	<div class="row">
		<div id="tab-container">
			<ul class="wizard-tab">
				<li name="wizardT-1" class="active">Login/Register</li>
				<li name="wizardT-2">Address Confirmation</li>
				<li name="wizardT-3">Review Order</li>
				<li name="wizardT-4">Payment Details</li>
			</ul>
		</div>
		<div id="tab-content">
			<div id="wizardT-1">
				<h3>Register with <span>GLOBEXCART</span></h3>
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
			</div>
			<div id="wizardT-2"> TAB 2 </div>
			<div id="wizardT-3"> TAB 3 </div>
			<div id="wizardT-4"> TAB 4 </div>
		</div>
	</div>
</div>

@stop