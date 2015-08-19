@include('layouts.randImg')
@extends('layouts.core')
@section('title','Home')
@section('content')
<div class="homeNav">
	<div class="boxx" style="height:inherit; position: relative; padding-left:20px;">
		<div class="hnCat-btn">
			<div class="cbtn ">CATEGORIES <span class=""></span></div>
			<div class="catList">


				@foreach($catset as $cat)
				<div class="catItem BendLineBase">
					<a href="{{ route('categories.show', $cat['id']) }}" class="catLi cItem"> {{ $cat['title'] }}</a>
					<div class="catCont">
                        <?php $col = 1; ?>
                        @foreach($cat['children'] as $column)
						<div class="catSec-{{ $col }} col-md-4">
                            @foreach($column as $item)
                                @if($item['type'] == 'subcat')
                                    <a href="{{ route('categories.show', $item['id']) }}"  class="catContHead cItem">
                                        {{ $item['title'] }} <span class="catPointer"> < </span>
                                    </a>
                                @else
									<a href="{{ route('categories.show', $item['id']) }}"  class="catContHeadItems cItem">
                                        {{ $item['title'] }} <span class="catPointer"> < </span>
                                    </a>
                                @endif
                            @endforeach
						</div>
                        <?php $col++; ?>
                        @endforeach
					</div>
				</div>
				@endforeach



			</div>
		</div>

		{{--<div class="hnExtra" >--}}
			{{--<a href="dealsoftheday">Deals of the day</a>--}}
			{{--<a href="superdeals">Super deals</a>--}}
		{{--</div>--}}


	</div>
</div>
<div class="homeTopAd">
	<div class="boxx" style="position: relative; padding-left:0px;">
		<div class="homeTopAdCont">
			<img src="img/ads/1.jpg">
		</div>
	</div>
</div>

<div class="boxx">
	<div class="row">
		<div class="homeTop">
			<div>
				<span class="adhead"><span style="float:left; margin-right:10px;">Super Deals - <span style="font-size:90%;">Ends in </span></span><span class="adhead-timer"> </span></span>
				<div class="adcont-2">
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(1); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
						<div class="addesc"> This is a kinda product </br> - This product has this</br> - This product has this</br> - This product has this</div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(1); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
						<div class="addesc"> This is a kinda product </br> - This product has this</br> - This product has this</br> - This product has this</div>
					</a>	
				</div>
			</div>

            {{--loop starts--}}

            @foreach($homegrids as $homegrid)
                <div>
                    <span class="adhead">{{ $homegrid->name }}</span>
                    <div class="adcont-{{ $homegrid->cols }}">
                        @foreach($homegrid->slots as $gridslot)
                            <a href="{{ route('products.show', $gridslot->product) }}">
                                <div class="adimg"><img src="{{ $gridslot->product->images->first()->url }}"/></div>
                                <div class="adtitle">
                                    <div>{{ $gridslot->product->title }}</div>
                                    <div class="priceT">{{ $gridslot->product->price }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
			
		</div>
	</div>
</div>
@endsection
