jQuery(document).ready(function() { 
	$('.mAction').click(function(){
		$('.message').hide();
	});
	
	// type has 3 values - succes , fail , info or 1 , 2 , 3 respectively
	// third argument Time is used for duration of the message / auto hide
	// sensitive hide lets you to activate autohide message only if the user is not pointer the mouse on the message
	// you can also set the time after the mouse  out - the last argument
	
	message = "This is just a test message to show this message is working, tons of features inside...!!! check it out. you can find everything in pushNotifications.js";
	
	pushNotification(message,3 , "Push Notifications" ,4000 ,true, 1000);
	
	function pushNotification(message,type,title,time,sensitiveHide,sensitiveHideTime){
		if($.isNumeric(type)){
			if(type== 1){ $('.message .mSuccessIcon').show(); }
			else if(type== 2 ){ $('.message .mFailIcon').show(); }
			else if(type== 3 ){ $('.message .mInfoIcon').show(); }
			else { $('.message .mInfoIcon').show(); }
		}else{
			if(type.indexOf('success') || type.indexOf('Success')){ $('.message .mSuccessIcon').show(); }
			else if(type.indexOf('fail') || type.indexOf('Fail')){ $('.message .mFailIcon').show(); }
			else if(type.indexOf('Info') || type.indexOf('Info')){ $('.message .mInfoIcon').show(); }
			else { $('.message .mInfoIcon').show(); }
		}
		$('.message .mCont > .mc-head').html(title);
		$('.message .mCont > .mc-mes').html(message);
		$('.message').show();
		if(time >= 1){
			var autoHideIntervel = setTimeout( function(){ $('.message').hide(); } , time);
		}
		if(sensitiveHide){
			$('.message').mouseover(function(){
				clearTimeout(autoHideIntervel);
			});
			$('.message').mouseout(function(){
				if(sensitiveHideTime > 0 )time = sensitiveHideTime; 
				autoHideIntervel = setTimeout( function(){ $('.message').hide(); } , time);
			});
		}
	}
	
});