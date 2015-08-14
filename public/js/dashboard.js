/**
 * Created by bazi on 13-Aug-15.
 */
jQuery(document).ready(function() {
    if(window.location.pathname.startsWith('/admin/categories')) {
        $.post('/categories-all')
            .success(function(data) {
                console.log('fetching categories : ' + data.responseText)
            })
            .fail(function(data) {
                console.log('error fetching categories')
            });
    }
});