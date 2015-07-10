jQuery(document).ready(function() {
	$(".catList > div").hover(function(){
		$(this).find(".catCont").css({"display":"block"});
		$(this).css({"border-right":"none"});
	},
	function(){
		$(".catList > div").find(".catCont").css({"display":"none"});
		$(".catList > div").css({"border-right":"1px solid rgba(0,0,0,0.1)"});
	}
	);
	

	
	$('.adhead-timer').countdown({
		timestamp	: (new Date()).getTime() + 1*24*60*60*1000
	});
});