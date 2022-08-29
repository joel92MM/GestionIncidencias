// hacemos una funcion que al cargar la pagina localize el identificador con el nombre que le hemos establecido
// y que al apuntar a ese id llame a la funcion que le hemos especificado
$(function() {
    $('#list-of-projects').on('change', onNewProjectSelected);
})
function onNewProjectSelected() {
    var project_id=$(this).val();
    location.href='/seleccionar/proyecto/'+project_id;
}
