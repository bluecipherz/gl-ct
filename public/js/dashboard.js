/**
 * Created by bazi on 13-Aug-15.
 */
jQuery(document).ready(function() {
    //if(window.location.pathname.startsWith('/admin/categories')) {

    /*
     * Configure all ajax requests to use CSRF token
     * This applies to all pages.
     */
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var cats;

    var Categories = function(cats) {
        this.cats = cats;
        this.getCats = function(level) {
            if(level != undefined) {
                if(level == -1) {
                    return [{id: -1,name: 'No parent'}];
                }
                return this.cats.filter(function(cat) {
                    return cat.depth == level;
                });
            }
            return cats;
        };
        this.find = function(i) {
            this.cat = this.cats.filter(function(cat) {
                return cat.id == i;
            })[0];
            return this;
        };
        this.parent = function() {
            if(this.cat.depth > 0) {
                var cat_id = this.cat.id;
                this.cat = this.cats.filter(function (cat) {
                    return cat.id == cat_id;
                })[0];
                return this;
            }
        };
        this.children = function() {
            if(this.cat.depth < 2) {
                var cat_id = this.cat.id;
                return this.cats.filter(function(cat) {
                    return cat.parent_id == cat_id;
                });
            }
        };
        this.get = function() {
            return this.cat;
        };
    };

    console.log('ready sir');
        $.get('/categories/all')
            .success(function(data) {
                //console.log('fetching categories : ' + data)
                cats = new Categories(data);
                var level = $("#category_level").val();
                var level_cats = cats.getCats(level - 1);
                setupParentList(level_cats);
            })
            .fail(function(data) {
                console.log('error fetching categories')
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
        var level_cats = cats.getCats(level - 1);
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
                console.log('updated cat');
            })
            .fail(function(data) {
                console.log(data.responseText);
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