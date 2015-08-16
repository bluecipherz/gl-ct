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
									<td>{{ $product->title }}</td>
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
                            {!! $products->render() !!}
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Add Products
						</div>
						<div class="panel-body">
							{!! Form::open(['route' => 'products.store', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => 'true', 'id' => 'product_add']) !!}
								<div class="form-group">
									{!! Form::label('title', 'Name', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
									<div class="col-lg-6 col-md-6">	
									{!! Form::text('title', null, ['class' => 'form-control', 'required' => 'true']) !!}
									</div>
								</div>
                                <div class="form-group">
                                    {!! Form::label('Description', 'description', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                    <div class="col-lg-6 col-md-6">
                                        {!! Form::textarea('title', null, ['style'=>'resize:none','class' => 'form-control', 'required' => 'true']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
									{!! Form::label('brand', 'Brand', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
									<div class="col-lg-6 col-md-6">
									{!! Form::text('brand', null, ['class' => 'form-control', 'required' => 'true']) !!}
									</div>
								</div>
                                <div class="form-group">
                                    {!! Form::label('stock', 'Stock', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                    <div class="col-lg-6 col-md-6">
                                        {!! Form::text('stock', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('price', 'Price', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                    <div class="col-lg-6 col-md-6">
                                        {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('category_id', 'Category', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                    <div class="col-lg-6 col-md-6">
                                        {{--{!! Form::select('category_id', $cats, null, ['class' => 'form-control']) !!}--}}
                                        <div class="adm-pro-sel-cat-Outer">
                                            <span class="def">Select a Category</span>
                                            <span class="adm-selcat">

                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('Model', 'Model', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                    <div class="col-lg-6 col-md-6">
                                        {!! Form::text('model', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Chassis', 'Chassis', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                    <div class="col-lg-6 col-md-6">
                                        {!! Form::text('chassis', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Color', 'Color', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                    <div class="col-lg-6 col-md-6">
                                        {!! Form::text('color', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Doors', 'Doors', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                    <div class="col-lg-6 col-md-6">
                                        {!! Form::text('doors', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                    </div>
                                </div>


                                <div class="form-group ">
                                    {!! Form::label('images', 'Images', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                    <div class="col-lg-6 col-md-6 adm-pro-img-inp" id="adm-pro-img-inp">
                                        {!! Form::file('images[]', ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="adm-inp-adder"> + </div>
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
