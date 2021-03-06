@section('title','Help')
@extends('layouts.static')
@section('name','Edit My Profile')
@section('Scontent')
	<div class="s-inp-base">
        @forelse($errors->all() as $error)
            <div class="alert alert-danger"><span class="close">&times;</span>{{ $error }}</div>
        @empty
        @endforelse
        @if(isset($message))
            <div class="alert alert-info"><span class="close">&times;</span>$message</div>
        @endif
		
        <div class="ac-profile">
            {!! Form::open(['route' => ['profile.update', $profile], 'method' => 'PATCH']) !!}
			<div class="ac-profile">
				<div class="ac-c-head">My Profile</div>
				<table>
					<tr>
						<td class="td1">
							<span class="ac-c-l">First Name</span>
						</td>	
						<td class="td2">
							<input placeholder="Your first name" class="cust-input  w2-inp-f"type="text" name="first_name" value="{{ $profile->first_name }}"/>
						</td>
					</tr>
					<tr>
						<td class="td1">	
							<span class="ac-c-l">Last Name</span>
						</td>	
						<td class="td2">
							<input placeholder="Your last name" class="cust-input  w2-inp-f"type="text" name="last_name" value="{{ $profile->last_name }}"/>
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
							<input placeholder="PIN code" class="cust-input w2-inp-f" type="text" name="pin" value="{{ $profile->pin }}"/>
						</td>
					</tr>
					<tr>
						<td class="td1">	
							<span class="ac-c-l">Address</span>
						</td>	
						<td class="td2">
							<textarea placeholder="Your address" class="cust-input w2-inp-t" name="address">{{ $profile->address }}</textarea>
						</td>
					</tr>
					<tr>
						<td class="td1">	
							<span class="ac-c-l">City</span>
						</td>	
						<td class="td2">
                            {!! Form::select('emirate_id', $emirates->lists('name', 'id'), $profile->emirate_id, ['class' => 'cust-input w2-inp-f inp-type-inline']) !!}
						</td>
					</tr>
					<tr>
						<td class="td1">	
							<span class="ac-c-l">Phone</span>
						</td>	
						<td class="td2">
							<input placeholder="Your Phone" class="cust-input w2-inp-f" type="text" name="phone" value="{{ $profile->phone }}"/>
						</td>
					</tr>
				</table>
			</div>
			<div class="bnt-bag">
				<a class="cust-btn in-small ac-myads -btn-back">back</a>
				<button class="cust-btn in-small ac-myads -btn-next" type="submit">Done Editing</button>
			</div>
            {!! Form::close() !!}
		</div>
	</div>
@stop