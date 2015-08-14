jQuery(document).ready(function() {

    var gridID = 1;
    createGrid(gridID);

    $('#AddGrid').click(function(){
        createGrid(gridID);
    });

    function createGrid(gridId){
        $("#adm-homeInner").append($("#baseGrid").clone(true, true).addClass('.gridNo-'+ gridID ).fadeIn());
        gridId++;
        gridID = gridId;
    }

    $('#adm-homeInner .GenTemp').click(function(){
        var rows = 1;
        var cells = 3;
        //generateTemplate($(this),rows,cells);
        generateTemplate($(this));
    });

    $("input").bind('keyup mouseup', function () {
        if($(this).hasClass('GInp')){
            createTemplate($(this));
        }
    });

    function generateTemplate(that){
        var parent = that.parent();
            var rs = that.parent().parent().parent().find('.GridRows').val();
            var cs = that.parent().parent().parent().find('.GridCells').val();
            that.parent().parent().parent().find('.GridRows').addClass('GInp');
            that.parent().parent().parent().find('.GridCells').addClass('GInp');
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
        parent.html('')
        var count = r * c;
        for(i=1; i <= count; i++){
            parent.append($("#gridBox").clone());
        }
    }
    function setTheGround(parent,cells){
        parent.removeClass('adcont-1');
        parent.removeClass('adcont-2');
        parent.removeClass('adcont-3');
        parent.removeClass('adcont-4');
        parent.removeClass('adcont-5');
        parent.removeClass('adContBB');
        parent.addClass('adcont-'+cells);
        parent.addClass('adContBB');
    }
    $('.adm-inp-numb').keydown(function(e){
        e.preventDefault();
    });

});