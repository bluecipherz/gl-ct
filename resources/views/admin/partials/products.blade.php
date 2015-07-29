
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
									<th>Cost</th>
								</tr>
								@forelse($products as $product)
								<tr>
									<td>{{ $product->name }}</td>
									<td>{{ $product->brand }}</td>
									<td>{{ $product->cost }}</td>
								</tr>
								@empty
								<tr>
									<td colspan="3">No products</td>
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
									{!! Form::select('category', $cats, null, ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('sub_category', 'Sub Category', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
									<div class="col-lg-6 col-md-6">
									{!! Form::select('sub_category', $subcats, null, ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('post_sub_cat', 'Post Sub Category', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
									<div class="col-lg-6 col-md-6">
									{!! Form::select('post_sub_cat', $postsubcats, null, ['class' => 'form-control']) !!}
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