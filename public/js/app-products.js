jQuery(document).ready(function() {

    $('.pro-imgLsit > .pro-imgThumb').click(function(){
        var classN = $(this).attr('class');
        var thumb = classN.replace(/[^0-9]/g, '');
        $('.pro-imgSet > div').removeClass('pro-img-act');
        $('.pro-imgSet > .pro-img-id-'+thumb).addClass('pro-img-act');

        $(this).parent().find('div').removeClass('pro-imgThumb-act');
        $(this).addClass('pro-imgThumb-act');
    });

});