@section('title','Contact u')
@extends('layouts.static')
@section('name','Contact us')
@section('Scontent')
	<div class="s-inp-base">
        @forelse($errors->all() as $error)
            <div class="alert alert-danger"><span class="close">&times;</span>{{ $error }}</div>
        @empty
        @endforelse
        @if(isset($message))
            <div class="alert alert-info"><span class="close">&times;</span>$message</div>
        @endif
        {!! Form::open(['url' => '/support/contact-us', 'method' => 'POST']) !!}
            <div>{!! Form::email('email', '', ['placeholder' => 'Your Email Address', 'class' => 'cust-input w2-inp-f']) !!}</div>
            <div>{!! Form::text('contact', '', ['placeholder' => 'Your Phone Number', 'class' => 'cust-input w2-inp-f']) !!}</div>
            <div>{!! Form::text('subject', '', ['placeholder' => 'Subject', 'class' => 'cust-input w2-inp-f']) !!}</div>
            <div>{!! Form::textarea('message', '', ['placeholder' => 'Message', 'class' => 'cust-input w2-inp-t']) !!}</div>
            <div>{!! Form::button('Submit', ['type' => 'submit', 'class' => 'nextbtn cust-btn -btn-next']) !!}</div>
        {!! Form::close() !!}
	</div>
@stop