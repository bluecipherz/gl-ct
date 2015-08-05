jQuery(document).ready(function() {


	/*
	 * Configure all ajax requests to use CSRF token
	 * This applies to all pages.
	 */
	$.ajaxSetup({
		headers : {
			'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	$(".catList > div").hover(
		function(){
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
	var tabReal = true; /* disable this feature only for developing purpose  */
	var tabCompleted = 1;
	
	var WizTabN = "";
	var tabID = "";
	var parent = "";
	var tab1Sec = 1;
	
	
	/* setting up default values */
	
	$mainlrpheight = ( $(window).height() - $(".login-box").outerHeight() ) / 2 ;
	$pageName = "";
	if ($(".pageType").length) { $pageName = $(".pageType").attr('page'); }
	
	/* Home reg/login functions */
	if($mainlrpheight > 100){$(".login-box-main").css({"marginTop": $mainlrpheight });}
	
	
	$(".acctBtn").click(function(){
        console.log('clicked' + login);
		if($pageName != "login"){
            console.log('clicked2');
			$(".mainReg").css({"display":"block"});
			$("body").css("overflow", "hidden");
			setTimeout(function(){ $(".mainReg").css({"opacity":"1"}); }, 10);
		}
	});
	
	$(".overlay-backbtn").click(function(){
		hideOverlay();
	});
	
	function hideOverlay() {
		$(".mainReg").css({"opacity":"0"});
		$("body").css("overflow", "auto");
		setTimeout(function(){ $(".mainReg").css({"display":"none"}); }, 500);
	}
	
	$(".loginMBLbtn").click(function(){
		console.log("heelll");
		$(".loginMB").css({"margin-top":"-400px"}); 
	});
	$(".regMBLbtn").click(function(){
		$(".loginMB").css({"margin-top":"0"}); 
	});
	
	
	that = "";
	attrId =1;
	
	login = 2;
	if(login){
		attrId =2;
		tabCompleted = attrId;
		findAttr(attrId);
		tabAttr(parent,tabID,that,WizTabN);
		
		$("#wizardT-1 > .loggedin").css({"display":"block"});
	}else{
		$("#wizardT-1 > .login").css({"display":"block"});
	}
	
	
	$("#tab-content .nextbtn").click(function() {
		attrId =$(this).attr('btnId');
		attrId++;
		tabCompleted = attrId;
		if(attrId <= 4){
			findAttr(attrId);
			tabAttr(parent,tabID,that,WizTabN); 
		}else{
			/* 
			 *	Code that switch this page to payment result page
			 */
		}
	});
	
	$("#tab-content .backbtn").click(function() {
		attrId =$(this).attr('btnId');
		attrId--;
		if(attrId >= 1){
			findAttr(attrId);
			tabAttr(parent,tabID,that,WizTabN); 
		}else{
			/* 
			 *	Code that switch this page to cart
			 */
		}
	});
	
	$(".wizard-tab > li").click(function() {
		attrId =$(this).attr('tabId');
		findAttr(attrId);
		if(tabID <= tabCompleted || tabReal == false){
			tabAttr(parent,tabID,that,WizTabN);
		}
	});

	function tabAttr(parent,tabID,that,WizTabN){
		parent.find("li").removeClass('Cnext');
		parent.find("li").removeClass('CFinished');
		for(i=1;i<=3;i++){
			tabID++
			parent.find("li:nth-child(" + tabID + ")").addClass('Cnext');
		}
		tabID = tabID - 3;
		for(i=1;i<=3;i++){
			tabID--;
			parent.find("li:nth-child("+ tabID +")").addClass('CFinished');
		}
		$("#tab-content > div").removeClass('CDisplay');
		$("#" + WizTabN).addClass('CDisplay');
		parent.find("li").removeClass('active');
		$(that).addClass('active');
		$(that).addClass('tabCompleted');
	}
	function findAttr(attrId){
		var match = false;
		var attrIdCounter = 1;
		while(!match){
			if(attrId==attrIdCounter){
				WizTabN = $("#WT-"+attrIdCounter).attr("name");
				tabID = $("#WT-"+attrIdCounter).attr("tabId");
				parent = $("#WT-"+attrIdCounter).parent();
				that = $("#WT-"+attrIdCounter);
				match=true;
			}
			attrIdCounter++;	
		}
	}
	
	
	$(".regbtn").click(function() {
		$(".w-log").css({"margin-top":"-400px"});
	});
	$(".logbtn").click(function() {
		$(".w-log").css({"margin-top":"0px"});
	});
	
		var btbId = 4;
		w4tbSwitch(btbId);
	
	$(" .w4-tab > div").click(function (){
		btbId = $(this).attr("btnId");
		w4tbSwitch(btbId);
	});
	
	function w4tbSwitch(btbId){
		$(" .w4-tab > div").removeClass("w4-tab-act");
		$(".w4-tab-b-" + btbId).addClass("w4-tab-act");
		$("#wizardT-4 > .w4-content > div").removeClass("w4-tab-c-act");
		$("#w4-" + btbId).addClass("w4-tab-c-act");
	}
	
	/*
	 * THE BELOW INVOLVES THE USE OF HISTORY API
	 *
	 */
	
	$("#search_q").keydown(function(e) {
		if(e.keyCode == 13) { // search
			console.log(window.location);
			var input = $(this).val();
			var terms = input.trim().replace(/\s+/g, '+');
			var url = '/search?q=' + terms;
			if(!window.location.pathname.startsWith('/search')) {
				window.location.replace('/search?q=' + terms);
			}
			$.get('/search?q=' + input).success(function(rsp) {
				$(".productsCont").html($(rsp).find(".productsCont").html());
				/* HISTORY API */
				if(url != window.location) {
					window.history.pushState({path : url}, '', url);
				}
			});
		}
	});
	
	/**
     * Go back action
     */
	window.addEventListener("popstate", function(e) {
		history.back();
	});
	
	// END HISTORY API



    if(window.location.pathname.startsWith('/admin')) {

        $.get('/products/all-products').success(function(response) {
            $("#search_q").autocomplete({
                source : response
            });
        });

    }

	$("#category").change(function() {
		var category_id = $(this).val();
		$.get('/category/sub-categories', {category : category_id}).success(function(response) {
			var select = $("#sub_category");
			select.empty();
			$.each(response, function(key, value) {
				select.append($("<option>").attr("value", key).text(value));
			});
		});
	});
	
	$("#sub_category").change(function() {
		var category_id = $(this).val();
		$.get('/category/post-sub-cats', {sub_category : category_id}).success(function(response) {
			var select = $("#post_sub_cat");
			select.empty();
			$.each(response, function(key, value) {
				select.append($("<option>").attr("value", key).text(value));
			});
		});
	});
	
	//ADMIN
	
	$(" .cust-list-group > li > a").click(function(){
		$(".cust-list-group > li > a").removeClass('.adm-act');
		$(this).addClass('.adm-act');
	});
	
	$("#auth-register-btn").click(function(e) {
		var email = $("#auth-register-email").val();
		var pass = $("#auth-register-pass").val();
		var passAgain = $("#auth-register-pass-again").val();
		
		if(email == '' || pass == '' || pass != passAgain) {
			alert('Somethings wrong');
		} else {
			$.post('/auth/register', {email:email, password:pass, password_confirmation:passAgain})
				.success(function(response) {
					console.log('success : ' + response.responseText);
					hideOverlay();
					$('.login-box')
						.html(response);
				})
				.fail(function(response) {
					console.log('fail : ' + response.responseText);
				});
		}
	});
	
	$("#auth-login-btn").click(function(e) {
		var email = $("#auth-login-email").val();
		var pass = $("#auth-login-pass").val();
		
		if(email == '' || pass == '') {
			alert('Login incorrect');
		} else {
			$.post('/auth/login', {email:email, password:pass})
				.success(function(response) {
					console.log('success : ' + response);
					hideOverlay();
					//$('.loginMB').hide();
					//$('.regMB').hide();
					$('.login-box')
						.html(response);
				})
				.fail(function(response) {
					console.log('fail : ' + response.responseText);
				});
		}
	});
	
	//select category button
	
	$categorized = false;
	$selCat2 = true;
	
	$(".addCat").click(function(){
		selCatPopupReset();
		selCatPopup();
		if($categorized && $selCat2) { selCatChangeButton(); $selCat2 = false; }
	});
	
	$(".selcat-obbtn").click(function(){
		$(".selCatOuter").css({"display":"none"});
		$("body").css("overflow", "auto");
	});
	
	function selCatPopup(){
		$("body").css("overflow", "hidden");
		$(".selCatOuter").css({"display":"block"});
	}
	function selCatPopupReset(){
		
	}
	function selCatChangeButton(){
		$(".selCat2sec").css({"display":"block"});
		$(".selCat1sec").css({"display":"none"});
	}
	
	//popup - select 

	
		$(".setcat-cat").click(function(){
			$(".selCatPop > div").css({"display":"none"});
			$(this).css({"display":"block"});
			$(this).find(".setcat-subCat").css({"display":"block"});
		});
		
		$(".setcat-subCat").click(function(){
			$(".setcat-subCat> div").css({"display":"none"});
			$(this).css({"display":"block"});
			$(this).find("div").css({"display":"block"});
		});
	
	//add photo button
	
	$(".addPhoto").click(function(){
		$(this).before($("<span>").addClass('upPhoto').text('Upload photo'));
	});
});