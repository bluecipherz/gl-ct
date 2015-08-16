@extends('layouts.core')
@section('content')
<div class="boxx product-outerPage">
    <div>
        <div class="pro-imgOuter">
            <div class="pro-addTitle" >
                {{ $product->title }}
            </div>
            <div class="pro-imgSet">
                <div class="pro-img pro-img-id-1 pro-img-act">THIS IS IMG 1</div>
                <div class="pro-img pro-img-id-2">THIS IS IMG 2</div>
                <div class="pro-img pro-img-id-3">THIS IS IMG 3</div>
                <div class="pro-img pro-img-id-4">THIS IS IMG 4</div>
            </div>
            <div class="pro-imgLsit">
                <div class="t1 pro-imgThumb pro-imgThumb-act">Thumb 1 </div>
                <div class="t2 pro-imgThumb">Thumb 2 </div>
                <div class="t3 pro-imgThumb">Thumb 3 </div>
                <div class="t4 pro-imgThumb">Thumb 4 </div>
            </div>
            <div class="pro-addDetails" >
                {{ $product->title }}
            </div>
        </div>
        <div class="pro-detailsOuter">
            <div class="pro-details pro-details-price">
                {{ $product->price }} AED
            </div>
            <div class="pro-details ">
                {{ $product->desc }}
            </div>
        </div>
    </div>
    <div class="pro-prefooter">

    </div>
</div>
@stop