@extends('layouts.admin')

@section('content')
			<div>
				<div class="col-lg-12 col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Products
						</div>
						<div class="panel-body">
							<table class="table">
								<tr>
									<th>Product Name</th>
									<th>Brand Name</th>
									<th>Price</th>
									<th>Description</th>
									<th>Stock</th>
								</tr>
								@forelse($products as $product)
								<tr>
									<td>{{ $product->name }}</td>
									<td>{{ $product->brand }}</td>
									<td><span class="glyphicon glyphicon-usd"></span> {{ $product->price }}</td>
									<td>{{ str_limit($product->description, 50) }}</td>
									<td>{{ $product->stock }}</td>
								</tr>
								@empty
								<tr>
									<td colspan="5">No products</td>
								</tr>
								@endforelse
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Add Products
						</div>
						<div class="panel-body">
							{!! Form::open(['route' => 'products.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
								<div class="form-group">
									{!! Form::label('name', 'Name', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
									<div class="col-lg-6 col-md-6">	
									{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'true']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('brand', 'Brand', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
									<div class="col-lg-6 col-md-6">
									{!! Form::text('brand', null, ['class' => 'form-control', 'required' => 'true']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('cost', 'Cost', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
									<div class="col-lg-6 col-md-6">
									{!! Form::text('cost', null, ['class' => 'form-control', 'required' => 'true']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('category', 'Category', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
									<div class="col-lg-6 col-md-6">
									{!! Form::select('category', $cats->lists('name'), null, ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-2 col-md-2 col-md-offset-2 col-lg-offset-2">
									{!! Form::submit('Create Product', ['class' => 'btn btn-default']) !!}
									</div>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
@stop