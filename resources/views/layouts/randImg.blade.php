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
