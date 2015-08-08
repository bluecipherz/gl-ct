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
        var btnid = $(this).attr('btnId');
        proceedTab(btnid);
	});

    $("#wizardT-1 #register-btn").click(function() {
        var btnid = $(this).attr('btnId');

        var email = $("#wizardT-1 #register-email").val();
        var pass = $("#wizardT-1 #register-password").val();
        var pass_conf = $("#wizardT-1 #register-password-confirm").val();

        $.post('/auth/register', {'email': email, 'password': pass, 'password_confirmation': pass_conf})
            .success(function (response) {
                console.log('success : ' + response);
                afterLogin(response);
                proceedTab(btnid);
            })
            .fail(function(response) {
                console.log('fail : ' + response.responseText);
            });
    });

    $("#wizardT-1 #login-btn").click(function() {
        var btnid = $(this).attr('btnId');

        var email = $("#wizardT-1 #auth-email").val();
        var pass = $("#wizardT-1 #auth-password").val();

        $.post('/auth/login', {'email': email, 'password': pass})
            .success(function (response) {
                console.log('success : ' + response);
                afterLogin(response);
                proceedTab(btnid);
            })
            .fail(function(response) {
                console.log('fail : ' + response.responseText);
            });
    });

    function proceedTab(btnid) {
        attrId = btnid;
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
    }
	
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
                    afterLogin(response);
				})
				.fail(function(response) {
					console.log('fail : ' + response.responseText);
				});
		}
	});

    function afterLogin(response) {;
        $('.login-box').html(response); // for login box
        $("#wizardT-1 > .login").hide();
        $("#wizardT-1 > .loggedin").show();
    }

    //$("wizardT-1")
	
	//select category button
	
	
	$(".addCat").click(function(){
		catselReset();
		selCatPopContup();
	});
	
	$(".selcat-obbtn").click(function(){
		selcatPopClose();
	});
	
	function selcatPopClose(){
		$(".selCatOuter").css({"display":"none"});
		$("body").css("overflow", "auto");
	}
	function selCatPopContup(){
		$("body").css("overflow", "hidden");
		$(".selCatOuter").css({"display":"block"});
	}
	function selCatChangeButton(){
		$(".selCat2sec").css({"display":"block"});
		$(".selCat1sec").css({"display":"none"});
	}
	
	//popup - select
	var clickBase = "";
	var catLevel = 1;
	var catidText;
	var subcatidText;
	var postcatidText;
	
	var catidBase;
	var subcatidBase;
	var postcatidBase;
	
	
		$(".selCatPopCont  .setcat-cat").click(function(){
			if(catLevel==1){
				catselForward($(this));
				catidText = $(this).text();
				catidBase =  $(this).attr('idbase');
				$(".selCatPopTitle").html(catidText);
				catLevel = 2;
			}
		});
		$(".selCatPopCont  .setcat-subCat").click(function(){
			if(catLevel==2){
				catselForward($(this));
				subcatidText = $(this).text();
				subcatidBase =  $(this).attr('idbase');
				$(".selCatPopTitle").html(subcatidText);
				catLevel = 3;
			}
		});
		$(".selCatPopCont  .setcat-postCat").click(function(){
			if(catLevel==3){
				var catid = $(this).attr('catid');
				var subcatid = $(this).attr('subcatid');
				var postcatid = $(this).attr('postcatid');
				postcatidBase =  $(this).attr('idbase');
				postcatidText = $(this).text();
				var catPath = catidText +" > "+ subcatidText +" > "+ postcatidText;
				$(".selcatPath").html("<span class='selpathText'>" + catidText + " </span> <span class='selpathArrow'> > </span>	<span class='selpathText'>" + subcatidText + " </span> <span class='selpathArrow'>  > </span><span class='selpathText'>" + postcatidText + " </span> ");
				$("#adCatId").val( $(this).attr('databaseid') );
				selCatChangeButton();
				selcatPopClose();
				catLevel = 1;
				selpathDummyH = $(".selcatPath").outerHeight();
				$(".selcatPathDummy").css({"height": selpathDummyH ,"margin" : "5px"});
			}
		});
		$(".selCatPopBackBtn").click(function(){
			catselBackward();
		});
		
		function catselForward(that){
			$(".sc-post-frame").css({"display":"none"});
			$(".sc-sub-frame").css({"display":"none"});
			$(".sc-frame").css({"display":"none"});	
			$("." + that.attr('idbase')).css({"display":"block"});
			that.parent().css({"display":"none"});
			$(".selCatPopBackBtn").removeClass('selCatPopBackBtn-inact');
		}
		
		function catselReset(){
			catLevel =1;
			$(".sc-sub-frame").css({"display":"none"});
			$(".sc-post-frame").css({"display":"none"});
			$(".sc-frame").css({"display":"block"});
			$(".selCatPopBackBtn").addClass('selCatPopBackBtn-inact');
			$(".selCatPopTitle").html("Select a Category");
		}
		
		function catselBackward(){
			if(catLevel == 3){
				$(".sc-post-frame").css({"display":"none"});
				$("."+catidBase).css({"display":"block"});
				$(".sc-frame").css({"display":"none"});	
				$(".selCatPopTitle").html(catidText);
				catLevel = 2;
			}else 
			if(catLevel == 2){
				$(".sc-post-frame").css({"display":"none"});
				$(".sc-sub-frame").css({"display":"none"});
				$(".sc-frame").css({"display":"block"});		
				$(".selCatPopBackBtn").addClass('selCatPopBackBtn-inact');
				$(".selCatPopTitle").html("Select a Category");
				catLevel = 1;
			}else 
			if(catLevel == 1){
				
			}
		}

	//add photo button

    var uploadAction = function() {
        //console.log('file path ' + $(this).parent().find(':file').val());
        $(this).parent().find(':file').click();
    }

    var changeAction = function() {
        $this = $(this);
        $this.parent().parent().find('.upPhoto').text($this.val());
    };

	$(".addPhoto").click(function(){
        var parent = $('<div/>');
        var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'}).appendTo(parent);
        $('<input type="file" name="image[]">').change(changeAction).appendTo(wrapper); // ad post filechooser
        $("<div/>").addClass('upPhoto').text('Upload photo').click(uploadAction).show().appendTo(parent);
		$(this).before(parent);
	});

    $(':file').change(changeAction);

    $('.upPhoto').click(uploadAction).show();

    //console.log($(':file').val()); // file chooser debug

    $('#adpost').fileupload({
        url: '/resellerimages',
        dataType: 'json',
        success: function(data) {
            console.log(data);
        },
        done: function (e, data) {
            //$.each(data.result.files, function (index, file) {
            //    $('<p/>').text(file.name).appendTo('.upPhoto');
            //    console.log('file name ' + file.name);
            //});
        },
        progressall: function (e, data) {
            //var progress = parseInt(data.loaded / data.total * 100, 10);
            //console.log(progress);
            //$('#progress .progress-bar').css(
            //    'width',
            //    progress + '%'
            //);
        },
        error: function($e, data) {
            console.log('error ' + $e.responseText);
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled')
    ;

    $('#adPost').click(function() {
        var attributes = {
            'adtitle' : $('#adTitle').val(),
            'category_id' : $('#adCatId').val(),
            'description' : $('#adDesc').val(),
            'price' : $('#adPrice').val(),
            'images' : $('#adPics').val(),
            'name' : $('#customerName').val(),
            'pin' : $('#customerPin').val(),
            'address' : $('#customerAddress').val(),
            'state' : $('#customerState').val(),
            'city' : $('#customerCity').val(),
            'phone' : $('#customerPhone').val()
        };
        console.log(attributes);
        $.post('/advertisements', attributes).success(function(data) {
            console.log('success ' + data);
        }).fail(function(data) {
            console.log(data.responseText)
        });
    });
});