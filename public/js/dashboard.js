/**
 * Created by bazi on 13-Aug-15.
 */
jQuery(document).ready(function() {
    //if(window.location.pathname.startsWith('/admin/categories')) {


    //$.loadScript('/js/category.js', function() {
    //    console.log('success');
    //});


    console.log('[dashboard.js] ready sir');
        $.get('/categories/all')
            .success(function(data) {
                //console.log('fetching categories : ' + data)
                cats = data;
                var level = $("#category_level").val();
                var level_cats = getCats(level - 1);
                setCats(data);
                var cat = new Category(1);
                console.log('[dashboard.js] ' + cat);
                setupParentList(level_cats);
            })
            .fail(function(data) {
                console.log('[dashboard.js] error fetching categories')
            });
    //}

    function setupParentList(cats) {
        var parent_list = $("#parent_list").empty();
        $.each(cats, function(key, value) {
            parent_list.append($("<option/>").val(value.id).text(value.name));
        });
    }

    $("#category_level").change(function() {
        var level = $(this).val();
        var level_cats = getCats(level - 1);
        setupParentList(level_cats);
    });

    var saveCat = function() {
        var input = $(this).parent().find('input.cat-edit-txt');
        var td = input.parent();
        var url = input.attr('caturl');
        var id = url.substr(url.lastIndexOf('/') + 1);
        $.post('/categories/' + id, {_method : 'PATCH', name : input.val()})
            .success(function() {
                td.empty();
                $('<a/>').attr('href', url).text(input.val()).appendTo(td);
                console.log('[dashboard.js] updated cat');
            })
            .fail(function(data) {
                console.log('[dashboard.js] ' + data.responseText);
                //console.log('error updating cat');
            })
    };

    $(".cat-edit-btn").click(function() {
        var td = $(this).parent().parent().parent().find('td:first-child');
        var url = td.find('a').attr('href');
        var text = td.find('a').text();
        td.empty();
        $("<input/>").attr('type', 'text').addClass('cat-edit-txt').attr('caturl', url).val(text).appendTo(td);
        $("<button/>").addClass('cat-edit-sav btn btn-xs btn-default').text('Save').click(saveCat).appendTo(td);
    });


});