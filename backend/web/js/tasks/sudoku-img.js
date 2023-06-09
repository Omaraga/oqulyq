function setTableVal(){
    var size = parseInt($('#sudoku-size').val());
    var str = $('#question').val();
    if (str != null && str !== ''){
        var question = JSON.parse(str);
        $(question).each(function (index){
            var tmp = $('#sudoku-table').find("td[data-adr='"+this.adr+"']").find('.sudoku-check');

            if (this.value == 1){
                $(tmp).prop('checked',true);
            }else{
                $(tmp).prop('checked', false);
            }
        })
    }

    var strAns = $('#answer').val();
    if (strAns != null && strAns !== ''){
        var answer = JSON.parse(strAns);
        $(answer).each(function (index){
            var tmp = $('#sudoku-table').find("td[data-adr='"+this.adr+"']").find('.sudoku-inp').val(this.value+1);
        })
    }
}
function setCheck(){
    var res = [];
    $('#sudoku-table').find('td').each(function (index){
        var key = $(this).data('adr');
        var value = $(this).find('.sudoku-check').is(':checked') ? 1 : 0;
        res.push({adr : key, value : value});
    });
    $('#question').val(JSON.stringify(res));
}

function setAns(){
    var res = [];
    $('#sudoku-table').find('td').each(function (index){
        var key = $(this).data('adr');
        var value = $(this).find('.sudoku-inp').val() ? parseInt($(this).find('.sudoku-inp').val())-1 : 0;
        res.push({adr : key, value : value});
    });
    $('#answer').val(JSON.stringify(res));
}
function check(){
    $(".sudoku-check").each(function (e){
        if ($(this).is(':checked')){
            $(this).parent('td').find('.sudoku-inp').css({'color': 'darkblue'});
        }else{
            $(this).parent('td').find('.sudoku-inp').css({'color': 'darkgrey'});
        }
        setCheck();
    });

    $(".sudoku-inp").change(function (e){
        setAns();
    });

}

function createTable(size){

    var html = '<table style="width:100%">';
    for (var i = 0; i < size; i ++){
        html+='<tr>';
        for (var j = 0; j < size; j++){
            html+='<td ' +'data-adr="'+i+'-'+j+'">'+
                '<input type="checkbox" class="sudoku-check" checked>'+
                '<input type="number" class="form-control sudoku-inp" min="1" max="'+size+'">'+
                '</td>';
        }
        html+='</tr>';
    }
    html+='</table>';
    $("#sudoku-table").html(html);
    var width = parseInt($('#sudoku-table').width());

    $(".sudoku-inp").css({'min-height': width/size+'px'});
    $(".sudoku-check").change(function (e){
        check();
    });

}

function hideImgInputs(size = 0){
    $('.fileinput').each(function (i){
        $(this).find('.btn-file span.fileinput-new').text('Выберите №'+(i+1)+' изображение');
        $(this).find('.btn-file span.fileinput-exists').text('Изменить №'+(i+1)+' изображение');
        $(this).find('.btn-file a.fileinput-exists').text('Удалить №'+(i+1)+' изображение');
        if (size <= i){
            $(this).hide();
        }else{

            $(this).show();
        }
    });
}
function checkInputNumber(size = 10){
    $(".sudoku-inp").keyup(function (e){
        if ($(this).val() > size){
            $(this).val(size);
        } else if ($(this).val() < 1){
            $(this).val(1);
        }
    });
}

$('#sudoku-create').click(function (e){
    e.preventDefault();
    var size = parseInt($('#sudoku-size').val());
    createTable(size);
    setTableVal();
    check();
    hideImgInputs(size);
    checkInputNumber(size);
});
$(document).ready(function (){
    $(".sudoku-check").change(function (e){
        check();
    });

    $(".sudoku-inp").change(function (e){

        setAns();
    });
    var questionVal = $('#question').val();
    if (questionVal != null && questionVal !== ''){
        var arr = JSON.parse(questionVal);
        $('#sudoku-size').val(Math.sqrt(arr.length));

    }
    var size = ($('#sudoku-size').val())? parseInt($('#sudoku-size').val()):0;
    if (size > 0){
        createTable(size);
    }


    setTableVal();
    hideImgInputs(size);
    check();
});



