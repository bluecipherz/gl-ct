@section('title','Help')
@extends('layouts.static')
@section('name','Contact us')
@section('Scontent')
	<div class="s-inp-base">
		<div><input type="email"  class="cust-input w2-inp-f" placeholder="Your Email address"/></div>
		<div><input type="text"  class="cust-input w2-inp-f" placeholder="Subject"/></div>
		<div><input type="text"  class="cust-input w2-inp-f" placeholder="Your Phone number"/></div>
		<div><textarea type="text" class="cust-input w2-inp-t" placeholder="Description"></textarea></div>
		<div><button type="submit" class="nextbtn cust-btn -btn-next" >Submit</button> </div>
	</div>
@stop