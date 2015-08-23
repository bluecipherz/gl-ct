/**
 * Created by bazi on 13-Aug-15.
 */
jQuery(document).ready(function() {
    //if(window.location.pathname.startsWith('/admin/categories')) {


    //$.loadScript('/js/category.js', function() {
    //    console.log('success');
    //});


    console.log('[dashboard.js] ready sir');
        $.post('/categories/all')
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
                //console.log('[dashboard.js] error fetching categories')
                console.log(data.responseText);
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


    /**
     * Form field template
     * @type {*|jQuery}
     */
    var formGrp = $("<div/>").addClass('form-group');
    $("<label/>").addClass('control-label col-lg-2 col-md-2').appendTo(formGrp);
    var dspDiv = $("<div/>").addClass('col-lg-6 col-md-6').appendTo(formGrp);
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
        $(".form-horizontal > .form-group > div > input[type='text']").each(function(e) {
            var lbl = $(this).parent().parent().children('label');
            var fldName = $(this).attr('name');
            var fldText = lbl.text();
            //console.log('checking ' + fldText);
            if(fldName in datas) {
                added[fldName] = fldText; // mark as added to avoid duplication
                //console.log(fldName + " : " + fldText);
                //console.log(added);
                //console.log(fldName + ', already preset');
            }
        });
        //console.log(datas);
        //console.log(added);
        for(var attr in datas) {
            //console.log('trying ' + attr);
            if(!attr in added) { // skip if already added
                //console.log('adding ' + attr);
                var nGrp = formGrp.clone();
                nGrp.children('label').text(datas[attr]).attr('for', attr);
                nGrp.find('div > input').attr('name', attr);
                $('.form-horizontal .form-group:last-child').before(nGrp);
            } else {
                //console.log(attr + " : " + datas[attr] + " | already added");
            }
        }
        for(var attr in datas) {
            var nGrp = formGrp.clone();
            nGrp.children('label').text(datas[attr]).attr('for', attr);
            nGrp.find('div > input').attr('name', attr);
            $('.form-horizontal .form-group:eq(-2)').before(nGrp);
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
                console.log('removing ' + fldName);
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
        //console.log(cat_id);
        if(cat.isDescendantOf(1)) {
            if (window.location.pathname.startsWith('/admin/products')) {
                //console.log('populating fields');
                populateFields(motorAttrs);
            }
        } else {
            //console.log('removing fields');
            removeFields(motorAttrs);
        }
    });

});