jQuery(document).ready(function() { 
	$('.mAction').click(function(){
		$('.message').hide();
	});
	
	// type has 3 values - success , fail , info or 1 , 2 , 3 respectively
	// third argument Time is used for duration of the message / auto hide
	// sensitive hide lets you to activate autohide message only if the user is not pointer the mouse on the message
	// you can also set the time after the mouse  out - the last argument
	
	//message = "This is just a test message to show this message is working, tons of features inside...!!! check it out. you can find everything in pushNotifications.js";
	
	//pushNotification(message,1 , "Push Notifications" ,7000 ,true, 1000);


	// PN- Popup
	// second argument reference is the class name of the element / input which is set to be the close button of the popup
	
	//pnPopup('pop3','This is just for testing..everything is in pushNotification.js - bottom section');
	//pnPopup('pop4','This is just for testing..everything is in pushNotification.js - bottom section');

    $('.pnNumber').keydown(function(e){
            var kc = e.keyCode;
        if((kc > 47 && kc < 58) || (kc > 95 && kc < 106) || kc == 8 || kc == 9 || kc == 16 || kc == 37 || kc == 39 || kc == 46 ) {

        } else {
            e.preventDefault();
        }
    });

    $('.unTab').keydown(function(e){
        if((e.keyCode == 9 && !e.shiftKey )  ) {
            e.preventDefault();
        }
    });

    $('.unTabUp').keydown(function(e){
        if((e.keyCode == 9 && e.shiftKey)  ) {
            e.preventDefault();
        }
    });



});


function pushNotification(message,type,title,time,sensitiveHide,sensitiveHideTime){
	if($.isNumeric(type)){
		if(type== 1){ $('.message .mSuccessIcon').show(); }
		else if(type== 2 ){ $('.message .mFailIcon').show(); }
		else if(type== 3 ){ $('.message .mInfoIcon').show(); }
		else { $('.message .mInfoIcon').show(); }
	}else{
		if(type.match('[Ss]uccess')) $('.message .mSuccessIcon').show();
		else if(type.match('[Ff]ail')) $('.message .mFailIcon').show();
		else if(type.match('[Ii]nfo')) $('.message .mInfoIcon').show();
		else { $('.message .mInfoIcon').show(); }
	}
	$('.message .mCont > .mc-head').html(title);
	$('.message .mCont > .mc-mes').html(message);
	$('.message').show();
    //if (typeof time === 'undefined') time = 0;
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

function pnPopup(inputid,message,type){
	var input = $("#" + inputid);
    var popup = input.parent().find('.pn-popup');
    var h = input.outerHeight();
	var w = input.outerWidth();
    if(type == "" || type == undefined){ type = 0; }
    if(input.hasClass('glob-control')){
        h = 0;
    }else if(input.hasClass('inp-type-inline')){
        h = -10;
    }




    if(type == 1){
        $('<div/>').addClass('pnPopBlue').css({"margin-top": -h , "margin-left" : w}).html(message).appendTo(popup);
    }else{
        $('<div/>').addClass('pnPopRed').css({"margin-top": -h , "margin-left" : w}).html(message).appendTo(popup);
    }
    popup.fadeIn();
	input.click(function(){
		popup.fadeOut();
	})
}
