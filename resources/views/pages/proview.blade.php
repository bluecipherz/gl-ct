@extends('layouts.core')

@section('content')
<div class="boxx">
	<div class="row">
		<div class="filter-sidebar">
			<h4>Search filter</h4>
			<select class="glob-control">
				<option>Select a Category</option>
				<option>Awesome</option>
				<option>Kidilam</option>
			</select>
			<div class="category-list"><!-- CHECKBOXES -->
				<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>
				<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>
				<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>
				<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>
				<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>
				<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>
			</div>
			<div class="rulerCont"><hr></div>
			<div class="priceCont">
				<h5>Price Range</h5>
				<div>
					<div class="priceList">
						<div class="text-muted">From</div>
						<input type="text" class="glob-control"/>
					</div>
					<div class="priceList">
						<div class="text-muted">To</div>
						<input type="text" class="glob-control"/>
					</div>
				</div>
			</div>
			<div class="rulerCont"><hr></div>
			<div class="category-list"><!-- CHECKBOXES -->
				<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>
				<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>
				<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>
				<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>
				<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>
				<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>
			</div>
		</div>
		
		<div class="content">
			<div class="top-links">
				<a href="#">Price</a> | <a href="#">Relevance</a> | <a href="#">Discount</a> | <a href="#">Popular</a>
			</div>
			<div class="productsCont">
				@foreach($products as $product)
				<div class="productCont b-fakeLink">
					<div class="product-thumbnail">
						<!-- <img src="" class="" /> -->
						<span class="sampleThumb"></span>
					</div>
					<div class="product-description"  data-toggle="tooltip" data-placement="bottom" title="{{$product->name}}">
						<h4>{{ str_limit($product->name,22) }}</h4>
						<div class="productPrice">{{ $product->price . ' AED' }}</div>
						<div class="product-desc-small">
							{{ str_limit($product->description,60) }}
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="resellAdFullCont">
				@for($i=1;$i < 10; $i++)
				<div class="resellAdFull b-fakeLink">
					<div class="product-thumbnail">
						<span class="sampleThumb"></span>
					</div>
					<div class="resellDescription">
						<h4>I need to sell My Old Guitar ... !!!</h4>
						<div class="product-desc-small">
							Short description abouth the ad and the condition of th or something  like thath. which can full this sspace and the one who read this is a person which font have thee brain to think thath this short note is just for filling up this sblacnk space for the  demo what kind ogf people you are ?
						</div>
					</div>
					<div class="productDetailBar">
						<div class="productPrice">
							<span>52300 AED</span>
						</div>
						<div class="productLocation">
							<span>Ajman</span>
						</div>
					</div>
				</div>
				@endfor
			</div>
		</div>
	</div>
</div>

@stop