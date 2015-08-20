<div class="account">
	<div class="ac-head">
		<div class="ac-name" >Logged in as <span> {{ Auth::customer()->get()->email }} </span> </div>
		<a class="ac-logout" href="/auth/logout">Logout</a>
	</div>
	<div class="ac-cont">
		<a class="ac-myads cust-input addCat ac-s-btn" href="{{ route('advertisements.index') }}">My Ads</a>
        @if(Auth::customer()->get()->profile)
		<a class="ac-myads cust-input addCat ac-s-btn" href="{{ route('profile.edit', Auth::customer()->get()->profile) }}">Edit My Profile</a>
        @else
        <a class="ac-myads cust-input addCat ac-s-btn" href="{{ route('profile.create') }}">Edit My Profile</a>
        @endif
		<div class="ac-profile">
			<div class="ac-c-head">My Profile</div>
			<table>
				<tr>
					<td class="td1">
						<span class="ac-c-l">First Name</span>
					</td>	
					<td class="td2">
						<span>{{ isset(Auth::customer()->get()->profile->first_name) ? Auth::customer()->get()->profile->first_name : '' }}</span>
					</td>
				</tr>
				<tr>
					<td class="td1">	
						<span class="ac-c-l">Last Name</span>
					</td>	
					<td class="td2">
						<span>{{ isset(Auth::customer()->get()->profile->last_name) ? Auth::customer()->get()->profile->last_name : '' }}</span>
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
						<span>{{ isset(Auth::customer()->get()->profile->pin) ? Auth::customer()->get()->profile->pin : '' }}</span>
					</td>
				</tr>
				<tr>
					<td class="td1">	
						<span class="ac-c-l">Address</span>
					</td>	
					<td class="td2">
						<span>{{ isset(Auth::customer()->get()->profile->address) ? Auth::customer()->get()->profile->address : '' }}</span>
					</td>
				</tr>
				<tr>
					<td class="td1">	
						<span class="ac-c-l">City</span>
					</td>	
					<td class="td2">
						<span>{{ isset(Auth::customer()->get()->profile->emirate->name) ? Auth::customer()->get()->profile->emirate->name : '' }}</span>
					</td>
				</tr>
				<tr>
					<td class="td1">	
						<span class="ac-c-l">Phone</span>
					</td>	
					<td class="td2">
						<span>{{ isset(Auth::customer()->get()->profile->phone) ? Auth::customer()->get()->profile->phone : '' }}</span>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>