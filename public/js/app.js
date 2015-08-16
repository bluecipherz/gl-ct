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