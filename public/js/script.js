jQuery(document).ready(function() {
	
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
        //console.log('clicked' + login);
		if($pageName != "login"){
            //console.log('clicked2');
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
		$(".loginMB").css({"margin-top":"-500px"}); 
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
        if(btnid == 2){
            if(wStep2()) { proceedTab(btnid); winScrollTop(); }
        }else if(btnid == 3){
            if(wStep3()) { proceedTab(btnid); wStep4Update();  winScrollTop(); }
        }else{
            proceedTab(btnid);
        }

	});

    function winScrollTop(){$("html, body").animate({ scrollTop: 0 }, 0);}

    $("#wizardT-1 #register-btn").click(function() {
        var btnid = $(this).attr('btnId');

        var email = $("#wizardT-1 #register-email").val();
        var pass = $("#wizardT-1 #register-password").val();
        var pass_conf = $("#wizardT-1 #register-password-confirm").val();

        if(email == '' || pass == '') {
            if(email == '') pnPopup('register-email', 'Email cannot be left blank');
            if(pass == '') pnPopup('register-password', 'Password cannot be left blank');
            if(pass_conf == '') pnPopup('register-password-confirm', 'Password Confirmation cannot be left blank');
        } else {
            $.post('/auth/register', {'email': email, 'password': pass, 'password_confirmation': pass_conf})
                .success(function (response) {
                    console.log('success : ' + response);
                    afterLogin(response);
                    proceedTab(btnid);
                })
                .fail(function (response) {
                    console.log('fail : ' + response.responseText);
                    if(response.responseText.email) pnPopup('register-email', response.responseText.email);
                    if(response.responseText.password) pnPopup('register-password', response.responseText.password);
                });
        }
    });

    $("#wizardT-1 #login-btn").click(function() {
        var btnid = $(this).attr('btnId');

        var email = $("#wizardT-1 #auth-email").val();
        var pass = $("#wizardT-1 #auth-password").val();

        if(email == '' || pass == '') {
            if(email == '') pnPopup('auth-email', 'Email cannot be left blank');
            if(pass == '') pnPopup('auth-password', 'Password cannot be left blank');
        } else {
            $.post('/auth/login', {'email': email, 'password': pass})
                .success(function (response) {
                    console.log('success : ' + response);
                    afterLogin(response);
                    proceedTab(btnid);
                })
                .fail(function (response) {
                    //console.log('fail : ' + response.responseText);
                    pushNotification("Login Incorrect", "fail", "Error", null);
                });
        }
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
            if(attrId == 4){ wStep4Update(); }
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
		if(e.keyCode == 13 ) {
			searchq();
		}
	});
	$("#serachBtn").click(function(){searchq();});
	function searchq(){
		// search
		var path = '/search';
		var input = $("#search_q").val();
		var terms = input.trim().replace(/\s+/g, '+');
		var url = path + '?q=' + terms;
		if(!window.location.pathname.startsWith(path)) {
			window.location.replace(path + '?q=' + terms);
		}
		$.get(path + '?q=' + input).success(function(rsp) {
			$(".productsCont").html($(rsp).find(".productsCont").html());
			/* HISTORY API */
			if(url != window.location) {
				window.history.pushState({path : url}, '', url);
			}
		});
	}

    // Wizard tab 2 input triggers
    $('#adTitle').keyup(function(){ wStep2(); });
    $('#adDesc').keyup(function(){ wStep2(); });
    $('#adPrice').keyup(function(){ wStep2(); });



    var lastTab = false;
    var w2nBtn = false;
    function wStep2(){
        var title = $('#adTitle').val();
        var description = $('#adDesc').val();

        var cid1 = catidText;
        var cid2 = subcatidText;
        var cid3 = postcatidText;
        var cid = postcatid;
        var price = $('#adPrice').val();

       // console.log("Title : " + title + " Desc : " + description + " category : " + cid1 + " > " + cid2 + " > " + cid3 + " | price : " + price + " cat id " + cid);
        if(
            title!="" && description!="" && cid1!="" && cid2!="" && cid3!="" && cid!="" && price!=""
            && cid1!=undefined && cid2!=undefined && cid3!=undefined && cid!=undefined
        ){
            if(!w2nBtn){$('#w2nBtn').removeClass('-btnDis'); w2nBtn = true;}
            $('#WT-3').addClass('tabCompleted');
            if(lastTab) {
                tabCompleted = 4;
            }else{
                tabCompleted = 3;
            }
            return true;
        }else{
            if(w2nBtn){$('#w2nBtn').addClass('-btnDis'); w2nBtn = false;}
            tabCompleted = 2;
            $('#WT-3').removeClass('tabCompleted');
            $('#WT-4').removeClass('tabCompleted');
            return false

        }
    }
    wStep2Start();

    function wStep2Start(){

        pnPopup("adTitle","Required",1);
        pnPopup("adDesc","Required",1);
        pnPopup("adCatSel","Required",1);
        pnPopup("adPrice","Required",1);
    }

    $('#customerName').keyup(function(){ wStep3(); });
    $('#customerPin').keyup(function(){ wStep3(); });
    $('#customerAddress').keyup(function(){ wStep3(); });
    $('#customerCity').keyup(function(){ wStep3(); });
    $('#customerPhone').keyup(function(){ wStep3(); });


    var w3nBtn = false;
    function wStep3(){
        var customerName = $('#customerName').val();
        var customerPin = $('#customerPin').val();
        var customerAddress = $('#customerAddress').val();
        var customerCity = $('#customerCity').val();
        var customerPhone = $('#customerPhone').val();


        if(customerName!="" && customerPin!="" && customerAddress!="" && customerCity!="" && customerPhone!=""){
            if(!w3nBtn){$('#w3nBtn').removeClass('-btnDis'); w3nBtn = true;}
            $('#WT-4').addClass('tabCompleted');
            tabCompleted = 4;
            return true;
        }else{
            if(w3nBtn){$('#w3nBtn').addClass('-btnDis'); w3nBtn = false;}
            tabCompleted = 3;
            lastTab = false;
            $('#WT-4').removeClass('tabCompleted');
            return false
        }
    }

    wStep3Start();
    function wStep3Start(){
        pnPopup("customerName","Required",1);
        pnPopup("customerPin","Required",1);
        pnPopup("customerAddress","Required",1);
        pnPopup("customerCity","Required",1);
        pnPopup("customerPhone","Required",1);
    }

    function wStep4Update(){

        var title = $('#adTitle').val();
        var description = $('#adDesc').val();
        var cat = "<span class='selpathText'>" + catidText + " </span> <span class='selpathArrow'> > </span>	<span class='selpathText'>" + subcatidText + " </span> <span class='selpathArrow'>  > </span><span class='selpathText'>" + postcatidText + " </span> "
        var price = $('#adPrice').val();
        var customerName = $('#customerName').val();
        var customerPin = $('#customerPin').val();
        var customerAddress = $('#customerAddress').val();
        var customerCity = $('#customerCity').val();
        var customerPhone = $('#customerPhone').val();

        var AdEModel = $('#adModel').val();
        var AdEChassis = $('#adChassis').val();
        var AdEColor = $('#adColor').val();
        var AdEDoors = $('#adDoors').val();

        $('.AdTitle-S').html(title);
        $('.AdDesc-S').html(description);
        $('.AdCat-S').html(cat);
        $('.AdPrice-S').html(price);
        $('.AdName-S').html(customerName);
        $('.AdPin-S').html(customerPin);
        $('.AdAddress-S').html(customerAddress);
        $('.AdCity-S').html(customerCity);
        $('.AdPhNumber-S').html(customerPhone);

        $('.AdEModel-S').html(AdEModel);
        $('.AdEChassis-S').html(AdEChassis);
        $('.AdEColor-S').html(AdEColor);
        $('.AdEDoors-S').html(AdEDoors);
        lastTab = true;
    }


	/**
     * Go back action
     */
	window.addEventListener("popstate", function(e) {
		history.back();
	});
	
	// END HISTORY API
	
    //if(window.location.pathname.startsWith('/admin')) {
        $.post('/products/all').success(function(response) {
            //$("#search_q").autocomplete({
            //    source : response
            //});
        });
    //}

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
            if(email == '') pnPopup('auth-register-email', "Email cannot be left blank");
			if(pass == '') pnPopup('auth-register-pass', "Password cannot be left blank");
			if(pass != passAgain) pnPopup('auth-register-pass-again', "Password could not be matched");
		} else {
			$.post('/auth/register', {email:email, password:pass, password_confirmation:passAgain})
				.success(function(response) {
					console.log('success : ' + response.responseText);
					hideOverlay();
                    afterLogin(response);
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
			if(email == '') pnPopup('auth-login-email', 'Email cannot be left blank');
            if(pass == '') pnPopup('auth-login-pass', 'Password cannot be left blank');
		} else {
			$.post('/auth/login', {email:email, password:pass})
				.success(function(response) {
					console.log('success : ' + response);
					hideOverlay();
                    afterLogin(response);
				})
				.fail(function(response) {
					//console.log('fail : ' + response.responseText);
                    pushNotification("Login Incorrect!", 2);
				});
		}
	});

    function afterLogin(response) {
        $('.login-box .loggedMB').html(response).show(); // for login box
        $('.login-box .loginMB').hide();
        $('#auth-login-email').val('');
        $('#auth-login-pass').val('');
        $('#auth-email').val('');
        $('#auth-pass').val('');
        $('.login-box .regMB').hide();
        $("#wizardT-1 > .login").hide();
        $("#wizardT-1 > .loggedin").show();
    }

    function afterLogout() {
        $('.login-box .loggedMB').hide(); // for login box
        $('.login-box .loginMB').show();
        $('.login-box .regMB').show();
        $("#wizardT-1 > .login").show();
        $("#wizardT-1 > .loggedin").hide();
        tabCompleted = 1;
    }

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
	var postcatid;

	
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
                if(catid == 1){
                    $('.w2Extra').fadeIn();
                }else{
                    $('.w2Extra').fadeOut();
                    $('.w2Extra').find('input').val('');
                }
				postcatid = $(this).attr('postcatid');
				postcatidBase =  $(this).attr('idbase');
				postcatidText = $(this).text();
                setCatGUI(catidText,subcatidText,postcatidText);
                $("#adCatId").val( $(this).attr('databaseid') );
				selCatChangeButton();
				selcatPopClose();

			}
		});

        //setCatGUI("gibaskd","asdlkasd","ansdnklasnd");

        function setCatGUI(t1,t2,t3){
            $(".selcatPath").html("<span class='selpathText'>" + t1 + " </span> <span class='selpathArrow'> > </span>	<span class='selpathText'>" + t2 + " </span> <span class='selpathArrow'>  > </span><span class='selpathText'>" + t3 + " </span> ");
            catLevel = 1;
            setTimeout(function(){setCatPadding()},1);
            selCatChangeButton();
            wStep2();
        }

		$(".selCatPopBackBtn").click(function(){
			catselBackward();
		});

        function setCatPadding(){
            selpathDummyH = $(".selcatPath").outerHeight();
            $(".selcatPathDummy").css({"height": selpathDummyH ,"margin" : "5px"});
        }
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

    var dropAction = {
        url : '/resellerimages',
        thumbnailHeight: 90,
        thumbnailWidth: 90,
        //previewTemplate :
        //'<div class="dz-preview dz-file-preview">' +
            //'<div class="dz-image">' +
                //'<img data-dz-thumbnail />' +
            //'</div>' +
            //'<div class="dz-details">' +
            //    '<div class="dz-filename"><span data-dz-name></span></div>' +
            //    '<div class="dz-size" data-dz-size></div>' +
            //'</div>' +
            //'<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>' +
            //'<div class="dz-success-mark"><span>✔</span></div>' +
        //    '<div class="dz-error-mark"><span>✘</span></div>' +
        //    '<div class="dz-error-message"><span data-dz-errormessage></span></div>' +
        //'</div>',
        accept : function(file, data) {
            //$(this.element).css('padding', 0);
            //$(this.element).find('.dz-message').hide();
        },
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    };

	$(".addPhoto").click(function(){
		Dropzone.autoFind = false;
        $dropzone = $("<div/>").addClass('upPhoto').dropzone(dropAction).show();
        $("<div/>").text("Upload photo").addClass('dz-message').appendTo($dropzone);
		$(this).before($dropzone);
	});

    $('.upPhoto').dropzone(dropAction).show();

    $('#post_ad').click(function() {
        var attributes = {
            'title' : $('#adTitle').val(),
            'category_id' : $('#adCatId').val(),
            'description' : $('#adDesc').val(),
            'price' : $('#adPrice').val(),
            'brand' : '', // temp implementation
            'quantity' : 1, // temp implementation
            //'images' : $('#adPics').val(),
            'name' : $('#customerName').val(),
            'pin' : $('#customerPin').val(),
            'address' : $('#customerAddress').val(),
            'state' : $('#customerState').val(),
            'city' : $('#customerCity').val(),
            'phone' : $('#customerPhone').val()
        };

        var cat = new Category($('#adCatId').val());

        if(cat.isDescendantOf(1)) { // motors
            //console.log('[script.js] motors post category detected');
            attributes.chassis_no = $("#adChassis").val();
            attributes.model = $("#adModel").val();
            attributes.color = $("#adColor").val();
            attributes.doors = $("#adDoors").val();
        }

        console.log(attributes);

        //console.log(attributes);
        $.post('/advertisements', attributes).success(function(data) {
            console.log('success ' + data.responseText);
            window.location.replace('/home');
            pushNotification('Advertisement posted', 'success', 'Success');
        }).fail(function(data) {
            console.log(data.responseText);
			pushNotification(data.responseText['title'],2 , "Field Required" ,7000 ,true, 1000);
        });
    });

    $('#logoutBtn').click(function() {
        $.get('/auth/logout')
            .success(function(data) {
                afterLogout();
            })
            .fail(function(data) {
                console.log(data);
            });
    });

    $('#category-filter').change(function() {
        var id = $(this).val();
        $.post('/categories/' + id + '/children')
            .success(function(data) {
                console.log(data);
                var catlist = $('#category-list').empty();
                $.each(data, function(key, value) {
                    var parent = $("<p/>");
                    parent.append($('<input/>').attr('type', 'checkbox').addClass('glob-control'));
                    parent.append($('<label/>').text(value.name));
                    catlist.append(parent);
                });
            })
            .fail(function(data) {
                console.log('fail');
            })
    });

    /**
     * Dropzone global settings
     * @type {{init: Function, success: Function, removedfile: Function}}
     */
    Dropzone.options.globexDropView = {
        init : function() {
            var myDropzone = this;
            // if page is refreshed, get all files from temp and display it.
            $.post('/resellerimages/all')
                .success(function(data) {
                    if(data)
                        $.each(data, function(key, file) {

                            // Call the default addedfile event handler
                            myDropzone.emit("addedfile", file);

                            // And optionally show the thumbnail of the file:
                            myDropzone.emit("thumbnail", file, file.url);

                            file.tempfile = file.name;

                            myDropzone.emit("complete", file);
                            console.log(file.url);
                        });
                });
        },
        success : function(file, response) {
            file.tempfile = response;
            console.log(response);
        },
        removedfile : function(file) {
            $.post('/resellerimages/delete', {file : file.tempfile, _method : 'DELETE'})
                .success(function() {
                    console.log('success deleting temp image file');
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                })
                .fail(function() {
                    console.log('failure deleting temp image file');
                })
        }
    };

    /**
     * Disable forward tab button
     */
    $(".noFwdTab").keydown(function($e) {
        if($e.keyCode == 9) {
            $e.preventDefault();
        }
    });

    /**
     * Disable backward tab btn
     */
    $(".noBwdTab").keydown(function($e) {
        if($e.keyCode == 9 && $e.shiftKey) {
            $e.preventDefault();
        }
    });

    /**
     * Retrieve all categories from the server
     */
    $.get('/categories/all')
        .success(function(data) {
            setCats(data);
        })
        .fail(function(data) {
            console.log(data.responseText);
        });

    /**
     * Form field template
     * @type {*|jQuery}
     */
    var formGrp = $("<div/>").addClass('form-group form-group-sm');
    $("<label/>").addClass('control-label col-lg-2 col-md-2').appendTo(formGrp);
    var dspDiv = $("<div/>").addClass('col-lg-10 col-md-10').appendTo(formGrp);
    $("<label/>").addClass('control-label').hide().appendTo(dspDiv);
    $("<input/>").attr('type', 'text').addClass('form-control').appendTo(dspDiv);

    /**
     * extra attributes for 'MOTOR' category
     * @type {{chassis_no: string, model: string, color: string, doors: string}}
     */
    var motorAttrs = {
        chassis_no : 'Chassis no',
        model : 'Model',
        color : 'Color',
        doors : 'Doors'
    };

    /**
     * add the form groups in the given array
     * @param datas
     */
    function populateFields(datas) {
        var added = {};
        $(".form-horizontal .form-group").each(function(e) {
            var lbl = $(this).children('label');
            var fldName = lbl.attr('for');
            var fldText = lbl.text();
            if(fldName in datas) {
                added[fldName] = fldText; // mark as added to avoid duplication
            }
        });
        for(var attr in datas) {
            if(!attr in added) { // skip if already added
                var nGrp = formGrp.clone();
                nGrp.children('label').text(datas[attr]).attr('for', attr);
                nGrp.find('div > label').text(datas[attr]).attr('for', attr);
                nGrp.find('div > input').attr('name', attr);
                $('.form-horizontal').append(nGrp);
            }
        }
    }

    /**
     * remove the form groups in the given array
     * @param datas
     */
    function removeFields(datas) {
        $(".form-horizontal .form-group").each(function(e) {
            var fldName = $(this).children('label').attr('for');
            if(fldName in datas) {
                $(this).remove();
            }
        });
    }

    /**
     * Myads category select action.
     */
    $("select[name='category_id']").change(function(e) {
        var cat_id = $(this).val();
        var cat = new Category(cat_id);
        if(cat.isDescendantOf(1)) {
            if (window.location.pathname.startsWith('/advertisements')) {
                populateFields(motorAttrs);
            }
        } else {
            removeFields(motorAttrs);
        }
    });

    /**
     * Myads edit ad button
     */
    $(".edit-ad").click(function(e) {
        console.log('ok');
        var panel = $(this).parent().parent().parent().parent();
        panel.find('.panel-heading .ad-title').hide();
        panel.find('.panel-heading input').show();
        panel.find('.panel-heading .save-ad').show();
        $(this).hide();
        $(panel.find('.form-horizontal .form-group')).each(function() {
            $this = $(this);
            $this.find('div > label').hide();
            $this.find('div > input').show();
            $this.find('div > textarea').show();
            $this.find('div > select').show()
        });
    });

    /**
     * Myads save edited ad
     */
    $(".save-ad").click(function(e) {
        var saveBtn = $(this);
        var panel = $(this).parent().parent().parent().parent();
        panel.spin();
        var ad_id = panel.find('input[type="hidden"]').prop('value');
        var data = {
            _method : 'PATCH',
            title : panel.find('input[name="title"]').val(),
            price : panel.find('input[name="price"]').val(),
            description : panel.find('textarea[name="description"]').val(),
            brand : panel.find('input[name="brand"]').val(),
            category_id : panel.find('select[name="category_id"]').val(),
            name : panel.find('input[name="name"]').val(),
            pin : panel.find('input[name="pin"]').val(),
            address : panel.find('textarea[name="address"]').val(),
            state : panel.find('input[name="state"]').val(),
            city : panel.find('input[name="city"]').val(),
            phone : panel.find('input[name="phone"]').val(),
            quantity : panel.find('input[name="quantity"]').val()
        };
        var cat = new Category(data.category_id);
        if(cat.isDescendantOf(1)) { // motors
            data.chassis_no = panel.find('input[name="chassis_no"]').val();
            data.model = panel.find('input[name="model"]').val();
            data.color = panel.find('input[name="color"]').val();
            data.doors = panel.find('input[name="doors"]').val();
        }
        $.post('/advertisements/' + ad_id, data).success(function(data) {
            console.log(data);
            panel.find('.panel-heading .ad-title').show();
            panel.find('.panel-heading input[name="title"]').hide();
            panel.find('.panel-heading .edit-ad').show();
            saveBtn.hide();
            $(panel.find('.form-horizontal .form-group')).each(function() {
                var $this = $(this);
                var input = $this.find('div > input, textarea');
                input.each(function() {
                    var $this = $(this);
                    //console.log($(this).val());
                    $this.parent().find('label').text($this.val());
                });
                //console.log(input.get()); // show supported
                $this.find('div > label').show();
                $this.find('div > input').hide();
                $this.find('div > textarea').hide();
                $this.find('div > select').hide()
            });
            panel.spin(false);
        }).fail(function(data) {
            console.log(data.responseText);
        })

    });

    $('[data-toggle="tooltip"]').tooltip(); // enable all tooltips


    // Post floating button initialization


    if(!window.location.pathname.startsWith('/advertisements') && !window.location.pathname.startsWith('/admin')  ){
        $('.float-postad').fadeIn();
    }
    $('.float-postad > .closBtn').click(function(){
        $('.float-postad').fadeOut();
        setTimeout($('.float-postad').show(),360000 );
    });

    var lastScrollTop = 0;
    $(window).scroll(function () {
        var st = $(this).scrollTop();
        if (st > lastScrollTop){
            //echo('Down');
        } else {
            //echo('Up');
        }
        lastScrollTop = st;
    });

});