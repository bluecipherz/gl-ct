@extends('layouts.core')
@section('title','Home')
@section('content')

<?php
	$navItemName = array("All of Globex",
						"Motors",
						"Auto Accessories",
						"Auto Spare Parts",
						"Jobs",
						"Classifieds",
						"Property for Sale",
						"Property for Rent",
						"Home and Kitchen",
						"Electronics",
						"Apartments",
						"Villas");
						
	$navItems = array(array("shbi",
							"Rinoy",
							"shaaji 1 - 3"),
							
					  array("Cat 2 - 1",
							"Cat 2 - 2",
							"Cat 2 - 3"),
							
					  array("Cat 3 - 1",
							"Cat 3 - 2",
							"Cat 3 - 3"),
							
					  array("Cat 4 - 1",
							"Cat 4 - 2",
							"Cat 4 - 3"),
							
					  array("Cat 5 - 1",
							"Cat 5 - 2",
							"Cat 5 - 3"),
							
					  array("Cat 6 - 1",
							"Cat 6 - 2",
							"Cat 6 - 3"),	
							
					  array("Cat 7 - 1",
							"Cat 7 - 2",
							"Cat 7 - 3"),
							
					  array("Cat 8 - 1",
							"Cat 8 - 2",
							"Cat 8 - 3"),
							
					  array("Cat 9 - 1",
							"Cat 9 - 2",
							"Cat 9 - 3"),
							
					  array("Cat 10 - 1",
							"Cat 10 - 2",
							"Cat 10 - 3"),
							
					  array("Cat 11 - 1",
							"Cat 11 - 2",
							"Cat 11 - 3"),
							
					  array("Cat 12 - 1",
							"Cat 12 - 2",
							"Cat 12 - 3"),	
							);	

		$navItemsCont = array(array(array("dasd", "dasd", "asd"),
								array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3")
								),
						  array(array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3")
								),
						  array(array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3")
								),
						  array(array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3")
								),
						  array(array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3")
								),
						  array(array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3")
								),
						  array(array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3")
								),
						  array(array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3")
								),
						  array(array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3")
								),
						  array(array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3")
								),
						  array(array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3")
								),
						  array(array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3"),
								array("item  - 1", "item  - 2", "item  - 3")
								)
						  
						  );
?>
<div class="homeNav">
	<div class="boxx" style="height:inherit; position: relative; padding-left:20px;">
		<div class="hnCat-btn">
			<div class="cbtn b-fakeLink">CATEGORIES <span class=""></span></div>
			<div class="catList">
				@for($i=1;$i<=12;$i++)
				<div class="catItem">
					<div> {{$navItemName[$i-1]}} <span style="position:absolute; absolute:20px; ">|</span></div>
					<div class="catCont">
					<span style="font-size:30px; color:#f8a12e; font-family:Dosis;">GUI of this space is in construction, But the Functions Works Cool , For test purpose check the path {{ $i }}</span>
					<?php
					$ItemC = sizeof($navItems[$i-1]);
					for($j=1;$j<=$ItemC ; $j++){
					?>
						<div class="catContHead">
							{{ $navItems[$i-1][$j-1] }}
						</div>
						<?php
							$ItemCh = sizeof($navItemsCont[$i-1][$j-1]);
							for($k=1;$k<=$ItemCh ; $k++){
						?>
							<div class="catContHeadItems">{{ $navItemsCont[$i-1][$j-1][$k-1] }}</div>
						<?php } ?>
					<?php } ?>	
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
