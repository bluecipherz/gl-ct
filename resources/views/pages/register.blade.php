@extends('layouts.core')

@section('content')

<div class="boxx">
    {!! Form::open(['url' => '/auth/register', 'method' => 'POST']) !!}
    <h2>Login</h2>
    <div class="">Register with <span class="logoBarOuter">GLOBEX<span>CART</span></span></div>
    <div class="form-group"><input type="text" placeholder="Your Email" class="glob-control" name="email"/></div>
    <div class="form-group"><input type="text" placeholder="Your Password" class="glob-control" name="password"/></div>
    <div class="form-group"><input type="text" placeholder="Confirm Password" class="glob-control" name="password_confirmation"/></div>
    <div class="form-group"><button class="glob-control">Register</button></div>
    {!! Form::close() !!}
</div>

@stop