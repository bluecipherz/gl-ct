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
	var tabReal = true; /* disable this feature only for developing purpose  */
	var tabCompleted = 1;
	
	var WizTabN = "";
	var tabID = "";
	var parent = "";
	var login = true;
	var tab1Sec = 1;
	
	that = "";
	attrId =1;
	
	
	if(login){
		attrId =2;
		tabCompleted = 2;
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
			parent.find("li:nth-child("+ tabID +")").addClass('Cnext');
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
});