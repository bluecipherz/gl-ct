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
	
	var WizTabN = "";
	
	
	$(".wizard-tab > li").click(function() {
		var WizTabN = $(this).attr("name");
		$("#tab-content > div").css({"display":"none"});
		$("#" + WizTabN).css({"display":"block"});
		var parent = $(this).parent();
		parent.find("li").removeClass('active');
		$(this).addClass('active');
	});
	
});