@extends('layouts.core')

@section('content')

<div class="boxx">
	<span class="testClass">
		@for($i=0,$j=10;$i<$j,0==0;$i++)
			hello {{ $i }}
		@endfor
	</span>
</div>

@stop