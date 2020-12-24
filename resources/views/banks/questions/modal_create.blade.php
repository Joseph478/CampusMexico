
<div class="modal fade td-example-modal-lg" id="Modal_create" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">

        <div class="modal-content" >
        <div class="modal-header">
            <h5 class="modal-title " id="exampleModalLabel">Agregar Opciones </h5>
            <button type="button" class="close " data-dismiss="modal" aria-label="Close">
            <span  aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('banks.store',$bank->content->course->id) }}"
        method="POST" id="form_create">



        @csrf
            <div id ="pocos"class="form-row" >

            </div>


        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-info" id="style" >Guardar</button>
            <button type="button" class="btn btn-danger" name="save" id="save">Añadir</button>
        </div>
    </form>
        </div>
    </div>
    </div>









