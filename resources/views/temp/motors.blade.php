@extends('layouts.static')


@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>Product Name</th>
                        <th>Brand Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Stock</th>
                        <th>Chassis</th>
                        <th>Model</th>
                        <th>Color</th>
                    </tr>
                    @forelse($motors as $motor)
                        <tr>
                            <td>{{ $motor->title }}</td>
                            <td>{{ $motor->brand }}</td>
                            <td><span class="glyphicon glyphicon-usd"></span> {{ $motor->price }}</td>
                            <td>{{ str_limit($motor->description, 50) }}</td>
                            <td>{{ $motor->stock }}</td>
                            <td>{{ $motor->chassis_no }}</td>
                            <td>{{ $motor->model }}</td>
                            <td>{{ $motor->color }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No motors</td>
                        </tr>
                    @endforelse
                </table>
                <hr>
                <div class="col-md-6 col-lg-6">
                    {!! Form::open(['url' => 'motors', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title', ['class' => 'col-md-4 col-lg-4 control-label']) !!}
                        <div class="col-md-8 col-lg-8">
                            {!! Form::text('title', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('price', 'Price', ['class' => 'col-md-4 col-lg-4 control-label']) !!}
                        <div class="col-md-8 col-lg-8">
                            {!! Form::text('price', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('stock', 'Stock', ['class' => 'col-md-4 col-lg-4 control-label']) !!}
                        <div class="col-md-8 col-lg-8">
                            {!! Form::text('stock', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('brand', 'Brand', ['class' => 'col-md-4 col-lg-4 control-label']) !!}
                        <div class="col-md-8 col-lg-8">
                            {!! Form::text('brand', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description', ['class' => 'col-md-4 col-lg-4 control-label']) !!}
                        <div class="col-md-8 col-lg-8">
                            {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_id', 'Category', ['class' => 'col-md-4 col-lg-4 control-label']) !!}
                        <div class="col-md-8 col-lg-8">
                            {!! Form::select('category_id', $cats, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('chassis_no', 'Chassis No', ['class' => 'col-md-4 col-lg-4 control-label']) !!}
                        <div class="col-md-8 col-lg-8">
                            {!! Form::text('chassis_no', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('model', 'Model', ['class' => 'col-md-4 col-lg-4 control-label']) !!}
                        <div class="col-md-8 col-lg-8">
                            {!! Form::text('model', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('color', 'Color', ['class' => 'col-md-4 col-lg-4 control-label']) !!}
                        <div class="col-md-8 col-lg-8">
                            {!! Form::text('color', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-lg-8 col-md-offset-4 col-lg-offset-4">
                            {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection