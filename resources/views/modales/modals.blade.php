
    {{-- <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button> --}}
    <!-- Modal -->
    <div class="modal fade" id="modalEditCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalEditCategory" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditCategory">Editar categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/categoria/editar" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="category_id" id="category_id" value="">
                        <div class="form-group">
                            <label for="name">Nombre de la categoria</label>
                            <input type="text" class="form-control" name="name" id="category_name" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEditLevel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalEditLevel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLevel">Editar nivel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/nivel/editar" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="level_id" id="level_id" value="">
                        <div class="form-group">
                            <label for="name">Nombre del nivel</label>
                            <input type="text" class="form-control" name="name" id="level_name" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


