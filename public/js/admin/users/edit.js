$(function() {
    $('#select-project').on('change', onSelectProjectChange);
})

function onSelectProjectChange() {
    var project_id=$(this).val();

    if(!project_id){
        $('#select-level').html('<option value="">Seleccione el nivel</option>');
        return;
    }
    //ajax
    $.get('/api/proyecto/'+project_id+'/niveles',function(obtenerDatos){
        var html_select='<option value="">Seleccione el nivel</option>';
        for(var i=0;i<obtenerDatos.length;++i)
            html_select += '<option value="'+obtenerDatos[i].id+'">'+obtenerDatos[i].name+'</option>';
            $('#select-level').html(html_select);

    });
}
