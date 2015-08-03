jQuery(document).ready(function() {
	
	$('.droplistBase > div > span').click(function(){
		$(this).parent().find('div').toggle();
		if($(this).find('span').html()=="+"){
			$(this).find('span').html('-');
		}	
		else{
			$(this).find('span').html('+');
		}	
	});


});