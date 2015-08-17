@include('layouts.randImg')
    <!--
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
							{!! Form::open(['route' => 'products.store', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => 'true']) !!}
								<div class="form-group">
									{!! Form::label('title', 'Name', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
									<div class="col-lg-6 col-md-6">	
									{!! Form::text('title', null, ['class' => 'form-control', 'required' => 'true']) !!}
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
                                        {!! Form::select('category_id', $cats->lists('name'), null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('images', 'Images', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                    <div class="col-lg-6 col-md-6">
                                        {!! Form::file('images', ['class' => 'form-control']) !!}
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

    -->

    <div class="adm-h-toppanel">
        <button class="adm-nav-btns" id="AddGrid">New grid</button>
        <button class="adm-nav-btns" id="SaveGrid">Save</button>
    </div>

    <div class=" adm-homeOuter ">
        <div id="adm-homeInner">

            <!-- This part hidden -->

            <div style="display:none;">

                <!-- This part is the basic grid -->

                <div class='GridOuter' id="baseGrid">
                    <div class="Gridhead">
                        <div class="GridheadInner">
                            <div class="GridHName">
                                <span>Grid name</span>
                            </div>
                            <div><input type="text" name="gridTitle" place holder="Title"/></div>
                        </div>
                        <div class="GridHSettings">
                            <div class="adm-inp-set">
                                <div class="adm-subhead">Rows</div>
                                <input type="number" name="GridRows" placeholder="Rows" value="1" min="1" max="2" class="GridRows adm-inp-numb"/>
                            </div>
                            <div class="adm-inp-set">
                                <div class="adm-subhead">Cells</div>
                                <input type="number" name="GridCells" placeholder="Cells" value="1" min="1" max="5"  class="GridCells adm-inp-numb"/>
                            </div>
                            <button class="adm-nav-btns edit-ok" style="display:none;">Ok</button>
                        </div>
                        <div class="GridHAfter" style="display:none">
                            <button class="adm-nav-btns edit-grid">Edit</button>
                            <button class="adm-nav-btns save-grid">Save</button>
                        </div>
                    </div>
                    <div class="GridCont">
                        <div class="adcont-2">
                            <div class="adm-box-gen GenTemp">Generate Grid</div>
                        </div>
                    </div>
                </div>

                <!-- This part is the adbox grid -->

                <a id="gridBox">
                    <div class="gridSelPro ">
                        <div class="adm-proText" >Add Product</div>
                        <div class="adm-proSearch" >
                            <div class="adm-searchhead">
                                <input type="text" class="adm-search" placeholder="Search Products " id="searchProducts"/>
                                <!--<div class="adm-searchClose"> X </div>-->
                            </div>
                            <div class="adm-searchSec productsCont">

                                <!-- YOU CAN ADD PRODUCTS TO THIS DIV -->

                                <div class="productCont b-fakeLink">
                                    <div class="product-thumbnail">
                                        <span class="sampleThumb"><img src="{{ randImg(1) }}"></span>
                                    </div>
                                    <div class="product-description"  data-toggle="tooltip" data-placement="bottom" title="title">
                                        <h4>Title</h4>
                                        <div class="productPrice">Price</div>
                                        <div class="product-desc-small">
                                            Description
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </a>

            </div>

            <!-- THIS PLACE IS FOR FILLING GRIDS THROUGH JS -->

        </div>
    </div>