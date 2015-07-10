$(document).ready(function(){
	$(".dashboard-nav > li").click(function() {
        $(".dashboard-nav > li.active").removeClass("active");
        $(this).addClass("active");
    });
});
