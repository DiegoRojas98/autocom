/* Requiere jquery => 3 */
//Crea un componente(div) en el Dom el cual no sera visible
//Cada vez que se ejecute la funcion boxAlert dicho componente sera visible y dentro 
//se creara un div visible el cual tendra un id con el cual se podra eliminar
//pasado un tiempo dado el mismo se eliminara y ocultara el componente padre

let containerAlerts = '<div style="z-index: 9999;opacity: 0.9;width: 300px;min-height: 6vh;height:auto;overflow: hidden;position:fixed;top: 20px;right:2vw; display: none;" id="containerAlerts"></div>';
$('body').prepend(`${containerAlerts}`);

function boxAlert(text, type = 'null',seconds = 7){
    var time = seconds;
    if(isNaN(time) || time < 1){
        time = 7;
    }
    time = time * 1000;
    var color;
    switch (type) {
        case 'warning' : color = '#fff3cd';break;
        case 'info' : color = '#d1ecf1' ;break;
        case 'success': color = '#d4edda';break;
        case 'danger': color = '#f8d7da';break;
        default: color = '#cce5ff';break;//primary
    }

    let id = "boxAlert" + Math.floor(Math.random() * 10000000);

    let component = `<div id="${id}" style="width: 100%;min-height: 5vhpx;height:auto;padding:10px;margin-bottom:10px;border-radius: 15px;background-color: ${color};overflow-wrap: break-word;"><h6 style="float:left;position:relative;left: 270px;bottom:10px;margin:0px"  onclick="boxHidden('${id}')">x</h6><div>${text}</div></div>`;

    $('#containerAlerts').prepend(`${component}`);

    $('#containerAlerts').css('display','block');

    setTimeout(function(){
        boxHidden(`${id}`);
    }, time);
}

function boxHidden(id){
    if( $(`#${id}`).length >= 1){
        $(`#${id}`).remove();
    }

    if($('#containerAlerts').children().length <= 0){
        $('#containerAlerts').css('display','none');
    }
}

/* power by DRT*/