@extends('layouts.core')
@section('title','Home')
@section('content')

<?php
	$navItemName = array("Motors",
						"Auto Accessories",
						"Auto Spare Parts",
						"Jobs",
						"Classifieds",
						"Property for Sale",
						"Property for Rent",
						"Home and Kitchen",
						"Electronics",
						"Apartments",
						"Villas",
						"All of Globex");
						
	$navItems = array(array("Used Cars for Sale",
							"Boats",
							"Heavy Vehicles",
							"Motorcycles"),
							
					  array("Apparel , Merchandise & Accessories",
							"Automotive Tools"),
							
					  array("Boat parts",
							"Car Parts",
							"Motorcycle Parts"),
							
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
					  array("shbi",
							"Rinoy",
							"shaaji 1 - 3",
							"Rinoy",
							"Rinoy",
							"Rinoy")		
							);	

		$navItemsCont = array(array(array("AUDI", "BMW", "Ford","Land Rover", "Mercedes-Benz","Land Rover", "Mercedes-Benz" ),
								array("MotorBoats", "Row/Paddle Boats", "Sail Boats"),
								array("Buses", "Cranes", "Forklifts","Trailers", "Trucks", "Tankers", "Parts & Engine"),
								array("Cruiser/Chopper", "Mo-Ped", "Off-Road/Dual Purpose","Scooter", "Sport Bike", "Standard Motorcycle","Touring", "Trike")
								),
								
						  array(array("Apparel", "Boat Accessories", "Car / 4x4 Accessories","Merchandise", "Motorcycle Accessories"),
								array("Tool Accessories", "Tool sets", "Tools")
								),
						  array(array("Body parts & Accessories", "Engine Parts", "Plumbing & Ventilation" ),
								array("A/C & Heating Parts", "Batteries", "Brakes","Engine & Computer Parts", "Exhaust/Air Intake","Exterior Parts","Interior Parts","Lighting","Suspension","Wheels/Tires"),
								array("Accessories", "Body & Frames", "Engines & Components","Lighting",  "Wheels/Tires","Number Plates")
								),
						  array(array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5")
								),
						  array(array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5")
								),
						  array(array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5")
								),
						  array(array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5")
								),
						  array(array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5")
								),
						  array(array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5")
								),
						  array(array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5")
								),
						  array(array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5")
								),
						  array(array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5"),
								array("item1", "item2", "item3","item4", "item5")
								)		
						  
						  );
?>
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
