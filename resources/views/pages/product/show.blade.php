@include('layouts.randImg')
@extends('layouts.core')
@section('content')
<div class="boxx product-outerPage" xmlns="http://www.w3.org/1999/html">
    <div>
        <div class="pro-imgOuter">
            <div class="pro-addTitle" >
                {{ $product->title }}
            </div>
            <div class="pro-imgSet">
                @if($product->images->count() < 1 )
                    <div class="pro-img pro-img-id-1 pro-img-act"><img src="{{asset('img/noImage.jpg')}}"></div>
                @else
                    @for($i = 0;$i < $product->images->count() ; $i++)
                        @if($i == 0)
                            <div class="pro-img pro-img-id-{{ $i+1 }} pro-img-act"><img src="{{$product->images[$i]->url}}"></div>
                        @else
                            <div class="pro-img pro-img-id-{{ $i+1 }}"><img src="{{$product->images[$i]->url}}"></div>
                        @endif
                    @endfor
                @endif
            </div>
            <div class="pro-imgLsit">
                @for($i = 0;$i < $product->images->count() ; $i++)
                    @if($i == 0)
                        <div class="t1 pro-imgThumb pro-imgThumb-act"><img src="{{$product->images[$i]->url}}"> </div>
                    @else
                        <div class="t{{ $i + 1 }}} pro-imgThumb "><img src="{{$product->images[$i]->url}}"> </div>
                    @endif
                @endfor
            </div>
            <div class="pro-addDetails" >
                <div class=" b-fullText">
                    {{ $product->description }}
                </div>
                @if($product->brand != "")
                <div>
                    <span>Brand </span> {{ $product->brand }}
                </div>
                @endif
                @if($product->price != "")
                <div>
                    <span>Price  </span>  {{ $product->price }} AED
                </div>
                @endif
                @if($product->stock != "")
                <div>
                    <span>Stock  </span> {{ $product->stock }}
                </div>
                @endif
                @if($product->quantity > 1)
                <div>
                    <span>Quantity  </span> {{ $product->quantity }}
                </div>
                @endif

                @if($product->producible_type == 'App\Globex')
                    <!-- if condition for motors -->
                    @if($product->producible->globexable_type == 'App\Motor')
                        <div>
                            <span>Model </span> {{ $product->producible->globexable->model }}
                        </div>
                        <div>
                            <span>Chassis  </span> {{ $product->producible->globexable->chassis_no }}
                        </div>
                        <div>
                            <span>Color  </span> {{ $product->producible->globexable->color }}
                        </div>
                        <div>
                            <span>Doors  </span> {{ $product->producible->globexable->doors }}
                        </div>
                    @endif
                @elseif($product->producible_type == 'App\Advertisement')
                    <!-- if condition for motors -->
                    @if($product->producible->advertisable_type == 'App\Motor')
                        <div>
                            <span>Model </span> {{ $product->producible->advertisable->model }}
                        </div>
                        <div>
                            <span>Chassis  </span> {{ $product->producible->advertisable->chassis_no }}
                        </div>
                        <div>
                            <span>Color  </span> {{ $product->producible->advertisable->color }}
                        </div>
                        <div>
                            <span>Doors  </span> {{ $product->producible->advertisable->doors }}
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <div class="pro-detailsOuter">
            <div class="pro-details pro-details-price">
                {{ $product->price }} AED
            </div>
            <div class="pro-details ">
                <div class="pro-heading">
                    Seller Details
                </div>
                @if($product->producible_type == 'App\Advertisement')
                    <div class="pro-seller-details">
                            <div>
                                <span>Seller Name </span> {{ $product->producible->name }}
                            </div>
                            <div>
                                <div>
                                    <span>Address </span>
                                </div>
                                <div>
                                    {{ $product->producible->address }}
                                </div>
                            </div>
                            <div>
                                <span>City </span> {{ $product->producible->emirate->name }}
                            </div>
                            <div>
                                <span>Phone no:  </span> {{ $product->producible->phone }}
                            </div>
                    </div>
                @elseif($product->producible_type == 'App\Globex')
                    <div class="g-logo-cover  gl-cover-180" style="margin-left:30px;" ></div>
                    <div class="p-text">
                        Buy from Globexkart.com and make your life much easier. Globexkart is one of the best reseller in UAE
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="pro-prefooter">
        <div class="pro-heading">
            Related Ads
        </div>
        <div class="pro-relAdsOuter">
            @forelse($related->get() as $product)
            <a class="productCont b-fakeLink" href="{{route('products.show', $product)}}">
                <div class="product-thumbnail">
                    <span class="sampleThumb">
                        @if($product->images->first())
                        <img src="{{ $product->images->first()->url }}">
                        @else
                        <img src="{{ url('/img/noImage.jpg') }}">
                        @endif
                    </span>
                </div>
                <div class="product-description"  data-toggle="tooltip" data-placement="bottom" title="{{ $product->title }}">
                    <h4>{{ $product->title }}</h4>
                    <div class="productPrice">{{ $product->price }}</div>
                    <div class="product-desc-small">
                        {{ $product->description }}
                    </div>
                </div>
            </a>
            @empty
                No related products
            @endforelse
        </div>
    </div>
</div>
@stop