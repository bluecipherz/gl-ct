/**
 * Created by bazi on 16-Aug-15.
 */

/*
 * Configure all ajax requests to use CSRF token
 * This applies to all pages.
 */
$.ajaxSetup({
    headers : {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

var script = document.createElement('script');
script.src = '/js/category.js';
script.onload = function() {
    console.log('[app.js] loading scripts');
};
document.head.appendChild(script);

$.loadScript = function(url, callback) {
    jQuery.ajax({
        url : url,
        datatype : 'script',
        success : callback,
        async : true
    });

};

$(document).ready(function(){

    var div = $('<div/>').addClass('col-md-6 col-lg-6 col-md-offset-2 col-lg-offset-2').appendTo($('<div/>').addClass('form-group'));
    $('<input/>').attr('type', 'file').attr('name', 'images[]').addClass('form-control').appendTo(div);

    $('.adm-inp-adder').click(function(){
        $('#product_add .form-group:last-child').before(div.parent().clone(true,true));
    });

    $('.adm-pro-sel-cat-Outer').click(function(){
        $('.adm-selcat').show();
    });
    $(window).keydown(function(e){
        if(e.keyCode == 27 && window.location.pathname.startsWith('/admin/products')) {
            $('.adm-selcat').hide();
        }
    });
});