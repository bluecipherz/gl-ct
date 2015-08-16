@extends('layouts.admin')

@section('content')
    @forelse($errors->all() as $error)
        <div class="col-lg-12 col-md-12">
            <div class="alert alert-danger">{{ $error }}<span class="close"></span></div>
        </div>
    @empty
    @endforelse
    @include($showPage)
@endsection