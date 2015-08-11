<?php

function randImg($type){
	$imageLink = "";
	$a = mt_rand(1,8);
	$b = mt_rand(1,11);
	$c = mt_rand(1,18);
	
	if( $type == 1){
		if( $a == 1 ){ $imageLink = "img/extras/randimg/car/1.jpg"; }else
		if( $a == 2 ){ $imageLink = "img/extras/randimg/car/2.jpg"; }else
		if( $a == 3 ){ $imageLink = "img/extras/randimg/car/3.jpg"; }else
		if( $a == 4 ){ $imageLink = "img/extras/randimg/car/4.jpg"; }else
		if( $a == 5 ){ $imageLink = "img/extras/randimg/car/5.jpg"; }else
		if( $a == 6 ){ $imageLink = "img/extras/randimg/car/6.jpg"; }else
		if( $a == 7 ){ $imageLink = "img/extras/randimg/car/7.jpg"; }else
					 { $imageLink = "img/extras/randimg/car/8.jpg"; } 
		
	}else if( $type == 2){
		if( $b == 1 ){ $imageLink = "img/extras/randimg/spare/1.jpg"; }else
		if( $b == 2 ){ $imageLink = "img/extras/randimg/spare/2.jpg"; }else
		if( $b == 3 ){ $imageLink = "img/extras/randimg/spare/3.jpg"; }else
		if( $b == 4 ){ $imageLink = "img/extras/randimg/spare/4.jpg"; }else
		if( $b == 5 ){ $imageLink = "img/extras/randimg/spare/5.jpg"; }else
		if( $b == 6 ){ $imageLink = "img/extras/randimg/spare/6.jpg"; }else
		if( $b == 7 ){ $imageLink = "img/extras/randimg/spare/7.jpg"; }else
		if( $b == 8 ){ $imageLink = "img/extras/randimg/spare/8.jpg"; }else
		if( $b == 9 ){ $imageLink = "img/extras/randimg/spare/9.jpg"; }else
		if( $b == 10 ){ $imageLink = "img/extras/randimg/spare/10.jpg"; }else
					 { $imageLink = "img/extras/randimg/spare/11.jpg"; } 
	}else{
		if( $c == 1 ){ $imageLink = "img/extras/randimg/car/1.jpg"; }else
		if( $c == 2 ){ $imageLink = "img/extras/randimg/car/2.jpg"; }else
		if( $c == 3 ){ $imageLink = "img/extras/randimg/car/3.jpg"; }else
		if( $c == 4 ){ $imageLink = "img/extras/randimg/car/4.jpg"; }else
		if( $c == 5 ){ $imageLink = "img/extras/randimg/car/5.jpg"; }else
		if( $c == 6 ){ $imageLink = "img/extras/randimg/car/6.jpg"; }else
		if( $c == 7 ){ $imageLink = "img/extras/randimg/car/7.jpg"; }else
		if( $c == 8 ){ $imageLink = "img/extras/randimg/car/8.jpg"; } 
		if( $c == 9 ){ $imageLink = "img/extras/randimg/spare/1.jpg"; }else
		if( $c == 10 ){ $imageLink = "img/extras/randimg/spare/2.jpg"; }else
		if( $c == 11 ){ $imageLink = "img/extras/randimg/spare/3.jpg"; }else
		if( $c == 12 ){ $imageLink = "img/extras/randimg/spare/4.jpg"; }else
		if( $c == 13 ){ $imageLink = "img/extras/randimg/spare/5.jpg"; }else
		if( $c == 14 ){ $imageLink = "img/extras/randimg/spare/6.jpg"; }else
		if( $c == 15 ){ $imageLink = "img/extras/randimg/spare/7.jpg"; }else
		if( $c == 16 ){ $imageLink = "img/extras/randimg/spare/8.jpg"; }else
		if( $c == 17 ){ $imageLink = "img/extras/randimg/spare/9.jpg"; }else
		if( $c == 18 ){ $imageLink = "img/extras/randimg/spare/10.jpg"; }else
					 { $imageLink = "img/extras/randimg/spare/11.jpg"; } 
	}
	return asset($imageLink);
}

?>

@extends('layouts.core')
@section('title','Home')
@section('content')

<div class="homeNav">
	<div class="boxx" style="height:inherit; position: relative; padding-left:20px;">
		<div class="hnCat-btn">
			<div class="cbtn b-fakeLink">CATEGORIES <span class=""></span></div>
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
		<div class="hnExtra">
			<a href="dealsoftheday">Deals of the day</a>
			<a href="superdeals">Super deals</a>
		</div>	
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
			
			<div>
				<span class="adhead">Motors</span>
				<div class="adcont-3">
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(1); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(1); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(1); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>
				</div>
			</div>
			
			<div>
				<span class="adhead">Spares</span>
				<div class="adcont-5">
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(2); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(2); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(2); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(2); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(2); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>
				</div>
			</div>
			
			<div >
				<span class="adhead">Hot Searches</span>
				<div class="adcont-4">
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(3); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(3); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(3); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(3); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(3); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(3); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(3); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
					<a href="link"> 
						<div class="adimg"><img src=" <?php  echo randImg(3); ?> "></div>
						<div class="adtitle"><div>Title</div><div class="priceT"><?php  echo mt_rand(20,9999); ?> AED</div></div>
					</a>	
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection
