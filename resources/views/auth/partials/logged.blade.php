<div class="account">
	<div class="ac-head">
		<div class="ac-name" >Logged in as <span> {{ Auth::customer()->get()->email }} </span> </div>
		<a class="ac-logout" href="/auth/logout">Logout</a>
	</div>
	<div class="ac-cont">
		<div class="ac-profile">
			<div class="ac-c-head">My Profile</div>
			<span class="ac-c-l">First Name</span>
			<span class="ac-c-l">Last Name</span>
			<select class="ac-c-l">
				<option value="">Male</option>
				<option value="">female</option>
			</select>
			<div class="ac-c-l"></div>
		</div>
		<div class="ac-myads cust-input addCat in-small">My Ads</div>
	</div>
</div>