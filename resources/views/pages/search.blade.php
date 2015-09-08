@include('layouts.randImg')
@extends('layouts.core')
@section('content')
<div class="boxx">
	<div class="row">
		<div class="filter-sidebar">
			<h4>Search filter</h4>
			<select class="glob-control" id="category-filter">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
			</select>
			<div class="category-list" id="category-list"><!-- CHECKBOXES -->
                <table>
                    @foreach($categories->reject(function($cat){ return $cat->id == 0; }) as $cat)
                        <tr>
                            <td>
                                <input type="checkbox" name="category-check" value="{{ $cat->id }}"/>
                            </td>
                            <td>
                                <label>{{ $cat->name }}</label>
                            </td>
                        </tr>
                    @endforeach
                </table>
			</div>
			<div class="rulerCont"><hr></div>
			<div class="priceCont">
				<h5>Price Range</h5>
				<div>
					<div class="priceList">
						<div class="text-muted">From</div>
						<input type="text" class="glob-control" id="price-from"/>
					</div>
					<div class="priceList">
						<div class="text-muted">To</div>
						<input type="text" class="glob-control" id="price-to"/>
					</div>
				</div>
			</div>
			<div class="rulerCont"><hr></div>
			{{--<div class="category-list"><!-- CHECKBOXES -->--}}
				{{--<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>--}}
				{{--<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>--}}
				{{--<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>--}}
				{{--<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>--}}
				{{--<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>--}}
				{{--<p><input type="checkbox" class="glob-control" /><label>Category</label>  </p>--}}
			{{--</div>--}}
		</div>
		
		<div class="content">
			<div class="top-links">
				<a href="#">Price</a> | <a href="#">Relevance</a> | <a href="#">Discount</a> | <a href="#">Popular</a>
			</div>
			<div class="productsCont" id="schProRset">
                @if($products->count() < 1)
                    <span> No results found for " {{ $searchQuery or 'Search' }} " </span>
                @else
                    @foreach($products as $product)
                    <a href="{{ url($product->producible_type == 'App\Globex' ? 'products'.'/'.$product->id : 'advertisements' .'/'.$product->id) }}" class="productCont b-fakeLink">
                        <div class="product-thumbnail">
                            <!-- <img src="" class="" /> -->

                            {{--{{ 'type:' . $product->type . ',img:' . $product->images->count() }}--}}
                            @if($product->images->count())
                                <span class="sampleThumb"><img src="{{ $product->images->first()->url }}"></span>
                            @else
                                <span class="sampleThumb"><img src="{{ asset('img/noImage.jpg') }}"></span>
                            @endif
                        </div>
                        <div class="product-description"  data-toggle="tooltip" data-placement="bottom" title="{{ $product->title }}">
                            <h4>{{ str_limit($product->title, 22) }}</h4>
                            <div class="productPrice">{{ $product->price . ' AED' }}</div>
                            <div class="product-desc-small">
                                {{ str_limit($product->description, 60) }}
                            </div>
                        </div>
                    </a>
                    @endforeach
                @endif
			</div>
			<!--
			<div class="resellAdFullCont">
				<div class="resellAdFull b-fakeLink">
					<div class="product-thumbnail">
						<span class="sampleThumb"><img src=" <?php  echo randImg(3); ?> "></span>
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
			</div>
			
			-->
		</div>
	</div>
</div>

@stop