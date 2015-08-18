<div class="account">
	<div class="ac-head">
		<div class="ac-name" >Logged in as <span> {{ Auth::customer()->get()->email }} </span> </div>
		<a class="ac-logout" href="/auth/logout">Logout</a>
	</div>
	<div class="ac-cont">
		<a class="ac-myads cust-input addCat ac-s-btn" href="{{ route('advertisements.index') }}">My Ads</a>
		<a class="ac-myads cust-input addCat ac-s-btn" href="{{ url('editprofile') }}">Edit My Profile</a>
		<div class="ac-profile">
			<div class="ac-c-head">My Profile</div>
			<table>
				<tr>
					<td class="td1">
						<span class="ac-c-l">First Name</span>
					</td>	
					<td class="td2">
						<span>Not set yet</span>
					</td>
				</tr>
				<tr>
					<td class="td1">	
						<span class="ac-c-l">Last Name</span>
					</td>	
					<td class="td2">
						<span>Not set yet </span>
					</td>
				</tr>	
			</table>
			<div class="ac-c-head">My Address</div>
			<table>
				<tr>
					<td class="td1">
						<span class="ac-c-l">PIN</span>
					</td>	
					<td class="td2">
						<span>Not set yet</span>
					</td>
				</tr>
				<tr>
					<td class="td1">	
						<span class="ac-c-l">Address</span>
					</td>	
					<td class="td2">
						<span>Not set yetNot set yetNot set yetNot set yetNot set yetNot set yetNot set yetNot set yetNot set yetNot set yetNot set yetNot set yetNot set yetNot set yet </span>
					</td>
				</tr>
				<tr>
					<td class="td1">	
						<span class="ac-c-l">State</span>
					</td>	
					<td class="td2">
						<span>Not set yet</span>
					</td>
				</tr>
				<tr>
					<td class="td1">	
						<span class="ac-c-l">City</span>
					</td>	
					<td class="td2">
						<span>Not set yet </span>
					</td>
				</tr>
				<tr>
					<td class="td1">	
						<span class="ac-c-l">Phone</span>
					</td>	
					<td class="td2">
						<span>Not set yet </span>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>