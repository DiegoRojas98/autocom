$(document).ready(function(){
    if($(`#city`).val() != 0){
        $.ajax({
            type : 'GET',
            url : `/city/${$('#city').val()}`,
            dataType : 'JSON' 
        }).done(function(response){
            $(`#departament`).val(response.id_departament);
            $(`#departament`).trigger('change');
            $(`#city`).val(response.id);
            $(`#city`).trigger('change');    
        });

    }else{
        $(`#departament`).trigger('change');
    }
})

function citysHiden(){
    $('.city').hide();
    $('.city').attr('disabled',true);
}

$('#departament').change(function(){
    let departament = `departament${$('#departament').val()}`;
    citysHiden();
    $(`#city`).val(0);
    $(`#city`).trigger(`change`);
    $(`.${departament}`).show();
    $(`.${departament}`).attr('disabled',false);
})