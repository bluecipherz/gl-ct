@extends('layouts.core')
@section('title','Home')
@section('content')

<div class="homeNav">
	<div class="boxx" style="height:inherit; position: relative; padding-left:20px;">
		<div class="hnCat-btn">
			<div class="cbtn b-fakeLink">CATEGORIES <span class=""></span></div>
			<div class="catList">
				@for($i=1;$i<=12;$i++)
				<div class="catItem BendLineBase">
					<div class="catLi cItem"> {{$navItemName[$i-1]}}<span class="BendLine"><span class="BendLine1"></span><span class="BendLine2"></span></span></div>
					<div class="catCont">
						<div class="catSec-1 col-md-4">
						
							<?php
							$ItemC = sizeof($navItems[$i-1]);
							
							$jCounter = 1;
							
							for($j=1;$j<=$ItemC ; $j++){ 
							
							
							?>
								<a class="catContHead cItem">
									{{ $navItems[$i-1][$j-1] }} <span class="catPointer"> < </span>
								</a>
								<?php  
									$LBreak = 0;
									$ItemChNext = 0;
									$ItemChPrev = 0;
									
									$ItemCh = sizeof($navItemsCont[$i-1][$j-1]);
									if(isset($navItemsCont[$i-1][$j])){
										$ItemChNext = sizeof($navItemsCont[$i-1][$j]);
									}
									if(isset($navItemsCont[$i-2][$j])){
										$ItemChPrev = sizeof($navItemsCont[$i-2][$j]);
									}
									
									if($ItemCh >10) $ItemCh = 11;
									if($ItemChNext >10) $ItemChNext = 11;
									if( $ItemChNext > (10 - $ItemCh) ){ $jCounter++; }  
									
									for($k=1;$k<=$ItemCh ; $k++){
								?>
									<a class="catContHeadItems cItem">{{ $navItemsCont[$i-1][$j-1][$k-1] }} <span class="catPointer"> < </span></a>
									
								<?php }
									if($jCounter == 2 && $jCounter < $ItemC) {
										$LBreak = 0;
										?>
											</div>
											<div class="catSec-2 col-md-4">
										<?php
									}else if($jCounter == 4) {
										$LBreak = 0;
										?>
											</div>
											<div class="catSec-3 col-md-4">
										<?php
									}
									$jCounter++;	
								} ?>	
						</div>
					</div>
				</div>
				@endfor
			</div>
		</div>
		<div class="hnExtra">
			<span>Deals of the day</span>
			<span>Super deal</span>
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
			</div>
			
			<div>
				<span class="adhead">Motors</span>
			</div>
			
			<div>
				<span class="adhead">Spares</span>
			</div>
			
			@for($i=1;$i<=3;$i++)
				<div >
					<span style="font-size:50px; color:#fff1de; font-family:Dosis;">This is add / Offer space {{$i}}</span>
				</div>
			@endfor
		</div>
	</div>
</div>
@endsection
