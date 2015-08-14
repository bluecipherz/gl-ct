@include('layouts.randImg')
@extends('layouts.core')
@section('content')
	
<div class="boxx s-body">	
	<div class="cat-head">
	{{ $category->name }}
	</div>

    @if($category->getLevel() == 0)
        <!-- Main Category -->

            @foreach($category->children->all() as $sub)
                <div class="boxx">
                    <div class="b-untouchable s-title">

                        <a href="{{ route('categories.show', $sub->id) }}">{{ $sub->name }}</a>

                    </div>
                    <div class="s-container">
                        @foreach( $sub->children->all() as $post)
                            <span class="cat-post">
                                <a href="{{ route('categories.show', $post->id) }}">{{ $post->name }} </a>
                            </span>
                        @endforeach
                        <div class="cat-freeline"> </div>
                        <div class="">
                                <!-- category results -->
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach($category->products->all() as $product)
                <div class="productCont b-fakeLink">
                    <div class="product-thumbnail">
                        <!-- <img src="" class="" /> -->

                        <span class="sampleThumb"><img src=" <?php  echo randImg(1); ?> "></span>
                    </div>
                    <div class="product-description"  data-toggle="tooltip" data-placement="bottom" title="{{$product->title}}">
                        <h4>{{ str_limit($product->title,22) }}</h4>
                        <div class="productPrice">{{ $product->price . ' AED' }}</div>
                        <div class="product-desc-small">
                            {{ str_limit($product->description,60) }}
                        </div>
                    </div>
                </div>
            @endforeach

    @elseif($category->getLevel() == 1)
    <!-- Sub Category -->
        kooz

    @elseif($category->getLevel() == 2)
    <!-- Post Category -->
        pacha kooz
    @endif

</div>	
@stop