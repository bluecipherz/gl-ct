@extends('layouts.static')

@section('title', 'My Ads')

@section('content')

    <div class="container" id="adContainer">
        <div class="col-md-12 col-lg-12">
            <h3>My Ads</h3>
            <hr>
            @forelse($myads as $ad)
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="col-lg-1 col-md-1">
                            <h4>Title : </h4>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <h4 class="ad-title">{{ $ad->product->title }}</h4>
                            {!! Form::text('title', $ad->product->title, ['class' => 'form-control', 'style' => 'display:none;margin-top:3px;']) !!}
                            {!! Form::hidden('ad_id', $ad->id) !!}
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <span class="pull-right">
                                <button class="edit-ad btn btn-default btn-sm" style="margin-top:5px;" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
                                <button class="save-ad btn btn-default btn-sm" style="display: none;margin-top:5px;" data-toggle="tooltip" title="Save"><span class="glyphicon glyphicon-ok"></span></button>
                            </span>
                        </div>
                    </div>
                    <div class="panel-body form-horizontal">
                        <div class="form-group-sm form-group">
                            {!! Form::label('price', 'Price', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                            <div class="col-lg-10 col-md-10">
                                {!! Form::label('price', $ad->product->price, ['class' => 'control-label']) !!}
                                {!! Form::text('price', $ad->product->price, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                            </div>
                        </div>
                        <div class="form-group-sm form-group">
                            {!! Form::label('description', 'Description', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                            <div class="col-lg-10 col-md-10">
                                {!! Form::label('description', $ad->product->description, ['class' => 'control-label']) !!}
                                {!! Form::textarea('description', $ad->product->description, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                            </div>
                        </div>
                        <div class="form-group-sm form-group">
                            {!! Form::label('brand', 'Brand', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                            <div class="col-lg-10 col-md-10">
                                {!! Form::label('brand', $ad->product->brand, ['class' => 'control-label']) !!}
                                {!! Form::text('brand', $ad->product->brand, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                            </div>
                        </div>
                        <div class="form-group-sm form-group">
                            {!! Form::label('category_id', 'Category', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                            <div class="col-lg-10 col-md-10">
                                {!! Form::label('category_id', $ad->product->category->name, ['class' => 'control-label']) !!}
                                {!! Form::select('category_id', $cats, $ad->product->category_id, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                            </div>
                        </div>
                        <div class="form-group-sm form-group">
                            {!! Form::label('name', 'Name', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                            <div class="col-lg-10 col-md-10">
                                {!! Form::label('name', $ad->name, ['class' => 'control-label']) !!}
                                {!! Form::text('name', $ad->name, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                            </div>
                        </div>
                        <div class="form-group-sm form-group">
                            {!! Form::label('pin', 'Pin', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                            <div class="col-lg-10 col-md-10">
                                {!! Form::label('pin', $ad->pin, ['class' => 'control-label']) !!}
                                {!! Form::text('pin', $ad->pin, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                            </div>
                        </div>
                        <div class="form-group-sm form-group">
                            {!! Form::label('address', 'Address', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                            <div class="col-lg-10 col-md-10">
                                {!! Form::label('address', $ad->address, ['class' => 'control-label']) !!}
                                {!! Form::textarea('address', $ad->address, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                            </div>
                        </div>
                        <div class="form-group-sm form-group">
                            {!! Form::label('state', 'State', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                            <div class="col-lg-10 col-md-10">
                                {!! Form::label('state', $ad->state, ['class' => 'control-label']) !!}
                                {!! Form::text('state', $ad->state, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                            </div>
                        </div>
                        <div class="form-group-sm form-group">
                            {!! Form::label('city', 'City', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                            <div class="col-lg-10 col-md-10">
                                {!! Form::label('city', $ad->city, ['class' => 'control-label']) !!}
                                {!! Form::text('city', $ad->city, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                            </div>
                        </div>
                        <div class="form-group-sm form-group">
                            {!! Form::label('phone', 'Phone', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                            <div class="col-lg-10 col-md-10">
                                {!! Form::label('phone', $ad->phone, ['class' => 'control-label']) !!}
                                {!! Form::text('phone', $ad->phone, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                            </div>
                        </div>
                        <div class="form-group-sm form-group">
                            {!! Form::label('quantity', 'Quantity', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                            <div class="col-lg-10 col-md-10">
                                {!! Form::label('quantity', $ad->quantity, ['class' => 'control-label']) !!}
                                {!! Form::text('quantity', $ad->quantity, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                            </div>
                        </div>
                        @if($ad->advertisable_type == 'App\Motor')
                            <div class="form-group-sm form-group">
                                {!! Form::label('chassis_no', 'Chassis no', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                                <div class="col-lg-10 col-md-10">
                                    {!! Form::label('chassis_no', $ad->advertisable->chassis_no, ['class' => 'control-label']) !!}
                                    {!! Form::text('chassis_no', $ad->advertisable->chassis_no, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                                </div>
                            </div>
                            <div class="form-group-sm form-group">
                                {!! Form::label('model', 'Model', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                                <div class="col-lg-10 col-md-10">
                                    {!! Form::label('model', $ad->advertisable->model, ['class' => 'control-label']) !!}
                                    {!! Form::text('model', $ad->advertisable->model, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                                </div>
                            </div>
                            <div class="form-group-sm form-group">
                                {!! Form::label('color', 'Color', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                                <div class="col-lg-10 col-md-10">
                                    {!! Form::label('color', $ad->advertisable->color, ['class' => 'control-label']) !!}
                                    {!! Form::text('color', $ad->advertisable->color, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                                </div>
                            </div>
                            <div class="form-group-sm form-group">
                                {!! Form::label('doors', 'Doors', ['class' => 'control-label col-lg-2 col-md-2']) !!}
                                <div class="col-lg-10 col-md-10">
                                    {!! Form::label('doors', $ad->advertisable->doors, ['class' => 'control-label']) !!}
                                    {!! Form::text('doors', $ad->advertisable->doors, ['class' => 'form-control', 'style' => 'display:none;']) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="panel-footer">
                        Posted : {{ $ad->product->created_at }}
                    </div>
                </div>
            @empty
                <div>No Ads</div>
            @endforelse
        </div>
    </div>

@endsection