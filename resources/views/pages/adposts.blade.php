@extends('layouts.core')

@section('content')
<div class="boxx">
	<div class="row">
		<div id="tab-container">
			<ul class="wizard-tab">
				<li tabID="1" name="wizardT-1" id="WT-1" class="active">Login/Register</li>
				<li tabID="2" name="wizardT-2" id="WT-2"  class="CNext">Your ad</li>
				<li tabID="3"name="wizardT-3" id="WT-3"  class="CNext">Address Confirmation</li>
				<li tabID="4" name="wizardT-4" id="WT-4"  class="CNext">Overview</li>
			</ul>
		</div>
		<div id="tab-content">
			<div id="wizardT-1" class="CDisplay"> 
				<div class="login">
					<div class="w-log">
						<div class="w-log-sec-1" >
							<span class="wlg-sub1-sec1" >Login</span>
							<span class="hard-logo" >GLOBEXCART</span>
						</div>
						<div class="w-log-sec-2" >
							<input type="text" class="cust-input-block" placeholder="Your email"/>
							<input type="password" class="cust-input-block" placeholder="Password"/>
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
							<input type="password" class="cust-input-block" placeholder="Password"/>
							<input type="password" class="cust-input-block" placeholder="Confirm Password"/>
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
						<div class="w2-inp-label" >Title</div>
						<div class="w2-inp-label w2-inp-label-t" >Description </div>
						<div class="w2-inp-label " >Category</div>
						<div class="w2-inp-label" >price</div>
						
					</div>
					<div class="w2-inp" >
						<input type="text" class="cust-input w2-inp-f" placeholder="Ad Title"/>
						<textarea type="text" class="cust-input w2-inp-t" placeholder="Description about your ad"></textarea>
						<div btnId="2" class=" cust-input w2-inp-btn addCat" >Select a category</div> 
						<input type="text" class="cust-input w2-inp-f" placeholder="price"/>
						<div class="upPhoto">Upload photo</div>
						<div class="b-fakeLink addPhoto">+</div>
					</div>
				</div>
				<div class="w2-sec2" >
					<div class="w2-sec1-1" >
						
					</div>
				</div>
				<div class="w2-sec3" >
					<div btnId="2" class="nextbtn cust-btn -btn-next" >Next</div> 
					<div class="backbtn cust-btn -btn-back" btnId="2" >Back</div>
				</div>
			</div>
			<div id="wizardT-3" class="wizardT-3"> 
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
						<button class=" backbtn cust-btn -btn-back" btnId="3" >Back</button>
						<button class=" nextbtn cust-btn -btn-next"  btnId="3" >Next</button>
					</div>
				</div>
			</div>
			<div id="wizardT-4"> 
				<div id="w4-4" class=" w4-tab-c">
					<div class="w4-c-sec-1"> 
					</div>
					<div class="w4-c-sec-2"> 
						<span class="w4-c-sec-4">Your ad will look like this</span>
						<div class="resellAdFull b-fakeLink">
					<div class="product-thumbnail">
						<span class="sampleThumb"></span>
					</div>
					<div class="resellDescription">
						<h4>I need to sell My Old Guitar ... !!!</h4>
						<div class="product-desc-small">
							Short description abouth the ad and the condition of th or something  like thath. which can full this sspace and the one who read this is a person which font have thee brain to think thath this short note is just for filling up this sblacnk space for the  demo what kind ogf people you are ?
						</div>
					</div>
					<div class="productDetailBar">
						<div class="productPrice">
							<span>52300 AED</span>
						</div>
						<div class="productLocation">
							<span>Ajman</span>
						</div>
					</div>
				</div>
					</div>
					<div class="w4-c-sec-3"> 
						<div btnId="4" class="nextbtn cust-btn -btn-next" >Post ad</div> 
						<div class="backbtn cust-btn -btn-back" btnId="4" >Back</div>
						<span>By posting the ad i have read and agreed to Globexcart.com Terms of use and Temrs od Sale</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop