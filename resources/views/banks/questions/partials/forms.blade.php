
<div class="box-body">

<div class="main-card mb-3 card">
    <div class="card-body">
    <div class="table-responsive">
                <span id="result"></span>
            <table class="table table-bordered table-striped" id="user_table">
            <thead class="thead-light">
                <tr class="text-center">
                    <th width="35%">Preguntas</th>
                    <th width="65%">Opciones</th>
                    <th width="40%">Acciones</th>
                </tr>
            </thead>
            <tbody >
                <tr>
                    <td>
                        <div class="contenedor">
                        {!! Form::select('content_id', $contents, null, ['class' => 'btncontent selection-input form-control']) !!}
                        </div>
                        <br>
                        <input type="text" name="title" value="{{ old('title', $bank->title) }}"class="form-control" placeholder="Ingrese una pregunta"/>
                    </td>
                    <td id="pocos"></td>
                    <td><button type="button"  id="adding" class="btn btn-success">Añadir</button></td>
                </tr>
            </tbody>
            <tfoot >


                    <td>

                    <br>
                    @csrf
                    <button type="submit" disabel id="save" class="btn btn-primary">
                        <span class="btn-icon-wrapper pr-1 opacity-8">
                            <i class="fa fa-save"></i>
                        </span>
                        Guardar
                    </button>

                    </td>

            </tfoot>
        </table>

    </div>
    </div>
</div>
</div>
<p class="text-center text-primary"><small>Campus Virtual</small></p>







