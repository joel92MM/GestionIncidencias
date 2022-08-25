$(function() {
    $('[data-category]').on('click',editCategoryModal);
    $('[data-level]').on('click',editLevelModal);
});

//Función que llama al evento de categoria, pasandole el identificador
function editCategoryModal() {
    //obtenemos el id de la categoria
    var category_id=$(this).data('category');
    //reemplazamos el valor antiguo, por el valor que a introducido el usuario
    $('#category_id').val(category_id);

    //obtenemos el name de la categoria
    var category_name=$(this).parent().prev().text();
    //reemplazamos el valor antiguo, por el valor que a introducido el usuario
    $('#category_name').val(category_name);

    //Mostraremos el modal de edicion
    $('#modalEditCategory').modal('show');
}
//Función que llama al evento de nivel, pasandole el identificador
function editLevelModal() {
    //obtenemos el id del level
    var level_id=$(this).data('level');
    //reemplazamos el valor antiguo, por el valor que a introducido el usuario
    $('#level_id').val(level_id);

    //obtenemos el name de la categoria
    var level_name=$(this).parent().prev().text();
    //reemplazamos el valor antiguo, por el valor que a introducido el usuario
    $('#level_name').val(level_name);

    //Mostraremos el modal de edicion
    $('#modalEditLevel').modal('show');
}
