jQuery(document).ready(function() {

    var baseGrid = $('<div/>').addClass('GridOuter');
    var gridHead = $("<div/>").addClass('Gridhead').appendTo(baseGrid);
    $("<div/>").addClass("GridheadInner").append($("<div/>").addClass('GridHName').append($("<span/>").text("Grid name"))).append($("<div/>").append($("<input/>").attr('type', 'text').attr('name', 'gridTitle').attr('placeholder', 'Title'))).appendTo(gridHead);
    var rowDiv = $("<div/>").addClass("adm-inp-set").append($("<div/>").addClass("adm-subhead").text("Rows")).append($("<input/>").attr('type', 'number').attr('name', 'GridRows').attr('placeholder', 'Rows').attr('value', 1).attr('min', 1).attr('max', 2).addClass("GridRows adm-inp-numb"));
    var colDiv = $("<div/>").addClass("adm-inp-set").append($("<div/>").addClass("adm-subhead").text("Cells")).append($("<input/>").attr('type', 'number').attr('name', 'GridCells').attr('placeholder', 'Cells').attr('value', 1).attr('min', 1).attr('max', 5).addClass("GridCells adm-inp-numb"));
    $("<div/>").addClass("GridHSettings").append(rowDiv).append(colDiv).append($("<button/>").addClass('adm-nav-btns edit-ok').text('Ok').hide()).appendTo(gridHead);
    $("<div/>").addClass("GridHAfter").append($("<button/>").addClass("adm-nav-btns edit-grid").text("Edit")).hide().appendTo(gridHead);
    $("<div/>").addClass("GridCont").append($("<div/>").addClass("adcont-2").append($("<div/>").addClass("adm-box-gen GenTemp").text("Generate Grid"))).appendTo(baseGrid);

    var gridBox = $("<a/>").addClass('grid-box').attr('id', 'gridBox');
    $("<input/>").attr('type', 'hidden').attr('name', 'product_id').appendTo(gridBox);
    var gridSel = $("<div/>").addClass('gridSelPro').appendTo(gridBox);
    $("<div/>").addClass('adm-proText').text('Add Product').appendTo(gridSel);
    var proSearch = $("<div/>").addClass('adm-proSearch').appendTo(gridSel);
    $("<div/>").addClass('adm-searchhead').append($("<input/>").attr('type', 'text').addClass('adm-search').attr('placeholder', 'Search Products').attr('id', 'searchProducts')).appendTo(proSearch);
    $("<div/>").addClass("adm-searchSec productsCont").appendTo(proSearch);

    var gridID = 1;
    createGrid(gridID);

    $('#AddGrid').click(function(){
        createGrid(gridID);
    });

    function createGrid(gridId){
        //$("#adm-homeInner").append($("#baseGrid").clone(true, true).addClass('.gridNo-'+ gridID ).fadeIn());
        console.log(baseGrid);
        $("#adm-homeInner").append($(baseGrid).clone(true, true).addClass('.gridNo-'+ gridID ).fadeIn());
        gridId++;
        gridID = gridId;
    }

    $("#adm-homeInner .GenTemp").click(function(){
        var rows = 1;
        var cells = 3;
        //generateTemplate($(this),rows,cells);
        generateTemplate($(this));
        saveMode($(this));
    });

    $('.GridHAfter .edit-grid').click(function() {
        editMode($(this).parent().parent());
    });

    $('.GridHSettings .edit-ok').click(function() {
        saveMode($(this).parent().parent());
    });

    /**
     * shows the col, row controls on the head
     * @param .GenTemp
     */
    function editMode(head) {
        head.find('.GridHSettings').show();
        head.find('.GridHAfter').hide();
        head.find('.GridHSettings .edit-ok').show();
    }

    /**
     * hides the col, row controls on the head
     * @param .edit-grid
     */
    function saveMode(head) {
        $(head).find('.GridHSettings').hide();
        $(head).find('.GridHAfter').show();
        //$(head).find('.GridHAfter .edit-grid').click(function() {
        //    editMode(head);
        //});
    }

    $("input").bind('keyup mouseup', function () {
        if($(this).hasClass('GInp')) {
            createTemplate($(this));
        }
    });

    function generateTemplate(that){
        var parent = that.parent();
            var rs = that.parent().parent().parent().find('.GridRows').val();
            var cs = that.parent().parent().parent().find('.GridCells').val();
            that.parent().parent().parent().find('.GridRows').addClass('GInp');
            that.parent().parent().parent().find('.GridCells').addClass('GInp');
        saveMode(that.parent().parent().parent());
        setTheGround(parent,cs);
        fillBoxes(parent,rs,cs);
    }

    function createTemplate(that){
        var parent = that.parent();
        var rs = that.parent().parent().find('.GridRows').val();
        var cs = that.parent().parent().find('.GridCells').val();
        parent = that.parent().parent().parent().parent().find('.GridCont');
        setTheGround(parent,cs);
        fillBoxes(parent,rs,cs);
    }

    function fillBoxes(parent,r,c){
        parent.html('');
        var count = r * c;
        for(var i=1; i <= count; i++){
            var gridbox = gridBox.clone(true, true);
            gridbox.click(function() {
                productAdView($(this).find('.gridSelPro'));
                currentSelector = $(this).find('.gridSelPro');
            });
            gridbox.find('#searchProducts').keydown(searchFunc);
            currentSelector = gridbox.find('.gridSelPro');
            parent.append(gridbox);
        }
    }
    function setTheGround(parent,cells) {
        parent.removeClass('adcont-1');
        parent.removeClass('adcont-2');
        parent.removeClass('adcont-3');
        parent.removeClass('adcont-4');
        parent.removeClass('adcont-5');
        parent.removeClass('adContBB');
        parent.addClass('adcont-'+cells);
        parent.addClass('adContBB');
    }
    $('.adm-inp-numb').keydown(function(e) {
        e.preventDefault();
    });


    // SELECT PRODUCT

    var currentSelector ;

    var addProd = function($e) {
    }

    $(window).keydown(function(e) {
        if(e.keyCode == 27 && window.location.pathname.startsWith('/admin/homepage')) {
            restorToProductView(currentSelector);
        }
    });
        $('#adm-homeInner .adm-searchClose').click(function(){
            restorToProductView(currentSelector);
        });


    function productAdView(that) {
        that.addClass('admSelFulView');
        that.find('.adm-proText').hide();
        that.find('.adm-proSearch').show();
        //that.show();
    }

    function restorToProductView(that) {
       // that.hide();
        that.removeClass('admSelFulView');
        that.find('.adm-proText').show();
        that.find('.adm-proSearch').hide();
    }

    var productCont = $("<div/>").addClass('productCont b-fakeLink');
    $("<div/>").addClass("product-thumbnail").append($("<span/>").addClass('sampleThumb').append($('<img/>'))).appendTo(productCont);
    var desc = $("<div/>").addClass("product-description").attr('data-toggle', 'tooltip').attr('data-placement', 'bottom').appendTo(productCont);
    desc.append($("<h4/>"));
    desc.append($("<div/>").addClass("productPrice"));
    desc.append($("<div/>").addClass('product-desc-small'));

    var searchFunc = function($e) {
        if($e.keyCode == 13) {
            var searchBar = $($e.target);
            var input = searchBar.val();
            var terms = input.trim().replace(/\s+/g, '+');
            $.get('/products/search?q=' + terms)
                .success(function(data) {
                    //console.log(data);
                    searchBar.parent().parent().find(".adm-searchSec").empty();
                    $.each(data, function(key, value) {
                        var prodiv = productCont.clone().click(function() {
                            //console.log(value.id);
                            var $this = $(this);
                            var gridSel = $this.parent().parent().parent();
                            gridSel.parent().find('input[type="hidden"]').prop('value', value.id);
                            gridSel.find('.adm-proText').text(value.title);
                            restorToProductView(gridSel);
                        });
                        if(value.images[0] == undefined) {
                            prodiv.find('img').attr('src', '/img/noImage.jpg');
                        } else {
                            prodiv.find('img').attr('src', value.images[0].url);
                        }
                        prodiv.find('h4').text(value.title);
                        prodiv.find('.productPrice').text(value.price);
                        prodiv.find('.product-desc-small').text(value.description);
                        //console.log(prodiv);
                        searchBar.parent().parent().find(".adm-searchSec").append(prodiv);
                    });
                }).fail(function(data) {
                    console.log(data.responseText);
                });
        }
    };
    $("#SaveGrid").click(function() {
        var gridboxes = $("#adm-homeInner .GridOuter");
        var data = {};
        //console.log(gridboxes);
        $(gridboxes).each(function(index) {
            data[index] = {};
            data[index]['name'] = $(this).find('.GridheadInner input').val();
            data[index]['rows'] = $(this).find('.GridHSettings input[name="GridRows"]').val();
            data[index]['cols'] = $(this).find('.GridHSettings input[name="GridCells"]').val();
            var slots = {};
            $(this).find('.grid-box').each(function(index) {
                slots[index] = {};
                slots[index]['product_id'] = $(this).find('input[type="hidden"]').val();
            });
            data[index]['slots'] = slots;
        });
        //console.log(data);
        $.post('/homegrids', {data : data})
            .success(function(data) {
                console.log(data);
            })
            .fail(function(data) {
                console.log(data.responseText);
            });
    });
});